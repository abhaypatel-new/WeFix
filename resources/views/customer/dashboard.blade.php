<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>WeFix</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" >
  <!-- Style-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"  />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.css"  />
  <link rel="stylesheet" href="{{ asset('css/skin_color.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/css/bootstrap-datepicker.min.css" integrity="sha512-34s5cpvaNG3BknEWSuOncX28vz97bRI59UnVtEEpFX536A7BtZSJHsDyFoCl8S7Dt2TPzcrCEoHBGeM4SUBDBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://cdn.datatables.net/1.13.3/css/jquery.dataTables.min.css" rel="stylesheet">
   <link rel="stylesheet" href="{{ asset('css/style_index.css') }}">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" />

  <script src="{{ asset('js/font.js') }}" crossorigin='anonymous'></script>
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>



  <style>

.proposal-hovers{
  padding-bottom: 10px;
}



    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600&display=swap');
  </style>
</head>

<body id="dashboard-body" class="loading-body">
 <header><div class="container">
    <nav class="navbar navbar-expand-lg">
      <a class="navbar-brand" href="{{url('/')}}"><a href="{{url('/')}}" title="Image from freeiconspng.com"><img src="https://www.freeiconspng.com/uploads/service-department-wrench-icon-15.png" width="80" alt="service department, wrench icon" /></a></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">




        </ul>
        <form class="form-inline my-2 my-lg-0">

          @if(auth('owner')->check())
          @php
          if(auth('owner')->user()->roleid === 4)
          {
          $count = App\Model\Notification::where(['owner_id' => auth('owner')->user()->id, 'is_read' => 0])->count();
          }else{
          $count = App\Model\Notification::where(['vendor_id' => auth('owner')->user()->id, 'is_read' => 0])->count();
          }
          @endphp
          <span style="margin-left: -55px;position: absolute;" id="inactive-notification"> <a href="#" id="notification"><img href="#" src="{{ asset('images') }}/image/Notification.png" alt="" width="30" height="30" style="cursor: pointer;"> <span class="badge badge-danger pending text-light rounded-circle border border-danger" style='font-size:10px;color:black; font-weight:500;float: right;' id="count">{{ $count }}</span></a> </span>
          <div class="dropdown">
           <button class="btn btn-primary dropdown-toggle"   type="button" data-toggle="dropdown">Hello {{auth('owner')->user()->first_name}} </button>
            <ul class="dropdown-menu" id="expend-dn">

              <li class="dropdown-item"><a href="{{ url('owner/dashboard') }}">Dashboard</a></li>
              <li class="dropdown-item"><a href="{{ url('owner/logout') }}">Logout</a></li>
            </ul>
          </div>

          @else

      <script>window.location = "{{ url('owner') }}";</script>
          @endif

        </form>
      </div>
    </nav>
  </div>
</header>
  @if(auth('owner')->check())
  <input type="hidden" value="{{auth('owner')->user()->roleid}}" id="ownerid">
  @if(auth('owner')->user()->roleid === 4)
<section id="dashboardContainer">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-3">
          <div class="side-bar">
          <div class="side-bar-main" style="position: fixed;">
          <div class="New-Work-Order" style="cursor: pointer;     background: unset;" id="NewWorkorder">
              <img src="{{ asset('images') }}/image/new-work-order.png" alt="">
              <h3 class="order-color">New Work Order</h3>
              <!-- <img class="dropdown-img" src="./image/dropdown.png" alt=""> -->
            </div>
          <button class="sidebarBtn Proposal" id="proposal" style="cursor: pointer;">
              <img src="{{ asset('images') }}/image/dashboard.png" alt="">
              <h3 class="Proposal-color">Dashboard</h3>

            </button>


            <div class="sidebarBtn Setting" style="cursor: pointer;" id="profile">
              <img src="{{ asset('images') }}/image/settings.png" alt="">
              <h3 class="setting-color">Setting</h3>
              <!-- <img class="dropdown-img" src="./image/dropdown.png" alt=""> -->
            </div>
             <div class="sidebarBtn Report" style="cursor: pointer;" id="report">
              <img src="{{ asset('images') }}/image/report.png" alt="">
              <h3 class="report-color">Report</h3>
              <!-- <img class="dropdown-img" src="./image/dropdown.png" alt=""> -->
            </div>
            <div class="sidebarBtn Reports" style="cursor: pointer;" id="FilterReport">
              <img src="{{ asset('images') }}/image/report.png" alt="">
              <h3 class="reports-color">All Report</h3>
              <!-- <img class="dropdown-img" src="./image/dropdown.png" alt=""> -->
            </div>
            <div class="sidebarBtn Setting Logout" style="cursor: pointer;">
              <img src="{{ asset('images') }}/image/SignOut.png" alt="">
              <h3><a href="{{ url('owner/logout') }}" class="logout-color hide-effect">Log Out</a></h3>
              <!-- <img class="dropdown-img" src="./image/dropdown.png" alt=""> -->
            </div>
          </div>
          </div>
      </div>
      <div class="col-md-9">

            <div class="d-flex justify-content-center">
              <div class="spinner-border" role="status" id="bodyloading">
                <span class="sr-only text-dark">Loading...</span>
              </div>
            </div>

          <div class="card dn" id="show-notification" style="display:none;">
            <h5 class="card-header">Notification</h5>
            <div class="d-flex justify-content-center">
              <div class="spinner-border" role="status" id="loading">
                <span class="sr-only">Loading...</span>
              </div>
            </div>
            <div class="search-bar m-0 mb-4">
              <input placeholder="Search Notification" type="Search" id="search-notification" class="text-dark">
              <button>
                <img src="{{ asset('images') }}/image/Search-icon.png" alt="">
              </button>
            </div>
            <div class="card pt-3" id="show-data">
            </div>

          </div>
          <div class="card dn" id="show-proposal" style="display:none;">
            <h5 class="card-header">Proposal</h5>
            <div class="d-flex justify-content-center">
              <div class="spinner-border" role="status" id="loading">
                <span class="sr-only">Loading...</span>
              </div>
            </div>
            <div class="card" id="get-proposal">
            </div>
          </div>
          <div class="card dn" id="show-new-workorder">
            <h5 class="card-header">New Work Order</h5>
            <!-- <div class="d-flex justify-content-center">
              <div class="spinner-border" role="status" id="loading">
                <span class="sr-only">Loading...</span>
              </div>
            </div> -->
            <div class="" id="get-new-work">
            </div>
          </div>
           <div class="card dn" id="view-report" style="height:fit-content;" style="display:hidden;">
            <h5 class="card-header">Report Details</h5>
            <div class="col-xl-12 float-end">
           <a class="btn btn-primary text-capitalize border-0 Printurl" data-mdb-ripple-color="dark" href="#" target="_blank"><i
              class="fas fa-print "></i> Print</a>
          <a class="btn btn-primary text-capitalize" data-mdb-ripple-color="dark"  onclick="getBackReport()"><i
              class="fa fa-arrow-left"></i> Back</a>
             </div>


            <div class="card-body" id="getsingledetails">
            </div>
          </div>
          <div class="card dn" id="view-notification" style="height:fit-content;" style="display:none;">
            <h5 class="card-header">Notification Details</h5>
            <div onclick="getBackNotification()" style="padding: 14px 20px 0px 20px;">
              <button class="btn btn-primary" style="float: right;padding: 10px 35px 10px 35px;"><i
              class="fa fa-arrow-left"></i> Back</button>
            </div>

            <div class="card-body" id="getsingleNotification">
            </div>
          </div>
          <div class="card dn" id="show-all-report" style="display:none;">
            <h5 class="card-header">Report</h5>

            <div class="card" id="get-all-report">
  <table class="inputs">
     <tr>
       <td>
          <input type='text' id='fromdate' class="datepicker" placeholder='From date'>
       </td>
       <td>
          <input type='text' id='product_name' placeholder='Enter Equipment' class="trackInput">
       </td>
        <td>
          <input type='text' id='district' placeholder='Enter District' class="trackInput">
       </td>
        <td>
          <input type='text' id='store' placeholder='Enter Store Name' class="trackInput">
       </td>
       <td>
          <input type='text' id='todate' class="datepicker" placeholder='To date'>
       </td>
       <td>
          <input type='button' value="Search" id="All-Filter">
       </td>
     </tr>
   </table>
              <table id="example-all">
            <thead>
                <tr>
                    <th>No</th>
                    <th>OrderId</th>
                    <th>Product</th>
                    <th>Store</th>
                    <th>District</th>
                    <th>Date</th>
                    <th>Submitted By</th>
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
           <div class="card dn" id="show-report" style="display:none;">
            <h5 class="card-header">Report</h5>

            <div class="card" id="get-report">
            <table class="inputs">
     <tr>
       <td>
          <input type='text' id='search_fromdate' class="datepicker" placeholder='From date'>
       </td>
       <td>
          <input type='text' id='search_name' placeholder='Type name here' class="trackInput">
       </td>
       <td>
          <input type='text' id='search_todate' class="datepicker" placeholder='To date'>
       </td>
       <td>
          <input type='button' id="btn_search" value="Search">
       </td>
     </tr>
   </table>
              <table id="example">
            <thead>
                <tr>
                    <th>No</th>
                    <th>OrderId</th>
                    <th>Product</th>
                    <th>Date</th>
                    <th>Submitted By</th>
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
          <div class="card" id="list-notification">
            <h5 class="card-header">Notification</h5>

            <div class="card" id="get-notification">
              <table id="example1">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Date</th>
                    <th>Image</th>
                    <th>Product</th>
                    <th>Owner</th>
                    <th>Vendor</th>
                    <th>Message</th>
                    <th>Status</th>
                    <th>Action</th>

                </tr>
            </thead>
            <tbody>

            </tbody>
          </table>
            </div>
          </div>
          <div class="card cnf" id="show-confirm">
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
          <div class="card" id="show-pending">
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
          <div class="card" id="show-history">
            <h5 class="card-header">History</h5>

            <div class="card" id="get-history">
              <div class="d-flex justify-content-center">
                <div class="spinner-border" role="status" id="loading-h">
                  <span class="sr-only">Loading...</span>
                </div>
              </div>
            </div>
          </div>
          <div class="card" id="show-profile">
            <h5 class="card-header">Profile Details</h5>

            <div class="card">
              <div class="notifaction-div text-center">

                <div class="title-div" style="
            padding-bottom: 40px;
        ">
                  <div class="list-div-today">

                <img src="" height="100" alt="">
                    <div class="list-title" >
                      <h6>@if(auth('owner')->user()){{auth('owner')->user()->first_name}}@else User @endif</h6>
                      <p>@if(auth('owner')->user()){{auth('owner')->user()->email}}@else User@gmail.com @endif</p>
                    </div>



                  </div>

                </div>

                <div class="div-list" id="get-profile" style="margin-bottom: 15px;">
                </div>
                <div id="edit-profile" class="btn btn-success" style="padding: 5px 25px 5px 25px;">Edit</div>&nbsp;&nbsp;<div id="cancel-profile" class="btn btn-danger" style="padding: 5px 25px 5px 25px;">Cancel</div>
              </div>
            </div>
          </div>
          <div class="card" id="edit-profile-details">
            <h5 class="card-header">Profile Update</h5>

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

                    <!--   <img src="@if(auth('owner')->user()->image != null){{env('PROFILE_URL')}}/{{auth('owner')->user()->image}}@else  {{env('ASSET_URL')}}default-profile.png @endif" height="80" alt="" id="get-upload"> -->
                        <!-- <img src="" height="80" alt="" id="profile-pic1">
                      <input type="file" name="file" id="upload" style="width:90px; margin-left:25px;"> -->

                    <div class="col-sm-12 mt-5">
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
              <button id="save-profile" class="btn btn-success" style="margin: 10px 40px;">Save</button>
              <!-- </div> -->

            </div>

          </div>

          <div  class="main-right card" id="main-tab">
            <div style="display: flex; ">
              <div class="Welcome-text">
                <h1>Welcome, @if(auth('owner')->user()){{auth('owner')->user()->first_name}}@else User @endif</h1>
                <h4>{{\Carbon\Carbon::now()->format('M, d Y');}}</h4>
              </div>
            </div>
            <div class="Proposal-heding">
              <img src="{{ asset('images') }}/image/tag.png" alt="">
              <h1>Dashboard</h1>
            </div>


    <div class="card">
     <div class="row dashboardCard" id="BoxdivCount">
    <div class="col-md-3" >
    <div class="card-body text-center">
    <div class="box bg-secondary-light pull-up boxActive"  id="confirm" style="cursor: pointer;pointer;padding: 20px 15px 20px 20px; width: 200px;"> <h5 class="">Confirmed &nbsp;&nbsp;&nbsp;&nbsp;<span id="confirmed-count"  class="count-color"></span>
            </h5>
</div>
</div>
    </div>
    <div class="col-md-3">
       <div class="card-body text-center">
         <div class="box bg-secondary-light pull-up boxActive"    id="pending" style="cursor: pointer;pointer;padding: 20px 15px 20px 20px; width: 200px;"> <h5 class="pending-count">Pending &nbsp;&nbsp;&nbsp;&nbsp;<span id="pending-count"  class="count-color"></span>
            </h5>
</div>

</div>
    </div>
    <div class="col-md-3">
       <div class="card-body text-center">
        <div class="box bg-secondary-light pull-up boxActive"   id="history" style="cursor: pointer;pointer;padding: 20px 15px 20px 20px; width: 200px;"> <h5 class="">History &nbsp;&nbsp;&nbsp;&nbsp;<span id="history-count"  class="count-color"></span>
            </h5>
</div>
    </div>
    </div>


    <div class="col-md-3">
<div class="card-body text-center">
        <div class="box bg-secondary-light pull-up boxActive"    id="Workorder" style="cursor: pointer;pointer;padding: 20px 15px 20px 20px; width: 200px;"> <h5 class="">Work Order &nbsp;&nbsp;&nbsp;&nbsp;<span id="work-count"  class="count-color"></span>
            </h5>
</div>
    </div>

  </div>
  </div>
  <hr class="mt-0">
 <div class="" id="Proposal-card">

<div class="row">
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Spending Chart</h5>

         <canvas id="myChart" height="100px"></canvas>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Last Month Spending</h5>

         <canvas id="myPieChart" height="100px"></canvas>
      </div>
    </div>
  </div>
</div>

  </div>



  </div>

  </div>


        </div>
      </div>
    </div>
  </section>
  <div class="modal fade" id="exampleModalPopups"tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelss" aria-hidden="true">
  <div class="modal-dialog w-800" role="document">
    <div class="modal-content ">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabelss">Invoice details</h5>
        <button type="button" class="close btn btn-secondary" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="">
       <div class="card-body" id="getPopupDetails">
    </div>

    </div>
  </div>
</div>
</div>
  @else
  <section id="dashboardContainer">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-3">
        <div class="side-bar">
          <div class="side-bar-main" style="position: fixed;">

          <!-- <div class="New-Work-Order" style="cursor: pointer;" id="newWorkOrder">
            <img src="{{ asset('images') }}/image/new-work-order.png" alt="">
            <h3 class="order-color">New Work Order</h3>
             <img class="dropdown-img" src="./image/dropdown.png" alt=""> -->
          <!-- </div>  -->
        <button class="sidebarBtn Proposal" id="proposal" style="cursor: pointer;">
            <img src="{{ asset('images') }}/image/dashboard.png" alt="">
            <h3 class="Proposal-color">Dashboard</h3>

          </button>

          <div class="Maintenance" style="cursor: pointer;     background: unset;" id="Maintenance">
              <img src="{{ asset('images') }}/image/maintenance.png" alt="">
              <h3 class="maintenance-color">Maintenance</h3>
              <!-- <img class="dropdown-img" src="./image/dropdown.png" alt=""> -->
            </div>
          <div class="sidebarBtn Setting" style="cursor: pointer;" id="profile">
            <img src="{{ asset('images') }}/image/settings.png" alt="">
            <h3 class="setting-color">Setting</h3>
            <!-- <img class="dropdown-img" src="./image/dropdown.png" alt=""> -->
          </div>
           <div class="sidebarBtn Report" style="cursor: pointer;" id="report">
            <img src="{{ asset('images') }}/image/report.png" alt="">
            <h3 class="report-color">Report</h3>
            <!-- <img class="dropdown-img" src="./image/dropdown.png" alt=""> -->
          </div>
          <div class="sidebarBtn Setting Logout" style="cursor: pointer;">
            <img src="{{ asset('images') }}/image/SignOut.png" alt="">
            <h3><a href="{{ url('owner/logout') }}" class="logout-color">Log Out</a></h3>
            <!-- <img class="dropdown-img" src="./image/dropdown.png" alt=""> -->
          </div>

        </div>
        </div>
      </div>
      <div class="col-md-9">
      <div class="d-flex justify-content-center">
              <div class="spinner-border" role="status" id="bodyloading">
                <span class="sr-only">Loading...</span>
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
           <div class="card " id="view-report">
            <h5 class="card-header">Report-Details</h5>
            <div class="col-xl-12 float-end">
           <a class="btn btn-primary text-capitalize border-0 Printurl" data-mdb-ripple-color="dark" href="#" target="_blank"><i
              class="fas fa-print "></i> Print</a>
          <a class="btn btn-primary text-capitalize" data-mdb-ripple-color="dark"  onclick="getBackReport()"><i
              class="fa fa-arrow-left"></i> Back</a>
             </div>

            <div class="card" id="getsingledetails">
            </div>
          </div>
          <div class="card " id="view-notification" style="height:fit-content;">
            <h5 class="card-header">Notification Details</h5>
            <div onclick="getBackNotification()" style="padding: 14px 20px 0px 20px;">
            <button class="btn btn-primary" style="float: right;padding: 10px 35px 10px 35px;"><i
              class="fa fa-arrow-left"></i> Back</button>
            </div>
             <div class="card-body" id="getsingleNotification">
            </div>
          </div>
            <div class="card" id="show-maintenance">
            <h5 class="card-header">Maintenace</h5>
            <div onclick="addPlan()" style="padding: 14px 20px 0px 20px;">
            <button class="btn btn-primary" style="float: right;padding: 10px 35px 10px 35px;"><i
              class="fa fa-plus"></i> Add Plan</button>
            </div>

         <!--    <h2 style="text-align:center">Maintenance Plans</h2>
              <div class="card" id="get-plan-card" style="flex-direction: initial !important;">

              </div>
             <hr> -->
            <div class="card" id="get-maintenance">
               <table id="maintenance-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Price</th>
                    <th>Features</th>
                    <th>Action</th>

                </tr>
            </thead>
            <tbody>

            </tbody>
          </table>
            </div>
          </div>

          <div class="card " id="show-report">
            <h5 class="card-header">Report</h5>

            <div class="card" id="get-report">
              <table id="example">
            <thead>
                <tr>
                    <th>No</th>
                    <th>OrderId</th>
                    <th>Product</th>
                    <th>Date</th>
                    <th>Submitted By</th>
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
          <div class="card" id="list-notification">
            <h5 class="card-header">Notification</h5>

            <div class="card" id="get-notification">
              <table id="example1">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Date</th>
                    <th>Image</th>
                    <th>Product</th>
                    <th>Owner</th>
                    <th>Vendor</th>
                    <th>Message</th>
                    <th>Status</th>
                    <th>Action</th>

                </tr>
            </thead>
            <tbody>

            </tbody>
          </table>
            </div>
          </div>
          <div class="card cnf" id="show-confirm">
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
          <div class="card" id="show-pending">
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
          <div class="card" id="show-history">
            <h5 class="card-header">History</h5>

            <div class="card" id="get-history">
              <div class="d-flex justify-content-center">
                <div class="spinner-border" role="status" id="loading-h">
                  <span class="sr-only">Loading...</span>
                </div>
              </div>
            </div>
          </div>
          <div class="card" id="show-profile">
            <h5 class="card-header">Profile Details</h5>

            <div class="card">
              <div class="notifaction-div text-center">

                <div class="title-div" style="
            padding-bottom: 40px;">
                  <div class="list-div-today">


                    <div class="list-title">
                      <h6>@if(auth('owner')->user()){{auth('owner')->user()->first_name}}@else User @endif</h6>
                      <p>@if(auth('owner')->user()){{auth('owner')->user()->email}}@else User@gmail.com @endif</p>
                    </div>
                  </div>
                </div>
                <div class="div-list" id="get-profile" style="margin-bottom: 15px;">
                </div>
                <div id="edit-profile" class="btn btn-success" style="padding: 5px 25px 5px 25px;">Edit</div>&nbsp;&nbsp;<div id="cancel-profile" class="btn btn-danger" style="padding: 5px 25px 5px 25px;">Cancel</div>
              </div>
            </div>
          </div>
          <div class="card" id="edit-profile-details">
            <h5 class="card-header">Profile Update</h5>

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
                    <div class="col-sm-2 text-white">
                     <!--  <img src="@if(auth('owner')->user()->image != null){{env('PROFILE_URL')}}/{{auth('owner')->user()->image}}@else  {{env('ASSET_URL')}}default-profile.png @endif" height="80" alt="" id="get-upload"> -->
                        <!-- <img src="" height="80" alt="" id="profile-pic1">
                      <input type="file" name="file" id="upload" style="width:90px; margin-left:25px;"> -->
                    </div>
                    <div class="col-sm-10 mt-5">
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
              <button id="save-profile" class="btn btn-success" style="margin: 10px 40px;">Save</button>
              <!-- </div> -->

            </div>

          </div>

          <div  class="main-right card" id="main-tab">
            <div style="display: flex; ">
              <div class="Welcome-text">
                <h1>Welcome, @if(auth('owner')->user()){{auth('owner')->user()->first_name}}@else User @endif</h1>
                <h4>{{\Carbon\Carbon::now()->format('M, d Y');}}</h4>
              </div>
            </div>
            <div class="Proposal-heding">
              <img src="{{ asset('images') }}/image/tag.png" alt="">
              <h1>Dashboard</h1>
            </div>
<div class="card">
            <div class="row dashboardCard">
    <div class="col-md-4" >
    <div class="card-body text-center">
    <div class="box bg-secondary-light pull-up" id="confirm" style="cursor: pointer;pointer;padding: 20px 15px 20px 20px; width: 265px;"> <h5 class="">Confirmed &nbsp;&nbsp;&nbsp;&nbsp;<span id="confirmed-count"  class="count-color"></span>
            </h5>
       </div>
</div>
    </div>
    <div class="col-md-4">
       <div class="card-body text-center">
         <div class="box bg-secondary-light pull-up" id="pending" style="cursor: pointer;pointer;padding: 20px 15px 20px 20px; width: 265px;"> <h5 class="pending-count">Pending &nbsp;&nbsp;&nbsp;&nbsp;<span id="pending-count"  class="count-color"></span>
            </h5>
       </div>

</div>
    </div>
    <div class="col-md-4">
       <div class="card-body text-center">
        <div class="box bg-secondary-light pull-up" id="history" style="cursor: pointer;pointer;padding: 20px 15px 20px 20px; width: 265px;"> <h5 class="">History &nbsp;&nbsp;&nbsp;&nbsp;<span id="history-count"  class="count-color"></span>
            </h5>
       </div>

</div>
    </div></div>

   </div>
  <hr class="mt-0">
    <div class="" id="Proposal-card">

<div class="row">
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Earnings Chart</h5>

         <canvas id="myChart" height="100px"></canvas>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Last Month Earnings</h5>

         <canvas id="myPieChart" height="100px"></canvas>
      </div>
    </div>
  </div>
</div>

  </div>

</div>
</section>
 </div>
  <!-----------modal-open--------------->

  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog w-800" role="document">
    <div class="modal-content ">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
        <button type="button" class="close btn btn-secondary" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form method="post" id="form_id">
                                        @csrf
           <input type="hidden" class="form-control" name="order_id"id="order_id">

          <div class="">
   <div class="row clearfix" style="margin-bottom:20px;">
    <div class="pull-right col-md-6" style="width:100% !important;">
       <div class="form-group">
          <p class="mb-0">INVOICE TO</p>
                    <h5 class="mb-0"><b style="color: #495057;">Mr. {{auth('owner')->user()->first_name}} {{auth('owner')->user()->last_name}}</b></h5>
                    <p class="mb-0">{{auth('owner')->user()->address}}</p>
                    <p class="mb-0">{{auth('owner')->user()->phone}}</p>
                    <p class="mb-0">{{auth('owner')->user()->email}}</p>

  </div>
    </div>
    <div class="pull-right col-md-6" style="width:100% !important;">
       <label for="exampleFormControlTextarea1" style="color: #495057;">To:</label>
    <input type="text" class="form-control" id="owner-name" placeholder="Enter Name"></textarea>
    <textarea class="form-control" id="owner-description" rows="3" placeholder="Your Notes"></textarea>
    </div>
  </div>
  <div class="row clearfix">
    <div class="col-md-12">
      <table class="table table-bordered table-hover" id="tab_logic">
        <thead>
          <tr>
            <th class="text-center"> # </th>
            <th class="text-center"> Product </th>
            <th class="text-center"> Qty </th>
            <th class="text-center"> Price </th>
            <th class="text-center"> Total </th>
          </tr>
        </thead>
        <tbody>
          <tr id='addr0'>
            <td>1</td>
            <td><input type="text" name='product[]'  placeholder='Enter Product Name' class="form-control" id="inv-product_name"/></td>
            <td><input type="number" name='qty[]' placeholder='Enter Qty' class="form-control qty" step="0" min="0"/></td>
            <td><input type="number" name='price[]' placeholder='Enter Unit Price' class="form-control price" step="0.00" min="0"/></td>
            <td><input type="number" name='total[]' placeholder='0.00' class="form-control total" readonly id="inv-order_amount"/></td>
          </tr>
          <tr id='addr1'></tr>
        </tbody>
      </table>
    </div>
  </div>
  <div class="row clearfix">
    <div class="col-md-12">
      <a id="add_row" class="btn btn-secondary  pull-left">Add Row</a>
      <a id='delete_row' class="pull-right btn btn-secondary ">Delete Row</a>
    </div>
  </div>
  <div class="row clearfix" style="margin-top:20px;">
    <div class="pull-right col-md-6" style="width:100% !important;">
       <div class="form-group">
    <label for="exampleFormControlTextarea1">Notes:</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Your Notes" name="invoice_notes" required></textarea>
  </div>
    </div>
    <div class="pull-right col-md-6" style="width:100% !important;">
      <table class="table table-bordered table-hover" id="tab_logic_total">
        <tbody>
          <tr>
            <th class="text-center">Sub Total</th>
            <td class="text-center"><input type="number" name='sub_total' placeholder='0.00' class="form-control" id="sub_total" readonly/></td>
          </tr>
           <tr>
            <th class="text-center">Track Charges</th>
            <td class="text-center"><div class="input-group mb-2 mb-sm-0">
                <input type="number" class="form-control" id="track" placeholder='0.00' name="track" value="0.00">

              </div></td>
          </tr>
          <tr>
            <th class="text-center">Labour Charges</th>
            <td class="text-center"><div class="input-group mb-2 mb-sm-0">
                <input type="number" class="form-control" id="labour" placeholder='0.00' name="labour" value="0.00">

              </div></td>
          </tr>
           <th class="text-center">Extra Charges</th>
            <td class="text-center"><div class="input-group mb-2 mb-sm-0">
                <input type="number" class="form-control" id="extra" placeholder='0.00' name="extra" value="0.00">

              </div></td>
          </tr>
          <tr>
            <th class="text-center">Tax</th>
            <td class="text-center"><div class="input-group mb-2 mb-sm-0">
                <input type="number" class="form-control" id="tax" placeholder="0">
                <div class="input-group-addon">%</div>
              </div></td>
          </tr>

          <tr>
            <th class="text-center">Tax Amount</th>
            <td class="text-center"><input type="number" name='tax_amount' id="tax_amount" placeholder='0.00' class="form-control" readonly/></td>
          </tr>
          <tr>
            <th class="text-center">Grand Total</th>
            <td class="text-center"><input type="number" name='total_amount' id="total_amount" placeholder='0.00' class="form-control" readonly/></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="button" id="submit" name="submit" value="Submit">
         <!-- <button type="button" class="btn btn-primary" id="#submit">Submit</button> -->
      </div>
        </form>
    </div>
  </div>
</div>
<!---------- Add Plan Modal----------------->



<div class="modal fade" id="addPlanModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog w-800" role="document">
    <div class="modal-content ">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Plan</h5>
        <button type="button" class="close btn btn-secondary" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" id="form_plan" name="form_plan">
          <div class="mb-3">
             <input type="hidden" class="form-control" id="plan-id" name="id">
            <label for="plan-name" class="col-form-label">Name:</label>
            <input type="text" class="form-control" id="plan-name" name="name"><span id="pname" style="display:none;"></span>
          </div>
             @csrf

           <div class="mb-3">
             <div class="row">
    <div class="col">
      <label for="plan-name" class="col-form-label">Duration</label>
            <input type="date" class="form-control" id="plan-start" name="start_date"><span id="pstart" style="display:none;"></span>
    </div>
    <div class="col">
     <label for="plan-name" class="col-form-label">Duration</label>
            <input type="date" class="form-control" id="plan-end" name="end_date"><span id="pend" style="display:none;"></span>
    </div>

  </div>

          </div>
           <div class="mb-3">
            <label for="plan-price" class="col-form-label">Price:</label>
            <input type="number" class="form-control" id="plan-price" maxlength="10" name="price"><span id="pprice" style="display:none;"></span>
          </div>

           <div class="mb-3">
              <table class="table table-bordered table-hover" id="tab_logics">
        <thead>

        </thead>
        <tbody>
          <tr id='addrr0'>
            <td >1</td>
            <td>
           Features: <input type="text" class="form-control" id="plan-freaturs"name="features[]"></td>
          </tr>
          <tr id='addrr1'></tr>
        </tbody>
      </table>
       <div class="row clearfix">
    <div class="col-md-12">
      <a id="add_rows" class="btn btn-secondary  pull-left">Add Row</a>
      <a id='delete_rows' class="pull-right btn btn-secondary ">Delete Row</a>
    </div>
  </div>
         <!-- <a id="add_rows" class="btn btn-secondary  pull-left">Add Row</a>
      <a id='delete_rows' class="pull-right btn btn-secondary ">Delete Row</a> -->
          </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">Description:</label>
            <textarea class="form-control" id="plan-description" name="description"></textarea>
          </div>
          <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="button"class="btn btn-primary" onclick="CreatePlan()">Save</button>
      </div>
       </form>
      </div>


    </div>
  </div>
</div>



<!-----------End Plan Modal---------------->
<!----------------invoice- details----------->
 <div class="modal fade" id="exampleModalInvoice" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog w-800" role="document">
    <div class="modal-content ">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Invoice details</h5>
        <button type="button" class="close btn btn-secondary" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <div class="card-body" id="getinvoicedetails">
    </div>

    </div>
  </div>
</div>
<!---------------modal-close--------->
  @endif
  @endif
</body>
<!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script> -->


<!-- <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
<script type="text/javascript" src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/printThis/1.15.0/printThis.min.js" integrity="sha512-d5Jr3NflEZmFDdFHZtxeJtBzk0eB+kkRXWFQqEc1EKmolXjHm2IKCA7kTvXBNjIYzjXfD5XzIjaaErpkZHCkBg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  </script>
  <script src="{{ asset('assets/vendor_components/datatable/datatables.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js" integrity="sha512-zlWWyZq71UMApAjih4WkaRpikgY9Bz1oXIW5G0fED4vk14JjGlQ1UmkGM392jEULP8jbNMiwLWdM8Z87Hu88Fw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
   -->
  <!-- <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script> -->
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
<script type="text/javascript" src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/printThis/1.15.0/printThis.min.js" integrity="sha512-d5Jr3NflEZmFDdFHZtxeJtBzk0eB+kkRXWFQqEc1EKmolXjHm2IKCA7kTvXBNjIYzjXfD5XzIjaaErpkZHCkBg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  </script>
  <script src="{{ asset('assets/vendor_components/datatable/datatables.min.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/js/bootstrap-datepicker.min.js" integrity="sha512-LsnSViqQyaXpD4mBBdRYeP6sRwJiJveh2ZIbW41EBrNmKxgr/LFZIiWT6yr+nycvhvauz8c2nYMhrP80YhG7Cw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
  <script type="text/javascript">
    $(window).on('load', function(){
       // getCardPlan()
      getPlan()

    $("#dashboard-body").css('backgrount', 'transparent');
    $(".dn").css('display', 'none');
    $("#show-history").hide();
     $("#show-maintenance").hide();
    $("#view-notification").hide();
    $("#show-notification").hide();
    $("#list-notification").hide();
     $("#show-new-work").hide();
    $("#show-proposal").hide();
    $("#show-confirm").hide();
    $("#show-pending").hide();
     $("#show-new-work").hide();
    $("#show-profile").hide();
    $("#edit-profile-details").hide();
    setTimeout(
  function()
  {
    $('#dashboard-body').removeClass('loading-body');
    $("#dashboard-body").css('backgrount', '#f1f3f5')
  }, 500);


   $('#bodyloading').fadeOut(500);
});
  $(document).ready(function() {


    $("#fromdate" ).datepicker({
      dateFormat: 'yy-mm-dd'

   });
   $("#todate" ).datepicker({
      'dateFormat': 'yy-mm-dd'

   });
  $("#todate , #fromdate, .ui-corner-all" ).click(function(){
    $(".ui-datepicker-calendar thead").css('background-color', 'black');
     $(".ui-datepicker-title span").css('color', 'black')
  });

   $("#btn_search").click(function(){
  var table = $('#example').DataTable().ajax.reload();

        var start = $('#search_fromdate').val();
        var end = $('#search_todate').val();

        var From = new Date(start);
        var To = new Date(end);
        month = '' + (From.getMonth() + 1),
        day = '' + From.getDate(),
        year = From.getFullYear();
        month1 = '' + (To.getMonth() + 1),
        day1 = '' + To.getDate(),
        year1 = To.getFullYear();

    if (month.length < 2)
        month = '0' + month;
    if (day.length < 2)
        day = '0' + day;
    if (month1.length < 2)
        month1 = '0' + month1;
    if (day1.length < 2)
        day1 = '0' + day1;
var formattedFrom = year + '-' + month + '-' + day;
var formattedTo = year1 + '-' + month1 + '-' + day1;
        console.log( "&&&&& = "+formattedFrom)
        console.log( "&&&&& = "+formattedTo)
        // table.column(3).search(formattedFrom, formattedTo, true, false).draw();

        // table.column(3).search(formattedTo, true, false).draw();
        $.fn.dataTable.ext.search.push(function (settings, data, dataIndex) {
    // var min = parseInt(minEl.val(), 10);
    // var max = parseInt(maxEl.val(), 10);
   console.log('data'+data)
    var age = parseFloat(data[3]) || 0; // use data for the age column

    if (
        (isNaN(month) && isNaN(month1)) ||
        (isNaN(month) && age <= month1) ||
        (month <= age && isNaN(month1)) ||
        (month <= age && age <= month1)
    ) {
        return true;
    }

    return false;
});


      });
//  var start = $('#search_fromdate').val();
//         var end = $('#search_todate').val();
//         var From = new Date(start);
//         var To = new Date(end);
//         month = '' + (From.getMonth() + 1),
//         day = '' + From.getDate(),
//         year = From.getFullYear();
//         month1 = '' + (To.getMonth() + 1),
//         day1 = '' + To.getDate(),
//         year1 = To.getFullYear();

//     if (month.length < 2)
//         month = '0' + month;
//     if (day.length < 2)
//         day = '0' + day;
//     if (month1.length < 2)
//         month1 = '0' + month1;
//     if (day1.length < 2)
//         day1 = '0' + day1;
// var formattedFrom = year + '-' + month + '-' + day;
// var formattedTo = year1 + '-' + month1 + '-' + day1;
//         console.log( "&&&&& = "+formattedFrom)
//         console.log( "&&&&& = "+formattedTo)

        var st = $('#search_fromdate');
        var en = $('#search_todate');
st.on('input', function () {
  alert("df")
    table.draw();
});
en.on('input', function () {
  alert("154")
    table.draw();
});
    $("#show-new-workorder").hide();
    $("#main-tab").show();

    $("#show-history").hide();
    $("#view-notification").hide();
    $("#show-notification").hide();
    $("#list-notification").hide();
     $("#show-new-work").hide();
    $("#show-proposal").hide();
    $("#show-confirm").hide();
    $("#show-pending").hide();
     $("#show-new-work").hide();
    $("#show-profile").hide();
    $("#edit-profile-details").hide();
    const charturl =
  '{!! route("get.chart")!!}';

// Defining async function
async function getchart(charturl) {

  // Storing response
  const response = await fetch(charturl);

  // Storing data in form of JSON
  var data = await response.json();
  console.log(data);

  showchart(data);
}
// Calling that async function
getchart(charturl);
 function showchart(data)
 {

   console.log(data.data.value)
    const datas = {
        labels: data.data.labels,
        datasets: [{
          label: 'Earning',
          backgroundColor: '#6759FF',
          borderColor: '#dee2e6ed',
          data: data.data.value,
        }]
      };

      const config = {
        type: 'line',
        data: datas,
        options: {}
      };

      const myChart = new Chart(
        document.getElementById('myChart'),
        config
      );
 }
  const piecharturl =
  '{!! route("get.pie.chart")!!}';
 async function getpiechart(counturl) {

  // Storing response
  const response = await fetch(counturl);

  // Storing data in form of JSON
  var data = await response.json();
  console.log(data);

  showpiechart(data);
}
// Calling that async function
getpiechart(charturl);
 function showpiechart(data)
 {

   console.log(data.data.value)
    const datas = {
        labels: data.data.labels,
        datasets: [{
          label: 'Earning',
          backgroundColor: '#6759FF',
          borderColor: '#dee2e6ed',
          data: data.data.value,
        }]
      };

      const config = {
        type: 'pie',
        data: datas,
        options: {}
      };

      const myChart = new Chart(
        document.getElementById('myPieChart'),
        config
      );
 }

  });
</script>
<script>
  $(document).ready(function() {

    $("#main-tab").show();
    $("#show-new-workorder").hide();
     $("#show-maintenances").hide();
      $("#edit-profile-details").hide();
      $("#show-notification").hide();
      $("#list-notification").hide();
      $("#view-notification").hide();
      $("#show-history").hide();
      $("#show-proposal").hide();
      $("#show-confirm").hide();
      $("#show-pending").hide();
      $("#show-profile").hide();
      $("#show-report").hide();
      $("#view-report").hide();
      var i=1;
    $("#add_row").click(function(){b=i-1;
        $('#addr'+i).html($('#addr'+b).html()).find('td:first-child').html(i+1);
        $('#tab_logic').append('<tr id="addr'+(i+1)+'"></tr>');
        i++;
    });
    $("#delete_row").click(function(){
      if(i>1){
    $("#addr"+(i-1)).html('');
    i--;
    }
    calc();
  });

  $('#tab_logic tbody').on('keyup change',function(){
    calc();
  });
  $('#tax').on('keyup change',function(){
    calc_total();
  });


  });
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

  /*--------View-Report-Start---------*/

  function viewReport(id)
  {
     $("#show-report").hide();
     $("#view-report").show();
      var assetUrl = "{{env('ASSET_URL')}}";
      var purl = "{{env('PROFILE_URL')}}";
      var appUrl = "{{env('APP_URL')}}";
      var uid = $("#ownerid").val();
    const api_url =
      '{!! route("view.report")!!}?id=' + id;

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


           let pimg = data.data.thumbnail_image == null ? assetUrl + "product-dummy.png" : assetUrl+'images/products/'+data.data.thumbnail_image;
            let user = data.data.image == null ? purl + "default-profile.png" : data.data.image;
            let name = uid == 4?data.data.vname:data.data.owner_name;
            let notes = uid == 4?'<p>Thank you for your Maintenance</p>':'<p>Thank you</p>';
            let phone = uid == 4?data.data.vendor_phone:data.data.phone;
            let address = uid == 4?data.data.vendor_street_address:data.data.street_address;
            // let tax = parseFloat(13 / 100) * parseFloat(data.data.order_amount) ;
            // let grandTotal = Math.round(parseFloat(data.data.order_amount) + parseFloat(tax));
          const href =
      '{!! url("generate-invoice")!!}/' + data.data.id;
         $(".Printurl").attr('href', href);
           tab =`
      <div class="row d-flex align-items-baseline">
        <div class="col-xl-12">
          <p style="color: #6759FF;font-size: 20px; margin-left:5px;">Invoice >> <strong class="text-danger">ID: #${data.data.order_id}</strong></p>
        </div>

        </div>
        <hr>
      </div>

      <div class="container" style="margin:0px;">
        <div class="col-md-12">
          <div class="text-center">
            <i class="fa fa-tools fa-4x ms-0" style="color:#6759FF ;"></i>
            <p class="pt-0">Maintenance Report</p>
          </div>

        </div>


        <div class="row">
          <div class="col-xl-7">
            <ul class="list-unstyled">
              <li class="text-muted"><span style="color:#5d9fc5 ;">${name}</span></li>
              <li class="text-muted">${address}, Indore</li>
              <li class="text-muted">MP, India</li>
              <li class="text-muted"><i class="fa fa-phone-alt" style="color:black;"></i>${phone}</li>
            </ul>
          </div>
          <div class="col-xl-5">
            <p class="text-muted">Invoice</p>
            <ul class="list-unstyled">
              <li class="text-muted"><i class="fas fa-circle" style="color:#6759FF ;"></i> <span
                  class="fw-bold text-dark">ID:</span>#${data.data.order_id}</li>
              <li class="text-muted"><i class="fas fa-circle" style="color:#6759FF ;"></i> <span
                  class="fw-bold text-dark">Invoice Date: </span>${data.data.date} ${data.data.time}</li>
              <li class="text-muted"><i class="fas fa-circle" style="color:#6759FF ;"></i> <span
                  class="me-1 fw-bold text-dark">Status:</span><span class="badge bg-warning text-black fw-bold">
                  ${data.data.payment_status}</span></li>
            </ul>
          </div>
        </div>

        <div class="row my-2 mx-1 justify-content-center">
          <table class="table table-striped table-borderless">
            <thead style="background-color:#6759FF ;" class="text-white">
              <tr>
                <th scope="col">#</th>
                 <th scope="col">Image</th>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Qty</th>
                <th scope="col">Unit Price</th>
                <th scope="col">Amount</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td scope="row">1</td>
                <td><img src="${pimg}" height="50" width="50" alt="" class="img-thumbnail hover-zoom"></td>
                <td>${data.data.product_name}</td>
                <td>${data.data.description}</td>
                <td>${data.data.qty}</td>
                <td>$${data.data.price}</td>
                <td>$${data.data.total}</td>
              </tr>

            </tbody>

          </table>
        </div>
        <div class="row">
          <div class="col-xl-6">
            <p class="ms-3">Vendor Note: ${data.data.note}</p>

          </div>
          <div class="col-xl-5 text-right">
          <ul class="list-unstyled">
              <li class="text-muted ms-3"><span class="text-dark me-4 p-10">SubTotal</span>$${data.data.sub_total}</li>
              <li class="text-muted ms-3 mt-2"><span class="text-dark me-4 p-10">Track Charges</span>$${data.data.track_charge}</li>
              <li class="text-muted ms-3 mt-2"><span class="text-dark me-4 p-10">Labour Charges</span>$${data.data.labour_charge}</li>
              <li class="text-muted ms-3 mt-2"><span class="text-dark me-4 p-10">Extra Charges</span>$${data.data.extra_charge}</li>
              <li class="text-muted ms-3 mt-2"><span class="text-dark me-4 p-10">Tax</span>$${data.data.tax}</li>
            </ul>
            <hr>

            <p class="text-black "><span class="text-dark me-3 p-10"> Total Amount</span><span
                style="font-size: 20px; font-weight: 600;" class="text-dark">$${data.data.order_amount}</span></p>
          </div>
          <div class="col-xl-1 text-right">
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-xl-10">
           ${notes}
          </div>

        </div>


</div>`;
           document.getElementById("getsingledetails").innerHTML = tab;

      } else {
        alert("failed")
        $("#view-report").show();
      }
    }
  }
  /*--------View-Report-End---------*/
  function getBackReport(){
  $(".proposal-card-div").css("display", "none");

$(".Report").css("background-color", "#e4e6ef");
$(".report-color").css("color", "#6759ff");
$(".New-Work-Order").css("background-color", "#ffffff");
$(".order-color").css("color", "#000");
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
$("#show-new-workorder").hide();
$("#show-history").hide();
$("#show-proposal").hide();
$("#show-confirm").hide();
$("#show-pending").hide();
$("#show-profile").hide();
$("#show-report").show();
$("#list-notification").hide();
$("#view-report").hide();
$("#view-notification").hide();
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
          { data: 'id', name: 'id',
            render: function (data, type, row, meta) {
  return meta.row + meta.settings._iDisplayStart + 1;
} },

          { data: 'order_id', name: 'order_id' },
          { data: 'product_name', name: 'product_name' },
          { data: 'date', name: 'date' },
          { data: 'owner_name', name: 'owner_name' },
          { data: 'vendor_name', name: 'vendor_name' },
          { data: 'order_amount', name: 'order_amount' },
          { data: 'order_status', name: 'order_status' },
          { data: 'action', name: 'action' },


           ],

           aaSorting: [[0, 'desc']],
           dom: 'Bfrtip',
          buttons: [{
extend: "excel",
extend: "pdf",
extend: "print",
className: "btn-sm btn-primary p-2",
titleAttr: 'Export in Excel',
text: 'Excel',
init: function(api, node, config) {
 $(node).removeClass('btn-secondary')
}
},{
extend: "pdf",
className: "btn-sm btn-primary p-2",
titleAttr: 'Export in Pdf',
text: 'PDF',
init: function(api, node, config) {
 $(node).removeClass('btn-secondary')
}
},{
extend: "print",
className: "btn-sm btn-primary p-2",
titleAttr: 'Export in Print',
text: 'Print',
init: function(api, node, config) {
 $(node).removeClass('btn-secondary')
}
}]


  });
}
function getBackNotification()
{

  $(".proposal-card-div").css("display", "none");

$(".Report").css("background-color", "#ffffff");
$(".report-color").css("color", "#000");
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
$("#show-report").hide();
$("#view-report").hide();
$("#list-notification").show();
$("#view-notification").hide();
$("#edit-profile-details").hide();
var assetUrl = "{{env('ASSET_URL')}}";
 var profileUrl = "{{env('PROFILE_URL')}}";

var appUrl = "{{env('APP_URL')}}";

// const api_url = '{{route('report')}}';

  $('#example1').DataTable({
      retrieve:true,
      destroy:true,
      ajax: '{!! route('list.notification') !!}',
      columns: [
          { data: 'id', name: 'id',
            render: function (data, type, row, meta) {
        return meta.row + meta.settings._iDisplayStart + 1;
    } },
          { data: 'createdAt', name: 'createdAt' },
          { data: 'image', name: 'image' },
          { data: 'product_name', name: 'product_name' },
          { data: 'owner_name', name: 'owner_name' },
          { data: 'vendor_name', name: 'vendor_name' },
          { data: 'message', name: 'message' },
          { data: 'status', name: 'is_read' },
          { data: 'action', name: 'action' },


           ],
           aaSorting: [[0, 'desc']],
           "fnRowCallback": function( nRow, aData, iDisplayIndex, iDisplayIndexFull ) {

          $('th', nRow).css('background-color', '#dacfcf');

  }

  });
}
    /*--------Start-Notification---------------*/

$("#notification").click(function() {

$(".proposal-card-div").css("display", "none");

$(".Report").css("background-color", "#ffffff");
$(".report-color").css("color", "#000");
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
$("#show-report").hide();
$("#view-report").hide();
$("#list-notification").show();
$("#view-notification").hide();
$("#edit-profile-details").hide();
var assetUrl = "{{env('ASSET_URL')}}";
 var profileUrl = "{{env('PROFILE_URL')}}";

var appUrl = "{{env('APP_URL')}}";

// const api_url = '{{route('report')}}';

  $('#example1').DataTable({
      retrieve:true,
      destroy:true,
      ajax: '{!! route('list.notification') !!}',
      columns: [
          { data: 'id', name: 'id',
            render: function (data, type, row, meta) {
        return meta.row + meta.settings._iDisplayStart + 1;
    } },
          { data: 'createdAt', name: 'createdAt' },
          { data: 'image', name: 'image' },
          { data: 'product_name', name: 'product_name' },
          { data: 'owner_name', name: 'owner_name' },
          { data: 'vendor_name', name: 'vendor_name' },
          { data: 'message', name: 'message' },
          { data: 'status', name: 'is_read' },
          { data: 'action', name: 'action' },


           ],
           aaSorting: [[0, 'desc']],
           "fnRowCallback": function( nRow, aData, iDisplayIndex, iDisplayIndexFull ) {

          $('th', nRow).css('background-color', '#dacfcf');

  }

  });
});

/*-------------End-Notification-----------*/
 /*--------View-Report-Start---------*/
 function notificationShow(){

$(".proposal-card-div").css("display", "none");

$("#inactive-notification").css("background-color", "dimgray");
$("#inactive-notification").css("border-radius", "5px");
$(".Report").css("background-color", "#ffffff");
$(".report-color").css("color", "#000");
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
$("#show-report").hide();
$("#view-report").hide();
$("#list-notification").show();
$("#view-notification").hide();
$("#edit-profile-details").hide();
var assetUrl = "{{env('ASSET_URL')}}";
 var profileUrl = "{{env('PROFILE_URL')}}";

var appUrl = "{{env('APP_URL')}}";

// const api_url = '{{route('report')}}';

  $('#example1').DataTable({
      retrieve:true,
      destroy:true,
      ajax: '{!! route('list.notification') !!}',
      columns: [
          { data: 'id', name: 'id' },
          { data: 'createdAt', name: 'createdAt' },
          { data: 'image', name: 'image' },
          { data: 'product_name', name: 'product_name' },
          { data: 'owner_name', name: 'owner_name' },
          { data: 'vendor_name', name: 'vendor_name' },
          { data: 'message', name: 'message' },
          { data: 'status', name: 'is_read' },
          { data: 'action', name: 'action' },


           ],
           "fnRowCallback": function( nRow, aData, iDisplayIndex, iDisplayIndexFull ) {

          $('th', nRow).css('background-color', '#dacfcf');

  }

  });
}
 function viewNotification(id)
  {
     $("#show-report").hide();
     $("#view-report").hide();
     $("#list-notification").hide();
     $("#view-notification").show();
      var assetUrl = "{{env('ASSET_URL')}}";
      var purl = "{{env('PROFILE_URL')}}";
      var appUrl = "{{env('APP_URL')}}";
      var uid = $("#ownerid").val();
    const api_url =
      '{!! route("view.notification")!!}?id=' + id;

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
console.log(data);
      let tab = '';
      let count = 0;
      // Loop to access all rows
      if (data.status == 'true') {


           let img = data.data.thumbnail_image == null ? assetUrl + "product-dummy.png" : assetUrl+'images/products/'+data.data.thumbnail_image;
           let vendor = data.data.vendor_image == null ? assetUrl + "default-profile.png" : purl+'/'+data.data.vendor_image;
          //  let user = data.data.image == null ? purl + "default-profile.png" : data.data.image;
            let name = uid == 4?data.data.vname:data.data.owner_name;
            let phone = uid == 4?data.data.vendor_phone:data.data.phone;
            let address = uid == 4?data.data.vendor_street_address:data.data.street_address;
            $("#count").text(data.data.count);
           tab =`
           <div class="card mb-3">
<div class="row g-0">
<div class="col-md-3">
  <img src="${img}" class="img-thumbnail rounded-start ml-5 mt-3" alt="..." id="${id}" width="200" style="height: 140px;">
</div>
<div class="col-md-9">
  <div class="card-body">
    <h5 style="font-size: 22px;" class="card-title">${data.data.product_name}</h5>
    <h6 style="font-size: 14px; font-weight: 400;" class="card-title">${data.data.model} , ${data.data.brand}</h6>
    <p  style="font-size: 16px; font-weight: 400;" class="card-text" maxlength="100">${data.data.product_description}</p>
    <hr></hr>

  </div>
</div>
</div>
<div class="row g-0">
<div class="col-md-3">
  <img src="${vendor}" class="rounded-circle ml-5 mt-4" alt="..." id="${id}" width="50">
</div>
<div class="col-md-9">
  <div class="card-body">

   <div class="row">
        <div style="font-size: 20px;background-color: #F0EEFF;color: #6759FF;height: 40px;width: 40px; !important;display: flex;align-items: center;flex-wrap: wrap;" class="col-sm-12 btn ">
        <h5 style="font-size: 20px; font-weight: 600;" class="card-title">${data.data.vname}  <small class="text-muted">(${data.data.createdAt} ${data.data.updatedAt})</small></h5>

        </div>


        </div>
   <div style="margin-top: 24px;" class="row">
        <div style="font-size: 20px;background-color: #F0EEFF;color: #6759FF;height: 40px;width: 40px; !important;display: flex;align-items: center;flex-wrap: wrap;" class="col-sm-12 btn ">
        <h5 style="font-size: 20px; font-weight: 600;" class="card-title">Vendore Services:  <small class="text-muted">(${data.data.category_name})</small></h5>
        <h5 style="font-weight: 600; padding-top: 5px;">Phone No:<a href="#" style="background-color: #6759FF;font-size: 17px; font-family: monospace; margin-left:10px;" class="btn btn-primary"><i class="fa fa-phone-alt" aria-hidden="true"></i>${data.data.vendor_phone}</a></h5>
        </div>


        </div>
  </div>
</div>

            <div  style="margin-top: 25px;"class="row g-0">
  <div class="col-md-3" style="padding: 30px 15px 5px 27px;">
        <h5 class="card-title" style="text-align: initial;font-weight: 600; text-align: end;">Message:</h5>
        </div>

        <div class="col-md-9" style="padding: 5px 15px 5px 40px;">
        <hr></hr>
        <h5 class="card-title" style="text-align: initial;font-weight: 400;">${data.data.message}</h5>
        </div>

  </div>

    </div>
</div>
</div>`;
           document.getElementById("getsingleNotification").innerHTML = tab;

      } else {
        alert("failed")
        $("#view-report").show();
      }
    }
  }
  /*--------View-Notification-End---------*/

function myfunction1() {
  var doc = new jsPDF();
  var specialElementHandlers = {
    '#editor': function (element, renderer) {
        return true;
    }
};

    doc.fromHTML($('#getsingledetails').html(), 15, 15, {
        'width': 170,
            'elementHandlers': specialElementHandlers
    });
    doc.save('full-pakainfo-banner.pdf');
}
 function myfunction()
 {

  $("#getsingledetails").printThis();

 }
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
    var baseUrl = (window.location).href; // You can also use document.URL
var koopId = baseUrl.substring(baseUrl.lastIndexOf('=') + 1);
if(koopId == 'show')
{
  notificationShow();
}

$("#show-new-workorder").hide();
      $("#edit-profile-details").hide();
      $("#show-notification").hide();
      $("#list-notification").hide();
      $("#view-notification").hide();
      $("#show-history").hide();
      $("#show-proposal").hide();
      $("#show-confirm").hide();
      $("#show-pending").hide();
      $("#show-profile").hide();
      $("#show-report").hide();
      $("#view-report").hide();
     $("#all-orders h5").css("color","white");

    function readURL(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
          $('#profile-pic1').attr('src', e.target.result);
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
    $("#view-notification").hide();
    $("#show-notification").hide();
    $("#list-notification").hide();
     $("#show-new-work").hide();
    $("#show-proposal").hide();
    $("#show-confirm").hide();
    $("#show-pending").hide();
     $("#show-new-work").hide();
    $("#show-profile").hide();
    $("#edit-profile-details").hide();


    $("#proposal").click(function() {
      location.reload();
      if($('.proposal-card-div').css('display') == 'none')
{
  $(".proposal-card-div").css("display", "block");
}else{
  $(".proposal-card-div").css("display", "none");
}

      $(".Proposal").css("background-color", "#e4e6ef");
      $(".Proposal-color").css("color", "#6759ff");
      $(".New-Work-Order").css("background-color", "#ffffff");
      $(".order-color").css("color", "#000");
      $(".Reports").css("background-color", "#ffffff");
     $(".reports-color").css("color", "#000");
      $(".notification-color").css("color", "#000");
      $(".Notification").css("background-color", "#ffffff");
      $(".setting-color").css("color", "#000");
      $(".Setting").css("background-color", "#ffffff");
      $(".logout-color").css("color", "#000");
      $(".Logout").css("background-color", "#ffffff");
       $(".maintenance-color").css("color", "#000");
      $(".Maintenance").css("background-color", "#ffffff");
      $("#main-tab").show();
      $("#show-new-workorder").hide();
       $("#show-maintenance").hide();
      $("#edit-profile-details").hide();
      $("#show-notification").hide();
      $("#list-notification").hide();
      $("#view-notification").hide();
      $("#show-history").hide();
      $("#show-proposal").hide();
      $("#show-confirm").hide();
      $("#show-pending").hide();
      $("#show-profile").hide();
      $("#show-report").hide();
      $("#view-report").hide();
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

      $("#history").removeClass("bg-secondary-light");
      $("#history").addClass("bg-secondary-light-change");
      $("#history h5").css("color", "#ffffff");
      $("#history span").removeClass("count-color");
      $("#history span").addClass("count-color-change");
      $("#pending").removeClass("bg-secondary-light-change");
      $("#pending").addClass("bg-secondary-light");
      $("#pending h5").css("color", "#000");
      $("#pending span").removeClass("count-color-change");
      $("#pending span").addClass("count-color");
      $("#confirm").removeClass("bg-secondary-light-change");
      $("#confirm").addClass("bg-secondary-light");
      $("#confirm h5").css("color", "#000");
      $("#confirm span").removeClass("count-color-change");
      $("#confirm span").addClass("count-color");
      $("#Workorder").removeClass("bg-secondary-light-change");
      $("#Workorder").addClass("bg-secondary-light");
      $("#Workorder h5").css("color", "#000");
      $("#Workorder span").removeClass("count-color-change");
      $("#Workorder span").addClass("count-color");

      $(".New-Work-Order").css("background-color", "#ffffff");
      $(".order-color").css("color", "#000");
      $(".Proposal").css("background-color", "#ffffff");
      $(".Proposal-color").css("color", "#000");
      $(".report").css("background-color", "#ffffff");
      $(".report-color").css("color", "#000");
      $(".Setting").css("background-color", "#ffffff");
      $(".setting-color").css("color", "#000");
      let id = '<?php echo auth('owner')->user()->id; ?>';
      $("#main-tab").show();
      $("#show-history").hide();
      $("#list-notification").hide();
      $("#view-notification").hide();
      $("#edit-profile-details").hide();
      $("#show-notification").hide();
      $("#show-proposal").hide();
      $("#show-confirm").hide();
      $("#show-pending").hide();
      $("#show-profile").hide();
      $("#show-report").hide();
      var assetUrl = "{{env('ASSET_URL')}}";
      let role_id = $("#ownerid").val();
      var appUrl = "{{env('APP_URL')}}";
     if(role_id == 4)
     {
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
        let status = '';
        let date = '00:00:00';
        let time = '00:00';

        let count = 0;
        // Loop to access all rows
        if (data.status == true) {
          console.log(data.status);
          for (let r of data.data) {
            let img2 = '';
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
            status = r.order_status=='Rejected'?`cancelled <i class="fa fa-times-circle text-danger" aria-hidden="true"></i>&nbsp; (${r.cancelled_description})`:`Confirmed <i class="fa fa-check-circle text-success" aria-hidden="true"></i>`;
            data = r.date==null?date:r.date;
            time = r.time==null?time:r.time;

            tab += `
             <div class="proOuterBox">
  <div class="row g-0" onclick="getfulldetails(this.id)" id="${r.order_id}" style="cursor: pointer;">
    <div class="col-md-3">
      <img src="${img}" class="productImg" alt="..." id="${id}">
    </div>
    <div class="col-md-9">
      <div class="card-body">
        <h5 class="card-title">${r.product_name}</h5>
        <h6  font-weight: 400;" class="card-title">${r.order_id}</h6>
        <div class="metaInfo">
          <h5 style="font-size: 20px;" class="card-title">${r.vendor_name}  <small class="text-muted">(${time} ${data} )</small> <a href="#" class="badge badge-primary float-right" style="font-size:12px"><i class="fa fa-phone-alt" aria-hidden="true"></i> Call</a></h5>
          <span class="badge badge-secondary priceBdge">        Price: ${r.order_amount}        </span>
            <a href="#"  class="badge">${status}</a>
      </div>
       ${img2}
    </div>
  </div></div>
 </div>`;
            document.getElementById("Proposal-card").innerHTML = tab;
          }

        } else {
          console.log(data.message);
          tab += ` <div class="vendor-name-history"><div class="images-div"></div>

<p><img src="${assetUrl}nodata.png" alt="" width="200" class="rounded-circle" id="">${data.message}
</p>
</div>`;
          document.getElementById("Proposal-card").innerHTML = tab;
        }
      }
     }else{

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
        document.getElementById('loading-h').style.display = 'none';
      }

      function show(data) {

        let tab = '';
        let status = '';
        let date = '00:00:00';
        let time = '00:00';

        let count = 0;
        // Loop to access all rows
        if (data.status == true) {
          console.log(data.status);
          for (let r of data.data) {
            let img2 = '';
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
            status = r.order_status=='Rejected'?`cancelled <i class="fa fa-times-circle text-danger" aria-hidden="true"></i>&nbsp; (${r.cancelled_description})`:`Confirmed <i class="fa fa-check-circle text-success" aria-hidden="true"></i>`;
            data = r.date==null?date:r.date;
            time = r.time==null?time:r.time;

            tab += `
  <div class="proOuterBox">
  <div class="row g-0" onclick="getfulldetails(this.id)" id="${r.order_id}" style="cursor: pointer;">
    <div class="col-md-3">
      <img src="${img}" class="productImg" alt="..." id="${id}" >
    </div>
    <div class="col-md-9">
      <div class="card-body">
        <h5  class="card-title">${r.product_name}</h5>
        <h6  class="card-title">${r.order_id}</h6>

        <hr>
        <div class="metaInfo">
         <h5 style="font-size: 20px;" class="card-title">${r.first_name} ${r.last_name}<a href="#" class="badge badge-primary float-right"><i class="fa fa-phone-alt" aria-hidden="true"></i> Call</a></h5>
            <span class="badge badge-secondary priceBdge">  ${r.order_amount} </span>
          <a href="#" class="badge">${status}</a>

        </div>
         ${img2}

      </div>
    </div>
  </div>

</div>`;
            document.getElementById("Proposal-card").innerHTML = tab;
          }

        } else {
          console.log(data.message);
          tab += ` <div class="vendor-name-history"><div class="images-div"></div>

<p><img src="${assetUrl}nodata.png" alt="" width="200" class="rounded-circle" id="">${data.message}
</p>
</div>`;
          document.getElementById("Proposal-card").innerHTML = tab;
        }
      }
     }

    });
    $("#all-orders").click(function() {
      $("#history").removeClass("main-Button-1");
      $("#history").addClass("main-Button-2");
      $("#all-orders").removeClass("main-Button-2");
      $("#all-orders").addClass("main-Button-1");
      $("#pending").removeClass("main-Button-1");
      $("#pending").removeClass("main-Button");
      $("#pending").addClass("main-Button-4");
      $("#confirm").removeClass("main-Button-1");
      $("#confirm").addClass("main-Button");
      $("#Workorder").removeClass("main-Button-1");
      $("#Workorder").addClass("main-Button-3");

      // $("#all-orders h5").css("color", "white");
      // $("#Workorder h5").css("color", "#6759FF");
      //  $("#pending h5").css("color", "#6759FF");
      //  $("#confirm h5").css("color", "#6759FF");
      //  $("#history h5").css("color", "#6759FF");
      $("#main-tab").show();
      $("#show-notification").hide();
      $("#list-notification").hide();
      $("#view-notification").hide();
      $("#show-history").hide();
      $("#show-proposal").hide();
      $("#show-confirm").hide();
      $("#show-pending").hide();
      $("#show-profile").hide();
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

      tab += ` <div class=" proposal-hover">
<div class="Proposal-card-01">
<img src="${img}" class="rounded-start" alt="..." id="${id}" height="180" width="180">

            <h4>${r.product_name}</h4>
            <p>Code:${r.order_id}</p>
            <ul>
                <li style="color:#6F767E; display:inline-block;white-space: nowrap;overflow: hidden;text-overflow: ellipsis;max-width: 13ch; color:#6F767E">${r.product_description}</li>

            </ul>
            <div class="vendor-class">
                <div class="vendor-name">
                    <div class="row g-0">
                        <div class="col-md-2">
                            <div class="Group-img ml-5"></div>
                        </div>
                        <div class="col-md-10">
                            <h4 class="card-title" style="width: 100%;">${r.vendor_name}</h4>
                             <p>Code: #D-${r.vendor_id}</p>
                        </div>
                    </div>
                </div>
            </div> </div>
            </div>
        </div>`;
      document.getElementById("Proposal-card").innerHTML = tab;
    }

  } else {
    console.log(data.message);
    tab += ` <div class="vendor-name-history" ><div class="images-div"></div>

<p><img src="${assetUrl}nodata.png" alt="" width="200" class="rounded-circle" id="">${data.message}
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


            </ul>
            <div class="vendor-class">
                <div class="vendor-name">
                <div class="row g-0">
<div class="col-md-2">
</div>
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
    });
  //   var assetUrl = "{{env('ASSET_URL')}}";

  //   var appUrl = "{{env('APP_URL')}}";
  // let role_id = $("#ownerid").val();



    /*get end default proposal*/
    /*------Get Proposal---------*/

    $("#link").click(function() {
      $(".proposal-card-div").css("display", "none");
      $(".New-Work-Order").css("background-color", "#ffffff");
      $(".Reports").css("background-color", "#ffffff");
      $(".reports-color").css("color", "#000");
      $(".order-color").css("color", "#000");
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
      $("#show-new-workorder").hide();
      $("#show-notification").show();
      $("#show-history").hide();
      $("#show-confirm").hide();
      $("#show-pending").hide();
      $("#show-profile").hide();
      $("#show-report").hide();
      $("#view-report").hide();
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
        <a href="#" class="btn btn-primary"><i class="fa fa-phone-alt" aria-hidden="true"></i>Call</a>
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
        <a href="#" class="btn btn-primary"><i class="fa fa-phone-alt" aria-hidden="true"></i>Call</a>
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
      <img src="${vendor}" class="rounded-circle" alt="..." id="${id}" style="height:80px;width: 80px;">
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
      $("#list-notification").hide();
      $("#view-notification").hide();
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

 /*----------Maintenance Start----------*/
    $("#Maintenance").click(function(){

      $(".proposal-card-div").css("display", "none");
      $(".maintenance-color").css("color", "#6759ff");
      $(".Maintenance").css("background-color", "#e4e6ef");
      $(".Report").css("background-color", "#fff");
      $(".report-color").css("color", "#000");
      $(".equipments-color").css("color", "#000");
      $(".Equipment").css("background-color", "#ffffff");
      $(".New-Work-Order").css("background-color", "#ffffff");
      $(".order-color").css("color", "#000");
      $(".Setting").css("background-color", "#ffffff");
      $(".Proposal").css("background-color", "#ffffff");
      $(".Notification").css("background-color", "#ffffff");
      $(".Proposal-color").css("color", "#000");
      $(".setting-color").css("color", "#000");
      $(".notification-color").css("color", "#000");
      $(".logout-color").css("color", "#000");
      $(".Logout").css("background-color", "#ffffff");
      $(".employees-color").css("color", "#000");
      $(".Employee").css("background-color", "#fff");

      $("#main-tab").hide();
      $("#show-maintenance").show();

      $("#show-report").hide();

      $("#show-notification").hide();
      $("#list-notification").hide();
      $("#view-notification").hide();
      $("#show-history").hide();
      $("#show-proposal").hide();
      $("#show-confirm").hide();
      $("#show-pending").hide();
      $("#show-profile").hide();
        var table = $('#maintenance-table').DataTable({
            retrieve:true,
            destroy:true,

            ajax: '{!! route('get.plan') !!}',
            columns: [
                { data: 'id', name: 'id' },

                { data: 'name', name: 'name' },

                { data: 'start_date', name: 'start_date' },
                { data: 'end_date', name: 'end_date' },
                { data: 'price', name: 'price' },
                { data: 'description', name: 'description' },
                { data: 'action', name: 'action' },
                ],


             });
              table.ajax.reload();

    });
    /*----------Maintenance End----------*/
    /*------Get Pending Proposal---------*/

    $("#pending").click(function() {
      $("#pending").removeClass("bg-secondary-light");
      $("#pending").addClass("bg-secondary-light-change");
      $("#pending h5").css("color", "#fff");
      $("#pending span").removeClass("count-color");
      $("#pending span").addClass("count-color-change");
      $("#confirm").removeClass("bg-secondary-light-change");
      $("#confirm").addClass("bg-secondary-light");
      $("#confirm h5").css("color", "#000");
      $("#confirm span").removeClass("count-color-change");
      $("#confirm span").addClass("count-color");
      $("#history").removeClass("bg-secondary-light-change");
      $("#history").addClass("bg-secondary-light");
      $("#history h5").css("color", "#000");
      $("#history span").removeClass("count-color-change");
      $("#history span").addClass("count-color");
      $("#Workorder").removeClass("bg-secondary-light-change");
      $("#Workorder").addClass("bg-secondary-light");
      $("#Workorder h5").css("color", "#000");
      $("#Workorder span").removeClass("count-color-change");
      $("#Workorder span").addClass("count-color");

      $("#all-orders").removeClass("main-Button-1");
      $("#all-orders").addClass("main-Button-2");

      $("#Workorder").removeClass("main-Button-1");
      $("#Workorder").addClass("main-Button-3");
      $(".New-Work-Order").css("background-color", "#ffffff");
      $(".order-color").css("color", "#000");
      $(".Proposal").css("background-color", "#ffffff");
      $(".Proposal-color").css("color", "#000");
      $(".report").css("background-color", "#ffffff");
      $(".report-color").css("color", "#000");
      $(".Setting").css("background-color", "#ffffff");
      $(".setting-color").css("color", "#000");
      // $("#Workorder h5").css("color", "#6759FF");
      // $("#all-orders h5").css("color", "#6759FF");
      //  $("#pending h5").css("color", "white");
      //  $("#confirm h5").css("color", "#6759FF");
      //  $("#history h5").css("color", "#6759FF");
      $("#main-tab").show();
      $("#show-notification").hide();
      $("#list-notification").hide();
      $("#view-notification").hide();
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

          let time = '';
          // Loop to access all rows
          if (data.status == true) {

            for (let r of data.data) {
              let img2 = '';
              var x = new Array();
             if(r.image != null){
                x = r.image
             }else{
              img2 += `<img src="${assetUrl + 'product-dummy.png'}" height="100" width="100" alt=""  style="height: 100px !important;">`;
             }
        for (let i of x) {
          img2 += `<img src="${i}" height="100" width="100" alt="" style="height: 100px !important;">`;

        }

              let img = r.thumbnail_image == null ? assetUrl + "product-dummy.png" : r.thumbnail_image;
              // let img1 = r.image == null ? assetUrl + "product-dummy.png" : r.image;
              let vendor = r.vendor_image== null ? assetUrl + "default-profile.png" : r.vendor_image;
              let note = r.note == null ? "There is no any note!" : r.note;
              if(r.date != null || r.time != null)
              {
                  date = r.date;
                  time = r.time
              }



              tab += ` <div class="proOuterBox">
  <div class="row g-0" onclick="getfulldetails(this.id)" id="${r.order_id}" style="cursor: pointer;">
    <div class="col-md-3">
      <img src="${img}" class="productImg" alt="..." id="${r.id}" >
    </div>
    <div class="col-md-9">
      <div class="card-body">
        <h5 class="card-title">${r.product_name}</h5>
        <h6 class="card-title">${r.order_id}</h6>
        <hr>


             <a href="{{url('/')}}/product-details?id=${r.product_id}&order_id=${r.order_id}" class="btn btn-primary">Add Quote</a>
             <div onclick="reject(this.id)"class="btn btn-primary" id="${r.order_id}">Cancel Order</div>
             <div class="commentOuter">

               <h4 class="card-title">${r.first_name} ${r.last_name}</h4>
                <div class="d-flex">${img2}
                <p style="margin-left:15px">${r.description}</p>
                </div></div>
      </div>
    </div>
  </div>

</div>`;

              document.getElementById("Proposal-card").innerHTML = tab;


            }

          } else {
            console.log(data.message);
            tab += ` <div class="vendor-name-history"><div class="images-div"></div>

<p><img src="${assetUrl}nodata.png" alt="" width="200" class="rounded-circle" id="">${data.message}!
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

          let tab3 = '';
          let date = '';
          let reject = '';
          let time = '';
          let count = 0;
          // Loop to access all rows
          if (data.status == true) {

            for (let r of data.data) {
              let img2 = '';
              var x = new Array();
             if(r.images != null){
                x = r.images
             }else{
              img2 += `<img src="${assetUrl + 'product-dummy.png'}" height="100" width="100" alt="" >`;
             }
        for (let i of x) {
          img2 += `<img src="${i}" height="100" width="100" alt="">`;

        }
              if(r.date != null || r.time != null)
              {
                  date = r.date;
                  time = r.time
              }
              if (r.note == null) {
                  let oid = r.order_id;
                count = `<a href="#"class="btn btn-primary">${r.order_status}</a>`;
                reject = `<div onclick="reject(this.id)"class="btn btn-primary" id="${oid}">Cancel</div>`;
              } else {
                let oid = r.order_id;
                count = `<div onclick="accept(this.id)"class="btn btn-primary" id="${oid}">Accept</div>`;
                reject = `<div onclick="reject(this.id)"class="btn btn-primary" id="${oid}">Cancel</div>`;
              }
              let img = r.thumbnail_image == null ? assetUrl + "product-dummy.png" : r.thumbnail_image;
              // let img1 = r.image == null ? assetUrl + "product-dummy.png" : r.image;
              let vendor = r.vendor_image == null ? assetUrl + "default-profile.png" : r.vendor_image;
              let note = r.note == null ? "There is no notes" : r.note;
              let status = r.note == null ? r.order_status : 'Accept';

              tab += ` <div class="proOuterBox" >
  <div class="row g-0" onclick="getfulldetails(this.id)" id="${r.order_id}" style="cursor: pointer;">
    <div class="col-md-3">
      <img src="${img}" class="productImg" alt="..." id="${id}"  >
    </div>
    <div class="col-md-9">
      <div class="card-body">
        <h5 class="card-title">${r.product_name}</h5>
        <h6  class="card-title">${r.order_id}</h6>

        <div class="metaInfo">
         <h5 style="font-size: 20px;" class="card-title">${r.vendor_name} </h5>
            <span>   ${reject} </span>
            <span >    ${count}</span>


        </div>



  <h5 class="card-title" >${note}</h5>
  <div class="container mt-3" id="multi-img">      ${img2}               </div>
      </div>
    </div>






        </div>
  </div>  </div>
</div>`;

              document.getElementById("Proposal-card").innerHTML = tab;


            }

          } else {
            console.log(data.message);
            tab += ` <div class="vendor-name-history"><div class="images-div"></div>

<p><img src="${assetUrl}nodata.png" alt="" width="200" class="rounded-circle" id="">${data.message}!
</p>
</div>`;
            document.getElementById("Proposal-card").innerHTML = tab;
          }
        }
      }



    });

    /*------End Pending Proposal---------*/
    // FilterReport

   /*--------Start-Report---------------*/

   $("#FilterReport").click(function() {

$(".proposal-card-div").css("display", "none");

$(".Reports").css("background-color", "#e4e6ef");
$(".reports-color").css("color", "#6759ff");
$(".Report").css("background-color", "#ffffff");
$(".report-color").css("color", "#000");
$(".New-Work-Order").css("background-color", "#ffffff");
$(".order-color").css("color", "#000");
$(".Setting").css("background-color", "#ffffff");
$(".Proposal").css("background-color", "#ffffff");
$(".Notification").css("background-color", "#ffffff");
$(".Proposal-color").css("color", "#000");
$(".setting-color").css("color", "#000");
$(".notification-color").css("color", "#000");
$(".logout-color").css("color", "#000");
$(".Logout").css("background-color", "#ffffff");
 $(".maintenance-color").css("color", "#000");
$(".Maintenance").css("background-color", "#ffffff");
$("#main-tab").hide();
$("#show-notification").hide();
$("#show-new-workorder").hide();
 $("#show-maintenance").hide();
$("#show-history").hide();
$("#show-proposal").hide();
$("#show-confirm").hide();
$("#show-pending").hide();
$("#show-profile").hide();
$("#show-report").hide();
$("#show-all-report").show();
$("#list-notification").hide();
$("#view-report").hide();
$("#view-notification").hide();
$("#edit-profile-details").hide();
});

$("#All-Filter").click(function(){

$('#example-all').DataTable().destroy();
  var fromdate = $("#fromdate").val();
  var todate = $("#todate").val();
  var district = $("#district").val();
  var product = $("#product_name").val();
  var store = $("#store").val();
  var assetUrl = "{{env('ASSET_URL')}}";
  var profileUrl = "{{env('PROFILE_URL')}}";
   if(fromdate != '' && todate == '')
        {
           Swal.fire({
    title: 'Warning',
    text: 'Please select End date.',
    icon: 'error',
    loader: true,        // Change it to false to disable loader  // To change the background
});
          return false
        }
var appUrl = "{{env('APP_URL')}}";

 const api_url = '{{route('report')}}/?from='+fromdate+'&todate='+todate+'&product='+product+'&store='+store+'&district='+district;

  var table = $('#example-all').DataTable({
      retrieve:true,
      destroy:true,

      // ajax: '{!! route('report') !!}',
      ajax: api_url,
      columns: [
          { data: 'id', name: 'id',
            render: function (data, type, row, meta) {
  return meta.row + meta.settings._iDisplayStart + 1;
} },

          { data: 'order_id', name: 'order_id' },
          { data: 'product_name', name: 'product_name' },
          { data: 'store_name', name: 'store_name' },
          { data: 'dname', name: 'dname' },
          { data: 'fdate', name: 'fdate' },
          { data: 'owner_name', name: 'owner_name' },
          { data: 'vendor_name', name: 'vendor_name' },
          { data: 'order_amount', name: 'order_amount' },
          { data: 'order_status', name: 'order_status' },
          { data: 'action', name: 'action' },


           ],

           aaSorting: [[0, 'desc']],
           dom: 'Bfrtip',
          buttons: [{
extend: "excel",
extend: "pdf",
extend: "print",
className: "btn-sm btn-primary p-2",
titleAttr: 'Export in Excel',
text: 'Excel',
init: function(api, node, config) {
 $(node).removeClass('btn-secondary')
}
},{
extend: "pdf",
className: "btn-sm btn-primary p-2",
titleAttr: 'Export in Pdf',
text: 'PDF',
init: function(api, node, config) {
 $(node).removeClass('btn-secondary')
}
},{
extend: "print",
className: "btn-sm btn-primary p-2",
titleAttr: 'Export in Print',
text: 'Print',
init: function(api, node, config) {
 $(node).removeClass('btn-secondary')
}
}]


  });
  table.ajax.reload();
});

/*-------------End-Report-----------*/



    /*--------Start-Report---------------*/

     $("#report").click(function() {

      $(".proposal-card-div").css("display", "none");

      $(".Report").css("background-color", "#e4e6ef");
      $(".report-color").css("color", "#6759ff");
      $(".Reports").css("background-color", "#ffffff");
      $(".reports-color").css("color", "#000");
      $(".New-Work-Order").css("background-color", "#ffffff");
      $(".order-color").css("color", "#000");
      $(".Setting").css("background-color", "#ffffff");
      $(".Proposal").css("background-color", "#ffffff");
      $(".Notification").css("background-color", "#ffffff");
      $(".Proposal-color").css("color", "#000");
      $(".setting-color").css("color", "#000");
      $(".notification-color").css("color", "#000");
      $(".logout-color").css("color", "#000");
      $(".Logout").css("background-color", "#ffffff");
       $(".maintenance-color").css("color", "#000");
      $(".Maintenance").css("background-color", "#ffffff");
      $("#main-tab").hide();
      $("#show-notification").hide();
      $("#show-new-workorder").hide();
       $("#show-maintenance").hide();
      $("#show-history").hide();
      $("#show-proposal").hide();
      $("#show-confirm").hide();
      $("#show-pending").hide();
      $("#show-profile").hide();
      $("#show-report").show();
      $("#list-notification").hide();
      $("#view-report").hide();
      $("#view-notification").hide();
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
                { data: 'id', name: 'id',
                  render: function (data, type, row, meta) {
        return meta.row + meta.settings._iDisplayStart + 1;
    } },

                { data: 'order_id', name: 'order_id' },
                { data: 'product_name', name: 'product_name' },
                { data: 'date', name: 'date' },
                { data: 'owner_name', name: 'owner_name' },
                { data: 'vendor_name', name: 'vendor_name' },
                { data: 'order_amount', name: 'order_amount' },
                { data: 'order_status', name: 'order_status' },
                { data: 'action', name: 'action' },


                 ],

                 aaSorting: [[0, 'desc']],
                 dom: 'Bfrtip',
                buttons: [{
    extend: "excel",
    extend: "pdf",
    extend: "print",
    className: "btn-sm btn-primary p-2",
    titleAttr: 'Export in Excel',
    text: 'Excel',
    init: function(api, node, config) {
       $(node).removeClass('btn-secondary')
    }
  },{
    extend: "pdf",
    className: "btn-sm btn-primary p-2",
    titleAttr: 'Export in Pdf',
    text: 'PDF',
    init: function(api, node, config) {
       $(node).removeClass('btn-secondary')
    }
  },{
    extend: "print",
    className: "btn-sm btn-primary p-2",
    titleAttr: 'Export in Print',
    text: 'Print',
    init: function(api, node, config) {
       $(node).removeClass('btn-secondary')
    }
  }]


        });




    });

    /*-------------End-Report-----------*/

    /*------Get Profile Details---------*/
    $("#cancel-profile").click(function() {
      $(".Setting").css("background-color", "#ffffff");
      $(".setting-color").css("color", "#000");
      // $(".Setting").css("background-color", "#e4e6ef");
      $(".Proposal").css("background-color", "#e4e6ef");

      $(".Proposal-color").css("color", "#6759ff");
      $("#main-tab").show();
      $("#show-notification").hide();
      $("#list-notification").hide();
      $("#view-notification").hide();
      $("#show-history").hide();
      $("#show-proposal").hide();
      $("#show-confirm").hide();
      $("#show-pending").hide();
      $("#show-report").hide();
      $("#view-report").hide();
      $("#show-profile").hide();
      $("#edit-profile-details").hide();
    });
    $("#profile").click(function() {
      $(".proposal-card-div").css("display", "none");
      $(".Setting").css("background-color", "#e4e6ef");
      $(".Reports").css("background-color", "#ffffff");
      $(".reports-color").css("color", "#000");
      $(".Proposal").css("background-color", "#ffffff");
      $(".New-Work-Order").css("background-color", "#ffffff");
      $(".oreder-color").css("color", "#000");
      $(".Notification").css("background-color", "#ffffff");
      $(".Proposal-color").css("color", "#000");
      $(".setting-color").css("color", "#6759ff");
      $(".notification-color").css("color", "#000");
      $(".report-color").css("color", "#000");
      $(".Report").css("background-color", "#ffffff");
      $(".logout-color").css("color", "#000");
      $(".Logout").css("background-color", "#ffffff");
       $(".maintenance-color").css("color", "#000");
      $(".Maintenance").css("background-color", "#ffffff");
      $("#main-tab").hide();
      $("#show-notification").hide();
      $("#show-new-workorder").hide();
       $("#show-maintenance").hide();
      $("#show-history").hide();
      $("#show-proposal").hide();
      $("#show-confirm").hide();
      $("#show-pending").hide();
      $("#show-report").hide();
      $("#view-report").hide();
      $("#show-profile").show();
      $("#list-notification").hide();
      $("#view-notification").hide();
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

    <div class="settingForm">
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
      $("#view-report").hide();
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
            let user = r.image == null ? assetUrl + "default-profile.png" : r.image;



           $('#profile-pic1').attr('src', user);
          $('#profile-pic2').attr('src', user);
          $('#profile-pic').attr('src', user);
            tab += `<div class="settingForm">
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

      $("#confirm").removeClass("bg-secondary-light");
      $("#confirm").addClass("bg-secondary-light-change");
      $("#confirm h5").css("color", "#ffffff");
      $("#confirm span").removeClass("count-color");
      $("#confirm span").addClass("count-color-change");
      $("#pending").removeClass("bg-secondary-light-change");
      $("#pending").addClass("bg-secondary-light");
      $("#pending h5").css("color", "#000");
      $("#pending span").removeClass("count-color-change");
      $("#pending span").addClass("count-color");
      $("#history").removeClass("bg-secondary-light-change");
      $("#history").addClass("bg-secondary-light");
      $("#history h5").css("color", "#000");
      $("#history span").removeClass("count-color-change");
      $("#history span").addClass("count-color");
      $("#Workorder").removeClass("bg-secondary-light-change");
      $("#Workorder").addClass("bg-secondary-light");
      $("#Workorder h5").css("color", "#000");
      $("#Workorder span").removeClass("count-color-change");
      $("#Workorder span").addClass("count-color");

      $(".New-Work-Order").css("background-color", "#ffffff");
      $(".order-color").css("color", "#000");
      $(".Proposal").css("background-color", "#ffffff");
      $(".Proposal-color").css("color", "#000");
      $(".report").css("background-color", "#ffffff");
      $(".report-color").css("color", "#000");
      $(".Setting").css("background-color", "#ffffff");
      $(".setting-color").css("color", "#000");
      $("#main-tab").show();
      $("#show-notification").hide();
      $("#list-notification").hide();
      $("#view-notification").hide();
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

          let time = '';
          let count = 0;
          // Loop to access all rows
          if (data.status == true) {
            console.log(data.status);
            for (let r of data.data) {
              let img2 = '';
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
              let vendor = r.vendor_image == null ? assetUrl + "default-profile.png" : r.vendor_image;
              // let img2 = r.images == null ? assetUrl + "product-dummy.png" : r.images;

              tab += ` <div class="proOuterBox">
                      <div class="row g-0" onclick="getfulldetails(this.id)" id="${r.order_id}" style="cursor: pointer;">
                          <div class="col-md-3">
                            <img src="${img}" class="productImg" alt="..." id="${id}" width="200" height="170">
                          </div>
<div class="col-md-9">
  <div class="card-body">
    <h5 class="card-title">${r.product_name}</h5>
    <h6 class="card-title">${r.order_id}</h6>
    <hr>
    <div class="metaInfo">
         <h5 style="font-size: 20px;" class="card-title">${r.first_name} ${r.last_name}  <a href="#"  class="badge badge-primary float-right" style="font-size:12px"><i class="fa fa-phone-alt" aria-hidden="true"></i>Call</a></h5>
         <div class="d-flex">
           ${img2}
           <div class="ml-4">
            <div class="btnPanel"><span class="badge badge-secondary priceBdge">  Price: ${r.order_amount}</span>
             <span class="badge badge-primary" id="WFID9701S">${r.order_status}</span>
              <a href="#" class="badge badge-primary text-center" onclick="invoice(this.id)" id="${r.order_id}">Generate Invoice</a></div>
             <p>  ${r.description} </p> </div>
         </div>





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
            tab += ` <div class="vendor-name-history"><div class="images-div"></div>

<p><img src="${assetUrl}nodata.png" alt="" width="200" class="rounded-circle" id="">${data.message}
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

          let time = '';
          let count = 0;

          // Loop to access all rows
          if (data.status == true) {
            console.log(data.status);
            for (let r of data.data) {
              let img2 = '';
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
              let vendor = r.vendor_image == null ? assetUrl + "default-profile.png" : r.vendor_image;
               let note = r.note == null ?"There is no note" : r.note;

              tab += ` <div class="proOuterBox">
<div class="row g-0" onclick="getfulldetails(this.id)" id="${r.order_id}" style="cursor: pointer;">
    <div class="col-md-3">
      <img src="${img}" class="productImg" alt="..." id="${id}" >
    </div>
    <div class="col-md-9">
      <div class="card-body">
        <h5  class="card-title">${r.product_name}</h5>
        <h6 class="card-title">${r.order_id}</h6>

        <hr>

         <div class="metaInfo">
         <h5 style="font-size: 20px;" class="card-title">${r.vendor_name}  <small class="text-muted">(${date}${time})</small> <a href="#" class="badge badge-primary float-right" style="font-size:12px"><i class="fa fa-phone-alt" aria-hidden="true"></i> Call</a></h5>
            <span class="badge badge-secondary priceBdge"> Price: ${r.order_amount} </span>
            <a href="#"  class="badge badge-primary">${r.order_status}</a>

        </div>

        <div class="comment">
          <h5 class="card-title">${note}</h5>
          <div class="container mt-3" id="multi-img">      ${img2}               </div>
        </div>
      </div>
    </div>
    </div>

  </div>



    `;

              document.getElementById("Proposal-card").innerHTML = tab;
            }

          } else {
            console.log(data.message);
            tab += ` <div class="vendor-name-history"><div class="images-div"></div>

<p><img src="${assetUrl}nodata.png" alt="" width="200" class="rounded-circle" id="">${data.message}
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
      // var files = $('#upload')[0].files[0];

      formData.append('id', id);

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

          $("#edit-profile-details").show();
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
      $("#Workorder").removeClass("bg-secondary-light");
      $("#Workorder").addClass("bg-secondary-light-change");
      $("#Workorder h5").css("color", "#ffffff");
      $("#Workorder span").removeClass("count-color");
      $("#Workorder span").addClass("count-color-change");
      $("#pending").removeClass("bg-secondary-light-change");
      $("#pending").addClass("bg-secondary-light");
      $("#pending h5").css("color", "#000");
      $("#pending span").removeClass("count-color-change");
      $("#pending span").addClass("count-color");
      $("#confirm").removeClass("bg-secondary-light-change");
      $("#confirm").addClass("bg-secondary-light");
      $("#confirm h5").css("color", "#000");
      $("#confirm span").removeClass("count-color-change");
      $("#confirm span").addClass("count-color");
      $("#history").removeClass("bg-secondary-light-change");
      $("#history").addClass("bg-secondary-light");
      $("#history h5").css("color", "#000");
      $("#history span").removeClass("count-color-change");
      $("#history span").addClass("count-color");

      $("#main-tab").show();
      $("#show-notification").hide();
      $("#list-notification").hide();
      $("#view-notification").hide();
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


            tab += `<div class="proposal-hover workorder"> <a href="../product-details?id=${r.id}" style="text-decoration: none;"><div class="Proposal-card-01">

<img src="${img}" class="rounded-start" alt="..." id="${id}" height="180" width="300">

            <h4>${r.product_name}</h4>
            <p>Code:${r.brand}</p>
            <ul>
                <li style="color:#6F767E; display:-webkit-box; overflow: hidden;text-overflow: ellipsis;max-width: 28ch; -webkit-line-clamp: 2;
-webkit-box-orient: vertical;">${r.product_description}</li>

            </ul>

            </div>
            </a>
            </div>


          `;



    count = count+1;

    // console.log((Math.floor(sum) != '0')? $("service-list").after("<br />"):0);

    }
    console.log(count);
    // Setting innerHTML as tab variable
    document.getElementById("Proposal-card").innerHTML = tab;
}
    });

    /*----------Work Order----------*/
    $("#NewWorkorder").click(function(){

      $("#history").removeClass("main-Button-1");
      $("#all-orders").removeClass("main-Button-1");
      $("#all-orders").addClass("main-Button-2");
      $("#history").addClass("main-Button-2");
      $("#pending").removeClass("main-Button-1");
      $("#pending").removeClass("main-Button");
      $("#pending").addClass("main-Button-2");
      $("#confirm").addClass("main-Button");
      $("#confirm").removeClass("main-Button-1");
      $("#Workorder").removeClass("main-Button-3");
      $("#Workorder").addClass("main-Button-1");

      $(".New-Work-Order").css("background-color", "#e4e6ef");
      $(".order-color").css("color", "#6759ff");
      $(".Reports").css("background-color", "#ffffff");
      $(".reports-color").css("color", "#000");
      $(".Proposal").css("background-color", "#ffffff");
      $(".Proposal-color").css("color", "#000");
      $(".Setting").css("background-color", "#ffffff");
      $(".setting-color").css("color", "#000");
      $("#main-tab").hide();
      $("#show-report").hide();
      $("#view-report").hide();
       $("#show-new-workorder").show();
      $("#show-notification").hide();
      $("#list-notification").hide();
      $("#view-notification").hide();
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


            tab += `<div class="proposal-hover workorder"> <a href="../product-details?id=${r.id}" style="text-decoration: none;"><div class="Proposal-card-01">

<img src="${img}" class="rounded-start" alt="..." id="${id}" height="180" width="300">

            <h4>${r.product_name}</h4>
            <p>Code:${r.brand}</p>
            <ul>
                <li style="color:#6F767E; display:-webkit-box; overflow: hidden;text-overflow: ellipsis;max-width: 28ch; -webkit-line-clamp: 2;
-webkit-box-orient: vertical;">${r.product_description}</li>

            </ul>

            </div>
            </a>
            </div>


          `;



    count = count+1;

    // console.log((Math.floor(sum) != '0')? $("service-list").after("<br />"):0);

    }
    console.log(count);
    // Setting innerHTML as tab variable
    document.getElementById("get-new-work").innerHTML = tab;
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
  // function reject(orderId) {
  //   let id = '<?php echo auth('owner')->user()->id; ?>';
  //   var assetUrl = "{{env('ASSET_URL')}}";

  //  var appUrl = "{{env('APP_URL')}}";
  //  let options = {
  //    method: 'POST',
  //  }
  //  const api_url =
  //    appUrl + "/owner/order_reject?order_id=" + orderId +"&cancelled_by="+id;
  //   toastr.success("<br /><br /><button type='button' id='confirmationRevertYes' class='btn clear'>Yes</button>",'Are you sure, you want to delete it?',
  //   {
  //     closeButton: false,
  //     allowHtml: true,
  //     onShown: function (toast) {
  //       $("#confirmationRevertYes").click(function(){
  //         $.ajax({
  //           url: api_url,
  //           type: "POST",

  //           success: function(res){
  //             console.log(res);
  //             if(res.status==true){
  //               toastr.success("Done! Record delete successful.", 'Success!', {timeOut: 5000});
  //               location.reload();
  //             }else{
  //               toastr.error("Opps! Something is wrong, Please try again.", 'Error!', {timeOut: 5000});
  //             }
  //           }
  //         });
  //       });
  //     }
  //   });
  // }
  /*--------Reject Order Api Integration Start-----------*/
 function reject(orderId) {
    let id = '<?php echo auth('owner')->user()->id; ?>';
    var assetUrl = "{{env('ASSET_URL')}}";

   var appUrl = "{{env('APP_URL')}}";
   let options = {
     method: 'POST',
   }
   const api_url =
       appUrl + "/owner/order_reject?order_id=" + orderId +"&cancelled_by="+id;
      Swal.fire({
                title: 'Are you sure?',
                text: "It will be cancelled permanently!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, cancelled it!',
                showLoaderOnConfirm: true,
                preConfirm: function() {
                    return new Promise(function(resolve) {
                        $.ajax({
                                url: api_url,
                                type: 'POST',
                                dataType: 'json'
                            })
                            .done(function(response) {
                                Swal.fire('Cancelled!', 'Your order has been cancelled', 'success');
                                 getPending()
                                 getcountdata()
                            })

                            .fail(function() {
                                Swal.fire('Oops...', 'Something went wrong with ajax !', 'error')
                            });
                    });
                },
            });


            }
/*-----------Get Count Data-----------*/
function getcountdata()
{
  let counturl =
  '{!! route("get.count")!!}';

// Defining async function
async function getcount(counturl) {

  // Storing response
  const response = await fetch(counturl);

  // Storing data in form of JSON
  var data = await response.json();
  console.log(data);

  showcount(data);
}
// Calling that async function
getcount(counturl);
function showcount(data) {

let tab = '';
let count = 0;
// Loop to access all rows
if (data.status == 'true') {


  $("#vendor-count").text(data.data.vendor);
  $("#user-count").text(data.data.owner);
  $("#pending-count").text(data.data.pending);
  $("#confirmed-count").text(data.data.confirmed);
  $("#history-count").text(data.data.history);
  $("#work-count").text(data.data.work_order);

} else {
  alert("failed")
  $("#show-report").show();

}
}
}
/*---End Count Data----*/
 let counturl =
  '{!! route("get.count")!!}';

// Defining async function
async function getcount(counturl) {

  // Storing response
  const response = await fetch(counturl);

  // Storing data in form of JSON
  var data = await response.json();
  console.log(data);

  showcount(data);
}
// Calling that async function
getcount(counturl);
function showcount(data) {

let tab = '';
let count = 0;
// Loop to access all rows
if (data.status == 'true') {


  $("#vendor-count").text(data.data.vendor);
  $("#user-count").text(data.data.owner);
  $("#pending-count").text(data.data.pending);
  $("#confirmed-count").text(data.data.confirmed);
  $("#history-count").text(data.data.history);
  $("#work-count").text(data.data.work_order);

} else {
  alert("failed")
  $("#show-report").show();

}
}
 /*--------Reject Order Api Integration End-----------*/
 function getPending()
  {
      let vid = $('#ownerid').val();
      let id = '<?php echo auth('owner')->user()->id; ?>';
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
               let img2 = '';
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
    <div class="col-md-4 text-right">
      <img src="${img}" class="product-pending rounded-start" alt="..." id="${r.id}" style="padding:5px;">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">${r.product_name}</h5>
        <h6 class="card-title">${r.order_id}</h6>


        <hr></hr>


      </div>
    </div>
  </div>
  <div class="row g-0">
    <div class="col-md-2">

    </div>
    <div class="col-md-6">
      <div class="card-body">
        <h5 class="card-title">${r.first_name} ${r.last_name}</h5>



        <hr></hr>
    </div>
  </div>
  <div class="col-md-4 mt-20">
           <a href="{{url('/')}}/product-details?id=${r.product_id}&order_id=${r.order_id}" class="btn btn-primary">Add Quote</a>

                <div onclick="reject(this.id)"class="btn btn-primary" id="${r.order_id}">Cancel Order</div>
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
      } else{

        const api_url = appUrl + "/owner/get_Proposal?order_status=pending &owner_id=" + id;
        let limit = $("#approval_limit").val();

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

          let tab3 = '';
          let date = '';
          let reject = '';
          let time = '';
          let count = 0;
          // Loop to access all rows
          if (data.status == true) {

            for (let r of data.data) {
               let img2 = '';
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
                  let oid = r.order_id;
                count = `<a href="#" style="margin-left: 180px; margin-top: -130px; background-color: #6759FF;" class="btn btn-primary">${r.order_status}</a>`;
                reject = `<div onclick="reject(this.id)"class="btn btn-primary" id="${oid}">Cancelled</div>`;
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

        <hr></hr>


      </div>
    </div>
  </div>
  <div style="margin-top: -10px;" class="row g-0">
    <div style="margin-top: -20px; margin-left: 226px;" class="col-md-2">

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
      }

  function invoice(id)
 {
  $('#order_id').val(id);


  var assetUrl = "{{env('ASSET_URL')}}";
      var purl = "{{env('PROFILE_URL')}}";
      var appUrl = "{{env('APP_URL')}}";
            $.ajax({
                type: "GET",
                url: '{!! route("get.single.order")!!}?id=' + id,

                success: function(data) {
                    console.log(data);
                     $('#owner-name').val(data.data.owner_name);

                       $('#owner-description').val(data.data.description);
                       $('#inv-product_name').val(data.data.product_name);
                         $('#inv-order_amount').val(data.data.order_amount);
                           $('#sub_total').val(data.data.price);
                            $('#total_amount').val(data.data.order_amount);
                    $('#exampleModal').modal('show');
      //                 let tab = '';
      // let count = 0;
      // Loop to access all rows
//       if (data.status == 'true') {
// alert("sdfs")

//                 }
    }
  });
}

 $(function () {

       $('#submit').click(function() {
       
   var uid = $("#ownerid").val();
       var assetUrl = "{{env('ASSET_URL')}}";
      var purl = "{{env('PROFILE_URL')}}";
      var appUrl = "{{env('APP_URL')}}";
            $.ajax({
                type: "POST",
                url: '{!! route("invoice.generate")!!}',
                data: $('#form_id').serialize(),
                success: function(data) {
                    console.log(data);
                    $('#exampleModal').modal('hide');

                      let tab = '';
      let count = 0;
      // Loop to access all rows
      if (data.status == 'true') {
        $('#exampleModalInvoice').modal('show');
        getcountdata();
 console.log(data.data.order_status)
  console.log(data.data.order_amount)
            let pimg = data.data.thumbnail_image == null ? assetUrl + "product-dummy.png" : assetUrl+'images/products/'+data.data.thumbnail_image;
            // let user = data.data.image == null ? purl + "default-profile.png" : data.data.image;
            let name = uid == 4?data.data.vname:data.data.owner_name;
            let phone = uid == 4?data.data.vendor_phone:data.data.phone;
            let address = uid == 4?data.data.vendor_street_address:data.data.street_address;
            let qty = '';
            let price = '';
            let total = '';
            alert((data.data.qty).length)
            for (let i = 0; i < (data.data.qty).length; i++) {
   qty += `<tr><td scope="row">${i+1}</td>
                <td><img src="${pimg}" height="50" width="50" alt="" class="img-thumbnail hover-zoom"></td><td>${data.data.title[i]}</td><td></td><td>${data.data.qty[i]}</td><td>${data.data.price[i]}</td><td>${data.data.total[i]}</td><tr>`;
}
            
           tab =`
      <div class="row d-flex align-items-baseline">
        <div class="col-xl-8">

          <p style="color: #6759FF;font-size: 20px; margin-left:5px;">Invoice >> <strong class="text-danger">ID: #${data.data.order_id}</strong></p>
        </div>
        <div class="col-xl-4 float-end">
          <a class="btn btn-primary text-capitalize border-0" data-mdb-ripple-color="dark"  onclick="myinvoice()"><i
              class="fas fa-print "></i> Print</a>
          <a class="btn btn-primary text-capitalize" data-mdb-ripple-color="dark"  onclick="myinvoice1()"><i
              class="far fa-file-pdf"></i> Export</a>
              <div id="editor"></div>
        </div>
        <hr>
      </div>

      <div class="container" style="margin:0px;">
        <div class="col-md-12">
          <div class="text-center">
            <i class="fa fa-tools fa-4x ms-0" style="color:#6759FF ;"></i>
            <p class="pt-0">Maintenance Report</p>
          </div>

        </div>


        <div class="row">
          <div class="col-xl-8">
            <ul class="list-unstyled">
              <li class="text-muted">From: <span style="color:#5d9fc5 ;">${name}</span></li>
              <li class="text-muted">${address}, Indore</li>
              <li class="text-muted">MP, India</li>
              <li class="text-muted"><i class="fa fa-phone-alt" style="color:black;"></i>${phone}</li>
            </ul>
          </div>
          <div class="col-xl-4">
            <p class="text-muted">Invoice</p>
            <ul class="list-unstyled">
              <li class="text-muted"><i class="fas fa-circle" style="color:#6759FF ;"></i> <span
                  class="fw-bold text-dark">ID:</span>#${data.data.order_id}</li>
              <li class="text-muted"><i class="fas fa-circle" style="color:#6759FF ;"></i> <span
                  class="fw-bold text-dark">Creation Date: </span>${data.data.date} ${data.data.time}</li>
              <li class="text-muted"><i class="fas fa-circle" style="color:#6759FF ;"></i> <span
                  class="me-1 fw-bold text-dark">Status:</span><span class="badge bg-warning text-black fw-bold">
                  ${data.data.payment_status}</span></li>
            </ul>
          </div>
        </div>

        <div class="row my-2 mx-1 justify-content-center">
          <table class="table table-striped table-borderless">
            <thead class="inv-head">
              <tr>
                <th scope="col">#</th>
                 <th scope="col">Image</th>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Qty</th>
                <th scope="col">Unit Price</th>
                <th scope="col">Amount</th>
              </tr>
            </thead>
            <tbody>
            ${qty}
             

            </tbody>

          </table>
        </div>
        <div class="row">
          <div class="col-xl-6">
            <p class="ms-3">Vendor Note: ${data.data.note}</p>

          </div>
          <div class="col-xl-5 text-right">
            <ul class="list-unstyled">
              <li class="text-muted ms-3"><span class="text-dark me-4 p-10">SubTotal</span>$${data.data.sub_total}</li>
               <li class="text-muted ms-3 mt-2"><span class="text-dark me-4 p-10">Track Charges</span>$${data.data.track_charge}</li>
               <li class="text-muted ms-3 mt-2"><span class="text-dark me-4 p-10">Labour Charges</span>$${data.data.labour_charge}</li>
                <li class="text-muted ms-3 mt-2"><span class="text-dark me-4 p-10">Extra Charges</span>$${data.data.extra_charge}</li>
                <li class="text-muted ms-3 mt-2"><span class="text-dark me-4 p-10">Tax</span>$${data.data.tax}</li>
            </ul>
            <hr>
            <p class="text-black "><span class="text-dark me-3 p-10"> Total Amount</span><span
                style="font-size: 20px; font-weight: 600;" class="text-dark">$${data.data.order_amount}</span></p>
          </div>
          <div class="col-xl-1 text-right">
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-xl-10">
            <p>Thank you for your Maintenance</p>
          </div>
          <div class="col-xl-2">

          </div>
        </div>


</div>`;
           document.getElementById("getinvoicedetails").innerHTML = tab;

      } else {
        Swal.fire({
    heading: 'Alert',
    text: 'All field required',
    icon: 'info',
    loader: true,        // Change it to false to disable loader
    loaderBg: '#9EC600'  // To change the background
});
        $("#view-report").show();
        $('#exampleModalInvoice').modal('hide');
        $('#exampleModal').modal('show');
      }
                }
    });
            // return false;
        });
     });
     function myfunction1() {

  var doc = new jsPDF();
  var specialElementHandlers = {
    '#editor': function (element, renderer) {
        return true;
    }
};
    doc.fromHTML($('#getsingledetails').html(), 15, 15, {
        'width': 170,
        'color':  170,
            'elementHandlers': specialElementHandlers
    });
    doc.save('sample-file.pdf');
}
 function myfunction()
 {

  $("#getsingledetails").printThis();

 }
 function myinvoice()
 {

  $("#getinvoicedetails").printThis();

 }
  // function del() {

  //   $("#main-tab").hide();
  //   $("#show-notification").show();
  //   $("#show-history").hide();
  //   $("#show-proposal").hide();
  //   $("#show-confirm").hide();
  //   $("#show-pending").hide();
  //   $("#show-profile").hide();
  //   let del = $("#not-id").val();
  //   var assetUrl = "{{env('ASSET_URL')}}";

  //   var appUrl = "{{env('APP_URL')}}";
  //   let options = {
  //     method: 'DELETE',
  //   }
  //   const api_url =
  //     appUrl + "/owner/removed_notification_History/" + del;

  //   // Defining async function
  //   async function getapi(url, options) {

  //     // Storing response
  //     const response = await fetch(url, options);

  //     // Storing data in form of JSON
  //     var data = await response.json();
  //     console.log(data);
  //     if (response) {
  //       hideloader();
  //     }
  //     show(data);
  //   }
  //   // Calling that async function
  //   getapi(api_url, options);

  //   function hideloader() {
  //     document.getElementById('loading').style.display = 'none';
  //   }

  //   function show(data) {

  //     let tab = '';
  //     let count = 0;
  //     // Loop to access all rows
  //     if (data.status == true) {


  //       $.toast({
  //         heading: 'Alert',
  //         text: 'Data has been deleted',
  //         icon: 'info',
  //         loader: true, // Change it to false to disable loader
  //         loaderBg: '#9EC600' // To change the background
  //       })
  //       getNotification();
  //       $("#show-notification").load();
  //       $("#show-notification").show();
  //     } else {
  //       alert("failed")
  //       $("#show-notification").show();
  //     }
  //   }
  // }

  // let card = document.querySelector(".proposal-card-div"); //declearing profile card element
  // let displayPicture = document.querySelector(".Proposal"); //
  // displayPicture.addEventListener("click", function() {
  //   //on click on profile picture toggle hidden class from css
  //   card.classList.toggle("hidden");
  //   // card2.classList.add("hidden");
  // });




function calc()
{
  $('#tab_logic tbody tr').each(function(i, element) {
    var html = $(this).html();
    if(html!='')
    {
      var qty = $(this).find('.qty').val();
      var price = $(this).find('.price').val();
      $(this).find('.total').val(qty*price);

      calc_total();
    }
    });
}

function calc_total()
{
  total=0;
  $('.total').each(function() {
        total += parseInt($(this).val());
    });
  $('#sub_total').val(total.toFixed(2));
  let track = parseFloat($('#track').val());
  let extra = parseFloat($('#extra').val());
  let labour = parseFloat($('#labour').val());
  tax_sum=(total+track+extra+labour)/100*$('#tax').val();
  console.log(track)
  console.log(extra)
  console.log(total)
  $('#tax_amount').val(tax_sum.toFixed(2));
  $('#total_amount').val((tax_sum+total+track+extra+labour).toFixed(2));
}

// const header = document.querySelector(".BoxdivCount");

// header.addEventListener('click', event => {

//   if (event.target.tagName === 'BUTTON') {
//     let activeButton = header.querySelector('.boxActive [data-active="active"]');
//     const currentState = event.target.dataset.active;

//     if (activeButton && activeButton !== event.target ) {
//       activeButton.dataset.active = null;
//     }

//     event.target.dataset.active = currentState === 'active' ? null : 'active';
//   }
// });
function addPlan()
{
  $("#addPlanModal").modal('show')
}
function CreatePlan()
{
 let id = $("#plan-id").val();

 if(id != '')
 {
  $.ajax({
                type: "POST",
                url: '{!! route("update.plan")!!}',
                data: $('#form_plan').serialize(),
                success: function(data) {
                if(data.status = 'true')
                {
                 $('#plan-name').val('');
                 $('#plan-start').val('');
                 $('#plan-end').val('');
                 $('#plan-price').val('');
                 $('#plan-features').val('');
                 $('#plan-description').val('');
                    $('#addPlanModal').modal('hide');
                    // getPlan()


                    Swal.fire({
                      title: 'Added',
                      heading: 'success',
                      text: 'Plan has been updated successfully',
                      icon: 'success',
                      position:"top-center",
                      timer: 3000,
                      offset: 40,
                      loader: true,        // Change it to false to disable loader
                      loaderBg: '#9EC600'

              });
                    getCardPlan()
                    getPlan()
                }else{
                   Swal.fire({
                     title: 'Failed!',
                      heading: 'Alert',
                  text: data.message,
                  icon: 'warning',
                  offset: 50,
                  loader: true,
                  timer: 5000,       // Change it to false to disable loader
                  loaderBg: '#9EC600'
                  });
                }
              }
              });

 }else{
   $("#pname").css('display', 'none')
   $("#pstart").css('display', 'none')
   $("#pend").css('display', 'none')
    $("#pprice").css('display', 'none')
   $.ajax({
                type: "POST",
                url: '{!! route("add.plan")!!}',
                data: $('#form_plan').serialize(),
                success: function(data) {
                  console.log(data)
                   if(data.status === true)
                {
                 $('#plan-name').val('');
                 $('#plan-start').val('');
                 $('#plan-end').val('');
                 $('#plan-price').val('');
                 $('#plan-features').val('');
                 $('#plan-description').val('');
                    $('#addPlanModal').modal('hide');
                    getPlan()
                    getCardPlan()

                    Swal.fire({
                      title: 'Added',
                      heading: 'success',
                      text: 'Plan has been added successfully',
                      icon: 'success',
                      position:"top-center",
                      timer: 3000,
                      offset: 40,
                      loader: true,        // Change it to false to disable loader
                      loaderBg: '#9EC600'

              });
                    // getPlan()
                }else{
              $.each(data.data, function (i) {
    $.each(data.data[i], function (key, val) {
      if(i == 'name')
{
   $("#pname").css('display', 'block')
    $("#pname").css('color', 'red')
    $("#pname").text(val)
}else if(i == 'start_date'){
   $("#pstart").css('display', 'block')
    $("#pstart").css('color', 'red')
    $("#pstart").text(val)
}else if(i == 'price'){
   $("#pprice").css('display', 'block')
    $("#pprice").css('color', 'red')
    $("#pprice").text(val)
}else{
  $("#pend").css('display', 'block')
    $("#pend").css('color', 'red')
    $("#pend").text(val)
}



    });
});
                }
                  }
                  });
 }




}
function getPlan()
{

    var table = $('#maintenance-table').DataTable({
            retrieve:true,
            destroy:true,

            ajax: '{!! route('get.plan') !!}',
            columns: [
                { data: 'id', name: 'id' },

                { data: 'name', name: 'name' },

                { data: 'start_date', name: 'start_date' },
                { data: 'end_date', name: 'end_date' },
                { data: 'price', name: 'price' },
                { data: 'description', name: 'description' },
                { data: 'action', name: 'action' },
                ],


             });
              table.ajax.reload();
}

function editPlan(id)
{
 $("#plan-id").val(id);
 const api_url =
          '{!! url("single-plan")!!}/' + id;

        // Defining async function
        async function getapi(url) {

          // Storing response
          const response = await fetch(url);

          // Storing data in form of JSON
          var data = await response.json();
          console.log(data);

          show(data);
        }
        // Calling that async function
        getapi(api_url);
        function show(data) {
          let count = 0;
          let counts = 0;
          let tab = '';
           for (let r of data.data.features) {
            count = count+1;
             tab += `<tr id="addrr${counts}"><td>${count}</td><td> Features: <input type="text" class="form-control" id="plan-freaturs"name="features[]" value="${r}"><td></tr>`;
             counts = counts+1;

        }
         document.getElementById("tab_logics").innerHTML = tab;

                 $('#plan-name').val(data.data.name);
                 $('#plan-start').val(data.data.start_date);
                 $('#plan-end').val(data.data.end_date);
                 $('#plan-price').val(data.data.price);
                 $('#plan-description').val(data.data.description);
                 $('#addPlanModal').modal('show');

          }
}
function getCardPlan()
{
    const api_url =
     '{!! route("get.card.plan")!!}';

      // Defining async function
      async function getapi(url) {

        // Storing response
        const response = await fetch(url);

        // Storing data in form of JSON
        var data = await response.json();
         show(data);
      }
      // Calling that async function
      getapi(api_url);
      function show(data) {
console.log(data)
        let tab = '';

        let count = 0;
        // Loop to access all rows
        if (data.status == 'true') {
          console.log(data.status);
          for (let r of data.data) {
            let feature = '';
            var x = new Array();
             if(r.features.length>0){
                for (let i of r.features) {
          feature += `<li>${i}</li>`;

        }
             }else{
              feature = `<li>25GB Storage</li> <li>25 Emails</li><li>25 Domains</li><li>2GB Bandwidth</li>`;
             }




            tab += ` <div class="columns">
                <ul class="prices">
                  <li class="header" style="background-color:#6759ff">${r.name}</li>
                  <li class="grey">$ ${r.price} / year</li>
                  ${feature}
                  <li class="grey"><a href="#" class="button">Sign Up</a></li>
                </ul>
              </div>`;
            document.getElementById("get-plan-card").innerHTML = tab;


        }
      }else {
          console.log(data.message);
          tab += `  <div class="columns">
                <ul class="prices">
                  <li class="header" style="background-color:#6759ff">Pro</li>
                  <li class="grey">$ 24.99 / year</li>
                  <li>25GB Storage</li>
                  <li>25 Emails</li>
                  <li>25 Domains</li>
                  <li>2GB Bandwidth</li>
                  <li class="grey"><a href="#" class="button">Sign Up</a></li>
                </ul>
              </div>`;
          document.getElementById("get-plan-card").innerHTML = tab;
        }
      }
}

function getfulldetails(id)
{

$("#exampleModalPopups").modal('show');
 var assetUrl = "{{env('ASSET_URL')}}images/products/";
      var purl = "{{env('PROFILE_URL')}}";
      var appUrl = "{{env('APP_URL')}}";
      var placeholder ="{{env('BASE_URL')}}";;
            $.ajax({
                type: "GET",
                url: '{!! route("get.single.order")!!}?id=' + id,

                success: function(data) {
                    console.log(data);

                      let tab = '';
                      let tab1 = '';
                      let count = 0;

      if (data.status == 'true') {
        var orderUrl = "{{env('APP_URL')}}/uploads/pictures/";
            let img1 = '';
            let img3 = '';
            let inv = '';
            let order_date = '';
            let note_date = '';
              var x = new Array();
              var y = new Array();
             if((data.data.order_images).length>0){
                x = data.data.order_images

             }else{
              img1 = `<img src="${placeholder + '/public/product-dummy.png'}" height="100" width="100" alt=""  style="height: 100px !important;">`;
             }
            for (let i of x) {
              order_date = i.created_at;
              img1 += `<img src="${orderUrl + i.images}" height="100" width="100" class="rounded" alt="Cinque Terre" style="padding: 2px; border: 2px solid #f4f3fa;">&nbsp;&nbsp;`;

            }
             if((data.data.quote_images).length>0){
                y = data.data.quote_images
             }else{
              img3 = `<img src="${placeholder + '/public/product-dummy.png'}" height="100" width="100" alt=""  style="height: 100px !important;">&nbsp;&nbsp;`;
             }
        for (let i of y) {
           note_date = i.created_at;
          img3 += `<img src="${orderUrl + i.vendor_images}" height="100" width="100" class="rounded" alt="Cinque Terre" style="padding: 2px; border: 2px solid #f4f3fa;">&nbsp;&nbsp;`;

        }

              if(data.data.is_generated === 0 && data.data.order_status === 'Confirmed')
              {
                inv = `<div class="ml-4">
            <div class="btnPanel" style="float: right;"><span class="badge badge-secondary priceBdge">  Price: ${data.data.order_amount}</span>
             <span class="badge badge-primary" id="WFID9701S">${data.data.order_status}</span>
              <a href="#" class="badge badge-primary text-center" onclick="invoice(this.id)" id="${data.data.order_id}">Generate Invoice</a></div>
            </div>
         </div>`;
              }
              let note =  data.data.note == null ? "There is no any note!" :  data.data.note;
              if(data.data.note != null || data.data.note != null)
              {
                   tab1 = `
        <div class="metaInfo dmetaInfo">
         <h4 style="font-size: 20px;color: #453d3d;" class="card-title">Quote Details</h4>
         <hr>
         <h4 style="font-size: 20px;color: #453d3d;" class="card-title">Vendor quotation: <small style="font-size:15px; color:#453d3d;"> ${data.data.note}</small></h4>
            <h4 style="font-size: 20px; color: #453d3d;" class="card-title">To: ${data.data.owner_name} &nbsp; &nbsp;Phone:${data.data.phone} </h4>
              <h4 style="font-size: 20px; color: #453d3d;" class="card-title">Status: ${data.data.order_status} &nbsp; &nbsp;Date:${note_date}</h4>
            </div>
           <div class="mt-3" id="multi-img">${img3} </div>`;
              }
              let img2 = '';
              var x = new Array();
             if(data.data.images != null){
                 img2 = `<img src="${data.data.thumbnail_images}" height="100" width="100" alt="">`;
             }else{
              img2 = `<img src="${assetUrl + 'product-dummy.png'}" height="100" width="100" alt="" >`;
             }
              tab = ` <div class="proOuterBox">
              <div class="metaInfo dmetaInfo text-center">
         <h4 style="font-size: 20px;color: #453d3d;" class="card-title">OrderID: ${data.data.order_id}</h4>
            </div>
  <div class="row g-0 pt-2">
    <div class="col-md-3">
      <img src="${assetUrl + data.data.thumbnail_image}" class="productImg" alt="..." id="${id}"  >
    </div>
    <div class="col-md-9">
      <div class="card-body">

        <div class="row g-0">
        <div class="col-sm-9">
         <h2 class="card-title">
         ${data.data.product_name}
         <h2>
        </div>
         <div class="col-sm-3">
         ${data.data.qrcode}
        </div>
        </div>

        <h5  class="card-title">Model: ${data.data.model_number} Brand: ${data.data.brand}</h5>
        <h4 style="font-size: 20px; color: #453d3d;" class="card-title"> Title: ${data.data.title} </div></h4>

        <div class="metaInfo dmetaInfo">
         <h4 style="font-size: 20px;color: #453d3d;" class="card-title">Order Details</h4>
         <hr>
         <h4 style="font-size: 20px;color: #453d3d;" class="card-title">Oder Note: <small style="font-size:15px; color:#453d3d;">${data.data.description}</small></h4>
            <h4 style="font-size: 20px; color: #453d3d;" class="card-title">To: ${data.data.vendor_name} &nbsp; &nbsp;Phone:${data.data.vendor_phone}</h4>
            <h4 style="font-size: 20px; color: #453d3d;" class="card-title">Status: ${data.data.order_status} &nbsp; &nbsp;Date:${order_date}</h4></div>
  <div class="mt-3" id="multi-img">${img1} </div><hr>${tab1} </div> </div></div>
  </div>  </div>
  <div class="row g-0">
  <div class="ml-8">

        </div>
  ${inv}

        </div>

</div>`;
 document.getElementById("getPopupDetails").innerHTML = tab;
            }else{
                tab = ` <div class="vendor-name-history"><div class="images-div"></div>

<p><img src="${assetUrl}nodata.png" alt="" width="200" class="rounded-circle" id="">${data.message}
</p>
</div>`;
          document.getElementById("getPopupDetails").innerHTML = tab;
            }

          }
        });
}


</script>

</html>