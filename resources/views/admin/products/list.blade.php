<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../images/favicon.ico">

    <title>Products List</title>


    <!-- Vendors Style-->
    <link rel="stylesheet" href="{{ asset('css/vendors_css.css') }}">

    <!-- Style-->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/skin_color.css') }}">
  <!-- <link rel="stylesheet" href="https://gyrocode.github.io/jquery-datatables-checkboxes/1.2.11/css/dataTables.checkboxes.css"> -->

</head>
<style>
    .dt-checkboxes {
        position: unset !important;
        opacity: 1 !important;
    }
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
                            <h3 class="page-title">Products List</h3>
                            <div class="d-inline-block align-items-center">
                                <nav>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a>
                                        </li>
                                        <li class="breadcrumb-item" aria-current="page">Products</li>
                                        <li class="breadcrumb-item active" aria-current="page">Products List</li>
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
                                    <h3 class="box-title">Products</h3>
                                </div>

                                <!-- /.box-header -->
                                <div class="box-body">
                                    <div class="table-responsive">
                                        <table id="example5" class="table table-striped"
                                            style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th>Image</th>
                                                    <th>Name</th>
                                                    <th>Category</th>
                                                    <th>Brands</th>
                                                    <th>Barcode</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($products as $key=>$product)
                                                <tr>
                                                    <td>{{$key+1}}</td>
                                                    <td>
                                                        <?php  
                                                        if($product->thumbnail_image != '')
                                                        {
                                                            $imgs=$product->thumbnail_image;
                                                        }else{
                                                            $imgs='noimage.png';
                                                        }
                                                        $path = '/var/www/html/WeFix/public/images/products/'.$imgs;
                                                        $type = pathinfo($path, PATHINFO_EXTENSION);
                                                        $data = file_get_contents($path);
                                                        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);

                                                         ?>
                                                        <!-- <div class="me-15 w-50 d-table"> -->
                                                            <img src="{{$base64}}"
                                                                class="avatar avatar-lg rounded10 bg-primary-light "
                                                                alt="">
                                                             
                                                        <!-- </div> -->
                                                    </td>
                                                    <td>{{$product->product_name}}</td>
                                                    <td>{{$product->category_name}}</td>
                                                    <td>{{$product->brand}}</td>
                                                    <td>                {!! QrCode::size(50)->backgroundColor(255,90,0)->generate($product->category_name) !!}
                                                   </td>
                                                    <td>
                                                        <div class="form-group">
                                                            <select class="form-control" style="width: 100%;">
                                                                <option value="publish"
                                                                    {{$product->status == 'publish'  ? 'selected' : ''}}>
                                                                    Publish</option>
                                                                <option value="draft"
                                                                    {{$product->status == 'draft'  ? 'selected' : ''}}>
                                                                    Draft</option>
                                                            </select>
                                                        </div>

                                                    </td>
                                                    <td>
                                                        <table>
                                                            <tr>
                                                                
                                                                <td><a class="btn btn-info m-2 "
                                                                        href="{{ url('admin/products/edit/'. encrypt($product->id))}}"><i
                                                                            class="mdi mdi-pencil"></i></a>
                                                                </td>
                                                              
                                                            </tr>
                                                        </table>
                                                    </td>
                                                    <div class="modal center-modal fade"
                                                        id="modal-center{{ $product->id }}" tabindex="-1">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Delete</h5>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal"
                                                                        aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p>Are you sure you want to delete
                                                                        {{$product->product_name}}</p>
                                                                </div>
                                                                <div class="modal-footer modal-footer-uniform">
                                                                   
                                                                    <a href="{{url('product/delete/'.$product->id)}}"
                                                                        class="btn btn-danger float-end">Delete</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- /.modal -->
                                                </tr>
                                                @endforeach

                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th></th>
  
                                                    <th>Image</th>
                                                    <th>Name</th>
                                                    <th>Category</th>
                                                    <th>Brands</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
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




    <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
    </div>
    <!-- ./wrapper -->


    <!-- Page Content overlay -->


    <!-- Vendor JS -->
    <script src="{{ asset('js/vendors.min.js')}}"></script>
    <script src="{{ asset('js/pages/chat-popup.js')}}"></script>
    <script src="{{ asset('assets/icons/feather-icons/feather.min.js')}}"></script>
    <script src="{{ asset('assets/vendor_components/datatable/datatables.min.js')}}"></script>
    <script src="https://gyrocode.github.io/jquery-datatables-checkboxes/1.2.11/js/dataTables.checkboxes.min.js"></script>

    <!-- EduAdmin App -->
    <script src="{{ asset('js/template.js')}}"></script>

    <script src="{{ asset('js/pages/data-table.js')}}"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.debug.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.2.3/jspdf.plugin.autotable.js"></script> -->
<script>

      // Setup - add a text input to each footer cell
      $('#example5 tfoot th').each( function () {
        var title = $(this).text();
        $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
    } );
 
    // DataTable
    var table = $('#example5').DataTable({   
      dom: 'Bfrtip',
      buttons: [
      'print'
    ],  
      'columnDefs': [
         {
            'targets': 0,
            'checkboxes': {
               'selectRow': true
            }
         }
      ],
      'select': {
         'style': 'multi'
      },
      'order': [[1, 'asc']],
      
   });
 
    // Apply the search
    table.columns().every( function () {
        var that = this;
 
        $( 'input', this.footer() ).on( 'keyup change', function () {
            if ( that.search() !== this.value ) {
                that
                    .search( this.value )
                    .draw();
            }
        } );
    } );
	
// function generate() {
//       var doc = new jsPDF();

//   doc.autoTable({
//     html: '#example5',
//     bodyStyles: {minCellHeight: 15},
//     didDrawCell: function(data) {
//       if (data.column.index === 1 && data.cell.section === 'body') {
//          var td = data.cell.raw;
//         //  var img = td.getElementsByTagName('img')[0];
//          var img = td.getElementsByTagName('img');
//          console.log(td)
//         //  console.log(img)
//          var dim = data.cell.height - data.cell.padding('vertical');
//          var textPos = data.cell.textPos;
//          doc.addImage(img.src, textPos.x,  textPos.y, dim, dim);
//       }
//     }
//   });

//       doc.save("table.pdf");
//     }

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