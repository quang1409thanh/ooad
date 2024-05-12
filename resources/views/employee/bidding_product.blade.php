@include('header')

@if (isset($delid))
    @php
//        $sql = "DELETE FROM product WHERE product_id='$delid'";
//        $qsql = mysqli_query($con, $sql);
//        echo mysqli_error($con);
//        if (mysqli_affected_rows($con) == 1) {
//            echo "<script>alert('Product record deleted successfully...');</script>";
//        }
    @endphp
@endif

<script>
    function countdowntimer(id, time) {
        // Your countdown timer logic goes here
        // Set the date we're counting down to
        var countDownDate = new Date(time).getTime();

        // Update the count down every 1 second
        var x = setInterval(function() {

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

<div class="banner">
    <div class="privacy about">
        <h3>Current Bidding</h3>
        <div class="checkout-left">
            <div class="col-md-12">
                <table id="datatable" class="table table-striped table-bordered dataTable" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>Product Image</th>
                        <th>Winners List</th>
                        <th>Product name</th>
                        <th>Seller</th>
                        <th>Starting bid</th>
                        <th>Current bid</th>
                        <th>Scheduled on</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td><img src='imgproduct/{{ $product->product_image }}' width='200px;'></td>
                            <td>{{ $product->customer->customer_name }}<br>
{{--                                <b>(won for PKR{{ $product->biddings->max('bidding_amount') }})</b>--}}
                                <b>(won for PKR{{3}})</b>
                            </td>
                            <td>{{ $product->product_name }}<br><font color='red'>[Product category-{{ $product->category->category_name }}]</font></td>
                            <td>{{ $product->customer->customer_name }}</td>
                            <td>PKR{{ $product->starting_bid }}</td>
                            <td>PKR{{ $product->ending_bid }}</td>
                            <td>{{ date("d/m/Y h:i A", strtotime($product->start_date_time)) }} -<br>{{ date("d/m/Y h:i A", strtotime($product->end_date_time)) }}
                                <p id="countdowntime{{ $product->product_id }}"></p>
                                <script type="application/javascript">
                                    countdowntimer('{{ $product->product_id }}', '{{ date("M d, Y H:i:s", strtotime($product->end_date_time)) }}');
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
    <div class="clearfix"></div>
</div>

<script>
    function deleteconfirm() {
        return confirm("Are you sure want to delete this record?") === true;
    }
</script>

@include('datatable')
@include('footer')
