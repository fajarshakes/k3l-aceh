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


  <link rel="stylesheet" type="text/css" href="{{ url('app-assets/css/plugins/forms/wizard.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ url('app-assets/css/pages/email-application.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ url('app-assets/css/pages/chat-application.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ url('app-assets/css/core/colors/palette-switch.css') }}">

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
          <li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu font-large-1"></i></a></li>
          <li class="nav-item mr-auto">
            <a class="navbar-brand" href="index.html">
              <img class="brand-logo" alt="modern admin logo" src="../../../app-assets/images/logo/logo_.png">
              <h3 class="brand-text">SPAKAT</h3>
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
            <li class="dropdown nav-item mega-dropdown"><a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown">Dropdown Menu</a>
              <ul class="mega-dropdown-menu dropdown-menu row">
                <li class="col-md-2">
                  <h6 class="dropdown-menu-header text-uppercase mb-1"><i class="la la-newspaper-o"></i> News</h6>
                  <div id="mega-menu-carousel-example">
                    <div>
                      <img class="rounded img-fluid mb-1" src="../../../app-assets/images/slider/slider-2.png"
                      alt="First slide"><a class="news-title mb-0" href="#">Poster Frame PSD</a>
                      <p class="news-content">
                        <span class="font-small-2">Mei 26, 2020</span>
                      </p>
                    </div>
                  </div>
                </li>
                <li class="col-md-3">
                  <h6 class="dropdown-menu-header text-uppercase"><i class="la la-random"></i> Drill down menu</h6>
                  <ul class="drilldown-menu">
                    <li class="menu-list">
                      <ul>
                        <li>
                          <a class="dropdown-item" href="layout-2-columns.html"><i class="ft-file"></i> Page layouts & Templates</a>
                        </li>
                        <li><a href="#"><i class="ft-align-left"></i> Multi level menu</a>
                          <ul>
                            <li><a class="dropdown-item" href="#"><i class="la la-bookmark-o"></i>  Second level</a></li>
                            <li><a href="#"><i class="la la-lemon-o"></i> Second level menu</a>
                              <ul>
                                <li><a class="dropdown-item" href="#"><i class="la la-heart-o"></i>  Third level</a></li>
                                <li><a class="dropdown-item" href="#"><i class="la la-file-o"></i> Third level</a></li>
                                <li><a class="dropdown-item" href="#"><i class="la la-trash-o"></i> Third level</a></li>
                                <li><a class="dropdown-item" href="#"><i class="la la-clock-o"></i> Third level</a></li>
                              </ul>
                            </li>
                            <li><a class="dropdown-item" href="#"><i class="la la-hdd-o"></i> Second level, third link</a></li>
                            <li><a class="dropdown-item" href="#"><i class="la la-floppy-o"></i> Second level, fourth link</a></li>
                          </ul>
                        </li>
                        <li>
                          <a class="dropdown-item" href="color-palette-primary.html"><i class="ft-camera"></i> Color palette system</a>
                        </li>
                        <li><a class="dropdown-item" href="sk-2-columns.html"><i class="ft-edit"></i> Page starter kit</a></li>
                        <li><a class="dropdown-item" href="changelog.html"><i class="ft-minimize-2"></i> Change log</a></li>
                        <li>
                          <a class="dropdown-item" href="#"><i class="la la-life-ring"></i> Customer support center</a>
                        </li>
                      </ul>
                    </li>
                  </ul>
                </li>
                <li class="col-md-3">
                  <h6 class="dropdown-menu-header text-uppercase"><i class="la la-list-ul"></i> Accordion</h6>
                  <div id="accordionWrap" role="tablist" aria-multiselectable="true">
                    <div class="card border-0 box-shadow-0 collapse-icon accordion-icon-rotate">
                      <div class="card-header p-0 pb-2 border-0" id="headingOne" role="tab"><a data-toggle="collapse" data-parent="#accordionWrap" href="#accordionOne"
                        aria-expanded="true" aria-controls="accordionOne">Accordion Item #1</a></div>
                      <div class="card-collapse collapse show" id="accordionOne" role="tabpanel" aria-labelledby="headingOne"
                      aria-expanded="true">
                        <div class="card-content">
                          <p class="accordion-text text-small-3">News 1.</p>
                        </div>
                      </div>
                      <div class="card-header p-0 pb-2 border-0" id="headingTwo" role="tab"><a class="collapsed" data-toggle="collapse" data-parent="#accordionWrap"
                        href="#accordionTwo" aria-expanded="false" aria-controls="accordionTwo">Accordion Item #2</a></div>
                      <div class="card-collapse collapse" id="accordionTwo" role="tabpanel" aria-labelledby="headingTwo"
                      aria-expanded="false">
                        <div class="card-content">
                          <p class="accordion-text">News 2.</p>
                        </div>
                      </div>
                      <div class="card-header p-0 pb-2 border-0" id="headingThree" role="tab"><a class="collapsed" data-toggle="collapse" data-parent="#accordionWrap"
                        href="#accordionThree" aria-expanded="false" aria-controls="accordionThree">Accordion Item #3</a></div>
                      <div class="card-collapse collapse" id="accordionThree" role="tabpanel" aria-labelledby="headingThree"
                      aria-expanded="false">
                        <div class="card-content">
                          <p class="accordion-text">News 3.</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </li>
                <li class="col-md-4">
                  <h6 class="dropdown-menu-header text-uppercase mb-1"><i class="la la-envelope-o"></i> Contact Us</h6>
                  <form class="form form-horizontal">
                    <div class="form-body">
                      <div class="form-group row">
                        <label class="col-sm-3 form-control-label" for="inputName1">Name</label>
                        <div class="col-sm-9">
                          <div class="position-relative has-icon-left">
                            <input class="form-control" type="text" id="inputName1" placeholder="Admin">
                            <div class="form-control-position pl-1"><i class="la la-user"></i></div>
                          </div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-3 form-control-label" for="inputEmail1">Email</label>
                        <div class="col-sm-9">
                          <div class="position-relative has-icon-left">
                            <input class="form-control" type="email" id="inputEmail1" placeholder="admin@example.com">
                            <div class="form-control-position pl-1"><i class="la la-envelope-o"></i></div>
                          </div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-3 form-control-label" for="inputMessage1">Message</label>
                        <div class="col-sm-9">
                          <div class="position-relative has-icon-left">
                            <textarea class="form-control" id="inputMessage1" rows="2" placeholder="Simple Textarea"></textarea>
                            <div class="form-control-position pl-1"><i class="la la-commenting-o"></i></div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-12 mb-1">
                          <button class="btn btn-info float-right" type="button"><i class="la la-paper-plane-o"></i> Send </button>
                        </div>
                      </div>
                    </div>
                  </form>
                </li>
              </ul>
            </li>
            <li class="nav-item nav-search"><a class="nav-link nav-link-search" href="#"><i class="ficon ft-search"></i></a>
              <div class="search-input">
                <input class="input" type="text" placeholder="Explore Modern...">
              </div>
            </li>
          </ul>
          <ul class="nav navbar-nav float-right">
            <li class="dropdown dropdown-user nav-item">
              <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                <span class="mr-1">Hello,
                  <span class="user-name text-bold-700">{{ Auth::user()->username }}</span>
                </span>
                <span class="avatar avatar-online">
                  <img src="../../../app-assets/images/portrait/small/avatar-s-19.png" alt="avatar"><i></i></span>
              </a>
              <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="#"><i class="ft-user"></i> Edit Profile</a>
                <a class="dropdown-item" href="#"><i class="ft-mail"></i> My Inbox</a>
                <a class="dropdown-item" href="#"><i class="ft-check-square"></i> Task</a>
                <a class="dropdown-item" href="#"><i class="ft-message-square"></i> Chats</a>
                <div class="dropdown-divider"></div><a class="dropdown-item" href="#"><i class="ft-power"></i> Logout</a>
              </div>
            </li>
            <li class="dropdown dropdown-language nav-item"><a class="dropdown-toggle nav-link" id="dropdown-flag" href="#" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false"><i class="flag-icon flag-icon-gb"></i><span class="selected-language"></span></a>
              <div class="dropdown-menu" aria-labelledby="dropdown-flag"><a class="dropdown-item" href="#"><i class="flag-icon flag-icon-gb"></i> English</a>
                <a class="dropdown-item" href="#"><i class="flag-icon flag-icon-fr"></i> French</a>
                <a class="dropdown-item" href="#"><i class="flag-icon flag-icon-cn"></i> Chinese</a>
                <a class="dropdown-item" href="#"><i class="flag-icon flag-icon-de"></i> German</a>
              </div>
            </li>
            <li class="dropdown dropdown-notification nav-item">
              <a class="nav-link nav-link-label" href="#" data-toggle="dropdown"><i class="ficon ft-bell"></i>
                <span class="badge badge-pill badge-default badge-danger badge-default badge-up badge-glow">3</span>
              </a>
              <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                <li class="dropdown-menu-header">
                  <h6 class="dropdown-header m-0">
                    <span class="grey darken-2">Notifications</span>
                  </h6>
                  <span class="notification-tag badge badge-default badge-danger float-right m-0">3 New</span>
                </li>
                <li class="scrollable-container media-list w-100">
                  
                  <a href="javascript:void(0)">
                    <div class="media">
                      <div class="media-left align-self-center"><i class="ft-download-cloud icon-bg-circle bg-red bg-darken-1"></i></div>
                      <div class="media-body">
                        <h6 class="media-heading red darken-1">99% Server load</h6>
                        <p class="notification-text font-small-3 text-muted">Aliquam tincidunt mauris eu risus.</p>
                        <small>
                          <time class="media-meta text-muted" datetime="2015-06-11T18:29:20+08:00">Five hour ago</time>
                        </small>
                      </div>
                    </div>
                  </a>
                  
                  <a href="javascript:void(0)">
                    <div class="media">
                      <div class="media-left align-self-center"><i class="ft-check-circle icon-bg-circle bg-cyan"></i></div>
                      <div class="media-body">
                        <h6 class="media-heading">Complete the task</h6>
                        <small>
                          <time class="media-meta text-muted" datetime="2015-06-11T18:29:20+08:00">Last week</time>
                        </small>
                      </div>
                    </div>
                  </a>
                  <a href="javascript:void(0)">
                    <div class="media">
                      <div class="media-left align-self-center"><i class="ft-file icon-bg-circle bg-teal"></i></div>
                      <div class="media-body">
                        <h6 class="media-heading">Generate monthly report</h6>
                        <small>
                          <time class="media-meta text-muted" datetime="2015-06-11T18:29:20+08:00">Last month</time>
                        </small>
                      </div>
                    </div>
                  </a>
                </li>
                <li class="dropdown-menu-footer"><a class="dropdown-item text-muted text-center" href="javascript:void(0)">Read all notifications</a></li>
              </ul>
            </li>
            <li class="dropdown dropdown-notification nav-item">
              <a class="nav-link nav-link-label" href="#" data-toggle="dropdown"><i class="ficon ft-mail">             </i></a>
              <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                <li class="dropdown-menu-header">
                  <h6 class="dropdown-header m-0">
                    <span class="grey darken-2">Messages</span>
                  </h6>
                  <span class="notification-tag badge badge-default badge-warning float-right m-0">4 New</span>
                </li>
                <!--li class="scrollable-container media-list w-100">
                  <a href="javascript:void(0)">
                    <div class="media">
                      <div class="media-left">
                        <span class="avatar avatar-sm avatar-online rounded-circle">
                          <img src="../../../app-assets/images/portrait/small/avatar-s-19.png" alt="avatar"><i></i></span>
                      </div>
                      <div class="media-body">
                        <h6 class="media-heading">Margaret Govan</h6>
                        <p class="notification-text font-small-3 text-muted">I like your portfolio, let's start.</p>
                        <small>
                          <time class="media-meta text-muted" datetime="2015-06-11T18:29:20+08:00">Today</time>
                        </small>
                      </div>
                    </div>
                  </a>
                  <a href="javascript:void(0)">
                    <div class="media">
                      <div class="media-left">
                        <span class="avatar avatar-sm avatar-busy rounded-circle">
                          <img src="../../../app-assets/images/portrait/small/avatar-s-2.png" alt="avatar"><i></i></span>
                      </div>
                      <div class="media-body">
                        <h6 class="media-heading">Bret Lezama</h6>
                        <p class="notification-text font-small-3 text-muted">I have seen your work, there is</p>
                        <small>
                          <time class="media-meta text-muted" datetime="2015-06-11T18:29:20+08:00">Tuesday</time>
                        </small>
                      </div>
                    </div>
                  </a>
                  <a href="javascript:void(0)">
                    <div class="media">
                      <div class="media-left">
                        <span class="avatar avatar-sm avatar-online rounded-circle">
                          <img src="../../../app-assets/images/portrait/small/avatar-s-3.png" alt="avatar"><i></i></span>
                      </div>
                      <div class="media-body">
                        <h6 class="media-heading">Carie Berra</h6>
                        <p class="notification-text font-small-3 text-muted">Can we have call in this week ?</p>
                        <small>
                          <time class="media-meta text-muted" datetime="2015-06-11T18:29:20+08:00">Friday</time>
                        </small>
                      </div>
                    </div>
                  </a>
                  <a href="javascript:void(0)">
                    <div class="media">
                      <div class="media-left">
                        <span class="avatar avatar-sm avatar-away rounded-circle">
                          <img src="../../../app-assets/images/portrait/small/avatar-s-6.png" alt="avatar"><i></i></span>
                      </div>
                      <div class="media-body">
                        <h6 class="media-heading">Eric Alsobrook</h6>
                        <p class="notification-text font-small-3 text-muted">We have project party this saturday.</p>
                        <small>
                          <time class="media-meta text-muted" datetime="2015-06-11T18:29:20+08:00">last month</time>
                        </small>
                      </div>
                    </div>
                  </a>
                </li -->
                <li class="dropdown-menu-footer"><a class="dropdown-item text-muted text-center" href="javascript:void(0)">Read all messages</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
  <!-- ////////////////////////////////////////////////////////////////////////////-->
  <div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">

  @include('layouts.navigator')

  </div>
  <div class="app-content content">

  @yield('content')
  
  </div>
  <!-- FOOTER  ////////////////////////////////////////////////////////////////////////////-->
  <footer class="footer fixed-bottom footer-light navbar-border navbar-shadow">
  <!--footer class="footer footer-static footer-light navbar-border navbar-shadow"-->
    <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2">
      <span class="float-md-left d-block d-md-inline-block">Copyright &copy; 2020 <a class="text-bold-800 grey darken-2" href="https://bereeh.id"
        target="_blank">BEREEH.ID </a>, All rights reserved. </span>
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


  <!-- END PAGE LEVEL JS-->
</body>
</html>