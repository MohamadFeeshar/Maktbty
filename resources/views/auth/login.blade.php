<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
	<link href="{{ asset('css/login.css') }}" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
	<style>
            .full-height {
                height: 100vh;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
</head>

<body>
	<div class="flex-center position-ref full-height">
		@if (Route::has('login'))
		<div class="top-right links">
			@auth
			<a href="{{ url('/home') }}">Home</a>
			@else
			<a href="{{ route('login') }}">Login</a>

			@if (Route::has('register'))
			<a href="{{ route('register') }}">Register</a>
			@endif
			@endauth
		</div>
		@endif
		<main class="py-4">
			<div class="login-wrap">
				<div class="login-html">
					@if (session('message'))
					<div class="alert alert-danger">{{ session('message') }}</div>
					@endif
					<form method="POST" action="{{ route('login') }}">
						@csrf
						<input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sign In</label>
						<input id="tab-2" type="radio" name="tab" disabled class="for-pwd"><label for="tab-2" class="tab">Maktabty</label>
						<div class="login-form">
							<div class="sign-in-htm">
								@error('username')
								<div class="alert alert-danger">
									<strong>{{ $message }}</strong>
								</div>
								@enderror
								<div class="group">
									<label for="username" class="label">Username</label>
									<input id="username" name="username" type="text" class="input" required autofocus>

								</div>
								<div class="group">
									<label for="password" class="label">Password</label>
									<input id="password" name="password" type="password" class="input" data-type="password" required>
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
		</main>
</body>

</html>
@push('css-styles')
@endpush
@section('content')


@endsection