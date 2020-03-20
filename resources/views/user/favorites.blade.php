@extends('layouts.userHome')
@section('content')

<div class="row">
    
    <div class="container">
    <div class="spacedCards">
    @foreach ($books as $book)
      <div class="card" class="col-md-9" style="width: 18rem;">
        <img src="{{ URL::to('/images') }}/{{$book->pic}}"  style="width: 18rem;height:15rem;"class="img-book" alt="{{$book -> title}}'s pic">
        <div class="card-body">
            <h5 class="card-title"><a href="{{url('book').'/'.$book->id}}">{{$book -> title}}</a></h5>
            <h6 class="card-text">  author is {{$book -> author}}, book pages are {{$book -> page_count}}.</h6>
            <h6 class="card-text">{{mb_strimwidth($book->summary, 0, 10,"...")}}<a target="_blank" href="{{url('book').'/'.$book->id}}" class="text-decoration-none">See more</a></h6>
            <div class=" card-body align-middle spacedFav">
            <a href="#" class="isfavoriteButton"><i class="fas fa-heart"></i></a>
            </div>
        </div>
      </div>
    @endforeach
    </div>
    <div class="pageLinks"style="display:flex;justify-content:center;align-items:center;">  {{$books ->appends(Request::except('page'))-> links()}}</div>

    </div>

</div>
@endsection