@include('header')
<style>
    .product-grid8 {
        display: flex;
        flex-direction: column;
        border: 1px solid #ccc;
        border-radius: 5px;
        overflow: hidden;
    }

    .product-image8 {
        position: relative;
    }

    .product-image8 img {
        width: 100%;
        height: auto;
        transition: transform 0.3s ease;
    }

    .product-image8 img.pic-2 {
        position: absolute;
        top: 0;
        left: 0;
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .product-image8:hover img.pic-1 {
        transform: scale(0.95);
    }

    .product-image8:hover img.pic-2 {
        opacity: 1;
    }

    .product-discount-label {
        position: absolute;
        top: 10px;
        left: 10px;
        background-color: rgba(255, 255, 255, 0.7);
        padding: 5px 10px;
        border-radius: 5px;
    }

    .product-content {
        padding: 10px;
    }

    .product-shipping {
        display: block;
        margin-bottom: 5px;
    }

    .product-content a {
        color: #333;
        text-decoration: none;
        display: inline-block;
        margin-top: 10px;
        transition: color 0.3s ease;
    }

    .product-content a:hover {
        color: #009688;
    }

    .all-deals {
        background-color: #009688;
        color: #fff;
        padding: 5px 10px;
        border-radius: 5px;
        text-decoration: none;
        transition: background-color 0.3s ease;
    }

    .all-deals:hover {
        background-color: #00796b;
    }

    .product-image8 {
        position: relative;
        overflow: hidden;
        border-radius: 8px; /* Optional, to match the img border-radius */
    }

    .product-image8 img {
        display: block;
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 8px; /* To match the container's border-radius */
    }
</style>

<!-- breadcrumb-area start -->
<div class="breadcrumb-area bg-gray">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumb-list">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item active">View My Bid</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb-area end -->

<!-- banner -->
<div class="content-wraper mt-10">
    <div class="container-fluid">
        <div class="checkout-area">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-12 col-xl-12 col-sm-12">
                            <div class="checkbox-form checkout-review-order">
                                <h3 class="h3">Winners list</h3>
                                <div class="row" id="winners-list">
                                    @foreach($winners as $winner)
                                        <div class="col-md-4 col-sm-4 ">
                                            <div class="product-grid8 border">
                                                <div class="product-image8">
                                                    <a href="{{ route('product.show', $winner->product_id) }}">
                                                        <img class="pic-1" style="width: 430px; height: 300px"
                                                             src="{{ asset('product_images/' . $winner->product->first_image_path) }}"
                                                             alt="">
                                                    </a>
                                                </div>
                                                <div class="product-content">
                                    <span class="product-shipping"
                                          style="color: brown;"><b>Product Code : {{ $winner->product_name }}</b></span>
                                                    <a class="all-deals"
                                                       href="{{ route('product.show', $winner->product_id) }} }}"
                                                       target="_blank">View Product <i
                                                            class="fa fa-angle-right icon"></i></a>
                                                </div>
                                                <div class="product-content">
                                                    <div style="display: flex; align-items: center;">
                                                        <img class="pic-2"
                                                             src="{{ asset('imgwinner/'.$winner->winners_image) }}"
                                                             alt=""
                                                             style="width: 50px; height: 50px; margin-right: 10px;">
                                                        <span class="product-shipping"
                                                              style="color: green;"><b>Winner : {{ $winner->customer_name }}</b></span>
                                                    </div>
                                                    {{--                                    <span class="product-shipping"--}}
                                                    {{--                                          style="color: green;"><b>From : {{ $winner->city }}</b></span>--}}
                                                    <span class="product-shipping"
                                                          style="color: green;"><b>Amount payable: Rs. {{ $winner->winning_bid }}</b></span>
                                                    @if ($winner->winner_status == "Pending")
                                                        <a class="all-deals"
                                                           href="{{ route('pay.winning.bid', $winner->product_id) }}">Claim
                                                            winning bid <i class="fa fa-angle-right icon"></i></a>
                                                    @elseif ($winner->winner_status == "Active")
                                                        <a class="all-deals">Already paid <i
                                                                class="fa fa-angle-right icon"></i></a>
                                                    @endif

                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <hr>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- //banner -->
@include('footer')
