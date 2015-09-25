@extends('partials.front_layout')
@section('content')
<!-- Banner -->
	<div class="pagetitle">
		<div class="container">
			Kategori Artikel
		</div>
	</div>
<!-- /Banner -->

<!-- Main -->
	<div id="page">
			
		<div id="main" class="container">
			<div class="row">
				<div class="9u">
					
				</div>
				<div class="3u">
					<section class="sidebar">
						<header>
							<h2>Artikel Terbaru </h2>
						</header>
						<ul class="style1">
							<li><a href="#">Artikel Pertama</a></li>
							<li><a href="#">Artikel Kedua</a></li>
							<li><a href="#">Artikel Ketiga</a></li>
							<li><a href="#">Artikel Keempat</a></li>
							<li><a href="#">Artikel Kelima</a></li>
							<li><a href="{{route('home')}}">Lihat semua &rarr;</a></li>
						</ul>
					</section>
				</div>
			</div>
		</div>
		<!-- Main -->
	</div>
<!-- /Main -->
@endsection