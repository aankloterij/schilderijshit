@extends('layouts.dashboard')

@section('head')
	<link rel="stylesheet" href="{{ url('/css/auth.css') }}">
	<style>
		div.half-wrap{
			margin: 25px auto;
			display: block;
			width: 90%;
		}

		div.center input.half{
			width: 45%;
			margin: 0;
			display: inline-block;
		}

		div.center input.half:nth-child(even){
			float: right;
		}

	</style>
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

			<div class="half-wrap">
				<input type="number" class="half" name="width" placeholder="Breedte">

				<input type="number" class="half" name="height" placeholder="Hoogte">
			</div>

			<input type="number" name="year" placeholder="Jaar">

			<input type="submit" value="Add">
		</form>

		<footer>
			<a href="{{ url('/register') }}">Register</a>
			<a href="{{ url('/password/reset') }}" class="right">Forgot password</a>
		</footer>
	</div>
@endsection
