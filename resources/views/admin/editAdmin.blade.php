@extends('layouts.master')

@section('title')
Dashboard
@endsection


@section('content')

<div id="editEmployeeModal">
    <div class="modal-dialog">
        <div class="modal-content">
            {{ Form::model($admin, ['route' => ['admins.update', $admin->id], 'method' => 'put']) }}
            <div class="modal-header">
                <h4 class="modal-title">Edit Admin</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Full Name</label>
                    {!! Form::text('name', $value = null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    <label>username</label>
                    {!! Form::text('username', $value = null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    <label>Email</label>
                    {!! Form::email('email', $value = null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    <label>Password</label>
                    {{ Form::password('password', ['class' => 'form-control','required']) }}
                </div>
                <div class="form-group">
                    <label>Address</label>
                    {!! Form::textarea('address', $value = null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    <label>Phone</label>
                    {!! Form::text('phone', $value = null, ['class' => 'form-control']) !!}
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