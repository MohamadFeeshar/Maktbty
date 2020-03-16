@extends('layouts.user')
@section('content')
@foreach ($books as $book)
    <p>{{$book->title}}</p>
@endforeach
@endsection