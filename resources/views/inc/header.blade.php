<!-- <!DOCTYPE html>
<html class="st-layout ls-top-navbar ls-bottom-footer show-sidebar sidebar-l2" lang="en">


<!-- Mirrored from themekit.frontendmatter.com/dist/themes/admin/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 30 Dec 2019 19:22:33 GMT -->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <mete name="csrf-token" content="{{csrf_token()}}">
  <title>Doofazproperty</title>

  <!-- Vendor CSS BUNDLE
    Includes styling for all of the 3rd party libraries used with this module, such as Bootstrap, Font Awesome and others.
    TIP: Using bundles will improve performance by reducing the number of network requests the client needs to make when loading the page. -->
  <link href="{{URL::asset('frontendadmin/css/vendor/all.css')}}" rel="stylesheet">




  <!-- Vendor CSS Standalone Libraries
        NOTE: Some of these may have been customized (for example, Bootstrap).
        See: src/less/themes/{theme_name}/vendor/ directory -->
  <!-- <link href="css/vendor/bootstrap.css" rel="stylesheet"> -->
  <!-- <link href="css/vendor/font-awesome.css" rel="stylesheet"> -->
  <!-- <link href="css/vendor/picto.css" rel="stylesheet"> -->
  <!-- <link href="css/vendor/material-design-iconic-font.css" rel="stylesheet"> -->
  <!-- <link href="css/vendor/datepicker3.css" rel="stylesheet"> -->
  <!-- <link href="css/vendor/jquery.minicolors.css" rel="stylesheet"> -->
  <!-- <link href="css/vendor/bootstrap-slider.css" rel="stylesheet"> -->
  <!-- <link href="css/vendor/railscasts.css" rel="stylesheet"> -->
  <!-- <link href="css/vendor/jquery-jvectormap.css" rel="stylesheet"> -->
  <!-- <link href="css/vendor/owl.carousel.css" rel="stylesheet"> -->
  <!-- <link href="css/vendor/slick.css" rel="stylesheet"> -->
  <!-- <link href="css/vendor/morris.css" rel="stylesheet"> -->
  <!-- <link href="css/vendor/ui.fancytree.css" rel="stylesheet"> -->
  <!-- <link href="css/vendor/daterangepicker-bs3.css" rel="stylesheet"> -->
  <!-- <link href="css/vendor/jquery.bootstrap-touchspin.css" rel="stylesheet"> -->
  <!-- <link href="css/vendor/select2.css" rel="stylesheet"> -->

  <!-- APP CSS BUNDLE [css/app/app.css]
INCLUDES:
    - The APP CSS CORE styling required by the "admin" module, also available with main.css - see below;
    - The APP CSS STANDALONE modules required by the "admin" module;
NOTE:
    - This bundle may NOT include ALL of the available APP CSS STANDALONE modules;
      It was optimised to load only what is actually used by the "admin" module;
      Other APP CSS STANDALONE modules may be available in addition to what's included with this bundle.
      See src/less/themes/admin/app.less
TIP:
    - Using bundles will improve performance by greatly reducing the number of network requests the client needs to make when loading the page. -->
  <link href="{{URL::asset('frontendadmin/css/app/app.css')}}" rel="stylesheet">

  <!-- App CSS CORE
This variant is to be used when loading the separate styling modules -->
  <!-- <link href="css/app/main.css" rel="stylesheet"> -->

  <!-- App CSS Standalone Modules
    As a convenience, we provide the entire UI framework broke down in separate modules
    Some of the standalone modules may have not been used with the current theme/module
    but ALL modules are 100% compatible -->

  <!-- <link href="css/app/essentials.css" rel="stylesheet" /> -->
  <!-- <link href="css/app/layout.css" rel="stylesheet" /> -->
  <!-- <link href="css/app/sidebar.css" rel="stylesheet" /> -->
  <!-- <link href="css/app/sidebar-skins.css" rel="stylesheet" /> -->
  <!-- <link href="css/app/navbar.css" rel="stylesheet" /> -->
  <!-- <link href="css/app/media.css" rel="stylesheet" /> -->
  <!-- <link href="css/app/player.css" rel="stylesheet" /> -->
  <!-- <link href="css/app/timeline.css" rel="stylesheet" /> -->
  <!-- <link href="css/app/cover.css" rel="stylesheet" /> -->
  <!-- <link href="css/app/chat.css" rel="stylesheet" /> -->
  <!-- <link href="css/app/charts.css" rel="stylesheet" /> -->
  <!-- <link href="css/app/maps.css" rel="stylesheet" /> -->
  <!-- <link href="css/app/colors-alerts.css" rel="stylesheet" /> -->
  <!-- <link href="css/app/colors-background.css" rel="stylesheet" /> -->
  <!-- <link href="css/app/colors-buttons.css" rel="stylesheet" /> -->
  <!-- <link href="css/app/colors-calendar.css" rel="stylesheet" /> -->
  <!-- <link href="css/app/colors-progress-bars.css" rel="stylesheet" /> -->
  <!-- <link href="css/app/colors-text.css" rel="stylesheet" /> -->
  <!-- <link href="css/app/ui.css" rel="stylesheet" /> -->

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries
WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!-- If you don't need support for Internet Explorer <= 8 you can safely remove these -->
  <!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

</head>

<body>

  <!-- Wrapper required for sidebar transitions -->
  <div class="st-container" id="app">

    <!-- Fixed navbar -->
    <div class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <a href="#sidebar-menu" data-toggle="sidebar-menu" data-effect="st-effect-3" class="toggle pull-left visible-xs"><i class="fa fa-bars"></i></a>

          <a href="#sidebar-chat" data-toggle="sidebar-menu" class="toggle pull-right"><i class="fa fa-comments"></i></a>

          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
       <img src="{{asset('frontendadmin/images/doofazit.png')}}" alt="" style="height: 50px ; width:auto" />
        </div>
        <div class="navbar-collapse collapse" id="collapse">
          <form class="navbar-form navbar-left hidden-xs" role="search">
            <div class="search-2">
              <div class="input-group">
                <input type="text" class="form-control form-control-w-150" placeholder="Search ..">
                <span class="input-group-btn">
            <button class="btn btn-primary" type="button"><i class="fa fa-search"></i></button>
        </span>
              </div>
            </div>
          </form>
          <ul class="nav navbar-nav navbar-right">
            <!-- notifications -->
            <li class="dropdown notifications updates hidden-xs hidden-sm">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-bell-o"></i>
                <span class="badge badge-primary">4</span>
              </a>
              <ul class="dropdown-menu" role="notification">
                <li class="dropdown-header">Notifications</li>
                <li class="media">
                  <div class="pull-right">
                    <span class="label label-success">New</span>
                  </div>
                  <div class="media-left">
                    <img src="images/people/50/guy-2.jpg" alt="people" class="img-circle" width="30">
                  </div>
                  <div class="media-body">
                    <a href="#">Adrian D.</a> posted <a href="#">a photo</a> on his timeline.
                    <br/>
                    <span class="text-caption text-muted">5 mins ago</span>
                  </div>
                </li>
                <li class="media">
                  <div class="pull-right">
                    <span class="label label-success">New</span>
                  </div>
                  <div class="media-left">
                    <img src="images/people/50/guy-6.jpg" alt="people" class="img-circle" width="30">
                  </div>
                  <div class="media-body">
                    <a href="#">Bill</a> posted <a href="#">a comment</a> on Adrian's recent <a href="#">post</a>.
                    <br/>
                    <span class="text-caption text-muted">3 hrs ago</span>
                  </div>
                </li>
                <li class="media">
                  <div class="media-left">
                    <span class="icon-block s30 bg-grey-200"><i class="fa fa-plus"></i></span>
                  </div>
                  <div class="media-body">
                    <a href="#">Mary D.</a> and <a href="#">Michelle</a> are now friends.
                    <p>
                      <span class="text-caption text-muted">1 day ago</span>
                    </p>
                    <a href="#">
                      <img class="width-30 img-circle" src="images/people/50/woman-6.jpg" alt="people">
                    </a>
                    <a href="#">
                      <img class="width-30 img-circle" src="images/people/50/woman-3.jpg" alt="people">
                    </a>
                  </div>
                </li>
              </ul>
            </li>
            <!-- // END notifications -->
            <!-- messages -->
            <li class="dropdown notifications hidden-xs hidden-sm">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-envelope-o"></i>

                <span class="badge floating badge-danger">12</span>

              </a>
              <ul class="dropdown-menu">
                <li class="media">
                  <div class="media-left">
                    <a href="#">
                      <img class="media-object thumb" src="images/people/50/guy-2.jpg" alt="people">
                    </a>
                  </div>
                  <div class="media-body">
                    <div class="pull-right">
                      <span class="label label-default">5 min</span>
                    </div>
                    <h5 class="media-heading">Adrian D.</h5>

                    <p class="margin-none">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                  </div>
                </li>
                <li class="media">
                  <div class="media-left">
                    <a href="#">
                      <img class="media-object thumb" src="images/people/50/woman-7.jpg" alt="people">
                    </a>
                  </div>

                  <div class="media-body">
                    <div class="pull-right">
                      <span class="label label-default">2 days</span>
                    </div>
                    <h5 class="media-heading">Jane B.</h5>
                    <p class="margin-none">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                  </div>
                </li>
                <li class="media">
                  <div class="media-left">
                    <a href="#">
                      <img class="media-object thumb" src="images/people/50/guy-8.jpg" alt="people">
                    </a>
                  </div>

                  <div class="media-body">
                    <div class="pull-right">
                      <span class="label label-default">3 days</span>
                    </div>
                    <h5 class="media-heading">Andrew M.</h5>
                    <p class="margin-none">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                  </div>
                </li>
              </ul>
            </li>
            <!-- // END messages -->
            <!-- user -->
            <li class="dropdown user">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="{{asset('frontendadmin/images/people/110/guy-6.jpg')}}" alt="" class="img-circle" /> Bill<span class="caret"></span>
              </a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="#"><i class="fa fa-user"></i>Profile</a></li>
                <li><a href="#"><i class="fa fa-wrench"></i>Settings</a></li>
                <li><a href="#"><i class="fa fa-sign-out"></i>Logout</a></li>
              </ul>
            </li>
            <!-- // END user -->
            <!-- country flags -->
          
            <!-- // END country flags -->
          </ul>
        </div>
      </div>
    </div>


 <!-- Sidebar component -->
    <div class="sidebar right sidebar-size-2 sidebar-offset-0 sidebar-skin-white sidebar-visible-desktop" id=email-items-menu>
      <div class="split-vertical">
        
        <div class="split-vertical-body">
          <div class="split-vertical-cell">
            <div data-scrollable>
              <ul class="emails">
                <li class="sidebar-block">
                  <a href="#">
                    <span class="media">
               
                    <span class="media-body">
                  
                    <span class="text-h3">Note for Masking SMS</span>
                    </span>
                    </span>
                    <span class="email-body">For Bangla/Unicode: Max 315 Character...
</span>
                  </a>
                </li>
                <br>
                 <li class="sidebar-block">
                  <a href="#">
                    <span class="media">
                
                    <span class="media-body">
                  
                    <span class="text-h3">Number format</span>
                    </span>
                    </span>
                
                    <span class="email-body">88017xxxxxxxx</span><br>
                    <span class="email-body">017xxxxxxxx</span><br>
                    <span class="email-body">17xxxxxxxx</span>
                  </a>
                </li>
                <br>
                 <li class="sidebar-block">
                  <a href="#">
                    <span class="media">
                  <span class="media-body">
                  
                    <span class="text-h3">SMS Recipient</span>
                    </span>
                    </span>
                
                   <span class="email-body">Before doing any campaign we recommend you to do a testing with the sender id to your number to ensure the sender id is working fine.</span>
                  </a>
                </li>

                 <br>
                 <li class="sidebar-block">
                  <a href="#">
                    <span class="media">
                  <span class="media-body">
                  
                    <span class="text-h3">SMS Content</span>
                    </span>
                    </span>
                
                   <span class="email-body">
                     
                     1 Text (English: 160 and Bangla: 70 Character)</br>
                     2 or more Text (English: 153 X n and Bangla: 67 X n Character)
                   </span>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>


    <!-- Sidebar component with st-effect-1 (set on the toggle button within the navbar) -->
  
    <div class="chat-window-container"></div>

    <!-- sidebar effects OUTSIDE of st-pusher: -->
    <!-- st-effect-1, st-effect-2, st-effect-4, st-effect-5, st-effect-9, st-effect-10, st-effect-11, st-effect-12, st-effect-13 -->

    <!-- content push wrapper -->
    <div class="st-pusher">

      <!-- Sidebar component with st-effect-3 (set on the toggle button within the navbar) -->
      <div class="sidebar left sidebar-size-2 sidebar-offset-0 sidebar-skin-blue sidebar-visible-desktop" id=sidebar-menu data-type=collapse>
        <div class="split-vertical">
          <div class="sidebar-block tabbable tabs-icons">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#sidebar-tabs-menu" data-toggle="tab"><i class="fa fa-bars"></i></a></li>
              <li><a href="#sidebar-tabs-2" data-toggle="tab"><i class="fa fa-bar-chart-o"></i></a></li>
            </ul>
          </div>
          <div class="split-vertical-body">
            <div class="split-vertical-cell">
              <div class="tab-content">

                <div class="tab-pane active" id="sidebar-tabs-menu">
                  <div data-scrollable>

                    <ul class="sidebar-menu sm-icons-right sm-icons-block">
                      <li class="active"><a href="index.html"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>
                      
                    </ul>

                    
                    <ul class="sidebar-menu sm-bordered sm-active-item-bg">
                    
                 
                      <li class="hasSubmenu">
                        <a href="#submenu-media"><i class="fa fa-envelope-o"></i> <span>Messaging</span></a>
                        <ul id="submenu-media">
                          <li><a href="new-message"> <span>New Message</span></a></li>
                          <li><a href="read-message"> <span>Read Message</span></a></li>
                           </ul>
                      </li>
                                          <li class="hasSubmenu ">
                        <a href="#components">
                          <i class="fa fa-money"></i>
                           <span >Flat Setup</span>
                           </a>
                        <ul id="components">
                          <li><router-link  to="/project-name"> <span>Project Name</span></router-link></li>
                         
                      
                          <li><a href="house-no"> <span>House No</span></a></li>
                         
                       
                          <li><a href="floor-entry"> <span>Floor Entry</span></a></li>
                         
                     
                          <li><a href="flat-no-entry"> <span>Flat No Entry</span></a></li>
                         
                      
                          <li><a href="flat-size-entry"> <span>Flat Size Entry</span></a></li>
                         
                     
                          <li><a href="flat-price-entry"> <span>Flat Price Entry</span></a></li>
                    
                        <li><a href="flat-discount-entry"> <span>Flat Discount Entry</span></a></li>
                         
                   
                        <li><a href="project-location-entry"> <span>Project Location Entry</span></a></li>
                         
                        
                        <li><a href="installment-entry"> <span>Installment Entry</span></a></li>
                      
                        <li><a href="year-entry"> <span>Year Entry</span></a></li>
                         
                        </ul>
                      </li>
                         <li class="hasSubmenu ">
                        <a href="#campaign">
                          <i class="fa  fa-shekel"></i>
                           <span >Commission</span>
                           </a>
                        <ul id="campaign">
                          <li><a href="commission-type-entry"> <span>Commission Type Entry</span></a></li>
                         <li><a href="commission-entry"> <span>Commission Entry</span></a></li>
                         <li><a href="encentive-entry"> <span>Encentive Entry</span></a></li>
                          <li><a href="fix-sallery-entry"> <span>Fix Sallery Entry</span></a></li>
                         
                        </ul>
                      </li>
                     
                      <li class="hasSubmenu">
                        <a href="#phonebook"><i class="fa fa-mobile"></i> <span>Staff Entry</span></a>
                        <ul id="phonebook">
                         <li><a href="staff-type-entry"> <span>Staff Type Entry</span></a></li>
                          <li><a href="staff-entry"> <span>Staff Entry</span></a></li>
                           <li><a href="designation-entry"> <span>Designation Entry</span></a></li>
                        </ul>
                      </li>
                        <li class="hasSubmenu">
                        <a href="#new"><i class="fa fa-mobile"></i> <span>Client Entry</span></a>
                        <ul id="new">
                         <li><a href="new-client-entry"> <span>New Client Entry</span></a></li>
                          
                        </ul>
                      </li>
                    <li class="hasSubmenu">
                        <a href="#report"><i class="fa fa-mobile"></i> <span>Report</span></a>
                        <ul id="report">
                        
                          
                        </ul>
                      </li>
                    
                    
                           {{-- <li class="">
                        <a href="developerApi"><i class="md md-tab-unselected"></i> <span>API Progress</span></a>
                      </li>
                       <li class="">
                        <a href="error-information"><i class="fa fa-question-circle"></i> <span>Error Information</span></a>
                      </li> --}}
                    </ul>

                 



                  </div>
                </div>
                <!-- // END .tab-pane -->

             

              </div>
              <!-- // END .tab-content -->

            </div>
            <!-- // END .split-vertical-cell -->

          </div>
          <!-- // END .split-vertical-body -->



        </div>
      </div>
         {{--  @yield('content')  --}}

<script src="{{ asset('js/app.js') }}" defer></script>
     @include('project/inc/footer') -->
