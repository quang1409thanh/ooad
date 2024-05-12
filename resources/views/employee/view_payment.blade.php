@include('header')

<!-- banner -->
<div class="banner">
    <div class="w3l_banner_nav_right">
        <!-- about -->
        <div class="privacy about">
            <h3>Payment Report</h3>

            <div class="checkout-left">

                <div class="col-md-12">
                    <table id="datatable" class="table table-striped table-bordered dataTable" cellspacing="0" width="100%" role="grid" aria-describedby="example_info" style="width: 100%;">
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
                                <td>{{ $payment->paid_date->format('d-M-Y') }}</td>
                                <td>{{ $payment->product->product_name }}</td>
                                <td>PKR{{ $payment->bidding->bidding_amount }}</td>
                                <td>{{ $payment->payment_type }}</td>
                                <td>PKR{{ $payment->paid_amount }}</td>
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
        if (confirm("Are you sure want to delete this record?") == true) {
            return true;
        } else {
            return false;
        }
    }
</script>

@include('datatable')
@include('footer')
