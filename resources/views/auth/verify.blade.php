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
<div class="theme-layout">
	<div class="container-fluid pdng0">
		<div class="row merged">
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="land-featurearea">
					<div class="land-meta">
						<h1>Winku</h1>
						<p>
							Winku is free to use for as long as you want with two active projects.
						</p>
						<div class="friend-logo">
							<span><img src="{{ asset('winku/images/wink.png') }}" alt=""></span>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="login-reg-bg">
					<div class="log-reg-area ">
						<h2 class="log-title">{{ __('Verify Your Email Address') }}</h2>
                            <div class="card">


                                <div class="card-body">
                                    @if (session('resent'))
                                        <div class="alert alert-success" role="alert">
                                            {{ __('A fresh verification link has been sent to your email address.') }}
                                        </div>
                                    @endif

                                    {{ __('Before proceeding, please check your email for a verification link.') }}
                                    {{ __('If you did not receive the email') }},
                                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                                        @csrf
                                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                                    </form>
                                </div>
                            </div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<script src="{{ asset('winku/js/main.min.js') }}"></script>
<script src="{{ asset('winku/js/script.js') }}"></script>

</body>

</html>