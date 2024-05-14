<?php

namespace App\Http\Controllers;

use App\Blockchain\Blockchain;
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
//        dd();
        return view('home', compact('products', 'categories'));
    }

    public function about()
    {
        $categories = Category::all();
        return view('about-us', compact('categories'));
    }

    public function contact()
    {
        $categories = Category::all();
        return view('contact', compact('categories'));
    }


    public function showRegistrationForm()
    {
        $categories = Category::all();

        return view('auth.register', compact('categories'));
    }

    public function showLoginForm()
    {
        $categories = Category::all();

        return view('auth.login', compact('categories'));
    }

    public function showAuction($auctiontype)
    {// Lấy tất cả các danh mục có trạng thái là 'Active'
        $categories_i = Category::where('status', 'Active')->get();

        foreach ($categories_i as $category) {
            // Lấy tất cả các sản phẩm thuộc danh mục này, có trạng thái là 'Active',
            // ngày giờ bắt đầu nhỏ hơn hoặc bằng thời điểm hiện tại, và không phải của khách hàng '0'
            $products = Product::where('status', 'Active')
                ->where('category_id', $category->category_id)
                ->where('start_date_time', '<=', now()) // Giả sử 'now()' trả về thời gian hiện tại
                ->where('customer_id', '!=', '0')
                ->get(); // Thực hiện truy vấn và lấy dữ liệu

            // Xử lý dữ liệu sản phẩm ở đây
        }


        $categories = Category::all();
        // Xử lý logic để chuyển hướng đến view tương ứng dựa trên $auctiontype
        switch ($auctiontype) {
            case 'Winners Blockchain':
                // Xử lý cho trường hợp Winners Blockchain
                $data = \App\Models\Blockchain::all();
                return view('customer.view_block_chain', compact('data', 'categories'));
//                $products = Product::where('status', 'Active')->get();
                break;
            case 'Latest Auctions':
                $products = [];

                $categories_i = Category::where('status', 'Active')->get();
//                foreach ($categories_i as $category) {
//                    // Lấy tất cả các sản phẩm thuộc danh mục này, có trạng thái là 'Active',
//                    // ngày giờ bắt đầu nhỏ hơn hoặc bằng thời điểm hiện tại, và không phải của khách hàng '0'
//                    $productsInCategory = Product::where('status', 'Active')
//                        ->where('category_id', $category->category_id)
//                        ->where('start_date_time', '<=', now()) // Giả sử 'now()' trả về thời gian hiện tại
//                        ->where('customer_id', '!=', '0')
//                        ->orderBy('product_id', 'DESC')
//                        ->limit(3)
//                        ->get(); // Thực hiện truy vấn và lấy dữ liệu
//
//                    // Thêm tất cả các sản phẩm của danh mục vào mảng $products
//                    $products = array_merge($products, $productsInCategory->toArray());
//                }
                $products = Product::where('status', 'Active')->get();

                // Xử lý cho trường hợp Latest Auctions
//                return view('auction.latest_auctions', compact('categories', 'auctiontype', 'products'));
                break;
            case 'Featured Auctions':
                $products = Product::where('status', 'Active')->get();

                // Xử lý cho trường hợp Featured Auctions
//                return view('auction.featured_auctions', compact('categories', 'auctiontype', 'products'));
                break;
            case 'Upcoming Auctions':
                // Xử lý cho trường hợp Upcoming Auctions
//                return view('auction.upcoming_auctions', compact('categories', 'auctiontype'));

                $products = Product::where('status', 'Active')->get();
                break;
            case 'Closing Auctions':
                // Xử lý cho trường hợp Closing Auctions
//                return view('auction.closing_auctions', compact('categories', 'auctiontype'));
                $products = Product::where('status', 'Active')->get();
                break;
            case 'Closed Auctions':
                // Xử lý cho trường hợp Closed Auctions
//                return view('auction.closed_auctions', compact('categories', 'auctiontype'));
                $products = Product::where('status', 'Active')->get();
                break;
            case 'Reverse Bid':
                // Xử lý cho trường hợp Reverse Bid
//                return view('auction.reverse_bid', compact('categories', 'auctiontype'));
                $products = Product::where('status', 'Active')->get();
                break;
            default:
                // Trong trường hợp không tìm thấy $auctiontype nào phù hợp, có thể redirect hoặc trả về một trang lỗi
                $products = Product::where('status', 'Active')->get();
                abort(404);
                break;
        }
        return view('auction.latest_auctions', compact('categories', 'auctiontype', 'products'));

    }
    // auction controller


}
