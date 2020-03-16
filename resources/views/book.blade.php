
@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Book Store</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#03a6f3">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:200,300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css" rel="stylesheet">
<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
<link rel="stylesheet" href="path/to/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
</head>
<style>
    .star-rating {
  line-height:32px;
  font-size:1.25em;
}

.star-rating .fa-star{color: yellow;}
</style>

<body>
  
    <section class="product-sec">
        <div class="container">
            
        @isset($book)
    
            <div class="row">
                <div class="col-md-6 slider-sec">
                    <!-- main slider carousel -->
                    <div id="myCarousel" class="carousel slide">
                        <!-- main slider carousel items -->
                        <div class="carousel-inner">
                            <div class="active item carousel-item" data-slide-number="0">
                                <img src="images/product1.jpg" class="img-fluid">
                            </div>
                        </div>
                    </div>
                    <!--/main slider carousel-->
                </div>
                <div class="col-md-6 slider-content">
                    <h1>{{$book->title}}</h1>
                     <p>{{$book->author}}</p>
                    <p></p>
                    <ul>
                        <li>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Review</label>
                          {!! Form::open(['route' => 'comments.store','method' => 'POST' , 'book_id' => $book->id]) !!}
                          <textarea class="form-control" id="exampleFormControlTextarea1" name='comment' rows="3" placeholder="add comment here"></textarea>
                          <button type='submit' class="btn">Comment</button>
                          <input type="hidden" name="book_id" value="{{$book->id}}">
                          {!! Form::close() !!}
                        </div>
                        </li>
                    </ul>
                    <div class="btn-sec">
                     <p>Rate : {{$book->rate}}</p>
                     <!-- Rate -->

                     <div class="container">
                                <div class="row">
                                    <div class="col-lg-12">
                                    <div class="star-rating">
                                        <span class="fa fa-star-o" data-rating="1"></span>
                                        <span class="fa fa-star-o" data-rating="2"></span>
                                        <span class="fa fa-star-o" data-rating="3"></span>
                                        <span class="fa fa-star-o" data-rating="4"></span>
                                        <span class="fa fa-star-o" data-rating="5"></span>
                                        <input type="hidden" name="whatever1" class="rating-value" value="2.56">
                                    </div>
                                    </div>
                                </div>

                     <!-- End Rate -->
                      <p>Avaliable Copies: {{$book->no_copies}}</p>
                      <a href="#leaseBook" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Lease</span></a>
                    </div>
                    
                </div>
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
        @endisset
        
        


        <!-- Comments -->
      
        <div class="row">
          <div class="col-md-6"></div>
                <div class="col-md-8">
                  <div class="comments">
                    <h1><small class="pull-right">45 comments</small> Comments </h1>
                  </div> 
                   <div class="comments-list">
                   @foreach ($comments as $comment)
                       <div class="media">
                            <a class="media-left" href="#">
                              <img src="http://lorempixel.com/40/40/people/1/">
                            </a>
                            <div class="media-body">    
                              <h4 class="media-heading user_name">User Name</h4>
                              <small class="pull-right">1h ago</small>
                              <p>{{$comment->content}}</p>
                              <p>{{$comment->rate}}</p>
                            </div>
                          </div>
                          @endforeach
                </div>
            </div>
           
        <!-- End Comments -->
    </section>

    <section class="related-books">
        <div class="container">
            <h2>You may also like these book</h2>
            <div class="recomended-sec">
                <div class="row">
                @foreach($related as $related)

                    <div class="col-lg-3 col-md-6">
                        <div class="item">
                            <img src="images/img1.jpg" alt="img">
                            <h3>{{$related->title}}</h3>
                            <h6><span class="price">{{$related->price}}</span> / <a href="#">Buy Now</a></h6>
                            <div class="hover">
                                <span><i class="fa fa-long-arrow-right" aria-hidden="true"></i></span>
                            </div>
                        </div>
                    </div>
                 @endforeach
                
                </div>
            </div>
        </div>
    </section>

   
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/owl.carousel.min.js"></script>
    <script src="js/custom.js"></script>
    <script src="js/rating.js"></script>
</body>

</html>

@endsection
