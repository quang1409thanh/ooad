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
<!------ Include the above in your HEAD tag ---------->
<div class="container">
    <br>
    <h2 class="border" style="padding: 10px;">My bidding list</h2>
    <hr>
    <div class="row">
        @foreach($payments as $payment)
            @php
                $sqlproduct = "select * from product WHERE status='Active' AND product_id='$payment->product_id'";
                if ($_GET['auctiontype'] == "LatestAuctions") {
                $sqlproduct = $sqlproduct  . " order by product_id DESC limit 0,3";
                } else {
                $sqlproduct = $sqlproduct  . " order by product_id DESC limit 0,3";
                }
                $qsqlproduct = $products    ;
                if (mysqli_num_rows($qsqlproduct) >= 1) {
            @endphp
            <div class="row">
                @foreach($products as $product)
                    <div class="col-md-12">
                        <figure class="card card-product">
                            <div class="img-wrap">
                                <center>
                                    <a href="single.php?productid={{ $product->product_id }}"><img
                                            src="{{ asset($product->product_image ? 'imgproduct/' . $product->product_image : 'images/noimage.gif') }}"
                                            alt=" " class="img-responsive" style="height: 250px;"/></a>
                                </center>
                            </div>
                            <figcaption class="info-wrap">
                                <h4 class="title"><a
                                        href="single.php?productid={{ $product->product_id }}">{{ $product->product_name }}</a>
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
                                @foreach($biddings as $bidding)
                                    {{ date("d-M-Y", strtotime($bidding->bidding_date_time)) }}:
                                    <br>{{ $bidding->customer->customer_name }} bidded PKR{{ $bidding->bidding_amount }}
                                    <hr>
                                @endforeach
                            </span>


                                </div> <!-- price-wrap.// -->
                            </div> <!-- bottom-wrap.// -->
                        </figure>
                    </div> <!-- col // -->
                @endforeach
            </div> <!-- row.// -->
            <hr>
            @php
                }
            @endphp
        @endforeach
    </div>
</div>
<!--container.//-->
@include('footer')
