@extends('layouts.back-end.app')

@section('title', \App\CPU\translate('Dashboard'))

@push('css_or_js')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        .grid-card {
            border: 2px solid #00000012;
            border-radius: 10px;
            padding: 10px;
        }

        .label_1 {
            /*position: absolute;*/
            font-size: 10px;
            background: #EC9BA2;
            color: #ffffff;
            width: 80px;
            padding: 2px;
            font-weight: bold;
            border-radius: 6px;
            text-align: center;
        }

        .center-div {
            text-align: center;
            border-radius: 6px;
            padding: 6px;
            border: 2px solid #EEEEEE;
        }

        .icon-card {
            background-color: #22577A;
            border-width: 30px;
            border-style: solid;
            border-color: red;
        }
        option:hover{
            background:#EC9BA2!important;
            color: #fff!important;
        }
       
    </style>
@endpush

@section('content')
    @if(auth('admin')->user()->admin_role_id==1 || \App\CPU\Helpers::module_permission_check('dashboard'))
        <div class="content container-fluid">
            <!-- Page Header -->
            <div class="page-header" style="padding-bottom: 0!important;border-bottom: 0!important;margin-bottom: 1.25rem!important;">
                <div class="flex-between align-items-center">
                    <div>
                        <h1 class="page-header-title" style="text-align: {{Session::get('direction') === "rtl" ? 'right' : 'left'}};">{{\App\CPU\translate('Dashboard')}}</h1>
                        <p style="color:#EC9BA2!important">{{ \App\CPU\translate('Welcome_message')}}.</p>
                    </div>
                    <div style="height: 25px">
                        <label class="badge badge-soft-success">
                            {{\App\CPU\translate('Software version')}} : {{ env('SOFTWARE_VERSION') }}
                        </label>
                    </div>
                </div>
            </div>
            <!-- End Page Header -->

            <div class="card mb-3">
                <div class="card-body">
                    <div class="row flex-between gx-2 gx-lg-3 mb-2">
                        <div>
                            <h4 style="color:#EC9BA2!important"><i style="font-size: 30px;color:#EC9BA2!important;"
                                   class="tio-chart-bar-4"></i>{{\App\CPU\translate('dashboard_Job Post')}}</h4>
                        </div>
                       
                    </div>
                    <div class="row gx-2 gx-lg-3" id="order_stats">
                        @include('admin-views.partials._dashboard-order-stats')
                    </div>
                </div>
            </div>


 <div id="chartss">
                            <h4>Apply Jobs</h4>
                               <canvas id="myChart" height="100px"></canvas>
                            </div>         
            <!-- End Stats -->
           
    @else
        <div class="content container-fluid">
            <!-- Page Header -->
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col-12 mb-2 mb-sm-0">
                        <h3 class="text-center" style="color: gray">{{\App\CPU\translate('hi')}} {{auth('admin')->user()->name}}, {{\App\CPU\translate('welcome_to_dashboard')}}.</h3>
                    </div>
                </div>
            </div>
            <!-- End Page Header -->
        </div>
    @endif
@endsection

@push('script')

    <script src="{{asset('public/assets/back-end')}}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{asset('public/assets/back-end')}}/vendor/chart.js.extensions/chartjs-extensions.js"></script>
    <script
        src="{{asset('public/assets/back-end')}}/vendor/chartjs-plugin-datalabels/dist/chartjs-plugin-datalabels.min.js"></script>
@endpush


@push('script_2')

 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script> 
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script type="text/javascript">
  
     
     var datas =  <?php echo($charts2); ?>;
   
  
      const data = {
         "labels": ["January","February","March","April","May","Jun","July","August","September","October","November","December"],
         datasets: [{
          label: 'Chart For Apply Jobs',
          backgroundColor: 'rgb(255, 99, 132)',
          borderColor: 'rgb(255, 99, 132)',
          data: datas,
        }]
      };
  
      const config = {
        type: 'line',
        data: data,
        options: {}
      };
  
      const myChart = new Chart(
        document.getElementById('myChart'),
        config
      );
  
</script>
    <script>
        // INITIALIZATION OF CHARTJS
        // =======================================================
        Chart.plugins.unregister(ChartDataLabels);

        $('.js-chart').each(function () {
            $.HSCore.components.HSChartJS.init($(this));
        });

        var updatingChart = $.HSCore.components.HSChartJS.init($('#updatingData'));
    </script>

    <script>
        var ctx = document.getElementById('business-overview');
        var myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: [
                    
                ],
                datasets: [{
                    label: '{{\App\CPU\translate('business')}}',
                    data: [],
                    backgroundColor: [
                        '#041562',
                        '#DA1212',
                        '#EEEEEE',
                        '#11468F',
                        '#000000',
                    ],
                    hoverOffset: 4
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

    <script>
        function order_stats_update(type) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.post({
                url: '{{route('admin.dashboard.order-stats')}}',
                data: {
                    statistics_type: type
                },
                beforeSend: function () {
                    $('#loading').show()
                },
                success: function (data) {
                    $('#order_stats').html(data.view)
                },
                complete: function () {
                    $('#loading').hide()
                }
            });
        }

        function business_overview_stats_update(type) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.post({
                url: '{{route('admin.dashboard.business-overview')}}',
                data: {
                    business_overview: type
                },
                beforeSend: function () {
                    $('#loading').show()
                },
                success: function (data) {
                    console.log(data.view)
                    $('#business-overview-board').html(data.view)
                },
                complete: function () {
                    $('#loading').hide()
                }
            });
        }
    </script>

@endpush

