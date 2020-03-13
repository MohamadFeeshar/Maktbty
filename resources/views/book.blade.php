
@extends('layouts.app')

@section('content')
<div class="containers">
    <div class="card mb-3" style="max-width: 540px;">
       <div class="row no-gutters">
         <div class="col-md-4">
           <img src="HarryPotter.jpg" class="card-img" alt="...">
         </div>
         <div class="col-md-8">
           <div class="card-body">
             <h3 class="card-title">Book title</h3>
             <div class="container">
                <span id="rateMe2"  class="empty-stars"></span>
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
               <span class="fa fa-star checked"></span>
               <span class="fa fa-star checked"></span> 
               <span class="fa fa-star checked"></span> 
               <span class="fa fa-star"></span>
               <span class="fa fa-star"></span>
             </div>
             <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
             <button type="button" class="btn btn-success">Lease</button> 
           </div>  
         </div>
       </div>
       {!! Form::textarea('Comment',null, array('class'=>'form-control', 
                       'rows' => 5, 'cols' => 30)) !!}
       <button type="button" class="btn btn-primary btn-lg btn-block">Comment</button>            
     </div> 
     <div class="card-header">Comments</div>
     <div class="card bg-light mb-3" style="width: 100%;">
       <div class="card-body">
         <h5 class="card-title">Name</h5>
         <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
       </div>
     </div>
     <div class="card bg-light mb-3" style="width: 100%;">
       <div class="card-body">
         <h5 class="card-title">Name2</h5>
         <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
       </div>
     </div>
     <div class="imagesContainer" >
        <h3>Related Books</h3>
     <div class="slide-img">
       <img src="iti.jpeg">
       <p style="font-weight: bold;">Book Title</p>
       <p>Book1</p>
   </div>
   <div class="slide-img">
       <img src="iti.jpeg">
       <p style="font-weight: bold;">Book Title</p>
       <p>Book2</p>
   </div>
   <div class="slide-img">
       <img src="iti.jpeg">
       <p style="font-weight: bold;">Book Title</p>
       <p>Book3</p>
   </div>
   <div class="slide-img">
    <img src="iti.jpeg">
    <p style="font-weight: bold;">Book Title</p>
    <p>Book4</p>
    </div>
    <div class="slide-img">
    <img src="iti.jpeg">
    <p style="font-weight: bold;">Book Title</p>
    <p>Book5</p>
    </div>
   </div>
   </div>
   
@endsection
