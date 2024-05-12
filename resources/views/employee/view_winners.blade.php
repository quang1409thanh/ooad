@include('header')

@if (isset($delid))
    @php
        $sql = "DELETE FROM winners WHERE winner_id='$delid'";
        $qsql = mysqli_query($con, $sql);
        echo mysqli_error($con);
        if (mysqli_affected_rows($con) == 1) {
            echo "<script>alert('winner record deleted successfully...');</script>";
        }
    @endphp
@endif

<!-- banner -->
<div class="banner">
    <div class="w3l_banner_nav_right">
        <!-- about -->
        <div class="privacy about">
            <h3>View Winner</h3>

            <div class="checkout-left">

                <div class="col-md-12 ">
                    <table id="datatable" class="table table-striped table-bordered dataTable" cellspacing="0" width="100%" role="grid" aria-describedby="example_info" style="width: 100%;">
                        <thead>
                        <tr>
                            <th>Customer</th>
                            <th style="300px;">Product</th>
                            <th>Winners image</th>
                            <th>Winning bid</th>
                            <th>End date</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($winners as $winner)
                            <tr>
                                <td>{{ $winner->customer_name }}</td>
                                <td>{{ $winner->product_name }}</td>
                                <td><img src='imgwinner/{{ $winner->winners_image }}' width='200px;' ></td>
                                <td>{{ $winner->winning_bid }}</td>
                                <td>{{ $winner->end_date }}</td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>

                <div class="clearfix"> </div>

            </div>

        </div>
        <!-- //about -->
    </div>
    <div class="clearfix"></div>
</div>
<!-- //banner -->
<script>
    function deleteconfirm() {
        return confirm("Are you sure want to delete this record?") === true;
    }
</script>

@include('datatable')
@include('footer')
