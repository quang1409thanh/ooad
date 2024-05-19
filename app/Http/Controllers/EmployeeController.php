<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Employee;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

            alert()->error('Đăng nhập Thất bại', 'Vui lòng kiểm tra lại thông tin đăng nhập');
            return redirect()->route('employee_login')->with('error', 'Invalid credentials');
            // define router login after.
        }
        session(['employee_id' => $employee->employee_id]);
        alert()->success('Đăng nhập Thành công', 'Chúc mừng bạn đã đăng nhập thành công');

        // Redirect sau khi đăng nhập thành công
        return redirect()->route('employee_account'); // Redirect to customer account page

    }

    public function employee_account()
    {
        return view('employee.employee_account');
    }

    public function employee_profile()
    {
        return view('employee.employee_profile');
    }

    public function update_employee()
    {

    }

    public function change_password()
    {
        return view('employee.change_password');
    }

    public function viewEmployee()
    {
        $employees = Employee::all();
        return view('employee.view_employee', compact('employees'));
    }

    public function addEmployee()
    {
        $employee_types = Employee::all();
        $statuses = Customer::all();
        return view('employee.add_employee', compact('employee_types', 'statuses'));
    }

    public function accept_product($id)
    {
        DB::beginTransaction();

        try {
            // Find the product by ID, or fail
            $product = Product::findOrFail($id);

            // Update the status field to 'Active'
            $product->status = 'Active';

            // Save the changes
            $product->save();

            DB::commit();

            alert()->success('Thành công', 'Sản phẩm đã được lên sàn đấu giá');
            return redirect()->route('products_view');

        } catch (\Exception $e) {
            DB::rollBack();
            // Optionally, log the error or handle it
            alert()->error('Lỗi', 'Đã có lỗi trong quá trình thực hiện');
            return redirect()->route('products_view');
        }
    }
}
