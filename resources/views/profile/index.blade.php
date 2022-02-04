@extends('layouts.time-line')
@section('content')

		<div class="central-meta">
			<div class="frnds">
				<ul class="nav nav-tabs">
					<li class="nav-item"><a class="active" href="#frends" data-toggle="tab">

							@if (auth()->user()->user_name == $authUser->user_name)
								My Friends
							@else
								{{ $user->user_name }} Friends
							@endif




						</a> <span>55</span></li>
					<li class="nav-item"><a class="" href="#about" data-toggle="tab">About</a></li>
				</ul>

				<!-- Tab panes -->
				<div class="tab-content">
					<div class="tab-pane active fade show" id="frends">


							@if (Auth::user()->hasFriendRequestPending($authUser))
								<p>Watting for {{$authUser->user_name}} to accept your request from show</p>

							@elseif(Auth::user()->hasFriendRequestReceived($authUser))
								<p>you and {{$authUser->user_name}} are friends</p>
							@endif
						
						
						@if (!$authUser->friends()->count())
						    <p>{{ $authUser->user_name }} has no friend</p>
						@else
						<ul class="nearby-contct">
							@foreach ($authUser->friends() as $user)
							<li>
								<div class="nearly-pepls">
									<figure>
										{{--<a href="time-line.html" title=""><img src="images/resources/friend-avatar9.jpg" alt=""></a>--}}
										<a href="{{ route('profile.show',$user->user_name) }}" title=""><img src="{{ $user->getAvatarUrl() }}" alt=""></a>
									</figure>
									<div class="pepl-info">
										<h4><a href="{{ route('profile.show',$user->user_name) }}" title="">{{ $user->user_name }}</a></h4>
										@if ($user->location)
											<span>{{ $user->location }}</span>
										@endif

										<a href="#" title="" class="add-butn more-action" data-ripple="">unfriend</a>
										<a href="#" title="" class="add-butn" data-ripple="">bock</a>
									</div>
								</div>
							</li>
							@endforeach

						</ul>
						@endif
						<div class="lodmore"><button class="btn-view btn-load-more"></button></div>
					</div>
					{{--<div class="tab-pane fade" id="about">

						<div class="about" style="margin-top: 50px;">

							<div class="personal">
								<h5 class="f-title"><i class="ti-info-alt"></i> {{ $authUser->user_name }} Info</h5>

							</div>
							<div class="d-flex flex-row mt-2">
								<ul class="nav nav-tabs nav-tabs--vertical nav-tabs--left">
									<li class="nav-item">
										<a href="#basic" class="nav-link active" data-toggle="tab">Basic info</a>
									</li>
								</ul>
								<div class="tab-content">
									<div class="tab-pane fade show active" id="basic">
										<ul class="basics">
											<li><i class="ti-user"></i>{{ $authUser->user_name }}</li>
											@if ($authUser->location)
												<li><i class="ti-map-alt"></i>{{ $authUser->location }}</li>
											@endif

											--}}{{--<li><i class="ti-mobile"></i>{{ $user->user_name }}</li>--}}{{--
											<li><i class="ti-email"></i><a href="https://wpkixx.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="3c4553494e515d55507c59515d5550125f5351">[email&nbsp;protected]</a></li>
											--}}{{--<li><i class="ti-world"></i>www.yoursite.com</li>--}}{{--
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
--}}
				</div>
			</div>
		</div>
@stop