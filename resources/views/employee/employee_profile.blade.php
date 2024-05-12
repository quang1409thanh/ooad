@include('header')

@if(isset($errors) && count($errors) > 0)
    @foreach ($errors->all() as $error)
        <div>{{ $error }}</div>
    @endforeach
@endif

@if (session('status'))
    <div>{{ session('status') }}</div>
@endif

@if (session('employee_id'))
    @php
        $rsedit = App\Models\Employee::where('employee_id', session('employee_id'))->first();
    @endphp
@endif

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
                                <h3>Employee <span>Profile</span></h3>

                                <div class="checkout-left">

                                    <div class="col-md-8 ">
                                        <form method="post" action="{{ route('update_employee') }}" class="creditly-card-form agileinfo_form">
                                            @csrf
                                            <section class="creditly-wrapper wthree, w3_agileits_wrapper">
                                                <div class="information-wrapper">
                                                    <div class="first-row form-group">
                                                        <div class="controls">
                                                            <label class="control-label">Employee Name: </label>
                                                            <input class="billing-address-name form-control" type="text" name="emp_name" id="emp_name" placeholder="Employee name" value="{{ $rsedit->employee_name }}">
                                                        </div>

                                                        <div class="w3_agileits_card_number_grid_left">
                                                            <div class="controls">
                                                                <label class="control-label">Login ID:</label>
                                                                <input name="login_id" id="login_id" class="form-control" type="text" placeholder="Login ID" value="{{ $rsedit->login_id }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button class="submit check_out" type="submit" name="submit">Submit</button>
                                                </div>
                                            </section>
                                        </form>

                                    </div>

                                    <div class="clearfix"> </div>

                                </div>

                            </div>
                            <!-- //about -->
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <!-- //banner -->

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
        var alphaExp = /^[a-zA-Z]+$/; //Variable to validate only alphabets
        var emailpattern = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/; //For email id
        var alphaspaceExp = /^[a-zA-Z\s]+$/; //Variable to validate only alphabets with space
        $("span").html("");
        var i = 0;
        /* ########end 1######## */

        if (!document.getElementById("emp_name").value.match(alphaspaceExp)) {
            document.getElementById("idemp_name").innerHTML = "Employee name should contain only alphabets....";
            i = 1;
        }
        if (document.getElementById("emp_name").value == "") {
            document.getElementById("idemp_name").innerHTML = "Employee name should not be empty....";
            i = 1;
        }
        if (!document.getElementById("login_id").value.match(alphaExp)) {
            document.getElementById("idlogin_id").innerHTML = "Entered login ID is not valid...";
            i = 1;
        }
        if (document.getElementById("login_id").value == "") {
            document.getElementById("idlogin_id").innerHTML = "Login ID should not be empty....";
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
