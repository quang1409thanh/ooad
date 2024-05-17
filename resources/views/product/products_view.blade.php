@include('header')

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


<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<div class="banner">
    <div class="privacy about">
        <h3>View Product</h3>
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
                                    var x = document.getElementsByClassName("mySlides{{ $product->product_id }}");
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
                                <td>{{ $product->customer->customer_name }}</td>
                            @endif
                            <td>{{ $product->category->category_name }}</td>
                            <td>{{ $product->product_name }}<br>
{{--                                <b>Company:</b> {{ $product->company_name }}--}}
                            </td>
                            <td>VND{{ $product->starting_bid }}</td>
                            <td>
                                @if ($product->ending_bid == 0)
                                    No bidding done yet..
                                @else
                                    VND{{ $product->ending_bid }}
                                @endif
                            </td>
                            <td>{{ date("d/m/Y h:i A", strtotime($product->start_date_time)) . " -" .  date("d/m/Y h:i A", strtotime($product->end_date_time)) }}</td>
                            <td>VND{{ $product->product_cost }}</td>
                            <td>{{ $product->status }}</td>
                            <td style="white-space: nowrap;">
                                <div class="row" style="margin-right: -75px; margin-left: -5px;">
                                    <div class="col-6 mb-2" style="padding-right: 5px; padding-left: 5px;">
                                        <a href='{{ url("product/edit/{$product->product_id}") }}'
                                           class='btn btn-warning btn-block'>Reject</a>
                                    </div>
                                    <div class="col-6 mb-2" style="padding-right: 5px; padding-left: 5px;">
                                        @if (!session()->has('customer_id'))
                                            @if (session()->has("employee_id"))
                                                <a href='{{ url("delete-product/{$product->product_id}") }}'
                                                   onclick='return deleteconfirm()' class='btn btn-danger btn-block'>Delete</a>
                                            @endif
                                        @endif
                                    </div>
                                    <div class="col-6 mb-2" style="padding-right: 5px; padding-left: 5px;">
                                        <a href='{{ url("product/{$product->product_id}") }}' target='_blank'
                                           class='btn btn-info btn-block'>View</a>
                                    </div>
                                    <div class="col-6 mb-2" style="padding-right: 5px; padding-left: 5px;">
                                        <form id="accept-product-form-{{ $product->product_id }}" method="POST"
                                              action="{{ url('accept_product/' . $product->product_id) }}"
                                              style="display: none;">
                                            @csrf
                                        </form>

                                        <a href="javascript:void(0);"
                                           onclick="document.getElementById('accept-product-form-{{ $product->product_id }}').submit();"
                                           class='btn btn-success btn-block'>Accept</a>
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
