@extends('layouts.dashboard')

@section('head')
	<link rel="stylesheet" href="{{ url('/css/search.css') }}">
	<script src="{{ url('/js/search.js') }}"></script>
	<title>Search paintings</title>
@endsection

@section('content')
		<form action="" class="card" id="searchform">
			<input type="text" name="naam" placeholder="Naam">
			<input type="text" name="artist" placeholder="Schilder">
			<input type="text" name="description" placeholder="Beschrijving">
			<input type="number" name="retail" placeholder="Retail">
			<input type="number" name="year" placeholder="Jaar">
			<input type="submit" value="Zoek">
		</form>
		<div id="results">
		</div>
		<div class="card" id="paginate">
			<a href="#" id="previous">&laquo; Previous</a>
			<span class="ruimte"></span>
			<a href="#" id="next">Next &raquo;</a>
		</div>
@endsection

