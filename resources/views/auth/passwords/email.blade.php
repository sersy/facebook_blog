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
						<h2 class="log-title">{{ __('Reset Password') }}</h2>
						<div class="card">

							<div class="card-body">
								@if (session('status'))
									<div class="alert alert-success" role="alert">
										{{ session('status') }}
									</div>
								@endif

								<form method="POST" action="{{ route('password.email') }}">
									@csrf

									<div class="row mb-3">
										<label for="email"
											   class="col-md-4 col-form-label text-md-end">{{ __('Email') }}</label>

										<div class="col-md-6">
											<input id="email" type="email"
												   class="form-control @error('email') is-invalid @enderror"
												   name="email" value="{{ old('email') }}" required autocomplete="email"
												   autofocus>

											@error('email')
											<span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
											@enderror
										</div>
									</div>

									<div class="row mb-0">
										<div class="col-md-6 offset-md-4">
											<button type="submit" class="btn btn-primary">
												{{ __('Send Password Reset Link') }}
											</button>
										</div>
									</div>
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
