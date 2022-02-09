
<div class="col-lg-3">
	<aside class="sidebar static">

		<div class="widget ">
			<h4 class="widget-title">Shortcuts</h4>

			<ul class="naves">
				<li>
					<i class="ti-user"></i><a href="{{ route('profile.show',auth()->user()->user_name) }}" title="">
					{{ __('Welcome') }} {{ auth()->user()->user_name }}</a>
				</li>
				<li>
					<i class="ti-home"></i>
					<a href="{{ route('home') }}" title="">{{ __('Home') }}</a>
				</li>

				<li>
					<i class="ti-user"></i>
					<a href="{{ route('friend.index') }}" title="">friends</a>
				</li>

				<li>
					<i class="ti-power-off"></i>
					<a  href="{{ route('logout') }}"
					   onclick="event.preventDefault();
									 document.getElementById('logout-form').submit();">
						{{ __('Logout') }}
					</a>

					<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
						@csrf
					</form>
				</li>
			</ul>

		</div><!-- Shortcuts -->



		@if ( auth()->user()->id == $profile->id)
			<div class="widget stick-widget">
				<h4 class="widget-title">Edit info</h4>
				<ul class="naves">
					<li>
						<i class="ti-info-alt"></i>
						<a href="{{ route('profile.edit',auth()->user()->id) }}" title="">Basic info</a>
					</li>
				</ul>
			</div>
		@endif






	</aside>
</div><!-- left-sidebar -->


