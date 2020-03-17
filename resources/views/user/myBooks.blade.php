@extends('layouts.nav')
@section('content')
<section class="static about-sec">
    <div class="container">
        <div class="recomended-sec">
        <div class="row" id="bookItem">
        @foreach ($books as $book)

            <div class="col-lg-3 col-md-6">

                <div class="item" >
                <img src="{{ URL::to('/images') }}/{{$book->pic}}" alt="{{$book -> title}}">

                    <!-- <img src="images/img1.jpg" alt="img"> -->
                    <h3>{{$book->title}}</h3>
                    <h3>{{$book->summary}},author is{{$book->author}},pages number are{{$book->page_count}}</h3>
                    <h6><span class="price">{{$book->price}}$</span></h6>
                    <h3>Availble copies : {{$book->no_copies}}</h3>

                    <div class="hover">
                        <a href="{{url('book').'/'.$book->id}}">
                    <span>
                        <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                        </span>
                    </a>
                    </div>
                </div>
            </div>     
            @endforeach
     
        </div>
        </div>
        </div>
    </section>  

@endsection