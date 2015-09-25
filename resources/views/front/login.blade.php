@extends('partials.front_layout')
@section('content')
<!-- Banner -->
	<div class="pagetitle">
		<div class="container">
			Masuk Sebagai Anggota
		</div>
	</div>
<!-- /Banner -->

<!-- Main -->
	<div id="page">
			
		<div id="main" class="container">
			<div class="row">
				<div class="4u">
					<form method="POST" action="{{url('auth/login')}}">
						<div class="form-group">
							<label for="member-username">Username</label>
							<input type="text" class="form-control" name="username" id="member-username" placeholder="Masukkan username Anda">
						</div>
						<div class="form-group">
							<label for="member-password">Password</label>
							<input type="password" class="form-control" name="password" id="member-password" placeholder="Masukkan password Anda">
						</div>
						<div class="form-group">
							<a href="{{route('home')}}">Lupa password?</a>
						</div>
						
						<button type="submit" class="button">Masuk</button>
					</form>
				</div>
				
			</div>
		</div>
		<!-- Main -->
	</div>
<!-- /Main -->
@endsection