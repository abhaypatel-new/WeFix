<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../images/favicon.ico">

    <title>Create Product </title>

    <!-- Vendors Style-->
    <link rel="stylesheet" href="{{ asset('css/vendors_css.css') }}">

    <!-- Style-->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/skin_color.css') }}">

</head>
<style>
.imgAdd {
    width: 30px;
    height: 30px;
    border-radius: 50%;
    background-color: #4bd7ef;
    color: #fff;
    box-shadow: 0px 0px 2px 1px rgba(0, 0, 0, 0.2);
    text-align: center;
    line-height: 30px;
    margin-top: 0px;
    cursor: pointer;
    font-size: 15px;
}

.imagePreview {
    width: 100%;
    height: 180px;
    background-position: center center;
    background: url(http://cliquecities.com/assets/no-image-e3699ae23f866f6cbdf8ba2443ee5c4e.jpg);
    background-color: #fff;
    background-size: cover;
    background-repeat: no-repeat;
    display: inline-block;
    box-shadow: 0px -3px 6px 2px rgba(0, 0, 0, 0.2);
}

.uploadButton {

    display: block;
    border-radius: 0px;
    box-shadow: 0px 4px 6px 2px rgba(0, 0, 0, 0.2);
    margin-top: -5px;
}

.del {
    height: 20px;
    border-radius: 50%;
    background-color: red;
    color: #fff;
    text-align: center;
    margin-top: 0px;
    cursor: pointer;
    padding: 5px;
}
</style>

<body class="hold-transition light-skin sidebar-mini theme-primary fixed">

    <div class="wrapper">
        <div id="loader"></div>

        @include('layouts.header.admin')
        @include('layouts.sidebar.admin')


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <div class="container-full">
                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="d-flex align-items-center">
                        <div class="me-auto">
                            <h3 class="page-title">Add</h3>
                            <div class="d-inline-block align-items-center">
                                <nav>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a>
                                        </li>
                                        <li class="breadcrumb-item" aria-current="page">Product</li>
                                        <li class="breadcrumb-item active" aria-current="page">Add</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Main content -->
                <section class="content">

                    <div class="row">
                        <div class="col-12">
                            <div class="box">
                                <div class="box-header with-border">
                                    <h4 class="box-title">About Product</h4>
                                </div>
                                <div class="box-body">
                                    <form novalidate method="post" action="{{ route('product.create')}}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="fw-700 fs-16 form-label">Category <span
                                                                class="text-danger">*</span></label>
                                                        <select class="form-select" data-placeholder="Choose a Category"
                                                            name="category" tabindex="1" required
                                                            data-validation-required-message="Category field is required">
                                                            <option>Select Category</option>
                                                            @foreach($categories as $category)
                                                            <option value="{{ $category->id }}">{{$category->name}}
                                                            </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="fw-700 fs-16 form-label">Product Name <span
                                                                class="text-danger">*</span></label>
                                                        <div class="controls">
                                                            <input type="text" class="form-control"
                                                                placeholder="Product Name" name="product_name" required
                                                                data-validation-required-message="Product Name field is required">
                                                        </div>
                                                    </div>
                                                </div>

                                                <!--/span-->

                                            </div>
                                            <!--/row-->
                                            <!--/row-->

                                            <!--/row-->
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <h4 class="box-title mt-40">General Info</h4>
                                                    <div class="table-responsive">
                                                        <table class="table no-border td-padding">
                                                            <tbody>
                                                                <tr>
                                                                    <td>
                                                                        <div class="col-md-12">
                                                                            <div class="form-group">
                                                                                <label
                                                                                    class="fw-700 fs-16 form-label">Brand
                                                                                    <span
                                                                                        class="text-danger">*</span></label>
                                                                                <div class="controls">
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        placeholder="Brand Name"
                                                                                        name="brand" required
                                                                                        data-validation-required-message="Brand Name field is required">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </td>

                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <div class="col-md-12">
                                                                            <div class="form-group">
                                                                                <label
                                                                                    class="fw-700 fs-16 form-label">Model
                                                                                    Number </label>
                                                                                <div class="controls">
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        placeholder="Model Number"
                                                                                        name="model_number">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </td>

                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <div class="col-md-12">
                                                                            <div class="form-group">
                                                                                <label
                                                                                    class="fw-700 fs-16 form-label">Product
                                                                                    Description <span
                                                                                        class="text-danger">*</span></label>
                                                                                <div class="controls">
                                                                                    <textarea class="form-control p-15"
                                                                                        rows="4"
                                                                                        name="product_description"
                                                                                        placeholder="Product description goes here..."
                                                                                        required
                                                                                        data-validation-required-message="Product Description is required"></textarea>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                    </td>
                                                                </tr>

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="row">
                                                <div class="col-md-2 imgUp">
                                                    <label class="fw-700 fs-16 form-label">Product Images <span
                                                            class="text-danger">*</span></label>


                                                    <div class="form-control-feedback"><small>Thumbnail Image.</small>
                                                    </div>
                                                    <div class="imagePreview"></div>
                                                    <label class="btn btn-primary uploadButton">
                                                        <div class="controls">
                                                            Upload<input type="file" class="uploadFile img"
                                                                name="images[]" value="Upload Photo"
                                                                style="width: 0px;height: 0px;overflow: hidden;"
                                                                required>
                                                        </div>
                                                    </label>
                                                </div>
                                                <i class="fa fa-plus imgAdd"></i>

                                            </div>

                                            <div class="row mt-3">

                                                <!--/span-->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="fw-700 fs-16 form-label">Status</label>
                                                        <div class="radio-list">
                                                            <label class="radio-inline p-0 me-10">
                                                                <div class="radio radio-info">
                                                                    <input type="radio" name="status" id="radio1"
                                                                        value="publish" checked>
                                                                    <label for="radio1">Published</label>
                                                                </div>
                                                            </label>
                                                            <label class="radio-inline">
                                                                <div class="radio radio-info">
                                                                    <input type="radio" name="status" id="radio2"
                                                                        value="draft">
                                                                    <label for="radio2">Draft</label>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                            </div>
                                        </div>
                                        <div class="form-actions mt-10">
                                            <button type="submit" class="btn btn-primary"> <i class="fa fa-check"></i>
                                                Save</button>
                                            <button type="button" class="btn btn-danger">Cancel</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </section>
                <!-- /.content -->
            </div>
        </div>
        <!-- /.content-wrapper -->

        <footer class="main-footer">
            <div class="pull-right d-none d-sm-inline-block">
                <ul class="nav nav-primary nav-dotted nav-dot-separated justify-content-center justify-content-md-end">
                    <li class="nav-item">
                        <a class="nav-link" href="javascript:void(0)">FAQ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Purchase Now</a>
                    </li>
                </ul>
            </div>
            &copy; 2021 <a href="https://www.multipurposethemes.com/">Multipurpose Themes</a>. All Rights Reserved.
        </footer>

    </div>
    <!-- ./wrapper -->

    <!-- Vendor JS -->
    <script src="{{ asset('js/vendors.min.js') }}"></script>
    <script src="{{ asset('js/pages/chat-popup.js') }}"></script>
    <script src="{{ asset('assets/icons/feather-icons/feather.min.js') }}"></script>

    <!-- EduAdmin App -->
    <script src="{{ asset('js/template.js') }}"></script>

    <script src="{{ asset('js/pages/validation.js') }}"></script>
    <script src="{{ asset('js/pages/form-validation.js') }}"></script>

    <script src="{{ asset('js/pages/advanced-form-element.js') }}"></script>
    <script src="{{ asset('assets/vendor_components/select2/dist/js/select2.full.js') }}"></script>

    <script>
    $(".imgAdd").click(function() {
        $(this).closest(".row").find('.imgAdd').before(
            '<div class="col-sm-2 imgUp"><div class="imagePreview"></div><label class="btn btn-primary uploadButton">Upload<input type="file" class="uploadFile img" name="images[]" value="Upload Photo" style="width:0px;height:0px;top:5px;overflow:hidden;"></label><i class="fa fa-times del"></i></div>'
            );
    });
    $(document).on("click", "i.del", function() {
        $(this).parent().remove();
    });
    $(function() {
        $(document).on("change", ".uploadFile", function() {
            var uploadFile = $(this);
            var files = !!this.files ? this.files : [];
            if (!files.length || !window.FileReader)
        return; // no file selected, or no FileReader support

            if (/^image/.test(files[0].type)) { // only image file
                var reader = new FileReader(); // instance of the FileReader
                reader.readAsDataURL(files[0]); // read the local file

                reader.onloadend = function() { // set image data as background of div
                    //alert(uploadFile.closest(".upimage").find('.imagePreview').length);
                    uploadFile.closest(".imgUp").find('.imagePreview').css("background-image",
                        "url(" + this.result + ")");
                }
            }

        });
    });
    </script>

</body>

</html>