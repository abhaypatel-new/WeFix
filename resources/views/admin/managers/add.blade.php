<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../images/favicon.ico">

    <title>Add Manager </title>

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
                            <h3 class="page-title">Add Manager</h3>
                            <div class="d-inline-block align-items-center">
                                <nav>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a>
                                        </li>
                                        <li class="breadcrumb-item" aria-current="page">Forms</li>
                                        <li class="breadcrumb-item active" aria-current="page">Add Manager</li>
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
                                    <h4 class="box-title">About Manager</h4>
                                </div>
                                <!-- /.box-header -->
                                <form class="form" novalidate method="post" action="{{ route('manager.create')}}">
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
                                                        <input type="text" name="first_name" class="form-control"
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
                                                        <input type="text" name="last_name" class="form-control"
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
                                                        <input type="email" name="email" class="form-control" required
                                                            data-validation-required-message="Email field is required">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Contact Number</label>
                                                    <input type="text" name="phone" class="form-control"
                                                        placeholder="Phone">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Password</label><span
                                                    class="text-danger">*</span>
                                                <div class="input-group mb-3 controls">
                                                    <span class="input-group-text"><i class="ti-lock"></i></span>
                                                    <input type="password" class="form-control" name="password"
                                                        placeholder="Password" required
                                                        data-validation-required-message="Password field is required">
                                                </div>
                                            </div>
                                        </div>
                                        <!-- <h4 class="box-title text-info mb-0 mt-20"><i class="ti-user me-15"></i> Assign
                                            District Manager</h4>
                                        <hr class="my-15">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="fw-700 fs-16 form-label">District Manager</label><span
                                                        class="text-danger">*</span>
                                                    <select class="form-select" name="district_name" tabindex="1"
                                                        required id="districtManager">
                                                        <option value="">Select District Manager</option>
                                                        @foreach($users as $user)
                                                        <option value="{{ $user->id }}">
                                                            {{$user->first_name.' '}}{{$user->last_name}}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="fw-700 fs-16 form-label">City</label><span
                                                        class="text-danger">*</span>
                                                    <select class="form-select select2" id="cities" multiple="multiple"
                                                        data-placeholder="Choose a City" name="city[]" tabindex="1"
                                                        required>
                                                        <option value="">Select City</option>

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
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="fw-700 fs-16 form-label">Category</label><span
                                                        class="text-danger">*</span>
                                                    <select class="form-select select2" multiple="multiple"
                                                        data-placeholder="Choose a Category" name="category[]"
                                                        tabindex="1" required
                                                        data-validation-required-message="Category field is required">
                                                        <option value="">Select Your Category</option>
                                                        @foreach($categories as $category)
                                                        <option value="{{ $category->id }}">{{ $category->name }}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">About Manager</label>
                                            <textarea rows="5" class="form-control" name="desc"
                                                placeholder="About Manager"></textarea>
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
    <!-- <script>
    $('#districtManager').on('change', function() {
        $("#cities").html("");
        var managerid = $('#districtManager').val()
        var select = document.getElementById('districtManager');

        var url = 'https://mactosys.com/Report/admin/ca_cities?managerid=' + managerid + '&edit=0'

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
                console.log(obj)

                var data = {
                    id: 1,
                    text: 'Barn owl'
                };

                var data = {};

                for (i = 0; i < obj.length; i++) {
                    var data = {
                    id: obj[i],
                    text: obj[i]
                };
                
                var newOption = new Option(data.text, data.id, false, false);
                $('#cities').append(newOption).trigger('change');
                }
                console.log(data)

                // var option = '';
                // for (i = 0; i < obj.length; i++) {
                //     option += '<option value="' + obj[i] + '">' + obj[i] + '</option>';

                // }

             
                // console.log(option)

            
            });
    });
    </script> -->
</body>

</html>