<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <script src="{{ asset('js/jquery-1.10.2.js') }}"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/ajaxRequests.js') }}"></script>


    <!-- book style -->
    <link rel="stylesheet" href="{{ asset('css/book.css') }}">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

  <!-- Bootstrap core CSS -->
  <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">

<!-- Add custom CSS here -->
    <link href="{{ asset('css/shop-homepage.css') }}" rel="stylesheet">
    <!-- Styles -->
    <link rel="stylesheet" href="/fontawesome-free-5.12.1-web/css/all.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/user.css') }}" rel="stylesheet">
    <link href="{{ asset('css/favorite.css') }}" rel="stylesheet">
    @stack('css-styles')
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{route('home')}}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('myBooks')}}">MyBooks <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('fav')}}">Favourites <span class="sr-only">(current)</span></a>
                            </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        <div class="container">
                        
                        <span> Order By</span>
                         <span class="input-group-btn" name="orderBy">
                                <button type="submit" name="latest" class="btn btn-secondary">Latest</button>
                                <button class="btn btn-secondary" name="price" type="submit" >Price</button>
                        </span>                        
                        
                        </div>
                            <div class="container">
                                <div class="col-sm-8">
                                    <form action="home" method="GET">
                                        {{csrf_field()}}
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="searchTerm" placeholder="Search by name or author for..." value="{{ isset($searchTerm) ? $searchTerm : '' }}">
                                            <span class="input-group-btn">
                                                <button class="btn btn-secondary" type="submit">Search</button>
                                            </span>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="container">
            @yield('content')
        </main>
    </div>
    <script>
        $(document).ready(function(){
            $('.toggleFavorite').click(function (e) {
                e.preventDefault();
                let element = $(this);
                let favorited = $(this).hasClass("isfavoriteButton") === true ? 1 : 0;
                let bookId = $(this).attr('id');
                $.ajax({
                    type: "post",
                    dataType: "json",
                    url: '{{ route('addRemoveFavorite') }}',
                    data: {'favorited': favorited, 'bookId': bookId, _token: '{{csrf_token()}}'},
                    success: function (data) {
                        if(data.success == 'deleted'){
                            alert("removed to favorites")
                            console.log(element);
                            element.toggleClass("isfavoriteButton");
                            element.toggleClass("favoriteButton");

                        }
                        else if(data.success === 'added'){
                            alert("added from favorites")
                            console.log('added');
                            element.toggleClass("isfavoriteButton");
                            element.toggleClass("favoriteButton");
                        }
                        
                    },
                    error: function (data, textStatus, errorThrown) {
                        console.log(errorThrown);
                    }
                });
            });
        });
    </script>
</body>
</html>
