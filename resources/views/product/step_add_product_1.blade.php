@include('header')
@if (!session()->has('customer_id'))
    <script>
        window.location = '{{ route("customer_login") }}';
    </script>
@endif
<!-- breadcrumb-area start -->
<div class="breadcrumb-area bg-gray">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumb-list">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item active">Select Category</li>
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
                                <h2>Select category..</h2>
                                <br>
                                <hr>
                                <div class="row">
                                    @foreach($categories as $category)
                                        @php
                                            $imgname = file_exists(public_path("category/{$category->category_icon}")) ? "category/{$category->category_icon}" : "img/No-Image-Available.png";
                                        @endphp
                                        <div class="col-md-4 w3l_banner_nav_right_banner3_btml">
                                            <div class="view view-tenth"
                                                 onclick="window.location='{{ route('step_add_product_2', ['category_id' => $category->category_id]) }}'"
                                                 style="cursor: pointer; position: relative; overflow: hidden; border-radius: 8px; height: 500px">

                                                <h4>{{ $category->category_name }}</h4>
                                                <img src="{{ asset($imgname) }}"
                                                     style="height: 280px; width: 100%; object-fit: cover; border-radius: 8px;"
                                                     class="img-responsive"/>
                                                <div class="mask"
                                                     style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.5); color: white; display: flex; flex-direction: column; justify-content: center; align-items: center; opacity: 0; transition: opacity 0.3s;">
                                                </div>
                                                <p>{{ $category->description }}</p>

                                            </div>
                                            <hr>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!-- //banner -->

@include('footer')
