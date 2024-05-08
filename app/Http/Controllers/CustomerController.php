<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Customer;

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
        $customer->password = bcrypt($validatedData['password']); // Encrypt the password
        $customer->mobile_no = $validatedData['mobile_no'];
        $customer->status = 'Active';
        $customer->save();

        // Redirect the user after successful registration
        return redirect()->route('customer.login')->with('success', 'Customer Registration done successfully.');
    }

    public function login(Request $request)
    {
//        // Validate the request data
//        $validatedData = $request->validate([
//            'email_id' => 'required|email',
//            'password' => 'required|string',
//        ]);
//
//        // Attempt to authenticate the customer
//        if (auth()->attempt($validatedData)) {
//            // Authentication success
//            return redirect()->intended('/'); // Redirect to home page or intended URL
//        } else {
//            // Authentication failed
//            return redirect()->back()->withInput()->withErrors(['email_id' => 'Invalid credentials']);
//        }
    }


}
