@extends('layouts.app')

@section('content')


	<div class="central-meta">
		<h2 class="resutl-found">You Search For <span>"{{ Request::input('find') }}"</span></h2>
		@if (!$users->count())
		    <p>No Results Found, Sorry.</p>
		@else
		<ul class="nearby-contct">
			@foreach ($users as $user)
				<li>
					<div class="nearly-pepls">
						<figure>
							<a href="{{ route('profile.show',$user->user_name) }}" title="">
								<img src="{{ $user->getAvatarUrl() }}" alt="">
								{{--<img src="{{ asset('winku/images/resources/nearly5.jpg')}}" alt="">--}}
							</a>
						</figure>
						<div class="pepl-info">
							<h4><a href="{{ route('profile.show',$user->user_name) }}" title="">{{ $user->user_name }}</a></h4>
							@if ($user->location)
								<span>{{ $user->location }}</span>
							@endif


							{{--<a href="#" title="" class="add-butn more-action" data-ripple="">Send Friend Request</a>
							<a href="#" title="" class="add-butn" data-ripple="">Unfriend</a>--}}
						</div>
					</div>
				</li>
			@endforeach
			{{--<li>
				<div class="nearly-pepls">
					<figure>
						<a href="time-line.html" title="">
							<img src="{{ asset('winku/images/resources/nearly1.jpg')}}" alt="">
						</a>
					</figure>
					<div class="pepl-info">
						<h4><a href="time-line.html" title="">sophia Gate</a></h4>
						<span>ftv model</span>
						<a href="#" title="" class="add-butn more-action" data-ripple="">delete Request</a>
						<a href="#" title="" class="add-butn" data-ripple="">Confirm</a>
					</div>
				</div>
			</li>
			<li>
				<div class="nearly-pepls">
					<figure>
						<a href="time-line.html" title=""><img src="{{ asset('winku/images/resources/nearly6.jpg')}}" alt=""></a>
					</figure>
					<div class="pepl-info">
						<h4><a href="time-line.html" title="">caty lasbo</a></h4>
						<span>ftv model</span>
						<a href="#" title="" class="add-butn more-action" data-ripple="">delete Request</a>
						<a href="#" title="" class="add-butn" data-ripple="">Confirm</a>
					</div>
				</div>
			</li>
			<li>
				<div class="nearly-pepls">
					<figure>
						<a href="time-line.html" title=""><img src="{{ asset('winku/images/resources/friend-avatar9.jpg')}}" alt=""></a>
					</figure>
					<div class="pepl-info">
						<h4><a href="time-line.html" title="">jhon kates</a></h4>
						<span>ftv model</span>
						<a href="#" title="" class="add-butn more-action" data-ripple="">delete Request</a>
						<a href="#" title="" class="add-butn" data-ripple="">Confirm</a>
					</div>
				</div>
			</li>
			<li>
				<div class="nearly-pepls">
					<figure>
						<a href="time-line.html" title=""><img src="{{ asset('winku/images/resources/nearly2.jpg')}}" alt=""></a>
					</figure>
					<div class="pepl-info">
						<h4><a href="time-line.html" title="">sara grey</a></h4>
						<span>ftv model</span>
						<a href="#" title="" class="add-butn more-action" data-ripple="">delete Request</a>
						<a href="#" title="" class="add-butn" data-ripple="">Confirm</a>
					</div>
				</div>
			</li>
			<li>
				<div class="nearly-pepls">
					<figure>
						<a href="time-line.html" title=""><img src="{{ asset('winku/images/resources/nearly4.jpg')}}" alt=""></a>
					</figure>
					<div class="pepl-info">
						<h4><a href="time-line.html" title="">Sara grey</a></h4>
						<span>ftv model</span>
						<a href="#" title="" class="add-butn more-action" data-ripple="">delete Request</a>
						<a href="#" title="" class="add-butn" data-ripple="">Confirm</a>
					</div>
				</div>
			</li>
			<li>
				<div class="nearly-pepls">
					<figure>
						<a href="time-line.html" title=""><img src="{{ asset('winku/images/resources/nearly3.jpg')}}" alt=""></a>
					</figure>
					<div class="pepl-info">
						<h4><a href="time-line.html" title="">Sexy cat</a></h4>
						<span>ftv model</span>
						<a href="#" title="" class="add-butn more-action" data-ripple="">delete Request</a>
						<a href="#" title="" class="add-butn" data-ripple="">Confirm</a>
					</div>
				</div>
			</li>
			<li>
				<div class="nearly-pepls">
					<figure>
						<a href="time-line.html" title=""><img src="{{ asset('winku/images/resources/friend-avatar9.jpg')}}" alt=""></a>
					</figure>
					<div class="pepl-info">
						<h4><a href="time-line.html" title="">jhon kates</a></h4>
						<span>ftv model</span>
						<a href="#" title="" class="add-butn more-action" data-ripple="">delete Request</a>
						<a href="#" title="" class="add-butn" data-ripple="">Confirm</a>
					</div>
				</div>
			</li>--}}
		</ul>
		<button class="btn-view btn-load-more"></button>
		@endif
	</div>



@stop