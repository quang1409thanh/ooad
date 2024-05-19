<div class="banner">

    <div class="w3l_banner_nav_right" style="float: right;width: 100%;">
        <div class="w3ls_w3l_banner_nav_right_grid">
            <div class="container">
                <h3 class="h3">Pay for Winning Bid</h3>
                <div class="row">
                    <div class="col-md-6 col-sm-6 ">
                        <div class="product-grid8 border">
                            <div class="product-image8">
                                <a href="{{ route('product.show', $winner->product_id) }}">
                                    <img class="pic-1"
                                         src="{{ asset('product_images/' . $winner->product->first_image_path) }}"
                                         alt="">
                                </a>
                                <span class="product-discount-label"><b>{{ $winner->product_name }}</b></span>
                            </div>
                            <div class="product-content">
                                    <span class="product-shipping"
                                          style="color: brown;"><b>Product : {{ $winner->product_name }}</b></span>
                                <span class="product-shipping"
                                      style="color: brown;"><b>Product Code : {{ $winner->product_name }}</b></span>
                                <span class="product-shipping"
                                      style="color: brown;"><b>Company Name: {{ $winner->compname }}</b></span>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
    <hr>
</div>
