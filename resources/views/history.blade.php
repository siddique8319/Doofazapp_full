<!DOCTYPE html>
<html class="st-layout ls-top-navbar ls-bottom-footer show-sidebar sidebar-l2" lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <mete name="csrf-token" content="{{csrf_token()}}">
  <title>My Profession</title>
  <link href="{{URL::asset('frontendadmin/css/vendor/all.css')}}" rel="stylesheet">
  <link href="{{URL::asset('frontendadmin/css/app/app.css')}}" rel="stylesheet">
</head>
<body>
  <div class="st-container" id="app" >
    <div class="navbar navbar-default navbar-fixed-top" role="navigation" >
      <div class="container-fluid">
        <div class="navbar-header" >
          <a href="#sidebar-menu" data-toggle="sidebar-menu" data-effect="st-effect-3"  class="toggle pull-left visible-xs active "><i class="fa fa-bars"></i></a>
          <a href="#sidebar-chat" data-toggle="sidebar-menu" class="toggle pull-right"></a>
           <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
           </button>
           @php
          $logo=DB::table('logos')                                  
          ->get();
          @endphp                 
          @foreach($logo as $logos)
           <img src="{{asset('images/'.$logos->image)}}" alt="" style="height: 50px ; width:150px;" />
           @endforeach 
        </div>
         <div class="navbar-collapse collapse" id="collapse">
            <form class="navbar-form navbar-left hidden-xs" role="search">
              <div class="search-2">              
              </div>
            </form>
            <ul class="nav navbar-nav navbar-right">           
              <li class="dropdown user">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="{{asset('frontendadmin/images/images.jpg')}}" alt="" class="img-circle" />{{Auth::user()->name}}<span class="caret"></span>
                </a>
                <ul class="dropdown-menu" role="menu">
                   <li><a href="{{ route('logout') }}"onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-sign-out"></i>Logout</a>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                      </form>
                   </li>
                </ul>
              </li>
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
                   @foreach($show as $shows)
                    <li class="sidebar-block">               
                      <a href="#">
                        <span class="media">               
                          <span class="media-body">                  
                            <span class="text-h4">{{$shows->title}}</span>
                          </span>
                        </span>
                        <span class="email-body"> <img src="{{asset('images/'.$shows->image)}}" alt="" style="height: 120px ; width:170px" />
                        </span>
                        <br><br>
                        <span class="text-h4">{{$shows->price}}</span>
                      </a>              
                    </li>
                    @endforeach   
                    <div class="sidebar-block tabbable tabs-icons" style="background-color:skyblue">            
                    </div>    
                     @foreach($software as $softwares)
                      <li class="sidebar-block">               
                        <a href="#">
                          <span class="media">               
                          <span class="media-body">                  
                              <span class="text-h4">{{$softwares->title}}</span>
                              </span>
                          </span>
                          <span class="email-body"> <img src="{{asset('images/'.$softwares->image)}}" alt="" style="height: 120px ; width:170px" />
                          </span>
                          <br><br>
                          <span class="text-h4">{{$softwares->price}}</span>
                        </a>              
                      </li>
                      @endforeach               
                 </ul>
                </div>
             </div>
           </div>
        </div>
      </div>
    <!-- Sidebar component with st-effect-1 (set on the toggle button within the navbar) -->  
    <div class="chat-window-container"></div>
     <div class="st-pusher">
       <div class="sidebar left sidebar-size-2 sidebar-offset-0 sidebar-skin-blue sidebar-visible-desktop" id=sidebar-menu  data-type=collapse>
         <div class="split-vertical">
           <div class="sidebar-block tabbable tabs-icons">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#sidebar-tabs-menu" data-toggle="tab"><i class="fa fa-bars"></i></a></li>
              <li><a href="#sidebar-tabs-2" data-toggle="tab"><i class="fa fa-bar-chart-o"></i></a></li>
            </ul>
          </div>
          <div class="split-vertical-body" >
            <div class="split-vertical-cell">
              <div class="tab-content">
                <div class="tab-pane active" id="sidebar-tabs-menu">
                  <div data-scrollable>
                    <ul class="sidebar-menu sm-icons-right sm-icons-block">
                      <li class="active"><a href="index"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>                      
                    </ul>            
                   <ul class="sidebar-menu sm-bordered sm-active-item-bg">                    
                     @if(Auth::user()->type==1)
                      <li class="hasSubmenu">
                        <a href="#submenu-media"><i class="fa fa-envelope-o"></i> <span>Messaging</span></a>
                         <ul id="submenu-media">
                          <li><router-link  to="/sendMessage">  <span>Send Message</span></router-link></li>
                          <li><a href="read-message"> <span>Read Message</span></a></li>
                         </ul>
                      </li>
                      <li class="hasSubmenu">
                        <a href="#designation"><i class="fa fa-circle-o"></i> <span>Project Setup</span></a>
                          <ul id="designation">
                            <li><router-link  to="/designation-entry">  <span>Designation Entry</span></router-link></li>
                            <li><router-link  to="/designationCondition">  <span>Designation Condition</span></router-link></li>
                            <li><router-link  to="/memberEntry">  <span>Member Entry</span></router-link></li>
                            <li><router-link  to="/incentiveEntry">  <span>Incentive Entry</span></router-link></li>
                            <li><router-link  to="/fixedSalary">  <span>Fixed Salary Entry</span></router-link></li>
                            <li><router-link  to="/salaryComponent">  <span>Salary Component Entry</span></router-link></li>
                            <li><router-link  to="/salaryComponentInformation">  <span>Salary Component Info Entry</span></router-link></li>
                            <li><router-link  to="/incomeType">  <span>Income Type</span></router-link></li>
                            <li><router-link  to="/income">  <span>Income</span></router-link></li>
                            <li><router-link  to="/memberType">  <span>Member Type</span></router-link></li>
                            <li><router-link  to="/generationEntry">  <span>Generation Entry</span></router-link></li>
                            <li><router-link  to="/projectType">  <span>Project Type Entry</span></router-link></li>
                            <li><router-link  to="/project">  <span>Project Entry</span></router-link></li>
                           </ul>
                       </li>
                       <li class="hasSubmenu">
                          <a href="#submenu-menu"><i class="fa  fa-folder-o"></i> <span>Menu</span></a>
                            <ul id="submenu-menu">
                              <li><router-link  to="/addMenu">  <span>Add Menu</span></router-link></li>                              
                              <li><router-link  to="/subMenu">  <span>Sub Menu</span></router-link></li> 
                              <li><router-link  to="/menuPermission">  <span>Permission Menu</span></router-link></li>                             
                            </ul>
                       </li>
                       <li class="hasSubmenu">
                          <a href="#report"><i class="fa  fa-bar-chart-o"></i> <span>Report</span></a>
                            <ul id="report">
                              <li  class="hasSubmenu"><a href="#designation-wise"><span>Designation Wise</span></a>
                                <ul id="designation-wise">
                                  <li><a href="company-list"><span>Free Member(20)</span></a></li>
                                  <li><a href="#"> <span>Active Member(5)</span></a></li>
                                  <li><a href="#"> <span>Gold Member(6)</span></a></li>  
                                  <li><a href="#"> <span>SPO(20)</span></a></li> 
                                  <li><a href="#"> <span>RSM</span></a></li> 
                                  <li><a href="#"> <span>ASM</span></a></li>
                                  <li><a href="#"> <span>SM</span></a></li>   
                               </ul> 
                             </li>
                             <li  class="hasSubmenu"><a href="#incentive"><span>Inbcentive</span></a>
                                <ul id="incentive">                                    
                                </ul> 
                             </li> 
                             <li  class="hasSubmenu"><a href="#fix-salary"><span>Fix Salary Member</span></a>
                                <ul id="fix-salary">
                                  <li><a href="company-list"><span>SPO(2)</span></a></li>                       
                                  <li><a href="#"> <span>RSM</span></a></li> 
                                  <li><a href="#"> <span>ASM</span></a></li>
                                  <li><a href="#"> <span>SM</span></a></li>   
                               </ul> 
                             </li> 
                              <li><a href="#"> <span>Full Salary Package</span></a></li>
                              <li><a href="#"> <span>Group List</span></a></li> 
                              <li  class="hasSubmenu"><a href="#statement"><span>Daily Statement</span></a>
                               <ul id="statement">
                                  <li><a href="company-list"><span>Daily Distribution Instant</span></a></li>                       
                                  <li><a href="#"> <span>Daily Collection Instant</span></a></li> 
                                  <li><a href="#"> <span>Dalily Collection & Distribution Sheet </span></a></li>
                                  <li><a href="#"> <span>Daily Distribution Monthly</span></a></li>
                                  <li><a href="#"> <span>Daily Collection Monthly</span></a></li>
                                  <li><a href="#"> <span>Dalily Collection & Distribution Monthly </span></a></li>   
                               </ul> 
                             </li>                                
                           </ul>
                       </li>
                       <li class="hasSubmenu">
                          <a href="#submenu-software"><i class="fa  fa-folder-o"></i> <span>Software Entry</span></a>
                            <ul id="submenu-software">
                              <li><router-link  to="/offer">  <span>Offer Entry</span></router-link></li>                              
                              <li><router-link  to="/software">  <span>Software Entry</span></router-link></li>                                                          
                            </ul>
                       </li>
                       <li class="hasSubmenu">
                          <a href="#submenu-shop"><i class="fa  fa-bank"></i> <span>Shop Type </span></a>
                            <ul id="submenu-shop">
                              <li><router-link  to="/shopTypeCondition">  <span>Shop Type Condition Entry</span></router-link></li>
                              <li><router-link  to="/shopList">  <span>Shop List</span></router-link></li>  
                              <li><router-link  to="/monthlyShopList">  <span>Monthly Shop List</span></router-link></li>                                                        
                            </ul>
                       </li> 
                       <li class="hasSubmenu">
                          <a href="#submenu-dynamic"><i class="fa  fa-photo"></i> <span>Dynamic Image </span></a>
                            <ul id="submenu-dynamic">
                              <li><router-link  to="/logo">  <span>Logo</span></router-link></li>
                              <li><router-link  to="/loginImage">  <span>Login Background Image</span></router-link></li>
                              <li><router-link  to="/bannerImage">  <span>Banner Image</span></router-link></li>                                                       
                            </ul>
                       </li>                      
                       @endif                      
                       @if(Auth::user()->type==3)
                       <li class="hasSubmenu">
                          @if($messageCount==0)
                          <a href="#submenu-media"><i class="fa fa-envelope-o"></i> <span>Messaging</span></a>
                          @else
                          <a href="#submenu-media"><i class="fa fa-envelope-o"></i> <span>Messaging</span>><span class="badge floating badge-danger" style="background-color:#e33636">{{$messageCount}}</span></a>
                          @endif
                          <ul id="submenu-media">
                              @if($messageCount==0)
                                <li><router-link  to="/newMessage"> <span> New Message</span></router-link></li>                       
                              @else
                              <li><router-link  to="/newMessage"> <span> New Message</span><span class="badge floating badge-danger" style="background-color:#e33636">{{$messageCount}}</span></router-link></li>   
                              @endif   
                              <li><router-link  to="/readMessage"> <span> Read Message</span></router-link></li>                     
                          </ul>
                      </li>
                       @foreach($input as $view)                                      
                          <li class="hasSubmenu">
                            <a href="#{{$view->permissionMenuId}}"><i class="fa fa-dot-circle-o"></i><span>{{$view->menuName}}</span></a>
                            <ul id="{{$view->permissionMenuId}}">
                                  @php
                                  $allSubmenu=DB::table('permission_sub_menus')
                                ->where('menuId',$view->menuName)
                                ->where('memberId',Auth::User()->id)  
                                ->where('status',0)                       
                                ->get();
                                  @endphp
                                  @foreach($allSubmenu as $all)              
                                <li><a><router-link  to="/{{$all->subMenuUrl}}"> <span>{{$all->subMenuName}}</span></router-link></a></li>
                                  @endforeach
                            </ul>
                          </li>                                         
                        @endforeach
                        @endif
                    </ul>
                  </div>
                </div>
              </div>
              <!-- // END .tab-content -->

            </div>
            <!-- // END .split-vertical-cell -->

          </div>
          <!-- // END .split-vertical-body -->



        </div>
      </div>        
        <div class="st-content" id="content">
          <div class="st-content-inner">
            <div class="container-fluid"> 
                <div v-if="!$route.meta.hideDashboard" >                      
                  <div class="item col-xs-12 col-md-10" >              
                      <h3 class="ribbon-heading ribbon-default top-left-right">History</h3>
                        <div class="panel panel-default">                                  
                          <div class="table-responsive">                    
                              <table data-toggle="" class="table table-responsive" cellspacing="1" width="200%">
                                <thead style="background:#e4e6ed ">
                                  <tr>
                                    <th>ID</th>
                                    <th>Customer_ID</th>
                                    <th>Date</th>
                                    <th>Shop</th>
                                    <th>Amount</th>                                                                                         
                                  </tr>
                                </thead>
                                <tbody>
                                 @php
                                 $allShop=DB::table('new_shop_entries')                                                      
                                ->get();
                                 @endphp
                                
                                 @foreach($accountInfo as $history)
                                  <tr> 
                                     <td>{{$history->accountHistoryId}}</td>    
                                     <td>{{Auth::user()->name}}</td> 
                                     <td>{{$history->created_at}}</td>
                                     @foreach($allShop as $allShops)
                                     @if($allShops->shopId==$history->shopId)
                                     <td>{{$allShops->shopName}}</td>
                                     @endif
                                     @endforeach
                                     <td>{{$history->balance}}</td>                           
                                  </tr>                                  
                                  @endforeach
                                </tbody>
                              </table>
                          </div>
                      </div> 
                  </div>        
                </div>
                  <router-view></router-view>
            </div>           
          </div>
        </div>
<!-- Footer -->
  <footer class="footer">
    <strong>Doofazproperty</strong> v4.0.0 &copy; Copyright 2020
  </footer>
<!-- // Footer -->

</div>
  <!-- /st-container -->

  <!-- Modal -->
  <div class="modal fade image-gallery-item" id="showImageModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-header">
        On my way to the top
      </div>
      <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
      <!-- <img class="img-responsive" src="images/place1-full.jpg" alt="Place"> -->
    </div>
  </div>
  </div>
  <!-- Inline Script for colors and config objects; used by various external scripts; -->
  <script>
    var colors = {
      "danger-color": "#e74c3c",
      "success-color": "#81b53e",
      "warning-color": "#f0ad4e",
      "inverse-color": "#2c3e50",
      "info-color": "#2d7cb5",
      "default-color": "#6e7882",
      "default-light-color": "#cfd9db",
      "purple-color": "#9D8AC7",
      "mustard-color": "#d4d171",
      "lightred-color": "#e15258",
      "body-bg": "#f6f6f6"
    };
    var config = {
      theme: "admin",
      skins: {
        "default": {
          "primary-color": "#3498db"
        }
      }
    };
  </script>
 
  <script src="{{ asset('js/app.js') }}" ></script>  
  <script src="{{URL::asset('frontendadmin/js/vendor/all.js')}}"></script>    
  <script src="{{URL::asset('frontendadmin/js/app/ap.js')}}"></script>
</body>


<!-- Mirrored from themekit.frontendmatter.com/dist/themes/admin/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 30 Dec 2019 19:23:14 GMT -->
</html>

       