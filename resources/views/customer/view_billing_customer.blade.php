@include('header')

<!-- banner -->
<div class="banner">
    <div class="w3l_banner_nav_right">
        <!-- about -->
        <div class="privacy about">
            <h3>View Transaction Report</h3>

            <div class="checkout-left">

                <div class="col-md-12 ">
                    <table id="datatable" class="table table-striped table-bordered dataTable" cellspacing="0"
                           width="100%" role="grid" aria-describedby="example_info" style="width: 100%;">
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
                                <td><a href="{{ route('payment.receipt', $transaction->billing_id) }}">Print</a></td>
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
<!-- //banner -->

<script>
    function deleteconfirm() {
        return confirm("Are you sure want to delete this record?") === true;
    }
</script>
@include('datatable')
@include('footer')
