<section>
	<div class="feature-photo">
		<figure><img src="{{ asset('winku/images/resources/timeline-1.jpg')}}" alt=""></figure>
		<div class="add-btn">




				@if (auth()->user()->id == $user->id)--}}
					My profile
				@else

					<span>1205 Friends</span>
					<a href="#" title="" data-ripple="">Add Friend</a>
				@endif
		</div>
		{{--<form class="edit-phto">
			<i class="fa fa-camera-retro"></i>
			<label class="fileContainer">
				Edit Cover Photo
				<input type="file">
			</label>
		</form>--}}
		{{ dd($user->id ."-".auth()->user()->id) }}
		<div class="container-fluid">
			<div class="row merged">
				<div class="col-lg-2 col-sm-3">
					<div class="user-avatar">
						<figure>
							<img src="{{ asset('winku/images/resources/user-avatar.jpg')}}" alt="">
							{{--@if (@auth()->user()->id != $user->id)--}}
							{{--<img src="{{ $user->getAvatarUrl() }}" alt="">--}}
							{{--@endif--}}
						</figure>
					</div>
				</div>
				<div class="col-lg-10 col-sm-9">
					<div class="timeline-info">
						<ul>
							{{--{{ $user->pivot->user_id }}
							{{ $user->friends() }}--}}
							{{ $user->user_name }}
							<li class="admin-name">
								@if (auth()->user()->id == $user->id)
								<h5>{{ auth()->user()->user_name }}</h5>
								{{--<span>Group Admin</span>--}}
									@else
									<h4>{{ $user->user_name }}</h4>
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
	</div>
</section>