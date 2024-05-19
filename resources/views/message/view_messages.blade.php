@include('header')
@if (isset($delid))
        <?php
//        $sql = "DELETE FROM message WHERE message_id='$delid'";
//        $qsql = mysqli_query($con, $sql);
//        if (mysqli_affected_rows($con) == 1) {
//            echo "<script>alert('message record deleted successfully...');</script>";
//            echo "<script>window.location='viewmessage.php';</script>";
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
                    <li class="breadcrumb-item active">View Message</li>
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
                                    <h3 class="shoping-checkboxt-title">View Message</h3>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <p class="single-form-row">
                                            <table id="datatable" class="table table-striped table-bordered">
                                                <thead>
                                                <tr>
                                                    <th>Sender</th>
                                                    <th>Receiver</th>
                                                    <th>Message Date</th>
                                                    <th style="width: 110px;">Product</th>
                                                    <th>Message</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach ($messages as $message)
                                                    <tr>
                                                        <td>{{ $message->sender->customer_name }}</td>
                                                        <td>{{ $message->receiver->customer_name }}</td>
                                                        <td>{{ $message->message_date_time}}</td>
                                                        <td>{{ $message->product->product_name }}</td>
                                                        <td>{{ $message->message }}</td>
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
