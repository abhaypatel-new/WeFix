<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../images/favicon.ico">

    <title>View Product </title>
  
	<!-- Vendors Style-->
	<link rel="stylesheet" href="{{ asset('css/vendors_css.css') }}">
	  
	<!-- Style-->  
	<link rel="stylesheet" href="{{ asset('css/style.css') }}">
	<link rel="stylesheet" href="{{ asset('css/skin_color.css') }}">	

</head>
<style>


</style>
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
					<h3 class="page-title">Details</h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item" aria-current="page">e-Commerce</li>
								<li class="breadcrumb-item active" aria-current="page">Details</li>
							</ol>
						</nav>
					</div>
				</div>
				
			</div>
		</div>

		<!-- Main content -->
		<section class="content">

		  <div class="row">
			<div class="col-lg-12">
				<div class="box">
					<div class="box-body">
						<div class="row">
							<div class="col-md-4 col-sm-6">
								<div class="box box-body b-1 text-center no-shadow">
									<img src="{{ asset('images/product/product-6.png') }}" id="product-image" class="img-fluid" alt="" />
								</div>
								<div class="pro-photos">
									<div class="photos-item item-active">
										<img src="{{ asset('images/product/product-6.png') }}" alt="" >
									</div>
									<div class="photos-item">
										<img src="{{ asset('images/product/product-7.png') }}" alt="" >
									</div>
									<div class="photos-item">
										<img src="{{ asset('images/product/product-8.png') }}" alt="" >
									</div>
									<div class="photos-item">
										<img src="{{ asset('images/product/product-9.png') }}" alt="" >
									</div>
								</div>
								<div class="clear"></div>
									<div class="qrdiv">
								    <img id="myImg" src="{{ asset('images/qrcode.png') }}" style="display:none;" alt="Qr Code">
                              
								<span>  <button class="btn btn-primary qrbutton" style="margin-left:30%">Generate QRCode</button> </span>
								</div>
							</div>
							
							<div class="col-md-8 col-sm-6">
								<h2 class="box-title mt-0">Product Title</h2>
						
								<div class="list-inline">
									<a class="text-warning"><i class="mdi mdi-star"></i></a>
									<a class="text-warning"><i class="mdi mdi-star"></i></a>
									<a class="text-warning"><i class="mdi mdi-star"></i></a>
									<a class="text-warning"><i class="mdi mdi-star"></i></a>
									<a class="text-warning"><i class="mdi mdi-star"></i></a>
								</div>
								<h1 class="pro-price mb-0 mt-20">&#36;270
										<span class="old-price">&#36;540</span>
										<span class="text-danger">50% off</span>
									</h1>
								<hr>
								<p>Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. but the majority have suffered alteration in some form, by injected humour</p>
								<div class="row">
									<div class="col-sm-12">
										<h6>Color</h6>
										<div class="input-group">
											<ul class="icolors">
												<li class="bg-danger rounded-circle"></li>
												<li class="bg-info rounded-circle"></li>
												<li class="bg-primary rounded-circle active"></li>
											</ul>
										</div>
										<h6 class="mt-20">Available Size</h6>
										<p class="mb-0">
											<span class="badge badge-pill badge-lg badge-secondary-light">S</span>
											<span class="badge badge-pill badge-lg badge-secondary-light">M</span>
											<span class="badge badge-pill badge-lg badge-secondary-light">L</span>
										</p>
									</div>
								</div>
								<hr>
								<!--<div class="gap-items">-->
								<!--	<button class="btn btn-success"><i class="mdi mdi-shopping"></i> Buy Now!</button>-->
								<!--	<button class="btn btn-primary"><i class="mdi mdi-cart-plus"></i> Add To Cart</button>-->
								<!--	<button class="btn btn-info"><i class="mdi mdi-compare"></i> Compare</button>-->
								<!--	<button class="btn btn-danger"><i class="mdi mdi-heart"></i> Wishlist</button>-->
								<!--</div>-->
								<h4 class="box-title mt-20">Key Highlights</h4>
								<ul class="list-icons list-unstyled">
									<li><i class="fa fa-check text-danger me-3"></i> Party Wear</li>
									<li><i class="fa fa-check text-danger me-3"></i> Nam libero tempore, cum soluta nobis est</li>
									<li><i class="fa fa-check text-danger me-3"></i> Omnis voluptas as placeat facere possimus omnis voluptas.</li>
								</ul>
							</div>

                            <div class="container mt-4">
        <div class="card">
            <div class="card-header">
                <h2>Simple QR Code</h2>
            </div>
            <div class="card-body">
                {!! QrCode::size(300)->generate('ItSolutionStuff.com') !!}
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h2>Color QR Code</h2>
            </div>
            <div class="card-body">
                {!! QrCode::size(300)->backgroundColor(255,90,0)->generate('RemoteStack') !!}
            </div>
        </div>
    </div>

							<div class="col-lg-12 col-md-12 col-sm-12">
								<h4 class="box-title mt-40">General Info</h4>
								<div class="table-responsive">
									<table class="table">
										<tbody>
											<tr>
												<td width="390">Brand</td>
												<td> Brand Name </td>
											</tr>
											<tr>
												<td>Delivery Condition</td>
												<td> Lorem Ipsum </td>
											</tr>
											<tr>
												<td>Type</td>
												<td> Party Wear </td>
											</tr>
											<tr>
												<td>Style</td>
												<td> Modern </td>
											</tr>
											<tr>
												<td>Product Number</td>
												<td> FG1548952 </td>
											</tr>

										</tbody>
									</table>
								</div>
							</div>
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
	  &copy; 2021 <a href="https://www.multipurposethemes.com/">Multipurpose Themes</a>. All Rights Reserved.
  </footer>

  
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
	
	<script src="{{ asset('js/pages/ecommerce_details.js') }}"></script>
	<script>
	    $('.qrbutton').click(function() {
	     
	        $('#myImg').show();
	    $('.qrbutton').hide();
	    });
	</script>


	

</body>
</html>
