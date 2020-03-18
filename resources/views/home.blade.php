@extends('layouts.nav')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
             

<div class="container">

<div class="row">
  <div class="bg-light border-right" id="sidebar-wrapper">
      <div class="list-group list-group-flush">
        @foreach($list_category as $category)  
            <div class="container">
            <li class="category"><a href="/category/{{$category->id}}">{{$category->name}}</a></li>
            </div>
        @endforeach
      </div>
    </div>
    <div class="col-md-9">
        <div class="row">

        @foreach($book_data as $book)
            <div class="col-sm-4 col-lg-4 col-md-4"  class="column {{$book->category_id}}">
                <div class="thumbnail">
                <!-- http://placehold.it/320x150 -->
                    <img src="{{ URL::to('/images') }}/{{$book->pic}}" alt="{{$book -> title}}">
                    <div class="caption">  
                        <h4 class="pull-right">${{$book -> price}}</h4>
                        <h4><a href="{{url('book').'/'.$book->id}}">{{$book -> title}}</a>
                        
                        </h4>
                        <p> {{$book->summary}} , book pages are {{$book -> page_count}}, author is {{$book -> author}}<a target="_blank" href="{{url('book').'/'.$book->id}}">See more</a>.</p>
                       <div> available copies :{{$book -> no_copies}}</div>
                       <form action="{{ route('favourite') }}" method="GET">
                            {{csrf_field()}}
                                <div class="input-group">
                                    <input type="hidden" class="form-control" name="favouriteTerm" value="{{ isset($book->id) ? $book->id : '' }}">
                                  <button type="submit">
                                    <i class="fas fa-heart"style="font-size: 300%;content: '\f004';" id="fav" onclick="{this.style.color = 'red'}"></i>
                                </button>
                                </div>
                       </form>
                    </div>
                    <div class="ratings">
                        <p class="pull-right">15 reviews</p>
                        <p>
                        @foreach($book_data as $rate)
                            <span class="glyphicon glyphicon-star"></span>
                       @endforeach
                        </p>
                    </div>
                  
                </div>
            </div>
            @endforeach
       </div>
       {{$book_data -> links()}}

    </div>
 
</div>

</div>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection

