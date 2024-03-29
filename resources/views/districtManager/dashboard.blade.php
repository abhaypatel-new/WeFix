<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>WeFix</title>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" >
  <!-- Style-->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
  <link rel="stylesheet" href="{{ asset('css/skin_color.css') }}">
  <link href="https://cdn.datatables.net/1.13.3/css/jquery.dataTables.min.css" rel="stylesheet">
   <link rel="stylesheet" href="{{ asset('css/style_index.css') }}">
  <script src="{{ asset('js/font.js') }}" crossorigin='anonymous'></script>
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

  <style>
* {
    box-sizing: border-box;
    font-family: "poppins";
    font-weight: 300;
  color: #000;
}
.fa{
  color: #fff;
}
  .proposal-hovers{
  padding-bottom: 10px;
}

.columns {
  float: left;
  width: 33.3%;
  padding: 8px;
}

.prices {
  list-style-type: none;
  border: 1px solid #eee;
  margin: 0;
  padding: 0;
  -webkit-transition: 0.3s;
  transition: 0.3s;
}

.prices:hover {
  box-shadow: 0 8px 12px 0 rgba(0,0,0,0.2)
}

.prices .header {
  background-color: #6759ff;
  color: white;
  font-size: 25px;
}

.prices li {
  border-bottom: 1px solid #eee;
  padding: 20px;
  text-align: center;
  color: #000;
}

.prices .grey {
  background-color: #eee;
  font-size: 20px;
}

.button {
  background-color: #6759ff;
  border: none;
  color: white;
  padding: 10px 25px;
  text-align: center;
  text-decoration: none;
  font-size: 18px;
}

@media only screen and (max-width: 600px) {
  .columns {
    width: 100%;
  }
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
          if(auth('owner')->user()->roleid === 3)
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

              <li class="dropdown-item"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
              <li class="dropdown-item"><a href="{{ url('/logout') }}">Logout</a></li>
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
   <input type="hidden" value="{{auth('owner')->user()->id}}" id="owner_id">

  <section id="dashboardContainer">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-3">
        <div class="side-bar">
          <div class="side-bar-main" style="position: fixed;">

        <button class="sidebarBtn Proposal" id="proposal" style="cursor: pointer;">
            <img src="{{ asset('images') }}/image/dashboard.png" alt="">
            <h3 class="Proposal-color">Dashboard</h3>

          </button>
          <div class="Employee" style="cursor: pointer;background: unset;" id="Employees">
              <img src="{{ asset('images') }}/image/Employee.png" alt="">
              <h3 class="employees-color">Employee</h3>
              <!-- <img class="dropdown-img" src="./image/dropdown.png" alt=""> -->
            </div>
         <div class="Equipment" style="cursor: pointer;     background: unset;" id="Equipments">
              <img src="{{ asset('images') }}/image/equipments.png" alt="">
              <h3 class="equipments-color">Equipments</h3>
              <!-- <img class="dropdown-img" src="./image/dropdown.png" alt=""> -->
            </div>
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
          <div class="card" id="single-detail">
            <h5 class="card-header">View Equipment Details</h5>
            <div class="d-flex justify-content-center">
             <!--  <div class="spinner-border" role="status" id="loading">
                <span class="sr-only">Loading...</span>
              </div> -->
            </div>
            <div class="card" id="get-single-equipment">
            </div>
          </div>
           <div class="card" id="show-equipment">
            <h5 class="card-header">Equipment</h5>
             <div  style="padding: 14px 20px 0px 20px;">
            <button class="btn btn-primary"  onclick="addEquipment();" style="float: right;padding: 10px 35px 10px 35px;"><i
              class="fa fa-plus"></i> Add Equipment</button></div>
            
           <div class="col-xl-12 float-end">
             </div>
            <div class="card" id="get-equipment">
            <table id="equipment-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>

                    <th>Image</th>
                    <th>Model</th>
                    <th>Stock</th>
                    <th>Category</th>
                    <th>Shop</th>
                     <th>Qrcode</th>
                    <th>Action</th>

                </tr>
            </thead>
            <tbody>

            </tbody>
          </table>
            </div>
          </div>
           <div class="card" id="show-maintenance" style="display:inline-table !important;">
            <h5 class="card-header">Maintenace</h5>
          <!--   <div onclick="addPlan()" style="padding: 14px 20px 0px 20px;">
            <button class="btn btn-primary" style="float: right;padding: 10px 35px 10px 35px;"><i
              class="fa fa-plus"></i> Add Plan</button>
            </div> -->

            <!-- <h2 style="text-align:center">Maintenance Plans</h2> -->
            <!--   <div class="card" id="get-plan-card" style="flex-direction: initial !important;">

              </div> -->
             <!-- <hr> -->
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
          <div class="card" id="show-employee" style="display: flex;">
            <h5 class="card-header">Employee</h5>
            <div onclick="addEmployee()" style="padding:5px;">
            <button class="btn btn-primary" style="float: right;"><i
              class="fa fa-plus"></i> Add Employee</button>
            </div>
            <div class="card" id="get-employee">
               <table id="employee-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Company</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Role</th>
                    <th>Action</th>

                </tr>
            </thead>
            <tbody>

            </tbody>
          </table>
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
        <!-- <input type="button" id="submit" name="submit" value="Submit"> -->
         <button type="button" class="btn btn-primary" id="submit">Submit</button>
      </div>
        </form>
    </div>
  </div>
</div>

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

    </div>

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

<!-----------Start Equipment Modal---------------->

 <div class="modal fade" id="equipmentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog w-800" role="document">
    <div class="modal-content ">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Equipment</h5>
        <button type="button" class="close btn btn-secondary" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- <form method="post" id="eq_id"> -->
         <!--  <div class="mb-3">
             <input type="hidden" class="form-control" id="equipmentId" name="ID">
            <label for="equipment-name" class="col-form-label">Name:</label>
            <input type="text" class="form-control" id="equipment-name" name="name"><span class="text-danger" id="ename"></span>
          </div>
             @csrf
           <div class="mb-3">
            <label for="equipment-name" class="col-form-label">Image:</label>
            <input type="file" class="form-control" id="equipment-image" alt="equipment-image" name="images"><span class="text-danger" id="eimg"></span>
            <img id="frame" src="" width="100px" height="100px" style="display:none;" class="rounded-circle" style="border:2px solid;"/><i class="fa fa-check-circle yes" style="font-size:48px;color:green; display:none;text-align: left;"></i>
          </div>
           <div class="mb-3">
            <label for="equipment-name" class="col-form-label">Model No.:</label>
            <input type="text" class="form-control" id="equipment-model" name="model"><span class="text-danger" id="emodel"></span>
          </div>
           <div class="mb-3">
            <label for="equipment-name" class="col-form-label">Price:</label>
            <input type="number" class="form-control" id="equipment-price" maxlength="10" name="price"><span class="text-danger" id="eprice"></span>
          </div>
           <div class="mb-3">
            <label for="equipment-name" class="col-form-label">Qty:</label>
            <input type="number" class="form-control" id="equipment-qty" maxlength="5" name="qty"><span class="text-danger" id="eqty"></span>
          </div>
           <div class="mb-3">
            <label for="equipment-name" class="col-form-label">Stock:</label>
            <input type="number" class="form-control" id="equipment-stock" maxlength="5" name="stock">
          </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">Description:</label>
            <textarea class="form-control" id="equipment-description" name="description"></textarea>
          </div>
          <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="button"class="btn btn-primary" id="add-equipment">Save</button>
      </div> -->
        <!-- </form> -->
 <div class="box-body">
                                   
                                        @csrf
                                          <input type="hidden" class="form-control" id="equipmentId" name="ID">
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="fw-700 fs-16 form-label">Category <span
                                                                class="text-danger">*</span></label>
                                                        <select class="form-select" data-placeholder="Choose a Category"
                                                            name="category" tabindex="1" required
                                                            data-validation-required-message="Category field is required" id="equipment-category">
                                                            <option>Select Category</option>
                                                            @php 
                                                           $categories = App\Model\Category::get();
                                                            @endphp
                                                            @foreach($categories as $category)
                                                            <option value="{{ $category->id }}">{{$category->name}}
                                                            </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="fw-700 fs-16 form-label">Store Name <span
                                                                class="text-danger">*</span></label>
                                                        <select class="form-select" data-placeholder="Choose a Shop"
                                                            name="shop_id" tabindex="1" required
                                                            data-validation-required-message="Shop field is required" id="equipment-shop_id">
                                                            <option>Select Store Name</option>
                                                             @php 
                                                           $shops = App\Model\Shop::get();
                                                            @endphp
                                                            @foreach($shops as $shop)
                                                            <option value="{{ $shop->id }}">{{$shop->name}}
                                                            </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                

                                                <!--/span-->

                                            </div>
                                            <!--/row-->
                                            <!--/row-->

                                            <!--/row-->
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <h4 class="box-title mt-40">General Info</h4>
                                                    <div class="table-responsive">
                                                        <table class="table no-border td-padding">
                                                            <tbody>
                                                                <tr>
                                                                    <td>
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label class="fw-700 fs-16 form-label">Product Name <span
                                                                                    class="text-danger">*</span></label>
                                                                            <div class="controls">
                                                                                <input type="text" class="form-control"
                                                                                    placeholder="Product Name" name="product_name" required
                                                                                    data-validation-required-message="Product Name field is required" id="equipment-product_name">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="col-md-12">
                                                                            <div class="form-group">
                                                                                <label
                                                                                    class="fw-700 fs-16 form-label">Brand
                                                                                    <span
                                                                                        class="text-danger">*</span></label>
                                                                                <div class="controls">
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        placeholder="Brand Name"
                                                                                        name="brand" required
                                                                                        data-validation-required-message="Brand Name field is required" id="equipment-brand">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </td>

                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <div class="col-md-12">
                                                                            <div class="form-group">
                                                                                <label
                                                                                    class="fw-700 fs-16 form-label">Model
                                                                                    Number </label>
                                                                                <div class="controls">
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        placeholder="Model Number"
                                                                                        name="model_number" id="equipment-model_number">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="col-md-12">
                                                                            <div class="form-group">
                                                                                <label
                                                                                    class="fw-700 fs-16 form-label">Serial
                                                                                    Number </label>
                                                                                <div class="controls">
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        placeholder="Serial Number"
                                                                                        name="serial_number" id="equipment-serial_number">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </td>

                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <div class="col-md-12">
                                                                            <div class="form-group">
                                                                                <label
                                                                                    class="fw-700 fs-16 form-label">Purchase
                                                                                    Date </label>
                                                                                <div class="controls">
                                                                                    <input type="date"
                                                                                        class="form-control"
                                                                                        placeholder="Purchase Date"
                                                                                        name="purchase_date" id="equipment-purchase_date">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="col-md-12">
                                                                            <div class="form-group">
                                                                                <label
                                                                                    class="fw-700 fs-16 form-label">Warranty
                                                                                </label>
                                                                                <div class="controls">
                                                                                    <select class="form-control" name="warranty" id="warranty">
                                                                                        <option value="">Select Warranty</option>
                                                                                        <option value="3 Months">3 Months</option>
                                                                                        <option value="6 Months">6 Months</option>
                                                                                        <option value="1 Year">1 Year</option>
                                                                                        <option value="2 Year">2 Year</option>
                                                                                        <option value="3 Year">3 Year</option>
                                                                                        <option value="4 Year">4 Year</option>
                                                                                        <option value="5 Year">5 Year</option>
                                                                                        <option value="6 Year">6 Year</option>
                                                                                        <option value="7 Year">7 Year</option>
                                                                                        <option value="8 Year">8 Year</option>
                                                                                        <option value="9 Year">9 Year</option>
                                                                                        <option value="10 Year">10 Year</option>
                                                                                    </select>
                                                                                    
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </td>

                                                                </tr>
                                                                <tr>
                                                                    <td colspan="2">
                                                                        <div class="col-md-12">
                                                                            <div class="form-group">
                                                                                <label
                                                                                    class="fw-700 fs-16 form-label">Product
                                                                                    Description <span
                                                                                        class="text-danger">*</span></label>
                                                                                <div class="controls">
                                                                                    <textarea class="form-control p-15"
                                                                                        rows="1"
                                                                                        name="product_description"
                                                                                        placeholder="Product description goes here..."
                                                                                        required
                                                                                        data-validation-required-message="Product Description is required" id="equipment-product_description"></textarea>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                    </td>
                                                                </tr>

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="field" align="left">
                                                        <h3>Upload your images</h3>
                                                        <input type="file" id="equipment-image" name="images[]" multiple />
                                                    </div>
                                                     <img id="frame" src="" width="100px" height="100px" style="display:none;" class="rounded-circle" style="border:2px solid;"/><i class="fa fa-check-circle yes" style="font-size:48px;color:green; display:none;text-align: left;"></i>
                                                </div>
                                            </div>

                                           

                                            </div>

                                            <div class="row mt-3">

                                                <!--/span-->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="fw-700 fs-16 form-label">Status</label>
                                                        <div class="radio-list">
                                                            <label class="radio-inline p-0 me-10">
                                                                <div class="radio radio-info">
                                                                    <input type="radio" name="status" id="radio1"
                                                                        value="publish" checked>
                                                                    <label for="radio1">Published</label>
                                                                </div>
                                                            </label>
                                                            <label class="radio-inline">
                                                                <div class="radio radio-info">
                                                                    <input type="radio" name="status" id="radio2"
                                                                        value="draft">
                                                                    <label for="radio2">Draft</label>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                            </div>
                                        </div>
                                        <div class="form-actions mt-10">
                                        <button type="button" class="btn btn-warning">Cancel</button>
                                            <button type="submit" class="btn btn-primary" id="add-equipment"> <i class="fa fa-check"></i>
                                                Save</button>
                                        </div>
                                    </form>
                                </div>

      </div>


    </div>
  </div>
</div>
<!-----------End Equipment Modal---------------->

<!-----------Start Popup Modal---------------->
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

<!-----------End Popup Modal---------------->
<!-------------------Employee Modal -------------->

<div class="modal fade" id="employeeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog w-800" role="document">
    <div class="modal-content ">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Employee</h5>
        <button type="button" class="close btn btn-secondary" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" id="emp_form">

                                    @csrf

                                     <input type="hidden" id="emp-id" name="id">
                                     <input type="hidden" id="createrid" value="{{auth('owner')->user()->id}}" name="d_manager_id">
                                    <div class="box-body">
                                        <h4 class="box-title text-info mb-0"><i class="ti-user me-15"></i> Personal Info
                                        </h4>
                                        <hr class="my-15">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group mb-3">
                                                    <label class="form-label">First Name</label> <span
                                                        class="text-danger">*</span>
                                                    <div class="controls">
                                                        <input type="text" name="first_name" class="form-control"
                                                            required
                                                            data-validation-required-message="First Name field is required" id="efirst"><span
                                                        class="text-danger" id="fname"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group mb-3">
                                                    <label class="form-label">Last Name</label> <span
                                                        class="text-danger">*</span>
                                                    <div class="controls">
                                                        <input type="text" name="last_name" class="form-control"
                                                            required
                                                            data-validation-required-message="Last Name field is required" id="elast"><span
                                                        class="text-danger" id="lname"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group mb-3">
                                                    <label class="form-label">E-mail</label><span
                                                        class="text-danger">*</span>
                                                    <div class="controls">
                                                        <input type="email" name="email" class="form-control" required
                                                            data-validation-required-message="Email field is required" id="e-email"><span
                                                        class="text-danger" id="email"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group mb-3">
                                                    <label class="form-label">Contact Number</label>
                                                    <input type="text" name="phone" class="form-control"
                                                        placeholder="Phone" id="ecnt"><span
                                                        class="text-danger" id="phone"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-12">

                                            <div class="form-group mb-3">
                                                <label class="form-label">Password</label><span
                                                    class="text-danger">*</span>
                                                <div class="input-group mb-3 controls">
                                                    <span class="input-group-text"><i class="fa fa-lock" style="color: #000;"></i></span>
                                                    <input type="password" class="form-control" name="password"
                                                        placeholder="Password" required
                                                        data-validation-required-message="Password field is required" id="epass"><span
                                                        class="text-danger" id="pass"></span>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-md-12">

                                            <div class="form-group mb-3">
                                                <label class="form-label">Confirm Password</label><span
                                                    class="text-danger">*</span>
                                                <div class="input-group mb-3 controls">
                                                    <span class="input-group-text"><i class="fa fa-lock" style="color: #000;"></i></span>
                                                    <input type="password" placeholder="Confirm Password" name="con_password" data-validation-required-message="Confirm Password field is required" data-validation-match-match="password" class="form-control" required>

                                                </div>
                                            </div>
                                            </div>

                                        </div>
                                        <h4 class="box-title text-info mb-0 mt-20"><i class="ti-save me-15"></i>
                                            Requirements</h4>
                                        <hr class="my-15">

                                        <div class="row">

                                            <div class="col-md-6">
                                                <div class="form-group mb-3">
                                                    <label class="fw-700 fs-16 form-label">Company</label><span
                                                        class="text-danger">*</span>
                                                    <select class="form-select" data-placeholder="Choose a Company"
                                                        name="company_id" tabindex="1" required
                                                        data-validation-required-message="Company field is required" style="color:#808080;" id="ecmp">
                                                        <option value="">Select Company</option>
                                                        @php $companies = App\Model\Company::all();
                                                        @endphp
                                                        @foreach($companies as $company)
                                                        <option value="{{ $company->id }}" style="color:#808080;">{{ $company->company_name }}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group mb-3">
                                                    <label class="fw-700 fs-16 form-label">Job Position</label><span
                                                        class="text-danger">*</span>
                                                    <select class="form-select" data-placeholder="Choose a Job Position"
                                                        name="roleid" tabindex="1" required
                                                        data-validation-required-message="Job Position field is required" style="color:#808080;" id="ejob">
                                                        <option value="" style="color:#808080;">Select Job Position</option>
                                                        <option value="4" style="color:#808080;">Owner</option>
                                                        <option value="3" style="color:#808080;">District Manager</option>
                                                        <option value="2" style="color:#808080;">Manager</option>
                                                    </select>
                                                </div>
                                            </div>

                                        </div>


                                     <!--    <div class="form-group mb-3">
                                            <label class="form-label">About Employee</label>
                                            <textarea rows="5" class="form-control" name="desc"
                                                placeholder="About Employee" id="eabout"></textarea>
                                        </div> -->
                                    </div>

                                    <div class="row mt-3">

                                        <!--/span-->
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label class="fw-700 fs-16 form-label">Status</label>
                                                <div class="radio-list">
                                                    <label class="radio-inline p-0 me-10">
                                                        <div class="radio radio-info">
                                                            <input type="radio" name="status" value="publish" checked>
                                                            <label for="radio1">Published</label>
                                                        </div>
                                                    </label>
                                                    <label class="radio-inline">
                                                        <div class="radio radio-info">
                                                            <input type="radio" name="status" value="draft">
                                                            <label for="radio2">Draft</label>
                                                        </div>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                    </div>
                                    <!-- /.box-body -->
                                    <div class="box-footer">
                                        <button type="button" class="btn btn-warning me-1">
                                            <i class="ti-trash"></i> Cancel
                                        </button>
                                        <button type="button" class="btn btn-primary" onclick="CreateEmp()">
                                            <i class="ti-save-alt"></i> Save
                                        </button>
                                    </div>
                                </form>
        <!--   <div class="mb-3">
             <input type="hidden" class="form-control" id="equipmentId" name="ID">
            <label for="equipment-name" class="col-form-label">Name:</label>
            <input type="text" class="form-control" id="equipment-name" name="name">
          </div>
             @csrf
           <div class="mb-3">
            <label for="equipment-name" class="col-form-label">Image:</label>
            <input type="file" class="form-control" id="equipment-image" alt="equipment-image" name="images">
            <img id="frame" src="" width="100px" height="100px" style="display:none;" class="rounded-circle" style="border:2px solid;"/><i class="fa fa-check-circle yes" style="font-size:48px;color:green; display:none;text-align: left;"></i>
          </div>
           <div class="mb-3">
            <label for="equipment-name" class="col-form-label">Model No.:</label>
            <input type="text" class="form-control" id="equipment-model" name="model">
          </div>
           <div class="mb-3">
            <label for="equipment-name" class="col-form-label">Price:</label>
            <input type="number" class="form-control" id="equipment-price" maxlength="10" name="price">
          </div>
           <div class="mb-3">
            <label for="equipment-name" class="col-form-label">Qty:</label>
            <input type="number" class="form-control" id="equipment-qty" maxlength="5" name="qty">
          </div>
           <div class="mb-3">
            <label for="equipment-name" class="col-form-label">Stock:</label>
            <input type="number" class="form-control" id="equipment-stock" maxlength="5" name="stock">
          </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">Description:</label>
            <textarea class="form-control" id="equipment-description" name="description"></textarea>
          </div>
          <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="button"class="btn btn-primary" id="add-equipment">Save</button>
      </div> -->
        <!-- </form> -->
      </div>


    </div>
  </div>
</div>
 <!-------------------Employee Modal End-------------->
  @endif
</body>
<!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script> -->


<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
<script type="text/javascript" src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/printThis/1.15.0/printThis.min.js" integrity="sha512-d5Jr3NflEZmFDdFHZtxeJtBzk0eB+kkRXWFQqEc1EKmolXjHm2IKCA7kTvXBNjIYzjXfD5XzIjaaErpkZHCkBg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  </script>
  <script src="{{ asset('assets/vendor_components/datatable/datatables.min.js')}}"></script>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

  <script type="text/javascript">
    $(window).load(function(){
     let id = $("#owner_id").val();
     if(id == '')
     {
      location.href = 'Dmanager';
     }
    $("#dashboard-body").css('backgrount', 'transparent');
    $(".dn").css('display', 'none');
    $("#show-history").hide();
    $("#single-detail").hide();
    $("#view-notification").hide();
    $("#show-notification").hide();
    $("#list-notification").hide();
     $("#show-new-work").hide();
    $("#show-proposal").hide();
    $("#show-confirm").hide();
     $("#show-report").hide();
     $("#show-equipment").hide();
      $("#show-employee").hide();
     $("#show-maintenance").hide();
    $("#view-report").hide();
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
    getEmployee()
     getcountdata()
     getCardPlan()
     getPlan()
     getpiechart()
    $("#frame").css('display', 'none');
        $(".yes").css('display', 'none');
        $("#equipment-image").change(function() {
        $("#frame").css('display', 'block');
        $(".yes").css('display', 'block');
        $("#upload-alert").text('Image Uploaded');
        $("#upload-alert").css('display', 'block');
        frame.src=URL.createObjectURL(event.target.files[0]);
        Swal.fire({
    title: 'Upload',
    heading: 'success',
    text: 'Image uploaded',
    icon: 'success',
    position:"top-center",
    fadeDelay: 10000,
    offset: 40,
    loader: true,        // Change it to false to disable loader
    loaderBg: '#9EC600'
    });
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
async function getchart(counturl) {

  // Storing response
  const response = await fetch(counturl);

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
           fill: false,
           lineTension: 0,
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
 async function getpiechart() {
  const piecharturl =
  '{!! route("get.pie.chart")!!}';


  // Storing response
  const response = await fetch(piecharturl);

  // Storing data in form of JSON
  var data = await response.json();
  console.log(data);

  showpiechart(data);
}

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

     var i=1;
    $("#add_rows").click(function(){b=i-1;
        $('#addrr'+i).html($('#addrr'+b).html()).find('td:first-child').html(i+1);
        $('#tab_logics').append('<tr id="addrr'+(i+1)+'"></tr>');
        i++;
    });
    $("#delete_rows").click(function(){
      alert("sdfsd")
      if(i>1){
    $("#addrr"+(i-1)).html('');
    i--;
    }

  });

  $('#tab_logic tbody').on('keyup change',function(){
    calc();
  });
  $('#tax').on('keyup change',function(){
    calc_total();
  });


  });
  function getNotification() {
    let id = $("#owner_id").val();
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
          tab += `<div class="card mb-3 pl-5" style="max-width: 540px;">
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

  function DelEquipment(id)
  {

   const api_url =
      '{!! route("delete.equipment")!!}?id=' + id;
      Swal.fire({
                title: 'Are you sure?',
                text: "It will be delete permanently!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                showLoaderOnConfirm: true,
                preConfirm: function() {
                    return new Promise(function(resolve) {
                        $.ajax({
                                url: api_url,
                                type: 'GET',
                                dataType: 'json'
                            })
                            .done(function(response) {
                                Swal.fire('Deleted!', 'Record has been deleted', 'success');
                                  getequipment()
                            })

                            .fail(function() {
                                Swal.fire('Oops...', 'Something went wrong with ajax !', 'error')
                            });
                    });
                },
            });


  }
  /*--------Delete-Report-End---------*/

  /*--------View-Report-Start---------*/

  function viewReport(id)
  {
     $("#show-maintenance").hide();
      $("#show-equipment").hide();
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
             const href = '{!! url("generate-invoice")!!}/' + data.data.id;
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
$("#show-equipment").hide();
$("#show-employee").hide();
$("#show-maintenance").hide();
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
     $("#show-equipment").hide();
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
    let id = $("#owner_id").val();

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
       $(".maintenance-color").css("color", "#000");
      $(".Maintenance").css("background-color", "#ffffff");
       $(".equipment-color").css("color", "#000");
      $(".Equipment").css("background-color", "#ffffff");
      $(".New-Work-Order").css("background-color", "#ffffff");
      $(".order-color").css("color", "#000");
      $(".notification-color").css("color", "#000");
      $(".Notification").css("background-color", "#ffffff");
      $(".setting-color").css("color", "#000");
      $(".Setting").css("background-color", "#ffffff");
      $(".logout-color").css("color", "#000");
      $(".Logout").css("background-color", "#ffffff");
       $(".employees-color").css("color", "#000");
      $(".Employee").css("background-color", "#fff");
      $("#main-tab").show();
      $("#show-new-workorder").hide();
      $("#edit-profile-details").hide();
      $("#show-notification").hide();
      $("#list-notification").hide();
      $("#view-notification").hide();
      $("#show-history").hide();
      $("#show-employee").hide();
      $("#show-proposal").hide();
      $("#show-confirm").hide();
      $("#show-pending").hide();
      $("#show-profile").hide();
      $("#show-report").hide();
      $("#view-report").hide();

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
      let id = $("#owner_id").val();
      $("#main-tab").show();
      $("#show-history").hide();
       $("#show-maintenance").hide();
      $("#show-equipment").hide();
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
      const api_url =
      appUrl + "/owner/get_history_proposal";

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
      }else {
          console.log(data.message);
          tab += `<div class="vendor-name-history"><div class="images-div"></div>
                    <p><img src="${assetUrl}nodata.png" alt="" width="200" class="rounded-circle" id="">${data.message}
                    </p>
                  </div>`;
          document.getElementById("Proposal-card").innerHTML = tab;
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

      tab += `<div class=" proposal-hover">
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
                               </div>
                              </div>
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

          let img = r.thumbnail_image == null ? assetUrl + "product-dummy.png" : r.thumbnail_image;
          // let img1 = r.image == null ? assetUrl + "product-dummy.png" : r.image;
          let vendor = r.vendor_images == null ? assetUrl + "default-profile.png" : r.vendor_images;
          let note = r.note == null ? "There is no any note!" : r.note;
          if(r.date != null || r.time != null)
          {
              date = r.date;
              time = r.time;
          }


      tab += ` <div class="proposal-hover"><div class="Proposal-card-01"><img src="${img}" class="rounded-start" alt="..." id="${id}" height="180" width="300"><h4>${r.product_name}</h4>
            <p>Code:${r.order_id}</p><ul></ul><div class="vendor-class"><div class="vendor-name"><div class="row g-0"><div class="col-md-2"></div><div class="col-md-10"><h4 class="card-title" style="width: 100%;">${r.vendor_name}</h4><p>Code: #D-${r.vendor_id}</p></div></div><div class="row g-0"><div class="col-md-12"></div></div></div>
            </div>
            </div>
        </div>`;
      document.getElementById("Proposal-card").innerHTML = tab;
    }

  } else {
    console.log(data.message);
    tab += ` <div class="vendor-name-history" style="text-align: center;><div class="images-div"></div><p><img src="${assetUrl}nodata.png" alt="" width="200" class="float-start rounded-circle" id="">${data.message}
</p>
</div>`;
    document.getElementById("Proposal-card").innerHTML = tab;
  }
}
}
    });
    /*get end default proposal*/
    /*------Get Proposal---------*/

    $("#link").click(function() {
      $(".proposal-card-div").css("display", "none");
      $(".New-Work-Order").css("background-color", "#ffffff");
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
      $("#show-maintenance").hide();
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
          tab += `<div class="vendor-name-history" style="
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
          tab += `<div class="vendor-name-history" style="
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
            tab += `<div class="vendor-name-history" style="
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
              tab += `<div class="card mb-3">
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
            tab += `<div class="vendor-name-history" style="
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

              tab += `<div class="card mb-3">
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
            tab += `<div class="vendor-name-history" style="
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
              tab += `<div class="card mb-3">
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
            tab += `<div class="vendor-name-history" style="
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
          tab += `<div class="vendor-name-history" style="
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
      $("#main-tab").show();
      $("#show-notification").hide();
      $("#list-notification").hide();
      $("#view-notification").hide();
      $("#show-maintenance").hide();
      $("#show-equipment").hide();
      $("#show-history").hide();
      $("#show-proposal").hide();
      $("#show-confirm").hide();
      $("#show-pending").hide();
      $("#show-profile").hide();
      let vid = $('#ownerid').val();

      var assetUrl = "{{env('ASSET_URL')}}";

      var appUrl = "{{env('APP_URL')}}";

        const api_url =
          appUrl + "/owner/get_pending_Proposal?order_status=pending";

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

              tab += `<div class="proOuterBox">
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
                                  <span>   ${reject} </span><span > ${count}</span></div><h5 class="card-title" >${note}</h5>
                        <div class="container mt-3" id="multi-img">  ${img2}</div> </div> </div></div>
                        </div>  </div>
                      </div>`;
 document.getElementById("Proposal-card").innerHTML = tab;
            }

          } else {
            console.log(data.message);
            tab += `<div class="vendor-name-history"><div class="images-div"></div>
                    <p><img src="${assetUrl}nodata.png" alt="" width="200" class="rounded-circle" id="">${data.message}!
                    </p>
                  </div>`;
            document.getElementById("Proposal-card").innerHTML = tab;
          }

      }



    });

    /*------End Pending Proposal---------*/

    /*--------Start-Report---------------*/

     $("#report").click(function() {

      $(".proposal-card-div").css("display", "none");

      $(".Report").css("background-color", "#e4e6ef");
      $(".report-color").css("color", "#6759ff");
       $(".maintenance-color").css("color", "#000");
      $(".Maintenance").css("background-color", "#ffffff");
       $(".equipment-color").css("color", "#000");
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
      $("#show-maintenance").hide();
      $("#show-equipment").hide();
      $("#show-employee").hide();
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
                { data: 'action', name: 'action',
        rowCallback: function( row, data, index ) {
         $('td:eq(9)', row).html( '<a href="'+data.filepath+'/'+data.fileName + '" download>Download</a>' );

  }
                 },


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
      $(".Proposal").css("background-color", "#ffffff");
      $(".New-Work-Order").css("background-color", "#ffffff");
      $(".oreder-color").css("color", "#000");
      $(".Notification").css("background-color", "#ffffff");
      $(".Proposal-color").css("color", "#000");
      $(".setting-color").css("color", "#6759ff");
      $(".notification-color").css("color", "#000");
      $(".report-color").css("color", "#000");
      $(".Report").css("background-color", "#ffffff");
       $(".maintenance-color").css("color", "#000");
      $(".Maintenance").css("background-color", "#ffffff");
       $(".equipment-color").css("color", "#000");
      $(".Equipment").css("background-color", "#ffffff");
      $(".logout-color").css("color", "#000");
      $(".Logout").css("background-color", "#ffffff");
      $(".employees-color").css("color", "#000");
      $(".Employee").css("background-color", "#fff");

      $("#main-tab").hide();
      $("#show-notification").hide();
      $("#show-maintenance").hide();
      $("#show-new-workorder").hide();
      $("#show-equipment").hide();
      $("#show-employee").hide();
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
      let id = $("#owner_id").val();
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
            </div>`;

            document.getElementById("update-profile").innerHTML = tab;
          }

        } else {
          console.log(data.message);
          tab += `<div class="vendor-name-history" style="
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
       $("#show-maintenance").hide();
      $("#show-equipment").hide();
      $("#edit-profile-details").hide();
      let vid = $("#ownerid").val();
      var assetUrl = "{{env('ASSET_URL')}}";

      var appUrl = "{{env('APP_URL')}}";

        const api_url =
          appUrl + "/owner/get_pending_Proposal?order_status=confirmed";

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
                          </div>`;
           document.getElementById("Proposal-card").innerHTML = tab;
            }

          } else {
            console.log(data.message);
            tab += `<div class="vendor-name-history"><div class="images-div"></div>
                    <p><img src="${assetUrl}nodata.png" alt="" width="200" class="rounded-circle" id="">${data.message}
                    </p>
                    </div>`;
            document.getElementById("Proposal-card").innerHTML = tab;
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
      let id = $("#owner_id").val();

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
           Swal.fire({
                      title: 'Updated',
                      heading: 'success',
                      text: 'rofile datails updated successfull',
                      icon: 'success',
                      position:"top-center",
                      timer: 3000,
                      offset: 40,
                      loader: true,        // Change it to false to disable loader
                      loaderBg: '#9EC600'
              });

           $("#show-profile").show();
          $("#edit-profile-details").hide();
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

    /*----------Equipment Start--------------*/

 $("#Equipments").click(function(){
  getequipment()

      $(".proposal-card-div").css("display", "none");
      $(".equipments-color").css("color", "#6759ff");
      $(".Equipment").css("background-color", "#e4e6ef");
      $(".Report").css("background-color", "#fff");
      $(".report-color").css("color", "#000");
      $(".maintenance-color").css("color", "#000");
      $(".Maintenance").css("background-color", "#ffffff");
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
      $("#single-detail").hide();
      $("#show-maintenance").hide();
       $("#show-employee").hide();
      $("#show-equipment").show();
      $("#show-notification").hide();
      $("#list-notification").hide();
      $("#view-notification").hide();
      $("#show-history").hide();
      $("#show-proposal").hide();
      $("#show-confirm").hide();
      $("#show-pending").hide();
       $("#show-report").hide();
      $("#show-profile").hide();
      var appUrl ="{{env('APP_URL')}}";
        const api_url =
        appUrl+"/owner/get_all_product";

      });

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
       $("#show-employee").hide();
      $("#show-report").hide();
      $("#show-equipment").hide();
      $("#show-notification").hide();
      $("#list-notification").hide();
      $("#view-notification").hide();
      $("#show-history").hide();
      $("#show-proposal").hide();
      $("#show-confirm").hide();
      $("#show-pending").hide();
      $("#show-profile").hide();

    });
    /*----------Maintenance End----------*/

    /*----------Employee Start----------*/
    $("#Employees").click(function(){
      $(".proposal-card-div").css("display", "none");
      $(".employees-color").css("color", "#6759ff");
      $(".Employee").css("background-color", "#e4e6ef");
      $(".maintenance-color").css("color", "#000");
      $(".Maintenance").css("background-color", "#ffffff");
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

      $("#main-tab").hide();
      $("#show-maintenance").hide();
      $("#show-employee").show();
      $("#show-report").hide();
      $("#show-equipment").hide();
      $("#show-notification").hide();
      $("#list-notification").hide();
      $("#view-notification").hide();
      $("#show-history").hide();
      $("#show-proposal").hide();
      $("#show-confirm").hide();
      $("#show-pending").hide();
      $("#show-profile").hide();
      getEmployee();

    });
    /*----------Employee End----------*/

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

            tab += `<div class="proposal-hover workorder"> <a href="../product-details?id=${r.id}" style="text-decoration: none;"><div class="Proposal-card-01">

             <img src="${img}" class="rounded-start" alt="..." id="${id}" height="180" width="300">

            <h4>${r.product_name}</h4>
            <p>Code:${r.brand}</p>
            <ul>
                <li style="color:#6F767E; display:-webkit-box; overflow: hidden;text-overflow: ellipsis;max-width: 28ch; -webkit-line-clamp: 2;-webkit-box-orient: vertical;">${r.product_description}</li></ul></div></a></div>`;
             count = count+1;
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

     Swal.fire({
         title: 'Accepted',
          heading: 'success',
          text: 'Order has been accepted',
          icon: 'success',
          loader: true, // Change it to false to disable loader
          loaderBg: '#9EC600' // To change the background
        });
        location.reload();

      } else {

       Swal.fire({
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
    let id = $("#owner_id").val();
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

 /*--------Reject Order Api Integration End-----------*/
 function getPending()
  {
      let vid = $('#ownerid').val();
      let id = $("#owner_id").val();
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

              tab += `<div class="card mb-3">
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
            tab += `<div class="vendor-name-history" style="
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
            tab += `<div class="vendor-name-history" style="
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
      //
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
            let pimg = data.data.thumbnail_image == null ? assetUrl + "product-dummy.png" : assetUrl+'images/products/'+data.data.thumbnail_image;
            // let user = data.data.image == null ? purl + "default-profile.png" : data.data.image;
            let name = uid == 4?data.data.vname:data.data.owner_name;
            let phone = uid == 4?data.data.vendor_phone:data.data.phone;
            let address = uid == 4?data.data.vendor_street_address:data.data.street_address;

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
              <tr>
                <td scope="row">1</td>
                <td><img src="${pimg}" height="50" width="50" alt="" class="img-thumbnail hover-zoom"></td>
                <td>${data.data.product_name}</td>
                <td>${data.data.invoice_notes}</td>
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

function showEqModal()
{
  $("#equipmentModal").modal('show')
}
/*-----------Add Notes----------*/
function  getequipment()
{
  $("#show-equipment").show();
   var table = $('#equipment-table').DataTable({
            retrieve:true,
            destroy:true,

            ajax: '{!! route('get.equipment') !!}',
            columns: [
                { data: 'id', name: 'id',
                  render: function (data, type, row, meta) {
        return meta.row + meta.settings._iDisplayStart + 1;
    } },

                { data: 'product_name', name: 'product_name' },

                { data: 'images', name: 'images',
                 render: function( data, type, full, meta ) {
                        return "<img src=\"" + data + "\" height=\"50\" class=\"rounded-circle\"/>";
                    } },
                { data: 'model_number', name: 'model_number' },
                { data: 'brand', name: 'brand' },
                { data: 'category_name', name: 'category_name' },
                { data: 'shop', name: 'shop' },
                  { data: 'qrcode', name: 'qrcode' },
                { data: 'action', name: 'action' },
                ],
                aaSorting: [[0, 'desc']], });
                table.ajax.reload();

}
$('#add-equipment').click(function(){
 
         $("#single-detail").hide();
        let ownerid = $('#owner_id').val();
        var files = $('#equipment-image').prop('files');
        var ID = $('#equipmentId').val();
        let formData = new FormData();
      if(ID != '')
      {
       if(files.length>0)
        {
         for(i=0; i<files.length; i++) {
         formData.append('images', files[i]);
         }
        }else{
          formData.append('images', $('#equipment-image').text());

        }

         console.log(formData);
         let user_id = ownerid;
        let product_name = $('#equipment-product_name').val();
      
        let model_number = $('#equipment-model_number').val();
         let category = $('#equipment-category').val();
        let status = $('#radio1').val(); 
        let shop_id = $('#equipment-shop_id').val();
        let brand = $('#equipment-brand').val();
        let product_description = $('#equipment-product_description').val();
        let warranty = $('#warranty').val();
        let serial_number = $('#equipment-serial_number').val();
         let purchase_date = $('#equipment-purchase_date').val();
        formData.append('product_name', product_name);
        formData.append('user_id', user_id);
          formData.append('id', ID);
          formData.append('warranty', warranty);
         formData.append('status', status);
        formData.append('model_number', model_number);
        formData.append('shop_id', shop_id);
        formData.append('brand', brand);
           formData.append('category', category);
        formData.append('product_description', product_description);
        formData.append('serial_number', serial_number);
         formData.append('purchase_date', purchase_date);
        console.log(formData);
        var appUrl ="{{env('APP_URL')}}";
       $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
      $.ajax({
                type: "POST",
                url: '{!! route("update.equipment")!!}',
                data: formData,
                processData: false,
                contentType: false,
                success: function(data) {
                    console.log(data);

                 if(data.status== 'true')
                 {
                 $('#equipment-product_name').val('');
                  $('#equipment-purchase_date').val('');
                   $('#equipment-category').val('');
                 $('#equipment-image').text('')
                 $('#frame').attr('src', '')
                 $('#equipmentId').val('');
                 $('#equipment-serial_number').val('');
                 $('#equipment-model_number').val('');
                 $('#equipment-product_description').val('');
                 $('#equipment-brand').val('');
                 $('#equipment-warranty').val('');
                 $("#equipmentModal").modal('hide');

                   getequipment()
                  Swal.fire({
                      title: 'Updation',
                      heading: 'success',
                      text: 'Record has been Updated',
                      icon: 'success',
                      position:"top-center",
                      timer: 3000,
                      offset: 40,
                      loader: true,        // Change it to false to disable loader
                      loaderBg: '#9EC600'

              });


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

          $("#ename").css('display', 'none')
          $("#eimg").css('display', 'none')
          $("#eqty").css('display', 'none')
          $("#emodel").css('display', 'none')
          $("#eprice").css('display', 'none')
         for(i=0; i<files.length; i++) {
         formData.append('thumbnail_image', files[i]);
         }


         console.log(formData);
        let product_name = $('#equipment-product_name').val();
        let user_id = ownerid;
        let model_number = $('#equipment-model_number').val();
         let category = $('#equipment-category').val();
        let status = $('#radio1').val(); 
        let shop_id = $('#equipment-shop_id').val();
        let brand = $('#equipment-brand').val();
        let product_description = $('#equipment-product_description').val();
        let warranty = $('#equipment-warranty').val();
        let serial_number = $('#equipment-serial_number').val();
         let purchase_date = $('#equipment-purchase_date').val();
        formData.append('product_name', product_name);
        formData.append('user_id', user_id);
         formData.append('status', status);
        formData.append('model_number', model_number);
         formData.append('warranty', warranty);
        formData.append('shop_id', shop_id);
        formData.append('brand', brand);
           formData.append('category', category);
        formData.append('product_description', product_description);
        formData.append('serial_number', serial_number);
         formData.append('purchase_date', purchase_date);
        console.log(formData);
        var appUrl ="{{env('APP_URL')}}";
       $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
      $.ajax({
                type: "POST",
                url: '{!! route("add.equipment")!!}',
                data: formData,
                processData: false,
                contentType: false,
                success: function(data) {
                    console.log(data);

                 if(data.status== true)
                 {
                 $('#equipment-product_name').val('');
                 $('#equipment-images').text('')
                 $('#frame').attr('src', '')
                 $('#equipment-brand').val('');
                 $('#equipment-shop_id').val('');
                 $('#equipment-serial_number').val('');
                 $('#equipment-model_number').val('');
                 $('#equipment-warranty').val('');
                 $('#equipment-product_description').val('');
                 $("#equipmentModal").modal('hide');

                   getequipment()
                  Swal.fire({
                      title: 'Added',
                      heading: 'success',
                      text: 'Equipment has been added',
                      icon: 'success',
                      position:"top-center",
                      timer: 3000,
                      offset: 40,
                      loader: true,        // Change it to false to disable loader
                      loaderBg: '#9EC600'

              });


                }else{

      $.each(data.data, function (i) {
      $.each(data.data[i], function (key, val) {

          if(i == 'name')
              {
                $("#ename").css('display', 'block')
                  $("#ename").css('color', 'red')
                  $("#ename").text(val)
              }else if(i == 'images'){
                $("#eimg").css('display', 'block')
                  $("#eimg").css('color', 'red')
                  $("#eimg").text(val)
              }else if(i == 'model_no'){
                $("#emodel").css('display', 'block')
                  $("#emodel").css('color', 'red')
                  $("#emodel").text(val)
              }else if(i == 'price'){
                $("#eprice").css('display', 'block')
                  $("#eprice").css('color', 'red')
                  $("#eprice").text(val)
              }
              else{
                $("#eqty").css('display', 'block')
                  $("#eqty").css('color', 'red')
                  $("#eqty").text(val)
              }
    });
});

      }


   }
});
      }


 });
function getSingleEquipment(id)
{
  $("#single-detail").show();
  $("#show-equipment").hide();
    var assetUrl = "{{env('ASSET_URL')}}/images/products/";
     var asset = "{{env('ASSET_URL')}}/";
      var appUrl = "{{env('APP_URL')}}";

        const api_url =
          '{!! route("get.single")!!}?id=' + id;

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
          let tab = '';
          let tab1 = '';

          let tab3 = '';
          let date = '';
          let reject = '';
          let cat = '';
          let time = '';
          let count = 0;
          // Loop to access all rows
          // cat = `<option>Select Category</option>`;
           if (data.status == 'true') {
         
             $('#equipment-product_name').val(data.data.product_name);
                 $('#equipment-images').text('')
                 $('#frame').attr('src', assetUrl+''+data.data.thumbnail_image);
                 $('#equipment-brand').val(data.data.brand);
                 $('#equipment-shop_id').val(data.data.shop_id);
                  $('#equipment-category').val(data.data.category);
                   $('#warranty').val(data.data.warranty);
                 $('#equipment-serial_number').val(data.data.serial_number);
                 $('#equipment-model_number').val(data.data.model_number);
                 $('#equipment-purchase_date').val(data.data.purchase_date);
                 $('#equipment-product_description').val(data.data.product_description);
             let btn =  '<div onclick="editEquipment('+data.data.id+')" style="padding: 14px 20px 0px 20px"><button class="btn btn-primary" style="float: right;padding: 10px 35px 10px 35px;"><i class="fa fa-plus" id="edit_e"></i> Edit Equipment</button></div>';

              let img2 = '';
              var x = new Array();
             if(data.data.images != null){
                 img2 = `<img src="${data.data.thumbnail_image}" height="100" width="100" alt="">`;
             }else{
              img2 = `<img src="${assetUrl + 'product-dummy.png'}" height="100" width="100" alt="" >`;
             }
              tab = `<div class="proOuterBox">
                      <div class="row g-0">
                        <div class="col-md-3">
                          <img src="${assetUrl + data.data.thumbnail_image}" class="productImg" alt="..." id="${id}"  >
                        </div>
                        <div class="col-md-9">
                          <div class="card-body">
                          ${btn}
                            <h2 class="card-title">${data.data.product_name}</h2>
                            <h5  class="card-title">${data.data.model_number}</h5>
                            <h4 style="font-size: 20px; color: #453d3d;" class="card-title"> Title: ${data.data.title} </div></h4>
                            <p>${data.data.product_description}</p>
                            <div class="metaInfo dmetaInfo">
                            <h4 style="font-size: 20px;" class="card-title">Category: ${data.data.category_name} </h5>
                                <h4 style="font-size: 20px; color: #453d3d;" class="card-title"> Shop: ${data.data.shop} &nbsp; &nbsp;Brand:${data.data.brand}</div></h4>
                      <div class="container mt-3" id="multi-img">${data.data.qrcode} </div> </div> </div></div>
                      </div>  </div>
                    </div>`;
             document.getElementById("get-single-equipment").innerHTML = tab;
            }else{
                tab = `<div class="vendor-name-history"><div class="images-div"></div>
                    <p><img src="${asset}nodata.png" alt="" width="200" class="rounded-circle" id="">${data.message}
                    </p>
                    </div>`;
          document.getElementById("get-single-equipment").innerHTML = tab;
            }

          }
}
function editEquipment(id)
{

  // $("#single-detail").hide();
  $("#show-equipment").hide();
    var assetUrl = "{{env('ASSET_URL')}}/images/products/";

      var appUrl = "{{env('APP_URL')}}";

        const api_url =
          '{!! route("get.single")!!}?id=' + id;

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

           // frame.src=URL.createObjectURL(event.target.data.data.images);
           
        $("#equipment-image").text(data.data.thumbnail_image);
           // $('input:file').val(data.data.images);
        $("#frame").css('display','block');
        $("#frame").attr('src',assetUrl+''+data.data.thumbnail_image);
        $('#equipment-name').val(data.data.name);
         $('#warranty').val(data.data.warranty);
        $('#equipmentId').val(data.data.id);
        $('#equipment-stock').val(data.data.stock);
        $('#equipment-qty').val(data.data.qty);
        $('#equipment-price').val(data.data.price);
        $('#equipment-model').val(data.data.model_no);
        $('#equipment-description').val(data.data.description);
           $("#equipmentModal").modal('show');
// $("#equipmentModal").modal('show');
          }
}
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
                    getPlan()


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
                    getPlan()
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
function addEmployee()
{
  $("#employeeModal").modal('show')
}
function addEquipment()
{
  $("#equipmentModal").modal('show')
}
function CreateEmp()
{
 let id = $("#emp-id").val();

 if(id != '')
 {

  $.ajax({
                type: "POST",
                url: '{!! route("update.employee")!!}',
                data: $('#emp_form').serialize(),
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
                    getPlan()


                    Swal.fire({
                      title: 'Added',
                      heading: 'success',
                      text: 'Employee has been updated successfully',
                      icon: 'success',
                      position:"top-center",
                      timer: 3000,
                      offset: 40,
                      loader: true,        // Change it to false to disable loader
                      loaderBg: '#9EC600'

              });
                    $("#employeeModal").modal('hide')
                    getCardPlan()
                    getPlan()
                    getEmployee()
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
        $("#fname").css('display', 'none')
          $("#lname").css('display', 'none')
        $("#pass").css('display', 'none')
        $("#phone").css('display', 'none')
          $("#email").css('display', 'none')
   $.ajax({
                type: "POST",
                url: '{!! route("add.employee")!!}',
                data: $('#emp_form').serialize(),
                success: function(data) {
                  console.log(data)
                   if(data.status === true)
                {
                 $('#efirst').val('');
                 $('#elast').val('');
                 $('#e-email').val('');
                 $('#epass').val('');
                 $('#ecnt').val('');
                 $('#eabout').val('');
                    $('#addPlanModal').modal('hide');
                    getPlan()
                    getCardPlan()

                    Swal.fire({
                      title: 'Added',
                      heading: 'success',
                      text: 'Employee has been created successfully',
                      icon: 'success',
                      position:"top-center",
                      timer: 3000,
                      offset: 40,
                      loader: true,        // Change it to false to disable loader
                      loaderBg: '#9EC600'

              });
                   $("#employeeModal").modal('hide')
                    getCardPlan()
                    getPlan()
                    getEmployee()
                }else{
      $.each(data.data, function (i) {
      $.each(data.data[i], function (key, val) {

      if(i == 'first_name')
          {
             $("#fname").css('display', 'block')
              $("#fname").css('color', 'red')
              $("#fname").text(val)
          }else if(i == 'last_name'){
             $("#lname").css('display', 'block')
              $("#lname").css('color', 'red')
              $("#lname").text(val)
          }else if(i == 'password'){
             $("#pass").css('display', 'block')
              $("#pass").css('color', 'red')
              $("#pass").text(val)
          }else if(i == 'phone'){
             $("#phone").css('display', 'block')
              $("#phone").css('color', 'red')
              $("#phone").text(val)
          }
          else{
            $("#email").css('display', 'block')
              $("#email").css('color', 'red')
              $("#email").text(val)
          }



    });
});
 }
   }
      });
 }
}
function getEmployee()
{
var table = $('#employee-table').DataTable({
            retrieve:true,
            destroy:true,

            ajax: '{!! route('get.employee') !!}',
            columns: [
                { data: 'id', name: 'id',
               render: function (data, type, row, meta) {
        return meta.row + meta.settings._iDisplayStart + 1;
    } },
                { data: 'name', name: 'name' },
                 { data: 'company', name: 'company' },
                   { data: 'email', name: 'email' },
                { data: 'phone', name: 'phone' },

                   { data: 'role', name: 'role' },

                { data: 'action', name: 'action' },
                ],


             });
              table.ajax.reload();
}
function editEmp(id)
{
$("#emp-id").val(id);

 const api_url =
          '{!! url("single-emp")!!}/' + id;

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
          let role = '';
           let role1 = '';
            let role2 = '';
            let tab = '';
            for (let i of data.data.cmp) {

                let name = i.id ==data.data.company_id?'selected':''
             tab +=`<option value="${i.id}" style="color:#808080;" ${name}>${i.company_name}</option>`;

            }
           if(data.data.roleid == 4)
           {
             role = 'selected';
           }else if(data.data.roleid == 3)
           {
            role1 = 'selected';
           }else{
            role2 = 'selected';
           }
             // role = data.data.roleid == 4?data.data.roleid == 3:'selected':'selected':'selected';


             document.getElementById("ecmp").innerHTML = tab;
             let tab1 = `<option value="" style="color:#808080;">Select Job Position</option><option value="4" style="color:#808080;" ${role}>Owner</option><option value="3" style="color:#808080;" ${role1}>District Manager</option><option value="2" style="color:#808080;" ${role2}>Manager</option>`;
              document.getElementById("ejob").innerHTML = tab1;

                $('#efirst').val(data.data.first_name);
                 $('#elast').val(data.data.last_name);
                 $('#e-email').val(data.data.email);
                 $('#epost').val(data.data.roleid);
                 $('#ecnt').val(data.data.phone);
                 $('#eabout').val(data.data.desc);
           $('#employeeModal').modal('show');

          }

}
function getfulldetails(id)
{
$("#exampleModalPopups").modal('show');
 var assetUrl = "http://209.97.156.170/WeFix/public/images/products/";
      var purl = "{{env('PROFILE_URL')}}";
      var appUrl = "{{env('APP_URL')}}";
      var placeholder = window.location.origin+'/WeFix';
            $.ajax({
                type: "GET",
                url: '{!! route("get.single.order")!!}?id=' + id,

                success: function(data) {
                    console.log(data);

                      let tab = '';
                      let tab1 = '';
                      let count = 0;

      if (data.status == 'true') {

            let img1 = '';
            let img3 = '';
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
              img1 += `<img src="${assetUrl + i.images}" height="100" width="100" alt="">`;

            }
             if((data.data.quote_images).length>0){
                y = data.data.quote_images
             }else{
              img3 = `<img src="${placeholder + '/public/product-dummy.png'}" height="100" width="100" alt=""  style="height: 100px !important;">`;
             }
        for (let i of y) {
           note_date = i.created_at;
          img3 += `<img src="${assetUrl + i.vendor_images}" height="100" width="100" alt="">`;

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
</div>`;
 document.getElementById("getPopupDetails").innerHTML = tab;
            }else{
                tab = ` <div class="vendor-name-history"><div class="images-div"></div>

<p><img src="${asset}nodata.png" alt="" width="200" class="rounded-circle" id="">${data.message}
</p>
</div>`;
          document.getElementById("getPopupDetails").innerHTML = tab;
            }

          }
        });
}
</script>

</html>
