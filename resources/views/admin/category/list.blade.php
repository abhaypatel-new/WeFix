<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../images/favicon.ico">

    <title>Categories</title>
  
	 
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
					<h3 class="page-title">Categories List</h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item" aria-current="page">Categories</li>
								<li class="breadcrumb-item active" aria-current="page">Categories List</li>
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
				  <h3 class="box-title">Categories</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example5" class="table table-striped" style="width:100%">
						<thead>
							<tr>
								<th>Category Name</th>
								<th>Description</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
						    
						    @foreach($categories as $category)
                            <tr><td>{{ $category->name}}</td><td>{{ $category->description}}</td>
                            <td><a class="btn btn-info m-2 " href="{{ url('admin/categories/edit/'. encrypt($category->id))}}"><i class="mdi mdi-pencil"></i></a>
                            <!-- <a class="btn btn-danger mt-2 "   data-bs-toggle="modal" data-bs-target="#modal-center{{ $category->id }}" ><i class="mdi mdi-delete"></i></a> -->
                        </td>
                            </tr>
                             <!-- Modal -->
                              <div class="modal center-modal fade" id="modal-center{{ $category->id }}" tabindex="-1">
                            	  <div class="modal-dialog">
                            		<div class="modal-content">
                            		  <div class="modal-header">
                            			<h5 class="modal-title">Delete</h5>
                            			<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            		  </div>
                            		  <div class="modal-body">
                            			<p>Are you sure you want to delete {{ $category->name }}</p>
                            		  </div>
                            		  <div class="modal-footer modal-footer-uniform">
                            			<a href="{{url('admin/categories/delete/'.$category->id)}}" class="btn btn-danger float-end">Delete</a>
                            		  </div>
                            		</div>
                            	  </div>
                            	</div>
                              <!-- /.modal -->
                             @endforeach 
						</tbody>
						<tfoot>
							<tr>
								<th>Category Name</th>
								<th>Description</th>
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
   
	$(document).ready(function () {
            $('#example5').DataTable({
                searching: true
            });
        });

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
