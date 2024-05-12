<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class BiddingController extends Controller
{
    //
    public function index()
    {

    }

    public function viewBiddingProduct()
    {
        $products = Product::all();
        return view('employee.bidding_product',compact('products'));
    }

    public function closeBiddingProduct() {
        $products = Product::all();
        return view('employee.close_bidding_product',compact('products'));
    }
}
