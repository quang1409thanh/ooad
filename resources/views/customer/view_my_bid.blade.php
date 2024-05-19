@php use App\Models\Bidding;use App\Models\Product; @endphp
@include('header')
<style>
    .card-product {
        border: 1px solid #e4e4e4;
        border-radius: 5px;
        overflow: hidden;
        position: relative;
        transition: box-shadow 0.3s ease;
    }

    .card-product:hover {
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .img-wrap {
        text-align: center;
    }

    .img-wrap img {
        max-width: 100%;
        height: auto;
        transition: transform 0.3s ease;
    }

    .img-wrap img:hover {
        transform: scale(1.05);
    }

    .info-wrap {
        padding: 20px;
    }

    .title {
        font-size: 18px;
        margin-bottom: 10px;
    }

    .rating-wrap {
        margin-bottom: 10px;
    }

    .label-rating {
        background-color: #f8f9fa;
        padding: 5px 10px;
        border-radius: 5px;
    }

    .price-wrap {
        margin-top: 20px;
    }

    .price-new {
        font-size: 16px;
    }

    .price-wrap h4 {
        font-size: 16px;
        margin-bottom: 10px;
    }

    ul {
        list-style: none;
        padding: 0;
    }

    ul li {
        margin-bottom: 5px;
        font-size: 14px;
    }

    .bottom-wrap {
        padding: 20px;
        background-color: #f8f9fa;
    }

    .bidding-list {
        list-style: none;
        padding: 0;
    }

    .bidding-item {
        padding: 10px;
    }

    /* Màu cho ô chẵn */
    .bidding-item:nth-child(even) {
        background-color: #f2f2f2;
    }

    /* Màu cho ô lẻ */
    .bidding-item:nth-child(odd) {
        background-color: #ffffff;
    }

    .bidding-list {
        max-height: 150px; /* Đặt chiều cao tối đa */
        overflow-y: auto; /* Cho phép cuộn nếu nội dung vượt quá kích thước */
        padding: 5px 0; /* Thêm một số lề để tạo khoảng cách giữa các mục */
    }

    .bidding-item {
        font-size: 14px; /* Đặt kích thước chữ cho mỗi mục bidding */
    }

    .bidding-item p {
        margin: 5px 0; /* Thêm một số lề để tạo khoảng cách giữa các dòng trong mỗi mục bidding */
    }

</style>
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
<!------ Include the above in your HEAD tag ---------->
<div class="container">
    <br>
    <h2 class="border" style="padding: 10px;">My bidding list</h2>
    <hr>
    @foreach($payments as $payment)
        <div class="row">
            @php
                $products = Product::where('product_id',$payment->product_id)
                            ->where('status', 'Active')
                            ->get();
            @endphp
            @foreach($products as $product)
                <div class="col-md-12">
                    <figure class="card card-product">
                        <div class="img-wrap">
                            <center>
                                <a href="{{ route('product.show', $product->product_id) }}">
                                    <img
                                        src="{{ asset($product->first_image_path ? 'product_images/' . $product->first_image_path : 'images/noimage.gif') }}"
                                        alt=" " class="img-responsive" style="height: 250px;"/></a>
                            </center>
                        </div>
                        <figcaption class="info-wrap">
                            <h4 class="title"><a
                                    href="{{ route('product.show', $product->product_id) }}">
                                    {{ $product->product_name }}</a>
                            </h4>
                            <!-- Timer code starts here -->
                            <p id="countdowntime{{ $product->product_id }}"></p>
                            <script type="application/javascript">
                                countdowntimer('{{ $product->product_id }}', '{{ date("M d, Y H:i:s", strtotime($product->end_date_time)) }}');
                            </script>
                            <!-- Timer code ends here -->
                            <div class="rating-wrap">
                                <div class="label-rating">
                                    <span>Started on {{ date("d-M-Y h:i A", strtotime($product->start_date_time)) }}</span><br>
                                </div>
                            </div> <!-- rating-wrap.// -->
                        </figcaption>
                        <div class="bottom-wrap">
                            <div class="price-wrap h5">

                            </div> <!-- price-wrap.// -->
                            <div class="price-wrap h5">

                            <span class="price-new">
                                @php
                                    $biddings = Bidding::select('biddings.*', 'customers.*','biddings.note as note_bidding')
                                            ->leftJoin('customers', 'biddings.customer_id', '=', 'customers.customer_id')
                                            ->where('biddings.product_id', $product->product_id)
                                            ->where('biddings.customer_id', session('customer_id'))
                                            ->orderByDesc('biddings.bidding_id')
                                            ->get();
                                @endphp
                                @if(sizeof($biddings)>0)
                                    <h4>Biddings:</h4>
                                    <ul class="bidding-list">
                                         @foreach($biddings as $bidding)
                                            <li class="bidding-item">
                                                <p><b>{{ $bidding->customer->customer_name }}</b>
                                                    @if($bidding->note_bidding == "Refund")
                                                        Refund
                                                    @else
                                                        Bidder
                                                    @endif
                                                    ${{ $bidding->bidding_amount }}</p>
{{--                                                <hr>.--}}
                                            </li>
                                        @endforeach
                                    </ul>

                                @else
                                    <p>No biddings available for this product.</p>
                                @endif
                            </span>
                            </div> <!-- price-wrap.// -->
                        </div> <!-- bottom-wrap.// -->
                    </figure>
                </div> <!-- col // -->
            @endforeach
        </div> <!-- row.// -->
        <hr>
    @endforeach
</div>
<!--container.//-->
@include('footer')
