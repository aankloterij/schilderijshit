<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="{{ url('css/dashboard.css') }}">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<script src="{{ url('js/dashboard.js') }}"></script>
	<title>Dashboard</title>
</head>
<body>
	<header class="main">
		<div class="icon" id="menu_main"></div>
		<h1>Dashboard</h1>
		<div class="icon" id="options"></div>
		<div class="icon" id="profile"></div>
		<input type="text" name="title" id="searchbar" class="hidden" placeholder="Search">
		<div class="icon" id="search"></div>
	</header>

	<aside class="main hidden">
		<header>
			<img src="img/avatar.png">
			<h2>{{ Auth::user()->name }}</h2>
		</header>
		<ul>
			<li>
				<a class="dashboard" href="{{ url('/dashboard') }}">
					Dashboard
				</a>
			</li>
			<li>
				<a class="search" href="#">
					Search
				</a>
			</li>
			<li>
				<a class="profile" href="#">
					Profile
				</a>
			</li>
			<li class="div"></li>
			<li>
				<a class="logout" href="{{ url('/logout') }}">
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
