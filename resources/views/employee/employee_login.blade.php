@include('header')

<!-- breadcrumb-area start -->
<div class="breadcrumb-area bg-gray">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumb-list">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item active">Employee Login</li>
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
                    <center>
                        <h3>Employee Login</h3>
                    </center>
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                        
                    <div class="login-Register-info">
                        <form action="{{ url('/employee_login') }}" method="post">
                            @csrf
                            <p class="coupon-input form-row-first">
                                <label>Login ID <span class="required">*</span></label>
                                <input type="text" name="email" id="email">
                            </p>
                            <p class="coupon-input form-row-last">
                                <label>Password <span class="required">*</span></label>
                                <input type="password" name="password" id="password">
                            </p>
                            <div class="clear"></div>
                            <p>
                                <button value="Login" name="btnadminlogin" id="login" class="button-login" type="submit">Login</button>
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

@include('footer')
