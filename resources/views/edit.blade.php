@extends('layouts.app')

@section('content')
<h2>Edit Comment</h2>
{!! Form::open(['action'=> ['CommentController@update',$comment->id],'method'=>'POST']) !!}
<div>
    {{!! Form::label('comment','Comment') !!}}
    {{!! Form::textarea('comment',$comment->content) !!}}
</div>
    {{!! Form::hidden('_method','PUT')!!}}
    {{!! Form::submit('Submit',['class'=>'btn btn-primary'])}}
{!! Form::close() !!}
@endsection