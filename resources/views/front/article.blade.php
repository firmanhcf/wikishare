@extends('partials.front_layout')
@section('content')

<!-- Main -->
	<div id="page">
			
		<div id="main" class="container">
			<div class="row">
				<div class="9u">
					<div class="row">
						@foreach($categories as $c)
						<section class="4u">
							<div class="box">
								<h2>{{$c->name}}</h2>
								<p><i class="fa fa-file-o"></i>&nbsp;&nbsp;{{count($c->article)}}&nbsp;Artikel</p>
								<a href="{{route('search', ['kategori' => $c->id])}}" class="button">Lihat Selengkapnya</a>
							</div>
						</section>
						@endforeach
					</div>
				</div>
				<div class="3u">
					<section class="sidebar">
						<header>
							<h2>Artikel Populer </h2>
						</header>
						<ul class="style1">
							@foreach($particles as $c)
							<li><a href="{{route('detail',['id'=>$c->id, 'slug'=>$c->slug])}}">{{$c->title}}</a></li>
							@endforeach
						</ul>
					</section>
					<section class="sidebar">
						<header>
							<h2>Member Teraktif </h2>
						</header>
						<ul class="style1">
							@foreach($users as $u)
							<li>{{$u->name}}</li>
							@endforeach
						</ul>
					</section>
					<section class="sidebar">
						<header>
							<h2>Artikel Terbaru </h2>
						</header>
						<ul class="style1">
							@foreach($articles as $a)
							<li><a href="{{route('detail',['id'=>$a->id, 'slug'=>$a->slug])}}">{{$a->title}}</a></li>
							@endforeach
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