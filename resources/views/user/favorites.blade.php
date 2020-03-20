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
            <h4 class="pull-right">${{$book -> price}}</h4>
            <p class="bookCardText">  Author: {{$book -> author}}</p>
            <p class="bookCardText"> Book pages: {{$book -> page_count}}.</p>
            <p class="bookCardText">{{mb_strimwidth($book->summary, 0, 10,"...")}}<a target="_blank" href="{{url('book').'/'.$book->id}}" class="text-decoration-none">See more</a></p>

            <p class="bookCardText"> available copies :{{$book -> no_copies}}</p>
            <div class=" card-body align-middle spacedFav">
              <div style="font-size: 1.3em">
                @for ($i = 0; $i < 5; $i++)
                    @if($i < $book->rate)
                        <span id="rate-{{$i}}" class="rated">☆</span>
                    @else
                        <span id="rate-{{$i}}" >☆</span>
                    @endif
                @endfor
              </div>
            <i id="{{$book->id}}" class="fas fa-heart toggleFavorite isfavoriteButton"></i>
            </div>
        </div>
      </div>
    @endforeach
    </div>
    <div class="pageLinks"style="display:flex;justify-content:center;align-items:center;">  {{$books ->appends(Request::except('page'))-> links()}}</div>

    </div>

</div>
@endsection