@extends('layouts.dashboard')

@section('head')
	<link rel="stylesheet" href="{{ url('/css/search.css') }}">
	<script src="{{ url('/js/search.js') }}"></script>
	<title>Search paintings</title>
@endsection

@section('content')
		<form action="#" class="card" id="searchform">
			<input type="text" name="naam" placeholder="Naam">
			<input type="text" name="artist" placeholder="Schilder">
			<input type="text" name="description" placeholder="Beschrijving">
			<input type="text" name="retail" placeholder="Retail">
			<input type="text" name="year" placeholder="Jaar">
			<input type="submit" value="Zoek">
		</form>

		<div id="template_result" class="result card">
			<a id="result_link" href=""><h1 id="result_name"></h1></a>
			<img id="result_preview" src="">
			<h2 id="result_artist"></h2>
			<p id="result_description"></p>
			<span id="result_retail"></span>
			<small id="result_year"></small>
		</div>

		<div id="results">

			@foreach($paintings as $painting)

				<div class="result card">
					<a href="{{ route('singlePainting', $painting->id) }}"><h1>{{ $painting->naam }}</h1></a>
					<img src="{{ $painting->image_location }}" alt="{{ $painting->naam }}">
					<h2>{{ $painting->artist }}</h2>
					<p>{{ $painting->description }}</p>
					<span>{{ $painting->retail }}</span>
					<small>{{ $painting->year }}</small>
				</div>

			@endforeach
		</div>

		<div class="card" id="paginate">
			<a href="{{ $paintings->previousPageUrl() ?: '#' }}" id="prev">&laquo; Previous</a>
			<span class="ruimte"></span>
			<a href="{{ $paintings->nextPageUrl() ?: '#' }}" id="next">Next &raquo;</a>
		</div>
@endsection

