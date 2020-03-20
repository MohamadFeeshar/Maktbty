@extends('layouts.userHome')
@section('content')
<!-- 
<div class="container">
    <div class="spacedCards">
    @foreach ($books as $book)
      <div class="card" style="width: 18rem;">
        <img src="{{$book->pic}}" class="img-book" alt="book's pic">
        <div class="card-body">
            <h5 class="card-title">{{$book->title}}</h5>
            <p class="card-text">{{$book->summary}}</p>
        
        </div>
        <div class=" card-body align-middle spacedFav">
            <a href="/book/{{$book->id}}" class="text-decoration-none">See more</a>
        <i id ="{{$book->id}}" class="fas fa-heart toggleFavorite {{in_array($book->id, $favorites) ? 'isfavoriteButton ' : 'favoriteButton ' }}" ></i>
        </div>
      </div>
    @endforeach
    </div>
</div>
<div class="pageLinks">{{ $books->links() }}</div> -->
<!-- <div class="container">
<div class="row"> -->
<!-- <div class="col-md-9"> -->
    <div class="row">
    <div class="container">
    <div class="spacedCards" >
    @foreach ($books as $book)
      <div class="card" class="col-md-9" style="width: 18rem;">
        <img src="{{ URL::to('/images') }}/{{$book->pic}}" style="width:18rem;height:15rem;"class="img-book" alt="{{$book -> title}}'s pic">
        <div class="card-body">
            <h5 class="card-title"><a href="{{url('book').'/'.$book->id}}">{{$book -> title}}</a></h5>
            
            <h4 class="pull-right">${{$book -> price}}</h4>
            <h6 class="card-text">  author is {{$book -> author}}, book pages are {{$book -> page_count}}.</h6>
            <h6 class="card-text">{{mb_strimwidth($book->summary, 0, 10,"...")}}<a target="_blank" href="{{url('book').'/'.$book->id}}" class="text-decoration-none">See more</a></h6>

            <h6> available copies :{{$book -> no_copies}}</h6>
            <i id ="{{$book->id}}" class="fas fa-heart toggleFavorite {{in_array($book->id, $favorites) ? 'isfavoriteButton ' : 'favoriteButton ' }}" ></i>

        </div>
      </div>
    @endforeach
    </div>
    <div class="pageLinks" style="display:flex;justify-content:center;align-items:center;">  {{$books ->appends(Request::except('page'))-> links()}}</div>

    </div>

</div>
<!-- </div>
</div>
</div> -->
@endsection