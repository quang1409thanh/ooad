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
                    "<center><b style='color: red;'>EXPIRED</b></center>";
            }
        }, 1000);
    }
</script>

<div class="container">
    <br>
    <h3>{{ $auctiontype}}</h3>
    <hr>
    @foreach ($categories as $category)
        @if ($products->count()  >= 1)
            <h2 class="border" style="padding: 10px;">
                <a href='allproducts.php?category_id={{ $category->category_id }}'>{{ $category->category_name }}</a>
            </h2>
            <div class="row">
                @foreach ($products as $product)
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
                                <center>
                                    <a href="{{ route('product.show', $product->product_id) }}"><img src="{{ $imgname }}"
                                                                                                   alt=""
                                                                                                   class="img-responsive"
                                                                                                   style="height: 250px;"/></a>
                                </center>
                            </div>
                            <figcaption class="info-wrap">
                                <h4 class="title"><a
                                        href="{{ route('product.show', $product->product_id) }}">{{ $product->product_name }}</a>
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
                                <a href="{{ route('product.show', $product->product_id) }}"
                                   class="btn btn-sm btn-primary float-right">Click to Bid</a>
                                <div class="price-wrap h5">
                                    <span
                                        class="price-new">Current Bid : PKR{{ $product->ending_bid > $product->starting_bid ? $product->ending_bid : $product->starting_bid }}</span>
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
