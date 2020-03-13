@extends('layouts.master')

@section('title')
Dashboard
@endsection


@section('content')

<div id="editEmployeeModal">
    <div class="modal-dialog">
        <div class="modal-content">
            {{ Form::model($book, ['route' => ['books.update', $book->id], 'method' => 'put']) }}
            <div class="modal-header">
                <h4 class="modal-title">Edit Book</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Title</label>
                    {!! Form::text('title', $value = null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    <label>author</label>
                    {!! Form::text('author', $value = null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    <label>Category</label>
                    {!! Form::text('category_id', $value = null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    <label>Price</label>
                    {!! Form::text('price', $value = null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    <label>number of Copies</label>
                    {!! Form::text('no_copies', $value = null, ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="modal-footer">
                <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                <input type="submit" class="btn btn-success" value="Save">
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>

@endsection