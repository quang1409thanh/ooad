@include('header')

<div class="content-wraper mt-50">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="customer-login-register">
                    <!-- banner -->
                    <div class="banner">
                        <div class="w3l_banner_nav_right">
                            <div class="agileinfo_single">
                                <div class="col-md-12 agileinfo_single_right">
                                    <h2>Payment Receipt</h2>
                                    <div class="snipcart-item block">
                                        <div class="w3agile_description">
                                            <div id="printableArea">
                                                <table id="datatable"
                                                       class="table table-striped table-bordered dataTable"
                                                       cellspacing="0" width="100%" role="grid"
                                                       aria-describedby="example_info" style="width: 100%;">
                                                    <tr>
                                                        <th colspan="3">
                                                            <center>Auction Hub</center>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th colspan="3">
                                                            <center>HÀ NỘI</center>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Bill No.</b> {{ $rspayment['billing_id'] }} </td>
                                                        <td><b>Date</b> {{ $rspayment['purchase_date'] }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Customer</b> {{ $rspayment['customer_name'] }}</td>
                                                        <td><b>Payment type</b> {{ $rspayment['card_type'] }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th><b>Paid amount</b></th>
                                                        <td>Rs. {{ $rspayment->purchase_amount }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Previous balance</th>
                                                        <td>
                                                            Rs. {{$depamt - ($widamt + $rspayment->purchase_amount)}}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Balanced amount</th>
                                                        <td>Rs. {{ $depamt - $widamt }}</td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <hr>
                                            <center><input type="button" name='print'
                                                           onclick="printDiv('printableArea')"
                                                           value="Click here to Print" class="btn btn-primary"></center>
                                            <hr>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('footer')

<script>
    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;
    }
</script>
