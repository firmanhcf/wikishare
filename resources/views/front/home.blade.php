@extends('partials.front_layout')
@section('content')

<!-- Main -->
	<div id="page">
		<div id="main" class="container">
			<div class="row">
				<div class="9u">
					@if(count($articles) > 0)
					@foreach($articles as $a)
					<section>
						<header>
							<h2>{{$a->title}}</h2>
							<span class="byline">Oleh&nbsp;&nbsp;<b style="color: #555;">{{$a->user->name}}</b>&nbsp;&nbsp;<i class="fa fa-calendar"></i>&nbsp;&nbsp;<span>{{$a->created_at}}</span>&nbsp;&nbsp;<span><input type="hidden" class="rating" id="rating-{{$a->id}}" data-filled="fa fa-star" data-empty="fa fa-star-o" data-fractions="2" readonly></span>
							
							<span style="float: right;">
								@if(count($a->updateLog)>0)
								Terakhir diedit oleh <b style="color:#aaa;">{{$a->updateLog[0]->user->name}}</b>
								@endif
								@if(Auth::check())
								&nbsp;|&nbsp;
								<a href="{{route('article.edit',['id'=>$a->id])}}"><i class="fa fa-pencil"></i>&nbsp;Edit Artikel</a>
								@endif
							</span>
						</span>
						</header>
						<p>{!! substr(strip_tags($a->content), 0, 850)!!}...</p>
						<a href="{{route('detail',['id'=>$a->id, 'slug'=>$a->slug])}}" class="button">Lihat Selengkapnya</a>
						<hr />
					</section>
					@endforeach
					<section>
						{!! $articles->render() !!}
					</section>
					@else
						Tidak ada artikel
					@endif
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
	</div>
<!-- /Main -->
@endsection

@section('style')
<style type="text/css">
	.pagination > .active > a, .pagination > .active > a:focus, .pagination > .active > a:hover, .pagination > .active > span, .pagination > .active > span:focus, .pagination > .active > span:hover {
	    z-index: 2;
	    color: #FFF;
	    cursor: default;
	    background-color: #DE3D27;
	    border-color: #DE3D27;
	}
</style>
@endsection

@section('script')
	<script type="text/javascript">
		@foreach($articles as $a)
			@if(count($a->rating)==0)
				$('#rating-{{$a->id}}').rating('rate', '0');
			@else
				$('#rating-{{$a->id}}').rating('rate', '{{$a->rating[0]->rating}}');
			@endif
		@endforeach
	</script>
@endsection
