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
<div class="container">
    <br>
    <h3>{{ ucfirst(Request::get('auctiontype')) }}</h3>
    <hr>
    @foreach($categories as $category)
{{--        @php--}}
{{--            $sqlproduct = "select * from product WHERE status='Active' AND category_id='$category->category_id' AND product.customer_id!='0' AND end_date_time>'$dt $tim' ";--}}
{{--            if(Request::get('auctiontype') == "featured Auctions") {--}}
{{--            $sqlproduct = $sqlproduct . " order by product_id DESC limit 0,3";--}}
{{--            } else {--}}
{{--            $sqlproduct = $sqlproduct . " order by product_id DESC limit 0,3";--}}
{{--            }--}}
{{--            $qsqlproduct = mysqli_query($con, $sqlproduct);--}}
{{--        @endphp--}}
        @if($products->count() >= 1)
            <h2 class="border" style="padding: 10px;"><a
                    href='allproducts.php?category_id={{ $category->category_id }}'>{{ $category->category_name }}</a>
            </h2>
            <div class="row">
                @foreach($products as $product)
                    @php
                        $arr_pro_img = explode(',',$product->product_image);
                        $imgname = url("images/noimage.gif"); // Default image
                        if (!empty($product->product_image)) {
                            $imgname = url("imgproduct/" . explode(',',$product->product_image)[0]);
                        }
                    @endphp
                        <div class="col-md-4">
                        <figure class="card card-product">
                            <div class="img-wrap">
                                <center><a href="single.php?productid={{ $product->product_id }}"><img
                                            src="{{ $imgname }}" alt="" class="img-responsive" style="height: 250px;"/></a>
                                </center>
                            </div>
                            <figcaption class="info-wrap">
                                <h4 class="title"><a
                                        href="single.php?productid={{ $product->product_id }}">{{ $product->product_name }}</a>
                                </h4>
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
                                <a href="single.php?productid={{ $product->product_id }}"
                                   class="btn btn-sm btn-primary float-right">Click to Bid</a>
                                <div class="price-wrap h5">
                                    <span
                                        class="price-new">Current Bid : PKR {{ $product->ending_bid > $product->starting_bid ? $product->ending_bid : $product->starting_bid }}</span>
                                </div>
                            </div>
                        </figure>
                    </div>
                @endforeach
            </div>
            <hr>
        @endif
    @endforeach
</div>
@include('footer')
