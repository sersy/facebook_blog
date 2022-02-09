<section>
	<div class="feature-photo">
		{{--{{ dd(auth()->user()->isBlockedFriend($profile)) }}--}}

		@if (!auth()->user()->isBlockedFriend($profile))
		<figure><img src="{{ asset('winku/images/resources/timeline-1.jpg')}}" alt=""></figure>
		<div class="add-btn">

				@if (auth()->user()->id == $profile->id)
				<span>{{ $profile->user_name }}</span>
				<span>{{ $profile->friends()->count() }} Friends</span>
				@else

					@if (Auth::user()->hasFriendRequestPending($profile))
					<a href="#" title="" data-ripple="" class="disabled">Waiting to accept your request</a>

					@elseif(Auth::user()->hasFriendRequestReceived($profile))

						<span>{{ $profile->friends()->count() }} Friends</span>

						<a href="{{ route('friend.accept',$profile->user_name) }}" title="" data-ripple="">Accept Friend Request</a>

					@elseif(Auth::user()->isFriendWith($profile))

						<span>{{ $profile->friends()->count() }} Friends</span>

						{{--<a href="#" title="" data-ripple="">Unfriend</a>--}}
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


					{{--<a href="#" title="" data-ripple=""></a>--}}


					@else
					<a href="{{ route('friend.add',$profile->user_name) }}" title="" class="" style="" data-ripple="">Add as a friend</a>
					@endif

				@endif
		</div>
		{{--<form class="edit-phto">
			<i class="fa fa-camera-retro"></i>
			<label class="fileContainer">
				Edit Cover Photo
				<input type="file">
			</label>
		</form>--}}
		{{--{{ dd($user->id ."-".auth()->user()->id) }}--}}
		<div class="container-fluid">
			<div class="row merged">
				<div class="col-lg-2 col-sm-3">
					<div class="user-avatar">
						<figure>
							{{----}}
							@if (auth()->user()->id == $profile->id)
								<img src="{{ $profile->getAvatarUrl() }}" alt="">
								@else
								<img src="{{ asset('winku/images/resources/user-avatar.jpg')}}" alt="">
							@endif
						</figure>
					</div>
				</div>
				<div class="col-lg-10 col-sm-9">
					<div class="timeline-info">
						<ul>
							{{--{{ $user->pivot->user_id }}
							{{ $user->friends() }}--}}
							{{--{{ $user->user_name }}--}}
							<li class="admin-name">
								@if (auth()->user()->id == $profile->id)
								<h5>{{ auth()->user()->user_name }}</h5>
								{{--<span>Group Admin</span>--}}
									@else
									<h4>{{ $profile->user_name }}</h4>
								@endif
							</li>
							<li>
								{{--<a class="active" href="time-line.html" title="" data-ripple="">time line</a>
								<a class="" href="timeline-photos.html" title="" data-ripple="">Photos</a>
								<a class="" href="timeline-videos.html" title="" data-ripple="">Videos</a>--}}
								{{--<a class="" href="timeline-friends.html" title="" data-ripple="">Friends</a>--}}
								{{--<a class="" href="timeline-groups.html" title="" data-ripple="">Groups</a>--}}
								{{--<a class="" href="about.html" title="" data-ripple="">about</a>--}}
								{{--<a class="" href="#" title="" data-ripple="">more</a>--}}
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		@endif
	</div>
</section>