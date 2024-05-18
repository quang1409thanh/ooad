<?php

namespace App\Http\Controllers;

use App\Models\Bidding;
use App\Models\Billing;
use App\Models\Payment;
use App\Models\Product;
use App\Providers\AppServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BiddingController extends Controller
{//
    public function index()
    {

    }

    public function viewBiddingProduct()
    {
        $products = Product::all();
        return view('employee.bidding_product', compact('products'));
    }

    public function closeBiddingProduct()
    {
        $products = Product::all();
        return view('employee.close_bidding_product', compact('products'));
    }

    public function getAccountBalance()
    {
        $userId = session('customer_id');

        // Lấy tổng số tiền đã nạp của người dùng
        $depamt = Billing::where('customer_id', $userId)
            ->where('status', 'Active')
            ->where('payment_type', 'Deposit')
            ->sum('purchase_amount');

        // Lấy tổng số tiền đã chi tiêu của người dùng cho đấu giá
        $widamt = Payment::where('customer_id', $userId)
            ->where('status', 'Active')
            ->where('payment_type', 'Bid')
            ->sum('paid_amount');

        // Tính số dư tài khoản
        $accbalamt = $depamt - $widamt;
        return $accbalamt;
    }

    public function submitBidding(Request $request)
    {
        $userId = session('customer_id');

        $accbalamt = $this->getAccountBalance();

        if ($accbalamt > $request->input('purchase_amount')) {
            $dttime = now(); // Get the current time

            DB::beginTransaction();

            try {
                // Add new bidding
                $bidding = new Bidding();
                $bidding->fill([
                    'customer_id' => $userId,
                    'product_id' => $request->input('product_id'),
                    'bidding_amount' => $request->input('purchase_amount'),
                    'bidding_date_time' => $dttime,
                    'note' => "null",
                    'status' => 'Active',
                ]);
                $bidding->save();

                // Get the ID of the newly added bidding
                $biddingid = $bidding->bidding_id;

                // Update the final bid price of the product
                $product = Product::find($request->input('product_id'));
                $product->ending_bid = $request->input('purchase_amount');
                $product->save();

                // Add payment
                $biddingpercentageamt = ($request->input('purchase_amount') * 1); // Assuming some calculation here
                $payment = new Payment();
                $payment->fill([
                    'customer_id' => $userId,
                    'payment_type' => 'Bid',
                    'product_id' => $request->input('product_id'),
                    'bidding_id' => $biddingid,
                    'paid_amount' => $biddingpercentageamt,
                    'paid_date' => $dttime,
                    'status' => 'Active',
                ]);
                $payment->save();

                DB::commit();

                alert()->success('Thành Công', 'Chúc mừng bạn đã đấu giá thành công');
                return redirect()->route('product.show', ['id' => $request->input('product_id')]);

            } catch (\Exception $e) {
                DB::rollBack();
                // Optionally, log the error or handle it
                return redirect()->route('product.show', ['id' => $request->input('product_id')])
                    ->with('error', 'Đã có lỗi xảy ra. Vui lòng thử lại.');
            }
        } else {
            // If account does not have sufficient balance
            alert()->error('Thất Bại', 'Số dư của bạn không đủ !!!');
            return redirect()->route('deposit')->with('error', 'Your account does not have sufficient balance. Kindly deposit amount.');
        }
    }
}
