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

      <input type="email" name="email" placeholder="Email" value="{{ $email or old('email') }}">

			<input type="submit" value="Reset">
		</form>

		<footer>
			<a href="{{ url('/login') }}">Login</a>
			<a href="{{ url('/register') }}" class="right">Register</a>
		</footer>
	</div>
@endsection
