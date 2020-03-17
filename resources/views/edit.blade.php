@extends('layouts.app')

@section('content')
<h2>Edit Comment</h2>
{!! Form::open(['route'=> ['comments.update',$comment->id],'method'=>'POST']) !!}
<div>
    {!! Form::textarea('comment',$comment->content) !!}
</div>
    {!! Form::hidden('_method','PUT')!!}
    {!! Form::hidden('book_id','{{$book->id}}')!!}
    {!! Form::submit('Submit',['class'=>'btn btn-primary'])!!}
{!! Form::close() !!}
@endsection


<h1></h1>

