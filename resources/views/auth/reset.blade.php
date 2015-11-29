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
					<form method="POST" action="{{ url('/password/reset') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="hidden" name="token" value="{{ $token }}">

						<div class="form-group">
							<label>Alamat Email</label>
							<input type="email" placeholder="Masukkan alamat email Anda" class="form-control {{ $errors->has('email')?'input-error':'' }}" name="email" value="{{ old('email') }}">
							{!!$errors->first('email', '<label class="control-label has-error">:message</label>')!!}
						</div>

						<div class="form-group">
							<label>Password Baru</label>
							<input type="password" placeholder="Masukkan password baru Anda" class="form-control {{ $errors->has('password')?'input-error':'' }}" name="password">
							{!!$errors->first('password', '<label class="control-label has-error">:message</label>')!!}
						</div>

						<div class="form-group">
							<label>Konfirmasi Password Baru</label>
							<input type="password" placeholder="Masukkan password baru Anda lagi" class="form-control" name="password_confirmation">
						</div>
						<button type="submit" class="button">
							Simpan Password
						</button>
					</form>
				</div>
				
			</div>
		</div>
		<!-- Main -->
	</div>
<!-- /Main -->
@endsection
