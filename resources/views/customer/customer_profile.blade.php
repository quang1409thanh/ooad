@include('header')

{{--@if (request()->has('submit'))--}}
{{--        <?php--}}
{{--        $sql = "UPDATE customer SET customer_name='" . request()->input('customer_name') . "', email_id='" . request()->input('email_id') . "', address='" . request()->input('address') . "', state='" . request()->input('state') . "', city='" . request()->input('city') . "', landmark='" . request()->input('landmark') . "', pincode='" . request()->input('pincode') . "', mobile_no='" . request()->input('mobile_no') . "' WHERE  customer_id='" . session('customer_id') . "'";--}}
{{--        $qsql = mysqli_query($con, $sql);--}}
{{--        echo mysqli_error($con);--}}
{{--        if (mysqli_affected_rows($con) == 1) {--}}
{{--            echo "<script>alert('Customer Profile updated successfully...');</script>";--}}
{{--        }--}}
{{--        ?>--}}
{{--@endif--}}

{{--@if (session()->has('customer_id'))--}}
{{--        <?php--}}
{{--        $sqledit = "SELECT * FROM customer WHERE customer_id='" . session('customer_id') . "'";--}}
{{--        $qsqledit = mysqli_query($con, $sqledit);--}}
{{--        $rsedit = mysqli_fetch_array($qsqledit);--}}
{{--        ?>--}}
{{--@endif--}}

<div class="content-wraper mt-50">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3"></div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="customer-login-register">
                    <!-- banner -->
                    <div class="banner">
                        <div class="w3l_banner_nav_right">
                            <!-- about -->
                            <div class="privacy about">
                                <h3>Customer <span>Profile</span></h3>

                                <div class="checkout-left">

                                    <div class="col-md-12 ">
                                        <form action="" method="post" class="creditly-card-form agileinfo_form"
                                              onsubmit="return validatecustomer()">
                                            <section class="creditly-wrapper wthree, w3_agileits_wrapper">
                                                <div class="information-wrapper">
                                                    <div class="first-row form-group">
                                                        <div class="controls">
                                                            <label class="control-label">Customer Name</label><span
                                                                class="errormsg" id="errcustomer_name"></span>
                                                            <input class="billing-address-name form-control" type="text"
                                                                   name="customer_name" id="customer_name"
                                                                   placeholder="customer name"
                                                                   value="{{ $customer->customer_name }}"/>
                                                        </div>


                                                        <div class="w3_agileits_card_number_grid_left">
                                                            <div class="controls">
                                                                <label class="control-label">Email ID</label><span
                                                                    class="errormsg" id="erremail_id"></span>
                                                                <input name="email_id" id="email_id"
                                                                       class="form-control" type="text"
                                                                       placeholder="Email ID"
                                                                       value="{{$customer->email_id}}">
                                                            </div>
                                                        </div>

                                                        <div class="w3_agileits_card_number_grid_left">
                                                            <div class="controls">
                                                                <label class="control-label">Address</label><span
                                                                    class="errormsg" id="erraddress"></span>
                                                                <textarea name="address" id="address"
                                                                          class="form-control"
                                                                          placeholder="Enter Address">{{$customer->address}}</textarea>
                                                            </div>
                                                        </div>
                                                        <div class="w3_agileits_card_number_grid_left">
                                                            <div class="controls">
                                                                <label class="control-label">State</label><span
                                                                    class="errormsg" id="errstate"></span>
                                                                <select name="state" id="state" class="form-control">
                                                                    <option value="">------------Select
                                                                        Province------------
                                                                    </option>
                                                                    <option value="An Giang">An Giang</option>
                                                                    <option value="Bà Rịa - Vũng Tàu">Bà Rịa - Vũng Tàu</option>
                                                                    <option value="Bắc Giang">Bắc Giang</option>
                                                                    <option value="Bắc Kạn">Bắc Kạn</option>
                                                                    <option value="Bạc Liêu">Bạc Liêu</option>
                                                                    <option value="Bắc Ninh">Bắc Ninh</option>
                                                                    <option value="Bến Tre">Bến Tre</option>
                                                                    <option value="Bình Định">Bình Định</option>
                                                                    <option value="Bình Dương">Bình Dương</option>
                                                                    <option value="Bình Phước">Bình Phước</option>
                                                                    <option value="Bình Thuận">Bình Thuận</option>
                                                                    <option value="Cà Mau">Cà Mau</option>
                                                                    <option value="Cần Thơ">Cần Thơ</option>
                                                                    <option value="Cao Bằng">Cao Bằng</option>
                                                                    <option value="Đà Nẵng">Đà Nẵng</option>
                                                                    <option value="Đắk Lắk">Đắk Lắk</option>
                                                                    <option value="Đắk Nông">Đắk Nông</option>
                                                                    <option value="Điện Biên">Điện Biên</option>
                                                                    <option value="Đồng Nai">Đồng Nai</option>
                                                                    <option value="Đồng Tháp">Đồng Tháp</option>
                                                                    <option value="Gia Lai">Gia Lai</option>
                                                                    <option value="Hà Giang">Hà Giang</option>
                                                                    <option value="Hà Nam">Hà Nam</option>
                                                                    <option value="Hà Nội">Hà Nội</option>
                                                                    <option value="Hà Tĩnh">Hà Tĩnh</option>
                                                                    <option value="Hải Dương">Hải Dương</option>
                                                                    <option value="Hải Phòng">Hải Phòng</option>
                                                                    <option value="Hậu Giang">Hậu Giang</option>
                                                                    <option value="Hòa Bình">Hòa Bình</option>
                                                                    <option value="Hưng Yên">Hưng Yên</option>
                                                                    <option value="Khánh Hòa">Khánh Hòa</option>
                                                                    <option value="Kiên Giang">Kiên Giang</option>
                                                                    <option value="Kon Tum">Kon Tum</option>
                                                                    <option value="Lai Châu">Lai Châu</option>
                                                                    <option value="Lâm Đồng">Lâm Đồng</option>
                                                                    <option value="Lạng Sơn">Lạng Sơn</option>
                                                                    <option value="Lào Cai">Lào Cai</option>
                                                                    <option value="Long An">Long An</option>
                                                                    <option value="Nam Định">Nam Định</option>
                                                                    <option value="Nghệ An">Nghệ An</option>
                                                                    <option value="Ninh Bình">Ninh Bình</option>
                                                                    <option value="Ninh Thuận">Ninh Thuận</option>
                                                                    <option value="Phú Thọ">Phú Thọ</option>
                                                                    <option value="Phú Yên">Phú Yên</option>
                                                                    <option value="Quảng Bình">Quảng Bình</option>
                                                                    <option value="Quảng Nam">Quảng Nam</option>
                                                                    <option value="Quảng Ngãi">Quảng Ngãi</option>
                                                                    <option value="Quảng Ninh">Quảng Ninh</option>
                                                                    <option value="Quảng Trị">Quảng Trị</option>
                                                                    <option value="Sóc Trăng">Sóc Trăng</option>
                                                                    <option value="Sơn La">Sơn La</option>
                                                                    <option value="Tây Ninh">Tây Ninh</option>
                                                                    <option value="Thái Bình">Thái Bình</option>
                                                                    <option value="Thái Nguyên">Thái Nguyên</option>
                                                                    <option value="Thanh Hóa">Thanh Hóa</option>
                                                                    <option value="Thừa Thiên Huế">Thừa Thiên Huế</option>
                                                                    <option value="Tiền Giang">Tiền Giang</option>
                                                                    <option value="TP. Hồ Chí Minh">TP. Hồ Chí Minh</option>
                                                                    <option value="Trà Vinh">Trà Vinh</option>
                                                                    <option value="Tuyên Quang">Tuyên Quang</option>
                                                                    <option value="Vĩnh Long">Vĩnh Long</option>
                                                                    <option value="Vĩnh Phúc">Vĩnh Phúc</option>
                                                                    <option value="Yên Bái">Yên Bái</option>

                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="w3_agileits_card_number_grid_left">
                                                            <div class="controls">
                                                                <label class="control-label">City</label><span
                                                                    class="errormsg" id="errcity"></span>
                                                                <input name="city" id="city" class="form-control"
                                                                       placeholder="City"
                                                                       value="{{$customer->city}}">
                                                            </div>
                                                        </div>

                                                        <div class="w3_agileits_card_number_grid_left">
                                                            <div class="controls">
                                                                <label class="control-label">Landmark</label><span
                                                                    class="errormsg" id="errlandmark"></span>
                                                                <input name="landmark" id="landmark"
                                                                       class="form-control" placeholder="Landmark"

                                                                       value=""{{$customer->landmark}}"">
                                                            </div>
                                                        </div>

                                                        <div class="w3_agileits_card_number_grid_left">
                                                            <div class="controls">
                                                                <label class="control-label">PIN code</label><span
                                                                    class="errormsg" id="errpincode"></span>
                                                                <input name="pincode" id="pincode" class="form-control"
                                                                       placeholder="Pincode"

                                                                       value="{{$customer->pincode}}">
                                                            </div>
                                                        </div>

                                                        <div class="w3_agileits_card_number_grid_left">
                                                            <div class="controls">
                                                                <label class="control-label">Mobile number</label><span
                                                                    class="errormsg" id="errmobile_no"></span>
                                                                <input name="mobile_no" id="mobile_no"
                                                                       class="form-control" placeholder="Mobile number"

                                                                       value="{{$customer->mobile_no}}">
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <button class="btn btn-info" type="submit" name="submit">Update
                                                        Profile
                                                    </button>
                                                </div>
                                            </section>
                                        </form>

                                    </div>

                                    <div class="clearfix"></div>

                                </div>

                            </div>
                            <!-- //about -->
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <!-- //banner -->
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3"></div>
    </div>
</div>

@include('footer')
<script>
    function validatecustomer() {
        var numericExp = /^[0-9]+$/;
        var alphaExp = /^[a-zA-Z]+$/;
        var alphaSpaceExp = /^[a-zA-Z\s]+$/;
        var alphaNumericExp = /^[0-9a-zA-Z]+$/;
        var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
        $('.errormsg').html('');
        var errchk = "False";

        if (document.getElementById("customer_name").value.length > 15) {
            document.getElementById("errcustomer_name").innerHTML = "Customer name not contain less than 15 characters...";
            errchk = "True";
        }
        if (!document.getElementById("customer_name").value.match(alphaSpaceExp)) {
            document.getElementById("errcustomer_name").innerHTML = "Kindly enter valid Customer name..";
            errchk = "True";
        }
        if (document.getElementById("customer_name").value == "") {
            document.getElementById("errcustomer_name").innerHTML = "Customer name should not be empty...";
            errchk = "True";
        }
        if (!document.getElementById("email_id").value.match(emailExp)) {
            document.getElementById("erremail_id").innerHTML = "Entered Email ID is not valid....";
            errchk = "True";
        }
        if (document.getElementById("email_id").value == "") {
            document.getElementById("erremail_id").innerHTML = "Kindly enter Email ID.";
            errchk = "True";
        }
        if (document.getElementById("address").value == "") {
            document.getElementById("erraddress").innerHTML = "Address Should not be empty..";
            errchk = "True";
        }
        if (!document.getElementById("state").value.match(alphaSpaceExp)) {
            document.getElementById("errstate").innerHTML = "State should contain alphabets....";
            errchk = "True";
        }
        if (document.getElementById("state").value == "") {
            document.getElementById("errstate").innerHTML = "State Should not be empty..";
            errchk = "True";
        }
        if (!document.getElementById("city").value.match(alphaSpaceExp)) {
            document.getElementById("errcity").innerHTML = "City should contain alphabets....";
            errchk = "True";
        }
        if (document.getElementById("city").value == "") {
            document.getElementById("errcity").innerHTML = "City should not be empty..";
            errchk = "True";
        }
        if (!document.getElementById("landmark").value.match(alphaSpaceExp)) {
            document.getElementById("errlandmark").innerHTML = "Landmark should contain alphabets....";
            errchk = "True";
        }
        if (document.getElementById("landmark").value == "") {
            document.getElementById("errlandmark").innerHTML = "Landmark should not be empty.";
            errchk = "True";
        }
        if (document.getElementById("pincode").value.length != 6) {
            document.getElementById("errpincode").innerHTML = "PIN Code should contain 6 digits..";
            errchk = "True";
        }
        if (!document.getElementById("pincode").value.match(numericExp)) {
            document.getElementById("errpincode").innerHTML = "PIN code should contain digits....";
            errchk = "True";
        }
        if (document.getElementById("pincode").value == "") {
            document.getElementById("errpincode").innerHTML = "PIN Code should not be empty..";
            errchk = "True";
        }
        /*
        if(document.getElementById("mobile_no").value.length != 13)
        {
            document.getElementById("errmobile_no").innerHTML="Mobile Number should contain 10 digits..";
            errchk = "True";
        }
        */
        if (document.getElementById("mobile_no").value == "") {
            document.getElementById("errmobile_no").innerHTML = "Mobile number should not be empty..";
            errchk = "True";
        }
        if (errchk == "True") {
            return false;
        } else {
            return true;
        }
    }
</script>
