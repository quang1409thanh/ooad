<?php

namespace App\Http\Controllers;

use App\Models\Billing;
use App\Models\Payment;
use Illuminate\Http\Request;

class BillingController extends Controller
{
    //
    public function deposit()
    {
        $customerId = session('customer_id');
        $totalPurchaseAmount = Billing::where('customer_id', $customerId)
            ->where('status', 'Active')
            ->where('payment_type', 'Deposit')
            ->sum('purchase_amount');
        // Gọi phương thức trong model để lấy tổng paid_amount
        $totalPaidAmount = Payment::where('customer_id', $customerId)
            ->where('status', 'Active')
            ->where('payment_type', 'Bid')
            ->sum('paid_amount');

        return view('deposit', compact('totalPurchaseAmount', 'totalPaidAmount'));
    }

    public function store(Request $request)
    {
        // Lấy customer_id từ session
        $customerId = session('customer_id');

        // Tạo mới đối tượng Billing từ dữ liệu request
        $billing = Billing::create([
            'customer_id' => $customerId,
            'purchase_date' => now(),
            'purchase_amount' => $request->input('paid_amount'),
            'payment_type' => 'Deposit',
            'card_type' => $request->input('card_type'),
            'card_number' => $request->input('card_number'),
            'expire_date' => $request->input('expire_date') . '-01',
            'cvv_number' => $request->input('cvv_number'),
            'card_holder' => $request->input('card_holder'),
            'delivery_date' => now(),
            'status' => 'Active',
            'note' => 'null',
        ]);

        // Lấy id của thanh toán mới tạo
        $paymentId = $billing->billing_id;
//        dd($paymentId)

        // Kiểm tra xem việc thêm dữ liệu đã thành công hay không
        if ($billing) {
            return redirect()->route('payment_receipt', ['payment_id' => $paymentId])->with('success', 'You have deposited Rs. ' . $request->input('paid_amount') . ' successfully...');
        } else {
            return back()->with('error', 'Error occurred: ' . mysqli_error($con)); // Nếu sử dụng Laravel, thì không cần gọi hàm mysqli_error
        }
    }

    public function withdraw()
    {

    }

    public function viewBilling()
    {
        $billings = Billing::all();
        return view('employee.view_billing', compact('billings'));
    }
}
