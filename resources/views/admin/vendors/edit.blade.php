<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../images/favicon.ico">

    <title>Edit Vendor </title>

    <!-- Vendors Style-->
    <link rel="stylesheet" href="{{ asset('css/vendors_css.css') }}">

    <!-- Style-->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/skin_color.css') }}">

</head>

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
                            <h3 class="page-title">Edit Vendor</h3>
                            <div class="d-inline-block align-items-center">
                                <nav>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a>
                                        </li>
                                        <li class="breadcrumb-item" aria-current="page">Forms</li>
                                        <li class="breadcrumb-item active" aria-current="page">Edit Vendor</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>

                    </div>
                </div>

                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-lg-12 col-12">
                            <div class="box">
                                <div class="box-header with-border">
                                    <h4 class="box-title">About Vendor</h4>
                                </div>
                                <!-- /.box-header -->
                                <form class="form" novalidate method="post" action="{{ route('vendor.update',encrypt($vendor->id))}}">
                                    @csrf
                                    <div class="box-body">
                                        <h4 class="box-title text-info mb-0"><i class="ti-user me-15"></i> Personal Info
                                        </h4>
                                        <hr class="my-15">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">First Name</label> <span
                                                        class="text-danger">*</span>
                                                    <div class="controls">
                                                        <input type="text" value="{{ $vendor->first_name }}" name="first_name" placeholder="First Name"
                                                            class="form-control" required
                                                            data-validation-required-message="First Name field is required">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Last Name</label> <span
                                                        class="text-danger">*</span>
                                                    <div class="controls">
                                                        <input type="text"  value="{{ $vendor->last_name }}"  name="last_name" class="form-control"
                                                            required
                                                            data-validation-required-message="Last Name field is required">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">E-mail</label><span
                                                        class="text-danger">*</span>
                                                    <div class="controls">
                                                        <input type="email"  value="{{ $vendor->email }}"  name="email" class="form-control" required
                                                            data-validation-required-message="Email field is required">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Contact Number</label>
                                                    <input type="text"  value="{{ $vendor->phone }}"  name="phone" class="form-control"
                                                        placeholder="Phone">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Password</label><span
                                                    class="text-danger">*</span>
                                                <div class="input-group mb-3 controls">
                                                    <span class="input-group-text"><i class="ti-lock"></i></span>
                                                    <input type="password" class="form-control" name="password"
                                                        placeholder="Password">
                                                </div>
                                            </div>
                                        </div>

                                        <!-- <h4 class="box-title text-info mb-0 mt-20"><i class="ti-save me-15"></i>
                                            Assign Manager</h4>
                                        <hr class="my-15">

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="fw-700 fs-16 form-label">Manager</label><span
                                                        class="text-danger">*</span>
                                                    <select class="form-select" 
                                                        data-placeholder="Choose a Manager" name="district_name"
                                                        tabindex="1" required
                                                        data-validation-required-message="Manager field is required">
                                                        <option value="">Select Managers</option>

                                                        @foreach($managers as $manager)
                                                        <option value="{{ $manager->id }}">{{$manager->first_name.' '}}{{$manager->last_name}}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            
                                        </div> -->

                                        <h4 class="box-title text-info mb-0 mt-20"><i class="ti-save me-15"></i>
                                            Requirements</h4>
                                        <hr class="my-15">
                                        <!-- <div class="form-group">
                                            <label class="form-label">Shop</label>
                                            <input type="text" class="form-control" name="company"
                                                placeholder="Shop Name">
                                        </div> -->

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                <div class="controls">

                                                    <label class="form-label">Company Name</label><span
                                                        class="text-danger">*</span>
                                                    <input type="text"   value="{{ $vendor->company }}"  name="company" value=""  required
                                                            data-validation-required-message="Company Name field is required" class="form-control"
                                                        placeholder="Company Name">
                                                </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label class="form-label">Address</label><span
                                                            class="text-danger">*</span>
                                                        <input type="text"   value="{{ $vendor->address }}"  name="address" required
                                                            data-validation-required-message="Address field is required"
                                                            value="" class="form-control" placeholder="Address">
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label">Province</label><span
                                                        class="text-danger">*</span>
                                                    <select class="form-select" name="province" id="province" required
                                                        data-validation-required-message="Province field is required"
                                                        onClick="getCitys()">
                                                        <option value="">Select Your Province</option>
                                                        @foreach($proviences as $province)
                                                        <option  {{ $vendor->country == $province->province  ? 'selected' : ''}} value="{{$province->province}}">{{$province->province}}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label">City</label><span
                                                        class="text-danger">*</span>
                                                    <select class="form-select" id="cities" name="city" required
                                                        data-validation-required-message="City field is required">
                                                        <option value="">Select Your City</option>
                                                        @foreach($cities as $city)
                                                        <option value="{{$city->id}}"  {{ $vendor->city == $city->id  ? 'selected' : ''}}>{{$city->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label">Postal Code</label>
                                                    <input type="text"    value="{{ $vendor->postal_code }}"  name="postal_code" class="form-control"
                                                        placeholder="Postal Code">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Category</label><span
                                                        class="text-danger">*</span>
                                                    <select class="form-select" name="category" required
                                                        data-validation-required-message="Category field is required">
                                                        <option value="">Select Your Category</option>
                                                        @foreach($categories as $category)
                                                        <option  {{ $vendor->category == $category->id  ? 'selected' : ''}} value="{{$category->id}}">{{$category->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">GST Number</label><span
                                                        class="text-danger">*</span>
                                                    <input type="text"   value="{{ $vendor->gst_number }}"  name="gst_number" value="" class="form-control"
                                                        placeholder="GST Number">
                                                </div>
                                            </div>

                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="controls">
                                                <label class="form-label">Service Area</label><span
                                                    class="text-danger">*</span>
                                                <select class="form-select  select2" multiple="multiple"
                                                    name="service_area[]" required
                                                    data-validation-required-message="Service Area field is required">
                                                    <option value="">Select Service Area</option>
                                                    @foreach($cities as $city)
                                                    <option @foreach(explode(',',$vendor->service_area) as $area)  {{ $area == $city->id  ? 'selected' : ''}} @endforeach value="{{ $city->id}}">{{$city->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            </div>

                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">About Vendor</label>
                                            <textarea rows="5" class="form-control" name="desc"
                                                placeholder="About Vendor">  {{ $vendor->desc }} </textarea>
                                        </div>
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
                                                                    value="publish"  {{$vendor->is_active == "publish"  ? 'checked' : ''}}>
                                                                <label for="radio1">Published</label>
                                                            </div>
                                                        </label>
                                                        <label class="radio-inline">
                                                            <div class="radio radio-info">
                                                                <input type="radio" name="status" id="radio2"
                                                                    value="draft"  {{$vendor->is_active == "draft"  ? 'checked' : ''}}>
                                                                <label for="radio2">Draft</label>
                                                            </div>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                    <!-- /.box-body -->
                                    <div class="box-footer">
                                        <button type="button" class="btn btn-warning me-1">
                                            <i class="ti-trash"></i> Cancel
                                        </button>
                                        <button type="submit" class="btn btn-primary">
                                            <i class="ti-save-alt"></i> Save
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <!-- /.box -->
                        </div>


                    </div>

                    <!--/.col (left) -->
                    <!-- right column -->

                    <!--/.col (right) -->
            </div>
            <!-- /.row -->

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
    <!-- Control Sidebar -->


    <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
    </div>
    <!-- ./wrapper -->


    <!-- Page Content overlay -->


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
</body>
<script>
function getCitys() {
    $("#cities option").remove();

    var province = $('#province').val();

    console.log(province)
    var url = 'http://209.97.156.170/WeFix/admin/get_cities?province=' + province;
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
    });
    $.ajax({
            method: "GET",
            url: url,
        })
        .done(function(data) {
            var obj = JSON.parse(data);
            var option = '';
            for (i = 0; i < obj.length; i++) {

                option += '<option value="' + obj[i].id + '" >' + obj[i].name + '</option>';

            }

            console.log(option)
            $('#cities').append(option);

        });

}
</script>

</html>