

@extends('layouts.app')
@push('css-styles')
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">
@endpush
@section('content')

  <div class="login-wrap">
	<div class="login-html">
        @if (session('message'))
            <div class="alert alert-danger">{{ session('message') }}</div>
        @endif
        <form method="POST" action="{{ route('login') }}">
            @csrf
		<input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sign In</label>
		<input id="tab-2" type="radio" name="tab" class="for-pwd"><label for="tab-2" class="tab">Forgot Password</label>
		<div class="login-form">
			<div class="sign-in-htm">
				<div class="group">
					<label for="username" class="label">Username</label>
					<input id="username" name="username" type="text" class="input" autofocus>
				</div>
				<div class="group">
					<label for="password" class="label">Password</label>
					<input id="password" name="password" type="password" class="input" data-type="password" required>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
				<div class="group">
                    <input type="submit" class="button" value="Sign In">
				</div>
				<div class="hr"></div>
			</div>
			<div class="for-pwd-htm">
				<div class="group">
					<label for="user" class="label">Username or Email</label>
					<input id="user" type="text" class="input">
				</div>
				<div class="group">
					<input type="submit" class="button" value="Reset Password">
				</div>
				<div class="hr"></div>
			</div>
        </div>
        </form>
	</div>
</div>

@endsection



