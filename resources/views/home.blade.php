@extends('layouts.simple')

@section('head')
	<title>Home</title>
@endsection

@section('content')
	<h1><a href="{{ route('login') }}">Please click here to log in</a></h1>
@endsection
