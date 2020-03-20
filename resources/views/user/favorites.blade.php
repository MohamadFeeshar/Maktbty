@extends('layouts.userHome')
@section('content')
<div class="container">
    <div class="spacedCards">
    @foreach ($books as $book)
      <div class="card" style="width: 18rem;">
        <img src="{{ URL::to('/images') }}/{{$book->pic}}" class="img-book" alt="book's pic">
        <div class="card-body">
            <h5 class="card-title">{{$book->title}}</h5>
            <p class="card-text">{{$book->summary}}</p>
            
        </div>
        <div class=" card-body align-middle spacedFav">
            <a href="/book/{{$book->id}}" class="text-decoration-none">See more</a>
            <a href="#" class="isfavoriteButton"><i class="fas fa-heart"></i></a>
        </div>
      </div>
    @endforeach
    </div>
</div>
<div class="pageLinks">{{ $books->links() }}</div>

@endsection