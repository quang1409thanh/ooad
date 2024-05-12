@include('header')

@if (!session()->has('customer_id'))
    <script>
        window.location = '{{ route("customer_login") }}';
    </script>
@endif

<!-- banner -->
<div class="banner">
    <div class="w3l_banner_nav_right">
        <h2>Select category..</h2>

        <div class="row">
            @foreach($categories as $category)
                @php
                    $imgname = file_exists(public_path("imgcategory/{$category->category_icon}")) ? "imgcategory/{$category->category_icon}" : "img/No-Image-Available.png";
                @endphp
                <div class="col-md-4 w3l_banner_nav_right_banner3_btml">
                    <div class="view view-tenth"
                         onclick="window.location='{{ route("step_add_product_2", ["categoryid" => $category->category_id]) }}'"
                         style="cursor:pointer;">
                        <img src="{{ asset($imgname) }}" style="height:280px;width: 100%;" class="img-responsive"/>
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
    <div class="clearfix"></div>
</div>
<!-- //banner -->

@include('footer')
