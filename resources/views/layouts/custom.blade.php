<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://kit.fontawesome.com/e4ff20d8c9.js" crossorigin="anonymous"></script>
    <script src="{{asset('js/jquery-3.5.1.min.js')}}"></script>
    <script src="{{ url('/static/js/admin.js?v='.time()) }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="{{ url('/static/libs/ckeditor/ckeditor.js') }}"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="/static/css/master.css">
</head>
<body>
    <div class="d-flex flex-column h-screen justify-content-between">
		<header>	
			@include('partials.nav')
			@include('partials.session')
		</header>
		<main class="py-4">
			@yield('content')
		</main>
		<footer class="bg-light text-center text-black-50 py-3 shadow">
			{{ config('app.name') }} | Copyright @ 2020
		</footer>
	</div>
</body>
</html>
