@extends('partials.front_layout')
@section('content')

<!-- Main -->
	<div id="page">
			
		<div id="main" class="container">
			<div class="row">
				<div class="9u">
					<section>
						<header>
							<h2>{{$article->title}}</h2>
							<span class="byline">Oleh&nbsp;&nbsp;<b style="color: #aaa;">{{$article->user->name}}</b>&nbsp;&nbsp;<i class="fa fa-calendar"></i>&nbsp;&nbsp;<span>{{$article->created_at}}</span>
							<span style="float: right;">
								@if(count($article->updateLog)>0)
								Terakhir diedit oleh <b style="color:#aaa;">{{$article->updateLog[0]->user->name}}</b>
								@endif
								@if(Auth::check())
								&nbsp;|&nbsp;
								<a href="{{route('article.edit',['id'=>$article->id])}}"><i class="fa fa-pencil"></i>&nbsp;Edit Artikel</a>
								@endif
							</span>
							</span>
						</header>
						{!!$article->content!!}
						
						@if(count($article->updateLog)>0)
							<hr>
							<b>Kontributor</b>
							<br>
							<p>
								@foreach($article->updateLog as $index => $l)
									{{$l->user->name}}@if($index < count($article->updateLog)-1),@endif
								@endforeach
							</p>
						@endif
						

					</section>
				</div>
				<div class="3u">
					@if(count($related)>0)
					<section class="sidebar">
						<header>
							<h2>Artikel Terkait </h2>
						</header>
						<ul class="style1">
							@foreach($related as $r)
							<li><a href="{{route('detail',['id'=>$r->id, 'slug'=>$r->slug])}}">{{$r->title}}</a></li>
							@endforeach
						</ul>
					</section>
					@endif
					<section class="sidebar">
						<header>
							<h2>Kategori </h2>
						</header>
						<ul class="style1">
							@foreach($categories as $c)
							<li><a href="{{route('search', ['kategori' => $c->id])}}">{{$c->name}}</a></li>
							@endforeach
							<li><a href="{{route('article')}}">Lihat semua &rarr;</a></li>
						</ul>
					</section>
				</div>
			</div>
		</div>
		<!-- Main -->
	</div>
<!-- /Main -->
@endsection