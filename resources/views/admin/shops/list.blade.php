<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../images/favicon.ico">

    <title>Stores List</title>


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
                            <h3 class="page-title">Stores List</h3>
                            <div class="d-inline-block align-items-center">
                                <nav>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a>
                                        </li>
                                        <li class="breadcrumb-item" aria-current="page">Stores</li>
                                        <li class="breadcrumb-item active" aria-current="page">Stores List</li>
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
                        @if ($errors->any())
                        <div class="alert alert-danger m-4">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif



                        <div class="col-12">

                            <div class="box">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Companies</h3>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <div class="table-responsive">
                                        <table id="example4" class="table table-bordered table-striped"
                                            style="width:100%">
                                            <thead>
                                                <tr>

                                                    <th>Name</th>
                                                    <th>Description</th>
                                                    <th>District</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($companies as $company)
                                                <tr>
                                                    <td>{{$company->company_name}}</td>
                                                    <td>{{$company->company_desc}}</td>
                                                    <td></td>
                                                    <td>
                                                        <table>
                                                            <tr>
                                                                <td><a class="btn btn-info m-2 " data-bs-toggle="modal"
                                                                        data-bs-target="#modal-edit{{ $company->id }}"><i
                                                                            class="mdi mdi-pencil"></i></a></td>
                                                                <td><a class="btn btn-danger mt-2 "
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#modal-center{{ $company->id }}"><i
                                                                            class="mdi mdi-delete"></i></a>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <!-- Modal -->
                                                <div class="modal center-modal fade" id="modal-edit{{ $company->id }}"
                                                    tabindex="-1">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title"></h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="box">
                                                                    <div class="box-header with-border">
                                                                        <h3 class="box-title">Edit Company</h3>
                                                                    </div>
                                                                    <form
                                                                        action="{{ route('company.update',encrypt($company->id))}}"
                                                                        method="post">
                                                                        @csrf
                                                                        <div class="box-body">
                                                                            <div class="row">
                                                                                <div class="col-md-12">
                                                                                    <div class="form-group">
                                                                                        <h5>Company Name <span
                                                                                                class="text-danger">*</span>
                                                                                        </h5>
                                                                                        <div class="controls">
                                                                                            <input type="text"
                                                                                                class="form-control"
                                                                                                name="company_name"
                                                                                                placeholder="Company Name"
                                                                                                required
                                                                                                value="{{ $company->company_name}}"
                                                                                                data-validation-required-message="Company field is required">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-12">
                                                                                        <div class="form-group">
                                                                                            <label
                                                                                                class="fw-700 fs-16 form-label">Company
                                                                                                Description</label>
                                                                                            <textarea
                                                                                                class="form-control p-15"
                                                                                                rows="4"
                                                                                                name="description"
                                                                                                value="{{ $company->company_desc }}"
                                                                                                placeholder="Company description goes here..."></textarea>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="body-footer">
                                                                            <!-- <button type="button"
                                                                            class="btn btn-warning me-1">
                                                                            <i class="ti-trash"></i> Cancel
                                                                        </button>
                                                                        <button type="submit" class="btn btn-primary">
                                                                            <i class="ti-save-alt"></i> Save
                                                                        </button> -->
                                                                        </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer modal-footer-uniform">
                                                                <button type="clear" class="btn btn-default"
                                                                    data-bs-dismiss="modal">Close</button>
                                                                <button type="submit"
                                                                    class="btn btn-primary float-end">Save
                                                                    Changes</button>
                                                            </div>
                                                        </div>
                                                        </form>
                                                    </div>
                                                </div>
                                                <!-- /.modal -->

                                                <!-- Modal -->
                                                <div class="modal center-modal fade" id="modal-center{{ $company->id }}"
                                                    tabindex="-1">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Delete</h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>Are you sure you want to delete
                                                                    {{$company->company_name}}</p>
                                                            </div>
                                                            <div class="modal-footer modal-footer-uniform">
                                                                <button type="button" class="btn btn-default"
                                                                    data-bs-dismiss="modal">Close</button>
                                                                <button type="button"
                                                                    class="btn btn-danger float-end">Delete</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /.modal -->
                                                @endforeach

                                            </tbody>
                                            <tfoot>
                                                <tr>

                                                    <th>Name</th>
                                                    <th>Description</th>
                                                    <th>District</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                                <!-- /.box-body -->
                            </div>
                            <!-- /.box -->
                        </div>




                        <!-- /.box -->
                    </div>
                    <div class="row">



                        <div class="col-12">

                            <div class="box">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Stores</h3>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <div class="table-responsive">
                                        <table id="example5" class="table table-bordered table-striped"
                                            style="width:100%">
                                            <thead>
                                                <tr>

                                                    <th>Name</th>
                                                    <th>Company</th>
                                                    <th>D Manager</th>
                                                    <th>Manager</th>
                                                    <th>Owner</th>
                                                    <th>Total Earning</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($shops as $shop)
                                                <tr>
                                                    <td>{{$shop->name}}</td>
                                                    <td>{{$shop->company_name}}</td>
                                                    <td>{{$shop->district_manager}}</td>
                                                    <td>{{$shop->manager}}</td>
                                                    <td>{{$shop->customer_name}}</td>
                                                    <td></td>
                                                    <td>
                                                        <table>
                                                            <tr>
                                                                <td><a class="btn btn-info m-2 "
                                                                        href="{{ url('admin/shops/edit/'. encrypt($shop->id))}}"><i
                                                                            class="mdi mdi-pencil"></i></a></td>
                                                                <td><a class="btn btn-danger mt-2 "
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#modal-center{{ $shop->id }}"><i
                                                                            class="mdi mdi-delete"></i></a>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <!-- Modal -->
                                                <div class="modal center-modal fade" id="modal-center{{ $shop->id }}"
                                                    tabindex="-1">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Delete</h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>Are you sure you want to delete {{$shop->name}}</p>
                                                            </div>
                                                            <div class="modal-footer modal-footer-uniform">
                                                                <button type="button" class="btn btn-default"
                                                                    data-bs-dismiss="modal">Close</button>
                                                                <button type="button"
                                                                    class="btn btn-danger float-end">Delete</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /.modal -->
                                                @endforeach

                                            </tbody>
                                            <tfoot>
                                                <tr>

                                                    <th>Name</th>
                                                    <th>Company</th>
                                                    <th>D Manager</th>
                                                    <th>Manager</th>
                                                    <th>Owner</th>
                                                    <th>Total Earning</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                                <!-- /.box-body -->
                            </div>
                            <!-- /.box -->
                        </div>




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
    <script src="{{ asset('js/vendors.min.js')}}"></script>
    <script src="{{ asset('js/pages/chat-popup.js')}}"></script>
    <script src="{{ asset('assets/icons/feather-icons/feather.min.js')}}"></script>
    <script src="{{ asset('assets/vendor_components/datatable/datatables.min.js')}}"></script>

    <!-- EduAdmin App -->
    <script src="{{ asset('js/template.js')}}"></script>

    <script src="{{ asset('js/pages/data-table.js')}}"></script>
    <script>
    setTimeout(function() {
        $('.alert-success').fadeOut('fast');
    }, 2000);
    </script>

</body>

</html>