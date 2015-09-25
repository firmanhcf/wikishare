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
					<div class="row">
						<section class="4u">
							<div class="box">
								<h2>Kategori Pertama</h2>
								<p><i class="fa fa-file-o"></i>&nbsp;&nbsp;7 Artikel</p>
								<a href="{{route('search')}}" class="button">Lihat Selengkapnya</a>
							</div>
						</section>
						<section class="4u">
							<div class="box">
								<h2>Kategori Kedua</h2>
								<p><i class="fa fa-file-o"></i>&nbsp;&nbsp;2 Artikel</p>
								<a href="{{route('search')}}" class="button">Lihat Selengkapnya</a>
							</div>
						</section>
						<section class="4u">
							<div class="box">
								<h2>Kategori Ketiga</h2>
								<p><i class="fa fa-file-o"></i>&nbsp;&nbsp;1 Artikel</p>
								<a href="{{route('search')}}" class="button">Lihat Selengkapnya</a>
							</div>
						</section>
						<section class="4u">
							<div class="box">
								<h2>Kategori Keempat</h2>
								<p><i class="fa fa-file-o"></i>&nbsp;&nbsp;4 Artikel</p>
								<a href="{{route('search')}}" class="button">Lihat Selengkapnya</a>
							</div>
						</section>
						<section class="4u">
							<div class="box">
								<h2>Kategori Kelima</h2>
								<p><i class="fa fa-file-o"></i>&nbsp;&nbsp;7 Artikel</p>
								<a href="{{route('search')}}" class="button">Lihat Selengkapnya</a>
							</div>
						</section>
						<section class="4u">
							<div class="box">
								<h2>Kategori Keenam</h2>
								<p><i class="fa fa-file-o"></i>&nbsp;&nbsp;0 Artikel</p>
								<a href="{{route('search')}}" class="button">Lihat Selengkapnya</a>
							</div>
						</section>
					</div>
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