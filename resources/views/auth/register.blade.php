@extends('layouts.app')
@push('css-styles')
<link href="{{ asset('css/login.css') }}" rel="stylesheet">
@endpush
@section('content')
<div class="login-wrap">
    <div class="login-html">
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sign Up</label>
            <input id="tab-2" type="radio" name="tab" disabled class="for-pwd"><label for="tab-2" class="tab">Maktabty</label>
            <div class="login-form">
                <div class="sign-in-htm">
                    <div class="group">
                        <label for="name" class="label">Full Name</label>
                        <input id="name" name="name" type="text" class="input" required autocomplete="name" autofocus>
                        @error('name')
                        <div class="alert alert-danger">

                            <strong>{{ $message }}</strong>
                        </div>
                        @enderror
                    </div>
                    <div class="group">
                        <label for="username" class="label">Username</label>
                        <input id="username" name="username" type="text" class="input" required autocomplete="username">
                        @error('username')
                        <div class="alert alert-danger">
                            <strong>{{ $message }}</strong>
                        </div>
                        @enderror
                    </div>
                    <div class="group">
                        <label for="email" class="label">E-mail</label>
                        <input id="email" name="email" type="text" class="input" required autocomplete="email">
                        @error('email')
                        <div class="alert alert-danger">
                            <strong>{{ $message }}</strong>
                        </div>
                        @enderror
                    </div>
                    <div class="group">
                        <label for="phone" class="label">Phone</label>
                        <input id="phone" name="phone" type="text" class="input" required>
                        @error('phone')
                        <div class="alert alert-danger">
                            <strong>{{ $message }}</strong>
                        </div>
                        @enderror
                    </div>
                    <div class="group">
                        <label for="address" class="label">Address</label>
                        <input id="address" name="address" type="text" class="input" required autocomplete="address">
                        @error('address')
                        <div class="alert alert-danger">
                            <strong>{{ $message }}</strong>
                        </div>
                        @enderror
                    </div>
                    <div class="group">
                        <label for="password" class="label">Password</label>
                        <input id="password" name="password" type="password" class="input" data-type="password" required>
                        @error('password')
                        <div class="alert alert-danger">
                            <strong>{{ $message }}</strong>
                        </div>
                        @enderror
                    </div>
                    <div class="group">
                        <label for="password-confirm" class="label">Confirm Password</label>
                        <input id="password-confirm" name="password_confirmation" type="password" class="input" data-type="password" required>
                    </div>
                    <div class="group">
                        <input type="submit" class="button" value="Sign Up">
                    </div>
                    <div class="hr"></div>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection