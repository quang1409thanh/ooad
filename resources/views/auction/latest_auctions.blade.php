@include('header')

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
            document.getElementById("countdowntime" + id).innerHTML =
                "<b style='color: red;'>Time Remaining</b><br><b>" + days + " Days " + hours + " Hrs " + minutes +
                " Min " + seconds + " Sec</b>";
            if (distance < 0) {
                clearInterval(x);
                document.getElementById("countdowntime" + id).innerHTML =
                    "<center>" +
                    "<b style='color: red;'>EXPIRED</b>" +
                    "<br>" +
                    "<br>"
                "</center>";
            }
        }, 1000);
    }
</script>
@php
    $isEmpty = false;
@endphp
    <!-- breadcrumb-area start -->
<div class="breadcrumb-area bg-gray">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumb-list">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item active">{{ $auctiontype}}</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb-area end -->

<div class="content-wraper mt-10">
    <div class="container-fluid">
        <div class="checkout-area">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-12 col-xl-12 col-sm-12">
                            <div class="checkbox-form checkout-review-order">
                                <br>
                                <h3>{{ $auctiontype}}</h3>
                                <hr>
                                @foreach ($categoriesWithProductCount  as $category)
                                    @if ($category['active_product_count'] >= 1)
                                        @php
                                            $isEmpty = false;
                                        @endphp
                                        <h2 class="border" style="padding: 10px;">
                                            <a href='#?category_id={{ $category['category_id'] }}'>{{ $category['category_name'] }}</a>
                                        </h2>
                                        <div class="row">
                                            @foreach ($category['products']  as $product)
                                                <div class="col-md-4" style="">
                                                    <figure class="card card-product" style="padding: 10px; border-radius: 12px">
                                                        <div class="img-wrap">
                                                            <center>
                                                                <a href="{{ route('product.show', $product->product_id) }}">
                                                                    <img
                                                                        src="{{ asset('product_images/' . $product->first_image_path) }}"
                                                                        alt=""
                                                                        class="img-responsive"
                                                                        style="height: 250px;"/></a>
                                                            </center>
                                                        </div>
                                                        <figcaption class="info-wrap">
                                                            <h4 class="title"><a
                                                                    href="{{ route('product.show', $product->product_id) }}">{{ $product->product_name }}</a>
                                                            </h4>
                                                            <div class="manufacturer">
                                                                <a href="{{ route('product.show', $product->product_id) }}">Number
                                                                    of Bidders: {{ $product->countBidders() }}</a>
                                                            </div>
                                                            <div class="manufacturer">
                                                                <a href="{{ route('product.show', $product->product_id) }}">Number
                                                                    of Bids: {{ $product->countBids() }}</a>
                                                            </div>

                                                            <p id="countdowntime{{ $product->product_id }}"></p>
                                                            <script type="application/javascript">
                                                                countdowntimer('{{ $product->product_id }}', '{{ date("M d, Y H:i:s", strtotime($product->end_date_time)) }}');
                                                            </script>
                                                            <div class="rating-wrap">
                                                                <div class="label-rating">
                                                                    <span>Started on {{ date("d-M-Y h:i A", strtotime($product->start_date_time)) }}</span><br>
                                                                </div>
                                                            </div>
                                                        </figcaption>
                                                        <div class="bottom-wrap">
                                                            <a href="{{ route('product.show', $product->product_id) }}"
                                                               class="btn btn-sm btn-primary float-right">Click to
                                                                Bid</a>
                                                            <div class="price-wrap h5">
                                                                <span
                                                                    class="price-new">Current Bid : ${{ $product->ending_bid > $product->starting_bid ? $product->ending_bid : $product->starting_bid }}</span>
                                                            </div>
                                                        </div>
                                                    </figure>
                                                </div>
                                            @endforeach
                                        </div>
                                        <hr>
                                    @else
                                        @php
                                            $isEmpty = true;
                                        @endphp
                                    @endif
                                @endforeach
                                {{--                                @if($isEmpty)--}}
                                {{--                                    <div>--}}
                                {{--                                        <b style="color: red">--}}
                                {{--                                            Ở ĐÂY KHÔNG CÓ PHIÊN ĐẤU GIÁ NÀO!!!--}}
                                {{--                                        </b>--}}
                                {{--                                    </div>--}}
                                {{--                                @endif--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<hr>

@include('footer')
