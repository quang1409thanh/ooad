<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
    //
    public function employee_login()
    {
        return view('employee.employee_login');
    }

    public function login(Request $request)
    {

        $credentials = $request->only('email', 'password');
        // Kiểm tra thông tin đăng nhập từ bảng customer
        $employee = Employee::where('login_id', $credentials['email'])->first();

        if (!$employee || !Hash::check($credentials['password'], $employee->password)) {
            return redirect()->route('login')->with('error', 'Invalid credentials');
            // define router login after.
        }
        session(['employee_id' => $employee->employee_id]);

        // Redirect sau khi đăng nhập thành công
        return redirect()->route('employee_account'); // Redirect to customer account page

    }

    public function employee_account()
    {
        return view('employee.employee_account');
    }

    public function register_lock(Request $request)
    {
        // Validate the request data
        // Create a new customer record
        $employee = new Employee();
        $employee->employee_name = "admin@gmail.com";
        $employee->login_id = "AdminNe";
        $employee->password = Hash::make("Thanh12345678"); // Encrypt the password
        $employee->employee_type = "Admin";
        $employee->status = 'Active';
        $employee->save();

        // Redirect the user after successful registration
        return redirect()->route('employee_login')->with('success', 'Customer Registration done successfully.');

    }

}
