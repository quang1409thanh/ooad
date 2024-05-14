@include('header')
<!-- banner -->
<div class="banner">
    {{--    @include('sidebar')--}}
    <div class="w3l_banner_nav_right">
        <div class="w3ls_w3l_banner_nav_right_grid w3ls_w3l_banner_nav_right_grid_sub">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <h3 class="w3l_fruit">Customer Panel</h3>

            <div class="row">
                <!-- Phần Deposit Amount -->
                <div class="col-md-3 w3ls_w3l_banner_left w3ls_w3l_banner_left_asdfdfd">
                    <div class="hover14 column">
                        <div class="agile_top_brand_left_grid w3l_agile_top_brand_left_grid">
                            <div class="agile_top_brand_left_grid1">
                                <figure>
                                    <div class="snipcart-item block border">
                                        <div class="snipcart-thumb">
                                            <center><a href="{{ route('deposit') }}"><img src="{{url("images/de.jpg")}}"
                                                                                          alt=" " class="img-responsive"
                                                                                          style="height: 200px;width: 300px;"/></a>
                                            </center>
                                        </div>
                                        <div class="snipcart-details ">
                                            <center style="padding-top: 10px;">
                                                <form action="{{ route('deposit') }}" method="post">
                                                    @csrf
                                                    <fieldset>
                                                        <input type="submit" value="Deposit Amount"
                                                               class="btn btn-info"/>
                                                    </fieldset>
                                                </form>
                                            </center>
                                        </div>
                                    </div>
                                </figure>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Phần View My Bid -->
                <!--- Starts here -->
                <div class="col-md-3 w3ls_w3l_banner_left w3ls_w3l_banner_left_asdfdfd">
                    <div class="hover14 column">
                        <div class="agile_top_brand_left_grid w3l_agile_top_brand_left_grid">
                            <div class="agile_top_brand_left_grid1">
                                <figure>
                                    <div class="snipcart-item block border">
                                        <div class="snipcart-thumb">
                                            <center><a href="{{ route('view_my_bid') }}"><img
                                                        src="{{url("images/view.jpg")}}" alt=" "
                                                        class="img-responsive"
                                                        style="height: 200px;width: 300px;"/></a>
                                            </center>

                                        </div>
                                        <div class="snipcart-details border">
                                            <form action="{{ route('view_my_bid') }}" method="post">
                                                <fieldset>
                                                    <center style="padding-top: 10px;"><input type="submit"
                                                                                              value="View My Bid"
                                                                                              class="btn btn-info"/>
                                                    </center>
                                                </fieldset>
                                            </form>
                                        </div>
                                    </div>
                                </figure>
                            </div>
                        </div>
                    </div>
                </div>
                <!--- Ends here -->

                <!--- Starts here -->
                <div class="col-md-3 w3ls_w3l_banner_left w3ls_w3l_banner_left_asdfdfd">
                    <div class="hover14 column">
                        <div class="agile_top_brand_left_grid w3l_agile_top_brand_left_grid">
                            <div class="agile_top_brand_left_grid1">
                                <figure>
                                    <div class="snipcart-item block border">
                                        <div class="snipcart-thumb">
                                            <center><a href="{{ route('view_winning_bid') }}"><img
                                                        src="{{url("images/win.jpg")}}" alt=" "
                                                        class="img-responsive"
                                                        style="height: 200px;width: 300px;"/></a>
                                            </center>

                                        </div>
                                        <div class="snipcart-details border">
                                            <form action="{{ route('view_winning_bid') }}" method="post">
                                                <fieldset>
                                                    <center style="padding-top: 10px;"><input type="submit"
                                                                                              value="Winning Bid"
                                                                                              class="btn btn-info"/>
                                                    </center>
                                                </fieldset>
                                            </form>
                                        </div>
                                    </div>
                                </figure>
                            </div>
                        </div>
                    </div>
                </div>
                <!--- Ends here -->

                <!--- Starts here -->
                <div class="col-md-3 w3ls_w3l_banner_left w3ls_w3l_banner_left_asdfdfd">
                    <div class="hover14 column">
                        <div class="agile_top_brand_left_grid w3l_agile_top_brand_left_grid">
                            <div class="agile_top_brand_left_grid1">
                                <figure>
                                    <div class="snipcart-item block border">
                                        <div class="snipcart-thumb">
                                            <center><a href="{{ route('step_add_product_1') }}"><img
                                                        src="{{url("images/buy.jpg")}}" alt=" "
                                                        class="img-responsive"
                                                        style="height: 200px;width: 300px;"/></a>
                                            </center>

                                        </div>
                                        <div class="snipcart-details border">
                                            <form action="{{ route('step_add_product_1') }}" method="post">
                                                <fieldset>
                                                    <center style="padding-top: 10px;"><input type="submit"
                                                                                              value="Sell Product"
                                                                                              class="btn btn-info"/>
                                                    </center>
                                                </fieldset>
                                            </form>
                                        </div>
                                    </div>
                                </figure>
                            </div>
                        </div>
                    </div>
                </div>
                <!--- Ends here -->

                <!--- Starts here -->
                <div class="col-md-3 w3ls_w3l_banner_left w3ls_w3l_banner_left_asdfdfd">
                    <div class="hover14 column">
                        <div class="agile_top_brand_left_grid w3l_agile_top_brand_left_grid">
                            <div class="agile_top_brand_left_grid1">
                                <figure>
                                    <div class="snipcart-item block border">
                                        <div class="snipcart-thumb">
                                            <center><a href="{{route('products_view')}}"><img
                                                        src="{{url("images/v.jpg")}}" alt=" "
                                                        class="img-responsive"
                                                        style="height: 200px;width: 300px;"/></a>
                                            </center>

                                        </div>
                                        <div class="snipcart-details border">
                                            <form action="{{route('products_view')}}" method="post">
                                                <fieldset>
                                                    <center style="padding-top: 10px;"><input type="submit"
                                                                                              value="View Product"
                                                                                              class="btn btn-info"/>
                                                    </center>
                                                </fieldset>
                                            </form>
                                        </div>
                                    </div>
                                </figure>
                            </div>
                        </div>
                    </div>
                </div>
                <!--- Ends here -->

                <!--- Starts here -->
                <div class="col-md-3 w3ls_w3l_banner_left w3ls_w3l_banner_left_asdfdfd">
                    <div class="hover14 column">
                        <div class="agile_top_brand_left_grid w3l_agile_top_brand_left_grid">
                            <div class="agile_top_brand_left_grid1">
                                <figure>
                                    <div class="snipcart-item block border">
                                        <div class="snipcart-thumb">
                                            <center><a href="{{route('customer_profile')}}"><img
                                                        src="{{url("images/pr.jpg")}}" alt=" "
                                                        class="img-responsive"
                                                        style="height: 200px;width: 300px;"/></a>
                                            </center>
                                        </div>
                                        <div class="snipcart-details border">
                                            <form action={{route('customer_profile')}} method="post">
                                                <fieldset>
                                                    <center style="padding-top: 10px;"><input type="submit"
                                                                                              value="Profile"
                                                                                              class="btn btn-info"/>
                                                    </center>
                                                </fieldset>
                                            </form>
                                        </div>
                                    </div>
                                </figure>
                            </div>
                        </div>
                    </div>
                </div>
                <!--- Ends here -->

                <!--- Starts here -->
                <div class="col-md-3 w3ls_w3l_banner_left w3ls_w3l_banner_left_asdfdfd">
                    <div class="hover14 column">
                        <div class="agile_top_brand_left_grid w3l_agile_top_brand_left_grid">
                            <div class="agile_top_brand_left_grid1">
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
                                        <div class="snipcart-details border">
                                            <form action="{{route('customer_change_password')}}" method="post">
                                                <fieldset>
                                                    <center style="padding-top: 10px;"><input type="submit"
                                                                                              value="Change Password"
                                                                                              class="btn btn-info"/>
                                                    </center>
                                                </fieldset>
                                            </form>
                                        </div>
                                    </div>
                                </figure>
                            </div>
                        </div>
                    </div>
                </div>
                <!--- Ends here -->

                <!--- Starts here -->
                <div class="col-md-3 w3ls_w3l_banner_left w3ls_w3l_banner_left_asdfdfd">
                    <div class="hover14 column">
                        <div class="agile_top_brand_left_grid w3l_agile_top_brand_left_grid">
                            <div class="agile_top_brand_left_grid1">
                                <figure>
                                    <div class="snipcart-item block border">
                                        <div class="snipcart-thumb">
                                            <center><a href="{{route('view_billing_customer')}}"><img
                                                        src="{{url("images/tr.jpg")}}" alt=" "
                                                        class="img-responsive"
                                                        style="height: 200px;width: 300px;"/></a>
                                            </center>
                                        </div>
                                        <div class="snipcart-details border ">
                                            <form action="{{route('view_billing_customer')}}" method="post">
                                                <fieldset>
                                                    <center style="padding-top: 10px;"><input type="submit"
                                                                                              value="View Transaction"
                                                                                              class="btn btn-info"/>
                                                </fieldset>
                                                </center>
                                            </form>
                                        </div>
                                    </div>
                                </figure>
                            </div>
                        </div>
                    </div>
                </div>
                <!--- Ends here -->

                <div class="clearfix"></div>

            </div>
        </div>
    </div>
    <div class="clearfix"></div>
</div>
<!-- //banner -->

@include('footer')
