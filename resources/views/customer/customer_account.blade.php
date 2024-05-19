@include('header')
<!-- banner -->
<style>
    .hover14.column {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        padding: 15px;
    }

    .agile_top_brand_left_grid1 {
        margin-bottom: 20px;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .snipcart-item {
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 8px;
        background-color: #fff;
    }

    .snipcart-thumb img {
        width: 100%;
        height: auto;
        object-fit: cover;
        border-radius: 8px;
    }

    .snipcart-details {
        padding-top: 10px;
    }

    .snipcart-details form {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .snipcart-details input[type="submit"] {
        border-radius: 5px;
        padding: 10px 20px;
        background-color: #17a2b8;
        color: #fff;
        border: none;
        transition: background-color 0.3s;
    }

    .snipcart-details input[type="submit"]:hover {
        background-color: #138496;
    }

</style>
<style>

    .banner {
        padding: 20px;
        /*background-color: rgba(3, 248, 59, 0.06);*/
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        margin: 20px;
    }

    .w3l_fruit {
        text-align: center;
        color: #fa0303;
        font-weight: bold;
        margin-bottom: 20px;
    }

    .w3ls_w3l_banner_left {
        margin-bottom: 20px;
    }

    .agile_top_brand_left_grid {
        /*background-color: rgba(234, 241, 4, 0.11);*/
        border: 1px solid #ddd;
        border-radius: 5px;
        padding: 15px;
        text-align: center;
        transition: transform 0.2s, box-shadow 0.2s;
        cursor: pointer;
    }

    .agile_top_brand_left_grid:hover {
        transform: translateY(-10px);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }

    .agile_top_brand_left_grid1 {
        position: relative;
    }


    .figure-content h4 {
        margin-bottom: 10px;
        color: #333;
    }

    .figure-content p {
        margin-bottom: 0;
        color: #777;
    }
</style>
<!-- breadcrumb-area start -->
<div class="breadcrumb-area bg-gray">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumb-list">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item active">Customer Panel</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb-area end -->

<div class="banner">
    <div class="w3l_banner_nav_right">
        <div class="w3ls_w3l_banner_nav_right_grid w3ls_w3l_banner_nav_right_grid_sub">

            <h3 class="w3l_fruit">Customer Panel</h3>
            <div class="row">
                <!-- Deposit Amount Section -->
                <div class="col-md-3 w3ls_w3l_banner_left w3ls_w3l_banner_left_asdfdfd">
                    <div class="hover14 column">
                        <div class="agile_top_brand_left_grid w3l_agile_top_brand_left_grid">
                            <figure>
                                <div class="snipcart-item block border">

                                    <div class="snipcart-thumb">
                                        <center>
                                            <a href="{{ route('deposit') }}">
                                                <img src="{{ url('images/de.jpg') }}" alt="Deposit"
                                                     class="img-responsive"
                                                     style="height: 200px; width: 300px;
                                                          object-fit: cover; border-radius: 8px;">
                                            </a>
                                        </center>

                                    </div>
                                    <form action="{{ route('deposit') }}"   >
                                        <fieldset>
                                            <center style="padding-top: 10px;">
                                                <input type="submit" value="Deposit Amount"
                                                       class="btn btn-info">
                                            </center>
                                        </fieldset>
                                    </form>
                                </div>
                            </figure>

                        </div>
                    </div>
                </div>
                <!-- View My Bid Section -->
                <!--- Starts here -->
                <div class="col-md-3 w3ls_w3l_banner_left w3ls_w3l_banner_left_asdfdfd">
                    <div class="hover14 column">
                        <div class="agile_top_brand_left_grid w3l_agile_top_brand_left_grid">
                            <figure>
                                <div class="snipcart-item block border">
                                    <div class="snipcart-thumb">
                                        <center><a href="{{ route('my_products') }}"><img
                                                    src="{{url('images/view.jpg')}}" alt=" "
                                                    class="img-responsive"
                                                    style="height: 200px;width: 300px;"/> </a>
                                        </center>

                                    </div>
                                    <form action="{{ route('view_my_bid') }}" >
                                        <fieldset>
                                            <center style="padding-top: 10px;">
                                                <input type="submit"
                                                       value="View My Bid"
                                                       class="btn btn-info"/>
                                            </center>
                                        </fieldset>
                                    </form>
                                </div>
                            </figure>
                        </div>
                    </div>
                </div>
                <!--- Ends here -->

                <!--- Starts here -->
                <div class="col-md-3 w3ls_w3l_banner_left w3ls_w3l_banner_left_asdfdfd">
                    <div class="hover14 column">
                        <div class="agile_top_brand_left_grid w3l_agile_top_brand_left_grid">
                            <figure>
                                <div class="snipcart-item block border">
                                    <div class="snipcart-thumb">
                                        <center><a href="{{ route('view_winning_bid') }}"><img
                                                    src="{{url("images/win.jpg")}}" alt=" "
                                                    class="img-responsive"
                                                    style="height: 200px;width: 300px;"/></a>
                                        </center>

                                    </div>
                                    <form action="{{ route('view_winning_bid') }}" >
                                        <fieldset>
                                            <center style="padding-top: 10px;"><input type="submit"
                                                                                      value="Winning Bid"
                                                                                      class="btn btn-info"/>
                                            </center>
                                        </fieldset>
                                    </form>
                                </div>
                            </figure>
                        </div>
                    </div>
                </div>
                <!--- Ends here -->

                <!--- Starts here -->
                <div class="col-md-3 w3ls_w3l_banner_left w3ls_w3l_banner_left_asdfdfd">
                    <div class="hover14 column">
                        <div class="agile_top_brand_left_grid w3l_agile_top_brand_left_grid">
                            <figure>
                                <div class="snipcart-item block border">
                                    <div class="snipcart-thumb">
                                        <center><a href="{{ route('step_add_product_1') }}"><img
                                                    src="{{url("images/buy.jpg")}}" alt=" "
                                                    class="img-responsive"
                                                    style="height: 200px;width: 300px;"/></a>
                                        </center>

                                    </div>
                                    <form action="{{ route('step_add_product_1') }}" >
                                        <fieldset>
                                            <center style="padding-top: 10px;"><input type="submit"
                                                                                      value="Sell Product"
                                                                                      class="btn btn-info"/>
                                            </center>
                                        </fieldset>
                                    </form>
                                </div>
                            </figure>
                        </div>
                    </div>
                </div>
                <!--- Ends here -->

                <!--- Starts here -->
                <div class="col-md-3 w3ls_w3l_banner_left w3ls_w3l_banner_left_asdfdfd">
                    <div class="hover14 column">
                        <div class="agile_top_brand_left_grid w3l_agile_top_brand_left_grid">
                            <figure>
                                <div class="snipcart-item block border">
                                    <div class="snipcart-thumb">
                                        <center><a href="{{route('products_view')}}"><img
                                                    src="{{url("images/v.jpg")}}" alt=" "
                                                    class="img-responsive"
                                                    style="height: 200px;width: 300px;"/></a>
                                        </center>

                                    </div>
                                    <form action="{{route('products_view')}}" >
                                        <fieldset>
                                            <center style="padding-top: 10px;"><input type="submit"
                                                                                      value="View Product"
                                                                                      class="btn btn-info"/>
                                            </center>
                                        </fieldset>
                                    </form>
                                </div>
                            </figure>
                        </div>
                    </div>
                </div>
                <!--- Ends here -->

                <!--- Starts here -->
                <div class="col-md-3 w3ls_w3l_banner_left w3ls_w3l_banner_left_asdfdfd">
                    <div class="hover14 column">
                        <div class="agile_top_brand_left_grid w3l_agile_top_brand_left_grid">
                            <figure>
                                <div class="snipcart-item block border">
                                    <div class="snipcart-thumb">
                                        <center><a href="{{route('customer_profile')}}"><img
                                                    src="{{url("images/pr.jpg")}}" alt=" "
                                                    class="img-responsive"
                                                    style="height: 200px;width: 300px;"/></a>
                                        </center>
                                    </div>
                                    <form action={{route('customer_profile')}} >
                                        <fieldset>
                                            <center style="padding-top: 10px;"><input type="submit"
                                                                                      value="Profile"
                                                                                      class="btn btn-info"/>
                                            </center>
                                        </fieldset>
                                    </form>
                                </div>
                            </figure>
                        </div>
                    </div>
                </div>
                <!--- Ends here -->

                <!--- Starts here -->
                <div class="col-md-3 w3ls_w3l_banner_left w3ls_w3l_banner_left_asdfdfd">
                    <div class="hover14 column">
                        <div class="agile_top_brand_left_grid w3l_agile_top_brand_left_grid">
                            <figure>
                                <div class="snipcart-item block border">
                                    <div class="snipcart-thumb">
                                        <center><a href="{{route('customer_change_password')}}"><img
                                                    src="{{url("images/cn.jpg")}}"
                                                    alt=" "
                                                    class="img-responsive"
                                                    style="height: 200px;width: 300px;"/></a>
                                        </center>
                                    </div>
                                    <form action="{{route('customer_change_password')}}" >
                                        <fieldset>
                                            <center style="padding-top: 10px;"><input type="submit"
                                                                                      value="Change Password"
                                                                                      class="btn btn-info"/>
                                            </center>
                                        </fieldset>
                                    </form>
                                </div>
                            </figure>
                        </div>
                    </div>
                </div>
                <!--- Ends here -->

                <!--- Starts here -->
                <div class="col-md-3 w3ls_w3l_banner_left w3ls_w3l_banner_left_asdfdfd">
                    <div class="hover14 column">
                        <div class="agile_top_brand_left_grid w3l_agile_top_brand_left_grid">
                            <figure>
                                <div class="snipcart-item block border">
                                    <div class="snipcart-thumb">
                                        <center><a href="{{route('view_billing_customer')}}"><img
                                                    src="{{url("images/tr.jpg")}}" alt=" "
                                                    class="img-responsive"
                                                    style="height: 200px;width: 300px;"/></a>
                                        </center>
                                    </div>
                                    <form action="{{route('view_billing_customer')}}" >
                                        <fieldset>
                                            <center style="padding-top: 10px;"><input type="submit"
                                                                                      value="View Transaction"
                                                                                      class="btn btn-info"/>
                                            </center>
                                        </fieldset>
                                    </form>
                                </div>
                            </figure>
                        </div>
                    </div>
                </div>
                <!--- Ends here -->

                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>
<div class="clearfix"></div>

<!-- //banner -->

@include('footer')
