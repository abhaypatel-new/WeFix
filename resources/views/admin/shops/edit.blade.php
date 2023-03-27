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
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <h5>Store Number <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" class="form-control" name="store_number"
                                                                placeholder="Store Number" required value="{{ $shop->store_number }}"
                                                                data-validation-required-message="Store Number field is required">
                                                        </div>
                                                    </div>


                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="fw-700 fs-16 form-label">Address</label>
                                                        <input type="text" class="form-control" name="address"
                                                                placeholder="Address" required value="{{ $shop->address }}"
                                                                data-validation-required-message="Address field is required">
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

                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label class="fw-700 fs-16 form-label">Province <span
                                                            class="text-danger">*</span> </label>
                                                    <select class="form-select" data-placeholder="Choose a Province"
                                                        name="province" tabindex="1" required
                                                        data-validation-required-message="Province field is required"
                                                        id="shop_province" onClick="getCitys()">
                                                        <option value="">Select Province</option>
                                                        @foreach($provinces as $province)
                                                        <option  <?php if ($shop->province == $province->province) echo "selected='selected'";?>  value="{{ $province->province }}">{{ $province->province }}</option>

                                                        @endforeach
                                                    </select>


                                                </div>
                                                <div class="col-md-4">


                                                    <div class="form-group">
                                                        <label class="fw-700 fs-16 form-label">City <span
                                                                class="text-danger">*</span></label>
                                                        <select class="form-select" data-placeholder="Choose a City"
                                                            name="city_id" tabindex="1" required
                                                            data-validation-required-message="City field is required"
                                                            id="shop_cities">
                                                            <option value="">Select City</option>
                                                            {{$shop->city}}
                                                        @foreach($cities as $city)

                                                            <option  <?php if ($shop->city == $city->id) echo "selected='selected'";?>  value="{{ $city->id }}">{{ $city->name }}</option>
                                                            @endforeach

                                                        </select>


                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="fw-700 fs-16 form-label">Postal Code <span
                                                                class="text-danger">*</span></label>
                                                        <div class="controls">
                                                            <input type="text" class="form-control" name="postal_code"
                                                                placeholder="Postal Code" required value="{{ $shop->postal_code }}"
                                                                data-validation-required-message="Postal Code field is required">
                                                        </div>
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

                                            

                                            <div class="col-md-6">
                                                 <a class="btn btn-primary mt-3" data-bs-toggle="modal"
                                                    data-bs-target="#modal-center"> Add District</a>
                                            </div>

                                            

                                        </div>
                                        
 <input type="hidden" name="status" value="1">
                                       

                                        

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
                        <div class="modal center-modal fade" id="modal-center" tabindex="-1">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Add District</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form novalidate action="{{ route('create_district')}}" method="post">
                                            @csrf
                                            <div class="col-md-12">
                                                <h5>Company<span class="text-danger">*</span></h5>

                                                <select class="form-select" data-placeholder="Choose a Company"
                                                    name="company_id" tabindex="1" required
                                                    data-validation-required-message="Company field is required">
                                                    <option value="">Select Company</option>
                                                    @foreach($companies as $company)
                                                    <option value="{{ $company->id }}">{{ $company->company_name }}
                                                    </option>
                                                    @endforeach

                                                </select>


                                            </div>
                                            <div class="form-group">
                                                <label class="fw-700 fs-16 form-label">District Name</label>
                                                <input type="text" class="form-control" name="district_name"
                                                    placeholder="District Name" required
                                                    data-validation-required-message="District Name field is required">
                                            </div>
                                    </div>
                                    <div class="modal-footer modal-footer-uniform">
                                        <button type="button" class="btn btn-default"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary float-end">Save</button>
                                    </div>
                                    </form>

                                </div>
                            </div>
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
    // getManagers()
    // getCustomers()

    function getCitys() {
        $("#cities option").remove();
        var province = $('#shop_province').val();

             
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
                $('#shop_cities').append(option);

            });

    }
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