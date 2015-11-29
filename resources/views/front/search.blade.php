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
			<div class="row">
				<div class="9u">
					@if(count($articles)>0)
					@foreach($articles as $a)
					<section>
						<header>
							<h2>{{$a->title}}</h2>
							<span class="byline">Oleh&nbsp;&nbsp;<b style="color: #aaa;">{{$a->user->name}}</b>&nbsp;&nbsp;<i class="fa fa-calendar"></i>&nbsp;&nbsp;<span>{{$a->created_at}}</span>&nbsp;&nbsp;<span><input type="hidden" class="rating" id="rating-{{$a->id}}" data-filled="fa fa-star" data-empty="fa fa-star-o" data-fractions="2" readonly></span>


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
						<p>Artikel tidak ditemukan</p>
					@endif
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

	#banner{
		background: url({{url('assets/img/'.$banner->photo)}}) no-repeat center;
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