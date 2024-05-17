<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\StreamedResponse;

class SSEController extends Controller
{
    //
    public function index()
    {
        return view('sse'); //for rendering sse blade file
    }


    public function getNewPrice()
    {

    }

    public function stream($id)
    {
        $product = Product::where('product_id', $id)->first();
        if ($product) {
            return response()->json([
                'success' => true,
                'currentBid' => $product->ending_bid,
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Product not found',
            ]);
        }
    }

}
