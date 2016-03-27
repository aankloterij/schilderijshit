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

  @if($errors->has('password'))
    <div class="error">
      {{ $errors->first('password') }}
    </div>
  @endif

@endsection

@section('form')
  <div class="center">
		<header>
			<h1>Welcome black!</h1>
		</header>

		<form action="{{ route('handleLogin') }}" method="POST">
			{!! csrf_field() !!}

			<input type="text" name="id" value="{{ old('id') }}" placeholder="Username or Email">

			<input type="password" name="password" placeholder="Password">

			<input type="checkbox" id="remember" name="remember">
			<label for="remember">Remember me</label>

			<input type="submit" value="Log in">
		</form>

		<footer>
			<a href="{{ route('register') }}">Register</a>
		</footer>
	</div>
@endsection
