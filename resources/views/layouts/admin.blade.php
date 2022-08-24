<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
    <link href="{{ asset('admin/css/material-dashboard.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/custom.css') }}" rel="stylesheet">

    <!-- <link href="{{ asset('frontend/css/custom.css') }}" rel="stylesheet"> -->

    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">

    <!-- <script>
        window.onload = function() {
            var chart = new CanvasJS.Chart("chartContainer", {
                title: {
                    text: "Number of Orders per month of year"
                },
                axisY: {
                    title: "Number of orders"
                },
                data: [{
                    type: "line",
                    dataPoints: 
                }]
            });
            chart.render();

        }
    </script> -->
</head>

<body>
    <div class="wrapper">
        @include('layouts.inc.sidebar')
        <div class="main-panel">
            @include('layouts.inc.adminnav')
            <div class="content">
                @yield('content')
            </div>
            @include('layouts.inc.adminfooter')
        </div>
    </div>


    <script src="{{ asset('admin/js/jquery.min.js') }}" defer></script>
    <script src="{{ asset('admin/js/popper.min.js') }}" defer></script>
    <script src="{{ asset('admin/js/bootstrap-material-design.min.js') }}" defer></script>
    <script src="{{ asset('admin/js/perfect-scrollbar.jquery.min.js') }}" defer></script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- Chart js -->

    <!-- <script src="https://code.highcharts.com/highcharts.js"></script> -->

    @if(session('status'))
    <script>
        swal("{{ session('status') }}");
    </script>

    @endif
    <!-- Scripts -->

    @yield('scripts')
    <!-- <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script> -->
</body>
<!-- <script src="https://code.highcharts.com/highcharts.js"></script>
<script type="text/javascript"> -->
    var count = <?php echo json_encode($orderData)?>;
    Highcharts.chart('chartContainer', {
        title: {
            text: 'Number of Orders per month of year'
        },
        xAxis: {
            categories: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September',
                'October', 'November', 'December'
            ]
        },
        yAxis: {
            title: {
                text: 'Number of orders'
            }
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle'
        },
        plotOptions: {
            series: {
                allowPointSelect: true
            }
        },
        series: [{
            name: 'Orders',
            data: count
        }],
        responsive: {
            rules: [{
                condition: {
                    maxWidth: 500
                },
                chartOptions: {
                    legend: {
                        layout: 'horizontal',
                        align: 'center',
                        verticalAlign: 'bottom'
                    }
                }
            }]
        }
    });
</script>
</html>