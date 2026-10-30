<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	@yield('metaTags')
</head>
<body>
	<header style="background: blue;">
		<p>header</p>
	</header>

	<main>
		@yield('content')
	</main>

	<footer style="background: red;">
		<p>footer</p>
	</footer>
</body>
</html>