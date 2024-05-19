@include('header')

@if (!session()->has('employee_id'))
    <script>
        window.location = '{{ route("customer_login") }}';
    </script>
@endif
<style>
</style>
<!-- breadcrumb-area start -->
<div class="breadcrumb-area bg-gray">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumb-list">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item active">Select ReverseBid</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb-area end -->
<!-- banner -->
<div class="content-wraper mt-10">
    <div class="container-fluid">
        <div class="checkout-area">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-12 col-xl-12 col-sm-12">
                            <div class="checkbox-form checkout-review-order">
                                <h3>Select category</h3>
                                <br>
                                <br>
                                <div class="row">
                                    @foreach($categories as $category)
                                        @php
                                            $imgname = file_exists(public_path("category/{$category->category_icon}")) ? "category/{$category->category_icon}" : "img/No-Image-Available.png";
                                        @endphp
                                        <div class="col-md-4 w3l_banner_nav_right_banner3_btml">
                                            <div class="view view-tenth"
                                                 onclick="window.location='{{ route("reverse_product", ["categoryid" => $category->category_id]) }}'"
                                                 style="cursor:pointer;">
                                                <img src="{{ asset($imgname) }}" style="height:280px;width: 100%;"
                                                     class="img-responsive" alt=""/>
                                                <div class="mask">
                                                    <h4>{{ $category->category_name }}</h4>
                                                    <p>{{ $category->description }}</p>
                                                </div>
                                            </div>
                                            <hr>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- //banner -->

@include('footer')
