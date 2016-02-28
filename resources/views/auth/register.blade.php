@extends('layouts.auth')

@section('head')
  <title>Login - Art</title>
@endsection

@section('error')

  @if($errors->has('username'))
    <div class="error">
      {{ $errors->first('username') }}
    </div>
  @endif

  @if($errors->has('name'))
    <div class="error">
      {{ $errors->first('name') }}
    </div>
  @endif

  @if($errors->has('email'))
    <div class="error">
      {{ $errors->first('email') }}
    </div>
  @endif

  @if($errors->has('password'))
    <div class="error">
      {{ $errors->first('password') }}
    </div>
  @endif

  @if($errors->has('password_confirmation'))
    <div class="error">
      {{ $errors->first('password_confirmation') }}
    </div>
  @endif

@endsection

@section('form')
  <div class="center register">
		<header>
			<h1>Welcome!</h1>
		</header>

		<form action="" method="POST">
      {!! csrf_field() !!}

			<input type="text" value="{{ old('username') }}" name="username" placeholder="Username">

			<input type="text" value="{{ old('name') }}" name="name" placeholder="Name">

			<input type="email" value="{{ old('email') }}" name="email" placeholder="Email">

			<input type="password" name="password" placeholder="Password">
			<input type="password" name="password_confirmation" placeholder="Confirm password">

			<input type="submit" value="Register">
		</form>

		<footer>
			<a href="{{ url('/login') }}">Log in</a>
			<a href="{{ url('/password/reset') }}" class="right">Reset password</a>
		</footer>
	</div>
@endsection
