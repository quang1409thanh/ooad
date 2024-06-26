@include('header')
@include('sweetalert::alert')

<!-- breadcrumb-area start -->
<div class="breadcrumb-area bg-gray">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumb-list">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">Login</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb-area end -->

<!-- content-wraper start -->
<div class="content-wraper mt-50">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3"></div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="customer-login-register">
                    <center><h3>Login</h3></center>
                    <div class="login-Register-info">
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        <form action="{{ url('/customer_login') }}" method="post"
                              onsubmit="return validatecustomer();">
                            @csrf

                            <p class="coupon-input form-row-first">
                                <label>Mobile No. or Email <span class="required">*</span> <span class="errormsg"
                                                                                                 id="erremail"></span></label>
                                <input type="text" name="email_id" id="email">
                            </p>
                            <p class="coupon-input form-row-last">
                                <label>password <span class="required">*</span> <span class="errormsg"
                                                                                      id="errpassword"></span></label>
                                <input type="password" name="password" id="password">
                            </p>
                            <div class="clear"></div>
                            <p>
                                <button value="Login" name="btncustlogin" class="button-login" type="submit">Login
                                </button>
                                <?php
                                /*
                                <a href="#" class="lost-password">Lost your password?</a>
                                */
                                ?>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3"></div>
        </div>
    </div>
</div>
<!-- content-wraper end -->

<!-- footer-area start -->
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
        /*
        if(!document.getElementById("email").value.match(emailExp))
        {
        document.getElementById("erremail").innerHTML = "Entered Email ID is not valid....";
        errchk = "True";
        }
        if(document.getElementById("email").value == "")
        {
        document.getElementById("erremail").innerHTML="Kindly enter Email ID. or Mobile number to Login";
        errchk = "True";
        }
        */
        if (document.getElementById("password").value.length < 8) {
            document.getElementById("errpassword").innerHTML = "Password should contain more than 8 characters...";
            errchk = "True";
        }
        if (document.getElementById("password").value.length > 16) {
            document.getElementById("errpassword").innerHTML = "Password should contain less than 16 characters...";
            errchk = "True";
        }
        if (!document.getElementById("password").value.match(alphaNumericExp)) {
            document.getElementById("errpassword").innerHTML = "password should contain only alphabets and numbers....";
            errchk = "True";
        }
        if (document.getElementById("password").value == "") {
            document.getElementById("errpassword").innerHTML = " password should not be empty....";
            errchk = "True";
        }
        if (errchk == "True") {
            return false;
        } else {
            return true;
        }
    }
</script>
