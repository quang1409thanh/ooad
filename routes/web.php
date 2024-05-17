<?php

use App\Http\Controllers\BiddingController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\SSEController;
use App\Http\Controllers\WinnerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;

// common
Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/product/{id}', [\App\Http\Controllers\ProductController::class, 'show'])->name('product.show');

Route::get('/about-us', [HomeController::class, 'about'])->name('about');

Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/logout', [\App\Http\Controllers\CustomerController::class, 'logout'])->name('logout');
Route::get('/auction/{auctiontype}', [\App\Http\Controllers\HomeController::class, 'showAuction'])->name('auction');
//Route::get('/register_lock', [\App\Http\Controllers\EmployeeController::class, 'register_lock'])->name('register_lock');
Route::get('/search_product', [\App\Http\Controllers\HomeController::class, 'searchProduct'])->name('search_product');


// customer
Route::get('/register', [\App\Http\Controllers\HomeController::class, 'showRegistrationForm'])->name('register');
Route::get('/customer_login', [\App\Http\Controllers\HomeController::class, 'showLoginForm'])->name('customer_login');
Route::post('/register', [\App\Http\Controllers\CustomerController::class, 'register']);
Route::post('/customer_login', [\App\Http\Controllers\CustomerController::class, 'login']);
Route::get('/customer_account', [\App\Http\Controllers\CustomerController::class, 'customerAccount'])->name('customer_account');
Route::get('/customer_profile', 'ProductController@index')->name('customer.profile');
Route::get('/customer_change_password', 'ProductController@index')->name('customer_change_password');

Route::get('/pay_winning_bid/{winner_id}', [PaymentController::class, 'claimWinningBid'])
    ->name('pay.winning.bid');
Route::post('/payment-submit', [PaymentController::class, 'submitWinner'])->name('payment.submit');

Route::get('/customeraccount', 'ProductController@index')->name('customer.account');
//Route::get('/messagebox', 'ProductController@index')->name('message.box');
Route::get('/view_my_bid', 'ProductController@index')->name('view.my.bid');
//Route::get('/viewbillingcustomer', 'ProductController@index')->name('view_billing_customer');
Route::get('/selectcategory', 'ProductController@index')->name('add.products');
Route::get('/viewproduct', 'ProductController@index')->name('view.products');
//Route::get('/employeeviewreverseproduct', 'ProductController@index')->name('view.reverse.product');

Route::get('/customer_profile', [\App\Http\Controllers\CustomerController::class, 'customer_profile'])->name('customer_profile');
Route::get('/customer_change_password', [\App\Http\Controllers\CustomerController::class, 'customer_change_password'])->name('customer_change_password');
Route::get('/view_my_bid', [\App\Http\Controllers\CustomerController::class, 'view_my_bid'])->name('view_my_bid');
Route::get('/view_winning_bid', [\App\Http\Controllers\CustomerController::class, 'view_winning_bid'])->name('view_winning_bid');
Route::get('/reverse_bid_winner', [\App\Http\Controllers\CustomerController::class, 'reverse_bid_winner'])->name('reverse_bid_winner');
Route::get('/view_billing_customer', [\App\Http\Controllers\CustomerController::class, 'view_billing_customer'])->name('view_billing_customer');

Route::get('/step_add_product_1', [\App\Http\Controllers\ProductController::class, 'step_add_product_1'])->name('step_add_product_1');
Route::get('/product_store', [\App\Http\Controllers\ProductController::class, 'step_add_product_1'])->name('product.store');
Route::get('/my_products', [\App\Http\Controllers\ProductController::class, 'my_products'])->name('my_products');
Route::get('/step_add_product_2/{category_id}', [ProductController::class, 'step_add_product_2'])->name('step_add_product_2');
Route::get('/reverse_product/{categoryid}', [ProductController::class, 'reverse_product'])->name('reverse_product');
Route::get('/message_box', [\App\Http\Controllers\MessageController::class, 'message_box'])->name('message_box');
Route::get('/deposit', [\App\Http\Controllers\BillingController::class, 'deposit'])->name('deposit');
Route::post('/depositing', [\App\Http\Controllers\BillingController::class, 'store'])->name('depositing');
Route::get('/payment_receipt/{payment_id}', [\App\Http\Controllers\PaymentController::class, 'showReceipt'])->name('payment_receipt');
//Route::get('/receipt', [\App\Http\Controllers\PaymentController::class, 'showReceipt'])->name('payment_receipt');
Route::post('/post_bidding', [BiddingController::class, 'submitBidding'])->name('post_bidding');

// admin
Route::get('/employeeaccount', 'ProductController@index')->name('employee.account');
Route::get('/empprofile', 'ProductController@index')->name('employee.profile');
Route::get('/empchangepassword', 'ProductController@index')->name('emp.change.password');
Route::post('/employee_login', [\App\Http\Controllers\EmployeeController::class, 'login']);
Route::post('/accept_product/{id}', [\App\Http\Controllers\EmployeeController::class, 'accept_product'])->name('accept_product');

Route::post('/store_category', [\App\Http\Controllers\CategoryController::class, 'store'])->name('store_category');
Route::post('/product_store', [\App\Http\Controllers\ProductController::class, 'store'])->name('product_store');
Route::get('delete_category/{id}', [\App\Http\Controllers\CategoryController::class, 'destroy'])->name('delete_category');

Route::get('/employee_login', [\App\Http\Controllers\EmployeeController::class, 'employee_login'])->name('employee_login');

// quản lý nhân viên

Route::get('/view_employee', [EmployeeController::class, 'viewEmployee'])->name('view_employee');

// thêm danh mục
Route::get('/category', [\App\Http\Controllers\CategoryController::class, 'addCategory'])->name('category');
Route::get('/view_category', [\App\Http\Controllers\CategoryController::class, 'viewCategory'])->name('view_category');


Route::get('/employee_account', [\App\Http\Controllers\EmployeeController::class, 'employee_account'])->name('employee_account');

Route::get('/selectreversebidcategory', [ProductController::class, 'selectReverseBidCategory'])->name('select.reverse.bid.category');
Route::get('/view_reverse_product', [ProductController::class, 'view_reverse_product'])->name('view.reverse.product');
Route::get('/add_employee', [EmployeeController::class, 'addEmployee'])->name('add_employee');
Route::get('/view_customer', [CustomerController::class, 'viewCustomer'])->name('view_customer');
Route::get('/employeeaccount', [EmployeeController::class, 'employeeDashboard'])->name('employeeaccount');
Route::get('/employee_profile', [EmployeeController::class, 'employee_profile'])->name('employee_profile');
Route::get('/update_employee', [EmployeeController::class, 'update_employee'])->name('update_employee');
Route::post('/update_password', [EmployeeController::class, 'update_password'])->name('update_password');
Route::get('/update_price/{product_id}', [SSEController::class, 'stream'])->name('update_price');
Route::get('/change_password', [EmployeeController::class, 'change_password'])->name('employee_change_password');

Route::get('/view_bidding_product', [BiddingController::class, 'viewBiddingProduct'])->name('view_bidding_product');
Route::get('/close_bidding_product', [BiddingController::class, 'closeBiddingProduct'])->name('close_bidding_product');
Route::get('/view_winners', [WinnerController::class, 'viewWinners'])->name('view_winners');
Route::get('/view_billing', [\App\Http\Controllers\BillingController::class, 'viewBilling'])->name('view_billing');
Route::get('/view_customer_report', [CustomerController::class, 'viewCustomer'])->name('view_customer_report');
Route::get('/view_message', [\App\Http\Controllers\MessageController::class, 'viewMessages'])->name('view_message');
Route::get('/view_payment', [\App\Http\Controllers\PaymentController::class, 'viewPayment'])->name('view_payment');
Route::get('/products_view', [\App\Http\Controllers\ProductController::class, 'products_view'])->name('products_view');

Route::get('/chat/{productid}', [\App\Http\Controllers\MessageController::class, 'getMessages'])->name('chat');
Route::post('/send-message', [\App\Http\Controllers\MessageController::class, 'sendMessage'])->name('send-message');
Route::get('/load-messages/{productid}', [\App\Http\Controllers\MessageController::class, 'loadMessages'])->name('load-messages');
Route::get('/loadmessages/{productid}', [\App\Http\Controllers\MessageController::class, 'loadBoxMessages'])->name('loadmessages');
Route::post('/chatmessage', [\App\Http\Controllers\MessageController::class, 'store'])->name('chatmessage.store');


//customer.


// tiếp
//thêm chức năng


//Route::get('/logout', [\App\Models\Message::class, 'logout'])->name('logout');


//Route::get('/customerlogin', 'ProductController@showLoginForm')->name('customer_login');
//Route::post('/logout', 'ProductController@logout')->name('logout');
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
Route::get('/sse', [SSEController::class, 'stream'])->name('see');
Route::get('/sse-updates', [SSEController::class, 'sendSSE'])->name('sse-updates');
