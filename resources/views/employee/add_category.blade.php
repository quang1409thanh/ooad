@include('header')


<div class="breadcrumb-area bg-gray">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumb-list">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item active">Category</li>
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
                        <div class="col-lg-12 offset-xl-2 col-xl-8 col-sm-12">
                            <form action="{{ route('store_category') }}" method="post" enctype="multipart/form-data"
                                  onsubmit="return validateform()">
                                @csrf
                                <div class="checkbox-form checkout-review-order">
                                    @if (session('success'))
                                        <div class="alert alert-success">
                                            {{ session('success') }}
                                        </div>
                                    @endif
                                        <h3 class="shoping-checkboxt-title">Category</h3>


                                    <div class="row">
                                        <div class="col-lg-12">
                                            <p class="single-form-row">
                                                <label>Category Name</label><span class="required">*</span><span
                                                    class="errormsg" id="errcategory_name"></span></label>
                                                <input type="text" name="category_name" id="category_name"
                                                       class="form-control"">
                                            </p>
                                        </div>

                                        <div class="col-lg-12">
                                            <p class="single-form-row">
                                                <label>Category Icon</label><span class="required">*</span> <span
                                                    class="errormsg" id="errcategory_icon"></span></label>
                                                <input type="file" name="category_icon" id="category_icon"
                                                       class="form-control" accept="image/*">
                                                @if (isset($category))
                                                    @if (!empty($category->category_icon))
                                                        <img
                                                            src="{{ asset('imgcategory/' . $category->category_icon) }}"
                                                            style="width: 200px;height:250px;">
                                                    @else
                                                        <img src="{{ asset('img/No-Image-Available.png') }}"
                                                             style="width: 200px;height:250px;">
                                                    @endif
                                                @endif
                                            </p>
                                        </div>

                                        <div class="col-lg-12">
                                            <p class="single-form-row">
                                                <label>Description</label><span class="errormsg"
                                                                                id="errdescription"></span></label>
                                                <textarea name="description" id="description"
                                                          class="form-control"></textarea>
                                            </p>
                                        </div>
                                        <div class="col-lg-12">
                                            <p class="single-form-row">
                                                <label>Status<span class="required">*</span> <span class="errormsg"
                                                                                                   id="errstatus"></span></label>
                                                <select name="status" id="status" class="form-control">
                                                    <option value=''>Select Status</option>
                                                    @php
                                                        $statuses = ['Active', 'Inactive'];
                                                    @endphp
                                                    @foreach ($statuses as $status)
                                                        <option
                                                            value='{{ $status }}' {{ old('status', isset($category) ? $category->status : '') == $status ? 'selected' : '' }}>
                                                            {{ $status }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </p>
                                        </div>

                                        <div class="col-lg-12">
                                            <p class="single-form-row">
                                            <hr>
                                            <center><input type="submit" name="submit" id="submit" class="form-control"
                                                           style="width: 200px;"></center>
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
    function validateform() {
        /* #######start 1######### */
        var alphaExp = /^[a-zA-Z]+$/; //Variable to validate only alphabets
        var alphaspaceExp = /^[a-zA-Z\s]+$/; //Variable to validate only alphabets with space
        $("span").html("");
        var i = 0;
        /* ########end 1######## */

        // if (!document.getElementById("category_name").value.match(alphaspaceExp)) {
        //     document.getElementById("errcategory_name").innerHTML = "Category name should contain only alphabets....";
        //     i = 1;
        // }
        if (document.getElementById("category_name").value == "") {
            document.getElementById("errcategory_name").innerHTML = "Category name should not be empty....";
            i = 1;
        }

        var image = document.getElementById("category_icon").value;
        var checkimg = image.toLowerCase();
        if (!checkimg.match(/(\.jpg|\.png|\.JPG|\.PNG|\.gif|\.GIF|\.jpeg|\.JPEG)$/)) {
            document.getElementById("errcategory_icon").innerHTML = "Please enter Image File Extensions .jpg,.png,.jpeg,.gif..";
            i = 1;
        }
        if (document.getElementById("category_icon").value == "") {
            document.getElementById("errcategory_icon").innerHTML = "Category icon should not be empty....";
            i = 1;
        }
        if (document.getElementById("status").value == "") {
            document.getElementById("errstatus").innerHTML = "Kindly select category status....";
            i = 1;
        }

        /* #######start 2######### */
        if (i == 0) {
            return true;
        } else {
            return false;
        }
        /* #######end 2######### */
    }
</script>
