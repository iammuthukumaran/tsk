<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

        <title>TSK Admin</title>

        <meta name="description" content="Tsk is one of the leading dairy companies in Coimbatore.">
        <meta name="author" content="pixelcave">
        <meta name="robots" content="noindex, nofollow">

        <!-- Open Graph Meta -->
        <meta property="og:title" content="Tsk - Best Whole seller in Coimbatore Districts.">
        <meta property="og:site_name" content="pasumaidairy">
        <meta property="og:description" content="Tsk is one of the leading dairy companies in Coimbatore.">
        <meta property="og:type" content="website">
        <meta property="og:url" content="">
        <meta property="og:image" content="">

        <!-- Icons -->
        <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
        <link rel="shortcut icon" href="{{asset('admin/logo/favi.png')}}">
        <link rel="icon" type="image/png" sizes="192x192" href="{{asset('admin/logo/favi.png')}}">
        <link rel="apple-touch-icon" sizes="180x180" href="{{asset('admin/logo/favi.png')}}">
        <!-- END Icons -->


        <!-- Stylesheets -->
         <!-- Page JS Plugins CSS -->
         <link rel="stylesheet" href="{{asset('assets/js/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}">
        <link rel="stylesheet" href="{{asset('assets/js/plugins/datatables/dataTables.bootstrap4.css')}}">
        <link rel="stylesheet" href="{{asset('assets/js/plugins/datatables/buttons-bs4/buttons.bootstrap4.min.css')}}">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

        <!-- Fonts and Dashmix framework -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,400i,600,700">
        <link rel="stylesheet" id="css-main" href="{{asset('assets/css/dashmix.min.css')}}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css"/>

        <!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
        <!-- <link rel="stylesheet" id="css-theme" href="assets/css/themes/xwork.min.css"> -->
        <!-- END Stylesheets -->
    </head>
    <body>

        <div id="page-container" class="sidebar-o enable-page-overlay side-scroll page-header-fixed page-header-dark main-content-narrow side-trans-enabled sidebar-dark">

            <!-- side menu -->
          @include('admin.layout.sidebar')

           <!-- header section -->
          @include('admin.layout.header')


            <!-- Main Container -->
            <main id="main-container">

            @yield('inner-content')

            </main>
            <!-- END Main Container -->

             <!-- // footer -->
           @include('admin.layout.footer')



        </div>
        <!-- END Page Container -->

        <script src="{{asset('assets/js/dashmix.core.min.js')}}"></script>
        <script src="{{asset('assets/js/dashmix.app.min.js')}}"></script>
        <script src="{{asset('js/jquery.validate.min.js')}}"></script>

         <!-- Page JS Plugins -->
         <script src="{{asset('assets/js/plugins/datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('assets/js/plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>
        <script src="{{asset('assets/js/plugins/datatables/buttons/dataTables.buttons.min.js')}}"></script>
        <script src="{{asset('assets/js/plugins/datatables/buttons/buttons.print.min.js')}}"></script>
        <script src="{{asset('assets/js/plugins/datatables/buttons/buttons.html5.min.js')}}"></script>
        <script src="{{asset('assets/js/plugins/datatables/buttons/buttons.flash.min.js')}}"></script>
        <script src="{{asset('assets/js/plugins/datatables/buttons/buttons.colVis.min.js')}}"></script>

        <!-- Page JS Code -->
        <script src="{{asset('assets/js/pages/be_tables_datatables.min.js')}}"></script>

          <!-- Page JS Plugins -->
        <script src="{{asset('assets/js/plugins/jquery-sparkline/jquery.sparkline.min.js')}}"></script>
        <script src="{{asset('assets/js/plugins/chart.js/Chart.bundle.min.js')}}"></script>

         <!-- Page JS Code -->
         <script src="{{asset('assets/js/pages/be_pages_dashboard.min.js')}}"></script>

           <!-- Page JS Plugins -->
        <script src="{{asset('assets/js/plugins/bootstrap-notify/bootstrap-notify.min.js')}}"></script>


        <script src="{{asset('assets/js/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script> 

       
       <!-- sweet alert -->
       <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

        <!-- START DATE RANGE PICKER -->
        <!--  <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" /> -->
        <!-- END DATE RANGE PICKER-->

        <!-- Page JS Plugins -->
        <script src="{{asset('assets/js/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>

        <!-- Page JS Helpers (BS Datepicker + BS Colorpicker + BS Maxlength + Select2 + Ion Range Slider + Masked Inputs plugins) -->
        <!-- <script>jQuery(function(){ Dashmix.helpers(['datepicker', 'colorpicker', 'maxlength', 'select2', 'rangeslider', 'masked-inputs']); });</script> -->

       @yield("javascript")

       @jquery
       @toastr_css
       @toastr_js

 <style>
 
     .alert-danger{
      color: #ffffff;
      background-color:#b52929;
    }

     .alert-success{
      color: #ffffff;
      background-color: #52b529;
    }
 </style>

    </body>
</html>
