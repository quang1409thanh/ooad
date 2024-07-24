@include('header')

<!-- breadcrumb-area start -->
<div class="breadcrumb-area bg-gray">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumb-list">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">About us</li>
                </ul>
            </div>
        </div>
    </div></div>
<!-- breadcrumb-area end -->

<!-- content-wraper start -->
<div class="content-wraper mt-95">
    <div class="container">
        <div class="row ">
            <div class="col-lg-6">
                <div class="about-us-img" >
                    <img style="max-width: 90%; height: 80%" alt="" src="{{ asset('images/online-auction.jpg') }}">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="about-info-wrapper">
                    <h2>Our company</h2>
                    <p>OnlineAuction gives an opportunity to those people who can't afford to purchase costly branded products, they can try our risk-free auctions to win their desired products like Cars, Bikes, Smartphones, Laptops, Tablets & branded watches.</p>
                    <p>Welcome to OnlineAuction, one of the best online auction shopping venues on the Net! This website is owned and operated by OnlineAuction; successful business persons from the western region.</p>
                    <p>OnlineAuction conducted its 1st online auction on 2024. Since then, we are proudly No-1 Online Auctioneer with 20k+ Registered Members</p>
                    <p>OnlineAuction has introduced a completely new and funny way of online shopping. </p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- content-wraper end -->

@include('footer')
