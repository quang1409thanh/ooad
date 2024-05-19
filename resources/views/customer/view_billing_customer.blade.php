@include('header')
<!-- breadcrumb-area start -->
<div class="breadcrumb-area bg-gray">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumb-list">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item active">View My Bid</li>
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
                                <h3>View Transaction Report</h3>

                                <div class="checkout-left">

                                    <div class="col-md-12 ">
                                        <table id="datatable" class="table table-striped table-bordered dataTable"
                                               cellspacing="0"
                                               width="100%" role="grid" aria-describedby="example_info"
                                               style="width: 100%;">
                                            <thead>
                                            <tr>
                                                <th>Bill No.</th>
                                                <th>Paid date</th>
                                                <th>Deposit amount</th>
                                                <th>Payment type</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($transactions as $transaction)
                                                <tr>
                                                    <td>{{ $transaction->billing_id }}</td>
                                                    <td>{{ $transaction->purchase_date }}</td>
                                                    <td>{{ $transaction->purchase_amount }}</td>
                                                    <td>{{ $transaction->payment_type }}</td>
                                                    <td>
                                                        <a href="{{ route('payment_receipt', $transaction->billing_id) }}">VIEW</a>
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
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- //banner -->

<script>
    function deleteconfirm() {
        return confirm("Are you sure want to delete this record?") === true;
    }
</script>
@include('datatable')
@include('footer')
