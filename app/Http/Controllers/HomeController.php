<?php

namespace App\Http\Controllers;

use App\Blockchain\Blockchain;
use App\Models\Category;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index()
    {
        $now = Carbon::now(); // Current date and time
        $today = Carbon::today(); // Today's date
        $startOfDay = $today->startOfDay();
        $endOfDay = $today->endOfDay();

        // Common condition for active products with a customer
        $activeWithCustomer = ['status' => 'Active', ['customer_id', '!=', '0']];

        // Latest products
        // Lấy các sản phẩm từ query đầu tiên
        $latest_products = Product::where($activeWithCustomer)
            ->where('start_date_time', '<=', $now)
            ->orderBy('updated_at', 'desc')
            ->get();

//        // Lấy các sản phẩm từ query thứ hai
//        $latest_products1 = Product::where($activeWithCustomer)
//            ->where('start_date_time', '<=', $now)
//            ->get();
//
//        // Hợp nhất hai tập hợp và loại bỏ các sản phẩm trùng lặp (nếu có)
//        $latest_products_unsorted = $latest_products0->merge($latest_products1)->unique('product_id');
//
//        // Sắp xếp lại tập hợp, ưu tiên các sản phẩm có ending_bid khác 0 lên trước và sắp xếp theo updated_at giảm dần
//        $latest_products = $latest_products_unsorted->sortBy(function ($product) {
//            // Chuyển ending_bid thành giá trị boolean, sản phẩm có ending_bid khác 0 sẽ được xếp trước
//            return $product->ending_bid == '0';
//        })->values()->sortByDesc('updated_at'); // Sau đó sắp xếp theo updated_at giảm dần
//
//        // Convert to a collection and reindex
//        $latest_products = $latest_products->values();


        // Featured products
        $featured_products = Product::where($activeWithCustomer)
            ->where('end_date_time', '>', $now)
            ->orderByDesc('product_id')
            ->get();
        $featured_products = $featured_products->sortByDesc(function ($product) {
            return [$product->countBidders(), $product->countBids()];
        });

        // Upcoming products
        $upcoming_products = Product::where($activeWithCustomer)
            ->where('start_date_time', '>', $now)
            ->orderByDesc('product_id')
            ->get();

        // Closing products
        $closing_products = Product::where($activeWithCustomer)
            ->whereBetween('end_date_time', [$startOfDay, $endOfDay])
            ->orderByDesc('product_id')
            ->get();

        // Closed products
        $closed_products = Product::where($activeWithCustomer)
            ->where('end_date_time', '<', $now)
            ->orderByDesc('product_id')
            ->get();

        return view('home', compact('latest_products', 'featured_products', 'upcoming_products', 'closing_products', 'closed_products'));
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
    {
        // Fetch all active categories
        $categories = Category::where('status', 'Active')->get();

        // Function to get products based on conditions
        $getProducts = function ($categoryId, $conditions) {
            return Product::where('status', 'Active')
                ->where('category_id', $categoryId)
                ->where($conditions)
                ->orderByDesc('product_id')
                ->get();
        };

        // Prepare the categories with product count and products
        $categoriesWithProductCount = $categories->map(function ($category) use ($getProducts, $auctiontype) {
            $now = Carbon::now();
            $todayStart = $now->startOfDay();
            $todayEnd = $now->endOfDay();

            switch ($auctiontype) {
                case 'Latest Auctions':
                    $conditions = [
                        ['start_date_time', '<=', $now],
                        ['customer_id', '!=', '0']
                    ];
                    break;
                case 'Featured Auctions':
                    $conditions = [
                        ['end_date_time', '>', $now],
                        ['customer_id', '!=', '0']
                    ];
                    break;
                case 'Upcoming Auctions':
                    $conditions = [
                        ['start_date_time', '>', $now],
                        ['customer_id', '!=', '0']
                    ];
                    break;
                case 'Closing Auctions':
                    $conditions = [
                        ['end_date_time', '>=', $todayStart],
                        ['end_date_time', '<=', $todayEnd],
                        ['customer_id', '!=', '0']
                    ];
                    break;
                case 'Closed Auctions':
                    $conditions = [
                        ['end_date_time', '<', $now],
                        ['customer_id', '!=', '0']
                    ];
                    break;
                case 'Trending Auction':
                    $conditions = [];
                    break;
                default:
                    $conditions = [
                        ['status', '=', 'Active']
                    ];
                    break;
            }

            $getProducts = function ($categoryId, $conditions) {
                return Product::where('status', 'Active')
                    ->where('category_id', $categoryId)
                    ->where($conditions)
                    ->orderByDesc('product_id')
                    ->get();
            };


            $products = $getProducts($category->category_id, $conditions);
            $products = $products->sortByDesc(function ($product) {
                return [$product->countBidders(), $product->countBids()];
            });
            return [
                'category_id' => $category->category_id,
                'category_name' => $category->category_name,
                'active_product_count' => $products->count(),
                'products' => $products,
            ];
        });

        $categoriesWithProductCount = $categoriesWithProductCount->toArray();

        // Handle the 'Winners Blockchain' separately
        if ($auctiontype === 'Winners Blockchain') {
            $data = \App\Models\Blockchain::all();
            return view('customer.view_block_chain', compact('data', 'categories'));
        }

        return view('auction.latest_auctions', compact('categoriesWithProductCount', 'auctiontype'));
    }


    public function searchProduct(Request $request)
    {
        // Fetch all active categories
        $categories = Category::where('status', 'Active')->get();

        // Initialize the array to store categories with product count
        $categoriesWithProductCount = [];

        // Fetch search criteria
        $searchCriteria = $request->input('searchcriteria');
        $searchCategoryId = $request->input('searchcategory_id');

        // Build the base query for products
        $query = Product::where('status', 'Active')
            ->where('product_name', 'like', '%' . $searchCriteria . '%')
            ->orderByDesc('product_id');

        // If a specific category is selected, filter by category
        if ($searchCategoryId) {
            $category = Category::where('category_id', $searchCategoryId)->first();
            if ($category) {
                $query->where('category_id', $category->category_id);
                $products = $query->get();
                $categoriesWithProductCount[] = [
                    'category_id' => $category->category_id,
                    'category_name' => $category->category_name,
                    'active_product_count' => $products->count(),
                    'products' => $products,
                ];
            }
        } else {
            // If no specific category is selected, search across all categories
            foreach ($categories as $category) {
                $products = (clone $query)->where('category_id', $category->category_id)->get();
                if ($products->count() > 0) {
                    $categoriesWithProductCount[] = [
                        'category_id' => $category->category_id,
                        'category_name' => $category->category_name,
                        'active_product_count' => $products->count(),
                        'products' => $products,
                    ];
                }
            }
        }

        return view('product.search_product', compact('categories', 'categoriesWithProductCount'));
    }

}
