@include('header')

@if (isset($delid))
    @php
        //        $sql = "DELETE FROM category WHERE category_id='$delid'";
        //        $qsql = mysqli_query($con, $sql);
        //        if (mysqli_affected_rows($con) == 1) {
        //            echo "<script>alert('Category record deleted successfully...');</script>";
        //            echo "<script>window.location='viewcategory.php';</script>";
        //        }
    @endphp
@endif

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
                                                            @if ($category->category_icon == "")
                                                                <img src='img/No-Image-Available.png'
                                                                     style='width: 200px;height:175px;'>
                                                            @elseif (file_exists(public_path("imgcategory/{$category->category_icon}")))
                                                                <img src='imgcategory/{{ $category->category_icon }}'
                                                                     style='width: 200px;height:175px;'>
                                                            @else
                                                                <img src='img/No-Image-Available.png'
                                                                     style='width: 200px;height:175px;'>
                                                            @endif
                                                        </td>
                                                        <td>{{ $category->category_name }}</td>
                                                        <td>{{ $category->description }}</td>
                                                        <td>{{ $category->status }}</td>
                                                        <td>
                                                            <a href='category.php?editid={{ $category->category_id }}'
                                                               class='btn btn-info'>Edit</a>
                                                            <a href='{{ route("delete_category", $category->category_id) }}' class='btn btn-danger' onclick='return confirmdelete()'>Delete</a>
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
    function confirmdelete() {
        if (confirm("Are you sure want to delete this record?") == true) {
            return true;
        } else {
            return false;
        }
    }
</script>
