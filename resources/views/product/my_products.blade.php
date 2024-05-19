@include('header')
<style>
    .w3-content {
        position: relative;
        overflow: hidden;
        border-radius: 8px; /* Optional, to match the img border-radius */
    }

    .w3-content img {
        display: block;
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 8px; /* To match the container's border-radius */
    }

    .w3-content span {
        display: block;
        padding: 20px;
        font-size: 16px;
        color: #333;
        background-color: rgba(234, 68, 68, 0.49);
        border: 1px solid #ddd;
        border-radius: 8px;
    }

</style>
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

<!-- breadcrumb-area start -->
<div class="breadcrumb-area bg-gray">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumb-list">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item active">My Product</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb-area end -->
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<div class="banner">
    <div class="privacy about">
        <h2 style="text-align: center; font-weight: bold">View Product</h2>
        <br>
        <hr>
        <div class="checkout-left">
            <div class="col-md-12">
                <table id="datatable" class="table table-striped table-bordered dataTable" cellspacing="0" width="100%"
                       role="grid" aria-describedby="example_info" style="width: 100%;">
                    <thead>
                    <tr>
                        <th>Product Image</th>
                        @if (session()->has('employee_id'))
                            <th>Customer</th>
                        @endif
                        <th>Category</th>
                        <th style="width:175px;">Product name</th>
                        <th>Starting bid</th>
                        <th>Current bid</th>
                        <th>Scheduled on</th>
                        <th>Product cost</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>
                                <div class="w3-content w3-section" style="max-width: 500px; text-align: center;">
                                    @if ($product->first_image_path)
                                        <img src="{{ asset('product_images/' . $product->first_image_path) }}"
                                             style="width: 200px; height: 120px; object-fit: cover; border-radius: 8px;">
                                    @else
                                        <span>No images available</span>
                                    @endif
                                </div>
                            </td>

                            <script>
                                var myIndex = 0;
                                carousel();

                                function carousel() {
                                    var i;
                                    var x = document.getElementsByClassName("mySlides{{ $product->id }}");
                                    for (i = 0; i < x.length; i++) {
                                        x[i].style.display = "none";
                                    }
                                    myIndex++;
                                    if (myIndex > x.length) {
                                        myIndex = 1
                                    }
                                    x[myIndex - 1].style.display = "block";
                                    setTimeout(carousel, 9000);
                                }
                            </script>
                            @if (session()->has('employee_id'))
                                <td>{{ $product->customer_name }}</td>
                            @endif
                            <td>{{ $product->category->category_name }}</td>
                            <td>{{ $product->product_name }}<br>
                                {{--                                <b>Company:</b> {{ $product->company_name }}--}}
                            </td>
                            <td>$ {{ $product->starting_bid }}</td>
                            <td>
                                @if ($product->ending_bid == 0)
                                    No bidding done yet..
                                @else
                                    $ {{ $product->ending_bid }}
                                @endif
                            </td>
                            <td>{{ date("d/m/Y h:i A", strtotime($product->start_date_time)) . " -" .  date("d/m/Y h:i A", strtotime($product->end_date_time)) }}</td>
                            <td>$ {{ $product->product_cost }}</td>
                            <td>{{ $product->status }}</td>
                            <td style="white-space: nowrap;">
                                <div class="row" style="margin-right: -75px; margin-left: -5px;">
                                    <div class="col-6 mb-2" style="padding-right: 5px; padding-left: 5px;">
                                        <a href='{{ url("product/edit/{$product->id}") }}'
                                           class='btn btn-warning btn-block'>Edit</a>
                                    </div>
                                    <div class="col-6 mb-2" style="padding-right: 5px; padding-left: 5px;">
                                        @if (!session()->has('customer_id'))
                                            @if (session()->has("employee_id"))
                                                <a href='{{ url("delete-product/{$product->id}") }}'
                                                   onclick='return deleteconfirm()' class='btn btn-danger btn-block'>Delete</a>
                                            @endif
                                        @endif
                                    </div>
                                    <div class="col-6 mb-2" style="padding-right: 5px; padding-left: 5px;">
                                        <a href='{{ url("product/{$product->product_id}") }}' target='_blank'
                                           class='btn btn-info btn-block'>View</a>
                                    </div>
                                    <div class="col-6 mb-2" style="padding-right: 5px; padding-left: 5px;">
                                        <a href='{{ url("billingreceipt/{$product->id}") }}' target='_blank'
                                           class='btn btn-success btn-block'>Receipt</a>
                                    </div>
                                </div>
                            </td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <br>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="clearfix"></div>
</div>
<!-- //banner -->
<script>
    function deleteconfirm() {
        return confirm("Are you sure want to delete this record?") === true;
    }
</script>

@include('datatable')
@include('footer')
