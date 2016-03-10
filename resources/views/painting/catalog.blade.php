@extends('layouts.dashboard')

@section('head')
	<link rel="stylesheet" href="{{ url('/css/search.css') }}">
	<script src="{{ url('/js/search.js') }}"></script>
	<title>Painting Catalog</title>
@endsection

@section('content')
		<div id="results">
			@foreach($paintings as $p)
				<a href="{{ url("/painting/$p->id") }}" class="card result">
					<div>
						<h1>{{ $p->naam }}</h1>
						<img src="{{ $p->image_location }}" alt="{{ $p->naam }}">
						<h2>{{ $p->artist }}</h2>
						<p>{{ $p->description }}</p>
						<span>${{ $p->retail }}</span>
						<small>{{ $p->year }}</small>
					</div>
				</a>
			@endforeach
		</div>
		<div class="card" id="paginate">
			{!! $paintings->render() !!}
		</div>
	  <a href="{{ url('/painting/new') }}" id="floating"></a>
@endsection

