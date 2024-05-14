@include('header')

<script>
    function countdowntimer(id, time) {
        // Set the date we're counting down to
        var countDownDate = new Date(time).getTime();

        // Update the count down every 1 second
        var x = setInterval(function () {

            // Get todays date and time
            var now = new Date().getTime();

            // Find the distance between now an the count down date
            var distance = countDownDate - now;

            // Time calculations for days, hours, minutes and seconds
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            // Output the result in an element with id="demo"
            document.getElementById("countdowntime" + id).innerHTML = "<b  style='color: red;'>Time Remaining</b> <br><b>" + days + "Days " + hours + "hrs " + minutes + "min " + seconds + "sec</b>";

            // If the count down is over, write some text
            if (distance < 0) {
                clearInterval(x);
                document.getElementById("countdowntime" + id).innerHTML = "<center><b  style='color: red;'>EXPIRED</b></center>";
            }
        }, 1000);

    }
</script>
<hr>
<!-- Latest Auctions start -->
<div class="product-area pb-95">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="row">
                    <div class="col">
                        <div class="section-title-3">
                            <h2>Latest Auctions</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="tab-content">
                            <div id="for-men" class="tab-pane active show" role="tabpanel">
                                <div class="row">
                                    <div class="product-active-3 owl-carousel">
                                        @foreach($products as $product)
                                            <div class="col">
                                                <!-- single-product-wrap start -->
                                                <div class="single-product-wrap">
                                                    <div class="product-image box" style="height:350px;width:100%;">
                                                        <a href="{{ route('product.show', $product->product_id) }}">
                                                            <img class="primary-image"
                                                                 src="{{ explode(',',$product->product_image)[0] ? asset('product_images/' . explode(',',$product->product_image)[0]) : asset('images/noimage.gif') }}"
                                                                 alt="" style="width:100%; height:100%">
                                                        </a>
                                                        <div
                                                            class="label-product">{{ $product->category->category_name}}</div>
                                                    </div>
                                                    <div class="product_desc">
                                                        <div class="product_desc_info">
                                                            <h4><a class="product_name"
                                                                   href="{{ route('product.show', $product->product_id) }}">{{ $product->product_name }}</a>
                                                            </h4>
                                                            <div class="manufacturer"><a
                                                                    href="{{ route('product.show', $product->product_id) }}">Product
                                                                    Code: {{ $product->product_id }}</a></div>
                                                            <script type="application/javascript">
                                                                countdowntimer('{{ $product->product_id }}', '{{ date("M d, Y H:i:s", strtotime($product->end_date_time)) }}');
                                                            </script>
                                                            <div class="price-box">
                                                                <span
                                                                    class="new-price">Current Bid Amount : PKR{{ $product->ending_bid > $product->starting_bid ? $product->ending_bid : $product->starting_bid }}</span>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Latest Auctions end -->
<hr>

<!-- Featured Auctions start -->
<div class="product-area pb-95">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="row">
                    <div class="col">
                        <div class="section-title-3">
                            <h2>Featured Auctions</h2>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="tab-content">
                            <div id="for-men" class="tab-pane active show" role="tabpanel">
                                <div class="row">
                                    <div class="product-active-3 owl-carousel">

                                        @foreach($products as $product)

                                            <div class="col">
                                                <!-- single-product-wrap start -->
                                                <div class="single-product-wrap">
                                                    <div class="product-image box" style="height:350px;width:100%;">
                                                        <a href="{{ route('product.show', $product->product_id) }}">
                                                            @php
                                                                if (is_string($product->product_image)) {
                                                                    $firstImage = json_decode($product->product_image, true)[0] ?? 'noimage.gif';
                                                                } else if (is_array($product->product_image)) {
                                                                    $firstImage = $product->product_image[0] ?? 'noimage.gif';
                                                                } else {
                                                                    $firstImage = 'noimage.gif';
                                                                }                                                            @endphp

                                                            <img class="primary-image"
                                                                 src="{{ asset('product_images/' . $firstImage) }}"
                                                                 alt="" style="width:100%; height:100%">
                                                        </a>
                                                        <div
                                                            class="label-product">{{$product->category->category_name }}</div>
                                                    </div>
                                                    <div class="product_desc">
                                                        <div class="product_desc_info">
                                                            <h4><a class="product_name"
                                                                   href="#">{{ $product->product_name }}</a>
                                                            </h4>
                                                            <div class="manufacturer"><a
                                                                    href="#">Product
                                                                    Code: {{ $product->product_id }}</a></div>
                                                            <p id="countdowntime{{ $product->id }}"></p>
                                                            <script type="application/javascript">
                                                                countdowntimer('{{ $product->id }}', '{{ date("M d, Y H:i:s", strtotime($product->end_date_time)) }}');
                                                            </script>
                                                            <div class="price-box">
                                                                <span
                                                                    class="new-price">Current Bid Amount : PKR{{ $product->ending_bid > $product->starting_bid ? $product->ending_bid : $product->starting_bid }}</span>
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
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- Featured Auctions end -->
<hr>

<!-- Upcoming Auctions start -->
<div class="product-area pb-95">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="row">
                    <div class="col">
                        <div class="section-title-3">
                            <h2>Upcoming Auctions</h2>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="tab-content">
                            <div id="for-men" class="tab-pane active show" role="tabpanel">
                                <div class="row">
                                    <div class="product-active-3 owl-carousel">

                                        @foreach($products as $product)
                                            <div class="col">
                                                <!-- single-product-wrap start -->
                                                <div class="single-product-wrap">
                                                    <div class="product-image box" style="height:350px;width:100%;">
                                                        <a href="{{ route('product.show', $product->product_id) }}">
                                                            <img class="primary-image"
                                                                 src="{{ explode(',',$product->product_image)[0] ? asset('product_images/' . explode(',',$product->product_image)[0]) : asset('images/noimage.gif') }}"
                                                                 alt="" style="width:100%; height:100%">
                                                        </a>
                                                        <div
                                                            class="label-product">{{$product->category->category_name }}</div>
                                                    </div>
                                                    <div class="product_desc">
                                                        <div class="product_desc_info">
                                                            <h4><a class="product_name"
                                                                   href="#">{{ $product->product_name }}</a>
                                                            </h4>
                                                            <div class="manufacturer"><a
                                                                    href="#">Product
                                                                    Code: {{ $product->product_id }}</a></div>
                                                            <p id="countdowntime{{ $product->id }}"></p>
                                                            <script type="application/javascript">
                                                                countdowntimer('{{ $product->id }}', '{{ date("M d, Y H:i:s", strtotime($product->end_date_time)) }}');
                                                            </script>
                                                            <div class="price-box">
                                                                <span
                                                                    class="new-price">Current Bid Amount : PKR{{ $product->ending_bid > $product->starting_bid ? $product->ending_bid : $product->starting_bid }}</span>
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
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- Upcoming Auctions end -->
<hr>

<!-- Closing Auctions start -->
<div class="product-area pb-95">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="row">
                    <div class="col">
                        <div class="section-title-3">
                            <h2>Closing Auctions</h2>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="tab-content">
                            <div id="for-men" class="tab-pane active show" role="tabpanel">
                                <div class="row">
                                    <div class="product-active-3 owl-carousel">

                                        @foreach($products as $product)
                                            <div class="col">
                                                <!-- single-product-wrap start -->
                                                <div class="single-product-wrap">
                                                    <div class="product-image box" style="height:350px;width:100%;">
                                                        <a href="{{ route('product.show', $product->product_id) }}">
                                                            <img class="primary-image"
                                                                 src="{{ explode(',',$product->product_image)[0] ? asset('product_images/' . explode(',',$product->product_image)[0]) : asset('images/noimage.gif') }}"
                                                                 alt="" style="width:100%; height:100%">
                                                        </a>
                                                        <div
                                                            class="label-product">{{$product->category->category_name }}</div>
                                                    </div>
                                                    <div class="product_desc">
                                                        <div class="product_desc_info">
                                                            <h4><a class="product_name"
                                                                   href="#">{{ $product->product_name }}</a>
                                                            </h4>
                                                            <div class="manufacturer"><a
                                                                    href="#">Product
                                                                    Code: {{ $product->product_id }}</a></div>
                                                            <p id="countdowntime{{ $product->id }}"></p>
                                                            <script type="application/javascript">
                                                                countdowntimer('{{ $product->id }}', '{{ date("M d, Y H:i:s", strtotime($product->end_date_time)) }}');
                                                            </script>
                                                            <div class="price-box">
                                                                <span
                                                                    class="new-price">Current Bid Amount : PKR{{ $product->ending_bid > $product->starting_bid ? $product->ending_bid : $product->starting_bid }}</span>
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
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- Closing Auctions end -->
<hr>

<!-- Closed Auctions start -->
<div class="product-area pb-95">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="row">
                    <div class="col">
                        <div class="section-title-3">
                            <h2>Closed Auctions</h2>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="tab-content">
                            <div id="for-men" class="tab-pane active show" role="tabpanel">
                                <div class="row">
                                    <div class="product-active-3 owl-carousel">

                                        @foreach($products as $product)
                                            <div class="col">
                                                <!-- single-product-wrap start -->
                                                <div class="single-product-wrap">
                                                    <div class="product-image box" style="height:350px;width:100%;">
                                                        <a href="{{ route('product.show', $product->product_id) }}">
                                                            <img class="primary-image"
                                                                 src="{{ explode(',',$product->product_image)[0] ? asset('product_images/' . explode(',',$product->product_image)[0]) : asset('images/noimage.gif') }}"
                                                                 alt="" style="width:100%; height:100%">
                                                        </a>
                                                        <div
                                                            class="label-product">{{$product->category->category_name }}</div>
                                                    </div>
                                                    <div class="product_desc">
                                                        <div class="product_desc_info">
                                                            <h4><a class="product_name"
                                                                   href="#">{{ $product->product_name }}</a>
                                                            </h4>
                                                            <div class="manufacturer"><a
                                                                    href="#">Product
                                                                    Code: {{ $product->product_id }}</a></div>
                                                            <p id="countdowntime{{ $product->id }}"></p>
                                                            <script type="application/javascript">
                                                                countdowntimer('{{ $product->id }}', '{{ date("M d, Y H:i:s", strtotime($product->end_date_time)) }}');
                                                            </script>
                                                            <div class="price-box">
                                                                <span
                                                                    class="new-price">Current Bid Amount : PKR{{ $product->ending_bid > $product->starting_bid ? $product->ending_bid : $product->starting_bid }}</span>
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
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- Closed Auctions end -->

<hr>
@include('footer')
