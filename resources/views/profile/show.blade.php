@extends('layouts.app')
@section('content')


	@include('layouts._header')

	@include('layouts._topbar')


	{{--@include('layouts._feature-photo')--}}
	@include('layouts._feature-photo')


	<section>
		<div class="gap gray-bg">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12">
						<div class="row" id="page-contents">

							@include('layouts._time-line_left-sidebar')
							<div class="col-lg-6">


								<div class="central-meta">
									{{--{{ dd($profile->isBlockedFriend(auth()->user())) }}--}}
									@if ($profile->isBlockedFriend(auth()->user()))
										<p>sorry this user not found</p>

									@elseif (auth()->user()->isBlockedFriend($profile))
										<p>you are blocked {{ $profile->user_name }} to see all info about this user must be unblock first from friends page in blocked user section.  </p>
									@else
									@if (auth()->user()->id != $profile->id)
										{{--if the current user already send request to other user and this request still pending
										then check received user profile
										from the current user side it will be show this message--}}
										{{--auth user has request pending from current user--}}
										@if (Auth::user()->hasFriendRequestPending($profile))

											<p>Waiting for {{$profile->user_name}} to accept your request</p>

											{{-- if current auth user has received request from particular user like above user--}}
										@elseif(Auth::user()->hasFriendRequestReceived($profile))

											<p style="position: relative">
												<a href="{{ route('friend.accept',$profile->user_name) }}" class="add-butn more-action"  data-ripple="">Accept Friend Request</a></p>

											{{-- if  user is already friend with --}}
										@elseif(Auth::user()->isFriendWith($profile))

											<p>You and {{$profile->user_name}} are friend</p>

											{{--<p style="position: relative">
												<a href="#" style="right: 150px;" class="add-butn more-action" data-ripple="">Unfriend</a>
											</p>--}}
											<form class="form-inline d-inline" action="{{ route('friend.delete',$profile->user_name) }}" method="post">
												@csrf
												<input type="submit" class="btn btn-primary btn-sm" value="Unfriend">
											</form>
											@if (Auth::user()->isBlockedFriend($profile))
												<form class="form-inline d-inline" action="{{ route('friend.unblock',$profile->user_name) }}" method="post">
													@csrf
													<input type="submit" class="btn btn-primary btn-sm" value="UnBlock">
												</form>
												@else
												<form class="form-inline d-inline" action="{{ route('friend.block',$profile->user_name) }}" method="post">
													@csrf
													<input type="submit" class="btn btn-primary btn-sm" value="Block">
												</form>
												@endif


											{{--<p style="position: relative">
												<a href="#" title="" class="add-butn more-action" data-ripple="">Block</a>
											</p>--}}
											@else
											<p style="position: relative"><a href="{{ route('friend.add',$profile->user_name) }}" title="" class="add-butn more-action" style="" data-ripple="">Add as a friend</a></p>
										@endif
									@endif

									<div class="frnds" style="margin-top: 15px;">
										<ul class="nav nav-tabs">
											<li class="nav-item"><a class="active" href="#frends" data-toggle="tab">

													@if (auth()->user()->id == $profile->id)
														My Friends
													@else
														{{ $profile->user_name }} Friends
													@endif


												</a> <span>{{ $profile->friends()->where('blocked','false')->count() }}</span></li>

											<li class="nav-item"><a class="" href="#about" data-toggle="tab">About</a>
											</li>
										</ul>

										<!-- Tab panes -->
										<div class="tab-content">
											<div class="tab-pane active fade show" id="frends">



												@if (!$profile->friends()->count())
													<p>{{ $profile->user_name }} has no friend</p>
												@else
													<ul class="nearby-contct">
														@foreach ($profile->friends() as $friend)
															{{--{{ dd(auth()->user()->isBlockedFriend($friend)) }}--}}
															@if (!auth()->user()->isBlockedFriend($friend))
															<li>
																<div class="nearly-pepls">
																	<figure>
																		{{--<a href="time-line.html" title=""><img src="images/resources/friend-avatar9.jpg" alt=""></a>--}}
																		<a href="{{ route('profile.show',$friend->user_name) }}"
																		   title=""><img
																					src="{{ $friend->getAvatarUrl() }}"
																					alt=""></a>
																	</figure>
																	<div class="pepl-info">
																		<h4>
																			<a href="{{ route('profile.show',$friend->user_name) }}"
																			   title="">{{ $friend->user_name }}</a>
																		</h4>
																		@if ($friend->location)
																			<span>{{ $friend->location }}</span>
																		@endif

																		{{--@if ($user->id != auth()->user()->id)
																			<a href="#" title="" class="add-butn more-action" data-ripple="">add friend</a>
																		@endif--}}

																	</div>
																</div>
															</li>
															@endif
														@endforeach

													</ul>
												@endif
												<div class="lodmore">
													<button class="btn-view btn-load-more"></button>
												</div>
											</div>
											<div class="tab-pane fade" id="about">

												<div class="about" style="margin-top: 50px;">
													{{--{{ $user }}--}}
													{{--{{ $profile }}--}}
													<div class="personal">
														<h5 class="f-title"><i class="ti-info-alt"></i>
															@if (auth()->user()->id == $profile->id)
																{{ auth()->user()->user_name }}

															@else
																{{ $profile->user_name }}
															@endif
															Info</h5>

													</div>
													<div class="d-flex flex-row mt-2">
														<ul class="nav nav-tabs nav-tabs--vertical nav-tabs--left">
															<li class="nav-item">
																<a href="#basic" class="nav-link active"
																   data-toggle="tab">Basic info</a>
															</li>
														</ul>
														<div class="tab-content">
															<div class="tab-pane fade show active" id="basic">
																<ul class="basics">
																	<li><i class="ti-user"></i>{{ $profile->user_name }}
																	</li>
																	@if ($profile->location)
																		<li>
																			<i class="ti-map-alt"></i>{{ $profile->location }}
																		</li>
																	@endif

																	{{--<li><i class="ti-mobile"></i>{{ $user->user_name }}</li>--}}{{--
																	<li><i class="ti-email"></i><a href="https://wpkixx.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="3c4553494e515d55507c59515d5550125f5351">[email&nbsp;protected]</a></li>
																	--}}{{--<li><i class="ti-world"></i>www.yoursite.com</li>--}}
																</ul>
															</div>
														</div>
													</div>
												</div>
											</div>

										</div>
									</div>

									@endif
								</div>


							</div><!-- _central-meta -->
							@include('layouts._right-sidebar')
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

@stop