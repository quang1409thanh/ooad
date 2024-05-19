<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\StreamedResponse;

class SSEController extends Controller
{
    //
    public function stream(Request $request, $id)
    {
        $queryParam = $request->query('quert');
        $product = Product::where('product_id', $id)->first();
        if ($queryParam !== $product->ending_bid) {
            $message = "Sản phẩm chưa có cập nhật mới";
        } else {
            $message = "Sản phẩm đã được cập nhật mới";
        }
        if ($product) {
            return response()->json([
                'message' => $message,
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
