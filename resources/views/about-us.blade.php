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
                    <p> Demo Môn Học các vấn đề hiện đại trong công nghệ thông tin
                </div>
            </div>
        </div>
    </div>
</div>
<!-- content-wraper end -->

@include('footer')
