@extends('layouts.auth')

@section('head')
  <title>Reset password - Art</title>
@endsection

@section('form')
  <div class="center small">
		<header>
			<h1>Reset password</h1>
		</header>

		<form action="" method="POST">
      {!! csrf_field() !!}

      <input type="hidden" name="token" value="{{ $token }}">

      <input type="email" name="email" value="{{ $email or old('email') }}">

      <input type="password" name="password" placeholder="Password">
      <input type="password" name="password_confirm" placeholder="Confirm password">

			<input type="submit" value="Reset password">
		</form>

		<footer>
			<a href="{{ url('/login') }}">Login</a>
			<a href="{{ url('/register') }}" class="right">Register</a>
		</footer>
	</div>
@endsection
