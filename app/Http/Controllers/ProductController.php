<?php

namespace App\Http\Controllers;

use App\Models\Bidding;
use App\Models\Category;
use App\Models\Message;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\StreamedResponse;

class ProductController extends Controller
{
    //
    public function show($id)
    {

        try {
            $product = Product::findOrFail($id);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            // Xử lý khi không tìm thấy sản phẩm
            abort(404); // Trả về trang lỗi 404
        }

        $messages_send = Message::where('product_id', $id)
            ->where('sender_id', session('customer_id'))
            ->get();

        $messages_receive = Message::where('product_id', $id)
            ->where('receiver_id', session('customer_id'))
            ->get();
        $messages = $messages_send->merge($messages_receive)->sortBy('created_at');

        // Lấy sản phẩm từ ID
        $product = Product::find($id);
        $products = Product::all(); // Lấy tất cả sản phẩm từ cơ sở dữ liệu
        $categories = Category::all();
        $similarProducts = Product::where('category_id', '=', $product->category_id)->get();
        $bidder_list = Bidding::with('customer')
            ->where('product_id', $id)
            ->orderBy('bidding_id', 'DESC')
            ->get();

        return view('product_show', ['product' => $product], compact('products', 'categories', 'similarProducts', 'bidder_list', 'messages'));
    }

    public function store(Request $request)
    {
        // Start a transaction
        DB::beginTransaction();

        try {
            // Validate form data
            $validatedData = $request;
//                ->validate([
//                'product_name' => 'required|string|max:255',
//                'category_id' => 'required|exists:categories,category_id',
//                'product_description' => 'nullable|string',
//                'starting_bid' => 'required|numeric',
//                'start_date_time' => 'required|date',
//                'end_date_time' => 'required|date|after:start_date_time',
//                'product_cost' => 'required|numeric',
//                'product_delivery' => 'required|string|max:255',
//                'company_name' => 'required|string|max:255',
//                'status' => 'required|in:Active,Inactive',
//                'product_image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
//            ]);

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
            $product = Product::create([
                'customer_id' => session('customer_id'),
                'product_name' => $validatedData['product_name'],
                'category_id' => $validatedData['category_id'],
                'product_description' => $validatedData['product_description'],
                'starting_bid' => $validatedData['starting_bid'],
                'ending_bid' => 0,
                'start_date_time' => $validatedData['start_date_time'],
                'end_date_time' => $validatedData['end_date_time'],
                'product_cost' => $validatedData['product_cost'],
                'product_warranty' => "100 years",
                'product_delivery' => $validatedData['product_delivery'],
                'company_name' => $validatedData['company_name'],
                'status' => $validatedData['status'],
                'product_image' => json_encode($imagePaths), // Store image paths as JSON array
            ]);

            // Commit the transaction if all operations are successful
            DB::commit();

            // Display success message
            alert()->success('Thành Công', 'Bạn đã thêm sản phẩm thành công');
            return redirect()->back()->with('success', 'Product created successfully!');
        } catch (\Exception $e) {
            // Rollback the transaction if an exception occurs
            DB::rollback();

            // Display error message
            alert()->error('Lỗi', $e->getMessage());
            return redirect()->back()->with('error', 'Error occurred while creating the product. Please try again later.');
        }
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
