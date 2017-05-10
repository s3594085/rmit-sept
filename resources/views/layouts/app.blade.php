<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'SEPT') }}</title>

  <!-- Styles -->
  <!--
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
-->

<!-- From admin_bs -->
<!-- Bootstrap Core CSS -->
<link href="{{ asset('admin_bs/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
<!-- MetisMenu CSS -->
<link href="{{ asset('admin_bs/vendor/metisMenu/metisMenu.min.css') }}" rel="stylesheet">
<!-- Custom CSS -->
<link href="{{ asset('admin_bs/dist/css/sb-admin-2.css') }}" rel="stylesheet">
<!-- Custom Fonts -->
<link href="{{ asset('admin_bs/vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
<!-- DataTables CSS -->
<link href="{{ asset('admin_bs/vendor/datatables-plugins/dataTables.bootstrap.css') }}" rel="stylesheet">
<!-- DataTables Responsive CSS -->
<link href="{{ asset('admin_bs/vendor/datatables-responsive/dataTables.responsive.css') }}" rel="stylesheet">
<!-- Date Time Picker -->
<link href="{{ asset('admin_bs/vendor/bootstrap/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet">

<!-- Scripts -->
<script>
  window.Laravel = {!! json_encode([
    'csrfToken' => csrf_token(),
  ]) !!};
</script>

<!-- jQuery -->
<script src="{{ asset('admin_bs/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('admin_bs/vendor/bootstrap/js/moment.js') }}"></script>
<!-- Bootstrap Core JavaScript -->
<script src="{{ asset('admin_bs/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('admin_bs/vendor/bootstrap/js/bootstrap-datetimepicker.min.js') }}"></script>

</head>
<body>
  <div id="wrapper">
    @if (Auth::user())

    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="{{ url('/') }}">
          {{ config('app.name', 'Laravel') }}
        </a>
      </div>
      <!-- /.navbar-header -->

      <ul class="nav navbar-top-links navbar-right">
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">
            <i class="fa fa-envelope fa-fw"></i> <i class="fa fa-caret-down"></i>
          </a>
          <ul class="dropdown-menu dropdown-messages">
            <li>
              <a href="#">
                <div>
                  <strong>{{ Auth::user()->name }}</strong>
                  <span class="pull-right text-muted">
                    <em>Yesterday</em>
                  </span>
                </div>
                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
              </a>
            </li>
            <li class="divider"></li>
            <li>
              <a href="#">
                <div>
                  <strong>John Smith</strong>
                  <span class="pull-right text-muted">
                    <em>Yesterday</em>
                  </span>
                </div>
                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
              </a>
            </li>
            <li class="divider"></li>
            <li>
              <a class="text-center" href="#">
                <strong>Read All Messages</strong>
                <i class="fa fa-angle-right"></i>
              </a>
            </li>
          </ul>
          <!-- /.dropdown-messages -->
        </li>

        <!-- /.dropdown -->
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">
            <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
          </a>
          <ul class="dropdown-menu dropdown-user">
            <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
            </li>
            <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
            </li>
            <li class="divider"></li>
            <li><a href="{{ route('logout') }}"
              onclick="event.preventDefault();
              document.getElementById('logout-form').submit();"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
              </form>
            </li>
          </ul>
          <!-- /.dropdown-user -->
        </li>
        <!-- /.dropdown -->
      </ul>
      <!-- /.navbar-top-links -->

      <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
          <ul class="nav" id="side-menu">
            <li class="sidebar-search">
              <div class="input-group custom-search-form">
                <input type="text" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                  <button class="btn btn-default" type="button">
                    <i class="fa fa-search"></i>
                  </button>
                </span>
              </div>
              <!-- /input-group -->
            </li>
            <li>
              <a href="{{ url('/home') }}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
            </li>
            <li>
              <a href="#"><i class="fa fa-calendar fa-fw"></i> Timetable<span class="fa arrow"></span></a>
              <ul class="nav nav-second-level">
                <!--
                <li>
                  <a href="{{ route('view_available_booking') }}/1">View Availability</a>
                </li>
                -->
                <li>
                  <a href="{{ route('view_my_booking') }}">My Booking</a>
                </li>
                <li>
                  <a href="{{ route('add_booking') }}">Add Booking</a>
                </li>
              </ul>
            </li>
            @if (Auth::user()->owner)
            <li>
              <a href="#"><i class="fa fa-group fa-fw"></i> Employee<span class="fa arrow"></span></a>
              <ul class="nav nav-second-level">
                <li>
                  <a href="{{ route('add_employee') }}">Create Employee</a>
                </li>
                <li>
                  <a href="{{ route('manage_employee') }}">Manage Empolyee</a>
                </li>
              </ul>
            </li>

            <li>
              <a href="#"><i class="fa fa-calendar fa-fw"></i> Booking<span class="fa arrow"></span></a>
              <ul class="nav nav-second-level">
                <li>
                  <a href="{{ route('booking_sum') }}">View Booking</a>
                </li>
                <li>
                  <a href="{{ route('booking_cus') }}/1">Customer Booking</a>
                </li>
              </ul>
            </li>

            <li>
              <a href="#"><i class="fa fa-tasks fa-fw"></i> Service<span class="fa arrow"></span></a>
              <ul class="nav nav-second-level">
                <li>
                  <a href="{{ route('add_services') }}">Add Service</a>
                </li>
                <li>
                  <a href="{{ route('view_services') }}">View Service</a>
                </li>
              </ul>
            </li>

            @endif

            <!-- Debug -->
            <!--
            <li>
              <a href="{{ url('/debug') }}"><i class="fa fa-gears fa-fw"></i> Debug</a>
            </li>
          -->
          </ul>
        </div>
        <!-- /.sidebar-collapse -->
      </div>
      <!-- /.navbar-static-side -->
    </nav>
    @endif

    @yield('content')
  </div>

  <!-- Scripts -->
  <!--<script src="{{ asset('js/app.js') }}"></script>-->


  <!-- Metis Menu Plugin JavaScript -->
  <script src="{{ asset('admin_bs/vendor/metisMenu/metisMenu.min.js') }}"></script>

  <!-- Custom Theme JavaScript -->
  <script src="{{ asset('admin_bs/dist/js/sb-admin-2.js') }}"></script>

  <!-- DataTables JavaScript -->
  <script src="{{ asset('admin_bs/vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('admin_bs/vendor/datatables-plugins/dataTables.bootstrap.min.js') }}"></script>
  <script src="{{ asset('admin_bs/vendor/datatables-responsive/dataTables.responsive.js') }}"></script>

</body>
</html>
