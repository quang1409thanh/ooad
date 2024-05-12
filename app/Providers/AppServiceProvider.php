<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Customer;
use App\Models\Employee;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        View::composer('header', function ($view) {
            // Thực hiện bất kỳ logic nào để truyền các giá trị cần thiết vào header ở đây
            $myBidCount = 1; // Lấy giá trị $myBidCount từ database hoặc bất kỳ nguồn dữ liệu nào khác
            $winningBidCount = 2; // Lấy giá trị $winningBidCount từ database hoặc bất kỳ nguồn dữ liệu nào khác
            $reverseBidCount = 3; // Lấy giá trị $reverseBidCount từ database hoặc bất kỳ nguồn dữ liệu nào khác
            $accbalamt = 100;
            $categories = Category::all();
            $cur = session()->get('customer_id');
            $customer = Customer::find($cur);
            $cure = session()->get('employee_id');
            $employee = Employee::find($cure);
            // Truyền các giá trị vào view
            $view->with('myBidCount', $myBidCount);
            $view->with('winningBidCount', $winningBidCount);
            $view->with('reverseBidCount', $reverseBidCount);
            $view->with('accbalamt', $accbalamt);
            $view->with('categories', $categories);
            $view->with('customer', $customer);
            $view->with('employee', $employee);

            // tại sao lấy được các giá trị này đúng là ??? vô lý vl/ ko có nó thi ko được khi ở trang đăng nhập.
        });
    }

}
