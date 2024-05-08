<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index()
    {
        $products = Product::all(); // Lấy tất cả sản phẩm từ cơ sở dữ liệu
//        dd($products);
//        return view('products.index', compact('products')); // Truyền biến $products sang view
        $categories = Category::all();
        return view('home',compact('products','categories'));
    }

    public  function about()
    {
        $categories = Category::all();
        return view('about-us', compact('categories'));
    }public  function contact()
    {
        $categories = Category::all();
        return view('contact', compact('categories'));
    }


    public function showRegistrationForm()
    {
        return view('auth.register');
    }
}
