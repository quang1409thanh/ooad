@include('header')
<style>
    .view-tenth {
        position: relative;
        overflow: hidden;
        border-radius: 8px;
        cursor: pointer;
    }

    .view-tenth img {
        width: 100%;
        height: 280px;
        object-fit: cover;
        border-radius: 8px;
        transition: transform 0.3s;
    }

    .view-tenth .mask {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        color: white;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        opacity: 0;
        transition: opacity 0.3s;
        border-radius: 8px;
    }

    .view-tenth:hover .mask {
        opacity: 1;
    }

    .view-tenth:hover img {
        transform: scale(1.1);
    }

</style>
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
                         onclick="window.location='{{ route('step_add_product_2', ['category_id' => $category->category_id]) }}'"
                         style="cursor: pointer; position: relative; overflow: hidden; border-radius: 8px;">

                        <h4>{{ $category->category_name }}</h4>
                        <p>{{ $category->description }}</p>
                        <img src="{{ asset($imgname) }}"
                             style="height: 280px; width: 100%; object-fit: cover; border-radius: 8px;"
                             class="img-responsive"/>
                        <div class="mask"
                             style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.5); color: white; display: flex; flex-direction: column; justify-content: center; align-items: center; opacity: 0; transition: opacity 0.3s;">
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
