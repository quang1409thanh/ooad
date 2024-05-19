<?php

namespace App\Http\Controllers;

use App\Models\Billing;
use App\Models\Customer;
use App\Models\Payment;
use App\Models\Winner;
use Dotenv\Validator;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        // Retrieve payment information with customer relationship
        $payment = Billing::with('customer')
            ->where('billing_id', $paymentId)
            ->first();

        // If payment information is not found, handle the error
        if (!$payment) {
            return redirect()->back()->with('error', 'Payment not found.');
        }
        // Retrieve the current customer's ID from session
        $customerId = session('customer_id');

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

        // Return the receipt view with payment information and calculated amounts
        return view('receipt', compact('payment', 'depamt', 'widamt', 'refund'));
    }

    public function claimWinningBid($id)
    {
        $winner = Winner::where('product_id', $id)->first();
        return view('customer.claim_winning_bid', compact('winner'));
    }

    public function submitWinner(Request $request)
    {

        try {
            DB::beginTransaction();

            // Handle file upload
            $image = $request->file('file');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('imgwinner'), $imageName);

            // Update customer
            $customer = Customer::find($request->customer_id);
            $customer->update([
                'address' => $request->address,
                'state' => $request->state,
                'city' => $request->city,
                'landmark' => $request->landmark,
                'pincode' => $request->pincode,
                'mobile_no' => $request->mobile_no,
            ]);

            // Update winner
            $winner = Winner::where('product_id', $request->product_id)->first();
            // fixme: cho nay xac dinh dung chua ??
            if ($winner) {
                $winner->update([
                    'winners_image' => $imageName,
                    'status' => 'Active',
                ]);
            }

            $billing = Billing::create([
                'delivery_date' => date('Y-m-d'),
                'note' => "null",
                'purchase_date' => now(),
                'product_id' => $request->product_id,
                'purchase_amount' => $request->paid_amount,
                'payment_type' => 'Winners',
                'card_type' => $request->card_type,
                'card_number' => $request->card_number,
                'expire_date' => $request->expire_date . '-01',
                'cvv_number' => $request->cvv_number,
                'card_holder' => $request->card_holder,
                'status' => 'Active',
                'customer_id' => $request->customer_id,
            ]);

            DB::commit();

            alert()->info("You have paid Rs. {$request->paid_amount} successfully for winning bid...");

            return redirect()->route('payment_receipt', ['payment_id' => $billing->billing_id]);

        } catch (\Exception $e) {
            DB::rollBack();
            alert()->error("Đã có lỗi", $e->getMessage());
            // Log the error or handle it as necessary
            return redirect()->back()->with('error', 'Payment failed. Please try again.');
        }

    }

}
