<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../images/favicon.ico">

    <title>Edit Store </title>

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
                            <h3 class="page-title">Edit Store</h3>
                            <div class="d-inline-block align-items-center">
                                <nav>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a>
                                        </li>
                                        <li class="breadcrumb-item" aria-current="page">Store</li>
                                        <li class="breadcrumb-item active" aria-current="page">Edit Store</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>

                    </div>
                </div>
                @if(session()->has('message'))
                <div class="alert alert-danger m-4">
                    {{ session()->get('message') }}
                </div>
                @endif
                @if(session()->has('success'))
                <div class="alert alert-success m-4">
                    {{ session()->get('success') }}
                </div>
                @endif
                <!-- Main content -->
                <section class="content">

                    <div class="row">
                        <div class="col-lg-12 col-12">
                            <div class="box">
                                <div class="box-header with-border">
                                    <h4 class="box-title">About Store</h4>
                                </div>
                                @if ($errors->any())
                                <div class="alert alert-danger m-4">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                                <!-- /.box-header -->
                                <form class="form" method="post" action="{{ route('shop.update',encrypt($shop->id))}}">
                                    <div class="box-body">
                                        @csrf

                                        <div class="row">
                                            <div class="col-md-6">
                                                <h5>Company<span class="text-danger">*</span></h5>

                                                <select class="form-select" data-placeholder="Choose a Company"
                                                    name="company_id" tabindex="1" required
                                                    data-validation-required-message="Company field is required">
                                                    <option value="">Select Company</option>
                                                    @foreach($companies as $company)
                                                    <option {{ $shop->companyid == $company->id  ? 'selected' : ''}}
                                                        value="{{ $company->id }}">{{ $company->company_name }}
                                                    </option>
                                                    @endforeach

                                                </select>


                                            </div>
                                            <div class="col-md-12 mt-3">
                                                <div class="form-group">
                                                    <h5>Store Name <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" class="form-control" name="name"
                                                            placeholder="Store Name" required value="{{ $shop->name }}"
                                                            data-validation-required-message="Store field is required">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="fw-700 fs-16 form-label">Store Description</label>
                                                        <textarea class="form-control p-15" rows="4" name="description"
                                                            placeholder="Store description goes here...">{{$shop->description}}</textarea>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <h5>District<span class="text-danger">*</span></h5>

                                                <select class="form-select" data-placeholder="Choose a District"
                                                    name="district_id" tabindex="1" required
                                                    data-validation-required-message="Company field is required">
                                                    <option value="">Select District</option>
                                                    @foreach($district as $d)
                                                    <option {{ $shop->district_id == $d->id  ? 'selected' : ''}} value="{{ $d->id }}">{{ $d->name }}
                                                    </option>
                                                    @endforeach

                                                </select>


                                            </div>

                                            <div class="row mt-3">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <?php $selected_cat=explode(',', $shop->category); ?>
                                                        <label class="fw-700 fs-16 form-label">Category</label><span
                                                            class="text-danger">*</span>
                                                        <select class="form-select select2" multiple="multiple"
                                                            data-placeholder="Choose a Category" name="category[]"
                                                            tabindex="1" required
                                                            data-validation-required-message="Category field is required">
                                                            <option value="">Select Your Category</option>
                                                            @foreach($categories as $category)
                                                            <option @foreach($selected_cat as $cats)
                                                                {{$category->id == $cats  ? 'selected' : ''}}
                                                                @endforeach value="{{ $category->id }}">
                                                                {{ $category->name }}
                                                            </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label class="fw-700 fs-16 form-label">District Manager</label>
                                                <select class="form-select" data-placeholder="Choose a District Manager"
                                                    name="districtid" tabindex="1" required
                                                    data-validation-required-message="Category field is required">
                                                    <option value="">Select District Manager</option>
                                                    @foreach($districts as $district)
                                                    <option value="{{ $district->id }}"
                                                        {{ $shop->districtid == $district->id  ? 'selected' : ''}}>
                                                        {{$district->first_name.' '}}{{$district->last_name}}
                                                    </option>
                                                    @endforeach
                                                </select>


                                            </div>
                                            <div class="col-md-4">
                                                <label class="fw-700 fs-16 form-label">Manager</label>
                                                <select class="form-select" data-placeholder="Choose a Manager"
                                                    name="managerid" tabindex="1" required
                                                    data-validation-required-message="Manager field is required"
                                                    id="managers">
                                                    <option value="{{ $managers[0]->id }}"
                                                        {{ $shop->managerid == $managers[0]->id  ? 'selected' : ''}}>
                                                        {{$managers[0]->first_name.' '}}{{$managers[0]->last_name}}
                                                    </option>

                                                </select>


                                            </div>
                                            <div class="col-md-4">
                                                <label class="fw-700 fs-16 form-label">Owner</label>
                                                <div class="controls">
                                                    <select id="customers" class="form-select"
                                                        data-placeholder="Choose a Customer" name="customerid"
                                                        tabindex="1" required
                                                        data-validation-required-message="Customer field is required">

                                                        <option value="{{ $customers[0]->id }}"
                                                            {{ $shop->customerid == $customers[0]->id  ? 'selected' : ''}}>
                                                            {{$customers[0]->first_name.' '}}{{$customers[0]->last_name}}
                                                        </option>

                                                    </select>
                                                </div>


                                            </div>
                                        </div>
                                        <div class="row mt-5">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <?php $selected_vendors=explode(',', $shop->vendors); ?>

                                                    <label class="fw-700 fs-16 form-label">Vendors</label>
                                                    <select class="form-select select2" id="cities" multiple="multiple"
                                                        data-placeholder="Choose a Vendors" name="vendors[]"
                                                        tabindex="1" required>
                                                        <option value="">Select Vendors</option>
                                                        @foreach($vendors as $vendor)
                                                        <option value="{{ $vendor->id }}" @foreach($selected_vendors as
                                                            $v) {{$vendor->id == $v  ? 'selected' : ''}}
                                                            @endforeach>
                                                            {{$vendor->first_name.' '}}{{$vendor->last_name}}
                                                        </option>
                                                        @endforeach

                                                    </select>
                                                </div>
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
                                                                    value="publish"  {{$shop->status == "publish"  ? 'checked' : ''}}>
                                                                <label for="radio1">Published</label>
                                                            </div>
                                                        </label>
                                                        <label class="radio-inline">
                                                            <div class="radio radio-info">
                                                                <input type="radio" name="status" id="radio2"
                                                                    value="draft"  {{$shop->status == "draft"  ? 'checked' : ''}}>
                                                                <label for="radio2">Draft</label>
                                                            </div>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>

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
    <script>
    setTimeout(function() {
        $('.alert-success').fadeOut('fast');
    }, 2000);
    </script>
    <script>
    getManagers()
    getCustomers()

    function getCustomers() {

        var url = 'https://mactosys.com/Report/admin/get_customers';
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
                    var is_select = "";

                    if (obj[i].status == 1) {
                        is_select = 'disabled="disabled"'
                    }

                    console.log(is_select)
                    option += '<option value="' + obj[i].id + '" ' + is_select + '>' + obj[i].first_name + ' ' +
                        obj[i].last_name + '</option>';

                }
                $('#customers').append(option);

            });

    }

    function getManagers() {

        var url = 'https://mactosys.com/Report/admin/get_managers';
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
                    var is_select = "";

                    if (obj[i].status == 1) {
                        is_select = 'disabled="disabled"'
                    }

                    console.log(is_select)
                    option += '<option value="' + obj[i].id + '" ' + is_select + '>' + obj[i].first_name + ' ' +
                        obj[i].last_name + '</option>';

                }
                $('#managers').append(option);

            });

    }
    </script>
</body>

</html>