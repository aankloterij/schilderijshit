@extends('layouts.dashboard')

@section('head')
	<title>Dashboard</title>
@endsection

@section('content')
  <h1>Dashboard</h1>
  <a href="{{ url('/painting/new') }}" id="floating"></a>
@endsection
