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
						<div>
							<form action="{{route('search')}}" method="GET" >
								<input type="text" name="q" placeholder="Cari artikel">
							</form>
						</div>
						<header>
							<h2>Artikel Populer </h2>
						</header>
						<ul class="style1">
							@foreach($particles as $c)
							<li class="popular">
								<div>
									<ul class="popular-article">
										<li>
											<a href="{{route('detail',['id'=>$c->id, 'slug'=>$c->slug])}}">{{$c->title}}</a>
										</li>
										<li>
											<span class="vertical-middle">Ditulis oleh <span><img src="{{is_null($c->photo)?url('assets/images/avatar2.png'):url('assets/img/'.$c->photo)}}"> {{$c->name}}</span></span>
											<span class="last"><i class="fa fa-comment-o"></i> {{$c->comments}} komentar</span>
										</li>
									</ul>
								</div>
								
							</li>
							@endforeach
						</ul>
					</section>
					<section class="sidebar">
						<header>
							<h2>Member Teraktif </h2>
						</header>
						<ul class="style1 active-user">
							@foreach($users as $u)
							<div class="comment-section active-user">
								<div class="comment-item">
									<img src="{{is_null($u->photo)?url('assets/images/avatar2.png'):url('assets/img/'.$u->photo)}}">
									<span class="user-info">
										<ul class="active-user">
											<li><b>{{$u->name}}</b></li>
											<li><i class="fa fa-file-text-o"></i>&nbsp;{{$u->articles}} Artikel</li>
										</ul>
									</span>
								</div>
							</div>
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