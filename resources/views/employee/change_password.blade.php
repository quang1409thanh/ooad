@include('header')

@if (isset($errors) && count($errors) > 0)
    @foreach ($errors->all() as $error)
        <div>{{ $error }}</div>
    @endforeach
@endif
<!-- breadcrumb-area start -->
<div class="breadcrumb-area bg-gray">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumb-list">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item active">Profile</li>
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
                                <h3 style="text-align: center">Change Employee Password</h3>
                                <div class="checkout-left" style="padding-left: 300px; padding-right: 300px">
                                    <form  method="get"
                                          onsubmit="return validateform()"
                                          class="creditly-card-form agileinfo_form">
                                        @csrf
                                        <section class="creditly-wrapper wthree, w3_agileits_wrapper">
                                            <div class="information-wrapper">
                                                <div class="first-row form-group">
                                                    <div class="w3_agileits_card_number_grid_left">
                                                        <div class="controls">
                                                            <label class="control-label">Old password:</label>
                                                            <input name="opass" id="opass" class="form-control"
                                                                   type="password" placeholder="Enter old password">
                                                        </div>
                                                    </div>

                                                    <div class="w3_agileits_card_number_grid_left">
                                                        <div class="controls">
                                                            <label class="control-label">New Password:</label>
                                                            <input name="npass" id="npass" class="form-control"
                                                                   type="password" placeholder="Enter New password">
                                                        </div>
                                                    </div>

                                                    <div class="w3_agileits_card_number_grid_left">
                                                        <div class="controls">
                                                            <label class="control-label">Confirm Password:</label>
                                                            <input name="cpass" id="cpass" class="form-control"
                                                                   type="password"
                                                                   placeholder="Confirm New password">
                                                        </div>
                                                    </div>
                                                </div>
                                                <button class="submit check_out" type="submit" name="submit">Update
                                                    Password
                                                </button>
                                            </div>
                                        </section>
                                    </form>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3"></div>
        </div>
    </div>
</div>

@include('footer')

<script>
    function validateform() {
        /* #######start 1######### */


        var alphanumericExp = /^[a-zA-Z0-9]+$/; //Variable to validate only alphanumerics


        $("span").html("");
        var i = 0;
        /* ########end 1######## */

        if (!document.getElementById("opass").value.match(alphanumericExp)) {
            document.getElementById("idopass").innerHTML = "Old password should contain only alphabets and numbers....";
            i = 1;
        }
        if (document.getElementById("opass").value == "") {
            document.getElementById("idopass").innerHTML = "Old password should not be empty....";
            i = 1;
        }
        if (!document.getElementById("npass").value.match(alphanumericExp)) {
            document.getElementById("idnpass").innerHTML = "New password should contain only alphabets and numbers....";
            i = 1;
        }
        if (document.getElementById("npass").value == "") {
            document.getElementById("idnpass").innerHTML = "New password should not be empty....";
            i = 1;
        }
        if (document.getElementById("cpass").value != document.getElementById("npass").value) {
            document.getElementById("idcpass").innerHTML = "Confirm password Must match with new password..";
            i = 1;
        }
        if (document.getElementById("cpass").value == "") {
            document.getElementById("idcpass").innerHTML = "Confirm Password should not be empty....";
            i = 1;
        }


        /* #######start 2######### */
        if (i == 0) {
            return true;
        } else {
            return false;
        }
        /* #######end 2######### */
    }
</script>
