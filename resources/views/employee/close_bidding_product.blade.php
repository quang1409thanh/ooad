@include('header')

<!-- breadcrumb-area start -->
<div class="breadcrumb-area bg-gray">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumb-list">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item active">View Closed Biddings</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb-area end -->
<div class="content-wraper mt-10">
    <div class="container-fluid">
        <div class="checkout-area">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-12 col-xl-12 col-sm-12">
                            <div class="checkbox-form checkout-review-order">
                                <h3>View Closed Biddings</h3>
                                <div class="checkout-left">
                                    <div class="col-md-12">
                                        <table id="datatable" class="table table-striped table-bordered dataTable"
                                               cellspacing="0" width="100%">
                                            <thead>
                                            <tr>
                                                <th>Product Image</th>
                                                <th>Winners List</th>
                                                <th>Product name</th>
                                                <th>Customer</th>
                                                <th>Starting bid</th>
                                                <th>Closed bid</th>
                                                <th>Bidding date</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($productsWithWinner as $productWithWinner)
                                                <tr>
                                                    <td><img
                                                            src="{{ asset('product_images/' . $productWithWinner['product']->first_image_path) }}"
                                                            width='200px;' alt=""></td>
                                                    <td>
                                                        @if ($productWithWinner['winner'] !== null)
                                                            {{ $productWithWinner['winner']->customer->customer_name }}
                                                        @else
                                                            No winner
                                                        @endif
                                                        <br>
                                                    </td>
                                                    <td>
                                                        <a style="color: darkcyan"href="{{route("product.show",$productWithWinner['product']->product_id)}}">{{ $productWithWinner['product']->product_name }}</a>
                                                        <br><font
                                                            color='red'>[Product
                                                            category-{{ $productWithWinner['product']->category->category_name }}
                                                            ]</font>
                                                    </td>
                                                    <td>{{ $productWithWinner['product']->customer->customer_name }}</td>
                                                    <td>$ {{ $productWithWinner['product']->starting_bid }}</td>
                                                    <td>$ {{ $productWithWinner['product']->ending_bid }}</td>
                                                    <td>{{ date("d-M-Y h:i A", strtotime($productWithWinner['product']->start_date_time)) }}
                                                        -<br>{{ date("d-M-Y h:i A", strtotime($productWithWinner['product']->end_date_time)) }}
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function deleteconfirm() {
        if (confirm("Are you sure want to delete this record?") == true) {
            return true;
        } else {
            return false;
        }
    }
</script>

@include('datatable')
@include('footer')
