<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../images/favicon.ico">

    <title>WeFix Earning</title>
  
	 
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
					<h3 class="page-title">Earning Reports</h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item" aria-current="page">Earning</li>
								<li class="breadcrumb-item active" aria-current="page">Earning List</li>
							</ol>
						</nav>
					</div>
				</div>
				
			</div>
		</div>

		<!-- Main content -->
		<section class="content">
		    			<div class="row">
		   	<div class="col-12">
			  <div class="box">
              <div class="box-header with-border">
				  <h3 class="box-title">Filter</h3>
				</div>
				<div class="box-body">
		    		<div class="form-group row">
                    <div class="col-md-4">
					 <div class="form-group">
    						<select class="form-control" data-placeholder="Select a Company"
    								style="width: 100%;" name="company" id="select_company">
                                    <option value="">Select Company</option>
    					       @foreach($compaines as $company)
                               <option value="{{$company->id}}">{{$company->company_name}}</option>
                               @endforeach
    						</select>
					  </div>
							
					</div>

                    <div class="col-md-4">
					 <div class="form-group">
    						<select class="form-control" data-placeholder="Select a District"
    								style="width: 100%;" name="district" id="select_district">
                                    <option value="">Select District</option>
    					       @foreach($districts as $district)
                               <option value="{{$district->id}}">{{$district->name}}</option>
                               @endforeach
    						</select>
					  </div>
							
					</div>

		    		    	<div class="col-md-4">
					 <div class="form-group">
    						<select class="form-control" data-placeholder="Select a Shop"
    								style="width: 100%;" name="shop" id="select_shop">
                                    <option value="">Select Shop</option>
    					       @foreach($shops as $shop)
                               <option value="{{$shop->id}}">{{$shop->name}}</option>
                               @endforeach
    						</select>
					  </div>
							
						</div>
					
					
					</div>
					

		    			        </div>
		    			    </div>
		    			    </div>
		    		
				
				<div class="col-xl-3 col-md-6 col-12">
					<div class="box bg-secondary-light pull-up" style="background-image: url(../images/svg-icon/color-svg/st-1.svg); background-position: right bottom; background-repeat: no-repeat;">
						<div class="box-body">	
							<div class="flex-grow-1">	
								
								<h4 class="mt-25 mb-5">Total Earning <b><span style="float:right;font-size:25px;line-height: 1;" id="total_earn"></span></b></h4>
								
							</div>	
						</div>					
					</div>
				</div>
				<div class="col-xl-3 col-md-6 col-12">
					<div class="box bg-secondary-light pull-up" style="background-image: url(../images/svg-icon/color-svg/st-2.svg); background-position: right bottom; background-repeat: no-repeat;">
						<div class="box-body">	
							<div class="flex-grow-1">	
								
								<h4 class="mt-25 mb-5">Total Tax<span style="float:right;font-size:200%;">--</span></h4>
							</div>	
						</div>					
					</div>
				</div>
				<div class="col-xl-3 col-md-6 col-12">
					<div class="box bg-secondary-light pull-up" style="background-image: url(../images/svg-icon/color-svg/st-3.svg); background-position: right bottom; background-repeat: no-repeat;">
						<div class="box-body">	
							<div class="flex-grow-1">	
								
								<h4 class="mt-25 mb-5">
                                  Total Commission<span style="float:right;font-size:200%;">--</span></h4>
							</div>	
						</div>					
					</div>
				</div>
				<div class="col-xl-3 col-md-6 col-12">
					<div class="box bg-secondary-light pull-up" style="background-image: url(../images/svg-icon/color-svg/st-4.svg); background-position: right bottom; background-repeat: no-repeat;">
						<div class="box-body">	
							<div class="flex-grow-1">	
						
								<h4 class="mt-25 mb-5">Earnings<span style="float:right;font-size:200%;">--</span></h4>
							</div>	
						</div>					
					</div>
				</div>
			</div>
			
		  <div class="row">
		   
		    <!-- <div class="col-xl-12 col-12">
			  <div class="box">
				<div class="box-header with-border">
				  <h4 class="box-title">4500&nbsp; $</h4>
				</div>
				<div class="box-body">
				  <div id="area-chart" style="height: 338px;" class="full-width-chart"></div>
				</div>
			  </div>
			</div>
		     -->
            <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Earning Report</h3>
				  <h6 class="box-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example" class="table table-hover display nowrap margin-top-10 w-p100">
						<thead>
							<tr>
								<th>Comapny Name</th>
								<th>Store Number</th>
								<th>Store Name</th>
								<th>Product</th>
								<th>Date</th>
								<th>District</th>
								<th>Amount</th>
							</tr>
						</thead>
						<tbody>
						
						</tbody>				  
						<tfoot>
							<tr>
								<th>Comapny Name</th>
								<th>Store Number</th>
								<th>Store Name</th>
								<th>Product</th>
								<th>Date</th>
								<th>District</th>
								<th>Amount</th>
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

  
  <!-- /.control-sidebar -->
  
  <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
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
	
		<script src="{{ asset('assets/vendor_components/Flot/jquery.flot.js') }}"></script>
	<script src="{{ asset('assets/vendor_components/Flot/jquery.flot.resize.js') }}"></script>
	<script src="{{ asset('assets/vendor_components/Flot/jquery.flot.pie.js') }}"></script>
	<script src="{{ asset('assets/vendor_components/Flot/jquery.flot.categories.js') }}"></script>
	
	<!-- EduAdmin App -->
	<script src="{{ asset('js/template.js') }}"></script>
	
	<script src="{{ asset('js/pages/widget-flot-charts.js') }}"></script>
	
	<script src="{{ asset('js/pages/advanced-form-element.js') }}"></script>
	<script src="{{ asset('assets/vendor_components/select2/dist/js/select2.full.js') }}"></script>
    <script>

   var city = 0      
   var district = 0
   var company = 0
   var shop = 0
   
   
$('#select_city').on('change', function() {
    city=$('#select_city').val()
    district=$('#select_district').val()
    company=$('#select_company').val()
    shop=$('#select_shop').val()

    getEarningReport(district,city,company,shop);
});


$('#select_company').on('change', function() {
    city=$('#select_city').val()
    district=$('#select_district').val()
    company=$('#select_company').val()
    shop=$('#select_shop').val()

    getEarningReport(district,city,company,shop);
});

$('#select_district').on('change', function() {
    district=$('#select_district').val()
    city=$('#select_city').val()
    company=$('#select_company').val()
    shop=$('#select_shop').val()

    getEarningReport(district,city,company,shop);
});


$('#select_shop').on('change', function() {
    district=$('#select_district').val()
    city=$('#select_city').val()
    company=$('#select_company').val()
    shop=$('#select_shop').val()

    getEarningReport(district,city,company,shop);
});
var t=$('#example').DataTable( {
		dom: 'Bfrtip',
		buttons: [
			'copy', 'csv', 'excel', 'pdf', 'print'
		]
	} );
	var counter = 1;
        getEarningReport('','','','')
    function getEarningReport(district,city,company,shop) {
   
        console.log(city)
        var url = 'http://209.97.156.170/WeFix/admin/reports/get_earnings?district='+district+'&city='+city+'&company='+company+'&shop='+shop
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
                t.rows().remove().draw();
                var objs = JSON.parse(data);
                var option = '';
                var obj=objs.data1
                console.log(objs)

                for (i = 0; i < obj.length; i++) {

                    t.row.add([obj[i].company_name, obj[i].store_number, obj[i].shop_name, obj[i].product_name, obj[i].date, obj[i].district, obj[i].order_amount]).draw(false);
 
                   counter++;
                }
                $('#example tbody').append(option)
                $('#total_earn').text(objs.total_earn)
            });

    }
    </script>

</body>
</html>
