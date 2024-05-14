<?php

namespace App\Http\Controllers;

use App\Models\Billing;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    //
    public function index()
    {

    }

    public function viewPayment()
    {
        $payments = Payment::all();
        return view('employee.view_payment', compact('payments'));
    }

    public function showReceipt($paymentId)
    {
        // Lấy thông tin thanh toán từ cơ sở dữ liệu
        $rspayment = Billing::with('customer')->where('billing_id', $paymentId)->first();

        $customerId = session('customer_id');
        $depamt = Billing::where('customer_id', $customerId)
            ->where('status', 'Active')
            ->where('payment_type', 'Deposit')
            ->sum('purchase_amount');

        $widamt = Payment::where('customer_id', $customerId)
            ->where('status', 'Active')
            ->where('payment_type', 'Bid')
            ->sum('paid_amount');
        // Kiểm tra xem có thanh toán nào được tìm thấy hay không
        if (!$rspayment) {
            // Xử lý khi không tìm thấy thanh toán, ví dụ: redirect về trang trước đó hoặc hiển thị thông báo lỗi
            return redirect()->back()->with('error', 'Payment not found.');
        }

        // Trả về view receipt và truyền dữ liệu của thanh toán
        return view('receipt', compact('rspayment', 'depamt', 'widamt'));
    }

}
