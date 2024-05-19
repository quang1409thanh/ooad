@include('header')

<!-- breadcrumb-area start -->
<div class="breadcrumb-area bg-gray">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumb-list">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item active">Transaction</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb-area end -->

<div class="content-wraper mt-10">
    <div class="container-fluid">
        <div class="checkout-area">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-12 col-xl-12 col-sm-12">
                            <div class="checkbox-form checkout-review-order">
                                <h2>Payment Receipt</h2>
                                <hr>
                                <br>
                                <div class="snipcart-item block">
                                    <div class="w3agile_description">
                                        <div id="printableArea">
                                            <table id="datatable"
                                                   class="table table-striped table-bordered dataTable"
                                                   cellspacing="0" width="100%" role="grid"
                                                   aria-describedby="example_info" style="width: 90%;">
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
                                                    <td><b>Bill No.</b> {{ $payment['billing_id'] }} </td>
                                                    <td><b>Date: </b> {{ $payment['purchase_date'] }}</td>
                                                </tr>
                                                <tr>
                                                    <td><b>Customer</b> {{ $payment['customer_name'] }}</td>
                                                    <td><b>Payment type: </b> {{ $payment['card_type'] }}</td>
                                                </tr>
                                                <tr>
                                                    <th><b>Paid amount</b></th>
                                                    <td>$ {{ $payment->purchase_amount }}</td>
                                                </tr>
{{--                                                <tr>--}}
{{--                                                    @php--}}
{{--                                                        $var = 0; // Khởi tạo biến $var với giá trị mặc định là 0--}}
{{--                                                        // Nếu loại thanh toán là "Winners", gán giá trị của $var là purchase_amount--}}
{{--                                                        if ($payment->payment_type !== "Winners") {--}}
{{--                                                            $var = $payment->purchase_amount;--}}
{{--                                                        }--}}
{{--                                                    @endphp--}}

{{--                                                    <th>Previous balance</th>--}}

{{--                                                    <td>--}}
{{--                                                        $ {{$depamt - ($widamt + $var) + $refund}}--}}
{{--                                                    </td>--}}
{{--                                                </tr>--}}
                                                <tr>
                                                    <th>Balanced amount</th>
                                                    <td>$ {{ $depamt - $widamt + $refund}}</td>
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

@include('footer')

<script>
    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;
        // Thêm tiêu đề
        var pageTitle = "<h1>Hóa Đơn</h1>";

        // Thêm thông tin hệ thống đấu giá online
        var systemInfo = "<p><b>Hệ Thống Đấu Giá Online:</b> Auction Hub</p>";

        // Thêm thông tin cửa hàng
        var storeInfo = "<p><b>Địa Chỉ:</b> Số 144 Xuân Thủy, Cầu Giấy, Hà Nội</p>";

        // Thêm thông tin liên hệ
        var contactInfo = "<p><b>Liên Hệ:</b> thanhaxt342@gmail.com | 0123 456 789</p>" +
            "<br>" +
            "<hr>" +
            "<br>";

        // Kết hợp tất cả các thông tin
        var headerContent = pageTitle + systemInfo + storeInfo + contactInfo;
        printContents = headerContent + printContents;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;
    }
</script>
