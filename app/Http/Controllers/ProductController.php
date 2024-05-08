<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function show($id)
    {
        // Lấy sản phẩm từ ID
        $product = Product::find($id);
        $products = Product::all(); // Lấy tất cả sản phẩm từ cơ sở dữ liệu
//        dd($products);
//        return view('products.index', compact('products')); // Truyền biến $products sang view
        $categories = Category::all();
        $similarProducts = Product::all();
        $product_images = $product->product_image;
        $category = $product->category->category_name;
        dd($category);
// Phân tách chuỗi thành một mảng các đường dẫn
        $images = explode(',', $product_images);
//        dd($image_paths);


        // Trả về view và truyền sản phẩm vào view
        return view('product_show', ['product' => $product], compact('products', 'categories', 'similarProducts', 'images'));
    }

}
