<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../images/favicon.ico">

    <title>Edit Employee </title>

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
                            <h3 class="page-title">Edit Employee</h3>
                            <div class="d-inline-block align-items-center">
                                <nav>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a>
                                        </li>
                                        <li class="breadcrumb-item" aria-current="page">Forms</li>
                                        <li class="breadcrumb-item active" aria-current="page">Edit Employee</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>

                    </div>
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



                <!-- Main content -->
                <section class="content">

                    <div class="row">
                        <div class="col-lg-12 col-12">
                            <div class="box">
                                <div class="box-header with-border">
                                    <h4 class="box-title">About Employee</h4>
                                </div>
                                <!-- /.box-header -->
                                <form class="form" novalidate method="post" action="{{ route('customer.update',encrypt($customer->id))}}">
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
                                                        <input type="text" name="first_name" value="{{$customer->first_name}}" class="form-control"
                                                            required
                                                            data-validation-required-message="First Name field is required">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Last Name</label> <span
                                                        class="text-danger">*</span>
                                                    <div class="controls">
                                                        <input type="text" name="last_name"  value="{{$customer->last_name}}"  class="form-control"
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
                                                        <input type="email" name="email"  value="{{$customer->email}}"  class="form-control" required
                                                            data-validation-required-message="Email field is required">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Contact Number</label>
                                                    <input type="text" name="phone"  value="{{$customer->phone}}"  class="form-control"
                                                        placeholder="Phone">
                                                </div>
                                            </div>

                                            <div class="col-md-12">

                                                    <div class="form-group">
                                                        <label class="form-label">Password</label><span
                                                            class="text-danger">*</span>
                                                        <div class="input-group mb-3 controls">
                                                            <span class="input-group-text"><i class="ti-lock"></i></span>
                                                            <input type="password" class="form-control" name="password"
                                                                placeholder="Password" >
                                                        </div>
                                                    </div>
                                                    </div>
                                                    <div class="col-md-12">

                                                    <div class="form-group">
                                                        <label class="form-label">Confirm Password</label><span
                                                            class="text-danger">*</span>
                                                        <div class="input-group mb-3 controls">
                                                            <span class="input-group-text"><i class="ti-lock"></i></span>
                                                            <input type="password" name="password2"    data-validation-match-match="password" class="form-control" > 

                                                        </div>
                                                    </div>
                                                    </div>
                                            
                                        </div>
                                        <h4 class="box-title text-info mb-0 mt-20"><i class="ti-save me-15"></i>
                                            Requirements</h4>
                                        <hr class="my-15">
                                        <!-- <div class="form-group">
                                            <label class="form-label">Company</label>
                                            <input type="text" class="form-control" name="company"
                                                placeholder="Company Name">
                                        </div> -->
                                        <div class="row">

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="fw-700 fs-16 form-label">Company</label><span
                                                        class="text-danger">*</span>
                                                    <select class="form-select" data-placeholder="Choose a Company"
                                                        name="company_id" tabindex="1" required
                                                        data-validation-required-message="Company field is required">
                                                        <option value="">Select Company</option>
                                                        @foreach($companies as $company)
                                                        <option  {{ $customer->company_id == $company->id  ? 'selected' : ''}} value="{{ $company->id }}">{{ $company->company_name }}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="fw-700 fs-16 form-label">Job Position</label><span
                                                        class="text-danger">*</span>
                                                    <select class="form-select" data-placeholder="Choose a Job Position"
                                                        name="roleid" tabindex="1" required
                                                        data-validation-required-message="Job Position field is required"  id="job_position">
                                                        <option value="">Select Job Position</option>
                                                        <option  {{ $customer->roleid ==4  ? 'selected' : ''}} value="4">Owner</option>
                                                        <option  {{ $customer->roleid ==3  ? 'selected' : ''}} value="3">District Manager</option>
                                                        <option  {{ $customer->roleid == 2 ? 'selected' : ''}}  value="2">Manager</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <!-- <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">City</label><span
                                                        class="text-danger">*</span>
                                                    <select class="form-select select2" multiple="multiple"
                                                        name="city[]" required
                                                        data-validation-required-message="City field is required">
                                                        <option value="">Select Your City</option>
                                                        <option>Toronto</option>
                                                        <option>Montréal</option>
                                                        <option>Vancouver</option>
                                                        <option>Ottawa</option>
                                                    </select>
                                                </div>
                                            </div> -->
                                        </div>

                                        <div class="row">

                                        <div class="col-md-6">
                                          

                                            <div class="col-md-6" id="dm" @if($customer->district_name == NULL) style="display:none;" @endif>
                                                <div class="form-group">
                                                    <label class="fw-700 fs-16 form-label">District</label>
                                                    <select class="form-select"
                                                        data-placeholder="Choose a District" name="district_name"
                                                        tabindex="1" >
                                                        <option value="">Select District Manager</option>
                                                        @foreach($districts as $user)
                                                        <option  {{ $customer->district_name == $user->id  ? 'selected' : ''}}  value="{{ $user->id }}">{{ $user->name }}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6" id="limit" @if($customer->approval_limit == NULL || $customer->approval_limit == 0) style="display:none;" @endif>
                                                <div class="form-group">
                                                    <label class="fw-700 fs-16 form-label">Approval Limit</label>
                                                    <input type="text" name="approval_limit" class="form-control" value=" {{ $customer->approval_limit}}">
                                                </div>
                                            </div>

                                            

                                            <div class="col-md-6" id="rs" @if($customer->shop_id == '') style="display:none;" @endif>
                                                <div class="form-group">
                                                    <label class="fw-700 fs-16 form-label">Reporting Store</label>
                                                    <select class="form-select"
                                                        data-placeholder="Choose a Reporting Store" name="shop_id"
                                                        tabindex="1" >
                                                        <option value="">Select Reporting Store</option>
                                                        @foreach($shops as $shop)
                                                        <option {{ $customer->shop_id == $shop->id  ? 'selected' : ''}} value="{{ $shop->id }}">{{ $shop->name }}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            
                                            <!-- <div class="col-md-6">
    <div class="form-group">
        <label class="form-label">City</label><span
            class="text-danger">*</span>
        <select class="form-select select2" multiple="multiple"
            name="city[]" required
            data-validation-required-message="City field is required">
            <option value="">Select Your City</option>
            <option>Toronto</option>
            <option>Montréal</option>
            <option>Vancouver</option>
            <option>Ottawa</option>
        </select>
    </div>
</div> -->
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">About Employee</label>
                                            <textarea rows="5" class="form-control" name="desc"
                                                placeholder="About Employee">{{$customer->desc}}</textarea>
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
                                                                    value="1"  {{$customer->is_active == 1  ? 'checked' : ''}}>
                                                                <label for="radio1">Published</label>
                                                            </div>
                                                        </label>
                                                        <label class="radio-inline">
                                                            <div class="radio radio-info">
                                                                <input type="radio" name="status" id="radio2"
                                                                    value="9"  {{$customer->is_active == 0  ? 'checked' : ''}}>
                                                                <label for="radio2">Draft</label>
                                                            </div>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--/span-->
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
    $('#job_position').on('change', function() {
        if(this.value == 3){
            $('#rs').hide();
            $('#limit').hide();

            $('#dm').show()
        }

        if(this.value == 2){
            $('#dm').hide()
            $('#limit').hide();

            $('#rs').show();

        }
        if(this.value == 4){
            $('#dm').hide()

            $('#rs').hide();
            $('#limit').show();

        }
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

</html>