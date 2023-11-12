<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">


<!-- Mirrored from codervent.com/syndron/demo/vertical/index2.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 29 Jul 2023 03:51:49 GMT -->
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <link rel="icon" href="assets/images/favicon-32x32.png" type="image/png" />
    <!--plugins-->
    <link href="assets/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet"/>
    <link href="assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
    <link href="assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
    <link href="assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
    <link href="assets/plugins/highcharts/css/highcharts.css" rel="stylesheet" />
    <!-- loader-->
    <link href="assets/css/pace.min.css" rel="stylesheet" />
    <script src="assets/js/pace.min.js"></script>
    <!-- Bootstrap CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/bootstrap-extended.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&amp;display=swap" rel="stylesheet">
    <link href="assets/css/app.css" rel="stylesheet">
    <link href="assets/css/icons.css" rel="stylesheet">
    <!-- Theme Style CSS -->
    <link rel="stylesheet" href="assets/css/dark-theme.css" />
    <link rel="stylesheet" href="assets/css/semi-dark.css" />
    <link rel="stylesheet" href="assets/css/header-colors.css" />
    <title>{{ config('app.name', 'Laravel') }}</title>
        
    <!-- Scripts -->
    <!-- @vite(['resources/css/app.css', 'resources/js/app.js']) -->
</head>

        
    <body class="font-sans antialiased">
        <div class="wrapper">
            <!-- Wrapper -->
                @include('layouts.wrapper')
            <!-- end of wrapper -->

            <!-- {{ $slot }} -->
            </div> <!-- end of wrapper -->
        </div>

    <!-- Bootstrap JS -->
    <script src="assets/js/bootstrap.bundle.min.js"></script> 
    <!--plugins-->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
    <script src="assets/plugins/metismenu/js/metisMenu.min.js"></script>
    <script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
    <!-- Vector map JavaScript -->
    <script src="assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- highcharts js -->
    <script src="assets/plugins/highcharts/js/highcharts.js"></script>
    <script src="assets/plugins/apexcharts-bundle/js/apexcharts.min.js"></script>
    <script src="assets/js/index2.js"></script>


    <script src="assets/plugins/chartjs/js/chart.js"></script>
    <script src="assets/plugins/chartjs/js/chartjs-custom.js"></script>

    <!--app JS-->
    <script src="assets/js/app.js"></script>
    </body>
</html>
