@extends('layouts.dashboard')

@section('head')
	<link rel="stylesheet" href="{{ url('/css/auth.css') }}">
	<title>Dashboard</title>
@endsection

@section('content')
	<form action="/painting/new" method="POST">
		{!! csrf_field() !!}
		<input type="text" name="naam" placeholder="Naam">
		<input type="text" name="artist" placeholder="Schilder">
		<input type="text" name="description" placeholder="Beschrijving">
		<input type="number" name="retail" placeholder="Retail">
		<input type="text" name="image_location" placeholder="URL">
		<input type="number" name="width" placeholder="Breedte">
		<input type="number" name="height" placeholder="Hoogte">
		<input type="number" name="painted_at" placeholder="Jaar">
	</form>
@endsection
