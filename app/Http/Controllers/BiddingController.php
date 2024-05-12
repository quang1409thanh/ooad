<?php

namespace App\Http\Controllers;

use App\Models\Bidding;
use App\Models\Billing;
use App\Models\Payment;
use App\Models\Product;
use App\Providers\AppServiceProvider;
use Illuminate\Http\Request;

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

        return 3000;
        return $accbalamt;
    }

    public function submitBidding(Request $request)
    {
        $userId = session('customer_id');

        $accbalamt = $this->getAccountBalance(); // Sử dụng hàm getAccountBalance để lấy số dư tài khoản

        if ($accbalamt > 0) {
            $dttime = now(); // Lấy thời gian hiện tại

            // Thêm đấu giá mới
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

            // Lấy ID của đấu giá vừa được thêm
            $biddingid = $bidding->id;

            // Cập nhật giá cuối cùng của sản phẩm
            $product = Product::find($request->input('product_id'));
            $product->ending_bid = $request->input('purchase_amount');
            $product->save();

            // Thêm thanh toán
            $biddingpercentageamt = ($request->input('purchase_amount') * 1) / 100;
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

            return redirect()->route('product.show', ['id' => $request->input('product_id')])->with('success', 'Chúc mừng bạn đã đấu giá thành công !!!!');
        } else {
            // Nếu tài khoản không đủ tiền
            return redirect()->route('deposit')->with('error', 'Your account does not have sufficient balance. Kindly deposit amount.');
        }
    }

}
