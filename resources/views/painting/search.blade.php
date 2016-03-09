@extends('layouts.dashboard')

@section('head')
	<link rel="stylesheet" href="{{ url('/css/search.css') }}">
	<script src="{{ url('/js/search.js') }}"></script>
	<title>Search paintings</title>
@endsection

@section('content')
	@if(!$ref)
		<form action="" id="searchform">
			<input type="text" name="naam" placeholder="Naam">
			<input type="text" name="artist" placeholder="Schilder">
			<input type="text" name="description" placeholder="Beschrijving">
			<input type="number" name="retail" placeholder="Retail">
			<input type="number" name="year" placeholder="Jaar">
			<input type="submit" value="Zoek">
		</form>
	@endif
@endsection

