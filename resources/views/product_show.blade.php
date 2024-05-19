@include('header')
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
        integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

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

    .product-image {
        position: relative;
        overflow: hidden;
        border-radius: 8px; /* Optional, to match the img border-radius */
    }

    .product-image img {
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
                    <div class="card-header" id="headerWithAlert">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
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
                                        @if(is_array($product->all_image_paths))
                                            @foreach($product->all_image_paths as $image)
                                                <li><img src="{{ asset('product_images/' . $image) }}" alt=""></li>
                                            @endforeach
                                        @endif
                                    </ol>
                                </div>
                                <div class="product-gallery-featured">
                                    <img src="{{ asset('product_images/' . $product->all_image_paths[0]) }}" alt="">
                                </div>
                                <style>
                                    .product-gallery-featured {
                                        height: 400px; /* Chiều cao mong muốn của khung hình ảnh */
                                        overflow: hidden; /* Đảm bảo hình ảnh không vượt ra ngoài khung */
                                    }

                                    .product-gallery-featured img {
                                        height: 100%; /* Đảm bảo hình ảnh sẽ lấp đầy khung */
                                        object-fit: cover; /* Hiển thị hình ảnh mà không bị biến đổi tỷ lệ */
                                    }
                                </style>

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
                                                            <li><a href="#review" data-toggle="tab">List of Bids
                                                                    ({{$product->countBids()}})</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="discription-content">
                                                    <div class="tab-content">
                                                        <div class="tab-pane fade in active show" id="description">
                                                            <div class="description-content">
                                                                <div class="row"
                                                                     style="padding-left: 10%; padding-right: 10%">
                                                                    <table
                                                                        class="table table-striped table-bordered">
                                                                        <tbody>
                                                                        <tr>
                                                                            <th>Uploaded by :</th>
                                                                            <td>{{ $product->customer->customer_name }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>Number of Bidders:</th>
                                                                            <td>{{ $product->countBidders()}}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>Number of Bids:</th>
                                                                            <td>{{ count($bidder_list) }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>Company :</th>
                                                                            <td>{{ $product->company_name }}</td>
                                                                        </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                                <hr>

                                                                <div class="row">

                                                                    <div class="col-md-12">
                                                                        <b>Mô tả sản phẩm</b>
                                                                        <br>

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
                                                            <div class="description-content"
                                                                 style="max-height: 300px; overflow-y: auto;">
                                                                @if ($bidder_list->isEmpty())
                                                                    <center><b style="color: red;">No biddings done
                                                                            yet..</b></center>
                                                                @else
                                                                    @foreach ($bidder_list as $bidder)
                                                                        <p>
                                                                            <b style="color: #007bff">{{ $bidder->customer->customer_name }}</b>
                                                                            Bidded
                                                                            <i> $ </i>
                                                                            {{ $bidder->bidding_amount }}
                                                                            <i>on</i> {{ $bidder->bidding_date_time }}
                                                                        </p>
                                                                        <hr>
                                                                    @endforeach
                                                                @endif
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
                                        <li><i class="fa fa-star"><b>{{ $product->category->category_name }}</b></i>
                                        </li>
                                    </ul>
                                </div>
                                <p>
                                <h4>Time Remaining<p id="demo{{ $product->product_id }}" style="color: red;"></p></h4>
                                </p>

                            </div>

                            <div class="price-box">
                                <p><b>Actual product cost</b>: ${{ $product->product_cost }}</p>
                                <b>Current Bid Amount: $<span id="currentBid">{{ $product->ending_bid }}</span>
                                </b>

                                <input type='hidden' name='max_bid_amt' id='max_bid_amt'
                                       value='{{ $product->ending_bid + 50000000 }}'>
                                <br>
                                <form id="biddingForm" action="{{ route('post_bidding') }}" method="post"
                                      onsubmit="return confirmBidding(event)">
                                    @csrf
                                    <input type='hidden' name='ending_bid' id='ending_bid'
                                           value='{{ $product->ending_bid }}'>

                                    <input type='hidden' name='product_id' id='product_id'
                                           value='{{ $product->product_id }}'>
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
                                                        <hr>
                                                        <label class="control-label"><b>Enter Bid Amount</b></label>
                                                        <div class="controls"
                                                             style="display: flex; align-items: center; flex-wrap: wrap;">
                                                            <input name="purchase_amount" id="purchase_amount"
                                                                   class="form-control" type="text"
                                                                   placeholder="Enter amount"
                                                                   style="flex: 1; margin-right: 10px;"
                                                                   autocomplete="off">
                                                            <button type="button"
                                                                    onclick="refreshPage({{ $product->product_id }})"
                                                                    class="form-control"
                                                                    style="flex: 0 0 100px; color: green;">Refresh
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="controls"
                                                         style="display: flex; align-items: center; flex-wrap: wrap;">
                                                        <fieldset
                                                            style="width: 100%; max-width: 300px; flex: 1; margin-right: 14px;">
                                                            <button
                                                                style="color: #040505; background-color: yellowgreen"
                                                                type="button" onclick="confirmBidding(event)"
                                                                class="form-control">Bid Now
                                                            </button>
                                                        </fieldset>
                                                        <button type="button"
                                                                onclick="refreshPage({{ $product->product_id }})"
                                                                class="form-control"
                                                                style="background-color: red; flex: 0 0 100px; color: black;">
                                                            Cancel
                                                        </button>
                                                    </div>
                                                    <hr>
                                                    <br>
                                                    @include('chat')
                                                </div>
                                            @endif
                                        @else
                                            <fieldset>
                                                <hr>
                                                <div class="snipcart-details agileinfo_single_right_details">
                                                    <a href="{{ route('product.show', $product->product_id) }}"
                                                       type="button" name="submit" value="Closed"><input
                                                            type="button" name="submit" value="Closed"
                                                            class="form-control" style="width: 250px;"
                                                            disabled/></a>
                                                </div>
                                            </fieldset>
                                        @endif
                                    @elseif(session()->has('employee_id'))
                                        <div class="snipcart-details agileinfo_single_right_details">
                                            <fieldset>
                                                <br>
                                                <input type="button"
                                                       value="Admin không thể đấu giá !" class='btn btn-info'
                                                       style="width: 250px;"/>
                                            </fieldset>
                                        </div>
                                    @else
                                        <div class="snipcart-details agileinfo_single_right_details">
                                            <fieldset>
                                                <br>
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
                                                         src="{{ asset('product_images/' . $similarProduct->first_image_path) }}"
                                                         data-zoom-image="{{ asset('product_images/' . $similarProduct->first_image_path) }}"
                                                         alt="big-1" style="width: 100%;height: 100%;"></center>
                                        </a>
                                    </div>
                                </a>
                                <div class="label-product">{{ $similarProduct->category->category_name }}</div>
                            </div>
                            <div class="product_desc">
                                <div class="product_desc_info">
                                    <h4><a class="product_name"
                                           href="#">{{ $similarProduct->product_name }}</a>
                                    </h4>
                                    <div class="price-box">
                                        <span
                                            class="new-price">Current Bid Amount : ${{ $similarProduct->ending_bid > $similarProduct->starting_bid ? $similarProduct->ending_bid : $similarProduct->starting_bid }}</span>
                                    </div>
                                </div>
                                <div class="add-actions">
                                    <ul class="add-actions-link">
                                        <li class="add-cart"><a
                                                href="#"><i
                                                    class="ion-android-cart"></i> Click here
                                                to
                                                BID</a></li>
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
<hr>
<!-- product-area end -->


<!-- JavaScript code here -->
<script>
    function confirmBidding(ev) {
        ev.preventDefault();

        var biddingAmount = parseFloat(document.getElementById("purchase_amount").value);
        var endingBid = parseFloat(document.getElementById("ending_bid").value);
        var maxBidAmount = parseFloat(document.getElementById("max_bid_amt").value);

        if (isNaN(biddingAmount) || biddingAmount === "") {
            swal({
                title: "Bidding amount not entered..",
                icon: "error"
            });
            return false;
        }

        if (endingBid > biddingAmount) {
            swal({
                title: "Bidding amount must be greater than $ " + endingBid,
                icon: "error"
            });
            return false;
        }

        if (biddingAmount > maxBidAmount) {
            swal({
                title: "Bidding amount should be lesser than $ " + maxBidAmount,
                icon: "error"
            });
            return false;
        }

        swal({
            title: "Confirm to bid!!",
            text: "Are you sure you want to bid?",
            icon: "warning",
            buttons: ["Cancel", "OK"],
            dangerMode: true
        })
            .then((willConfirm) => {
                if (willConfirm) {
                    document.getElementById("biddingForm").submit();
                }
            });
    }
</script>


@include('footer')
<style>
    /* Phần Chat */
    .chatdiv {
        margin-top: 20px;
    }

    .chatdiv .col-md-4 {
        background-color: #f9f9f9;
        padding: 15px;
        border: 1px solid #ddd;
        border-radius: 5px;
    }

    .chat-login {
        text-align: center;
    }

    .login-title {
        margin-bottom: 10px;
        color: #333;
    }

    .chat-login .btn {
        background-color: #007bff;
        border-color: #007bff;
    }

    .chat-login .btn:hover {
        background-color: #0056b3;
        border-color: #0056b3;
    }

</style>
<script>

    function enableBidForm() {
        var startingTime = new
        Date("{{ date("M d, Y H:i:s", strtotime($product->start_date_time)) }}
            ").getTime();
        var currentTime = new Date().getTime();
        var bidAmountDiv = document.getElementById("bidAmountDiv");
        var purchaseAmountInput =
            document.getElementById("purchase_amount");
        if (startingTime === currentTime) {
            bidAmountDiv.style.display = "block";
            purchaseAmountInput.removeAttribute("disabled");
        } else {
            bidAmountDiv.style.display = "none";
            purchaseAmountInput.setAttribute("disabled", "disabled");
        }
    }
</script>

<script>
    function refreshPage(productId) {
        fetch(`/update_price/${productId}/?query={{$product->ending_bid}}`)
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    var successMessage = data.message;
                    var cardHeader = document.getElementById('headerWithAlert');
                    // Kiểm tra xem đã có thông báo trong cardHeader hay chưa
                    var existingAlert = cardHeader.nextElementSibling;

                    // Nếu đã có, hãy xóa nó trước khi chèn thông báo mới
                    if (existingAlert && existingAlert.classList.contains('alert')) {
                        cardHeader.parentNode.removeChild(existingAlert);
                    }
                    // Tạo một phần tử div mới cho thông báo thành công
                    var alertDiv = document.createElement('div');
                    alertDiv.className = 'alert alert-success';
                    alertDiv.innerHTML = successMessage + '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
                    cardHeader.parentNode.insertBefore(alertDiv, cardHeader.nextSibling);

                    document.getElementById('currentBid').innerText = data.currentBid;
                } else {
                    console.error('Failed to update the bid amount:', data.message);
                }
            })
            .catch(error => console.error('Error fetching bid amount:', error));
    }
</script>

