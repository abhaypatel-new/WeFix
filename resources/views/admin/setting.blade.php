<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../images/favicon.ico">

    <title>Settings</title>


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
                            <h3 class="page-title">Settings</h3>
                            <div class="d-inline-block align-items-center">
                                <nav>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a>
                                        </li>
                                        <li class="breadcrumb-item" aria-current="page">Settings</li>
                                        <li class="breadcrumb-item active" aria-current="page">Settings</li>
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

                    @if ($errors->any())
                    <div class="alert alert-danger m-4">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <div class="row">
                        <div class="col-12">
                            <div class="box">
                                <div class="box-header with-border">
                                    <!-- <h3 class="box-title">Add Districts</h3> -->
                                </div>
                                <form action="{{ route('settings')}}" method="post">
                                    @csrf
                                    <!-- /.box-header -->
                                    <div class="box-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-label">Set Manager Approval Limit</label> <span
                                                        class="text-danger">*</span>
                                                    <div class="controls">
                                                        <input type="text" name="approval_limits" class="form-control" required
                                                            data-validation-required-message="Approval Limit field is required" value="{{$approval_limits->value}}">
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                    <div class="box-footer">
                                        <button type="button" class="btn btn-warning me-1">
                                            <i class="ti-trash"></i> Cancel
                                        </button>
                                        <button type="submit" class="btn btn-primary" name="create" value="create">
                                            <i class="ti-save-alt"></i> Save
                                        </button>

                                    </div>
                            </div>

                            </form>






                            <!-- /.box -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </section>
                <!-- /.content -->

            </div>
        </div>
        <!-- /.content-wrapper -->


    </div>
    <!-- ./wrapper -->


    <!-- Page Content overlay -->


    <!-- Vendor JS -->
    <script src="{{ asset('js/vendors.min.js')}}"></script>
    <script src="{{ asset('js/pages/chat-popup.js')}}"></script>
    <script src="{{ asset('assets/icons/feather-icons/feather.min.js')}}"></script>
    <script src="{{ asset('assets/vendor_components/datatable/datatables.min.js')}}"></script>

    <!-- EduAdmin App -->
    <script src="{{ asset('js/template.js')}}"></script>

    <script src="{{ asset('js/pages/data-table.js')}}"></script>

    <script src="{{ asset('js/pages/advanced-form-element.js') }}"></script>
    <script src="{{ asset('assets/vendor_components/select2/dist/js/select2.full.js') }}"></script>
    <script>
    setTimeout(function() {
        $('.alert-success').fadeOut('fast');
    }, 2000);

    $('input').bind('input', function() {
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