<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../images/favicon.ico">

    <title>Add Store </title>

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
                            <h3 class="page-title">Edit Company</h3>
                            <div class="d-inline-block align-items-center">
                                <nav>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a>
                                        </li>
                                        <li class="breadcrumb-item" aria-current="page">Company</li>
                                        <li class="breadcrumb-item active" aria-current="page">Add Company</li>
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
                        <div class="col-log-12">
                            <div class="box">
                                <div class="box-header with-border">
                                    <h4 class="box-title">Edit Company</h4>
                                </div>
                                <div class="box-body">
                                    <form novalidate class="form" method="post" action="{{ route('company.update',encrypt($company->id))}}">
                                        @csrf

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <h5>Company Name <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" class="form-control" name="company_name"
                                                        placeholder="Company Name" required value="{{$company->company_name}}"
                                                        data-validation-required-message="Company field is required">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <h5>Addresss <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" class="form-control" name="address"
                                                        placeholder="Company Address" required value="{{$company->company_address}}"
                                                        data-validation-required-message="Company Address field is required">
                                                </div>
                                            </div>
                                              <div class="row">
                                            <div class="col-md-4">
                                                <label class="fw-700 fs-16 form-label">Province <span class="text-danger">*</span> </label>
                                                <select class="form-select" data-placeholder="Choose a Province"
                                                    name="province" tabindex="1" required 
                                                    data-validation-required-message="Province field is required" id="province"   onClick="getCitys()" >
                                                    <option value="">Select Province</option>
                                                    @foreach($provinces as $province)
                                                 <option  <?php if ($company->province == $province->province) echo "selected='selected'";?>  value="{{ $province->province }}">{{ $province->province }}</option>
                                                 @endforeach
                                                </select>


                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                <label class="fw-700 fs-16 form-label">City <span class="text-danger">*</span></label>
                                                <select class="form-select" data-placeholder="Choose a City"
                                                    name="city_id" tabindex="1" required
                                                    data-validation-required-message="City field is required"
                                                    id="cities">
                                                    <option value="">Select City</option>
                                                    @foreach($cities as $city)
                                                 <option  <?php if ($company->city == $city->id) echo "selected='selected'";?>  value="{{ $city->id }}">{{ $city->name }}</option>
                                                 @endforeach
                    
                                                </select>


                                            </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                <label class="fw-700 fs-16 form-label">Postal Code <span class="text-danger">*</span></label>
                                                <div class="controls">
                                                    <input type="text" class="form-control" name="postal_code"
                                                        placeholder="Postal Code" required value="{{$company->postal_code}}"
                                                        data-validation-required-message="Postal Code field is required">
                                                </div>
                                                </div>


                                            </div>
                                        </div>
                                        
                                          <div class="row mt-3">
                                         
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                <label class="fw-700 fs-16 form-label">Work Phone <span class="text-danger">*</span></label>
                                               <div class="controls">
                                                    <input type="number" class="form-control" name="work_phone"
                                                        placeholder="Work Phone" required value="{{$company->work_phone}}"
                                                        data-validation-required-message="Work Phone field is required">
                                                </div>
                                                </div>
                                            </div>
                                         
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                <label class="fw-700 fs-16 form-label">GST Number <span class="text-danger">*</span></label>
                                               <div class="controls">
                                                    <input type="text" class="form-control" name="gst_number"
                                                        placeholder="GST Number" required value="{{$company->gst}}"
                                                        data-validation-required-message="GST Number field is required">
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                            <h4>Owner's Information</h4>
                                              <div class="row mt-3">
                                         
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                <label class="fw-700 fs-16 form-label">First Name<span class="text-danger">*</span></label>
                                               <div class="controls">
                                                    <input type="text" class="form-control" name="first_name"
                                                        placeholder="First Name" required value="{{$company->first_name}}"
                                                        data-validation-required-message="First Name field is required">
                                                </div>
                                                </div>
                                            </div>
                                         
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                <label class="fw-700 fs-16 form-label">Last Number<span class="text-danger">*</span></label>
                                               <div class="controls">
                                                    <input type="text" class="form-control" name="last_name"
                                                        placeholder="Last Name" required value="{{$company->last_name}}"
                                                        data-validation-required-message="Last Name field is required">
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                      <div class="row mt-3">
                                         
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                <label class="fw-700 fs-16 form-label">Email<span class="text-danger">*</span></label>
                                               <div class="controls">
                                                    <input type="text" class="form-control" name="email"
                                                        placeholder="First Name" required value="{{$company->email}}"
                                                        data-validation-required-message="First Name field is required">
                                                </div>
                                                </div>
                                            </div>
                                         
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                <label class="fw-700 fs-16 form-label">Password<span class="text-danger">*</span></label>
                                               <div class="controls">
                                                    <input type="password" class="form-control" name="password"
                                                        placeholder="Password"  value=""
                                                        >
                                                </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                <label class="fw-700 fs-16 form-label">Phone<span class="text-danger">*</span></label>
                                               <div class="controls">
                                                    <input type="text" class="form-control" name="phone"
                                                        placeholder="Phone" required value="{{$company->phone_number}}"
                                                        data-validation-required-message="Phone field is required">
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="fw-700 fs-16 form-label">Company Description</label>
                                                    <textarea class="form-control p-15" rows="4" name="description"
                                                        placeholder="Company description goes here...">{{$company->company_desc}} </textarea>
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
                                                                        value="active"  <?php echo ($company->status== 'active') ?  "checked" : "" ;  ?> >
                                                                    <label for="radio1">Active</label>
                                                                </div>
                                                            </label>
                                                            <label class="radio-inline">
                                                                <div class="radio radio-info">
                                                                    <input type="radio" name="status" id="radio2"
                                                                        value="inactive" <?php echo ($company->status== 'inactive') ?  "checked" : "" ;  ?>>
                                                                    <label for="radio2">Inactive</label>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                            </div>
                                            
                                            
                                        </div>
                                 

                                </div>
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
                        </div>
                    </div>
          
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
    getManagers()
    getCustomers()

    function getCitys() {
        $("#cities option").remove();
       var province = $('#province').val();
       console.log(province)
        var url = 'http://209.97.156.170/WeFix/admin/get_cities?province='+province;
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


    function getCustomers() {

        var url = 'http://209.97.156.170/WeFix/admin/get_customers';
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

        var url = 'http://209.97.156.170/WeFix/admin/get_managers';
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