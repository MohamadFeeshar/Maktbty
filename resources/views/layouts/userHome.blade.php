
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
Maktbty
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  @stack('table-styles')
  @stack('chart')
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
          <div class="col-md-12">

          <p class="lead" style="color:black;font-weight: bold;">Category</p>

          @foreach($list_category as $category)  

          <li>
            <a href="/category/{{$category->id}}" class="list-group-item" style="background-color:grey;height:4rem;">
              <h2 style="color:white;font-weight: bold;display:flex;justify-content:center;align-items:center;">{{ $category->name }}</h2>
            </a>
          </li>
          @endforeach
          </div>
          </ul>
      </div>
    </div>

    <!-- End sidebar -->

    <div class="main-panel" id="main-panel">
 

      <div class="panel-header panel-header-sm">
      <ul class="navbar-nav mr-auto" style="display:inline-block;justify-content:center;align-items:center;">

        <li class="navbar-brand" >
        <a class="nav-link" style="color:white;" onMouseOver="this.style.color='#0F0'"onMouseOut="this.style.color='#fff'" href="{{route('home')}}">Maktbty <span class="sr-only">(current)</span></a>
        </li>
        
        <li class="navbar-brand" >
        <a class="nav-link"   style="color:white;" onMouseOver="this.style.color='#0F0'" onMouseOut="this.style.color='#fff'" href="{{route('myBooks')}}">MyBooks <span class="sr-only">(current)</span></a>
        </li>

        <li class="navbar-brand" >
        <a class="nav-link"  style="color:white;" onMouseOver="this.style.color='#0F0'" onMouseOut="this.style.color='#fff'"href="{{route('fav')}}">Favourites <span class="sr-only">(current)</span></a>

        </li>
             <!-- <span style="color:white;"> Order By</span> -->
        <li class="navbar-brand">
        <span class="nav-link"  style="color:white;">Order By <span class="sr-only">(current)</span></span>

        </li>
      <li class="navbar-brand" >

     <!-- <span style="color:white;"> Order By</span> -->
     <span class="sr-only">(current)</span>
            <form action="order" method="GET">
                {{csrf_field()}}
                <div class="input-group">
                    <span class="input-group-btn">
                    <button type="submit" name="order" class="btn btn-secondary"value="created_at">Latest</button>
                    <button class="btn btn-secondary" name="order" type="submit" value="price">Price</button>
         
                    </span>
                </div>
            </form>
       
</li>
<li class="navbar-brand" >
            <form action="home" method="GET">
                {{csrf_field()}}
                <div class="input-group">
                    <input type="search" class="form-control mr-sm-2" name="searchTerm" placeholder="Search for..." value="{{ isset($searchTerm) ? $searchTerm : '' }}">
                    <!-- <span class="input-group-btn"> -->
                        <!-- <button class="btn btn-secondary" type="submit">Search</button> -->
                    <!-- </span> -->
                </div>
            </form>
    </li>
    </ul>    
<span></span>
</div>
      <div class="content" style="display:flex;justify-content:start;align-items:start;">
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
