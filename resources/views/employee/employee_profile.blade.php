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
                                <h3 style="text-align: center">Employee <span>Profile</span></h3>
                                <div class="checkout-left" style="padding-left: 300px; padding-right: 300px">
                                    <form method="post" action="{{ route('update_employee') }}"
                                          class="creditly-card-form agileinfo_form">
                                        @csrf
                                        <section class="creditly-wrapper wthree, w3_agileits_wrapper">
                                            <div class="information-wrapper">
                                                <div class="first-row form-group">
                                                    <div class="controls">
                                                        <label class="control-label">Employee Name: </label>
                                                        <input class="billing-address-name form-control" type="text"
                                                               name="emp_name" id="emp_name"
                                                               placeholder="Employee name"
                                                               value="{{ $rsedit->employee_name }}">
                                                    </div>

                                                    <div class="w3_agileits_card_number_grid_left">
                                                        <div class="controls">
                                                            <label class="control-label">Login ID:</label>
                                                            <input name="login_id" id="login_id"
                                                                   class="form-control" type="text"
                                                                   placeholder="Login ID"
                                                                   value="{{ $rsedit->login_id }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <button class="submit check_out" type="submit" name="submit">
                                                    Submit
                                                </button>
                                            </div>
                                        </section>
                                    </form>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
