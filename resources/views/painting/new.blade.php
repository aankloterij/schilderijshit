@extends('layouts.dashboard')

@section('head')
	<link rel="stylesheet" href="{{ url('/css/auth.css') }}">
	<title>Dashboard</title>
@endsection

@section('content')
	<div class="center big">
		<header>
			<h1>New painting</h1>
		</header>

		<form action="{{ url('/painting/new') }}" method="POST">
			{!! csrf_field() !!}

			<input type="text" name="naam" placeholder="Naam">

			<input type="text" name="artist" placeholder="Schilder">

			<input type="text" name="description" placeholder="Beschrijving">

			<input type="number" name="retail" placeholder="Retail">

			<input type="text" name="image_location" placeholder="URL">

			<input type="number" name="width" placeholder="Breedte">

			<input type="number" name="height" placeholder="Hoogte">

			<input type="number" name="year" placeholder="Jaar">

			<input type="submit" value="Add">
		</form>

		<footer>
			<a href="{{ url('/register') }}">Register</a>
			<a href="{{ url('/password/reset') }}" class="right">Forgot password</a>
		</footer>
	</div>
@endsection
