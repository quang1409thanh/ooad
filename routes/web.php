<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index']);
Route::get('/product/{id}', [\App\Http\Controllers\ProductController::class, 'show'])->name('product.show');

//Route::get('/product/{id}', 'ProductController@show')->name('product.show')/;
Route::get('/about-us', [HomeController::class, 'about'])->name('about');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');


Route::get('/customeraccount', 'ProductController@index')->name('customer.account');
Route::get('/messagebox', 'ProductController@index')->name('message.box');
Route::get('/viewmybid', 'ProductController@index')->name('view.my.bid');
Route::get('/viewwinningbid', 'ProductController@index')->name('view.winning.bid');
Route::get('/reversebidwinner', 'ProductController@index')->name('reverse.bid.winner');
Route::get('/viewbillingcustomer', 'ProductController@index')->name('view.billing.customer');
Route::get('/selectcategory', 'ProductController@index')->name('add.products');
Route::get('/viewproduct', 'ProductController@index')->name('view.products');
Route::get('/customerprofile', 'ProductController@index')->name('customer.profile');
Route::get('/custchangepassword', 'ProductController@index')->name('cust.change.password');
Route::get('/employeeselectreversebidcategory', 'ProductController@index')->name('select.reverse.bid.category');
Route::get('/employeeviewreverseproduct', 'ProductController@index')->name('view.reverse.product');
Route::get('/employeeaccount', 'ProductController@index')->name('employee.account');
Route::get('/empprofile', 'ProductController@index')->name('employee.profile');
Route::get('/empchangepassword', 'ProductController@index')->name('emp.change.password');
Route::get('/register', 'HomeController@showRegistrationForm')->name('register');
Route::post('/register', 'ProductController@register');
Route::get('/customerlogin', 'ProductController@showLoginForm')->name('customer.login');
Route::post('/customerlogin', 'ProductController@login')->name('customerlogin');
Route::post('/logout', 'ProductController@logout')->name('logout');
Route::get('/searchproduct', 'ProductController@search')->name('searchproduct');
Route::get('/deposit', 'ProductController@search')->name('searchproduct');
Route::get('/view_blockchain', 'ProductController@search')->name('view_blockchain');
Route::get('/featured', 'ProductController@search')->name('featured');
Route::get('/upcominauction', 'ProductController@search')->name('upcominauction');
Route::get('/closingauctions', 'ProductController@search')->name('closingauctions');
Route::get('/latestauction', 'ProductController@search')->name('latestauction');
Route::get('/closed', 'ProductController@search')->name('closed');
Route::get('/displayreversebid', 'ProductController@search')->name('displayreversebid');
//Route::get('/deposit', 'ProductController@search')->name('searchproduct');

