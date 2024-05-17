@include('header')
<style>
    .table img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 8px;
    }

</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
        integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<div class="breadcrumb-area bg-gray">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumb-list">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item active">View Category</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="content-wraper mt-10">
    <div class="container-fluid">
        <div class="checkout-area">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-12 col-xl-12 col-sm-12">
                            <form action="" method="post">
                                <div class="checkbox-form checkout-review-order">
                                    @if (session('success'))
                                        <div class="alert alert-success">
                                            {{ session('success') }}
                                        </div>
                                    @endif

                                    <h3 class="shoping-checkboxt-title">View Category</h3>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <p class="single-form-row">
                                            <table id="datatable" class="table table-striped table-bordered">
                                                <thead>
                                                <tr>
                                                    <th>Icon</th>
                                                    <th>Category Name</th>
                                                    <th>Description</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach ($categories as $category)
                                                    <tr>
                                                        <td>
                                                            @php
                                                                $iconPath = 'img/No-Image-Available.png'; // Default image path
                                                                if ($category->category_icon && file_exists(public_path("imgcategory/{$category->category_icon}"))) {
                                                                    $iconPath = "imgcategory/{$category->category_icon}";
                                                                }
                                                            @endphp
                                                            <img src="{{ asset($iconPath) }}"
                                                                 style="width: 200px; height: 175px; object-fit: cover; border-radius: 8px;">
                                                        </td>
                                                        <td>{{ $category->category_name }}</td>
                                                        <td>{{ $category->description }}</td>
                                                        <td>{{ $category->status }}</td>
                                                        <td>
                                                            <a href='category.php?editid={{ $category->category_id }}'
                                                               class='btn btn-info'>Edit</a>
                                                            <a href='{{ route("delete_category", $category->category_id) }}'
                                                               class='btn btn-danger' onclick="confirmation(event)">Delete</a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('footer')

<script>
    function confirmation(ev) {
        ev.preventDefault();
        var urlToRedirect = ev.currentTarget.getAttribute('href');
        console.log(urlToRedirect);
        swal({
            title: "Are you sure to cancel this category",
            text: "You will not be able to revert this!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((willCancel) => {
                if (willCancel) {
                    window.location.href = urlToRedirect;
                }
            });
    }

    function confirmdelete() {
        if (confirm("Are you sure want to delete this record?") == true) {
            return true;
        } else {
            return false;
        }
    }
</script>
