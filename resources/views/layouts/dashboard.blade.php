<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="{{ url('css/dashboard.css') }}">
	<script>var base = '{{ url('/') }}'</script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<script src="{{ url('js/dashboard.js') }}"></script>
	@yield('head')
</head>
<body>
	<header class="main">
		<div class="icon" id="menu_main"></div>
		<h1>Dashboard</h1>
		<div class="icon" id="options"></div>
		<a class="icon" href="{{ route('logout') }}" id="logout"></a>
		<form action="{{ url('/painting/search/quick') }}" method="GET">
			<input type="hidden" name="ref" value="true">
			<input type="text" name="naam" id="searchbar" class="hidden" placeholder="Search">
		</form>
		<div class="icon" id="search"></div>
	</header>

	<aside class="main hidden">
		<header>
			<img src="{{ url('img/avatar.png') }}">
			<h2>{{ Auth::user()->name }}</h2>
		</header>
		<ul>
			<li>
				<a class="dashboard" href="{{ url('/dashboard') }}">
					Dashboard
				</a>
			</li>
			<li>
				<a class="search" href="{{ url('/painting/search') }}">
					Search
				</a>
			</li>
			<li>
				<a class="catalog" href="{{ url('/painting/catalog') }}">
					Catalog
				</a>
			</li>
			<li class="div"></li>
			<li>
				<a class="logout" href="{{ route('logout') }}">
					Log out
				</a>
			</li>
		</ul>
	</aside>

	<div id="content">
    @yield('content')
	</div>
</body>
</html>
