@extends('layouts.auth')

@section('head')
  <title>Login - Art</title>
@endsection

@section('error')

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

@endsection

@section('form')
  <div class="center">
		<header>
			<h1>Welcome back!</h1>
		</header>

		<form action="" method="POST">
      {!! csrf_field() !!}

			<input type="email" name="email" value="{{ old('email') }}" placeholder="Email">

			<input type="password" name="password" placeholder="Password">

			<input type="checkbox" id="remember" name="remember">
			<label for="remember">Remember me</label>

			<input type="submit" value="Log in">
		</form>

		<footer>
			<a href="{{ url('/register') }}">Register</a>
			<a href="{{ url('/password/reset') }}" class="right">Forgot password</a>
		</footer>
	</div>
@endsection
