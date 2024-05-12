<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Online Auction</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="{{ url('img/favicon.ico') }}">
    <link rel="stylesheet" href="{{ url('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ url('css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ url('css/animate.css') }}">
    <link rel="stylesheet" href="{{ url('css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ url('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ url('css/mainmenu.css') }}">
    <link rel="stylesheet" href="{{ url('style.css') }}">
    <link rel="stylesheet" href="{{ url('css/responsive.css') }}">
    <link rel="stylesheet" href="{{ url('css/jquery.dataTables.min.css') }}">
    <script src="{{ url('js/vendor/modernizr-2.8.3.min.js') }}"></script>
    <style>
        .errormsg {
            color: red;
            padding-left: 5px;
        }
    </style>
</head>
<body style="overflow-x: hidden">

<div class="wrapper home-3">
    <header>
        <div class="header-top bg-black">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-2 col-md-3 md-custom-12">
                        <div class="logo">
                        </div>
                    </div>
                    <div class="col-lg-10 col-md-9 md-custom-12">
                        <div class="row">
                            @unless (session()->has('employee_id'))
                                <div class="col-lg-3 d-none d-lg-block">
                                    <div class="main-menu-area">
                                        <nav>
                                            <ul>
                                                <li><a href="/">Home</a></li>
                                                <li><a href="{{ route('about') }}">About</a></li>
                                                <!-- Đây là liên kết đến trang About -->
                                                <li><a href="{{ route('contact') }}">Contact</a></li>
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                            @endunless
                            @if (session()->has('employee_id'))
                                <div class="col-lg-12 col-md-12">
                                    @else
                                        <div class="col-lg-9 col-md-12">
                                            @endif
                                            <div class="full-setting-area setting-style-3">
                                                <div class="top-dropdown">
                                                    <ul>
                                                        @if (session()->has('customer_id'))
                                                            <li><a href="{{ route('customeraccount') }}">Main</a></li>
                                                            <li><a href="{{ route('message_box') }}">Message Box</a>
                                                            </li>
                                                            <li class="drodown-show">
                                                                <a href="#">View My Bid <i class="fa fa-angle-down"></i></a>
                                                                <ul class="open-dropdown setting">
                                                                    <li><a href="{{ route('view_my_bid') }}">My Bid
                                                                            ({{ $myBidCount }})</a></li>
                                                                    <li><a href="{{ route('view_winning_bid') }}">Winning
                                                                            Bid ({{ $winningBidCount }})</a></li>
                                                                    <li><a href="{{ route('reverse_bid_winner') }}">Reverse
                                                                            Bid ({{ $reverseBidCount }})</a></li>
                                                                    <li><a href="{{ route('view_billing_customer') }}">View
                                                                            Transaction</a></li>
                                                                </ul>
                                                            </li>
                                                            <li class="drodown-show">
                                                                <a href="#">My Products <i class="fa fa-angle-down"></i></a>
                                                                <ul class="open-dropdown setting">
                                                                    <li><a href="{{ route('step_add_product_1') }}">Add
                                                                            Products</a></li>
                                                                    <li><a href="{{ route('my_products') }}">View
                                                                            Products</a></li>
                                                                </ul>
                                                            </li>
                                                            <li class="drodown-show">
                                                                <a href="#">{{$customer->customer_name}} <i
                                                                        class="fa fa-angle-down"></i></a>
                                                                <ul class="open-dropdown setting">
                                                                    <li><a href="{{ route('customer_profile') }}">Profile</a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="{{ route('customer_change_password') }}">Change
                                                                            password</a></li>
                                                                    <li><a href="{{ route('logout') }}">Logout</a></li>
                                                                </ul>
                                                            </li>
                                                        @elseif (session()->has('employee_id'))
                                                            <li class="drodown-show">
                                                                <a href="#">Reverse Product <i
                                                                        class="fa fa-angle-down"></i></a>
                                                                <ul class="open-dropdown setting">
                                                                    <li>
                                                                            <a href="{{ route('select.reverse.bid.category') }}">Add
                                                                            Product</a></li>
                                                                    <li><a href="{{ route('view.reverse.product') }}">View
                                                                            Products</a></li>
                                                                </ul>
                                                            </li>

                                                            <li class="drodown-show"><a href="#"> Users <i
                                                                        class="fa fa-angle-down"></i></a>
                                                                <ul class="open-dropdown setting">
                                                                    {{--                                                                    @if (auth()->user()->employee_type == "Admin")--}}
                                                                    @if (true)
                                                                        <li><a href="{{ route('add_employee') }}">Add
                                                                                Staff</a></li>
                                                                        <li><a href="{{ route('view_employee') }}">View
                                                                                Staff</a></li>
                                                                    @endif
                                                                    <li><a href="{{ route('view_customer') }}">View
                                                                            Customers</a></li>
                                                                </ul>
                                                            </li>

                                                            {{--                                                            @if (auth()->user()->employee_type == "Admin")--}}
                                                            @if (true)
                                                                <li class="drodown-show"><a href="#"> Auction Settings
                                                                        <i
                                                                            class="fa fa-angle-down"></i></a>
                                                                    <ul class="open-dropdown setting">
                                                                        <li><a href="{{ route('category') }}">Add
                                                                                Categories</a></li>
                                                                        <li><a href="{{ route('view_category') }}">View
                                                                                Categories</a></li>
                                                                    </ul>
                                                                </li>
                                                            @endif

                                                            <li class="drodown-show"><a href="#"> Bidding Report <i
                                                                        class="fa fa-angle-down"></i></a>
                                                                <ul class="open-dropdown setting">
                                                                    <li><a href="{{ route('view_bidding_product') }}">Current
                                                                            Bidding</a></li>
                                                                    <li><a href="{{ route('close_bidding_product') }}">Closed
                                                                            Bidding</a></li>
                                                                    <li><a href="{{ route('view_winners') }}">View
                                                                            Winners List</a></li>
                                                                </ul>
                                                            </li>

                                                            <li class="drodown-show"><a href="#"> Report <i
                                                                        class="fa fa-angle-down"></i></a>
                                                                <ul class="open-dropdown setting">
                                                                    <li><a href="{{ route('view_billing') }}">View
                                                                            Billing</a></li>
                                                                    <li><a href="{{ route('view_customer_report') }}">Customer
                                                                            Report</a></li>
                                                                    <li><a href="{{ route('view_message') }}">View
                                                                            Messages</a></li>
                                                                    <li><a href="{{ route('view_payment') }}">View
                                                                            Payment</a></li>
                                                                    <li><a href="{{ route('products_view') }}">View
                                                                            products</a></li>
                                                                </ul>
                                                            </li>

                                                            <li class="drodown-show"><a href="#"> {{$employee->employee_name}} <i
                                                                        class="fa fa-angle-down"></i></a>
                                                                <ul class="open-dropdown setting">
                                                                    <li><a href="{{ route('employee_account') }}">Dashboard</a>
                                                                    </li>
                                                                    <li><a href="{{ route('employee_profile') }}">My
                                                                            Profile</a></li>
                                                                    <li><a href="{{ route('employee_change_password') }}">Change
                                                                            password</a></li>
                                                                    <li><a href="{{ route('logout') }}">Logout</a>
                                                                    </li>
                                                                </ul>
                                                            </li>

                                                            <!-- More Menu Items -->
                                                        @else
                                                            <li><a href="{{ route('register') }}">Register</a></li>
                                                            <li><a href="{{ route('customer_login') }}">Login</a></li>
                                                        @endif
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- More Header Content -->
        <!-- header-mid-area start -->
        <div class="header-mid-area header-mid-style-3 bg-black">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- hot-line-area start -->
                        <div class="hot-line-area">
                            <div class="phone">
                                Customer Support: <span>+84-123456789</span>
                            </div>
                        </div>
                        <!-- hot-line-area end -->

                        <!-- searchbox start -->
                        <div class="searchbox">
                            <form action="{{ route('searchproduct') }}" method="get">
                                <div class="search-form-input">
                                    <select id="searchcategory_id" name="searchcategory_id" class="nice-select">
                                        <option value="">All Categories</option>
                                        @foreach($categories as $category)
                                            <option
                                                value="{{ $category->category_id }}" {{ $category->category_id == request('searchcategory_id') ? 'selected' : '' }}>
                                                {{ $category->category_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <input type="text" name="searchcriteria" placeholder="Enter your search key ..."
                                           value="{{ request('searchcriteria') }}">
                                    <button class="top-search-btn" type="submit">Search</button>
                                </div>
                            </form>
                        </div>
                        <!-- searchbox end -->

                        <div class="shopping-cart-box white-cart-box">
                            <ul>
                                @if(session('customer_id'))
                                    <li>
                                        <a href="{{ route('deposit') }}">
                                    <span class="item-cart-inner">
                                        Balance
                                    </span>
                                            <div class="item-total">PKR{{ $accbalamt }}</div>
                                        </a>
                                    </li>
                                @else
                                    <li>
                                        <a href="{{ route('customer_login') }}">
                                    <span class="item-cart-inner">
                                        Deposit
                                    </span>
                                            <div class="item-total"></div>
                                        </a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                        <!-- shopping-cart-box start -->
                    </div>
                </div>
            </div>
        </div>
        <!-- header-mid-area end -->
        <!-- header-bottom-area start -->
        <div class="header-bottom-area bg-black" style="background-color: #f3f3f3;">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 d-none d-lg-block">
                        <!-- main-menu-area start -->
                        <div class="main-menu-area">
                            <nav>
                                <ul>
                                    <li><a href="{{ route('auction',['auctiontype' => 'Winners Blockchain'])}}"
                                           style="color:black;">Winners
                                            Blockchain</a></li>

                                    <li><a href="{{ route('auction', ['auctiontype' => 'Latest Auctions']) }}"
                                           style="color:black;">Latest Auctions</a></li>
                                    <li><a href="{{ route('auction', ['auctiontype' => 'Featured Auctions']) }}"
                                           style="color:black;">Featured Auctions</a></li>
                                    <li>
                                        <a href="{{ route('auction', ['auctiontype' => 'Upcoming Auctions']) }}"
                                           style="color:black;">Upcoming Auctions</a></li>
                                    <li>
                                        <a href="{{ route('auction', ['auctiontype' => 'Closing Auctions']) }}"
                                           style="color:black;">Closing Auctions</a></li>
                                    <li><a href="{{ route('auction', ['auctiontype' => 'Closed Auctions']) }}"
                                           style="color:black;">Closed Auctions</a></li>
                                    <li><a href="{{ route('auction', ['auctiontype' => 'Reverse Bid']) }}"
                                           style="color:black;">Reverse
                                            Bid</a></li>

                                </ul>
                            </nav>
                        </div>
                        <!-- main-menu-area end -->
                    </div>
                </div>
            </div>
        </div>
        <!-- header-bottom-area end -->
    </header>
    @if (basename($_SERVER['PHP_SELF']) == "index.php")
        <!-- slider-main-area start -->
        <div class="slider-main-area">
            <div class="slider-active owl-carousel">
                <!-- slider-wrapper start -->
                <div class="slider-wrapper" style="background-image:url(img/slider/home-3-01.jpg);width: 100%;">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col">
                                <div class="slider-text-info style-2 text-center slider-text-animation">
                                    <h1 class="title1"><span class="text">Online Auction..</span></h1>
                                    <p>Pakistan's top rated auction platform..</p>
                                    <div class="slier-btn-1">
                                        <a title="Bid now"
                                           href="{{ url('latestauction', ['auctiontype' => 'Latest Auctions']) }}"
                                           class="shop-btn">View Latest Auctions</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- slider-wrapper end -->
                <!-- slider-wrapper start -->
                <div class="slider-wrapper" style="background-image:url(img/slider/home-2-02.jpg);width: 100%;">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col">
                                <div class="slider-text-info style-2 text-center slider-text-animation">
                                    <h1 class="title1"><span class="text">Online Auction.. </span></h1>
                                    <p>Pakistan's top rated auction platform..</p>
                                    <div class="slier-btn-1">
                                        <a title="Bid now"
                                           href="{{ url('featured', ['auctiontype' => 'featured Auctions']) }}"
                                           class="shop-btn">View Featured Auctions</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- slider-wrapper end -->
                <!-- slider-wrapper start -->
                <div class="slider-wrapper" style="background-image:url(img/slider/home-3-1.jpg);width: 100%;">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col">
                                <div class="slider-text-info style-2 text-center slider-text-animation">
                                    <h1 class="title1"><span class="text">Online Auction.. </span></h1>
                                    <p>Pakistan's top rated auction platform..</p>
                                    <div class="slier-btn-1">
                                        <a title="Bid now"
                                           href="{{ url('upcominauction', ['auctiontype' => 'Upcoming Auctions']) }}"
                                           class="shop-btn">View Upcoming Auctions</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- slider-wrapper end -->
            </div>
        </div>

        <!-- slider-main-area end -->
    @endif

    <!-- More Content -->
</div>
</body>
