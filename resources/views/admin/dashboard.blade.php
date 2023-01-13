<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../images/favicon.ico">

    <title>Report - Dashboard</title>
    
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
		<!-- Main content -->
		<section class="content">
			<div class="row align-items-end">
				<div class="col-xl-11 col-12">
					<div class="box bg-primary-light pull-up">
						<div class="box-body p-xl-0">							
							<div class="row align-items-center">
								<div class="col-12 col-lg-3"><img src="{{ asset('images/svg-icon/color-svg/custom-14.svg')}}" alt=""></div>
								<div class="col-12 col-lg-9">
									<h2>Hello Johen, Welcome Back!</h2>
									<p class="text-dark mb-0 fs-16">
										<!-- Your course Overcoming the fear of public speaking was completed by 11 New users this week! -->
									</p>
								</div>
							</div>
						</div>
					</div>
				</div>
				
			</div>
			<div class="row">
				<div class="col-12">														
					<div class="box no-shadow mb-0 bg-transparent">
						<div class="box-header no-border px-0">
							<h4 class="box-title"></h4>	
							<ul class="box-controls pull-right d-md-flex d-none">
							  <li>
								<button class="btn btn-primary-light px-10">View All</button>
							  </li>
							  <li class="dropdown">
								<button class="dropdown-toggle btn btn-primary-light px-10" data-bs-toggle="dropdown" href="#" aria-expanded="false">Most Popular</button>										  
								<div class="dropdown-menu dropdown-menu-end" style="">
								  <a class="dropdown-item active" href="#">Today</a>
								  <a class="dropdown-item" href="#">Yesterday</a>
								  <a class="dropdown-item" href="#">Last week</a>
								  <a class="dropdown-item" href="#">Last month</a>
								</div>
							  </li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-md-6 col-12">
					<div class="box bg-secondary-light pull-up" style="background-image: url(../images/svg-icon/color-svg/st-1.svg); background-position: right bottom; background-repeat: no-repeat;">
						<div class="box-body">	
							<div class="flex-grow-1">	
								
								<h4 class="mt-25 mb-5">Vendors<span style="float:right;font-size:200%;">{{$vendors}}</span></h4>
								
							</div>	
						</div>					
					</div>
				</div>
				<div class="col-xl-3 col-md-6 col-12">
					<div class="box bg-secondary-light pull-up" style="background-image: url(../images/svg-icon/color-svg/st-2.svg); background-position: right bottom; background-repeat: no-repeat;">
						<div class="box-body">	
							<div class="flex-grow-1">	
								
								<h4 class="mt-25 mb-5">Managers<span style="float:right;font-size:200%;">{{$managers}}</span></h4>
							</div>	
						</div>					
					</div>
				</div>
				<div class="col-xl-3 col-md-6 col-12">
					<div class="box bg-secondary-light pull-up" style="background-image: url(../images/svg-icon/color-svg/st-3.svg); background-position: right bottom; background-repeat: no-repeat;">
						<div class="box-body">	
							<div class="flex-grow-1">	
								
								<h4 class="mt-25 mb-5">Owners<span style="float:right;font-size:200%;">{{$customers}}</span></h4>
							</div>	
						</div>					
					</div>
				</div>
				<div class="col-xl-3 col-md-6 col-12">
					<div class="box bg-secondary-light pull-up" style="background-image: url(../images/svg-icon/color-svg/st-4.svg); background-position: right bottom; background-repeat: no-repeat;">
						<div class="box-body">	
							<div class="flex-grow-1">	
						
								<h4 class="mt-25 mb-5">D Managers<span style="float:right;font-size:200%;">{{$districts}}</span></h4>
							</div>	
						</div>					
					</div>
				</div>
			</div>
			<div class="row">
			    <h4 class="box-title">Reports Overview</h4>	
				<div class="col-xl-6 col-12">
					<div class="box">
						<div class="box-body">
							<p class="text-fade">Total Earnings</p>
							<h3 class="mt-0 mb-20">19 <small class="text-success"><i class="fa fa-arrow-up ms-15 me-5"></i> 2 New</small></h3>
							<div id="charts_widget_2_chart"></div>
						</div>
					</div>
				</div>
				
				<div class="col-xl-6 col-12">
					<div class="box">
						<div class="box-header with-border">
							<h4 class="box-title">Last Month Earnings</h4>
							<ul class="box-controls pull-right d-md-flex d-none">
							  <li class="dropdown">
								<button class="dropdown-toggle btn btn-warning-light px-10" data-bs-toggle="dropdown" href="#">Today</button>										  
								<div class="dropdown-menu dropdown-menu-end">
								  <a class="dropdown-item active" href="#">Today</a>
								  <a class="dropdown-item" href="#">Yesterday</a>
								  <a class="dropdown-item" href="#">Last week</a>
								  <a class="dropdown-item" href="#">Last month</a>
								</div>
							  </li>
							</ul>
						</div>
						<div class="box-body">
							<div id="revenue5"></div>
							<div class="d-flex justify-content-center">
								<p class="d-flex align-items-center fw-600 mx-20"><span class="badge badge-xl badge-dot badge-warning me-20"></span> Progress</p>
								<p class="d-flex align-items-center fw-600 mx-20"><span class="badge badge-xl badge-dot badge-primary me-20"></span> Done</p>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			
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
	  <!--&copy; 2021 <a href="https://www.multipurposethemes.com/">Multipurpose Themes</a>. All Rights Reserved.-->
  </footer>


  
</div>
<!-- ./wrapper -->
	

		
	
	
	<!-- Page Content overlay -->
	
	
	<!-- Vendor JS -->
	<script src="{{ asset('js/vendors.min.js') }}"></script>
	<script src="{{ asset('js/pages/chat-popup.js') }}"></script>
    <script src="{{ asset('../assets/icons/feather-icons/feather.min.js') }}"></script>	

	<script src="{{ asset('../assets/vendor_components/apexcharts-bundle/dist/apexcharts.js') }}"></script>
	<script src="{{ asset('../assets/vendor_components/moment/min/moment.min.js') }}"></script>
	<script src="{{ asset('../assets/vendor_components/fullcalendar/fullcalendar.js') }}"></script>
	
	<!-- EduAdmin App -->
	<script src="{{ asset('js/template.js') }}"></script>
	<script src="{{ asset('js/pages/dashboard3.js') }}"></script>
	<script src="{{ asset('js/pages/calendar.js') }}"></script>
	
</body>
</html>
