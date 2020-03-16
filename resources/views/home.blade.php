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
      <div class="container">
          <div class="col-sm-8">
            <form action="{{ route('category') }}" method="GET">
            {{csrf_field()}}
                 <div class="input-group">
                    <input type="hidden" class="form-control" name="categoryTerm"value="{{ isset($category->id) ? $category->id : '' }}">
                     <span class="input-group-btn">
                            <button class="btn btn-secondary" style="width:70px;" type="submit">{{ $category->name }}</button>
                        </span> 
                 </div>
            </form>
          </div>
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
                        <p> {{$book->summary}} , book pages are {{$book -> page_count}}, author is {{$book -> author}}<a target="_blank" href="http://www.bootsnipp.com">See more</a>.</p>
                       <div> available copies :{{$book -> no_copies}}</div>
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

