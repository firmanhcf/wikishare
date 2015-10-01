@extends('partials.front_layout')
@section('content')

<!-- Main -->
	<div id="page">
			
		<div id="main" class="container">
			@include('partials.notification')
			
			<div class="row">
				<div class="4u">
					
					<form method="POST" action="{{ url('/password/email') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group">
							<label>Alamat Email</label>
							<input type="email" class="form-control {{ $errors->has('email')?'input-error':'' }}" name="email" placeholder="Masukkan alamat email Anda" value="{{ old('email') }}">
							{!!$errors->first('email', '<label class="control-label has-error">:message</label>')!!}
						</div>

						<div class="form-group">
							<button type="submit" class="button">
								Kirim Email Instruksi
							</button>
						</div>
					</form>
				</div>
				
			</div>
		</div>
		<!-- Main -->
	</div>
<!-- /Main -->
@endsection
