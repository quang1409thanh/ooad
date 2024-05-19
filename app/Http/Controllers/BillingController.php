<?php

namespace App\Http\Controllers;

use App\Models\Billing;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BillingController extends Controller
{
    //
    public function deposit()
    {
        $customerId = session('customer_id');

        // Bắt đầu transaction
        DB::beginTransaction();

        try {
            $totalPurchaseAmount = Billing::where('customer_id', $customerId)
                ->where('status', 'Active')
                ->where('payment_type', 'Deposit')
                ->sum('purchase_amount');

            $totalPaidAmount = Payment::selectRaw('MAX(paid_amount) as max_paid_amount')
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

            // Commit transaction nếu không có lỗi xảy ra
            DB::commit();
        } catch (\Exception $e) {
            // Nếu có lỗi, rollback transaction và xử lý lỗi
            DB::rollback();
            // Ví dụ: log lỗi hoặc thông báo lỗi cho người dùng
            return response()->json(['error' => $e->getMessage()], 500);
        }

        // Trả về view với thông tin đã tính toán
        return view('deposit', compact('totalPurchaseAmount', 'totalPaidAmount','refund'));
    }

    public function store(Request $request)
    {
        // Sử dụng transaction để đảm bảo tính toàn vẹn của dữ liệu
        DB::beginTransaction();

        try {
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

            // Commit transaction nếu mọi thứ diễn ra thành công
            DB::commit();

            alert()->success('Thành Công', 'Bạn đã nạp tiền thành công');

            return redirect()->route('payment_receipt', ['payment_id' => $paymentId])->with('success', 'You have deposited Rs. ' . $request->input('paid_amount') . ' successfully...');
        } catch (\Exception $e) {
            // Nếu có lỗi xảy ra, rollback transaction
            DB::rollBack();
            alert()->error('Thất bại', 'Xem lại các thông tin!!!');
            // Trả về thông báo lỗi
            return back()->with('error', 'Error occurred: ' . $e->getMessage());
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
