<?php

namespace App\Http\Controllers;

use App\Models\Bidding;
use App\Models\Billing;
use App\Models\Category;
use App\Models\Payment;
use App\Models\Winner;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

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
        DB::beginTransaction();

        try {
            // Create a new customer record
            $customer = new Customer();
            $customer->customer_name = $validatedData['customer_name'];
            $customer->email_id = $validatedData['email_id'];
            $customer->password = Hash::make($validatedData['password']); // Encrypt the password
            $customer->mobile_no = $validatedData['mobile_no'];
            $customer->status = 'Active';
            $customer->save();

            DB::commit();

            alert()->success('Đăng Ký Thành Công', 'Chúc mừng bạn đã đăng ký thành công');

            // Redirect the user after successful registration
            return redirect()->route('customer_login')->with('success', 'Customer Registration done successfully.');

        } catch (\Exception $e) {
            DB::rollBack();
            // Optionally, log the error or handle it
            return redirect()->route('customer_register')->with('error', 'An error occurred during registration. Please try again.');
        }
    }

    public function login(Request $request)
    {

        $credentials = $request->only('email_id', 'password');

        // Kiểm tra thông tin đăng nhập từ bảng customer
        $customer = Customer::where('email_id', $credentials['email_id'])->first();

        if (!$customer || !Hash::check($credentials['password'], $customer->password)) {
            // Xác thực thất bại
            alert()->error('Đăng nhập Thất bại', 'Vui lòng kiểm tra lại thông tin đăng nhập');
            return redirect()->route('customer_login');
        }
        session(['customer_id' => $customer->customer_id]);
        // Xác thực thành công, đăng nhập người dùng
        alert()->success('Đăng nhập Thành công', 'Chúc mừng bạn đã đăng nhập thành công');
//        Alert::success('Success Title', 'Success Message');
        // Redirect sau khi đăng nhập thành công
        return redirect()->route('customer_account'); // Redirect to customer account page

    }

    public function customerAccount()
    {
        $categories = Category::all();
        return view('customer.customer_account', compact('categories'));
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
        //
        $payments = Payment::select('product_id', DB::raw('MAX(payment_id) as payment_id'))
            ->where('customer_id', $customer_id)
            ->where('status', 'Active')
            ->groupBy('product_id')
            ->get();
        return view('customer.view_my_bid', compact('customer', 'payments'));

    }

    public function view_winning_bid()
    {
        $winners = Winner::select('winners.*', 'products.*', 'customers.*', 'products.product_id as proid', 'winners.status as winner_status')
            ->leftJoin('products', 'winners.product_id', '=', 'products.product_id')
            ->leftJoin('customers', 'winners.customer_id', '=', 'customers.customer_id')
            ->where(function ($query) {
                $query->where('winners.status', 'Pending')
                    ->orWhere('winners.status', 'Active');
            })
            ->where('winners.customer_id', '=', session('customer_id'))
            ->where('products.customer_id', '!=', '0')
            ->orderByDesc('winners.winner_id')
            ->get();
        // lấy thêm hình ảnh ra nữa là được.
        return view('customer.view_winning_bid', compact('winners'));
    }

    public function reverse_bid_winner()
    {
        $winners = Winner::select('winners.*', 'products.*', 'customers.*', 'products.product_id as proid', 'winners.status as winner_status')
            ->leftJoin('products', 'winners.product_id', '=', 'products.product_id')
            ->leftJoin('customers', 'winners.customer_id', '=', 'customers.customer_id')
            ->where(function ($query) {
                $query->where('winners.status', 'Pending')
                    ->orWhere('winners.status', 'Active');
            })
            ->where('winners.customer_id', '=', session('customer_id'))
            ->where('products.customer_id', '!=', '0')
            ->orderByDesc('winners.winner_id')
            ->get();
        return view('customer.reverse_bid_winner', compact('winners'));
    }

    public function view_billing_customer()
    {
        $transactions = Billing::where('customer_id', session('customer_id'))->get();
        return view('customer.view_billing_customer', compact('transactions'));

    }

    public function logout()
    {
        // Hủy phiên làm việc của người dùng
        auth()->logout();

        // Xóa tất cả các phiên làm việc của người dùng
        session()->flush();

        // Xóa phiên làm việc hiện tại của người dùng
        session()->regenerate();
        $products = Product::all(); // Lấy tất cả sản phẩm từ cơ sở dữ liệu
        $categories = Category::all();
        // Chuyển hướng về trang index
        return redirect()->route('home', compact('products', 'categories'));
    }

    public function viewCustomer()
    {
        $customers = Customer::all();
        return view('employee.view_customer', compact('customers'));
    }

}
