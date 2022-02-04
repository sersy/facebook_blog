@extends('layouts.time-line')
@section('content')

	<div class="central-meta">
		<div class="frnds">
			<ul class="nav nav-tabs">
				<li class="nav-item"><a class="active" href="#frends" data-toggle="tab">My Friends</a> <span>{{ $friends->count() }}</span></li>
				<li class="nav-item"><a class="" href="#frends-req" data-toggle="tab">Friend Requests</a><span>{{ $friendRequest->count() }}</span></li>
			</ul>

			<!-- Tab panes -->
			<div class="tab-content">
				<div class="tab-pane active fade show" id="frends">
					@if (!$friends->count())
						<p>You have  no friend</p>
					@else
						<ul class="nearby-contct">
							@foreach ($friends as $friend)
								<li>
									<div class="nearly-pepls">
										<figure>
											{{--<a href="time-line.html" title=""><img src="images/resources/friend-avatar9.jpg" alt=""></a>--}}
											<a href="{{ route('profile.show',$friend->user_name) }}" title=""><img src="{{ $friend->getAvatarUrl() }}" alt=""></a>
										</figure>
										<div class="pepl-info">
											<h4><a href="{{ route('profile.show',$friend->user_name) }}" title="">{{ $friend->user_name }}</a></h4>
											@if ($friend->location)
												<span>{{ $friend->location }}</span>
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
				<div class="tab-pane fade" id="frends-req">
					@if (!$friendRequest->count())
						<p>You have  no friend request</p>
					@else
						<ul class="nearby-contct">
							@foreach ($friendRequest as $rq)
								<li>
									<div class="nearly-pepls">
										<figure>
											{{--<a href="time-line.html" title=""><img src="images/resources/friend-avatar9.jpg" alt=""></a>--}}
											<a href="{{ route('profile.show',$rq->user_name) }}" title=""><img src="{{ $rq->getAvatarUrl() }}" alt=""></a>
										</figure>
										<div class="pepl-info">
											<h4><a href="{{ route('profile.show',$rq->user_name) }}" title="">{{ $rq->user_name }}</a></h4>
											@if ($rq->location)
												<span>{{ $rq->location }}</span>
											@endif

											<a href="#" title="" class="add-butn more-action" data-ripple="">delete Request</a>
											@if(Auth::user()->hasFriendRequestReceived($rq))
											<a href="#" title="" class="add-butn" data-ripple="">Confirm</a>
											@endif
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
@stop