<?php

use App\Http\Controllers\BiddingController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\WinnerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index']);
Route::get('/product/{id}', [\App\Http\Controllers\ProductController::class, 'show'])->name('product.show');

//Route::get('/product/{id}', 'ProductController@show')->name('product.show')/;
Route::get('/about-us', [HomeController::class, 'about'])->name('about');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');


Route::get('/customeraccount', 'ProductController@index')->name('customer.account');
//Route::get('/messagebox', 'ProductController@index')->name('message.box');
Route::get('/view_my_bid', 'ProductController@index')->name('view.my.bid');
Route::get('/viewbillingcustomer', 'ProductController@index')->name('view_billing_customer');
Route::get('/selectcategory', 'ProductController@index')->name('add.products');
Route::get('/viewproduct', 'ProductController@index')->name('view.products');
Route::get('/customer_profile', 'ProductController@index')->name('customer.profile');
Route::get('/customer_change_password', 'ProductController@index')->name('customer_change_password');
Route::get('/employeeselectreversebidcategory', 'ProductController@index')->name('select.reverse.bid.category');
Route::get('/employeeviewreverseproduct', 'ProductController@index')->name('view.reverse.product');
Route::get('/employeeaccount', 'ProductController@index')->name('employee.account');
Route::get('/empprofile', 'ProductController@index')->name('employee.profile');
Route::get('/empchangepassword', 'ProductController@index')->name('emp.change.password');

Route::get('/register', [\App\Http\Controllers\HomeController::class, 'showRegistrationForm'])->name('register');
Route::get('/customer_login', [\App\Http\Controllers\HomeController::class, 'showLoginForm'])->name('customer_login');
Route::get('/auction/{auctiontype}', [\App\Http\Controllers\HomeController::class, 'showAuction'])->name('auction');
Route::post('/register', [\App\Http\Controllers\CustomerController::class, 'register']);
Route::get('/register_lock', [\App\Http\Controllers\EmployeeController::class, 'register_lock'])->name('register_lock');

Route::post('/customer_login', [\App\Http\Controllers\CustomerController::class, 'login']);
Route::post('/employee_login', [\App\Http\Controllers\EmployeeController::class, 'login']);
Route::get('/customeraccount', [\App\Http\Controllers\CustomerController::class, 'customeraccount'])->name('customeraccount');
Route::get('/employee_account', [\App\Http\Controllers\EmployeeController::class, 'employee_account'])->name('employee_account');
Route::get('/customer_profile', [\App\Http\Controllers\CustomerController::class, 'customer_profile'])->name('customer_profile');
Route::get('/customer_change_password', [\App\Http\Controllers\CustomerController::class, 'customer_change_password'])->name('customer_change_password');
Route::get('/view_my_bid', [\App\Http\Controllers\CustomerController::class, 'view_my_bid'])->name('view_my_bid');
Route::get('/view_winning_bid', [\App\Http\Controllers\CustomerController::class, 'view_winning_bid'])->name('view_winning_bid');
Route::get('/reverse_bid_winner', [\App\Http\Controllers\CustomerController::class, 'reverse_bid_winner'])->name('reverse_bid_winner');
Route::get('/view_billing_customer', [\App\Http\Controllers\CustomerController::class, 'view_billing_customer'])->name('view_billing_customer');
Route::get('/step_add_product_1', [\App\Http\Controllers\ProductController::class, 'step_add_product_1'])->name('step_add_product_1');
Route::get('/product_store', [\App\Http\Controllers\ProductController::class, 'step_add_product_1'])->name('product.store');
Route::get('/products_view', [\App\Http\Controllers\ProductController::class, 'products_view'])->name('products_view');
Route::get('/step_add_product_2/{categoryid}', [ProductController::class, 'step_add_product_2'])->name('step_add_product_2');
Route::get('/message_box', [\App\Http\Controllers\MessageController::class, 'message_box'])->name('message_box');
Route::get('/deposit', [\App\Http\Controllers\BillingController::class, 'deposit'])->name('deposit');
Route::get('/employee_login', [\App\Http\Controllers\EmployeeController::class, 'employee_login'])->name('employee_login');

Route::get('/selectreversebidcategory', [ProductController::class, 'selectReverseBidCategory'])->name('selectreversebidcategory');
Route::get('/viewreverseproduct', [ProductController::class, 'viewReverseProduct'])->name('viewreverseproduct');
Route::get('/employee', [EmployeeController::class, 'addEmployee'])->name('employee');
Route::get('/viewemployee', [EmployeeController::class, 'viewEmployee'])->name('viewemployee');
Route::get('/viewcustomer', [CustomerController::class, 'viewCustomer'])->name('viewcustomer');
Route::get('/category', [\App\Models\Message::class, 'addCategory'])->name('category');
Route::get('/viewcategory', [\App\Models\Message::class, 'viewCategory'])->name('viewcategory');
Route::get('/viewbiddingproduct', [BiddingController::class, 'viewBiddingProduct'])->name('viewbiddingproduct');
Route::get('/closebiddingproduct', [BiddingController::class, 'closeBiddingProduct'])->name('closebiddingproduct');
Route::get('/viewwinners', [WinnerController::class, 'viewWinners'])->name('viewwinners');
Route::get('/viewbilling', [\App\Models\Message::class, 'viewBilling'])->name('viewbilling');
Route::get('/viewmessage', [\App\Models\Message::class, 'viewMessages'])->name('viewmessage');
Route::get('/viewpayment', [\App\Models\Message::class, 'viewPayment'])->name('viewpayment');
Route::get('/viewproduct', [\App\Models\Message::class, 'viewProducts'])->name('viewproduct');
Route::get('/employeeaccount', [EmployeeController::class, 'employeeDashboard'])->name('employeeaccount');
Route::get('/empprofile', [EmployeeController::class, 'myProfile'])->name('empprofile');
Route::get('/empchangepassword', [EmployeeController::class, 'changePassword'])->name('empchangepassword');
Route::get('/logout', [\App\Models\Message::class, 'logout'])->name('logout');


//Route::get('/customerlogin', 'ProductController@showLoginForm')->name('customer_login');
Route::post('/logout', 'ProductController@logout')->name('logout');
Route::get('/searchproduct', 'ProductController@search')->name('searchproduct');
Route::get('/view_blockchain', 'ProductController@search')->name('view_blockchain');
Route::get('/featured', 'ProductController@search')->name('featured');
Route::get('/upcominauction', 'ProductController@search')->name('upcominauction');
Route::get('/closingauctions', 'ProductController@search')->name('closingauctions');
Route::get('/latestauction', 'ProductController@search')->name('latestauction');
Route::get('/closed', 'ProductController@search')->name('closed');
Route::get('/displayreversebid', 'ProductController@search')->name('displayreversebid');

Route::get('/token', function () {
    return csrf_token();
});
