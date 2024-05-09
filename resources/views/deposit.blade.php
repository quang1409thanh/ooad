@include('header')

@if (isset($success_message))
    <script>
        alert('{{ $success_message }}');
        window.location.href = 'paymentreceipt.php?paymentid={{ $paymentid }}';
    </script>
@endif

@if (isset($_GET['editid']))
    {{--    @php--}}
    {{--        $sqledit = "SELECT * FROM payment WHERE payment_id='".$_GET['editid']."'";--}}
    {{--        $qsqledit = mysqli_query($con, $sqledit);--}}
    {{--        $rsedit = mysqli_fetch_array($qsqledit);--}}
    {{--    @endphp--}}
@endif

<div class="content-wraper mt-50">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="customer-login-register">
                    <div class="banner">
                        <div class="w3l_banner_nav_right">
                            <div class="privacy about">
                                <table id="datatable" class="table table-striped table-bordered dataTable"
                                       cellspacing="0" width="100%" role="grid" aria-describedby="example_info"
                                       style="width: 100%;">
                                    <tr>
                                        <th>Deposit amount</th>
                                        <td>
                                            @php
                                                //                                                $sql = "SELECT IFNULL(SUM(purchase_amount),0) FROM billing WHERE customer_id='".session('customer_id')."' and status='Active' and payment_type='Deposit'";
                                                //                                                $qsql = mysqli_query($con, $sql);
                                                //                                                $rs = mysqli_fetch_array($qsql);
                                                                                                $depamt = 23;
                                                                                                echo "Rs. " . $depamt;
                                            @endphp
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Withdrawn amount</th>
                                        <td>
                                            @php
                                                //                                                $sql = "SELECT IFNULL(SUM(paid_amount),0) FROM payment WHERE customer_id='".session('customer_id')."' and status='Active' and payment_type='Bid'";
                                                //                                                $qsql = mysqli_query($con, $sql);
                                                //                                                $rs = mysqli_fetch_array($qsql);
                                                                                                $widamt = 20;
                                                                                                echo "Rs. " . $widamt;
                                            @endphp
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Balance amount</th>
                                        <td>Rs. {{ $depamt - $widamt }}</td>
                                    </tr>
                                </table>
                                <hr>
                                <h3>Deposit <span>Form</span></h3>
                                <div class="checkout-left">
                                    <div class="col-md-8">
                                        <form action="" method="post" class="creditly-card-form agileinfo_form"
                                              onsubmit="return validateform()">
                                            @csrf
                                            <section class="creditly-wrapper wthree, w3_agileits_wrapper">
                                                <div class="information-wrapper">
                                                    <div class="first-row form-group">
                                                        <div class="w3_agileits_card_number_grid_right">
                                                            <div class="w3_agileits_card_number_grid_left">
                                                                <div class="controls">
                                                                    <label class="control-label">Deposit amount</label>
                                                                    <input name="paid_amount" id="paid_amount"
                                                                           class="form-control" type="text"
                                                                           placeholder="Deposit amount"
                                                                           value="{{ isset($rsedit['paid_amount']) ? $rsedit['paid_amount'] : '' }}">
                                                                </div>
                                                            </div>
                                                            <div class="controls">
                                                                <label class="control-label">Card type</label>
                                                                <br>
                                                                <select name="card_type" id="card_type"
                                                                        class="form-control">
                                                                    <option value=''>Select</option>
                                                                    <option value='Credit card'>Credit card</option>
                                                                    <option value='Debit Card'>Debit Card</option>
                                                                </select>
                                                            </div>
                                                            <div class="w3_agileits_card_number_grid_left">
                                                                <div class="controls">
                                                                    <label class="control-label">Card holder</label>
                                                                    <input name="card_holder" id="card_holder"
                                                                           class="form-control"
                                                                           placeholder="card holder"
                                                                           value="{{ isset($rsedit['card_holder']) ? $rsedit['card_holder'] : '' }}">
                                                                </div>
                                                            </div>
                                                            <div class="w3_agileits_card_number_grid_left">
                                                                <div class="controls">
                                                                    <label class="control-label">Card number</label>
                                                                    <input name="card_number" id="card_number"
                                                                           class="form-control"
                                                                           placeholder="Card number"
                                                                           value="{{ isset($rsedit['card_number']) ? $rsedit['card_number'] : '' }}">
                                                                </div>
                                                            </div>
                                                            <div class="w3_agileits_card_number_grid_left">
                                                                <div class="controls">
                                                                    <label class="control-label">CVV number</label>
                                                                    <input name="cvv_number" id="cvv_number"
                                                                           class="form-control" placeholder="CVV number"
                                                                           value="{{ isset($rsedit['cvv_number']) ? $rsedit['cvv_number'] : '' }}">
                                                                </div>
                                                            </div>
                                                            <div class="w3_agileits_card_number_grid_left">
                                                                <div class="controls">
                                                                    <label class="control-label">Card Expiry
                                                                        date</label>
                                                                    <input name="expire_date" id="expire_date"
                                                                           type="month" class="form-control"
                                                                           placeholder="expire date"
                                                                           value="{{ isset($rsedit['expire_date']) ? $rsedit['expire_date'] : '' }}"
                                                                           min="{{ date('Y-m') }}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
                                            <button class="btn btn-info" type="submit" name="submit">Click here to make
                                                payment
                                            </button>

                                        </form>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
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
