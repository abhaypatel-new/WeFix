
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/vendors_css.css') }}">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.css" integrity="sha512-8D+M+7Y6jVsEa7RD6Kv/Z7EImSpNpQllgaEIQAtqHcI0H6F4iZknRj0Nx1DCdB+TwBaS+702BGWYC0Ze2hpExQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <link rel="stylesheet" href="{{ asset('css/style_index.css') }}">
    <link rel="stylesheet" href="{{ asset('css/blog.css') }}">
    <link rel="stylesheet" href="{{ asset('css/about.css') }}">
    <link rel="stylesheet" href="{{ asset('css/service.css') }}">
    <link rel="stylesheet" href="{{ asset('css/product_details.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

        <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>

    <title>{{ config('app.name', 'Laravel') }} </title>
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
  top: 29px;
}

.login-btn {
  border-radius: 10px;
  border: none;
  height: 46px;
  width: 116px;
  background-color: #6759ff;
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
  top: 29px;
}
      </style>
</head>

<body>

    <!-- <nav class="navbar navbar-expand-lg">
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
         <ul>
            <li><a href="{{url('/')}}">Home</a> </li>
            <li><a href="{{url('services')}}">Service</a> </li>
            <li> <a href="{{url('about-us')}}">About us</a> </li>
            <li><a href="{{url('blog')}}">Blog</a></li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
    <button class="login-btn"> Login</button> <button class="logout-btn">Register</button>
</div>
    </nav> -->

    <div id="topheader">
    <nav class="navbar navbar-expand-lg bg-white rounded10 shadow-lg">
  <a class="navbar-brand" href="{{url('/')}}"><a href="{{url('/')}}" title="Image from freeiconspng.com"><img src="https://www.freeiconspng.com/uploads/service-department-wrench-icon-15.png" width="80" alt="service department, wrench icon" /></a></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item ">
        <a class="nav-link active" href="{{url('/')}}">Home</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{url('/services')}}">Service</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{url('/about-us')}}">About Us</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{url('/blog')}}">Blog</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">

@if(auth('owner')->check())
<span style="margin-left: 60px;position: absolute;"> <img herf="#" src="{{ asset('images') }}/image/Notification.png" alt="" width="40" height="40"></span>
<div class="dropdown" id="user-dropdown" >
  <input type="hidden" value="{{auth('owner')->user()->roleid}}" id="ownerid">
  <input type="hidden" value="{{auth('owner')->user()->id}}" id="owner_id">
  <button class="btn-nav-link-front btn-primary dropdown-toggle" style="margin: left 100px;"  type="button" data-toggle="dropdown">Hello {{auth('owner')->user()->first_name}}
  <span class="caret"></span></button>
  <ul class="dropdown-menu" id="expend-dn">

    <li><a href="{{ url('owner/dashboard') }}">Dashboard</a></li>
    <li><a href="{{ url('owner/logout') }}">Logout</a></li>
  </ul>
</div>
<div class="profile-card-div hidden">
<ul class="drop-ul" >

    <li><a href="{{ url('owner/dashboard') }}">Dashboard</a></li>
    <li><a href="{{ url('owner/logout') }}">Logout</a></li>
  </ul>
</div>
                        @else
                        <!-- <a class="btn btn-outline-success my-2 my-sm-0" href="{{url('owner')}}">Login</a><a class="btn btn-outline-success my-2 my-sm-0" href="#">Register</a> -->
                        <a class="login-btn" href="#popup1">Sign In</a>

@endif

    </form>
  </div>
</nav>
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

											<input type="text" class="form-control ps-15 bg-transparent" placeholder="Username" name="email">
										</div>
									</div>
									<div class="form-group">
										<div class="input-group mb-3">

											<input type="password" class="form-control ps-15 bg-transparent" placeholder="Password" name="password">
										</div>
									</div>

										  <div class="checkbox d-flex"  >
											<input type="checkbox" id="basic_checkbox_1" >
											<label for="basic_checkbox_1" style="color:black">Remember Me</label>
                      <div class="fog-pwd text-end">
											<a href="javascript:void(0)" class="hover-warning"><i class="ion ion-locked"></i> Forgot pwd?</a><br>
										  </div>
										  </div>
										</div>
										<!-- /.col -->


										</div>
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

            <!-- <div class="content">
              <div class="login-input">
                <h2>Sign Up</h2>
                <h5>Welcome back!</h5>

                <h6>Full Name</h6>
                <input type="text">
                <h6>Mobile Number</h6>
                <input type="text">

                <h6>Email</h6>
                <input type="text">
                <h6>Password</h6>
                <input type="text">
              </div>
              <button>Sing Up</button>
              <p style="margin-top: 20px;">Already have an account? <a href="">SIgn In</a></p>

            </div> -->
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js" integrity="sha512-zlWWyZq71UMApAjih4WkaRpikgY9Bz1oXIW5G0fED4vk14JjGlQ1UmkGM392jEULP8jbNMiwLWdM8Z87Hu88Fw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/12.3.1/classic/ckeditor.js"></script>
<script>
   let card = document.querySelector(".profile-card-div"); //declearing profile card element
let displayPicture = document.querySelector(".btn-nav-link-front"); //
displayPicture.addEventListener("click", function () {
  //on click on profile picture toggle hidden class from css
  card.classList.toggle("hidden");
  // card2.classList.add("hidden");
});
    $(document).ready(function() {

      window.addEventListener("load", (e)=>{

        var myEditor;
    ClassicEditor.create( document.querySelector( '#editor' ) )
    .then( editor => {
      editor.model.document.on('change:data', () => {
        e.value = editor.getData();
        $("#description").val(e.value);
      });

    } )
    .catch( error => {
        console.error( error );
    } );
});
function showpanel() {

    $(".ck-editor__editable_inline").css("height","145px");
 }

 // use setTimeout() to execute
 setTimeout(showpanel, 1000)
});
  </script>
