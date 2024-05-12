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
        $session = session();
//        return view('products.index', compact('products')); // Truyền biến $products sang view
        $categories = Category::all();
        $similarProducts = Product::all();
        $product_images = $product->product_image;
        $category = $product->category->category_name;
//        dd($category);
// Phân tách chuỗi thành một mảng các đường dẫn
        $images = explode(',', $product_images);
//        dd($image_paths);


        // Trả về view và truyền sản phẩm vào view
        return view('product_show', ['product' => $product], compact('products', 'categories', 'similarProducts', 'images'));
    }

//    public function store(Request $request)
//    {
//        dd("test");
//
//    }
    public function store(Request $request)
    {
//        dd("test");

//        dd(request()->all());
        // Validate form data

        $validatedData = $request;
        // Process product image upload
        $imagePaths = [];
        if ($request->hasFile('product_image')) {
            foreach ($request->file('product_image') as $image) {
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('product_images'), $imageName);
                $imagePaths[] = $imageName;
            }
        }

        // Create new product
        Product::create([
            'customer_id' => session('customer_id'),
            'product_name' => $validatedData['product_name'],
            'category_id' => $validatedData['category_id'],
            'product_description' => $validatedData['product_description'],
            'starting_bid' => $validatedData['starting_bid'],
            'ending_bid' => 0,
            'start_date_time' => $validatedData['start_date_time'],
            'end_date_time' => $validatedData['end_date_time'],
            'product_cost' => $validatedData['product_cost'],
            'product_warranty' => "null",
            'product_delivery' => $validatedData['product_delivery'],
            'company_name' => $validatedData['company_name'],
            'status' => $validatedData['status'],
            'product_image' => json_encode($imagePaths), // Store image paths as JSON array
        ]);

        return redirect()->route('product.step_add_product_2')->with('success', 'Product created successfully!');
    }

    public function my_products()
    {
        $current_id = session('customer_id');
        $products = Product::where('customer_id', $current_id)->get();
        return view('product.my_products', compact('products'));
    }

    public function step_add_product_1()
    {
        $categories = Category::all();
        return view('product.step_add_product_1', compact('categories'));
    }

    public function step_add_product_2($id)
    {
        $category = Category::find($id);
        $arrimg = Product::all();
        $product = new Product(); // Lấy sản phẩm đầu tiên trong cơ sở dữ liệu
        return view('product.step_add_product_2', compact('category', 'arrimg', 'product', 'id'));
    }

    public function products_view()
    {
        $products = Product::all();
        return view('product.products_view', compact('products'));
    }

    public function selectReverseBidCategory()
    {
        $categories = Category::all();
        return view('product.selectReverseBidCategory', compact('categories'));
    }

    public function reverse_product($id)
    {
        $category = Category::find($id);
        $arrimg = Product::all();
        $product = new Product(); // Lấy sản phẩm đầu tiên trong cơ sở dữ liệu
        return view('product.reverse_product', compact('category', 'arrimg', 'product'));
    }

    public function view_reverse_product()
    {
        $products = Product::all();
        return view('product.view_reverse_product', compact('products'));
    }
}
