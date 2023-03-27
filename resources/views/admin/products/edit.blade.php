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
    .img_class {
        width:100px !important;
        height:100px !important;
        position:inherit !important;
        margin-top:3rem;
    }
.imageThumb {
  max-height: 75px;
  border: 2px solid;
  padding: 1px;
  cursor: pointer;
}
.pip {
  display: inline-block;
  margin: 10px 10px 0 0;
}
.remove {
  display: block;
  background: #444;
  border: 1px solid black;
  color: white;
  text-align: center;
  cursor: pointer;
}
.remove:hover {
  background: white;
  color: black;
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
                            <h3 class="page-title">Edit</h3>
                            <div class="d-inline-block align-items-center">
                                <nav>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a>
                                        </li>
                                        <li class="breadcrumb-item" aria-current="page">Product</li>
                                        <li class="breadcrumb-item active" aria-current="page">Edit</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Main content -->
                <section class="content">
                <div class="row">
                        
                    <div class="row">
                        <div class="col-12">
                            <div class="box">
                                <div class="box-header with-border">
                                    <h4 class="box-title">About Product</h4>
                                </div>
                                <div class="box-body">
                                    <form novalidate method="post" action="{{ route('product.update',encrypt($product->id))}}"
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
                                                            <option  {{$category->id == $product->category  ? 'selected' : ''}} value="{{ $category->id }}">{{$category->name}}
                                                            </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="fw-700 fs-16 form-label">Store Name <span
                                                                class="text-danger">*</span></label>
                                                        <select class="form-select" data-placeholder="Choose a Shop"
                                                            name="shop_id" tabindex="1" required
                                                            data-validation-required-message="Store Name field is required">
                                                            <option>Select Store Name</option>
                                                            @foreach($shops as $shop)
                                                            <option {{ $shop->id == $product->shop_id  ? 'selected' : ''}} value="{{ $shop->id }}">{{$shop->name}}
                                                            </option>
                                                            @endforeach
                                                        </select>
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
                                                                                        placeholder="Brand Name" value="{{$product->brand}}"
                                                                                        name="brand" required
                                                                                        data-validation-required-message="Brand Name field is required">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label class="fw-700 fs-16 form-label">Product Name <span
                                                                                    class="text-danger">*</span></label>
                                                                            <div class="controls">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Product Name" value="{{$product->product_name}}" name="product_name" required
                                                                                    data-validation-required-message="Product Name field is required">
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
                                                                                        name="model_number" value="{{$product->model_number}}">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="col-md-12">
                                                                            <div class="form-group">
                                                                                <label
                                                                                    class="fw-700 fs-16 form-label">Serial
                                                                                    Number </label>
                                                                                <div class="controls">
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        placeholder="Serial Number"
                                                                                        name="serial_number"  value="{{$product->serial_number}}">
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
                                                                                    class="fw-700 fs-16 form-label">Purchase
                                                                                    Date </label>
                                                                                <div class="controls">
                                                                                    <input type="date"
                                                                                        class="form-control"
                                                                                        placeholder="Purchase Date"
                                                                                        name="purchase_date"  value="{{$product->purchase_date}}">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                    <div class="col-md-12">
                                                                            <div class="form-group">
                                                                                <label
                                                                                    class="fw-700 fs-16 form-label">Warranty
                                                                                </label>
                                                                                <div class="controls">
                                                                                    <select class="form-control" name="warranty" id="warranty">
                                                                                        <option value="">Select Warranty</option>
                                                                                        <option  {{ $product->warranty == '3 Months'  ? 'selected' : ''}} value="3 Months">3 Months</option>
                                                                                        <option  {{ $product->warranty == '6 Months'  ? 'selected' : ''}} value="6 Months">6 Months</option>
                                                                                        <option  {{ $product->warranty == '1 Year'  ? 'selected' : ''}} value="1 Year">1 Year</option>
                                                                                        <option  {{ $product->warranty == '2 Year'  ? 'selected' : ''}} value="2 Year">2 Year</option>
                                                                                        <option  {{ $product->warranty == '3 Year'  ? 'selected' : ''}} value="3 Year">3 Year</option>
                                                                                        <option  {{ $product->warranty == '4 Year'  ? 'selected' : ''}} value="4 Year">4 Year</option>
                                                                                        <option  {{ $product->warranty == '5 Year'  ? 'selected' : ''}} value="5 Year">5 Year</option>
                                                                                        <option  {{ $product->warranty == '6 Year'  ? 'selected' : ''}} value="6 Year">6 Year</option>
                                                                                        <option  {{ $product->warranty == '7 Year'  ? 'selected' : ''}} value="7 Year">7 Year</option>
                                                                                        <option  {{ $product->warranty == '8 Year'  ? 'selected' : ''}} value="8 Year">8 Year</option>
                                                                                        <option  {{ $product->warranty == '9 Year'  ? 'selected' : ''}} value="9 Year">9 Year</option>
                                                                                        <option  {{ $product->warranty == '10 Year'  ? 'selected' : ''}} value="10 Year">10 Year</option>
                                                                                    </select>
                                                                                    
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        
                                                                    </td>

                                                                </tr>
                                                                <tr>
                                                                    <td colspan="2">
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
                                                                                        data-validation-required-message="Product Description is required"> {{$product->warranty}}</textarea>
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
                                                <div class="col-md-12">
                                                    <div class="field" align="left">
                                                        <h3>Upload your images</h3>
                                                        <input type="file" id="files" name="images[]" multiple />
                                                    </div>
                                                </div>
                                                <div class="mt-5">

                                                @foreach($product_images as $image) 
                                                    <img class="img_class" src="{{ asset('images/products/'.$image->images)}}" alt="">
                                                   <a href="{{url('admin/products/product_img_delete/')}}/{{$image->id}}"> <i class="fa fa-close rounded px-2 text-light" style="background:red;margin-top:-4px;"></i></a>

                                                @endforeach
                                                </div>
                                                
                                            </div>
                                            <div class="row">
                                               
                                            </div>

                                             
                                            <!-- <div class="row">
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

                                            </div> -->
                                       

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
                                            <button type="button" class="btn btn-warning">Cancel</button>

                                            <button type="submit" class="btn btn-primary"> <i class="fa fa-check"></i>
                                                Save</button>
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
    $(document).ready(function() {
        // if (window.File && window.FileList && window.FileReader) {
        //     $("#files").on("change", function(e) {
        //         var files = e.target.files,
        //             filesLength = files.length;
        //         for (var i = 0; i < filesLength; i++) {
        //             var f = files[i]
        //             var fileReader = new FileReader();
        //             fileReader.onload = (function(e) {
        //                 var file = e.target;
        //                 $("<span class=\"pip\">" +
        //                     "<img class=\"imageThumb\" src=\"" + e.target.result +
        //                     "\" title=\"" + file.name + "\"/>" +
        //                     "<br/><span class=\"remove\">Remove image</span>" +
        //                     "</span>").insertAfter("#files");
        //                 $(".remove").click(function() {
        //                     $(this).parent(".pip").remove();
        //                 });

        //                 // Old code here
        //                 /*$("<img></img>", {
        //                   class: "imageThumb",
        //                   src: e.target.result,
        //                   title: file.name + " | Click to remove"
        //                 }).insertAfter("#files").click(function(){$(this).remove();});*/

        //             });
        //             fileReader.readAsDataURL(f);
        //         }
        //         console.log(files);
        //     });
        // } else {
        //     alert("Your browser doesn't support to File API")
        // }
    });

    $('input:text').bind('input:text', function() {
        var c = this.selectionStart,
            r = /[^a-z0-9 .]/gi,
            v = $(this).val();
        if(r.test(v)) {
            $(this).val(v.replace(r, ''));
            c--;
        }
        this.setSelectionRange(c, c);
        });
    </script>

</body>

</html>