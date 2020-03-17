@extends('layouts.app')

@section('nav')
<ul class="navbar-nav mr-auto">
<li class="navbar-brand">
        <a class="nav-link" href="{{route('home')}}">Maktbty <span class="sr-only">(current)</span></a>
   </li>
   <li class="navbar-brand">
        <a class="nav-link" href="#">MyBooks <span class="sr-only">(current)</span></a>
   </li>
   <li class="navbar-brand">
        <a class="nav-link" href="#">Favourites <span class="sr-only">(current)</span></a>
   </li>
</ul>

<!-- Right Side Of Navbar -->
<div class="container">

<span> Order By</span>
<div class="col-sm-8">
            <form action="order" method="GET">
                {{csrf_field()}}
                <div class="input-group">
                    <span class="input-group-btn">
                    <button type="submit" name="order" class="btn btn-secondary"value="created_at">Latest</button>
                    <button class="btn btn-secondary" name="order" type="submit" value="price">Price</button>

                    </span>
                </div>
            </form>
        </div>
        
</div>
    <div class="container">
        <div class="col-sm-8">
            <form action="home" method="GET">
                {{csrf_field()}}
                <div class="input-group">
                    <input type="search" class="form-control mr-sm-2" name="searchTerm" placeholder="Search for..." value="{{ isset($searchTerm) ? $searchTerm : '' }}">
                    <span class="input-group-btn">
                        <button class="btn btn-secondary" type="submit">Search</button>
                    </span>
                </div>
            </form>
        </div>
    </div>
@endsection