@include('header')
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
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    @if (session()->has('employee_id'))
                        <li class="breadcrumb-item active">Admin Dashboard</li>
                    @else
                        <li class="breadcrumb-item active">Employee Account</li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- breadcrumb-area end -->
<div class="banner">
    <div class="w3l_banner_nav_right">
        <div class="w3ls_w3l_banner_nav_right_grid w3ls_w3l_banner_nav_right_grid_sub">

            <h3 class="w3l_fruit">Admin Panel</h3>

            <div class="row">
                <!-- Deposit Amount Section -->
                <div class="col-md-3 w3ls_w3l_banner_left w3ls_w3l_banner_left_asdfdfd">
                    <div class="hover14 column">
                        <div class="agile_top_brand_left_grid w3l_agile_top_brand_left_grid">
                            <figure>
                                <div class="snipcart-item block border">

                                    <div class="snipcart-thumb">
                                        <center>
                                            <a href="{{ route('view_my_bid') }}">
                                                <img src="{{ url('img/bidding.gif') }}" alt="bidding"
                                                     class="img-responsive"
                                                     style="height: 200px; width: 300px;
                                                          object-fit: cover; border-radius: 8px;">
                                            </a>
                                        </center>

                                    </div>
                                    <form action="{{ route('view_my_bid') }}" >
                                        <fieldset>
                                            <center style="padding-top: 10px;">
                                                <input type="submit" value="No. of bidding records..."
                                                       class="btn btn-info">
                                            </center>
                                        </fieldset>
                                    </form>
                                    <div class="blog-meta-bundle">
                                        <div class="blog-readmore">
                                            <center>
                                                <a href="#"><i class="fa fa-angle-double-right"></i></a>
                                                <b>{{5}} Record</b>
                                                <a href="#"><i class="fa fa-angle-double-left"></i></a>
                                            </center>
                                        </div>
                                    </div>
                                </div>
                            </figure>

                        </div>
                    </div>
                </div>
                <!--- Starts here -->
                <div class="col-md-3 w3ls_w3l_banner_left w3ls_w3l_banner_left_asdfdfd">
                    <div class="hover14 column">
                        <div class="agile_top_brand_left_grid w3l_agile_top_brand_left_grid">
                            <figure>
                                <div class="snipcart-item block border">
                                    <div class="snipcart-thumb">
                                        <center><a href="{{ route('view_billing') }}"><img
                                                    src="{{url("img/bill.png")}}" alt=" "
                                                    class="img-responsive"
                                                    style="height: 200px;width: 300px;"/></a>
                                        </center>

                                    </div>
                                    <form action="{{ route('view_billing') }}" >
                                        <fieldset>
                                            <center style="padding-top: 10px;"><input type="submit"
                                                                                      value="No. of billings..."
                                                                                      class="btn btn-info"/>
                                            </center>
                                        </fieldset>
                                    </form>
                                    <div class="blog-meta-bundle">
                                        <div class="blog-readmore">
                                            <center>
                                                <a href="#"><i class="fa fa-angle-double-right"></i></a>
                                                <b>5 Record</b>
                                                <a href="#"><i class="fa fa-angle-double-left"></i></a>
                                            </center>
                                        </div>
                                    </div>

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
                                        <center><a href="{{ route('view_category') }}"><img
                                                    src="{{url('img/category.png')}}" alt=" "
                                                    class="img-responsive"
                                                    style="height: 200px;width: 300px;"/> </a>
                                        </center>

                                    </div>
                                    <form action="{{ route('view_category') }}" >
                                        <fieldset>
                                            <center style="padding-top: 10px;">
                                                <input type="submit"
                                                       value="No. of category..."
                                                       class="btn btn-info"/>
                                            </center>
                                        </fieldset>
                                    </form>
                                    <div class="blog-meta-bundle">
                                        <div class="blog-readmore">
                                            <center>
                                                <a href="#"><i class="fa fa-angle-double-right"></i></a>
                                                <b>6 Record</b>
                                                <a href="#"><i class="fa fa-angle-double-left"></i></a>
                                            </center>
                                        </div>
                                    </div>

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
                                        <center><a href="{{ route('view_customer_report') }}"><img
                                                    src="{{url("img/customer.jpg")}}" alt=" "
                                                    class="img-responsive"
                                                    style="height: 200px;width: 300px;"/></a>
                                        </center>

                                    </div>
                                    <form action="{{ route('view_customer_report') }}" >
                                        <fieldset>
                                            <center style="padding-top: 10px;"><input type="submit"
                                                                                      value="No. of customer..."
                                                                                      class="btn btn-info"/>
                                            </center>
                                        </fieldset>
                                    </form>
                                    <div class="blog-meta-bundle">
                                        <div class="blog-readmore">
                                            <center>
                                                <a href="#"><i class="fa fa-angle-double-right"></i></a>
                                                <b>5 Record</b>
                                                <a href="#"><i class="fa fa-angle-double-left"></i></a>
                                            </center>
                                        </div>
                                    </div>
                                </div>
                            </figure>
                        </div>
                    </div>
                </div>
                <!--- Ends here -->

                <div class="col-md-3 w3ls_w3l_banner_left w3ls_w3l_banner_left_asdfdfd">
                    <div class="hover14 column">
                        <div class="agile_top_brand_left_grid w3l_agile_top_brand_left_grid">


                            <figure>
                                <div class="snipcart-item block border">
                                    <div class="snipcart-thumb">
                                        <center><a href="{{route('view_message')}}"><img
                                                    src="{{url("img/message.png")}}" alt=" "
                                                    class="img-responsive"
                                                    style="height: 200px;width: 300px;"/></a>
                                        </center>
                                    </div>
                                    <form action={{route('view_message')}} >
                                        <fieldset>
                                            <center style="padding-top: 10px;"><input type="submit"
                                                                                      value="No. of messages..."
                                                                                      class="btn btn-info"/>
                                            </center>
                                        </fieldset>
                                    </form>
                                    <div class="blog-meta-bundle">
                                        <div class="blog-readmore">
                                            <center>
                                                <a href="#"><i class="fa fa-angle-double-right"></i></a>
                                                <b>
                                                    6. Record
                                                </b>
                                                <a href="#"><i class="fa fa-angle-double-left"></i></a>
                                            </center>
                                        </div>
                                    </div>

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
                                        <center><a href="{{route('view_payment')}}"><img
                                                    src="{{url("img/payment.png")}}"
                                                    alt=" "
                                                    class="img-responsive"
                                                    style="height: 200px;width: 300px;"/></a>
                                        </center>
                                    </div>
                                    <form action="{{route('view_payment')}}" >
                                        <fieldset>
                                            <center style="padding-top: 10px;"><input type="submit"
                                                                                      value="No. of payments..."
                                                                                      class="btn btn-info"/>
                                            </center>
                                        </fieldset>
                                    </form>
                                    <div class="blog-meta-bundle">
                                        <div class="blog-readmore">
                                            <center>
                                                <a href="#"><i class="fa fa-angle-double-right"></i></a>
                                                <b>6 Record</b>
                                                <a href="#"><i class="fa fa-angle-double-left"></i></a>
                                            </center>
                                        </div>
                                    </div>

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
                                                    src="{{url("img/product.png")}}" alt=" "
                                                    class="img-responsive"
                                                    style="height: 200px;width: 300px;"/></a>
                                        </center>
                                    </div>
                                    <form action="{{route('products_view')}}" >
                                        <fieldset>
                                            <center style="padding-top: 10px;"><input type="submit"
                                                                                      value="No. of products..."
                                                                                      class="btn btn-info"/>
                                            </center>
                                        </fieldset>
                                    </form>
                                    <div class="blog-meta-bundle">
                                        <div class="blog-readmore">
                                            <center>
                                                <a href="#"><i class="fa fa-angle-double-right"></i></a>
                                                <b>7 Record</b>
                                                <a href="#"><i class="fa fa-angle-double-left"></i></a>
                                            </center>
                                        </div>
                                    </div>

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
                                        <center><a href="{{route('view_winners')}}"><img
                                                    src="{{url("img/winner.jpg")}}" alt=" "
                                                    class="img-responsive"
                                                    style="height: 200px;width: 300px;"/></a>
                                        </center>
                                    </div>
                                    <form action="{{route('view_winners')}}" >
                                        <fieldset>
                                            <center style="padding-top: 10px;"><input type="submit"
                                                                                      value="No. of winners winners..."
                                                                                      class="btn btn-info"/>
                                            </center>
                                        </fieldset>
                                    </form>
                                    <div class="blog-meta-bundle">
                                        <div class="blog-readmore">
                                            <center>
                                                <a href="#"><i class="fa fa-angle-double-right"></i></a>
                                                <b>* Record</b>
                                                <a href="#"><i class="fa fa-angle-double-left"></i></a>
                                            </center>
                                        </div>
                                    </div>

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

<!-- content-wraper start -->
<!-- content-wraper end -->

@include('footer')
