@extends('layouts.userHome')
@section('content')

@section('searchOrder')
<li class="navbar-brand">
    <span class="nav-link"  style="color:white;">Order By <span class="sr-only">(current)</span></span>

</li>
<li class="navbar-brand">

    <form action="home" method="GET" >
        {{csrf_field()}}
        <div class="input-group">
            <button type="submit" name="order" class="btn btn-secondary"value="created_at">Latest</button>
            <span class="sr-only">(current)</span>

            <button class="btn btn-secondary" name="order" type="submit" value="price">Price</button>
            <span class="sr-only">(current)</span>
            <input type="search" class="form-control mr-sm-2" name="searchTerm" placeholder="Search by author or title for..." value="{{ isset($searchTerm) ? $searchTerm : '' }}">
        </div>
    </form>
</li>
@endsection
<!-- <div class="container">
<div class="row"> -->

<!-- <div class="col-md-2"> -->
<!-- <p class="lead">Category</p> -->
<!-- <div class="list-group"> -->
<!-- @foreach($list_category as $category)   -->
<!-- <a href="/category/{{$category->id}}" class="list-group-item">{{ $category->name }}</a> -->
<!-- -->
<!-- <form action="{{ route('category') }}" method="GET">
            {{csrf_field()}}
                 <div class="input-group">
                    <input type="hidden" class="form-control" name="categoryTerm"value="{{ isset($category->id) ? $category->id : '' }}">
                     <span class="input-group-btn">
                            <button class="btn btn-secondary" style="width:150px;" type="submit">{{ $category->name }}</button>
                    </span>
                 </div>
            </form> -->
<!-- -->
<!-- @endforeach -->
<!-- </div> -->
<!-- </div> -->

<!-- <div class="col-md-9"> -->
<div class="row">
    <div class="container">

        <div class="spacedCards">
            @error('favouriteTerm')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            @foreach ($book_data as $book)
            <div class="card" class="col-md-9" style="width: 18rem;">
                <img src="{{ URL::to('/images') }}/{{$book->pic}}" style="width:18rem;height:15rem;" class="img-book" alt="{{$book -> title}}'s pic">
                <div class="card-body">
                    <h5 class="card-title"><a href="{{url('book').'/'.$book->id}}">{{$book -> title}}</a></h5>

                    <h4 class="pull-right">${{$book -> price}}</h4>
                    <p class="bookCardText">  Author: {{$book -> author}}</p>
                    <p class="bookCardText"> Book pages: {{$book -> page_count}}.</p>
                    <p class="bookCardText">{{mb_strimwidth($book->summary, 0, 10,"...")}}<a target="_blank" href="{{url('book').'/'.$book->id}}" class="text-decoration-none">See more</a></p>

                    <p class="bookCardText"> available copies :{{$book -> no_copies}}</p>
                    
                    <div style="font-size: 1.3em">
                        @for ($i = 0; $i < 5; $i++)
                            @if($i < $book->rate)
                                <span id="rate-{{$i}}" class="rated">☆</span>
                            @else
                                <span id="rate-{{$i}}" >☆</span>
                            @endif
                        @endfor
                      </div>
                    <!-- Favorite button -->
                    <i id="{{$book->id}}" class="toggleFavorite {{in_array($book->id, $favorites) ? 'isfavoriteButton' : 'favoriteButton'}} fas fa-heart"></i>
                    <!-- </div> -->
                    @can('canLease',$book)
                      <a @if ($book->no_copies > 0)href="#leaseBook" @endif  class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Lease</span></a>
                      @endcan    
                      {!! Form::open(['route' => ['Books.returnBack',$book->id],'method' => 'POST']) !!}
                      @can('canReturn',$book)
                      <button type='submit' class='btn btn-primary'>Return Back</button>
                      @endcan
                      {!! Form::close() !!}
                      
                      <div id="leaseBook" class="modal fade">
                        <div class="modal-content">
                            {!! Form::open(['route' => 'lease.store','method' => 'POST','book_id' => $book->id]) !!}
                            <div class="modal-body">
                                <div class="form-group">
                                <label>Duration in Days</label>
                                <input name="duration" type="text" class="form-control" required>
                                </div>
                                <div class="modal-footer">
                                <input type="submit" class="btn btn-success" value="Add">
                                <input type="hidden" name="book_id" value="{{$book->id}}">
                                </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
</div>
<div class="pageLinks" style="display:flex;justify-content:center;align-items:center;"> {{$book_data ->appends(Request::except('page'))-> links()}}</div>

</div>

</div>
<!-- </div> -->
<!-- </div>
</div> -->


@endsection