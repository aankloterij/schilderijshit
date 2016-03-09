@extends('layouts.dashboard')

@section('head')
	<link rel="stylesheet" href="{{ url('/css/error.css') }}">
	<title>{{ $status ? 'Error - ' . $status : 'Error' }}</title>
@endsection

@section('content')
	<div class="error">
		<h1>{{ $status or 'Error' }}</h1>
		<p>{!! $message !!}</p>
	</div>
  <a href="{{ url('/painting/new') }}" id="floating"></a>
@endsection
