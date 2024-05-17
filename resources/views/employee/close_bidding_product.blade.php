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

<div class="banner">
    <div class="privacy about">
        <h3>View Closed Biddings</h3>
        <div class="checkout-left">
            <div class="col-md-12">
                <table id="datatable" class="table table-striped table-bordered dataTable" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>Product Image</th>
                        <th>Winners List</th>
                        <th>Product name</th>
                        <th>Customer</th>
                        <th>Starting bid</th>
                        <th>Closed bid</th>
                        <th>Bidding date</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td><img src='imgproduct/{{ $product->product_image }}' width='100px;'></td>
{{--                            <td>{{ $product->winning_customer->customer_name }}<br>--}}
                            <td>{{ 4444 }}<br>
{{--                                <b>(won for VND{{ $product->winning_bid->bidding_amount }})</b>--}}
                                <b>(won for VND{ 333 }})</b>
                                <b>(won for VND{{ 555 }})</b>
                            </td>
                            <td>{{ $product->product_name }}<br><font color='red'>[Product category-{{ $product->category->category_name }}]</font></td>
                            <td>{{ $product->customer->customer_name }}</td>
                            <td>VND{{ $product->starting_bid }}</td>
                            <td>VND{{ $product->ending_bid }}</td>
                            <td>{{ date("d-M-Y h:i A", strtotime($product->start_date_time)) }} -<br>{{ date("d-M-Y h:i A", strtotime($product->end_date_time)) }}</td>
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
        if (confirm("Are you sure want to delete this record?") == true) {
            return true;
        } else {
            return false;
        }
    }
</script>

@include('datatable')
@include('footer')
