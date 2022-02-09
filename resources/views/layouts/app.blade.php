<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content=""/>
	<meta name="keywords" content=""/>

	<title>{{ config('app.name', 'Laravel') }}</title>
	<link rel="icon" href="{{ asset('winku/images/fav.png') }}" type="image/png" sizes="16x16">

	<link rel="stylesheet" href="{{ asset('winku/css/main.min.css') }}">
	<link rel="stylesheet" href="{{ asset('winku/css/style.css') }}">
	<link rel="stylesheet" href="{{ asset('winku/css/color.css') }}">
	<link rel="stylesheet" href="{{ asset('winku/css/responsive.css') }}">

</head>
<body>
<!--<div class="se-pre-con"></div>-->
<div class="theme-layout">


	@yield('content')

	@include('layouts._footer')
</div>
<div class="side-panel d-none">
	<h4 class="panel-title">General Setting</h4>
	<form method="post">
		<div class="setting-row">
			<span>use night mode</span>
			<input type="checkbox" id="nightmode1"/>
			<label for="nightmode1" data-on-label="ON" data-off-label="OFF"></label>
		</div>
		<div class="setting-row">
			<span>Notifications</span>
			<input type="checkbox" id="switch22"/>
			<label for="switch22" data-on-label="ON" data-off-label="OFF"></label>
		</div>
		<div class="setting-row">
			<span>Notification sound</span>
			<input type="checkbox" id="switch33"/>
			<label for="switch33" data-on-label="ON" data-off-label="OFF"></label>
		</div>
		<div class="setting-row">
			<span>My profile</span>
			<input type="checkbox" id="switch44"/>
			<label for="switch44" data-on-label="ON" data-off-label="OFF"></label>
		</div>
		<div class="setting-row">
			<span>Show profile</span>
			<input type="checkbox" id="switch55"/>
			<label for="switch55" data-on-label="ON" data-off-label="OFF"></label>
		</div>
	</form>
	<h4 class="panel-title">Account Setting</h4>
	<form method="post">
		<div class="setting-row">
			<span>Sub users</span>
			<input type="checkbox" id="switch66"/>
			<label for="switch66" data-on-label="ON" data-off-label="OFF"></label>
		</div>
		<div class="setting-row">
			<span>personal account</span>
			<input type="checkbox" id="switch77"/>
			<label for="switch77" data-on-label="ON" data-off-label="OFF"></label>
		</div>
		<div class="setting-row">
			<span>Business account</span>
			<input type="checkbox" id="switch88"/>
			<label for="switch88" data-on-label="ON" data-off-label="OFF"></label>
		</div>
		<div class="setting-row">
			<span>Show me online</span>
			<input type="checkbox" id="switch99"/>
			<label for="switch99" data-on-label="ON" data-off-label="OFF"></label>
		</div>
		<div class="setting-row">
			<span>Delete history</span>
			<input type="checkbox" id="switch101"/>
			<label for="switch101" data-on-label="ON" data-off-label="OFF"></label>
		</div>
		<div class="setting-row">
			<span>Expose author name</span>
			<input type="checkbox" id="switch111"/>
			<label for="switch111" data-on-label="ON" data-off-label="OFF"></label>
		</div>
	</form>
</div><!-- side panel -->

<script src="{{ asset('winku/js/main.min.js') }}"></script>
<script src="{{ asset('winku/js/script.js') }}"></script>

</body>

</html>

{{--<!doctype html>--}}
{{--<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">--}}
{{--<head>--}}
{{--    <meta charset="utf-8">--}}
{{--    <meta name="viewport" content="width=device-width, initial-scale=1">--}}

{{--    <!-- CSRF Token -->--}}
{{--    <meta name="csrf-token" content="{{ csrf_token() }}">--}}

{{--    <title>{{ config('app.name', 'Laravel') }}</title>--}}

{{--    <!-- Scripts -->--}}
{{--    <script src="{{ asset('js/app.js') }}" defer></script>--}}

{{--    <!-- Fonts -->--}}
{{--    <link rel="dns-prefetch" href="//fonts.gstatic.com">--}}
{{--    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">--}}

{{--    <!-- Styles -->--}}
{{--    <link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}
{{--</head>--}}
{{--<body>--}}
{{--    <div id="app">--}}
{{--        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">--}}
{{--            <div class="container">--}}
{{--                <a class="navbar-brand" href="{{ url('/') }}">--}}
{{--                    {{ config('app.name', 'Laravel') }}--}}
{{--                </a>--}}
{{--                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">--}}
{{--                    <span class="navbar-toggler-icon"></span>--}}
{{--                </button>--}}

{{--                <div class="collapse navbar-collapse" id="navbarSupportedContent">--}}
{{--                    <!-- Left Side Of Navbar -->--}}
{{--                    <ul class="navbar-nav me-auto">--}}

{{--                    </ul>--}}

{{--                    <!-- Right Side Of Navbar -->--}}
{{--                    <ul class="navbar-nav ms-auto">--}}
{{--                        <!-- Authentication Links -->--}}
{{--                        @guest--}}
{{--                            @if (Route::has('login'))--}}
{{--                                <li class="nav-item">--}}
{{--                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>--}}
{{--                                </li>--}}
{{--                            @endif--}}

{{--                            @if (Route::has('register'))--}}
{{--                                <li class="nav-item">--}}
{{--                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>--}}
{{--                                </li>--}}
{{--                            @endif--}}
{{--                        @else--}}
{{--                            <li class="nav-item dropdown">--}}
{{--                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>--}}
{{--                                    {{ Auth::user()->name }}--}}
{{--                                </a>--}}

{{--                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">--}}
{{--                                    <a class="dropdown-item" href="{{ route('logout') }}"--}}
{{--                                       onclick="event.preventDefault();--}}
{{--                                                     document.getElementById('logout-form').submit();">--}}
{{--                                        {{ __('Logout') }}--}}
{{--                                    </a>--}}

{{--                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">--}}
{{--                                        @csrf--}}
{{--                                    </form>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                        @endguest--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </nav>--}}

{{--        <main class="py-4">--}}
{{--            @yield('content')--}}
{{--        </main>--}}
{{--    </div>--}}
{{--</body>--}}
{{--</html>--}}
