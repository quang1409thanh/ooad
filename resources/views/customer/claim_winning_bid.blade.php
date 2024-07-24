@include('header')

<!-- breadcrumb-area start -->
<div class="breadcrumb-area bg-gray">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumb-list">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item active">Pay for Winning Bid</li>
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
                                <h3 class="h3">Pay for Winning Bid</h3>
                                <div class="row">

                                    <div class="col-md-6 col-sm-6 ">
                                        <div class="product-grid8 border">
                                            <div class="product-image8">
                                                <a href="{{ route('product.show', $winner->product_id) }}">
                                                    <img class="pic-1"
                                                         src="{{ asset('product_images/' . $winner->product->first_image_path) }}"
                                                         alt="">
{{--                                                    <img class="pic-2" src="d">--}}
                                                </a>
                                                <span class="product-discount-label"><b>{{ $winner->product_name }}</b></span>
                                            </div>
                                            <div class="product-content">
                                    <span class="product-shipping"
                                          style="color: brown;"><b>Product : {{ $winner->product_name }}</b></span>
                                                <span class="product-shipping"
                                                      style="color: brown;"><b>Product Code : {{ $winner->product_name }}</b></span>
                                                <span class="product-shipping"
                                                      style="color: brown;"><b>Company Name: {{ $winner->compname }}</b></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-sm-6 ">
                                        <div class="product-grid8 border">
                                            <div class="product-image8">
                                                <a href="{{ route('product.show', $winner->product_id) }}">
                                                    <img class="pic-1"
                                                         src="{{ asset('product_images/' . $winner->product->first_image_path) }}"
                                                         alt=""> </a>
                                                <span class="product-discount-label"><b>{{ $winner->product_name }}</b></span>
                                            </div>
                                            <div class="product-content">
                                    <span class="product-shipping"
                                          style="color: green;"><b>Winner : {{ $winner->customer_name }}</b></span>
                                                <span class="product-shipping"
                                                      style="color: green;"><b>From : {{ $winner->city }}</b></span>
                                                <span class="product-shipping"
                                                      style="color: green;"><b>Amount payable: : Rs. {{ $winner->winning_bid }}</b></span>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <form action="{{ route('payment.submit') }}" method="post"
                                      class="creditly-card-form agileinfo_form"
                                      enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $winner->product_id }}">
                                    <input type="hidden" name="customer_id" value="{{ $winner->customer_id }}">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <hr>
                                            <center><h3>Payment Panel</h3></center>
                                            <hr>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="custname">Customer name</label>
                                                <input name="custname" class="form-control" type="text" readonly
                                                       value="haha">
                                            </div>
                                            <div class="form-group">
                                                <label for="file">Upload image</label>
                                                <input name="file" class="form-control" type="file">
                                            </div>
                                            <div class="form-group">
                                                <label for="address">Address</label>
                                                <textarea id="address" name="address" class="form-control"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="state">State</label>
                                                <input type="text" id="state" name="state" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="city">City</label>
                                                <input type="text" id="city" name="city" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="landmark">Landmark</label>
                                                <input type="text" id="landmark" name="landmark" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="pin-code">PIN code</label>
                                                <input type="text" id="pin-code" name="pin_code" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="mobile-number">Mobile number</label>
                                                <input type="text" id="mobile-number" name="mobile_number"
                                                       class="form-control"
                                                       value="+923322583908">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="paid-amount">Paid amount</label>
                                                <input name="paid_amount" class="form-control" type="text"
                                                       placeholder="Paid amount"
                                                       value="{{ $winner->winning_bid }}" readonly
                                                       style="background-color:grey;color:white;">
                                            </div>
                                            <div class="form-group">
                                                <label for="card-type">Card type</label>
                                                <select name="card_type" class="form-control">
                                                    <option value="">Select</option>
                                                    <option value="Credit card">Credit card</option>
                                                    <option value="Debit Card">Debit Card</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="card-holder">Card holder</label>
                                                <input name="card_holder" class="form-control"
                                                       placeholder="card holder">
                                            </div>
                                            <div class="form-group">
                                                <label for="card-number">Card number</label>
                                                <input name="card_number" class="form-control"
                                                       placeholder="Card number">
                                            </div>
                                            <div class="form-group">
                                                <label for="cvv-number">CVV number</label>
                                                <input name="cvv_number" class="form-control" placeholder="CVV number">
                                            </div>
                                            <div class="form-group">
                                                <label for="expire-date">Expiry date</label>
                                                <input name="expire_date" type="month" class="form-control"
                                                       placeholder="expire date"
                                                       min="{{ date('Y-m') }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <hr>
                                            <center>
                                                <button type="submit" name="submit" class="btn btn-primary">Click here
                                                    to make payment
                                                </button>
                                            </center>
                                            <hr>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('footer')
