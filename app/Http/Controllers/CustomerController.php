<?php

namespace App\Http\Controllers;

use App\Models\Billing;
use App\Models\Category;
use App\Models\Payment;
use App\Models\Winner;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    //
    public function register(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'customer_name' => 'required|string|max:255',
            'email_id' => 'required|email|unique:customers,email_id',
            'password' => 'required|string|min:6',
            'mobile_no' => 'required|string|max:15',
        ]);

        // Create a new customer record
        $customer = new Customer();
        $customer->customer_name = $validatedData['customer_name'];
        $customer->email_id = $validatedData['email_id'];
        $customer->password = Hash::make($validatedData['password']); // Encrypt the password
        $customer->mobile_no = $validatedData['mobile_no'];
        $customer->status = 'Active';
        $customer->save();

        // Redirect the user after successful registration
        return redirect()->route('customer_login')->with('success', 'Customer Registration done successfully.');
    }

    public function login(Request $request)
    {

        $credentials = $request->only('email_id', 'password');

        // Kiểm tra thông tin đăng nhập từ bảng customer
        $customer = Customer::where('email_id', $credentials['email_id'])->first();

        if (!$customer || !Hash::check($credentials['password'], $customer->password)) {
            // Xác thực thất bại
            return redirect()->route('login')->with('error', 'Invalid credentials');
        }
        session(['customer_id' => $customer->customer_id]);
        // Xác thực thành công, đăng nhập người dùng
//        Auth::login($customer);


        // Redirect sau khi đăng nhập thành công
        return redirect()->route('customeraccount'); // Redirect to customer account page

    }

    public function customeraccount()
    {
        $categories = Category::all();
        return view('customer.customeraccount', compact('categories'));
    }

    public function customer_profile()
    {
        $customer_id = session('customer_id');
        $customer = Customer::find($customer_id); // Giả sử bạn có một model Customer

        return view('customer.customer_profile', compact('customer'));
    }

    public function customer_change_password()
    {
        return view('customer.customer_change_password');
    }

    public function view_my_bid()
    {
        $customer_id = session('customer_id');
        $customer = Customer::find($customer_id);
        $payments = Payment::all();
        return view('customer.view_my_bid', compact('customer', 'payments'));

    }

    public function view_winning_bid()
    {
        $winners = Winner::all();
        return view('customer.view_winning_bid', compact('winners'));
    }

    public function reverse_bid_winner()
    {
        $winners = Winner::all();
        return view('customer.reverse_bid_winner', compact('winners'));
    }

    public function view_billing_customer()
    {
        $transactions = Billing::all();
        return view('customer.view_billing_customer', compact('transactions'));

    }
}
