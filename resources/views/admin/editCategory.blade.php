@extends('layouts.master')

@section('title')
Dashboard
@endsection


@section('content')

<div id="editEmployeeModal">
    <div class="modal-dialog">
        <div class="modal-content">
            {{ Form::model($category, ['route' => ['categories.update', $category->id], 'method' => 'put']) }}
            <div class="modal-header">
                <h4 class="modal-title">Edit Category</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Name</label>
                    {!! Form::text('name', $value = null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    <label>Description</label>
                    {!! Form::text('desc', $value = null, ['class' => 'form-control']) !!}
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