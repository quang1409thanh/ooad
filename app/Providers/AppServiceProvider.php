<?php

namespace App\Providers;

use App\Blockchain\Block;
use App\Blockchain\Blockchain;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Employee;
use App\Models\Product;
use App\Models\Winner;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
        // Thêm logic kiểm tra và cập nhật danh sách người chiến thắng ở đây
        $this->handleWinningBids();

        View::composer('header', function ($view) {
            // Thực hiện bất kỳ logic nào để truyền các giá trị cần thiết vào header ở đây
            $myBidCount = 1; // Lấy giá trị $myBidCount từ database hoặc bất kỳ nguồn dữ liệu nào khác
            $winningBidCount = 2; // Lấy giá trị $winningBidCount từ database hoặc bất kỳ nguồn dữ liệu nào khác
            $reverseBidCount = 3; // Lấy giá trị $reverseBidCount từ database hoặc bất kỳ nguồn dữ liệu nào khác
            $accbalamt = 100;
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
        foreach ($winningBids as $winningBid) {
            $cid = $winningBid->cid;
            $cname = $winningBid->cname;
            $bidding_amount = $winningBid->bidding_amount;
            $product_id = $winningBid->product_id;
            $product_name = $winningBid->product_name;
            $starting_bid = $winningBid->starting_bid;
            $ending_bid = $winningBid->ending_bid;
            $end_date_time = $winningBid->end_date_time;

            $data = "Cutomer with ID [$cid] Named $cname has won bidding on amount: [$bidding_amount] for Product named $product_name and Product ID [$product_id] with bidding starting from $starting_bid and ending on $ending_bid ";

            // Ghi vào blockchain
            $blockchainService = Blockchain::getInstance();
            $currentTimestamp = now()->format('Y-m-d H:i:s');
            $blockchainService->addBlock(new Block($currentTimestamp, json_encode($data)));

            $customer = Customer::find($cid);
            // Tạo bản ghi Winner mới
            Winner::create([
                'product_id' => $product_id,
                'customer_id' => $cid,
                'winners_image' => $customer->customer_image ? $customer->customer_image : 'default_image.jpg',
                'winning_bid' => $bidding_amount,
                'end_date' => $end_date_time,
                'status' => 'Pending'
            ]);
        }
    }

}
