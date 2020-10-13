<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="Modern admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities with bitcoin dashboard.">
  <meta name="keywords" content="admin template, modern admin template, dashboard template, flat admin template, responsive admin template, web app, crypto dashboard, bitcoin dashboard">
  <meta name="author" content="PIXINVENT">
  <title>K3L UIW ACEH
  </title>
  <link rel="apple-touch-icon" href="{{ url('app-assets/images/ico/apple-icon-120.png') }}">
  <link rel="shortcut icon" type="image/x-icon" href="{{ url('app-assets/images/ico/favicon.ico') }}">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700"
  rel="stylesheet">
  <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css"
  rel="stylesheet">
  <!-- BEGIN VENDOR CSS-->
  <link rel="stylesheet" type="text/css" href="{{ url('app-assets/css/vendors.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ url('app-assets/vendors/css/tables/datatable/datatables.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ url('app-assets/vendors/css/tables/extensions/autoFill.dataTables.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ url('app-assets/vendors/css/extensions/toastr.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ url('app-assets/vendors/css/forms/selects/select2.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ url('app-assets/vendors/css/forms/spinner/jquery.bootstrap-touchspin.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ url('app-assets/vendors/css/forms/toggle/bootstrap-switch.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ url('app-assets/vendors/css/forms/toggle/switchery.min.css') }}">

  <!-- END VENDOR CSS-->
  <!-- BEGIN MODERN CSS-->
  <link rel="stylesheet" type="text/css" href="{{ url('app-assets/css/app.css') }}">
  <!-- END MODERN CSS-->
  <!-- BEGIN Page Level CSS-->
  <link rel="stylesheet" type="text/css" href="{{ url('app-assets/css/core/menu/menu-types/vertical-menu-modern.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ url('app-assets/css/core/colors/palette-gradient.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ url('app-assets/vendors/css/charts/jquery-jvectormap-2.0.3.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ url('app-assets/vendors/css/charts/morris.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ url('app-assets/fonts/simple-line-icons/style.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ url('app-assets/css/core/colors/palette-callout.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ url('app-assets/css/plugins/extensions/toastr.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ url('app-assets/css/plugins/forms/checkboxes-radios.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ url('app-assets/css/plugins/forms/switch.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ url('app-assets/css/plugins/loaders/loaders.min.css') }}">
  
  <link rel="stylesheet" type="text/css" href="{{ url('app-assets/vendors/css/forms/icheck/icheck.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ url('app-assets/vendors/css/forms/icheck/custom.css') }}">


  <link rel="stylesheet" type="text/css" href="{{ url('app-assets/css/plugins/forms/wizard.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ url('app-assets/css/pages/email-application.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ url('app-assets/css/pages/chat-application.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ url('app-assets/css/core/colors/palette-switch.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ url('app-assets/css/pages/users.css') }}">

  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/additional-methods.min.js"></script>

  <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script> 
  <!--script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script-->
  
 
  <style>
   .error{ color:red; } 
  </style>


  <!-- END Page Level CSS-->
  <!-- BEGIN Custom CSS-->
  <link rel="stylesheet" type="text/css" href="{{ url('assets/css/style.css') }}">
  <!-- END Custom CSS-->

  <!-- Map Leaflet CSS -->
  <link rel="stylesheet" href="//unpkg.com/leaflet@1.1.0/dist/leaflet.css" />
  <link rel="stylesheet" href="{{ url('app-assets/css/leaflet-locationpicker.css') }}" />

  <!-- Leaflet JS -->
  <script src="//unpkg.com/leaflet@1.1.0/dist/leaflet.js"></script>
  <script src="http://cdn.leafletjs.com/leaflet-0.7/leaflet.js"></script>
  <script src="{{ url('app-assets/js/leaflet-locationpicker.js') }}"></script>
</head>
@php $RouteName = \Request::route()->getName() @endphp

@if(strpos($RouteName, 'sale.') === 0)


{{-- @if (Route::is('sale.')) --}}
<body class="vertical-layout vertical-menu-modern content-left-sidebar email-application  menu-expanded fixed-navbar"
data-open="click" data-menu="vertical-menu-modern" data-col="content-left-sidebar">
@else
<body class="vertical-layout vertical-menu-modern 2-columns   menu-expanded fixed-navbar"
data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">
@endif

  <!-- fixed-top-->
  <nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-semi-dark navbar-shadow">
    <div class="navbar-wrapper">
      <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
          <li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="/"><i class="ft-menu font-large-1"></i></a></li>
          <li class="nav-item mr-auto">
            <a class="navbar-brand" href="index.html">
              <img class="logo" width="150px" alt="modern admin logo" src="../../../app-assets/images/logo/saman_logo.png">
              <!--
              <img class="brand-logo" alt="modern admin logo" src="../../../app-assets/images/logo/saman_logo.png">
              <h3 class="brand-text">K3L ACEH</h3>
              -->
            </a>
          </li>
          <li class="nav-item d-none d-md-block float-right"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="toggle-icon ft-toggle-right font-medium-3 white" data-ticon="ft-toggle-right"></i></a></li>
          <li class="nav-item d-md-none">
            <a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="la la-ellipsis-v"></i></a>
          </li>
        </ul>
      </div>
      <div class="navbar-container content">
        <div class="collapse navbar-collapse" id="navbar-mobile">
          <ul class="nav navbar-nav mr-auto float-left">
            <li class="nav-item d-none d-md-block"><a class="nav-link nav-link-expand" href="#"><i class="ficon ft-maximize"></i></a></li>
          </ul>

        </div>
      </div>
    </div>
  </nav>
  <!-- ////////////////////////////////////////////////////////////////////////////-->
  
  <div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="main-menu-content">
      <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
        <li class="nav-item active"><a href="/login"><i class="la la-lock"></i><span class="menu-title" data-i18n="nav.dash.main">Login SAMAN</span></a></li>   
      
      </ul>
    </div>

  </div>
  <div class="app-content content">

  @yield('content')
  
  </div>
  <!-- FOOTER  ////////////////////////////////////////////////////////////////////////////-->
  <footer class="footer fixed-bottom footer-light navbar-border navbar-shadow">
  <!--footer class="footer footer-static footer-light navbar-border navbar-shadow"-->
    <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2">
      <span class="float-md-left d-block d-md-inline-block">Copyright &copy; 2020 <a class="text-bold-800 grey darken-2" href="https://plnaceh.id"
        target="_blank">PLNACEH.ID </a>, All rights reserved. </span>
      <span class="float-md-right d-block d-md-inline-blockd-none d-lg-block">Hand-crafted & Made with <i class="ft-heart pink"></i></span>
    </p>
  </footer>
  <!-- BEGIN VENDOR JS-->
  <script src="{{ url('app-assets/vendors/js/vendors.min.js') }}" type="text/javascript"></script>
  <!-- BEGIN VENDOR JS-->
  <!-- BEGIN PAGE VENDOR JS-->
  <script src="{{ url('app-assets/vendors/js/charts/chart.min.js') }}" type="text/javascript"></script>
  <script src="{{ url('app-assets/vendors/js/charts/raphael-min.js') }}" type="text/javascript"></script>
  <script src="{{ url('app-assets/vendors/js/charts/morris.min.js') }}" type="text/javascript"></script>
  <script src="{{ url('app-assets/vendors/js/charts/jvector/jquery-jvectormap-2.0.3.min.js') }}" type="text/javascript"></script>
  <script src="{{ url('app-assets/vendors/js/charts/jvector/jquery-jvectormap-world-mill.js') }}" type="text/javascript"></script>
  <script src="{{ url('app-assets/vendors/js/tables/datatable/datatables.min.js') }}" type="text/javascript"></script>
  <script src="{{ url('app-assets/data/jvector/visitor-data.js') }}" type="text/javascript"></script>
  <script src="{{ url('app-assets/vendors/js/forms/validation/jquery.validate.min.js') }}" type="text/javascript"></script>
  <script src="{{ url('app-assets/vendors/js/extensions/jquery.steps.min.js') }}" type="text/javascript"></script>
  <script src="{{ url('app-assets/vendors/js/extensions/toastr.min.js') }}" type="text/javascript"></script>
  <script src="{{ url('app-assets/vendors/js/forms/select/select2.full.min.js') }}" type="text/javascript"></script>
  <script src="{{ url('app-assets/vendors/js/forms/spinner/jquery.bootstrap-touchspin.js') }}" type="text/javascript"></script>
  <script src="{{ url('app-assets/vendors/js/tables/datatable/dataTables.autoFill.min.js') }}" type="text/javascript"></script>
  
  <script src="https://www.google.com/jsapi" type="text/javascript"></script>


  <!-- END PAGE VENDOR JS-->
  <!-- BEGIN MODERN JS-->
  <script src="{{ url('app-assets/js/core/app-menu.js') }}" type="text/javascript"></script>
  <script src="{{ url('app-assets/js/core/app.js') }}" type="text/javascript"></script>
  <script src="{{ url('app-assets/js/scripts/customizer.js') }}" type="text/javascript"></script>
  <script src="{{ url('app-assets/vendors/js/forms/toggle/bootstrap-switch.min.js') }}" type="text/javascript"></script>

  <!-- END MODERN JS-->
  <!-- BEGIN PAGE LEVEL JS-->
  <script src="{{ url('app-assets/js/scripts/pages/dashboard-sales.js') }}" type="text/javascript"></script>
  <script src="{{ url('app-assets/js/scripts/tables/datatables/datatable-basic.js') }}" type="text/javascript"></script>
  <script src="{{ url('app-assets/js/scripts/forms/wizard-steps.js') }}" type="text/javascript"></script>
  <script src="{{ url('app-assets/js/scripts/pages/email-application.js') }}" type="text/javascript"></script>
  <script src="{{ url('app-assets/js/scripts/forms/select/form-select2.js') }}" type="text/javascript"></script>
  <script src="{{ url('app-assets/vendors/js/forms/toggle/switchery.min.js') }}" type="text/javascript"></script>
  <script src="{{ url('app-assets/js/scripts/tables/datatables-extensions/datatable-autofill.js') }}" type="text/javascript"></script>
  <script src="{{ url('app-assets/js/scripts/charts/google/bar/column.js') }}" type="text/javascript"></script>
  <script src="{{ url('app-assets/js/scripts/charts/google/bar/stacked-column.js') }}" type="text/javascript"></script>
  <script src="{{ url('app-assets/js/scripts/charts/google/bar/combo.js') }}" type="text/javascript"></script>

  <!--script src="{{ url('app-assets/js/scripts/extensions/toastr.js') }}" type="text/javascript"></script -->

  <script src="{{ url('js/script.js') }}" type="text/javascript"></script>
  <script src="{{ url('js/jquery.mask.js') }}" type="text/javascript"></script>
  <script src="{{ url('js/jquery.number.js') }}" type="text/javascript"></script>
  <script src="{{ url('app-assets/js/scripts/forms/input-groups.js') }}" type="text/javascript"></script>
  <script src="{{ url('app-assets/js/scripts/forms/checkbox-radio.js') }}" type="text/javascript"></script>
  <script src="{{ url('app-assets/js/scripts/forms/switch.js') }}" type="text/javascript"></script>
  <script src="{{ url('app-assets/js/scripts/extensions/block-ui.js') }}" type="text/javascript"></script>
  
  <script src="{{ url('app-assets/vendors/js/forms/icheck/icheck.min.js') }}" type="text/javascript"></script>

  <!-- END PAGE LEVEL JS-->
</body>
</html>