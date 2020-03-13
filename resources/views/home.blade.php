@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <!-- <div class="card-header">Dashboard</div> -->

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

<div class="container">

<div class="row">
  <div class="bg-light border-right" id="sidebar-wrapper">
      <div class="list-group list-group-flush">
      @foreach($list_category as $category)  
          <a href="#"class="list-group-item list-group-item-action bg-light">{{ $category->name }}</a>
       @endforeach
 
      </div>
    </div>
  
    <div class="col-md-9">
        <div class="row">
        @foreach($book_data as $book)
            <div class="col-sm-4 col-lg-4 col-md-4">
                <div class="thumbnail">

              
                    <img src="http://placehold.it/320x150" alt="">
                    <div class="caption">  
      
                        <h4 class="pull-right">${{$book -> price}}</h4>
                        <h4><a href="#">{{$book -> title}}</a>
                        </h4>
                        <p> snippets like this online store item , book pages are {{$book -> page_count}}, author is {{$book -> author}}<a target="_blank" href="http://www.bootsnipp.com">See more</a>.</p>
                       <div> available copies :{{$book -> no_copies}}</div>

                    </div>
                    <div class="ratings">
                        <p class="pull-right">15 reviews</p>
                        <p>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                        </p>
                    </div>
                  
                </div>
            </div>
            @endforeach
       </div>

    </div>
 
</div>

</div>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection

