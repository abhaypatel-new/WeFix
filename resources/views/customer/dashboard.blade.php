<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>WeFix</title>
  <link rel="stylesheet" href="{{ asset('css/style_index.css') }}">
  <!-- <link rel="stylesheet" href="{{ asset('css/vendors_css.css') }}"> -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <!-- Style-->
  <!-- <link rel="stylesheet" href="{{ asset('css/style.css') }}"> -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.css" integrity="sha512-8D+M+7Y6jVsEa7RD6Kv/Z7EImSpNpQllgaEIQAtqHcI0H6F4iZknRj0Nx1DCdB+TwBaS+702BGWYC0Ze2hpExQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="{{ asset('css/skin_color.css') }}">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600&display=swap" rel="stylesheet">
  <link href="https://cdn.datatables.net/1.13.3/css/jquery.dataTables.min.css" rel="stylesheet">
  <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
  <style>
   
  
    
    
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600&display=swap');
  </style>
</head>

<body id="dashboard-body">
  <div id="dashboard-header">
    <nav class="navbar navbar-expand-lg">
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
          <span style="margin-left: -50px;position: absolute;"> <img href="#" src="{{ asset('images') }}/image/Notification.png" alt="" width="30" height="30"></span>
          <div class="dropdown" id="user-dropdown">
           <button class="btn-nav-link btn-primary dropdown-toggle"  style="background-color: #6759FF;" type="button" data-toggle="dropdown">Hello {{auth('owner')->user()->first_name}}
               <span class="caret"></span></button>
            <ul class="dropdown-menu drop-menu p-30" id="expend-dn">

              <li><a href="{{ url('owner/dashboard') }}">Dashboard</a></li>
              <li><a href="{{ url('owner/logout') }}">Logout</a></li>
            </ul>
          </div>
          <!-- <div class="profile-card-div hiddens">
<ul class="drop-ul" >
    <li><a href="#">Profile</a></li>
    <li><a href="{{ url('owner/dashboard') }}">Dashboard</a></li>
    <li><a href="{{ url('owner/logout') }}">Logout</a></li>
  </ul>
</div> -->

          @else
          <a class="btn btn-outline-success my-2 my-sm-0" href="{{url('owner')}}">Login</a><a class="btn btn-outline-success my-2 my-sm-0" href="#">Register</a>

          @endif

        </form>
      </div>
    </nav>
  </div>
  @if(auth('owner')->check())
  <input type="hidden" value="{{auth('owner')->user()->roleid}}" id="ownerid">
  @if(auth('owner')->user()->roleid === 4)
  <div class="side-bar">
 
  <button class="Proposal" id="proposal" style="cursor: pointer;">
      <img src="{{ asset('images') }}/image/Proposal.png" alt="">
      <h3 class="Proposal-color">Dashboard</h3>

    </button>


    <div class="Setting" style="cursor: pointer;" id="profile">
      <img src="{{ asset('images') }}/image/settings.png" alt="">
      <h3 class="setting-color">Setting</h3>
      <!-- <img class="dropdown-img" src="./image/dropdown.png" alt=""> -->
    </div>
     <div class="Report" style="cursor: pointer;" id="report">
      <img src="{{ asset('images') }}/image/settings.png" alt="">
      <h3 class="report-color">Report</h3>
      <!-- <img class="dropdown-img" src="./image/dropdown.png" alt=""> -->
    </div>

    <div class="Setting Logout" style="cursor: pointer;">
      <img src="{{ asset('images') }}/image/SignOut.png" alt="">
      <h3><a href="{{ url('owner/logout') }}" class="logout-color hide-effect">Log Out</a></h3>
      <!-- <img class="dropdown-img" src="./image/dropdown.png" alt=""> -->
    </div>

  </div>
  <div class="card" id="show-notification">
    <h5 class="card-header">Notification</h5>
    <div class="d-flex justify-content-center">
      <div class="spinner-border" role="status" id="loading">
        <span class="sr-only">Loading...</span>
      </div>
    </div>
    <div class="search-bar m-0 mb-4">
      <input placeholder="Search Notification" type="Search" id="search-notification" class="text-dark">
      <!-- <h5>Search Proposal</h5> -->
      <button>
        <img src="{{ asset('images') }}/image/Search-icon.png" alt="">
      </button>
    </div>
    <div class="card pt-3" id="show-data">
    </div>

  </div>
  <div class="card" id="show-proposal">
    <h5 class="card-header">Proposal</h5>
    <div class="d-flex justify-content-center">
      <div class="spinner-border" role="status" id="loading">
        <span class="sr-only">Loading...</span>
      </div>
    </div>
    <div class="card" id="get-proposal">
    </div>
  </div>
   <div class="card m-90" id="show-report">
    <h5 class="card-header">Report</h5>
    >
    <div class="card" id="get-report">
      <table id="example">
    <thead>
        <tr>
            <th>No</th>
            <th>OrderId</th>
            <th>Product</th>
            <th>Date</th>
            <th>Owner</th>
            <th>Vendor</th>
            <th>Amount</th>
            <th>Status</th>
            <th>Action</th>

        </tr>
    </thead>
    <tbody>
      
    </tbody>
  </table>
    </div>
  </div>
  <div class="card m-90 cnf" id="show-confirm">
    <h5 class="card-header">Confirmed Proposal</h5>

    <div class="search-bar m-0 pb-4">
      <input placeholder="Search Confirmed Proposal" type="Search" id="search-confirmed-proposal" class="text-dark">
      <!-- <h5>Search Proposal</h5> -->
      <button>
        <img src="{{ asset('images') }}/image/Search-icon.png" alt="">
      </button>
    </div>
    <div class="card" id="get-confirm">
      <div class="d-flex justify-content-center">
        <div class="spinner-border" role="status" id="loading-c" style="color:khaki;">
          <span class="sr-only">Loading...</span>
        </div>
      </div>
    </div>

  </div>
  <div class="card m-90" id="show-pending">
    <h5 class="card-header">Pending Proposal</h5>

    <div class="search-bar m-0 pb-4">
      <input placeholder="Search Pending Proposal" type="Search" id="search-pending-proposal" class="text-dark">
      <!-- <h5>Search Proposal</h5> -->
      <button>
        <img src="{{ asset('images') }}/image/Search-icon.png" alt="">
      </button>
    </div>
    <div class="card" id="get-pending">
      <div class="d-flex justify-content-center">
        <div class="spinner-border" role="status" id="loading-p" style="color:khaki;">
          <span class="sr-only">Loading...</span>
        </div>
      </div>
    </div>
  </div>
  <div class="card m-90" id="show-history">
    <h5 class="card-header">History</h5>

    <div class="card" id="get-history">
      <div class="d-flex justify-content-center">
        <div class="spinner-border" role="status" id="loading-h">
          <span class="sr-only">Loading...</span>
        </div>
      </div>
    </div>
  </div>
  <div class="card m-90" id="show-profile">
    <h5 class="card-header">Profile Details</h5>

    <div class="card">
      <div class="notifaction-div text-center">

        <div class="title-div" style="
    padding-bottom: 40px;
">
          <div class="list-div-today">
         
        <img src="" height="100" alt="" id="profile-pic2">
            <div class="list-title" style="margin-right: 500px !important;">
              <h6>@if(auth('owner')->user()){{auth('owner')->user()->first_name}}@else User @endif</h6>
              <p>@if(auth('owner')->user()){{auth('owner')->user()->email}}@else User@gmail.com @endif</p>
            </div>



          </div>

        </div>

        <div class="div-list" id="get-profile">
        </div>
        <div id="edit-profile" class="btn btn-success" style="padding: 5px 25px 5px 25px;">Edit</div>
      </div>
    </div>
  </div>
  <div class="cards m-90" id="edit-profile-details">
    <h5 class="card-header">Profile Details</h5>

    <div class="card-body bg-white" id="profile-details">

      <div class="d-flex justify-content-center">
        <div class="spinner-border" role="status" id="loading5">
          <span class="sr-only">Loading...</span>
        </div>
      </div>
      <!-- <div class="notifaction-div"> -->

      <div class="title-div">
        <div class="list-div-today">
          <div class="row">
            <div class="col-sm-4 text-white">
            <!--   <img src="@if(auth('owner')->user()->image != null){{env('PROFILE_URL')}}/{{auth('owner')->user()->image}}@else  {{env('ASSET_URL')}}default-profile.png @endif" height="80" alt="" id="get-upload"> -->
                <img src="" height="80" alt="" id="profile-pic1">
              <input type="file" name="file" id="upload" style="width:90px; margin-left:25px;">
            </div>
            <div class="col-sm-8 mt-5">
              <div class="list-title">
                <h6>@if(auth('owner')->user()){{auth('owner')->user()->first_name}}@else User @endif</h6>
                <p>@if(auth('owner')->user()){{auth('owner')->user()->email}}@else User@gmail.com @endif</p>

              </div>
            </div>

          </div>






        </div>
      </div>

      <div class="div-list" id="update-profile" style="margin-top: 35px;">
      </div>
      <button id="save-profile" class="btn btn-success">Save</button>
      <!-- </div> -->

    </div>

  </div>

  <div style="width: 80%;" class="main-right" id="main-tab">
    <div style="display: flex; ">
      <div class="Welcome-text">
        <h1>Welcome, @if(auth('owner')->user()){{auth('owner')->user()->first_name}}@else User @endif</h1>
        <h4>{{\Carbon\Carbon::now()->format('M, d Y');}}</h4>
      </div>
      <div class="search-bar pb-4">
        <input placeholder="Search Proposal" type="Search Proposa" id="search-proposal" class="text-dark">
        <!-- <h5>Search Proposal</h5> -->
        <button>
          <img src="{{ asset('images') }}/image/Search-icon.png" alt="">
        </button>
      </div>
      <div class="profile">
        <img src="{{ asset('images') }}/image/Profile.png" height="100" alt="" id="profile-pic3" class="rounded-circle bg-white">
       
      </div>
    </div>
    <div class="Proposal-heding">
      <img src="{{ asset('images') }}/image/tag.png" alt="">
      <h1>Dashboard</h1>
    </div>

    <div class="card">
    <div class="row g-0 ml-0 mr-0">
    <div class="col-md-2" >
    <div class="card-body">
    <div class="main-Button" id="confirm" style="cursor: pointer;pointer;">
        <h5 style="color: #6759FF;">Confirmed</h5>
       </div>
</div>
    </div>
    <div class="col-md-2">
       <div class="card-body">
       <div class="main-Button-1" id="pending" style="cursor: pointer;">
        <h5>Pending</h5>
       </div>
</div>
    </div>
    <div class="col-md-2">
    <div class="card-body">
    <div class="main-Button-2"  style="cursor: pointer;pointer;" id="history">
        <h5 style="color: #6759FF">History</h5>
       </div>
</div>
    </div>
    <div class="col-md-2">

       <div class="card-body">
       <div class="main-Button-3" id="Workorder" style="cursor: pointer;pointer;">
        <h5 style="color: #6759FF;">Work Order</h5>


</div>
    </div>
  </div>
  </div>
  <hr class="mt-0">
    <div class="Proposal-card" id="Proposal-card">
    <div class="d-flex justify-content-center">
      <div class="spinner-border" role="status" id="loading-mh">
        <span class="sr-only">Loading...</span>
      </div>
    </div>
</div>



  </div>

  </div>
  @else
  <div class="side-bar">
    <!-- <div class="Dashboard" id="dashboard" style="cursor: pointer;">
      <img src="{{ asset('images') }}/image/Notification.png" alt="">
      <h3 class="notification-color">Dashboard</h3>
    </div> -->
  <button class="Proposal" id="proposal" style="cursor: pointer;">
      <img src="{{ asset('images') }}/image/Proposal.png" alt="">
      <h3 class="Proposal-color">Dashboard</h3>

    </button>


    <div class="Setting" style="cursor: pointer;" id="profile">
      <img src="{{ asset('images') }}/image/settings.png" alt="">
      <h3 class="setting-color">Setting</h3>
      <!-- <img class="dropdown-img" src="./image/dropdown.png" alt=""> -->
    </div>
     <div class="Report" style="cursor: pointer;" id="report">
      <img src="{{ asset('images') }}/image/settings.png" alt="">
      <h3 class="report-color">Report</h3>
      <!-- <img class="dropdown-img" src="./image/dropdown.png" alt=""> -->
    </div>
    <div class="Setting Logout" style="cursor: pointer;">
      <img src="{{ asset('images') }}/image/SignOut.png" alt="">
      <h3><a href="{{ url('owner/logout') }}" class="logout-color">Log Out</a></h3>
      <!-- <img class="dropdown-img" src="./image/dropdown.png" alt=""> -->
    </div>

  </div>
  <div class="card" id="show-notification">
    <h5 class="card-header">Notification</h5>
    <div class="d-flex justify-content-center">
      <div class="spinner-border" role="status" id="loading">
        <span class="sr-only">Loading...</span>
      </div>
    </div>
    <div class="search-bar m-0 mb-4">
      <input placeholder="Search Notification" type="Search" id="search-notification" class="text-dark">
      <!-- <h5>Search Proposal</h5> -->
      <button>
        <img src="{{ asset('images') }}/image/Search-icon.png" alt="">
      </button>
    </div>
    <div class="card pt-3" id="show-data">
    </div>

  </div>
  <div class="card" id="show-proposal">
    <h5 class="card-header">Proposal</h5>
    <div class="d-flex justify-content-center">
      <div class="spinner-border" role="status" id="loading">
        <span class="sr-only">Loading...</span>
      </div>
    </div>
    <div class="card" id="get-proposal">
    </div>
  </div>
  <div class="card m-90" id="show-report">
    <h5 class="card-header">Report</h5>
    >
    <div class="card" id="get-report">
      <table id="example">
    <thead>
        <tr>
            <th>No</th>
            <th>OrderId</th>
            <th>Product</th>
            <th>Date</th>
            <th>Owner</th>
            <th>Vendor</th>
            <th>Amount</th>
            <th>Status</th>
            <th>Action</th>

        </tr>
    </thead>
    <tbody>
      
    </tbody>
  </table>
    </div>
  </div>
  <div class="card m-90 cnf" id="show-confirm">
    <h5 class="card-header">Confirmed Proposal</h5>

    <div class="search-bar m-0 pb-4">
      <input placeholder="Search Confirmed Proposal" type="Search" id="search-confirmed-proposal" class="text-dark">
      <!-- <h5>Search Proposal</h5> -->
      <button>
        <img src="{{ asset('images') }}/image/Search-icon.png" alt="">
      </button>
    </div>
    <div class="card" id="get-confirm">
      <div class="d-flex justify-content-center">
        <div class="spinner-border" role="status" id="loading-c" style="color:khaki;">
          <span class="sr-only">Loading...</span>
        </div>
      </div>
    </div>

  </div>
  <div class="card m-90" id="show-pending">
    <h5 class="card-header">Pending Proposal</h5>

    <div class="search-bar m-0 pb-4">
      <input placeholder="Search Pending Proposal" type="Search" id="search-pending-proposal" class="text-dark">
      <!-- <h5>Search Proposal</h5> -->
      <button>
        <img src="{{ asset('images') }}/image/Search-icon.png" alt="">
      </button>
    </div>
    <div class="card" id="get-pending">
      <div class="d-flex justify-content-center">
        <div class="spinner-border" role="status" id="loading-p" style="color:khaki;">
          <span class="sr-only">Loading...</span>
        </div>
      </div>
    </div>
  </div>
  <div class="card m-90" id="show-history">
    <h5 class="card-header">History</h5>

    <div class="card" id="get-history">
      <div class="d-flex justify-content-center">
        <div class="spinner-border" role="status" id="loading-h">
          <span class="sr-only">Loading...</span>
        </div>
      </div>
    </div>
  </div>
  <div class="card m-90" id="show-profile">
    <h5 class="card-header">Profile Details</h5>

    <div class="card">
      <div class="notifaction-div text-center">

        <div class="title-div" style="
    padding-bottom: 40px;">
          <div class="list-div-today">
            <img src="@if(auth('owner')->user()->image != null){{env('PROFILE_URL')}}/{{auth('owner')->user()->image}}@else  {{env('ASSET_URL')}}default-profile.png @endif" height="100" alt="" id="profile-pic1">

            <div class="list-title" style="margin-right: 500px !important;">
              <h6>@if(auth('owner')->user()){{auth('owner')->user()->first_name}}@else User @endif</h6>
              <p>@if(auth('owner')->user()){{auth('owner')->user()->email}}@else User@gmail.com @endif</p>
            </div>
          </div>
        </div>
        <div class="div-list" id="get-profile">
        </div>
        <div id="edit-profile" class="btn btn-success" style="padding: 5px 25px 5px 25px;">Edit</div>
      </div>
    </div>
  </div>
  <div class="cards m-90" id="edit-profile-details">
    <h5 class="card-header">Profile Details</h5>

    <div class="card-body bg-white" id="profile-details">

      <div class="d-flex justify-content-center">
        <div class="spinner-border" role="status" id="loading5">
          <span class="sr-only">Loading...</span>
        </div>
      </div>
      <!-- <div class="notifaction-div"> -->

      <div class="title-div">
        <div class="list-div-today">
          <div class="row">
            <div class="col-sm-4 text-white">
             <!--  <img src="@if(auth('owner')->user()->image != null){{env('PROFILE_URL')}}/{{auth('owner')->user()->image}}@else  {{env('ASSET_URL')}}default-profile.png @endif" height="80" alt="" id="get-upload"> -->
                <img src="" height="80" alt="" id="get-upload">
              <input type="file" name="file" id="upload" style="width:90px; margin-left:25px;">
            </div>
            <div class="col-sm-8 mt-5">
              <div class="list-title">
                <h6>@if(auth('owner')->user()){{auth('owner')->user()->first_name}}@else User @endif</h6>
                <p>@if(auth('owner')->user()){{auth('owner')->user()->email}}@else User@gmail.com @endif</p>

              </div>
            </div>

          </div>






        </div>
      </div>

      <div class="div-list" id="update-profile" style="margin-top: 35px;">
      </div>
      <button id="save-profile" class="btn btn-success">Save</button>
      <!-- </div> -->

    </div>

  </div>

  <div style="width: 80%;" class="main-right" id="main-tab">
    <div style="display: flex; ">
      <div class="Welcome-text">
        <h1>Welcome, @if(auth('owner')->user()){{auth('owner')->user()->first_name}}@else User @endif</h1>
        <h4>{{\Carbon\Carbon::now()->format('M, d Y');}}</h4>
      </div>
      <div class="search-bar pb-4">
        <input placeholder="Search Proposal" type="Search Proposa" id="search-proposal" class="text-dark">
        <!-- <h5>Search Proposal</h5> -->
        <button>
          <img src="{{ asset('images') }}/image/Search-icon.png" alt="">
        </button>
      </div>
      <div class="profile">
        <img src="@if(auth('owner')->user()->image != null){{env('PROFILE_URL')}}/{{auth('owner')->user()->image}}@else  {{env('ASSET_URL')}}default-profile.png @endif" height="100" alt="" id="get-upload1" class="rounded-circle bg-white">
        <!-- <img src="{{ asset('images') }}/image/Profile.png" alt=""> -->
      </div>
    </div>
    <div class="Proposal-heding">
      <img src="{{ asset('images') }}/image/tag.png" alt="">
      <h1>Dashboard</h1>
    </div>

    <div class="card">
    <div class="row g-0 ml-0 mr-0 ">
    <div class="col-md-5" style="text-align: end;">
    <div class="card-body">
    <div class="btn-tab" id="confirm" style="cursor: pointer;">
        <h5 class="card-title">Confirmed</h5>
       </div>
</div>
    </div>
    <div class="col-md-2">
       <div class="card-body">
       <div class="Pending btn btn-primary" id="pending" style="cursor: pointer;">
        <h5 class="card-title" style="padding-left: 20px;padding-right: 20px;">Pending</h5>
       </div>
</div>
    </div>
    <div class="col-md-5">
       <div class="card-body">
       <div class="History btn btn-primary" style="cursor: pointer;" id="history">
        <h5 class="card-title" style="padding-left: 20px;padding-right: 20px;">History</h5>
       </div>
</div>
    </div>
    <!-- <div class="col-md-4">
       <div class="card-body">
       <div class="workorder" id="Workorder" style="cursor: pointer;">
        <h5 class="card-title btn btn-primary ">Work Order</h5>
       </div>

</div>
    </div>
  </div> -->
  </div>
  <hr class="mt-0">
    <div class="Proposal-card" id="Proposal-card">
    <div class="d-flex justify-content-center">
      <div class="spinner-border" role="status" id="loading-mh">
        <span class="sr-only">Loading...</span>
      </div>
    </div>


  </div>
  @endif
  @endif
</body>
<!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script> -->


<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  </script>
  <script src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js" integrity="sha512-zlWWyZq71UMApAjih4WkaRpikgY9Bz1oXIW5G0fED4vk14JjGlQ1UmkGM392jEULP8jbNMiwLWdM8Z87Hu88Fw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
 
<script>
  function getNotification() {
    let id = '<?php echo auth('owner')->user()->id; ?>';
    $("#main-tab").hide();
    $("#show-notification").show();
    $("#show-history").hide();
    $("#show-confirm").hide();
    $("#show-pending").hide();
    $("#show-profile").hide();
    $("#show-report").hide();
    var assetUrl = "{{env('ASSET_URL')}}";

    var appUrl = "{{env('APP_URL')}}";
    const api_url =
      appUrl + "/owner/get_all_notifications?owner_id=" + id;

    // Defining async function
    async function getapi(url) {

      // Storing response
      const response = await fetch(url);

      // Storing data in form of JSON
      var data = await response.json();
      console.log(data);
      if (response) {
        hideloader();
      }
      show(data);
    }
    // Calling that async function
    getapi(api_url);

    function hideloader() {
      document.getElementById('loading').style.display = 'none';
    }

    function show(data) {

      let tab = '';
      let count = 0;
      // Loop to access all rows
      if (data.status == true) {
        console.log(data.status);
        for (let r of data.data) {
          let img = r.image == null ? assetUrl + "product-dummy.png" : r.image;
          tab += ` <div class="card mb-3 pl-5" style="max-width: 540px;">
  <div class="row g-0">
    <div class="col-md-4">
    <input type="hidden" value="${r.id}" id="not-id">
      <img src="${img}" class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col-md-6">

      <div class="card-body">
        <h5 class="card-title">${r.vendor_name}</h5>
        <p class="card-text">${r.message}</p>

      </div>
    </div>
    <div class="col-md-2 pt-4">
    <div id="del-not" class="btn btn-success" onclick="del()"><i class="fa fa-trash" aria-hidden="true"></i></div>
    </div>

  </div>

</div>`;
          document.getElementById("show-data").innerHTML = tab;
        }
      } else {
        console.log(data.message);
        tab += ` <div class="vendor-name-history" style="
    text-align: center;><div class="images-div"></div>

<p><img src="${assetUrl}nodata.png" alt="" width="200" class="float-start rounded-circle" id="">${data.message}
</p>
</div>`;
        document.getElementById("show-data").innerHTML = tab;
      }
    }
  }
  /*--------Delete-Report-Start---------*/

  function deleteReport(id)
  {
      var assetUrl = "{{env('ASSET_URL')}}";

    var appUrl = "{{env('APP_URL')}}";
   
    const api_url =
      '{!! route("delete.report")!!}?id=' + id;

    // Defining async function
    async function getapi(url, options) {

      // Storing response
      const response = await fetch(url);

      // Storing data in form of JSON
      var data = await response.json();
      console.log(data);
      if (response) {
        hideloader();
      }
      show(data);
    }
    // Calling that async function
    getapi(api_url);

    function hideloader() {
      document.getElementById('loading').style.display = 'none';
    }

    function show(data) {

      let tab = '';
      let count = 0;
      // Loop to access all rows
      if (data.status == 'true') {


        $.toast({
          heading: 'Alert',
          text: 'Record has been deleted',
          icon: 'info',
          loader: true, // Change it to false to disable loader
          loaderBg: '#9EC600' // To change the background
        })
       $('#example').DataTable().ajax.reload();
        $("#show-report").load();
        $("#show-report").show();
      } else {
        alert("failed")
        $("#show-report").show();
      }
    }
  }
  /*--------Delete-Report-End---------*/
  function del() {

    $("#main-tab").hide();
    $("#show-notification").show();
    $("#show-history").hide();
    $("#show-proposal").hide();
    $("#show-confirm").hide();
    $("#show-pending").hide();
    $("#show-profile").hide();
    let del = $("#not-id").val();
    var assetUrl = "{{env('ASSET_URL')}}";

    var appUrl = "{{env('APP_URL')}}";
    let options = {
      method: 'DELETE',
    }
    const api_url =
      appUrl + "/owner/removed_notification_History/" + del;

    // Defining async function
    async function getapi(url, options) {

      // Storing response
      const response = await fetch(url, options);

      // Storing data in form of JSON
      var data = await response.json();
      console.log(data);
      if (response) {
        hideloader();
      }
      show(data);
    }
    // Calling that async function
    getapi(api_url, options);

    function hideloader() {
      document.getElementById('loading').style.display = 'none';
    }

    function show(data) {

      let tab = '';
      let count = 0;
      // Loop to access all rows
      if (data.status == true) {


        $.toast({
          heading: 'Alert',
          text: 'Data has been deleted',
          icon: 'info',
          loader: true, // Change it to false to disable loader
          loaderBg: '#9EC600' // To change the background
        })
        getNotification();
        $("#show-notification").load();
        $("#show-notification").show();
      } else {
        alert("failed")
        $("#show-notification").show();
      }
    }
  }

  let card = document.querySelector(".proposal-card-div"); //declearing profile card element
  let displayPicture = document.querySelector(".Proposal"); //
  displayPicture.addEventListener("click", function() {
    //on click on profile picture toggle hidden class from css
    card.classList.toggle("hidden");
    // card2.classList.add("hidden");
  });
  $(document).ready(function() {
    $("#show-report").hide();
     $("#pending h5").css("color","white");
    function readURL(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
          $('#get-upload').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
      }
    }
    $("#upload").change(function() {
      readURL(this);
    });
    let id = '<?php echo auth('owner')->user()->id; ?>';

    $("#main-tab").show();
    $("#show-history").hide();
    $("#show-notification").hide();
    $("#show-proposal").hide();
    $("#show-confirm").hide();
    $("#show-pending").hide();
    $("#show-profile").hide();
    $("#edit-profile-details").hide();

    /*get default proposal*/
    $("#proposal").click(function() {
      if($('.proposal-card-div').css('display') == 'none')
{
  $(".proposal-card-div").css("display", "block");
}else{
  $(".proposal-card-div").css("display", "none");
}

      $(".Proposal").css("background-color", "#e4e6ef");
      $(".Proposal-color").css("color", "#6759ff");
      $(".notification-color").css("color", "#000");
      $(".Notification").css("background-color", "#ffffff");
      $(".setting-color").css("color", "#000");
      $(".Setting").css("background-color", "#ffffff");
      $(".logout-color").css("color", "#000");
      $(".Logout").css("background-color", "#ffffff");
      $("#main-tab").show();
      $("#edit-profile-details").hide();
      $("#show-notification").hide();
      $("#show-history").hide();
      $("#show-proposal").hide();
      $("#show-confirm").hide();
      $("#show-pending").hide();
      $("#show-profile").hide();
       $("#show-report").hide();
      var assetUrl = "{{env('ASSET_URL')}}";

      var appUrl = "{{env('APP_URL')}}";

      const api_url =
        appUrl + "/owner/proposal_history?owner_id=" + id + "&search=";

      // Defining async function
      async function getapi(url) {

        // Storing response
        const response = await fetch(url);

        // Storing data in form of JSON
        var data = await response.json();
        console.log(data);
        if (response) {
          hideloader();
        }
        show(data);
      }
      // Calling that async function
      getapi(api_url);

      function hideloader() {
        document.getElementById('loading-mh').style.display = 'none';
      }

      function show(data) {

        let tab = '';
        let count = 0;
        // Loop to access all rows
        if (data.status == true) {
          console.log(data.status);
          for (let r of data.data) {
            let img = r.thumbnail_image == null ? assetUrl + "product-dummy.png" : r.thumbnail_image;
            let vendor = r.mage == null ? assetUrl + "default-profile.png" : r.image;

            tab += `
            <div class="Proposal-card-01 text-center">
<img  src="${img}" class="img-thumbnail rounded-start" alt="..." id="${id}" height="180" width="180">

                <h4>${r.product_name}</h4>
                <p>Code:${r.order_id}</p>
                <ul>
                    <li style="color:#453d3d;display:inline-block;white-space: nowrap;overflow: hidden;text-overflow: ellipsis;max-width: 13ch; color:#008080">${r.product_description}</li>

                </ul>
                <div class="vendor-class">
                    <div class="vendor-name">
                        <div class="Group-img"><img src="${vendor}" width="50"
                           alt="" class="float-start rounded-circle"></div>

                        <h4 class="card-title ml-5">${r.vendor_name}</h4>
                        <h4 class="card-text"><small class="text-muted">${r.schedule}</small></h4>
                        <p>Code: #D-${r.vendor_id}</p>
                    </div>
                </div>
            </div>`;
            document.getElementById("Proposal-card").innerHTML = tab;
          }

        } else {
          console.log(data.message);
          tab += ` <div class="vendor-name-history" style="
text-align: center;><div class="images-div"></div>

<p><img src="${assetUrl}nodata.png" alt="" width="200" class="float-start rounded-circle" id="">${data.message}
</p>
</div>`;
          document.getElementById("Proposal-card").innerHTML = tab;
        }
      }
    });
    $("#history").click(function() {

      $("#history").removeClass("main-Button-2");
      $("#history").addClass("main-Button-1");
      $("#pending").removeClass("main-Button-1");
      $("#pending").addClass("main-Button-2");
      $("#confirm").removeClass("main-Button-1");
      $("#confirm").addClass("main-Button");
      $("#Workorder").removeClass("main-Button-1");
      $("#Workorder").addClass("main-Button-3");
       $("#pending h5").css("color", "#6759FF");
       $("#Workorder h5").css("color", "#6759FF");
       $("#confirm h5").css("color", "#6759FF");
       $("#history h5").css("color", "white");
      // $(".setting-color").css("color", "#000");
      // $(".Proposal").css("background-color", "#e4e6ef");
      // $(".Proposal-color").css("color", "#6759ff");
      // $(".notification-color").css("color", "#000");
      // $(".Notification").css("background-color", "#ffffff");
      // $(".logout-color").css("color", "#000");
      // $(".Logout").css("background-color", "#ffffff");
      // $(".pending-color").css("color", "#000");
      // $(".Pending").css("background-color", "#fff");

      let id = '<?php echo auth('owner')->user()->id; ?>';
      $("#main-tab").show();
      $("#show-history").hide();
      $("#edit-profile-details").hide();
      $("#show-notification").hide();
      $("#show-proposal").hide();
      $("#show-confirm").hide();
      $("#show-pending").hide();
      $("#show-profile").hide();
      $("#show-report").hide();
      var assetUrl = "{{env('ASSET_URL')}}";

      var appUrl = "{{env('APP_URL')}}";

      const api_url =
        appUrl + "/owner/owner_history?owner_id=" + id;

      // Defining async function
      async function getapi(url) {

        // Storing response
        const response = await fetch(url);

        // Storing data in form of JSON
        var data = await response.json();
        console.log(data);
        if (response) {
          hideloader();
        }
        show(data);
      }
      // Calling that async function
      getapi(api_url);

      function hideloader() {
        document.getElementById('loading-h').style.display = 'none';
      }

      function show(data) {

        let tab = '';
        let date = '00:00:00';
        let time = '00:00';
        let img2 = '';
        let count = 0;
        // Loop to access all rows
        if (data.status == true) {
          console.log(data.status);
          for (let r of data.data) {

            var x = new Array();
             if(r.images != null){
                x = r.images
             }else{
              img2 += `<img src="${assetUrl + 'product-dummy.png'}" height="100" width="100" alt="" class="img-thumbnail hover-zoom" style="height: 100px !important;">`;
             }
        for (let i of x) {
          img2 += `<img src="${i}" height="100" width="100" alt="" class="img-thumbnail hover-zoom" style="height: 100px !important;">`;

        }

            let img = r.thumbnail_image == null ? assetUrl + "product-dummy.png" : r.thumbnail_image;
            let vendor = r.vendor_image == null ? assetUrl + "default-profile.png" : r.vendor_image;
            data = r.date==null?date:r.date;
            time = r.time==null?time:r.time;

            tab += `
             <div class="card mb-3">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="${img}" class="img-fluid ml-5 mt-3 rounded-start" alt="..." id="${id}" style="padding:5px;"  width="200" height:170px;>
    </div>
    <div class="col-md-8">
      <div  style="margin-top: 15px;margin-left: -70px; class="card-body">
        <h5 style="font-size: 22px; class="card-title">${r.product_name}</h5>
        <h6 style="font-size: 14px; font-weight: 400;" class="card-title">${r.order_id}</h6>
        <p  style="font-size: 16px; font-weight: 400;"class="card-text">${r.product_description}</p>
        <hr></hr>

      </div>
    </div>
  </div>
  <div class="row g-0">
    <div class="col-md-2 text-center">
      <img src="${vendor}" class="rounded-circle mt-20" alt="..." id="${id}" style="height:80px;">
    </div>

  <div class="col-md-10">
  <div class="card-body">
   <h5 style="font-size: 20px;" class="card-title">${r.vendor_name}  <small class="text-muted">(${time} ${date} )</small></h5>
    <div style="margin-top: 24px;margin-left: 0px;" class="row">
        <div style="font-size: 20px;background-color: #F0EEFF;color: #6759FF;height: 40px;width: 40px; !important;display: flex;align-items: center;flex-wrap: wrap;justify-content: space-around;align-content: space-around;" class="col-sm-4 btn ">
        Price: ${r.order_amount}
        </div>
        <div class="col-sm-4">
        <a href="#" style="height: 40px;background-color: #6759FF;font-size: 17px;" class="btn btn-primary">${r.order_status}</a>
        </div>
        <div class="col-sm-4">
        <a href="#" style="height: 40px;background-color: #6759FF;font-size: 17px;width: 70px;border-radius: 14px;" class="btn btn-primary"><i class="fa fa-phone" aria-hidden="true"></i> Call</a>
        </div>
        </div>
  </div>
  <div style="margin-top: 24px;margin-left: 0px;" class="row">
        <div class="col-sm-12 btn ">
        <div class="proposal-hover">
        ${img2}
        </div>
        </div>

  </div>

  </div>
</div>`;
            document.getElementById("Proposal-card").innerHTML = tab;
          }

        } else {
          console.log(data.message);
          tab += ` <div class="vendor-name-history" style="
text-align: center;><div class="images-div"></div>

<p><img src="${assetUrl}nodata.png" alt="" width="200" class="float-start rounded-circle" id="">${data.message}
</p>
</div>`;
          document.getElementById("Proposal-card").innerHTML = tab;
        }
      }
    });
    var assetUrl = "{{env('ASSET_URL')}}";

    var appUrl = "{{env('APP_URL')}}";
  let role_id = $("#ownerid").val();
 if(role_id == 1)
 {
  const api_url =
      appUrl + "/owner/vendor_history?vendor_id=" + id;

    // Defining async function
    async function getapi(url) {

      // Storing response
      const response = await fetch(url);

      // Storing data in form of JSON
      var data = await response.json();
      console.log(data);
      if (response) {
        hideloader();
      }
      show(data);
    }
    // Calling that async function
    getapi(api_url);

    function hideloader() {
      document.getElementById('loading').style.display = 'none';
    }

    function show(data) {

      let tab = '';
      let count = 0;
      // Loop to access all rows
      if (data.status == true) {
        console.log(data.status);
        for (let r of data.data) {
          let img = r.thumbnail_image == null ? assetUrl + "product-dummy.png" : r.thumbnail_image;
          let productImg = r.image == null ? assetUrl + "default-profile.png" : r.image;
          let vendor = r.vendor_image == null ? assetUrl + "default-profile.png" : r.vendor_image;

          tab += ` <div class="Proposal-card-01 text-center">
<div class="proposal-hover">
<img src="${img}" class="rounded-start" alt="..." id="${id}" height="180" width="180"></div>

                <h4>${r.product_name}</h4>
                <p>Code:${r.order_id}</p>
                <ul>
                    <li style="color:#6F767E; display:inline-block;white-space: nowrap;overflow: hidden;text-overflow: ellipsis;max-width: 13ch; color:#6F767E">${r.product_description}</li>

                </ul>
                <div class="vendor-class">
                    <div class="vendor-name">
                    <div class="row g-0">
    <div class="col-md-2">
    <div class="Group-img ml-5"><img src="${vendor}" width="50"
                           alt="" class="float-start rounded-circle"></div></div>
    <div class="col-md-10">

    <h4 class="card-title" style="width: 100%;">${r.vendor_name}</h4>
                        <h4 class="card-text"><small class="text-muted">${r.date} ${r.time}</small></h4>
                        <p>Code: #D-${r.vendor_id}</p>



  </div>

  </div>

                    </div>
                </div>
            </div>`;
          document.getElementById("Proposal-card").innerHTML = tab;
        }

      } else {
        console.log(data.message);
        tab += ` <div class="vendor-name-history" style="
text-align: center;><div class="images-div"></div>

<p><img src="${assetUrl}nodata.png" alt="" width="200" class="float-start rounded-circle" id="">${data.message}
</p>
</div>`;
        document.getElementById("Proposal-card").innerHTML = tab;
      }
    }
 }else{
  const api_url =
      appUrl + "/owner/owner_history?owner_id=" + id + "&search=";

    // Defining async function
    async function getapi(url) {

      // Storing response
      const response = await fetch(url);

      // Storing data in form of JSON
      var data = await response.json();
      console.log(data);
      if (response) {
        hideloader();
      }
      show(data);
    }
    // Calling that async function
    getapi(api_url);

    function hideloader() {
      document.getElementById('loading').style.display = 'none';
    }

    function show(data) {

      let tab = '';
      let img2 = '';
      let count = 0;
      // Loop to access all rows
      if (data.status == true) {
        console.log(data.status);
        for (let r of data.data) {
        //   var x = new Array();
        //      if(r.images != null){
        //         x = r.images
        //      }else{
        //       img2 += `<img src="${assetUrl + 'product-dummy.png'}" height="100" width="100" alt="" class="img-thumbnail hover-zoom" style="height: 100px !important;">`;
        //      }
        // for (let i of x) {
        //   img2 += `<img src="${i}" height="100" width="100" alt="" class="img-thumbnail hover-zoom" style="height: 100px !important;">`;

        // }

              let img = r.thumbnail_image == null ? assetUrl + "product-dummy.png" : r.thumbnail_image;
              // let img1 = r.image == null ? assetUrl + "product-dummy.png" : r.image;
              let vendor = r.vendor_images == null ? assetUrl + "default-profile.png" : r.vendor_images;
              let note = r.note == null ? "There is no any note!" : r.note;
              if(r.date != null || r.time != null)
              {
                  date = r.date;
                  time = r.time;
              }


          tab += ` <div class="proposal-hover"><div class="Proposal-card-01">

<img src="${img}" class="rounded-start" alt="..." id="${id}" height="180" width="300">

                <h4>${r.product_name}</h4>
                <p>Code:${r.order_id}</p>
                <ul>
                    <li style="color:#6F767E; display:-webkit-box; overflow: hidden;text-overflow: ellipsis;max-width: 28ch; -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;">${r.product_description}</li>

                </ul>
                <div class="vendor-class">
                    <div class="vendor-name">
                    <div class="row g-0">
    <div class="col-md-2">
    <div class="Group-img"><img src="${vendor}" width="50"
                           alt="" class="float-start rounded-circle"></div></div>
    <div class="col-md-10">

    <h4 class="card-title" style="width: 100%;">${r.vendor_name}</h4>

                        <p>Code: #D-${r.vendor_id}</p>
  </div>
   </div>
   <div class="row g-0">

    <div class="col-md-12">







  </div>

  </div>

                    </div>
                </div>
                </div>
            </div>`;
          document.getElementById("Proposal-card").innerHTML = tab;
        }

      } else {
        console.log(data.message);
        tab += ` <div class="vendor-name-history" style="
text-align: center;><div class="images-div"></div>

<p><img src="${assetUrl}nodata.png" alt="" width="200" class="float-start rounded-circle" id="">${data.message}
</p>
</div>`;
        document.getElementById("Proposal-card").innerHTML = tab;
      }
    }
 }



    /*get end default proposal*/
    /*------Get Proposal---------*/

    $("#link").click(function() {
      $(".proposal-card-div").css("display", "none");

      $(".Notification").css("background-color", "#e4e6ef");
      $(".notification-color").css("color", "#6759ff");
      $(".Setting").css("background-color", "#ffffff");
      $(".setting-color").css("color", "#000");
      $(".Proposal").css("background-color", "#ffffff");
      $(".Proposal-color").css("color", "#000");
      $(".confirmed-color").css("color", "#000");
      $(".Confirmed").css("background-color", "#ffffff");
      $(".logout-color").css("color", "#000");
      $(".Logout").css("background-color", "#ffffff");
      $(".pending-color").css("color", "#000");
      $(".Pending").css("background-color", "#ffffff");
       $(".report-color").css("color", "#000");
      $(".Report").css("background-color", "#ffffff");
      $(".history-color").css("color", "#000");
      $(".History").css("background-color", "#ffffff");
      $("#main-tab").hide();
      $("#show-notification").show();
      $("#show-history").hide();
      $("#show-confirm").hide();
      $("#show-pending").hide();
      $("#show-profile").hide();
      $("#show-report").hide();
      $("#edit-profile-details").hide();
      var assetUrl = "{{env('ASSET_URL')}}";

      var appUrl = "{{env('APP_URL')}}";

      const api_url =
        appUrl + "/owner/get_all_notifications?owner_id=" + id;

      // Defining async function
      async function getapi(url) {

        // Storing response
        const response = await fetch(url);

        // Storing data in form of JSON
        var data = await response.json();
        console.log(data);
        if (response) {
          hideloader();
        }
        show(data);
      }
      // Calling that async function
      getapi(api_url);

      function hideloader() {
        document.getElementById('loading').style.display = 'none';
      }

      function show(data) {

        let tab = '';
        let count = 0;
        // Loop to access all rows
        if (data.status == true) {
          console.log(data.status);
          for (let r of data.data) {
            let img = r.image == null ? assetUrl + "product-dummy.png" : r.image;
            tab += ` <div class="card mb-3 pl-5" style="max-width: 540px;">
  <div class="row g-0">
    <div class="col-md-4">
    <input type="hidden" value="${r.id}" id="not-id">
      <img src="${img}" class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col-md-6">

      <div class="card-body">
        <h5 class="card-title">${r.vendor_name}</h5>
        <p class="card-text">${r.message}</p>

      </div>
    </div>
    <div class="col-md-2 pt-4">
    <div id="del-not" class="btn btn-success" onclick="del()"><i class="fa fa-trash" aria-hidden="true"></i></div>
    </div>

  </div>

</div>`;
            document.getElementById("show-data").innerHTML = tab;
          }
        } else {
          console.log(data.message);
          tab += ` <div class="vendor-name-history" style="
    text-align: center;><div class="images-div"></div>

<p><img src="${assetUrl}nodata.png" alt="" width="200" class="float-start rounded-circle" id="">${data.message}
</p>
</div>`;
          document.getElementById("show-data").innerHTML = tab;
        }
      }

    });
    /*------End Get Proposal---------*/

    /*Search Notification*/
    $("#search-notification").keyup(function() {
      $("#main-tab").hide();
      $("#show-notification").show();
      $("#show-confirm").hide();
      $("#show-pending").hide();
      $("#show-profile").hide();
      let search = $("#search-notification").val();
      var assetUrl = "{{env('ASSET_URL')}}";

      var appUrl = "{{env('APP_URL')}}";

      const api_url =
        appUrl + "/owner/search_notifications?owner_id=" + id + "&search=" + search;
      console.log(api_url);
      // Defining async function
      async function getapi(url) {

        // Storing response
        const response = await fetch(url);

        // Storing data in form of JSON
        var data = await response.json();
        console.log(data);
        if (response) {
          hideloader();
        }
        show(data);
      }
      // Calling that async function
      getapi(api_url);

      function hideloader() {
        document.getElementById('loading').style.display = 'none';
      }

      function show(data) {

        let tab = '';
        let count = 0;
        // Loop to access all rows
        if (data.status == true) {
          console.log(data.status);
          for (let r of data.data) {
            let img = r.image == null ? assetUrl + "product-dummy.png" : r.image;
            tab += ` <div class="card mb-3 pl-5" style="max-width: 540px;">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="${img}" class="img-fluid rounded-start" alt="..." id="${id}">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">${r.vendor_name}</h5>
        <p class="card-text">${r.message}</p>

      </div>
    </div>
  </div>
</div>`;
            document.getElementById("show-data").innerHTML = tab;
          }
        } else {
          console.log(data.message);
          tab += ` <div class="vendor-name-history" style="
    text-align: center;><div class="images-div"></div>

<p><img src="${assetUrl}nodata.png" alt="" width="200" class="float-start rounded-circle" id="">${data.message}
</p>
</div>`;
          document.getElementById("show-data").innerHTML = tab;
        }
      }

    });
    /*------End Get Notification---------*/

    /*------Start Search Proposal-------*/
    $("#search-confirmed-proposal").keyup(function() {
      $("#main-tab").hide();
      $("#show-notification").hide();
      $("#show-confirm").show();
      $("#show-pending").hide();
      $("#show-profile").hide();
      let search = $("#search-confirmed-proposal").val();
      var assetUrl = "{{env('ASSET_URL')}}";

      var appUrl = "{{env('APP_URL')}}";
      let vid = $('#ownerid').val();
      if (vid == 1) {
        const api_url =
          appUrl + "/owner/search_vendor_Proposal?vendor_id=" + id + "&status=confirmed&search=" + search;

        // Defining async function
        async function getapi(url) {

          // Storing response
          const response = await fetch(url);

          // Storing data in form of JSON
          var data = await response.json();
          console.log(data);
          if (response) {
            hideloader();
          }
          show(data);
        }
        // Calling that async function
        getapi(api_url);

        function hideloader() {
          document.getElementById('loading').style.display = 'none';
        }

        function show(data) {

          let tab = '';
          let count = 0;
          // Loop to access all rows
          if (data.status == true) {
            console.log(data.status);
            for (let r of data.data) {
              let img = r.thumbnail_image == null ? assetUrl + "product-dummy.png" : r.thumbnail_image;
              let vendor = r.mage == null ? assetUrl + "default-profile.png" : r.image;
              tab += ` <div class="card mb-3">
<div class="row g-0">
<div class="col-md-3">
  <img src="${img}" class="img-thumbnail rounded-start ml-5 mt-3" alt="..." id="${id}" width="150">
</div>
<div class="col-md-9">
  <div class="card-body">
    <h5 class="card-title">${r.product_name}</h5>
    <h6 class="card-title">${r.order_id}</h6>
    <p class="card-text">${r.product_description}</p>
    <hr></hr>

  </div>
</div>
</div>
<div class="row g-0">
<div class="col-md-3">
  <img src="${vendor}" class="rounded-circle ml-5 mt-4" alt="..." id="${id}" width="80">
</div>
<div class="col-md-9">
  <div class="card-body">
    <h5 class="card-title">${r.first_name} ${r.last_name} <small class="text-muted">(${r.date}${r.time})</small></h5>
    <h5 class="card-title">Notes:<small class="text-muted"> ${r.note}</small></h5>
    <p class="card-text">${r.description}</p>
    <hr></hr>
    <div class="row">
        <div class="col-sm-4 btn btn-secondary text-white">
        Price: ${r.order_amount}
        </div>
        <div class="col-sm-4">
        <a href="#" class="btn btn-primary">${r.order_status}</a>
        </div>
        <div class="col-sm-4">
        <a href="#" class="btn btn-primary"><i class="fa fa-phone" aria-hidden="true"></i>Call</a>
        </div>
        </div>
  </div>
</div>

</div>
</div>`;

              document.getElementById("get-confirm").innerHTML = tab;
            }

          } else {
            console.log(data.message);
            tab += ` <div class="vendor-name-history" style="
text-align: center;><div class="images-div"></div>

<p><img src="${assetUrl}nodata.png" alt="" width="200" class="float-start rounded-circle" id="">${data.message}
</p>
</div>`;
            document.getElementById("get-confirm").innerHTML = tab;
          }
        }
      } else {
        const api_url =
          appUrl + "/owner/search_Proposal?owner_id=" + id + "&status=confirmed&search=" + search;

        // Defining async function
        async function getapi(url) {

          // Storing response
          const response = await fetch(url);

          // Storing data in form of JSON
          var data = await response.json();
          console.log(data);
          if (response) {
            hideloader();
          }
          show(data);
        }
        // Calling that async function
        getapi(api_url);

        function hideloader() {
          document.getElementById('loading').style.display = 'none';
        }

        function show(data) {

          let tab = '';
          let count = 0;
          // Loop to access all rows
          if (data.status == true) {
            console.log(data.status);
            for (let r of data.data) {
              let img = r.thumbnail_image == null ? assetUrl + "product-dummy.png" : r.thumbnail_image;
              let vendor = r.mage == null ? assetUrl + "default-profile.png" : r.image;
              tab += ` <div class="card mb-3">
<div class="row g-0">
<div class="col-md-3">
  <img src="${img}" class="img-thumbnail rounded-start ml-5 mt-3" alt="..." id="${id}" width="150">
</div>
<div class="col-md-9">
  <div class="card-body">
    <h5 class="card-title">${r.product_name}</h5>
    <h6 class="card-title">${r.order_id}</h6>
    <p class="card-text">${r.product_description}</p>
    <hr></hr>

  </div>
</div>
</div>
<div class="row g-0">
<div class="col-md-3">
  <img src="${vendor}" class="rounded-circle ml-5 mt-4" alt="..." id="${id}" width="80">
</div>
<div class="col-md-9">
  <div class="card-body">
   <h5 class="card-title">${r.vendor_name}  <small class="text-muted">(${r.date}${r.time})</small></h5>
    <h6 class="card-title">Service Note:<small class="text-muted"> ${r.note}</small></h6>
    <p class="card-text">${r.description}</p>
    <hr></hr>
    <div class="row">
        <div class="col-sm-4 btn btn-secondary text-white">
        Price: ${r.order_amount}
        </div>
        <div class="col-sm-4">
        <a href="#" class="btn btn-primary">${r.order_status}</a>
        </div>
        <div class="col-sm-4">
        <a href="#" class="btn btn-primary"><i class="fa fa-phone" aria-hidden="true"></i>Call</a>
        </div>
        </div>
  </div>
</div>

</div>
</div>`;

              document.getElementById("get-confirm").innerHTML = tab;
            }

          } else {
            console.log(data.message);
            tab += ` <div class="vendor-name-history" style="
text-align: center;><div class="images-div"></div>

<p><img src="${assetUrl}nodata.png" alt="" width="200" class="float-start rounded-circle" id="">${data.message}
</p>
</div>`;
            document.getElementById("get-confirm").innerHTML = tab;
          }
        }
      }


    });
    /*------End Search Proposal---------*/

    /*------Start Search Pending  Proposal-------*/
    $("#search-pending-proposal").keyup(function() {
      $("#main-tab").hide();
      $("#show-notification").hide();
      $("#show-confirm").hide();
      $("#show-pending").show();
      $("#show-profile").hide();
      let search = $("#search-pending-proposal").val();
      var assetUrl = "{{env('ASSET_URL')}}";

      var appUrl = "{{env('APP_URL')}}";


      if (vid == 1) {
        const api_url =
          appUrl + "/owner/search_vendor_Proposal?vendor_id=" + id + "&status=pending&search=" + search;;

        // Defining async function
        async function getapi(url) {

          // Storing response
          const response = await fetch(url);

          // Storing data in form of JSON
          var data = await response.json();
          console.log(data);
          if (response) {
            hideloader();
          }
          show(data);
        }
        // Calling that async function
        getapi(api_url);

        function hideloader() {
          document.getElementById('loading-p').style.display = 'none';
        }

        function show(data) {

          let tab = '';
          let tab1 = '';
          let count = 0;
          // Loop to access all rows
          if (data.status == true) {

            for (let r of data.data) {
              var x = new Array();
              // x = (r.image).split(",");

              // for (let i of x) {
              //     tab1 += `<img src="${i}" height="100" width="100" alt="" class="img-thumbnail hover-zoom" style="height: 100px !important;">`;

              // }
              let img = r.thumbnail_image == null ? assetUrl + "product-dummy.png" : r.thumbnail_image;
              let img1 = r.order_image == null ? assetUrl + "product-dummy.png" : r.order_image;
              let vendor = r.mage == null ? assetUrl + "default-profile.png" : r.image;

              tab += ` <div class="card mb-3">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="${img}" class="img-fluid rounded-start" alt="..." id="${r.id}" style="padding:5px;">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">${r.product_name}</h5>
        <h6 class="card-title">${r.order_id}</h6>
        <p class="card-text">${r.product_description}</p>
        <hr></hr>
        <h5 class="card-title"><img src="{{ asset('images') }}/image/calendar.png" alt="" width="40"><small class="text-muted" style="
    padding: 0px 10px 5px 10px;font-weight: 900;"> (${r.date}${r.time})  Paid: $ ${r.order_amount}</small></h5>

      </div>
    </div>
  </div>
  <div class="row g-0">
    <div class="col-md-2" style="padding: 5px 15px 5px 27px; text-align:end;">
      <img src="${vendor}" class="rounded-circle" alt="..." id="${id}" style="height:80px;">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">${r.first_name} ${r.last_name}<small class="text-muted"> (${r.date}${r.time})</small></h5>
        <h5 class="card-title"><small class="text-muted"> ${r.note}</small></h5>
        <p class="card-text">${r.description}</p>
        <img src="${img1}" height="100" width="100" alt="" class="img-thumbnail hover-zoom" style="height: 100px !important;">
        <hr></hr>
    </div>
  </div>
  <div class="col-md-2 mt-20">
           <a href="{{url('/')}}/product-details?id=${r.product_id}&order_id=${r.order_id}" class="btn btn-primary">Add Quote</a>
            </div>
  </div>
</div>`;

              document.getElementById("get-pending").innerHTML = tab;


            }

          } else {
            console.log(data.message);
            tab += ` <div class="vendor-name-history" style="
    text-align: center;><div class="images-div"></div>

<p><img src="${assetUrl}nodata.png" alt="" width="200" class="float-start rounded-circle" id="">${data.message}
</p>
</div>`;
            document.getElementById("get-pending").innerHTML = tab;
          }


        }
      } else {
        const api_url =
          appUrl + "/owner/search_Proposal?owner_id=" + id + "&status=pending&search=" + search;

        // Defining async function
        async function getapi(url) {

          // Storing response
          const response = await fetch(url);

          // Storing data in form of JSON
          var data = await response.json();
          console.log(data);
          if (response) {
            hideloader();
          }
          show(data);
        }
        // Calling that async function
        getapi(api_url);

        function hideloader() {
          document.getElementById('loading-p').style.display = 'none';
        }

        function show(data) {

          let tab = '';
          let tab1 = '';
          let count = 0;
          // Loop to access all rows
          if (data.status == true) {

            for (let r of data.data) {
              var x = new Array();
              // x = (r.image).split(",");

              // for (let i of x) {
              //     tab1 += `<img src="${i}" height="100" width="100" alt="" class="img-thumbnail hover-zoom" style="height: 100px !important;">`;

              // }
              if (r.note == null) {
                count = `<a href="#" class="btn btn-primary">${r.order_status}</a>`;
              } else {
                let oid = r.order_id;
                count = `<div onclick="accept(this.id)"class="btn btn-primary" id="${oid}">Accept</div>`;
              }
              let img = r.thumbnail_image == null ? assetUrl + "product-dummy.png" : r.thumbnail_image;
              let img1 = r.order_image == null ? assetUrl + "product-dummy.png" : r.order_image;
              let vendor = r.mage == null ? assetUrl + "default-profile.png" : r.image;
              let status = r.note == null ? r.order_status : 'Accept'
              tab += ` <div class="card mb-3">
  <div class="row g-0">
    <div class="col-md-3">
      <img src="${img}" class="img-thumbnail rounded-start ml-5 mt-3" alt="..." id="${id}" style="padding:5px;" width="150">
    </div>
    <div class="col-md-9">
      <div class="card-body">
        <h5 class="card-title">${r.product_name}</h5>
        <h6 class="card-title">${r.order_id}</h6>
        <p class="card-text">${r.product_description}</p>
        <hr></hr>
        <h5 class="card-title"><img src="{{ asset('images') }}/image/calendar.png" alt="" width="40"><small class="text-muted" style="
    padding: 0px 10px 5px 10px;font-weight: 900;"> (${r.date}${r.time})  Paid: $ ${r.order_amount}</small></h5>

      </div>
    </div>
  </div>
  <div class="row g-0">
    <div class="col-md-2" style="padding: 5px 15px 5px 27px; text-align:end;">
      <img src="${vendor}" class="rounded-circle ml-5 mt-3"" alt="..." id="${id}" width="80">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">${r.vendor_name}<small class="text-muted"> (${r.date}${r.time})</small></h5>
        <h5 class="card-title"><small class="text-muted"> ${r.note}</small></h5>
        <p class="card-text">${r.description}</p>
        <img src="${img1}" height="100" width="100" alt="" class="img-thumbnail hover-zoom" style="height: 100px !important;">
        <hr></hr>
    </div>
  </div>
  <div class="col-md-2 mt-20">
 ${count}

  </div>
  </div>
</div>`;

              document.getElementById("get-pending").innerHTML = tab;


            }

          } else {
            console.log(data.message);
            tab += ` <div class="vendor-name-history" style="
    text-align: center;><div class="images-div"></div>

<p><img src="${assetUrl}nodata.png" alt="" width="200" class="float-start rounded-circle" id="">${data.message}
</p>
</div>`;
            document.getElementById("get-pending").innerHTML = tab;
          }
        }
      }


    });
    /*------End Search Proposal---------*/

    /* ------Search Notification-------*/
    $("#search-proposal").keyup(function() {
      $("#main-tab").show();
      $("#show-notification").hide();
      $("#show-confirm").hide();
      $("#show-pending").hide();
      $("#show-profile").hide();
      let search = $("#search-proposal").val();
      var assetUrl = "{{env('ASSET_URL')}}";

      var appUrl = "{{env('APP_URL')}}";

      const api_url =
        appUrl + "/owner/proposal_history?owner_id=" + id + "&search=" + search;

      // Defining async function
      async function getapi(url) {

        // Storing response
        const response = await fetch(url);

        // Storing data in form of JSON
        var data = await response.json();
        console.log(data);
        if (response) {
          hideloader();
        }
        show(data);
      }
      // Calling that async function
      getapi(api_url);

      function hideloader() {
        document.getElementById('loading').style.display = 'none';
      }

      function show(data) {

        let tab = '';
        let count = 0;
        // Loop to access all rows
        if (data.status == true) {
          console.log(data.status);
          for (let r of data.data) {
            let img = r.thumbnail_image == null ? assetUrl + "product-dummy.png" : r.thumbnail_image;
            let vendor = r.mage == null ? assetUrl + "default-profile.png" : r.image;

            tab += ` <div class="Proposal-card-01 text-center">
<img src="${img}" class="img-thumbnail rounded-start" alt="..." id="${id}" height="180" width="180">

                <h4>${r.product_name}</h4>
                <p>Code:${r.order_id}</p>
                <ul>
                    <li style="color:#453d3d;display:inline-block;white-space: nowrap;overflow: hidden;text-overflow: ellipsis;max-width: 13ch; color:#008080">${r.product_description}</li>

                </ul>
                <div class="vendor-class">
                    <div class="vendor-name">
                        <div class="Group-img"><img src="${vendor}" width="50"
                           alt="" class="float-start rounded-circle"></div>

                        <h4 class="card-title ml-5">${r.vendor_name}</h4>
                        <h4 class="card-text"><small class="text-muted">${r.schedule}</small></h4>
                        <p>Code: #D-${r.vendor_id}</p>
                    </div>
                </div>
            </div>`;
            document.getElementById("Proposal-card").innerHTML = tab;
          }

        } else {
          console.log(data.message);
          tab += ` <div class="vendor-name-history" style="
text-align: center;><div class="images-div"></div>

<p><img src="${assetUrl}nodata.png" alt="" width="200" class="float-start rounded-circle" id="">${data.message}
</p>
</div>`;
          document.getElementById("Proposal-card").innerHTML = tab;
        }
      }

    });
    /*------End Search Notification---------*/

    /*------Get Pending Proposal---------*/

    $("#pending").click(function() {

      $("#history").removeClass("main-Button-1");
      $("#history").addClass("main-Button-2");
      $("#pending").removeClass("main-Button-2");
      $("#pending").removeClass("main-Button");
      $("#pending").addClass("main-Button-1");
      $("#confirm").removeClass("main-Button-1");
      $("#confirm").addClass("main-Button");
      $("#Workorder").removeClass("main-Button-1");
      $("#Workorder").addClass("main-Button-3");

      $("#Workorder h5").css("color", "#6759FF");
       $("#pending h5").css("color", "white");
       $("#confirm h5").css("color", "#6759FF");
       $("#history h5").css("color", "#6759FF");
      $("#main-tab").show();
      $("#show-notification").hide();
      $("#show-history").hide();
      $("#show-proposal").hide();
      $("#show-confirm").hide();
      $("#show-pending").hide();
      $("#show-profile").hide();
      let vid = $('#ownerid').val();

      var assetUrl = "{{env('ASSET_URL')}}";

      var appUrl = "{{env('APP_URL')}}";
      if (vid == 1) {
        const api_url =
          appUrl + "/owner/get_vendor_Proposal?order_status=pending &vendor_id=" + id;

        // Defining async function
        async function getapi(url) {

          // Storing response
          const response = await fetch(url);

          // Storing data in form of JSON
          var data = await response.json();
          console.log(data);
          if (response) {
            hideloader();
          }
          show(data);
        }
        // Calling that async function
        getapi(api_url);

        function hideloader() {
          document.getElementById('loading-p').style.display = 'none';
        }

        function show(data) {

          let tab = '';
          let tab1 = '';
          let count = 0;
          let date = '';
          let img2 = '';
          let time = '';
          // Loop to access all rows
          if (data.status == true) {

            for (let r of data.data) {
              var x = new Array();
             if(r.image != null){
                x = r.image
             }else{
              img2 += `<img src="${assetUrl + 'product-dummy.png'}" height="100" width="100" alt="" class="img-thumbnail hover-zoom proposal-hover" style="height: 100px !important;">`;
             }
        for (let i of x) {
          img2 += `<img src="${i}" height="100" width="100" alt="" class="img-thumbnail hover-zoom proposal-hover" style="height: 100px !important;">`;

        }

              let img = r.thumbnail_image == null ? assetUrl + "product-dummy.png" : r.thumbnail_image;
              // let img1 = r.image == null ? assetUrl + "product-dummy.png" : r.image;
              let vendor = r.vendor_images == null ? assetUrl + "default-profile.png" : r.vendor_images;
              let note = r.note == null ? "There is no any note!" : r.note;
              if(r.date != null || r.time != null)
              {
                  date = r.date;
                  time = r.time
              }



              tab += ` <div class="card mb-3">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="${img}" class="img-fluid rounded-start" alt="..." id="${r.id}" style="padding:5px;">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">${r.product_name}</h5>
        <h6 class="card-title">${r.order_id}</h6>
        <p class="card-text">${r.product_description}</p>
        <hr></hr>


      </div>
    </div>
  </div>
  <div class="row g-0">
    <div class="col-md-2" style="padding: 5px 15px 5px 27px; text-align:end;">
      <img src="${vendor}" class="rounded-circle" alt="..." id="${id}" style="height:80px;">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">${r.first_name} ${r.last_name}</h5>



        <hr></hr>
    </div>
  </div>
  <div class="col-md-2 mt-20">
           <a href="{{url('/')}}/product-details?id=${r.product_id}&order_id=${r.order_id}" class="btn btn-primary">Add Quote</a>
            </div>
            <div class="row g-0">
        <div class="col-md-4" style="padding: 5px 15px 5px 27px; text-align:end;">
        <h5 class="card-title">${img2}</h5>
        </div>
        <div class="col-md-8" style="padding: 5px 15px 5px 27px; text-align:end;">
        <h5 class="card-title" style="text-align: initial;">${r.description}</h5>
        </div>
  </div>
</div>`;

              document.getElementById("Proposal-card").innerHTML = tab;


            }

          } else {
            console.log(data.message);
            tab += ` <div class="vendor-name-history" style="
    text-align: center;><div class="images-div"></div>

<p><img src="${assetUrl}nodata.png" alt="" width="200" class="float-start rounded-circle" id="">${data.message}
</p>
</div>`;
            document.getElementById("Proposal-card").innerHTML = tab;
          }


        }
      } else {
        const api_url =
          appUrl + "/owner/get_Proposal?order_status=pending &owner_id=" + id;

        // Defining async function
        async function getapi(url) {

          // Storing response
          const response = await fetch(url);

          // Storing data in form of JSON
          var data = await response.json();
          console.log(data);
          if (response) {
            hideloader();
          }
          show(data);
        }
        // Calling that async function
        getapi(api_url);

        function hideloader() {
          document.getElementById('loading-p').style.display = 'none';
        }

        function show(data) {

          let tab = '';
          let tab1 = '';
          let img2 = '';
          let tab3 = '';
          let date = '';
          let reject = '';
          let time = '';
          let count = 0;
          // Loop to access all rows
          if (data.status == true) {

            for (let r of data.data) {
              var x = new Array();
             if(r.images != null){
                x = r.images
             }else{
              img2 += `<img src="${assetUrl + 'product-dummy.png'}" height="100" width="100" alt="" class="img-thumbnail hover-zoom proposal-hover" style="height: 100px !important;">`;
             }
        for (let i of x) {
          img2 += `<img src="${i}" height="100" width="100" alt="" class="img-thumbnail hover-zoom proposal-hover" style="height: 100px !important;">`;

        }
              if(r.date != null || r.time != null)
              {
                  date = r.date;
                  time = r.time
              }
              if (r.note == null) {
                count = `<a href="#" style="margin-left: 180px; margin-top: -130px; background-color: #6759FF;" class="btn btn-primary">${r.order_status}</a>`;
              } else {
                let oid = r.order_id;
                count = `<div onclick="accept(this.id)"class="btn btn-primary" id="${oid}">Accept</div>`;
                reject = `<div onclick="reject(this.id)"class="btn btn-primary" id="${oid}">Reject</div>`;
              }
              let img = r.thumbnail_image == null ? assetUrl + "product-dummy.png" : r.thumbnail_image;
              // let img1 = r.image == null ? assetUrl + "product-dummy.png" : r.image;
              let vendor = r.vendor_images == null ? assetUrl + "default-profile.png" : r.vendor_images;
              let note = r.note == null ? "There is no notes" : r.note;
              let status = r.note == null ? r.order_status : 'Accept';

              tab += ` <div class="card mb-3">
  <div class="row g-0">
    <div class="col-md-3">
      <img src="${img}" class="img-thumbnail rounded-start ml-5 mt-3" alt="..." id="${id}"  style="padding:5px;" width="200" height: 170px;>
    </div>
    <div class="col-md-9">
      <div class="card-body">
        <h5 style="font-size: 22px; class="card-title">${r.product_name}</h5>
        <h6 style="font-size: 14px; font-weight: 400;" class="card-title">${r.order_id}</h6>
        <p style="font-size: 16px; font-weight: 400;"class="card-text">${r.product_description}</p>
        <hr></hr>


      </div>
    </div>
  </div>
  <div style="margin-top: -10px;" class="row g-0">
    <div style="margin-top: -20px; margin-left: 226px;" class="col-md-2">
      <img src="${vendor}" class="rounded-circle ml-5 mt-3"" alt="..." id="${id}" width="50">
    </div>
    <div class="col-md-8">
      <div style="margin-top: -57px; margin-left: 320px;" class="card-body">
        <h5 style="font-size: 20px;" class="card-title">${r.vendor_name}</h5>

    </div>
  </div>
  <div class="col-md-2 mt-20">
 ${count}
 ${reject}
  </div>
  <div"class="row g-0">
  <div class="col-md-12" style="padding: 5px 15px 5px 27px;">
        <h5 class="card-title" style="margin-top: -30px;margin-left: 270px;text-align: initial;font-weight: 400;">${note}</h5>
        </div>

  </div>
  <div style="margin-top: -15px;margin-left: 230px;"class="row g-0">

        <div class="col-md-12" style="padding: 5px 15px 5px 27px;">
        <div class="container mt-3" id="multi-img">
       ${img2}
               </div>
        </div>
        </div>
  </div>
</div>`;

              document.getElementById("Proposal-card").innerHTML = tab;


            }

          } else {
            console.log(data.message);
            tab += ` <div class="vendor-name-history" style="
    text-align: center;><div class="images-div"></div>

<p><img src="${assetUrl}nodata.png" alt="" width="200" class="float-start rounded-circle" id="">${data.message}
</p>
</div>`;
            document.getElementById("Proposal-card").innerHTML = tab;
          }
        }
      }



    });

    /*------End Pending Proposal---------*/

    /*--------Start-Report---------------*/

     $("#report").click(function() {
      
      $(".proposal-card-div").css("display", "none");
      $(".Report").css("background-color", "#e4e6ef");
       $(".report-color").css("color", "#6759ff");
      $(".Setting").css("background-color", "#ffffff");
      $(".Proposal").css("background-color", "#ffffff");
      $(".Notification").css("background-color", "#ffffff");
      $(".Proposal-color").css("color", "#000");
      $(".setting-color").css("color", "#000");
      $(".notification-color").css("color", "#000");
      $(".logout-color").css("color", "#000");
      $(".Logout").css("background-color", "#ffffff");

      $("#main-tab").hide();
      $("#show-notification").hide();
      $("#show-history").hide();
      $("#show-proposal").hide();
      $("#show-confirm").hide();
      $("#show-pending").hide();
      $("#show-profile").hide();
       $("#show-report").show();
      $("#edit-profile-details").hide();
      var assetUrl = "{{env('ASSET_URL')}}";
       var profileUrl = "{{env('PROFILE_URL')}}";
     
      var appUrl = "{{env('APP_URL')}}";
  
      // const api_url = '{{route('report')}}';

        $('#example').DataTable({
            retrieve:true,
            destroy:true,
            ajax: '{!! route('report') !!}',
            columns: [
                { data: 'id', name: 'id' },
                { data: 'order_id', name: 'order_id' },
                 { data: 'product_name', name: 'product_name' },
                  { data: 'date', name: 'date' },
                { data: 'owner_name', name: 'owner_name' },
                { data: 'vendor_name', name: 'vendor_name' },
                { data: 'order_amount', name: 'order_amount' },
                { data: 'order_status', name: 'order_status' },
                { data: 'action', name: 'action' },
   
               
                 ],
                 "fnRowCallback": function( nRow, aData, iDisplayIndex, iDisplayIndexFull ) {
       
                $('th', nRow).css('background-color', '#dacfcf');
                
        }
    
        });
    

   

    });

    /*-------------End-Report-----------*/

    /*------Get Profile Details---------*/

    $("#profile").click(function() {
      $(".proposal-card-div").css("display", "none");
      $(".Setting").css("background-color", "#e4e6ef");
      $(".Proposal").css("background-color", "#ffffff");
      $(".Notification").css("background-color", "#ffffff");
      $(".Proposal-color").css("color", "#000");
      $(".setting-color").css("color", "#6759ff");
      $(".notification-color").css("color", "#000");
      $(".report-color").css("color", "#000");
      $(".Report").css("background-color", "#ffffff");
      $(".logout-color").css("color", "#000");
      $(".Logout").css("background-color", "#ffffff");

      $("#main-tab").hide();
      $("#show-notification").hide();
      $("#show-history").hide();
      $("#show-proposal").hide();
      $("#show-confirm").hide();
      $("#show-pending").hide();
      $("#show-report").hide();
      $("#show-profile").show();
      $("#edit-profile-details").hide();
      var assetUrl = "{{env('ASSET_URL')}}";
       var profileUrl = "{{env('PROFILE_URL')}}";
     
      var appUrl = "{{env('APP_URL')}}";
  
      const api_url =
        appUrl + "/owner/Get_owner_details?id=" + id;

      // Defining async function
      async function getapi(url) {

        // Storing response
        const response = await fetch(url);

        // Storing data in form of JSON
        var data = await response.json();
        console.log(data);
        if (response) {
          hideloader();
        }
        show(data);
      }
      // Calling that async function
      getapi(api_url);

      function hideloader() {
        document.getElementById('loading').style.display = 'none';
      }

      function show(data) {

        let tab = '';
        let count = 0;
        // Loop to access all rows
        if (data.status == true) {
          console.log(data.status);
          for (let r of data.data) {
            let img = r.thumbnail_image == null ? assetUrl + "product-dummy.png" : r.thumbnail_image;
            let user = r.image == null ? profileUrl + "default-profile.png" : r.image;
          
            
           $('#profile-pic1').attr('src', user);
          $('#profile-pic2').attr('src', user); 
          $('#profile-pic').attr('src', user);
            tab += `

    <div class="input-div">
        <p>Full Name</p>
        <input placeholder="Your Full Name" value="${r.first_name} ${r.last_name}" type="text" readonly>
        <p>E-mail</p>
        <input placeholder="Your email" type="text" value="${r.email}" readonly>
        <p>Password</p>
        <input placeholder="Your Password" type="password" value="${r.password}" readonly maxlength="10">
    </div>
    <div class="box ds-flex"></div>
`;

            document.getElementById("get-profile").innerHTML = tab;
          }

        } else {
          console.log(data.message);
          tab += ` <div class="vendor-name-history" style="
text-align: center;><div class="images-div"></div>

<p><img src="${assetUrl}nodata.png" alt="" width="200" class="float-start rounded-circle" id="">${data.message}
</p>
</div>`;
          document.getElementById("get-profile").innerHTML = tab;
        }
      }

    });


    /*------End Pending Proposal---------*/

    /*------Get Edit Profile Details---------*/

    $("#edit-profile").click(function() {

      $("#main-tab").hide();
      $("#show-history").hide();
      $("#show-notification").hide();
      $("#show-proposal").hide();
      $("#show-confirm").hide();
      $("#show-pending").hide();
      $("#show-profile").hide();

      $("#edit-profile-details").show();
      var assetUrl = "{{env('ASSET_URL')}}";

      var appUrl = "{{env('APP_URL')}}";

      const api_url =
        appUrl + "/owner/Get_owner_details?id=" + id;

      // Defining async function
      async function getapi(url) {

        // Storing response
        const response = await fetch(url);

        // Storing data in form of JSON
        var data = await response.json();
        console.log(data);
        if (response) {
          hideloader();
        }
        show(data);
      }
      // Calling that async function
      getapi(api_url);

      function hideloader() {
        document.getElementById('loading5').style.display = 'none';
      }

      function show(data) {

        let tab = '';
        let count = 0;
        // Loop to access all rows
        if (data.status == true) {
          console.log(data.status);
          for (let r of data.data) {
            let img = r.thumbnail_image == null ? assetUrl + "product-dummy.png" : r.thumbnail_image;
            let user = r.image_name == null ? assetUrl + "default-profile.png" : r.image_name;

            tab += `<div class="input-div">
        <p>Full Name</p>
        <input placeholder="Your First Name" name="first-name"value="${r.first_name} " type="text" id="first-name">
        <input placeholder="Your Last Name" name="last-name"value="${r.last_name}" type="text" id="last-name">
        <p>E-mail</p>
        <input placeholder="Your email" type="email" name="email"value="${r.email}" id="email">
        <p>Password</p>
        <input placeholder="Your Password" type="password" value="${r.password}" name="password" id="password" maxlength="10">
    </div>
    `;

            document.getElementById("update-profile").innerHTML = tab;
          }

        } else {
          console.log(data.message);
          tab += ` <div class="vendor-name-history" style="
text-align: center;><div class="images-div"></div>

<p><img src="${assetUrl}nodata.png" alt="" width="200" class="float-start rounded-circle" id="">${data.message}
</p>
</div>`;
          document.getElementById("update-profile").innerHTML = tab;
        }
      }

    });

    /*------End Edit Profile---------*/


    /*------Get Confirm Proposal---------*/

    $("#confirm").click(function() {

      $("#history").removeClass("main-Button-1");
      $("#history").addClass("main-Button-2");
      $("#pending").removeClass("main-Button-1");
      $("#pending").removeClass("main-Button");
      $("#pending").addClass("main-Button-2");
      $("#confirm").removeClass("main-Button");
      $("#confirm").addClass("main-Button-1");
      $("#Workorder").removeClass("main-Button-1");
      $("#Workorder").addClass("main-Button-3");

      $("#Workorder h5").css("color", "#6759FF");
       $("#pending h5").css("color", "#6759FF");
       $("#confirm h5").css("color", "white");
       $("#history h5").css("color", "#6759FF");
      // $(".Confirmed").removeClass("btn-primary");
      // $(".Confirmed").addClass("btn-light");
      // $(".Pending").removeClass("btn-light");
      // $(".Pending").addClass("btn-primary");
      // $(".History").removeClass("btn-light");
      // $(".History").addClass("btn-primary");
      // $(".workorder").removeClass("btn-light");
      // $(".workorder").addClass("btn-primary");
      $("#main-tab").show();
      $("#show-notification").hide();
      $("#show-history").hide();
      $("#show-proposal").hide();
      $("#show-confirm").hide();
      $("#show-pending").hide();
      $("#show-profile").hide();
      $("#edit-profile-details").hide();
      let vid = $("#ownerid").val();
      var assetUrl = "{{env('ASSET_URL')}}";

      var appUrl = "{{env('APP_URL')}}";
      if (vid == 1) {
        const api_url =
          appUrl + "/owner/get_vendor_Proposal?order_status=confirmed &vendor_id=" + id;

        // Defining async function
        async function getapi(url) {

          // Storing response
          const response = await fetch(url);

          // Storing data in form of JSON
          var data = await response.json();
          console.log(data);
          if (response) {
            hideloader();
          }
          show(data);
        }
        // Calling that async function
        getapi(api_url);

        function hideloader() {
          document.getElementById('loading-c').style.display = 'none';
        }

        function show(data) {

          let tab = '';
          let date = '';
          let img2 = '';
          let time = '';
          let count = 0;
          // Loop to access all rows
          if (data.status == true) {
            console.log(data.status);
            for (let r of data.data) {
              var x = new Array();


             if(r.image != null){
                x = r.image
             }else{
              img2 += `<img src="${assetUrl + 'product-dummy.png'}" height="100" width="100" alt="" class="img-thumbnail hover-zoom" style="height: 100px !important;">`;
             }



        for (let i of x) {
          img2 += `<img src="${i}" height="100" width="100" alt="" class="img-thumbnail hover-zoom" style="height: 100px !important;">`;

        }
              if(r.date != null || r.time != null)
              {
                  date = r.date;
                  time = r.time
              }
              let img = r.thumbnail_image == null ? assetUrl + "product-dummy.png" : r.thumbnail_image;
              let img1 = r.image == null ? assetUrl + "product-dummy.png" : r.image;
              let vendor = r.vendor_images == null ? assetUrl + "default-profile.png" : r.vendor_images;
              // let img2 = r.images == null ? assetUrl + "product-dummy.png" : r.images;

              tab += ` <div class="card mb-3">
<div class="row g-0">
<div class="col-md-3">
  <img src="${img}" class="img-thumbnail rounded-start ml-5 mt-3" alt="..." id="${id}" width="200" height="170">
</div>
<div class="col-md-9">
  <div class="card-body">
    <h5 class="card-title">${r.product_name}</h5>
    <h6 class="card-title">${r.order_id}</h6>
    <p class="card-text">${r.product_description}</p>
    <hr></hr>

  </div>
</div>
</div>
<div class="row g-0">
<div class="col-md-3">
  <img src="${vendor}" class="rounded-circle ml-5 mt-4" alt="..." id="${id}" width="80">
</div>
<div class="col-md-9">
  <div class="card-body">
    <h5 class="card-title">${r.first_name} ${r.last_name}</h5>
    <div class="row g-0">
        <div class="col-md-4" style="padding: 5px 15px 5px 27px; text-align:end;">
        <h5 class="card-title"><img src="${img2}" height="100" width="80" alt="" class="img-thumbnail hover-zoom" style="height: 80px !important;"></h5>
        </div>
        <div class="col-md-8" style="padding: 5px 15px 5px 27px;">
        <h5 class="card-title" style="text-align: initial;">${r.description}</h5>
        </div>
    <hr></hr>
    <div class="row">
        <div class="col-sm-4 btn btn-secondary text-white">
        Price: ${r.order_amount}
        </div>
        <div class="col-sm-4">
        <a href="#" class="btn btn-primary">${r.order_status}</a>
        </div>
        <div class="col-sm-4">
        <a href="#" class="btn btn-primary"><i class="fa fa-phone" aria-hidden="true"></i>Call</a>
        </div>
        </div>
  </div>
</div>

</div>
</div>`;

              document.getElementById("Proposal-card").innerHTML = tab;
            }

          } else {
            console.log(data.message);
            tab += ` <div class="vendor-name-history" style="
text-align: center;><div class="images-div"></div>

<p><img src="${assetUrl}nodata.png" alt="" width="200" class="float-start rounded-circle" id="">${data.message}
</p>
</div>`;
            document.getElementById("Proposal-card").innerHTML = tab;
          }
        }
      } else {

        const api_url =
          appUrl + "/owner/get_Proposal?order_status=confirmed &owner_id=" + id;

        // Defining async function
        async function getapi(url) {

          // Storing response
          const response = await fetch(url);

          // Storing data in form of JSON
          var data = await response.json();
          console.log(data);
          if (response) {
            hideloader();
          }
          show(data);
        }
        // Calling that async function
        getapi(api_url);

        function hideloader() {
          document.getElementById('loading-c').style.display = 'none';
        }

        function show(data) {

          let tab = '';
          let date = '';
          let img2 = '';
          let time = '';
          let count = 0;

          // Loop to access all rows
          if (data.status == true) {
            console.log(data.status);
            for (let r of data.data) {
              var x = new Array();
             if(r.images != null){
                x = r.images
             }else{
              img2 += `<img src="${assetUrl + 'product-dummy.png'}" height="100" width="100" alt="" class="img-thumbnail hover-zoom" style="height: 100px !important;">`;
             }
        for (let i of x) {
          img2 += `<img src="${i}" height="100" width="100" alt="" class="img-thumbnail hover-zoom" style="height: 100px !important;">`;

        }
              if(r.date != null || r.time != null)
              {
                  date = r.date;
                  time = r.time
              }

              let img = r.thumbnail_image == null ? assetUrl + "product-dummy.png" : r.thumbnail_image;
              let img1 = r.image == null ? assetUrl + "product-dummy.png" : r.image;
              let vendor = r.vendor_images == null ? assetUrl + "default-profile.png" : r.vendor_images;
               let note = r.note == null ?"There is no note" : r.note;

              tab += ` <div class="card mb-3">
<div class="row g-0">
<div class="col-md-3">
  <img src="${img}" class="img-thumbnail rounded-start ml-5 mt-3" alt="..." id="${id}" width="200" style="height: 140px;">
</div>
<div class="col-md-9">
  <div class="card-body">
    <h5 style="font-size: 22px;" class="card-title">${r.product_name}</h5>
    <h6 style="font-size: 14px; font-weight: 400;" class="card-title">${r.order_id}</h6>
    <p  style="font-size: 16px; font-weight: 400;" class="card-text">${r.product_description}</p>
    <hr></hr>

  </div>
</div>
</div>
<div class="row g-0">
<div style="margin-top: -20px; margin-left: 226px;" class="col-md-3">
  <img src="${vendor}" class="rounded-circle ml-5 mt-4" alt="..." id="${id}" width="50">
</div>
<div class="col-md-9">
  <div style="margin-left: 325px; margin-top: -60px;" class="card-body">
   <h5 style="font-size: 20px;" class="card-title">${r.vendor_name}  <small class="text-muted">(${date}${time})</small></h5>
    <div style="margin-top: 24px;margin-left: 0px;" class="row">
        <div style="font-size: 20px;background-color: #F0EEFF;color: #6759FF;height: 40px;width: 40px; !important;display: flex;align-items: center;flex-wrap: wrap;justify-content: space-around;align-content: space-around;" class="col-sm-4 btn ">
        Price: ${r.order_amount}
        </div>
        <div class="col-sm-4">
        <a href="#" style="height: 40px;background-color: #6759FF;font-size: 17px;" class="btn btn-primary">${r.order_status}</a>
        </div>
        <div class="col-sm-4">
        <a href="#" style="height: 40px;background-color: #6759FF;font-size: 17px;width: 70px;border-radius: 14px;" class="btn btn-primary"><i class="fa fa-phone" aria-hidden="true"></i>Call</a>
        </div>
        </div>
  </div>
</div>
<div class="col-md-2 mt-20">

            </div>
            <div  style="margin-left: 220px;margin-top: 25px;"class="row g-0">
  <div class="col-md-12" style="padding: 5px 15px 5px 27px;">
        <h5 class="card-title" style="margin-top: -30px;margin-left: 50px;text-align: initial;font-weight: 400;">${note}</h5>
        </div>

  </div>
  <div style="/* margin-bottom: 110px; *//* margin-top: -420px; */margin-left: 250px;" class="row g-0">

        <div class="col-md-12" style="padding: 5px 15px 5px 27px;">
        <div class="container mt-3" id="multi-img">
       ${img2}
               </div>
        </div>
        </div>
    </div>
</div>
</div>`;

              document.getElementById("Proposal-card").innerHTML = tab;
            }

          } else {
            console.log(data.message);
            tab += ` <div class="vendor-name-history" style="
text-align: center;><div class="images-div"></div>

<p><img src="${assetUrl}nodata.png" alt="" width="200" class="float-start rounded-circle" id="">${data.message}
</p>
</div>`;
            document.getElementById("Proposal-card").innerHTML = tab;
          }
        }
      }


    });

    /* ------------Update Profile ---------------------*/

    $('#save-profile').click(function() {

      let image = $('#upload').val();
      let first_name = $('#first-name').val();
      let last_name = $('#last-name').val();
      let email = $('#email').val();
      let password = $('#password').val();
      let formData = new FormData();
      var files = $('#upload')[0].files[0];

      formData.append('id', id);
      formData.append('image', files);
      formData.append('first_name', first_name);
      formData.append('last_name', last_name);
      formData.append('address', 'indore');

      console.log(formData);
      var appUrl = "{{env('APP_URL')}}";
      const api_url =
        appUrl + "/owner/Edit_profile_details";




      let options = {
        method: 'PUT',
        body: formData,

      }
      // Defining async function
      geturl(api_url, options);
      async function geturl(api_url, options) {

        // Storing response
        console.log(api_url, options);
        const response = await fetch(api_url, options);

        // Storing data in form of JSON
        var data1 = await response.json();
        if (data1.status == true) {
          $.toast({
            heading: 'Alert',
            text: 'Profile datails updated successfully',
            icon: 'info',
            loader: true, // Change it to false to disable loader
            loaderBg: '#9EC600' // To change the background
          });
          location.reload();

        } else {

          $.toast({
            heading: 'Alert',
            text: 'Error',
            icon: 'info',
            loader: true, // Change it to false to disable loader
            loaderBg: '#9EC600' // To change the background
          });
        }
      }
      // Calling that async function

    });
    /* ------------Update Profile End---------------------*/
    /*----------Work Order----------*/
    $("#Workorder").click(function(){
      $("#history").removeClass("main-Button-1");
      $("#history").addClass("main-Button-2");
      $("#pending").removeClass("main-Button-1");
      $("#pending").removeClass("main-Button");
      $("#pending").addClass("main-Button-2");
      $("#confirm").addClass("main-Button");
      $("#confirm").removeClass("main-Button-1");
      $("#Workorder").removeClass("main-Button-3");
      $("#Workorder").addClass("main-Button-1");

      $("#Workorder h5").css("color", "white");
       $("#pending h5").css("color", "#6759FF");
       $("#confirm h5").css("color", "#6759FF");
       $("#history h5").css("color", "#6759FF");
      $("#main-tab").show();
      $("#show-notification").hide();
      $("#show-history").hide();
      $("#show-proposal").hide();
      $("#show-confirm").hide();
      $("#show-pending").hide();
      $("#show-profile").hide();
      var appUrl ="{{env('APP_URL')}}";
        const api_url =
        appUrl+"/owner/get_all_product";
        let userId = $("#owner_id").val();
// Defining async function
async function getapi(url) {

    // Storing response
    const response = await fetch(url);

    // Storing data in form of JSON
    var data = await response.json();
    console.log(data);
    if (response) {
        hideloader();
    }
    show(data);
}
// Calling that async function
getapi(api_url);
function hideloader() {
    document.getElementById('loading').style.display = 'none';
}
function show(data) {
    console.log(data.data)
    let tab ='';
    let sum = 0;
    let link = '';
    // Loop to access all rows
    let count = 0;
    for (let r of data.data) {
        sum = count/3;

    let img = r.thumbnail_image == null?"https://miro.medium.com/max/600/0*jGmQzOLaEobiNklD":r.thumbnail_image;

      //  if(userId != null){

      //   link = `<a href="./product-details?id=${r.id}" style="text-decoration: none;"><img src="${img}" alt="" width="150px" height="150px" id="${r.id}">`;
      //  }else{

      //   link =`<a href="#" style="text-decoration: none;"><img src="${img}" alt="" width="150px" height="150px" id="${r.id}">`;
      //  }


            tab += `<div class="Product-card-services">
            <a href="../product-details?id=${r.id}" style="text-decoration: none;"><img src="${img}" alt="" width="150px" height="150px" id="${r.id}">
            <h2>${r.brand}</h2>
            <h3><span style="display:inline-block;white-space: nowrap;overflow: hidden;text-overflow: ellipsis;max-width: 13ch;color:#008080;font-size:20px;">${r.product_name}</span></h3>
            <p><span style="display:inline-block;white-space: nowrap;overflow: hidden;text-overflow: ellipsis;max-width: 13ch;color:#808080; font-size:14px;">${r.product_description}</span></p>
            </a></div> `;



    count = count+1;

    // console.log((Math.floor(sum) != '0')? $("service-list").after("<br />"):0);

    }
    console.log(count);
    // Setting innerHTML as tab variable
    document.getElementById("Proposal-card").innerHTML = tab;
}
    });

    $('#user-dropdown').click(function() {

      if ($('#expend-dn').css('display') == 'none') {
        $('#expend-dn').css('display', 'block');
      } else {
        $('#expend-dn').css('display', 'none');
      }


    });


  });

  function accept(orderId) {

    var assetUrl = "{{env('ASSET_URL')}}";

    var appUrl = "{{env('APP_URL')}}";
    let options = {
      method: 'POST',
    }
    const api_url =
      appUrl + "/owner/owner_order_accepted?order_id=" + orderId;
    console.log(api_url);
    async function getapiaccept(api_url, options) {

      const response = await fetch(api_url, options);

      var data1 = await response.json();
      if (data1.status == true) {

        $.toast({
          heading: 'Alert',
          text: 'Order has been accepted',
          icon: 'info',
          loader: true, // Change it to false to disable loader
          loaderBg: '#9EC600' // To change the background
        });
        location.reload();

      } else {

        $.toast({
          heading: 'Alert',
          text: 'You are not authorized',
          icon: 'info',
          loader: true, // Change it to false to disable loader
          loaderBg: '#9EC600' // To change the background
        });
      }
    }
    getapiaccept(api_url, options)

  }
/*--------Reject Order Api Integration Start-----------*/
  function reject(orderId) {
    var assetUrl = "{{env('ASSET_URL')}}";

   var appUrl = "{{env('APP_URL')}}";
   let options = {
     method: 'POST',
   }
   const api_url =
     appUrl + "/owner/order_reject?order_id=" + orderId;
    toastr.success("<br /><br /><button type='button' id='confirmationRevertYes' class='btn clear'>Yes</button>",'Are you sure, you want to delete it?',
    {
      closeButton: false,
      allowHtml: true,
      onShown: function (toast) {
        $("#confirmationRevertYes").click(function(){
          $.ajax({
            url: api_url,
            type: "POST",

            success: function(res){
              console.log(res);
              if(res.status==true){
                toastr.success("Done! Record delete successful.", 'Success!', {timeOut: 5000});
                location.reload();
              }else{
                toastr.error("Opps! Something is wrong, Please try again.", 'Error!', {timeOut: 5000});
              }
            }
          });
        });
      }
    });
  }
  //  var assetUrl = "{{env('ASSET_URL')}}";

  //  var appUrl = "{{env('APP_URL')}}";
  //  let options = {
  //    method: 'POST',
  //  }
  //  const api_url =
  //    appUrl + "/owner/order_reject?order_id=" + orderId;
  //  console.log(api_url);
  //  async function getapiaccept(api_url, options) {

  //    const response = await fetch(api_url, options);

  //    var data1 = await response.json();
  //    if (data1.status == true) {

  //      $.toast({
  //        heading: 'Alert',
  //        text: 'Order has been rejected',
  //        icon: 'info',
  //        osition:"top-right",
  //       fadeDelay: 10000,
  //       offset: 40,
  //        loader: true, // Change it to false to disable loader
  //        loaderBg: '#9EC600' // To change the background
  //      });
  //      location.reload();

  //    } else {

  //      $.toast({
  //        heading: 'Alert',
  //        text: 'You are not authorized',
  //        icon: 'info',
  //        loader: true, // Change it to false to disable loader
  //        loaderBg: '#9EC600' // To change the background
  //      });
  //    }
  //  }
  //  getapiaccept(api_url, options)

//  }
 /*--------Reject Order Api Integration End-----------*/
</script>

</html>