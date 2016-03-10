@extends('layouts.dashboard')

@section('head')
	<link rel="stylesheet" href="{{ url('/css/search.css') }}">
	<title>{{ $painting->naam }} by {{ $painting->artist }}</title>
@endsection

@section('content')
	<div class="card big">
		<a href="{{ $painting->image_location }}">
			<img src="{{ $painting->image_location }}" alt="{{ $painting->naam }}">
			<h1>{{ $painting->naam }}</h1>
			<h2>{{ $painting->artist }}</h2>
		</a>
		<p>{{ $painting->description }}</p>
		<span>Retail: ${{ $painting->retail }}</span>
		<small>Year: {{ $painting->year }}</small>
	</div>
@endsection
