@include('header')

<!-- breadcrumb-area start -->
<div class="breadcrumb-area bg-gray">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumb-list">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item active">View Winner</li>
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
                                <h3>View Winner</h3>

                                <div class="checkout-left">

                                    <div class="col-md-12 ">
                                        <table id="datatable" class="table table-striped table-bordered dataTable"
                                               cellspacing="0"
                                               width="100%" role="grid" aria-describedby="example_info"
                                               style="width: 100%;">
                                            <thead>
                                            <tr>
                                                <th width="200px">Winners image</th>

                                                <th>Customer</th>
                                                <th style="300px;">Product</th>
                                                <th>Winning bid</th>
                                                <th>End date</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($winners as $winner)
                                                <tr>
                                                    <td><img src='imgwinner/{{ $winner->winners_image }}' style="width: 200px"></td>
                                                    <td>{{ $winner->customer->customer_name }}</td>
                                                    <td><a style="color: darkcyan" href="{{route("product.show",$winner->product_id)}}">{{ $winner->product->product_name }}</a></td>
                                                    <td>{{ $winner->winning_bid }}</td>
                                                    <td>{{ $winner->end_date }}</td>
                                                </tr>
                                            @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <!-- //about -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- //banner -->
<script>
    function deleteconfirm() {
        return confirm("Are you sure want to delete this record?") === true;
    }
</script>

@include('datatable')
@include('footer')
