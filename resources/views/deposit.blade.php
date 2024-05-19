@include('header')
<!-- breadcrumb-area start -->
<div class="breadcrumb-area bg-gray">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumb-list">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item active">Deposit</li>
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
                                <hr>
                                <h2 style="text-align: center">Information Transaction</h2>
                                <br>
                                <table id="datatable" class="table table-striped table-bordered dataTable"
                                       cellspacing="0" width="100%" role="grid" aria-describedby="example_info"
                                       style="width: 70%;">
                                    <tr>
                                        <th>Deposit amount</th>
                                        <td>
                                            RS: {{$totalPurchaseAmount}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Withdrawn amount</th>
                                        <td>
                                            RS: {{$totalPaidAmount}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Balance amount</th>
                                        <td>Rs: {{ $totalPurchaseAmount - $totalPaidAmount }}</td>
                                    </tr>
                                </table>
                                <hr>
                                <hr>
                                <h3 style="text-align: center">Deposit <span>Form</span></h3>
                                <div class="checkout-left" style="padding-left: 250px; padding-right: 250px">
                                    <form action="{{route('depositing')}}" method="post"
                                          class="creditly-card-form agileinfo_form"
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
                                                                >
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
                                                                >
                                                            </div>
                                                        </div>
                                                        <div class="w3_agileits_card_number_grid_left">
                                                            <div class="controls">
                                                                <label class="control-label">Card number</label>
                                                                <input name="card_number" id="card_number"
                                                                       class="form-control"
                                                                       placeholder="Card number"
                                                                >
                                                            </div>
                                                        </div>
                                                        <div class="w3_agileits_card_number_grid_left">
                                                            <div class="controls">
                                                                <label class="control-label">CVV number</label>
                                                                <input name="cvv_number" id="cvv_number"
                                                                       class="form-control" placeholder="CVV number"
                                                                >
                                                            </div>
                                                        </div>
                                                        <div class="w3_agileits_card_number_grid_left">
                                                            <div class="controls">
                                                                <label class="control-label">Card Expiry
                                                                    date</label>
                                                                <input name="expire_date" id="expire_date"
                                                                       type="month" class="form-control"
                                                                       placeholder="expire date"
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
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <hr>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function validateform() {
        /* #######start 1######### */
        var alphaspaceExp = /^[a-zA-Z\s]+$/; //Variable to validate only alphabets with space
        var numericExpression = /^[0-9]+$/; //Variable to validate only numbers
        $("span").html("");
        var i = 0;
        /* ########end 1######## */

        if (!document.getElementById("paid_amount").value.match(numericExpression)) {
            document.getElementById("errpaid_amount").innerHTML = "Amount must be digits...";
            i = 1;
        }
        if (document.getElementById("paid_amount").value === "") {
            document.getElementById("errpaid_amount").innerHTML = "Paid amount should not be empty....";
            i = 1;
        }
        if (document.getElementById("card_type").value === "") {
            document.getElementById("errcard_type").innerHTML = "Kindly select the Payment type....";
            i = 1;
        }

        if (!document.getElementById("card_holder").value.match(alphaspaceExp)) {
            document.getElementById("errcard_holder").innerHTML = "Holder name must contain alphabets....";
            i = 1;
        }
        if (document.getElementById("card_holder").value === "") {
            document.getElementById("errcard_holder").innerHTML = "Holder name cannot be blank..";
            i = 1;
        }
        if (!document.getElementById("card_number").value.match(numericExpression)) {
            document.getElementById("errcard_number").innerHTML = "Kindly select the Date....";
            i = 1;
        }
        if (document.getElementById("card_number").value === "") {
            document.getElementById("errcard_number").innerHTML = "CVV number should not be empty....";
            i = 1;
        }

        if (document.getElementById("cvv_number").value === "") {
            document.getElementById("errcvv_number").innerHTML = "CVV number should not be empty....";
            i = 1;
        }
        if (document.getElementById("expire_date").value === "") {
            document.getElementById("errexpire_date").innerHTML = "Expiry date should not be empty....";
            i = 1;
        }

        /* #######start 2######### */
        return i === 0;
        /* #######end 2######### */
    }
</script>
@include('footer')
