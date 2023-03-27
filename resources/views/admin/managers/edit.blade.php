<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../images/favicon.ico">

    <title>Edit Manager </title>

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
                            <h3 class="page-title">Edit Manager</h3>
                            <div class="d-inline-block align-items-center">
                                <nav>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a>
                                        </li>
                                        <li class="breadcrumb-item" aria-current="page">Forms</li>
                                        <li class="breadcrumb-item active" aria-current="page">Edit Manager</li>
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
                                    <h4 class="box-title">About Manager</h4>
                                </div>
                                <!-- /.box-header -->
                                <form class="form" method="post"
                                    action="{{ route('manager.update',encrypt($manager->id))}}">
                                    @csrf
                                    <div class="box-body">
                                        <h4 class="box-title text-info mb-0"><i class="ti-user me-15"></i> Personal Info
                                        </h4>
                                        <hr class="my-15">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">First Name</label>
                                                    <input type="text" class="form-control" placeholder="First Name"
                                                        name="first_name" value="{{$manager->first_name}}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Last Name</label>
                                                    <input type="text" class="form-control" name="last_name"
                                                        placeholder="Last Name" value="{{$manager->last_name}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">E-mail</label>
                                                    <input type="text" class="form-control" placeholder="E-mail"
                                                        name="email" placeholder="E-mail" value="{{$manager->email}}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Contact Number</label>
                                                    <input type="text" class="form-control" placeholder="Phone"
                                                        name="phone" value="{{$manager->phone}}">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Password</label>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text"><i class="ti-lock"></i></span>
                                                    <input type="password" class="form-control" placeholder="Password"
                                                        name="password">
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
                                                        <option value="{{ $user->id }}"
                                                            {{$user->id == $manager->district_name  ? 'selected' : ''}}>
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
                                                    <?php if (isset($district_manager->city)) 
                                                    { $district_city=explode(',', $district_manager->city);
                                                      $selected_city=explode(',', $manager->city);
                                                    ?>

                                                    <select class="form-select select2" id="cities" multiple="multiple"
                                                        data-placeholder="Choose a City" name="city[]" tabindex="1"
                                                        required>

                                                        @foreach($district_city as $city)
                                                        <option value="{{ $city}}"  @foreach($selected_city as $c) {{$city == $c  ? 'selected' : ''}}  @endforeach >{{ $city}}</option>
                                                        @endforeach

                                                    </select>

                                                    <?php
                                                    }
                                                    
                                                    else
                                                    {
                                                    ?>


                                                    <select class="form-select select2" id="cities" multiple="multiple"
                                                        data-placeholder="Choose a City" name="city[]" tabindex="1"
                                                        required>



                                                    </select>
                                                    <?php
                                                    }?>

                                                </div>
                                            </div>
                                        </div> -->

                                        <h4 class="box-title text-info mb-0 mt-20"><i class="ti-save me-15"></i>
                                            Requirements</h4>
                                        <hr class="my-15">
                                        <!-- <div class="form-group">
                                            <label class="form-label">Shop</label>
                                            <input type="text" class="form-control" placeholder="Shop Name"
                                                name="company" value="{{$manager->company}}">
                                        </div> -->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <?php $selected_cat=explode(',', $manager->category); ?>
                                                    <label class="fw-700 fs-16 form-label">Category</label>
                                                    <select class="form-select select2" multiple="multiple"
                                                        name="category[]" data-placeholder="Choose a Category"
                                                        tabindex="1">
                                                        <option value="">Select Category</option>
                                                        @foreach($categories as $category)

                                                        <option value="{{$category->id}}" @foreach($selected_cat as
                                                            $cats) {{$category->id == $cats  ? 'selected' : ''}}
                                                            @endforeach>{{$category->name}}</option>

                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">About Manager</label>
                                            <textarea rows="5" class="form-control" placeholder="About Manager"
                                                name="desc">{{$manager->desc}}</textarea>
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
                <!-- <li class="nav-item">
                    <a class="nav-link" href="javascript:void(0)">FAQ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Purchase Now</a>
                </li> -->
            </ul>
        </div>
        &copy; 2023 <a href="{{url('admin/dashboard')}}">WeFix</a>. All Rights Reserved.
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


    <script src="{{ asset('js/pages/advanced-form-element.js') }}"></script>
    <script src="{{ asset('assets/vendor_components/select2/dist/js/select2.full.js') }}"></script>
    <script>
    $('#districtManager').on('change', function() {
        $("#cities").html("");
        var managerid = $('#districtManager').val()
        var select = document.getElementById('districtManager');

        var url = 'https://mactosys.com/Report/admin/ca_cities?managerid=' + managerid + '&edit=1&current_user='+{{$manager->id}}

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
                        id: obj[i].text,
                        text: obj[i].text
                    };
                    var newOption = new Option(data.text, data.id, false, obj[i].status);
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
    </script>
        <script>
        setTimeout(function() {
            $('.alert-success').fadeOut('fast');
        }, 2000);
</script>

</body>

</html>