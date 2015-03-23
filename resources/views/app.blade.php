<!DOCTYPE html>
<html lang="en" ng-app="mcUAP">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Laravel</title>

	<link href="{{ asset('/css/app.css') }}" rel="stylesheet">

	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

</head>
<body>
	@include('partials/navbar')
	@yield('content')

	<!-- Scripts -->
	<script src="/js/dependencies.min.js"></script>
	<script src="/js/app.min.js"></script>

</body>
</html>
