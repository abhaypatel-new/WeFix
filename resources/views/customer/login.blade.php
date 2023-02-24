<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../images/favicon.ico">
    
     <title>{{ config('app.name', 'Laravel') }} - Owners Login</title>

	<!-- Vendors Style-->
	<link rel="stylesheet" href="{{ asset('css/vendors_css.css') }}">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<!-- Style-->
	<link rel="stylesheet" href="{{ asset('css/style.css') }}">
	<link rel="stylesheet" href="{{ asset('css/skin_color.css') }}">
	<style>
      .register-btn {
  border-radius: 10px;
  border: none;
  height: 46px;
  width: 116px;
  background-color:#6759ff;
  border: 2px solid #6759ff;
  color: white;
  position: absolute;
  right: 40px;
  display: flex;
  align-items: center;
  justify-content: center;
  text-decoration: none;
  font-family: "Poppins" sans-serif;
  font-weight: 700;
  font-size: 16px;
}

.login-btn {
  border-radius: 10px;
  border: none;
  height: 46px;
  width: 116px;
  background-color: white;
  border: 2px solid #6759ff;
  color: #6759ff;
  position: absolute;
  right: 170px;
  display: flex;
  align-items: center;
  justify-content: center;
  text-decoration: none;
  font-family: "Poppins" sans-serif;
  font-weight: 700;
  font-size: 16px;
}
      </style>
</head>
<div id="topheader1" >
    <nav class="navbar navbar-expand-lg bg-white rounded10 shadow-lg" style="
    height: 80px;>

  <a class="navbar-brand" href="{{url('/')}}"><a href="{{url('/')}}" title="WeFix"><img src="https://www.freeiconspng.com/uploads/service-department-wrench-icon-15.png" width="40" alt="service department, wrench icon" /></a></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0 ">
      <li class="nav-item">
        <a class="nav-link" href="{{url('/')}}">Home</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{url('services')}}">Service</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{url('about-us')}}">About Us</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{url('blog')}}">Blog</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">

@if(auth('owner')->check())
<div class="dropdown" id="user-dropdown">
  <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Hello {{auth('owner')->user()->first_name}}
  <span class="caret"></span></button>
  <ul class="dropdown-menu" id="expend-dn">
    <li><a href="#">Profile</a></li>
    <li><a href="{{ url('owner/dashboard') }}">Dashboard</a></li>
    <li><a href="{{ url('owner/logout') }}">Logout</a></li>
  </ul>
</div>

                        @else
                        <a class="login-btn" href="#popup1">Sing In</a>
					
@endif

    </form>
  </div>

</nav>
</div>
<!-- popup -->
<div id="popup1" class="overlay">
        <div class="popup">

            <a class="close" href="#">&times;</a>
            <div class="content">
                <div class="login-input">
                    <h2>Sign In</h2>
                    <h5>Welcome back!</h5>
                    <div class="p-16">
								<form action="{{ route('owner.signin')}}" method="post">
                                    @csrf

									<div class="form-group">
										<div class="input-group mb-3">
											<span class="input-group-text bg-transparent"><i class="ti-user"></i></span>
											<input type="text" class="form-control ps-15 bg-transparent" placeholder="Username" name="email">
										</div>
									</div>
									<div class="form-group">
										<div class="input-group mb-3">
											<span class="input-group-text  bg-transparent"><i class="ti-lock"></i></span>
											<input type="password" class="form-control ps-15 bg-transparent" placeholder="Password" name="password">
										</div>
									</div>
									  <div class="row">
										<div class="col-6">
										  <div class="checkbox">
											<input type="checkbox" id="basic_checkbox_1" >
											<label for="basic_checkbox_1">Remember Me</label>
										  </div>
										</div>
										<!-- /.col -->
										<!-- <div class="col-6">
										 <div class="fog-pwd text-end">
											<a href="javascript:void(0)" class="hover-warning"><i class="ion ion-locked"></i> Forgot pwd?</a><br>
										  </div>
										</div> -->
										<!-- /.col -->
										<div class="col-12 text-center">
										 <button type="submit"  class="btn btn-danger mt-10" >SIGN IN</button>
										</div>
										<!-- /.col -->
									  </div>
								</form>

							</div>
						</div>
            </div>

         
        </div>
    </div>
    <!-- popup end -->



<body class="hold-transition theme-primary bg-img" style="background-image: url(../images/auth-bg/bg-1.jpg)">


  <div id="app" class="container py-2">
    <div>
     
    </div>
    <div class="py-2">
        <div class="modal" id="myModal">
            <div class="modal-dialog mt-150">
                <div class="modal-content" style="border-radius: 5px;">
                    <div class="modal-header">
                        <h5 class="modal-title">Owner Login</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <div class="content">
                <div class="login-input">
                    <h2>Sign In</h2>
                    <h5>Welcome back!</h5>
                    <div class="p-16">
								<form action="{{ route('owner.signin')}}" method="post">
                                    @csrf

									<div class="form-group">
										<div class="input-group mb-3">
											<span class="input-group-text bg-transparent"><i class="ti-user"></i></span>
											<input type="text" class="form-control ps-15 bg-transparent" placeholder="Username" name="email">
										</div>
									</div>
									<div class="form-group">
										<div class="input-group mb-3">
											<span class="input-group-text  bg-transparent"><i class="ti-lock"></i></span>
											<input type="password" class="form-control ps-15 bg-transparent" placeholder="Password" name="password">
										</div>
									</div>
									  <div class="row">
										<div class="col-6">
										  <div class="checkbox">
											<input type="checkbox" id="basic_checkbox_1" >
											<label for="basic_checkbox_1">Remember Me</label>
										  </div>
										</div>
										<!-- /.col -->
										<!-- <div class="col-6">
										 <div class="fog-pwd text-end">
											<a href="javascript:void(0)" class="hover-warning"><i class="ion ion-locked"></i> Forgot pwd?</a><br>
										  </div>
										</div> -->
										<!-- /.col -->
										<div class="col-12 text-center">
										 <button type="submit"  class="btn btn-danger mt-10" >SIGN IN</button>
										</div>
										<!-- /.col -->
									  </div>
								</form>

							</div>
						</div>
                    </div>
                    <!-- <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</div>

	<!-- Vendor JS -->
	<script src="{{asset('js/vendors.min.js') }}"></script>
	<script src="{{asset('js/pages/chat-popup.js') }}"></script>
    <script src="{{asset('assets/icons/feather-icons/feather.min.js') }}"></script>

</body>
<script type="text/javascript">
    $(window).on('load', function() {
      var myModal = new bootstrap.Modal(document.getElementById('myModal'), {})
myModal.toggle()
        // $('#myModal').modal('toggle');
    });
</script>
</html>
