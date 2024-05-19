@include('header')

@if (isset($_GET['delid']))
    {{--        <?php--}}
    {{--        $sql = "DELETE FROM product WHERE product_id='{$_GET['delid']}'";--}}
    {{--        $qsql = mysqli_query($con, $sql);--}}
    {{--        echo mysqli_error($con);--}}
    {{--        if (mysqli_affected_rows($con) == 1) {--}}
    {{--            echo "<script>alert('product record deleted successfully...');</script>";--}}
    {{--        }--}}
    {{--        ?>--}}
@endif

<!-- banner -->
<div class="banner">
    <!-- about -->
    <div class="privacy about">
        <h3>View Product</h3>

        <div class="checkout-left">

            <div class="col-md-12 ">
                <table id="datatable" class="table table-striped table-bordered dataTable" cellspacing="0" width="100%"
                       role="grid" aria-describedby="example_info" style="width: 100%;">
                    <thead>
                    <tr>
                        <th>Product Image</th>
                        <th style="width:175px;">Product name</th>
                        <th>Current bid</th>
                        <th>Scheduled on</th>
                        <th>Product cost</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td><img src='product_images/{{ $product->product_image }}' width='200px;'
                                     style='height:120px;'></td>
{{--                            @if (session()->has("employee_id"))--}}
{{--                                <td>{{ $product->customer->customer_name }}</td>--}}
{{--                            @endif--}}
                            <td>{{ $product->product_name }}<br>
                                (<b>Category:</b> {{ $product->category_name }})<br>
                                <b>Company:</b> {{ $product->company_name }}
                            </td>
                            <td>
                                @if ($product->currentcost == 0)
                                    No bidding done yet..
                                @else
                                    $ {{ $product->currentcost }}
                                @endif
                            </td>
                            <td>{{ date("d/m/Y h:i A", strtotime($product->start_date_time)) }}
                                - {{ date("d/m/Y h:i A", strtotime($product->end_date_time)) }}</td>
                            <td>$ {{ $product->product_cost }}</td>
                            <td>{{ $product->status }}</td>
                            <td>
                                <a href='product/{{ $product->product_id }}/edit' class='btn btn-warning'>Edit</a> <br>

                                {{--                                @if ($_SESSION["employee_type"] == "Admin")--}}
                                @if (session()->has("employee_id"))
                                    <a href='viewreverseproduct/{{ $product->product_id }}'
                                       onclick='return deleteconfirm()' class='btn btn-danger'>Delete</a> <br>
                                @endif

                                <a href='single/{{ $product->product_id }}' target='_blank'
                                   class='btn btn-info'>View</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <div class="clearfix"></div>

        </div>

    </div>
    <!-- //about -->
    <div class="clearfix"></div>
</div>
<!-- //banner -->

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
