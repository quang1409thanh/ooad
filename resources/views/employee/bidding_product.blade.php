@include('header')
<!-- breadcrumb-area start -->
<div class="breadcrumb-area bg-gray">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumb-list">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item active">Current Bidding</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb-area end -->

<script>
    function countdowntimer(id, time) {
        // Your countdown timer logic goes here
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

<div class="content-wraper mt-10">
    <div class="container-fluid">
        <div class="checkout-area">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-12 col-xl-12 col-sm-12">
                            <div class="checkbox-form checkout-review-order">
                                <h3>Current Bidding</h3>
                                <div class="checkout-left">
                                    <div class="col-md-12">
                                        <table id="datatable" class="table table-striped table-bordered dataTable"
                                               cellspacing="0" width="100%">
                                            <thead>
                                            <tr>
                                                <th>Product Image</th>
                                                <th>Current Winner</th>
                                                <th>Product name</th>
                                                <th>Seller</th>
                                                <th>Starting bid</th>
                                                <th>Current bid</th>
                                                <th>Scheduled on</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($productsWithCurrentBidder as $productWithCurrentBidder)
                                                <tr>
                                                    <td><img
                                                            src="{{ asset('product_images/' . $productWithCurrentBidder['product']->first_image_path) }}"
                                                            width='200px;' alt=""></td>
                                                    <td>{{ $productWithCurrentBidder['product']->customer->customer_name }}
                                                        <br>
                                                        <b>(won for
                                                            ${{$productWithCurrentBidder['product']->ending_bid}})</b>
                                                    </td>
                                                    <td><a style="color: darkcyan"
                                                           href="{{route("product.show",$productWithCurrentBidder['product']->product_id)}}">
                                                            {{ $productWithCurrentBidder['product']->product_name }}<br>
                                                        </a><font color='red'>[Product
                                                            category-{{ $productWithCurrentBidder['product']->category->category_name }}
                                                            ]</font>
                                                    </td>
                                                    <td>{{ $productWithCurrentBidder['product']->customer->customer_name }}</td>
                                                    <td>$ {{ $productWithCurrentBidder['product']->starting_bid }}</td>
                                                    <td>$ {{ $productWithCurrentBidder['product']->ending_bid }}</td>
                                                    <td>{{ date("d/m/Y h:i A", strtotime($productWithCurrentBidder['product']->start_date_time)) }}
                                                        -<br>{{ date("d/m/Y h:i A", strtotime($productWithCurrentBidder['product']->end_date_time)) }}
                                                        <p id="countdowntime{{ $productWithCurrentBidder['product']->product_id }}"></p>
                                                        <script type="application/javascript">
                                                            countdowntimer('{{ $productWithCurrentBidder['product']->product_id }}', '{{ date("M d, Y H:i:s", strtotime($productWithCurrentBidder['product']->end_date_time)) }}');
                                                        </script>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    function deleteconfirm() {
        return confirm("Are you sure want to delete this record?") === true;
    }
</script>

@include('datatable')
@include('footer')
