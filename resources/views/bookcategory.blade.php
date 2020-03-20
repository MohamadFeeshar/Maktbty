@extends('layouts.userHome')

@section('content')


<div class="container">
<div class="row">
<div class="col-md-2">
        <p class="lead">Category</p>
        <div class="list-group">
        @foreach($list_category as $category)  
            <!-- <a href="/category/{{$category->id}}" class="list-group-item">{{ $category->name }}</a> -->
                 <!-- --> 
            <form action="{{ route('category') }}" method="GET">
            {{csrf_field()}}
                 <div class="input-group">
                    <input type="hidden" class="form-control" name="categoryTerm"value="{{ isset($category->id) ? $category->id : '' }}">
                    <button class="btn btn-secondary" type="submit" style="width:100px;">{{ $category->name }}</button>
                     <span>Order by    
                    <button type="submit" name="order" class="btn btn-secondary"style="width:100px;" value="created_at">Latest</button>
                    <button type="submit" name="order" class="btn btn-secondary"style="width:100px;" value="price">Price</button>
                    </span>
                    <input type="search" class="form-control mr-sm-2"style="width:70px;" name="searchTerm" placeholder="Search for..." value="{{ isset($searchTerm) ? $searchTerm : '' }}">
                 </div>
            </form>
                     <!-- --> 

       @endforeach
        </div>
    </div>
    
    <div class="col-md-9">
    <div class="row">
       <div class="container">
    <div class="spacedCards" >
    @foreach ($book_data as $book)
      <div class="card" class="col-md-9" style="width: 18rem;">
        <img src="{{ URL::to('/images') }}/{{$book->pic}}"  style="width: 18rem;height:15rem;" class="img-book" alt="{{$book -> title}}'s pic">
        <div class="card-body">
            <h5 class="card-title"><a href="{{url('book').'/'.$book->id}}">{{$book -> title}}</a></h5>
            <p class="card-text">{{$book->summary}}</p>
            
            <h4 class="pull-right">${{$book -> price}}</h4>
            <h5 class="card-text">  author is {{$book -> author}}. book pages are {{$book -> page_count}},{{mb_strimwidth($book->summary, 0, 15,"...")}}<a target="_blank" href="{{url('book').'/'.$book->id}}" class="text-decoration-none">See more</a>.</h5>
            <h5> available copies :{{$book -> no_copies}}</h5>
            <form action="{{ route('favourite') }}" method="GET">
                {{csrf_field()}}
                    <div class="input-group">
                        <input type="hidden" class="form-control" name="favouriteTerm" value="{{ isset($book->id) ? $book->id : '' }}">
                        <button type="submit">
                        <i class="fas fa-heart"style="font-size: 200%;content: '\f004';" id="fav" onclick="{this.style.color = 'red'}"></i>
                        </button>
                    </div>
            </form>
            <!-- <div class=" card-body align-middle spacedFav"> -->
            <a href="#" class="{{in_array($book->id, $favorites) ? 'isfavoriteButton' : 'favoriteButton'}}"><i class="fas fa-heart"></i></a>
            <!-- </div> -->
            <div class="ratings">
                        <!-- <p class="pull-right">15 reviews</p>
                        <p>
                        @foreach($book_data as $rate)
                            <span class="glyphicon glyphicon-star"></span>
                       @endforeach
                        </p> -->
            </div>
        </div>
      </div>
    @endforeach
    </div>
    <div class="pageLinks">  {{$book_data ->appends(Request::except('page'))-> links()}}</div>

    </div>

</div>

</div>
</div>

</div>
     
@endsection

