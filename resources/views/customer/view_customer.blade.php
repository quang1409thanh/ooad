@include('header')

@if (isset($_GET['delid']))
        <?php
        $sql = "DELETE FROM customer WHERE customer_id='{$_GET['delid']}'";
        $qsql = mysqli_query($con, $sql);
        if (mysqli_affected_rows($con) == 1) {
            echo "<script>alert('Customer record deleted successfully...');</script>";
            echo "<script>window.location='viewcustomer';</script>";
        }
        ?>
@endif

<!-- breadcrumb-area start -->
<div class="breadcrumb-area bg-gray">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumb-list">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item active">View Customer</li>
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
                                    <h3 class="shoping-checkboxt-title">View Customer</h3>
                                    <div class="row">

                                        <div class="col-lg-12">
                                            <p class="single-form-row">

                                            <table id="datatable" class="table table-striped table-bordered">
                                                <thead>
                                                <tr>
                                                    <th>Customer Name</th>
                                                    <th>Email</th>
                                                    <th>Address</th>
                                                    <th>Landmark</th>
                                                    <th>Mobile No</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach ($customers as $customer)
                                                    <tr>
                                                        <td>{{ $customer->customer_name }}</td>
                                                        <td>{{ $customer->email_id }}</td>
                                                        <td>{{ $customer->address }},<br>{{ $customer->city }}-{{ $customer->pincode }},<br>{{ $customer->state }}</td>
                                                        <td>{{ $customer->landmark }}</td>
                                                        <td>{{ $customer->mobile_no }}</td>
                                                        <td>{{ $customer->status }}</td>
                                                        <td>
                                                            <a href='customer/{{ $customer->customer_id }}/edit' class='btn btn-info' >Edit</a>
                                                            <a href='viewcustomer/{{ $customer->customer_id }}' class='btn btn-danger' onclick='return confirmdelete()'>Delete</a>
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
