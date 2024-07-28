<?php

namespace App\Providers;

use App\Blockchain\Block;
use App\Blockchain\Blockchain;
use App\Models\Bidding;
use App\Models\Billing;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Employee;
use App\Models\Payment;
use App\Models\Product;
use App\Models\Winner;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;
g
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        if (config('app.env') !== 'local') {
            URL::forceScheme('https');
        }
    
        // Thêm logic kiểm tra và cập nhật danh sách người chiến thắng ở đây
        $this->handleWinningBids();

        View::composer('header', function ($view) {
            // Lấy tổng số tiền đã nạp của người dùng
            $depamt = Billing::where('customer_id', session()->get('customer_id'))
                ->where('status', 'Active')
                ->where('payment_type', 'Deposit')
                ->sum('purchase_amount');

            $widamt = Payment::selectRaw('MAX(paid_amount) as max_paid_amount')
                ->where('customer_id', session()->get('customer_id'))
                ->where('status', 'Active')
                ->where('payment_type', 'Bid')
                ->groupBy('product_id')
                ->pluck('max_paid_amount')
                ->sum();
            $refund = Payment::where('customer_id', session()->get('customer_id'))
                ->where('status', 'Active')
                ->where('payment_type', 'Refund')
                ->sum('paid_amount');
            $accbalamt = $depamt - $widamt + $refund;
//            dd($accbalamt);

            // đang có vấn đề với giá trị này ?
            $reverseBidCount = 3; // Lấy giá trị $reverseBidCount từ database hoặc bất kỳ nguồn dữ liệu nào khác

            // Thực hiện bất kỳ logic nào để truyền các giá trị cần thiết vào header ở đây
            $myBidCount = Bidding::where('customer_id', session()->get('customer_id'))->count();
            $winningBidCount = Winner::select('winners.*')
                ->join('products', 'winners.product_id', '=', 'products.product_id')
                ->where('products.customer_id', '!=', '0')
                ->where('winners.customer_id', '=', session()->get('customer_id'))
                ->count();

            $categories = Category::all();
            $cur = session()->get('customer_id');
            $customer = Customer::find($cur);
            $cure = session()->get('employee_id');
            $employee = Employee::find($cure);


            // Truyền các giá trị vào view
            $view->with('myBidCount', $myBidCount);
            $view->with('winningBidCount', $winningBidCount);
            $view->with('reverseBidCount', $reverseBidCount);
            $view->with('accbalamt', $accbalamt);
            $view->with('categories', $categories);
            $view->with('customer', $customer);
            $view->with('employee', $employee);
            // tại sao lấy được các giá trị này đúng là ??? vô lý vl/ ko có nó thi ko được khi ở trang đăng nhập.
        });
    }

    public function handleWinningBids()
    {
        $currentDateTime = now();

        $winningBids = Product::leftJoin('winners', 'products.product_id', '=', 'winners.product_id')
            ->leftJoin('biddings', 'products.product_id', '=', 'biddings.product_id')
            ->leftJoin('customers', 'customers.customer_id', '=', 'biddings.customer_id')
            ->select(
                'customers.customer_id as cid',
                'customers.customer_name as cname',
                'biddings.bidding_amount',
                'products.product_id',
                'products.product_name',
                'products.starting_bid',
                'products.ending_bid',
                'products.end_date_time'
            )
            ->whereColumn('products.ending_bid', '=', 'biddings.bidding_amount')
            ->where('products.status', '=', 'Active')
            ->where('products.end_date_time', '<', $currentDateTime)
            ->whereNull('winners.product_id')
            ->get();


        DB::beginTransaction();

        try {
            foreach ($winningBids as $winningBid) {
                $cid = $winningBid->cid;
                $cname = $winningBid->cname;
                $bidding_amount = $winningBid->bidding_amount;
                $product_id = $winningBid->product_id;
                $product_name = $winningBid->product_name;
                $starting_bid = $winningBid->starting_bid;
                $ending_bid = $winningBid->ending_bid;
                $end_date_time = $winningBid->end_date_time;

                $data = "Customer with ID [$cid] Named $cname has won bidding on amount: [$bidding_amount] for Product named $product_name and Product ID [$product_id] with bidding starting from $starting_bid and ending on $ending_bid ";

                // Ghi vào blockchain
                $blockchainService = Blockchain::getInstance();
                $currentTimestamp = now()->format('Y-m-d H:i:s');
                $blockchainService->addBlock(new Block($currentTimestamp, json_encode($data)));

                $customer = Customer::find($cid);

                // Tạo bản ghi Winner mới
                $winner = Winner::create([
                    'product_id' => $product_id,
                    'customer_id' => $cid,
                    'winners_image' => $customer->customer_image ? $customer->customer_image : 'default_image.jpg',
                    'winning_bid' => $bidding_amount,
                    'end_date' => $end_date_time,
                    'status' => 'Pending'
                ]);
                // hoàn tiền cho những người đấu giá mà không thắng.
                $payments = Payment::where('product_id', $product_id)
                    ->where('status', 'Active')
                    ->where('customer_id', '!=', $cid)
                    ->where('payment_type', 'Bid')
                    ->get();
                $dttime = now(); // Get the current time

                $uniqueCustomerIds = $payments->pluck('customer_id')->unique();
                foreach ($uniqueCustomerIds as $customerId) {
                    $maxPaidPayment = $payments
                        ->where('customer_id', $customerId)
                        ->sortByDesc('paid_amount')
                        ->first();
                    // tiến hành hoàn tiền, tạo từ bản ghi trong cơ sở dữ liệu
                    // Add new bidding
                    $bidding = new Bidding();
                    $bidding->fill([
                        'customer_id' => $maxPaidPayment->customer_id,
                        'product_id' => $product_id,
                        'bidding_amount' => $maxPaidPayment->paid_amount,
                        'bidding_date_time' => $dttime,
                        'note' => "Refund",
                        'status' => 'Active',
                    ]);
                    $bidding->save();
                    // Get the ID of the newly added bidding
                    $biddingid = $bidding->bidding_id;

                    // Add payment
                    $payment = new Payment();
                    $payment->fill([
                        'customer_id' => $customerId,
                        'payment_type' => 'Refund',
                        'product_id' => $product_id,
                        'bidding_id' => $biddingid,
                        'paid_amount' => $maxPaidPayment->paid_amount,
                        'paid_date' => $dttime,
                        'status' => 'Active',
                    ]);
                    $payment->save();

                    // Xử lý với $maxPaidPayment ở đây
                }


            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e; // or handle the error in another way
        }
    }

}
