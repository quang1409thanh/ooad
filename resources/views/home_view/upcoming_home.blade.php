<div class="product-area pb-95">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="row">
                    <div class="col">
                        <div class="section-title-3">
                            <h2>Upcoming Auctions</h2>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="tab-content">
                            <div id="for-men" class="tab-pane active show" role="tabpanel">
                                <div class="row">
                                    <div class="product-active-3 owl-carousel">

                                        @foreach($upcoming_products as $product)
                                            <div class="col">
                                                <!-- single-product-wrap start -->
                                                <div class="single-product-wrap">
                                                    <div class="product-image box" style="height:350px;width:100%;">
                                                        <a href="{{ route('product.show', $product->product_id) }}">
                                                            <img class="primary-image"
                                                                 src="{{ asset('product_images/' . $product->first_image_path) }}"
                                                                 alt="{{ $product->product_name }}"
                                                                 style="width: 100%; height: 100%; object-fit: cover; border-radius: 8px;">
                                                        </a>
                                                        <div
                                                            class="label-product">{{$product->category->category_name }}</div>
                                                    </div>
                                                    <div class="product_desc">
                                                        <div class="product_desc_info">
                                                            <h4><a class="product_name"
                                                                   href="#">{{ $product->product_name }}</a>
                                                            </h4>
                                                            <div class="manufacturer">
                                                                <a href="#">Starting
                                                                    Bid: {{ $product->start_date_time }}</a>
                                                            </div>
                                                            <p id="countdowntimer_upcoming{{ $product->product_id }}"></p>
                                                            <script type="application/javascript">
                                                                countdowntimer_upcoming('{{ $product->product_id }}', '{{ date("M d, Y H:i:s", strtotime($product->end_date_time)) }}');
                                                            </script>
                                                            <div class="price-box">
                                                                <span
                                                                    class="new-price">Current Bid Amount : $ {{ $product->ending_bid > $product->starting_bid ? $product->ending_bid : $product->starting_bid }}</span>
                                                            </div>
                                                        </div>
                                                        <div class="add-actions">
                                                            <ul class="add-actions-link">
                                                                <li class="add-cart"><a
                                                                        href="{{ route('product.show', $product->product_id) }}">><i
                                                                            class="ion-android-cart"></i> Click here
                                                                        to
                                                                        BID</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- single-product-wrap end -->
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
</div>
