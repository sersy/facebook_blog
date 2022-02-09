@extends('layouts.app')
@section('content')


	@include('layouts._header')

	@include('layouts._topbar')


	{{--@include('layouts._feature-photo')--}}


	<section>
		<div class="gap gray-bg">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12">
						<div class="row" id="page-contents">

							@include('layouts._left-sidebar')
							<div class="col-lg-6">


								<div class="central-meta">
									<div class="frnds">
										<ul class="nav nav-tabs">
											<li class="nav-item"><a class="active" href="#frends" data-toggle="tab">My
													Friends</a> <span>{{ $friends->count() }}</span></li>
											<li class="nav-item"><a class="" href="#frends-req" data-toggle="tab">Friend
													Requests</a><span>{{ $friendRequest->count() }}</span></li>
											<li class="nav-item"><a class="" href="#blocked" data-toggle="tab">Blocked
													</a><span>{{ $blocked->count() }}</span></li>
										</ul>

										<!-- Tab panes -->
										<div class="tab-content">
											<div class="tab-pane active fade show" id="frends">
												@if (!$friends->count())
													<p>You have no friend</p>
												@else
													<ul class="nearby-contct">
														@foreach ($friends as $friend)
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

																		{{--<a href="#" title=""
																		   class="add-butn more-action" data-ripple="">unfriend</a>--}}

																		{{--<a href="#" title="" class="add-butn"
																		   data-ripple="">bock</a>--}}

																		<form class="d-inline-block float-right" action="{{ route('friend.delete',$friend->user_name) }}" method="post">
																			@csrf
																			<input type="submit" class="btn btn-primary btn-sm" value="Unfriend" style="margin-left: 5px;">
																		</form>

																			@if (Auth::user()->isBlockedFriend($friend))
																			<form class="d-inline-block float-right" action="{{ route('friend.unblock',$friend->user_name) }}" method="post">
																				@csrf
																				<input type="submit" class="btn btn-primary btn-sm" value="UnBlock">
																			</form>
																				@else
																			<form class="d-inline-block float-right" action="{{ route('friend.block',$friend->user_name) }}" method="post">
																				@csrf
																				<input type="submit" class="btn btn-primary btn-sm" value="Block">
																			</form>
																			@endif

																		
																		
																	</div>
																</div>
															</li>
														@endforeach

													</ul>
												@endif
												<div class="lodmore">
													<button class="btn-view btn-load-more"></button>
												</div>
											</div>
											<div class="tab-pane fade" id="frends-req">
												@if (!$friendRequest->count())
													<p>You have no friend request</p>
												@else
													<ul class="nearby-contct">
														@foreach ($friendRequest as $rq)
															<li>
																<div class="nearly-pepls">
																	<figure>
																		{{--<a href="time-line.html" title=""><img src="images/resources/friend-avatar9.jpg" alt=""></a>--}}
																		<a href="{{ route('profile.show',$rq->user_name) }}"
																		   title=""><img src="{{ $rq->getAvatarUrl() }}"
																						 alt=""></a>
																	</figure>
																	<div class="pepl-info">
																		<h4>
																			<a href="{{ route('profile.show',$rq->user_name) }}"
																			   title="">{{ $rq->user_name }}</a></h4>
																		@if ($rq->location)
																			<span>{{ $rq->location }}</span>
																		@endif

																		@if(Auth::user()->hasFriendRequestReceived($rq))

																			<form class="d-inline-block float-right" action="{{ route('friend.delete',$rq->user_name) }}" method="post">
																				@csrf
																				<input type="submit" class="btn btn-danger btn-sm" value="Delete Request">
																			</form>

																			<a href="{{ route('friend.accept',$rq->user_name) }}" title="" class="float-right btn btn-success btn-sm"
																			   data-ripple="" style="right: 5px;">Confirm</a>
																		@endif
																	</div>
																</div>
															</li>
														@endforeach

													</ul>
												@endif
												<button class="btn-view btn-load-more"></button>
											</div>

											<div class="tab-pane fade" id="blocked">
												@if (!$blocked->count())
													<p>You have no blocked account</p>
												@else
													<ul class="nearby-contct">
														@foreach ($blocked as $rq)
															<li>
																<div class="nearly-pepls">
																	<figure>
																		{{--<a href="time-line.html" title=""><img src="images/resources/friend-avatar9.jpg" alt=""></a>--}}
																		<a href="{{ route('profile.show',$rq->user_name) }}"
																		   title=""><img src="{{ $rq->getAvatarUrl() }}"
																						 alt=""></a>
																	</figure>
																	<div class="pepl-info">
																		<h4>
																			<a href="{{ route('profile.show',$rq->user_name) }}"
																			   title="">{{ $rq->user_name }}</a></h4>
																		@if ($rq->location)
																			<span>{{ $rq->location }}</span>
																		@endif

																		{{--<a href="#" title=""
																		   class="add-butn more-action" data-ripple="">Unblock
																			Request</a>--}}

																		<form class="d-inline-block float-right" action="{{ route('friend.unblock',$rq->user_name) }}" method="post">
																			@csrf
																			<input type="submit" class="btn btn-primary btn-sm" value="UnBlock">
																		</form>
																	</div>
																</div>
															</li>
														@endforeach

													</ul>
												@endif
												<button class="btn-view btn-load-more"></button>
											</div>
										</div>
									</div>
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