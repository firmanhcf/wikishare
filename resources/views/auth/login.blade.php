@extends('partials.front_layout')
@section('banner')
	<div id="banner">
		<div class="container">
		</div>
	</div>
@endsection
@section('content')

<!-- Main -->
	<div id="page">
			
		<div id="main" class="container">
			@include('partials.notification')
			
			<div class="row">
				<div class="4u">
					<form method="POST" action="{{url('auth/login')}}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<div class="form-group">
							<label for="member-username">Username</label>
							<input type="text" class="form-control {{ $errors->has('username')?'input-error':'' }}" name="username" id="member-username" placeholder="Masukkan username Anda" value="{{old('username')}}">
							{!!$errors->first('username', '<label class="control-label has-error">:message</label>')!!}
						</div>
						<div class="form-group">
							<label for="member-password">Password</label>
							<input type="password" class="form-control {{ $errors->has('password')?'input-error':'' }}" name="password" id="member-password" placeholder="Masukkan password Anda">
							{!!$errors->first('password', '<label class="control-label has-error">:message</label>')!!}
						</div>
						
						<button type="submit" class="button">Masuk</button>&nbsp;&nbsp;<a href="{{ url('/password/email') }}">Lupa password?</a>
					</form>
				</div>
				
			</div>
		</div>
		<!-- Main -->
	</div>
<!-- /Main -->
@endsection

@section('style')

<style type="text/css">

	#banner{
		background: url({{url('assets/img/'.$banner->photo)}}) no-repeat center;
	}
</style>

@endsection