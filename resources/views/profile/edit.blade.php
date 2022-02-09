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
		<div class="editing-info">
			<h5 class="f-title"><i class="ti-info-alt"></i> Edit Basic Information</h5>
			@include('partials._errors')
			<form method="post" action="{{ route('profile.update',auth()->user()->id) }}">
				{{--{{ $user }}--}}

				{{csrf_field()}}
				{{method_field('put')}}
				<div class="form-group half">
					<input type="text" id="input" name="first_name" value="{{old('first_name') ?:  auth()->user()->first_name }}" >
					<label class="control-label" for="input">First Name</label><i class="mtrl-select"></i>
				</div>
				<div class="form-group half">
					<input type="text" name="last_name" value="{{old('last_name')  ?:  auth()->user()->last_name}}" >
					<label class="control-label" for="input">Last Name</label><i class="mtrl-select"></i>
				</div>
				<div class="form-group half">
					<input type="text" name="user_name"  value="{{old('user_name')  ?: auth()->user()->user_name }}" >
					<label class="control-label" for="input">User Name</label><i class="mtrl-select"></i>
				</div>
				<div class="form-group half">
					<input type="text" name="location"  value="{{ old('location') ?:  auth()->user()->location}}" >
					<label class="control-label" for="input">Location</label><i class="mtrl-select"></i>
				</div>
				{{--<div class="form-group">
					<input type="text"  value="{{ $user->email }}" required="required">
					<label class="control-label" for="input">Email</label><i class="mtrl-select"></i>
				</div>--}}
				<div class="submit-btns">
					<button type="submit" class="mtr-btn"><span>Update</span></button>
				</div>
			</form>
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

