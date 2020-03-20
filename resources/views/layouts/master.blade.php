<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    @yield('title')
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  @stack('table-styles')
  @stack('chart')
  @stack('book-styles')
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- CSS Files -->
  <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/css/now-ui-dashboard.css?v=1.5.0') }}" rel="stylesheet" />
  <link href="{{ asset('assets/demo/demo.css') }}" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.js"></script>
</head>

<body class="">
  <div class="wrapper ">

    <div class="sidebar" data-color="blue">
      <div class="sidebar-wrapper" id="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item dropdown">
            <a style="color:white;background-color:#141E30;font-size: 0.8571em" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
              {{ Auth::user()->name }} <span class="caret"></span>
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
              </form>
            </div>
          </li>
          <li>
            <a href="/dashboard">
              <i class="now-ui-icons design_app"></i>
              <h2>Home</h2>
            </a>
          </li>
          <li>
            <a href="/dashboard/users">
              <i class="now-ui-icons design_app"></i>
              <h2>Users</h2>
            </a>
          </li>
          <li>
            <a href="/dashboard/categories">
              <i class="now-ui-icons education_atom"></i>
              <h5>Categories</h5>
            </a>
          </li>
          <li>
            <a href="/dashboard/books">
              <i class="now-ui-icons location_map-big"></i>
              <h2>Books</h2>
            </a>
          </li>
          <li>
            <a href="/dashboard/admins">
              <i class="now-ui-icons ui-1_bell-53"></i>
              <h2>Admins</h2>
            </a>
          </li>
        </ul>
      </div>
    </div>

    <!-- End sidebar -->

    <div class="main-panel" id="main-panel">



      <div class="panel-header panel-header-sm">
        <h1 style="color:white;">Maktabty</h1>
        <h3 style="color:white;">Admin dashboard</h3>
      </div>

      <div class="content">
        @yield('content')

      </div>

      <!-- end Content  -->
      <footer class="footer">

      </footer>
    </div>


  </div>

  <!--   Core JS Files   -->
  <script src="../assets/js/core/jquery.min.js"></script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="../assets/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="../assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/now-ui-dashboard.min.js?v=1.5.0" type="text/javascript"></script><!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
  <script src="../assets/demo/demo.js"></script>
  @yield('scripts')
</body>

</html>