@include('header')

<style>
    .header-navigation {
        display: flex;
        flex-direction: row;
        justify-content: flex-start;
        align-items: center;
        font-size: .80rem;
    }

    .header-navigation a {
        /*font-size: .80rem;*/
    }

    .header-navigation .breadcrumb {
        margin-bottom: 0;
        background-color: transparent;
        padding: 0.20rem 1rem;
    }

    .header-navigation .btn-group {
        margin-left: auto;
    }

    .header-navigation .btn-share {
        position: relative;
    }

    .header-navigation .btn-share::after {
        content: "";
        width: 1px;
        height: 50%;
        background-color: #ccc;
        position: absolute;
        top: 50%;
        left: 100%;
        transform: translateY(-50%);
    }

    .store-body {
        display: flex;
        flex-direction: row;
        padding: 0;
    }

    .store-body .product-info {
        width: 60%;
        border-right: 1px solid rgba(0, 0, 0, .125);
    }

    .store-body .product-payment-details {
        width: 40%;
        padding: 15px 15px 0 15px;
    }

    .product-info .product-gallery {
        display: flex;
        flex-direction: row;
        border-bottom: 1px solid rgba(0, 0, 0, .125);
    }

    .product-gallery-featured {
        display: flex;
        width: 100%;
        flex-direction: row;
        justify-content: center;
        align-items: flex-start;
        padding: 15px 0;
        cursor: zoom-in;
    }

    .product-gallery-thumbnails .thumbnails-list li {
        margin-bottom: 5px;
        cursor: pointer;
        position: relative;
        width: 70px;
        height: 70px;
    }

    .thumbnails-list li img {
        display: block;
        width: 100%;
    }

    .product-gallery-thumbnails .thumbnails-list li:hover::before {
        content: "";
        width: 3px;
        height: 100%;
        background: #007bff;
        position: absolute;
        top: 0;
        left: 0;
    }

    .product-info .product-seller-recommended {
        padding: 20px 20px 0 20px;
    }

    .chatdiv {
        position: absolute;
        margin-top: 70px;
        margin-left: 100px;
    }
</style>

<!-- breadcrumb-area start -->
<div class="breadcrumb-area bg-gray">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumb-list">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item active">Products</li>
                    <li class="breadcrumb-item active">{{ $product->product_name}}</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb-area end -->

<br>

<main>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card mb-10">
                    <div class="card-header">
                        <nav class="header-navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                                <li class="breadcrumb-item active">Products</li>
                                <li class="breadcrumb-item active">{{ $product->product_name}}</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="card-body store-body">
                        <div class="product-info">
                            <div class="product-gallery">
                                <div class="product-gallery-thumbnails">
                                    <ol class="thumbnails-list list-unstyled">
                                        @if(is_array($images))
                                            @foreach($images as $image)
                                                <li><img src="{{ asset('imgproduct/' . $image) }}" alt=""></li>
                                            @endforeach
                                        @endif
                                    </ol>
                                </div>
                                <div class="product-gallery-featured">
                                    <img src="{{ asset('imgproduct/' . $images[0]) }}" alt="">
                                </div>
                            </div>

                            <div class="product-seller-recommended">
                                <!-- /.recommended-items-->
                                <div class="product-description mb-5">
                                    <div class="product-info-review">
                                        <div class="row">
                                            <div class="col">
                                                <div class="product-info-detailed"
                                                     style="margin-top: 2px;background: #e5e8ee none repeat scroll 0 0;">
                                                    <div class="discription-tab-menu">
                                                        <ul role="tablist" class="nav">
                                                            <li class="active"><a href="#description" data-toggle="tab"
                                                                                  class="active show">Description</a>
                                                            </li>
                                                            <li><a href="#review" data-toggle="tab">Bidders list
                                                                    ()</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="discription-content">
                                                    <div class="tab-content">
                                                        <div class="tab-pane fade in active show" id="description">
                                                            <div class="description-content">
                                                                <div class="row">
                                                                    <div class="col-md-8">
                                                                        <table
                                                                            class="table table-striped table-bordered">
                                                                            <tbody>
                                                                            <tr>
                                                                                <th>Uploaded by :</th>
                                                                                <td>{{ $product->customer_name }}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th>Product Code :</th>
                                                                                <td>{{ $product->product_id }}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th>Product warranty :</th>
                                                                                <td>{{ $product->product_warranty }}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th>Company :</th>
                                                                                <td>{{ $product->company_name }}</td>
                                                                            </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <p>{{ $product->product_description }}</p>
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <p><b>Product Delivery details
                                                                                :</b> {{ $product->product_delivery }}
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                            </div>
                                                        </div>
                                                        <div id="review" class="tab-pane fade">
                                                            <div class="description-content">
                                                                <p>
                                                                @if (true)
                                                                    <center><b style="color: red;">No biddings done
                                                                            yet..</b></center>
                                                                @else
                                                                    {{--                                                                    @foreach ($biddings as $bidding)--}}
                                                                    {{--                                                                        {{ $bidding->customer_name }} bidded--}}
                                                                    {{--                                                                        PKR{{ $bidding->bidding_amount }}--}}
                                                                    {{--                                                                        on {{ $bidding->bidding_date_time }}--}}
                                                                    {{--                                                                        <hr>--}}
                                                                    {{--                                                                        @endforeach--}}
                                                                @endif
                                                                {{--                                                                        </p>--}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="product-payment-details">
                            <div>
                                <h2>{{ $product->product_name }}</h2>
                                <div class="rating-box">
                                    <ul class="rating">
                                        <li><i class="fa fa-star"><b>{{ $product->category_name }}</b></i></li>
                                    </ul>
                                </div>
                                <p>
                                <h4>Time Remaining<p id="demo{{ $product->product_id }}" style="color: red;"></p></h4>
                                </p>
                                <script>
                                    var countDownDate = new Date("{{ date("M d, Y H:i:s", strtotime($product->end_date_time)) }}").getTime();

                                    var x = setInterval(function () {
                                        var now = new Date().getTime();
                                        var distance = countDownDate - now;
                                        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                                        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                                        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                                        var seconds = Math.floor((distance % (1000 * 60)) / 1000);
                                        document.getElementById("demo{{ $product->product_id }}").innerHTML = days + "days " + hours + "hrs " +
                                            minutes + "min " + seconds + "sec ";
                                        if (distance < 0) {
                                            clearInterval(x);
                                            document.getElementById("demo{{ $product->product_id }}").innerHTML = "EXPIRED";
                                            document.getElementById("divbidstatus").innerHTML = '<div class="snipcart-details agileinfo_single_right_details"><input type="button" name="submit" value="Closed" class="button" disabled /></div>';
                                        }
                                    }, 1000);
                                </script>

                                <script>
                                    function countdowntimer(id, time) {
                                        var countDownDate = new Date(time).getTime();
                                        var x = setInterval(function () {
                                            var now = new Date().getTime();
                                            var distance = countDownDate - now;
                                            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                                            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                                            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                                            var seconds = Math.floor((distance % (1000 * 60)) / 1000);
                                            document.getElementById("countdowntime" + id).innerHTML = "<b  style='color: red;'>Time Remaining</b> <br><b>" + days + "Days " + hours + "hrs " + minutes + "min " + seconds + "sec</b>";
                                            if (distance < 0) {
                                                clearInterval(x);
                                                document.getElementById("countdowntime" + id).innerHTML = "<center><b  style='color: red;'>EXPIRED</b></center>";
                                            }
                                        }, 1000);
                                    }
                                </script>
                            </div>

                            <div class="price-box">
                                <p><b>Actual product cost</b>: PKR{{ $product->product_cost }}</p>
                                <h4>Current Bid Amount:<br>PKR{{ $product->ending_bid }}</h4>
                                <input type='hidden' name='max_bid_amt' id='max_bid_amt'
                                       value='{{ $product->ending_bid + 5000 }}'>

                                <form action="" method="post" onsubmit="return confirmbidding()">
                                    <input type='hidden' name='ending_bid' id='ending_bid'
                                           value='{{ $product->ending_bid }}'>
                                    @if(session()->has('customer_id'))
                                        @php
                                            $currenttime = strtotime(date("Y-m-d H:i:s"));
                                            $endtime = strtotime($product->end_date_time);
                                        @endphp
                                        @if($endtime > $currenttime)
                                            @if(session()->get('customer_id') == $product->customer_id)
                                                <div id="divbidstatus">
                                                    <div class="w3_agileits_card_number_grid_left">
                                                        <div class="controls">
                                                            <label class="control-label">You can't bid for own
                                                                products..</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            @else
                                                <div id="divbidstatus">
                                                    <div class="w3_agileits_card_number_grid_left" id="bidAmountDiv">
                                                        <div class="controls">
                                                            <label class="control-label"><b>Enter Bid Amount</b></label>
                                                            <input name="purchase_amount" id="purchase_amount"
                                                                   class="form-control" type="text"
                                                                   placeholder="Enter amount" style="width:200px;"
                                                                   autocomplete="off">
                                                        </div>
                                                    </div>
                                                    <script>
                                                        function enableBidForm() {
                                                            var startingTime = new Date("{{ date("M d, Y H:i:s", strtotime($product->start_date_time)) }}").getTime();
                                                            var currentTime = new Date().getTime();
                                                            var bidAmountDiv = document.getElementById("bidAmountDiv");
                                                            var purchaseAmountInput = document.getElementById("purchase_amount");
                                                            if (startingTime === currentTime) {
                                                                bidAmountDiv.style.display = "block";
                                                                purchaseAmountInput.removeAttribute("disabled");
                                                            } else {
                                                                bidAmountDiv.style.display = "none";
                                                                purchaseAmountInput.setAttribute("disabled", "disabled");
                                                            }
                                                        }
                                                    </script>
                                                    <br>
                                                    <div class="snipcart-details agileinfo_single_right_details">
                                                        <fieldset>
                                                            <input type="submit" name="submit" value="Bid Now"
                                                                   class="form-control" style="width: 250px;"/>
                                                        </fieldset>
                                                    </div>
                                                    <div class="chatdiv">
                                                        <div class="col-md-4">
                                                            @if(session()->get('customer_id') != $product->customer_id)
                                                                @if(session()->has('customer_id'))
                                                                    @include("chat")
                                                                @else
                                                                    <b style='color:red'><a href='login.php'
                                                                                            class='btn btn-info'>Login
                                                                            to chat..</a></b>
                                                                    <hr>
                                                                @endif
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        @else
                                            <fieldset>
                                                <div class="snipcart-details agileinfo_single_right_details">
                                                    <a href='single.php?productid={{ $product->product_id }}'><input
                                                            type="button" name="submit" value="Closed"
                                                            class="form-control" style="width: 250px;"
                                                            disabled/></a>
                                                </div>
                                            </fieldset>
                                        @endif
                                    @else
                                        <div class="snipcart-details agileinfo_single_right_details">
                                            <fieldset>
                                                <input type="button"
                                                       onclick="window.location.href = '{{ route('customer_login') }}'"
                                                       name="submit" value="Login to Bid" class='btn btn-info'
                                                       style="width: 250px;"/>
                                            </fieldset>
                                        </div>
                                    @endif
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<script>
    // select all thumbnails
    const galleryThumbnail = document.querySelectorAll(".thumbnails-list li");
    // select featured
    const galleryFeatured = document.querySelector(".product-gallery-featured img");

    // loop all items
    galleryThumbnail.forEach((item) => {
        item.addEventListener("click", function () {
            let image = item.children[0].src;
            galleryFeatured.src = image;
        });
    });

    // show popover
    $(".main-questions").popover('show');
</script>

<!-- product-area start -->
<div class="product-area ptb-95">
    <hr>
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="section-title-3">
                    <h2>Similar products under {{ $product->category_name }}:</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="product-active-3 owl-carousel">
                @foreach($similarProducts as $similarProduct)
                    <div class="col">
                        <!-- single-product-wrap start -->
                        <div class="single-product-wrap">
                            <div class="product-image box" style="height:350px;width:100%;">
                                <a href="{{ route('product.show', ['id' => $similarProduct->product_id]) }}">
                                    <div id="img-1" class="zoomWrapper single-zoom" style="background-color: #f8f8f8;">
                                        <a href="{{ route('product.show', ['id' => $similarProduct->product_id]) }}">
                                            <center><img id="zoom1"
                                                         src="{{ asset('imgproduct/' . explode(',',$similarProduct->product_image)[0]) }}"
                                                         data-zoom-image="{{ asset('imgproduct/' . explode(',',$similarProduct->product_image)[0]) }}"
                                                         alt="big-1" style="width: 100%;height: 100%;"></center>
                                        </a>
                                    </div>
                                </a>
                                <div class="label-product">{{ $similarProduct->category->category_name }}</div>
                            </div>
                            <div class="product_desc">
                                <div class="add-actions">
                                    <ul class="add-actions-link">
                                        <li class="add-cart"><a
                                                href="{{ route('product.show', ['id' => $similarProduct->product_id]) }}"><i
                                                    class="ion-android-cart"></i> Click here to BID</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- single-product-wrap end -->
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<!-- product-area end -->


<!-- JavaScript code here -->
<script>
    function confirmbidding() {
        if (document.getElementById("purchase_amount").value == "") {
            alert('Bidding amount not entered..');
            return false;
        }
        if (parseFloat(document.getElementById("ending_bid").value) > parseFloat(document.getElementById("purchase_amount").value)) {
            alert('Bidding amount must be greater than PKR' + document.getElementById("ending_bid").value);
            return false;
        } else if (parseFloat(document.getElementById("purchase_amount").value) > parseFloat(document.getElementById("max_bid_amt").value)) {
            alert('Bidding amount should be lesser than PKR' + document.getElementById("max_bid_amt").value);
            return false;
        } else {
            if (confirm("confrim to bid!!") == true) {
                return true;
            } else {
                return false;
            }
        }
    }
</script>
@include('footer')
