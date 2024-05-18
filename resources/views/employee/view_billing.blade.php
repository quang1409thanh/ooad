@include('header')
@if (isset($delid))
        <?php
//        $sql = "DELETE FROM billing WHERE billing_id='$delid'";
//        $qsql = mysqli_query($con, $sql);
//        if (mysqli_affected_rows($con) == 1) {
//            echo "<script>alert('billing record deleted successfully...');</script>";
//        }
        ?>
@endif
<!-- breadcrumb-area start -->
<div class="breadcrumb-area bg-gray">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumb-list">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item active">View Billing</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb-area end -->

<!-- content-wraper start -->
<div class="content-wraper mt-10">
    <div class="container-fluid">
        <!-- checkout-area start -->
        <div class="checkout-area">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-12 col-xl-12 col-sm-12">
                            <form action="" method="post">
                                <div class="checkbox-form checkout-review-order">
                                    <h3 class="shoping-checkboxt-title">View Billing</h3>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <p class="single-form-row">
                                            <table id="datatable" class="table table-striped table-bordered">
                                                <thead>
                                                <tr>
                                                    <th>Customer</th>
                                                    <th>Product</th>
                                                    <th>Purchase Date</th>
                                                    <th>Purchase Amount</th>
                                                    <th>Payment Type</th>
                                                    <th>Card Type</th>
                                                    <th>Card Number</th>
                                                    <th>Expiry Date</th>
                                                    <th>CVV Number</th>
                                                    <th>Card Holder</th>
                                                    <th>Delivery Date</th>
                                                    <th>Note</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach ($billings as $billing)
                                                    <tr>
                                                        <td>{{ $billing->customer_id }}</td>
                                                        <td>{{ $billing->product_id }}</td>
                                                        <td>{{ $billing->purchase_date }}</td>
                                                        <td>{{ $billing->purchase_amount }}</td>
                                                        <td>{{ $billing->payment_type }}</td>
                                                        <td>{{ $billing->card_type }}</td>
                                                        <td>{{ $billing->card_number }}</td>
                                                        <td>{{ $billing->expire_date }}</td>
                                                        <td>{{ $billing->cvv_number }}</td>
                                                        <td>{{ $billing->card_holder }}</td>
                                                        <td>{{ $billing->delivery_date }}</td>
                                                        <td>{{ $billing->note }}</td>
                                                        <td>{{ $billing->status }}</td>
                                                        <td>
                                                            <a href='billing.php?editid={{ $billing->id }}'
                                                               class='btn btn-info'>Edit</a>
                                                            <a href='viewbilling.php?delid={{ $billing->id }}'
                                                               class='btn btn-danger' onclick='return confirmdelete()'>Delete</a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- checkout-area end -->
    </div>
</div>
<!-- content-wraper end -->

<!-- footer-area start -->
@include('footer')
<script>
    function confirmdelete() {
        if (confirm("Are you sure want to delete this record?") == true) {
            return true;
        } else {
            return false;
        }
    }
</script>
