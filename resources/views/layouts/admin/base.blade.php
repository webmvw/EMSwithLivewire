
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Employee Management System</title>

    <!-- Bootstrap -->
    <link href="{{ asset('assets/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- datatable css -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/build/css/jquery.dataTables.min.css')}}">
    <!-- Font Awesome -->
    <link href="{{ asset('assets/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ asset('assets/vendors/nprogress/nprogress.css') }}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{ asset('assets/build/css/custom.min.css') }}" rel="stylesheet">
    @livewireStyles
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="{{route('admin.dashboard')}}" class="site_title"><i class="fa fa-paw"></i> <span>EMS</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                @if(Auth::user()->image == null)
                <img src="{{ asset('assets/images/user.png') }}" alt="user image" class="img-circle profile_img">
                @else
                <img src="{{ asset('assets/images/employee/'.Auth::user()->image) }}" alt="{{Auth::user()->name}}" class="img-circle profile_img">
                @endif
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2>{{Auth::user()->name}}</h2>
              </div>
              <div class="clearfix"></div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <ul class="nav side-menu">
                  <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-home"></i> Home</a>
                  </li>
                  <li><a><i class="fa fa-edit"></i> Generel<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{route('admin.department')}}">Department</a></li>
                      <li><a href="{{route('admin.designation')}}">Designation</a></li>
                      <li><a href="{{route('admin.notice')}}">Notice</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-edit"></i> Employee<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{route('admin.add.employee')}}">Add Employee</a></li>
                      <li><a href="{{route('admin.employee')}}">View Employee</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-edit"></i> Task<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{route('admin.task')}}">View Task</a></li>
                    </ul>
                  </li>
                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">
                <div class="nav toggle">
                  <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                </div>
                <nav class="nav navbar-nav">
                <ul class=" navbar-right">
                  <li class="nav-item dropdown open" style="padding-left: 15px;">
                    <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                      @if(Auth::user()->image == null)
                      <img src="{{ asset('assets/images/user.png') }}" alt="user image">
                      @else
                      <img src="{{ asset('assets/images/employee/'.Auth::user()->image) }}" alt="{{Auth::user()->name}}">
                      @endif
                      {{Auth::user()->name}}
                    </a>
                    <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item"  href="javascript:;"> Profile</a>
                        <a class="dropdown-item"  href="javascript:;">
                          <span class="badge bg-red pull-right">50%</span>
                          <span>Settings</span>
                        </a>
                    <a class="dropdown-item"  href="javascript:;">Help</a>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                         onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();"><i class="fa fa-sign-out pull-right"></i> {{ __('Log Out') }}</a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                          @csrf
                      </form>
                    </div>
                  </li>
  
                  <li role="presentation" class="nav-item dropdown open">
                    <a href="javascript:;" class="dropdown-toggle info-number" id="navbarDropdown1" data-toggle="dropdown" aria-expanded="false">
                      <i class="fa fa-envelope-o"></i>
                      <span class="badge bg-green">6</span>
                    </a>
                    <ul class="dropdown-menu list-unstyled msg_list" role="menu" aria-labelledby="navbarDropdown1">
                      <li class="nav-item">
                        <a class="dropdown-item">
                          <span class="image"><img src="{{ asset('assets/build/images/img.jpg') }}" alt="Profile Image" /></span>
                          <span>
                            <span>John Smith</span>
                            <span class="time">3 mins ago</span>
                          </span>
                          <span class="message">
                            Film festivals used to be do-or-die moments for movie makers. They were where...
                          </span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="dropdown-item">
                          <span class="image"><img src="{{ asset('assets/build/images/img.jpg') }}" alt="Profile Image" /></span>
                          <span>
                            <span>John Smith</span>
                            <span class="time">3 mins ago</span>
                          </span>
                          <span class="message">
                            Film festivals used to be do-or-die moments for movie makers. They were where...
                          </span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="dropdown-item">
                          <span class="image"><img src="{{ asset('assets/build/images/img.jpg') }}" alt="Profile Image" /></span>
                          <span>
                            <span>John Smith</span>
                            <span class="time">3 mins ago</span>
                          </span>
                          <span class="message">
                            Film festivals used to be do-or-die moments for movie makers. They were where...
                          </span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="dropdown-item">
                          <span class="image"><img src="{{ asset('assets/build/images/img.jpg') }}" alt="Profile Image" /></span>
                          <span>
                            <span>John Smith</span>
                            <span class="time">3 mins ago</span>
                          </span>
                          <span class="message">
                            Film festivals used to be do-or-die moments for movie makers. They were where...
                          </span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <div class="text-center">
                          <a class="dropdown-item">
                            <strong>See All Alerts</strong>
                            <i class="fa fa-angle-right"></i>
                          </a>
                        </div>
                      </li>
                    </ul>
                  </li>
                </ul>
              </nav>
            </div>
          </div>
        <!-- /top navigation -->



        {{$slot}}
        

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Employee Management System | Version: 1.0
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="{{ asset('assets/vendors/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap -->
   <script src="{{ asset('assets/vendors/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset('assets/vendors/fastclick/lib/fastclick.js') }}"></script>
    <!-- NProgress -->
    <script src="{{ asset('assets/vendors/nprogress/nprogress.js') }}"></script>
    <!-- ckeditor js -->
    <script src="https://cdn.ckeditor.com/4.9.2/standard/ckeditor.js"></script>
    <!-- datatable js -->
    <script type="text/javascript" src="{{asset('assets/build/js/jquery.dataTables.min.js')}}"></script>
    
    <script type="text/javascript">
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace( 'ckeditor' );
    </script>

    <script type="text/javascript">
      $(document).ready(function() {
          $('#MyTable').DataTable();
          $('#MyTable2').DataTable();
      });
    </script>


    <!-- Custom Theme Scripts -->
    <script src="{{ asset('assets/build/js/custom.min.js') }}"></script>
    @livewireScripts
    <script type="text/javascript">
      window.addEventListener('openDepartmentDeleteModel', event=>{
        $("#departmentDeleteModel").modal('show');
      });
      window.addEventListener('closeDepartmentDeleteModel', event=>{
        $("#departmentDeleteModel").modal('hide');
      });
      window.addEventListener('openDesignationDeleteModel', event=>{
        $("#designationDeleteModel").modal('show');
      });
      window.addEventListener('closeDesignationDeleteModel', event=>{
        $("#designationDeleteModel").modal('hide');
      });
      window.addEventListener('openNoticeDeleteModel', event=>{
        $("#noticeDeleteModel").modal('show');
      });
      window.addEventListener('closeNoticeDeleteModel', event=>{
        $("#noticeDeleteModel").modal('hide');
      });
    </script>


  </body>
</html>
