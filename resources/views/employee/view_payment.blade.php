@include('header')
<!-- breadcrumb-area start -->
<div class="breadcrumb-area bg-gray">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumb-list">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item active">Payment Report</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb-area end -->
<!-- banner -->
<div class="content-wraper mt-10">
    <div class="container-fluid">
        <div class="checkout-area">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-12 col-xl-12 col-sm-12">
                            <div class="checkbox-form checkout-review-order">

                                <h3>Payment Report</h3>

                                <div class="checkout-left">

                                    <div class="col-md-12">
                                        <table id="datatable" class="table table-striped table-bordered dataTable"
                                               cellspacing="0" width="100%" role="grid" aria-describedby="example_info"
                                               style="width: 100%;">
                                            <thead>
                                            <tr>
                                                <th>Customer</th>
                                                <th>Payment date</th>
                                                <th>Product</th>
                                                <th>Bidding</th>
                                                <th>Payment type</th>
                                                <th>paid amount</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($payments as $payment)
                                                <tr>
                                                    <td>{{ $payment->customer->customer_name }}</td>
                                                    <td>{{ $payment->paid_date}}</td>
                                                    <td>{{ $payment->product->product_name }}</td>
                                                    <td>$ {{ $payment->bidding->bidding_amount }}</td>
                                                    <td>{{ $payment->payment_type }}</td>
                                                    <td>$ {{ $payment->paid_amount }}</td>
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
