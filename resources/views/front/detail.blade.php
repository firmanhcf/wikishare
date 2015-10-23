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
						
						
						<br>
						<hr>
						<div class="comment-section">
							<form action="{{route('article.comment.store', ['id'=>$article->id])}}" method="POST">
								<span class="contributor-title">Komentar</span>
								<br>
								@if(Auth::check())
								<textarea name="isi" class="comment-box"></textarea>
								{!!$errors->first('isi', '<label class="control-label has-error">:message</label>')!!}
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<input type="submit" class="button submit-comment" value="Kirim">
								@endif
							</form>
						</div>

						@if(count($article->comment))
							@foreach($article->comment as $c)
							<div class="comment-section">
								<div class="comment-item">
									<img src="{{is_null($c->user->photo)?url('assets/images/avatar2.png'):url('assets/img/'.$c->user->photo)}}">
									<span class="user-info">
										<ul>
											<li><b>{{$c->user->name}}</b></li>
											<li><i class="fa fa-calendar"></i>&nbsp;{{$c->created_at}}</li>
										</ul>
									</span>
								</div>
								<div class="row">
									<p>{{$c->comment}}</p>
								</div>
							</div>
							
							@endforeach
						@else
							<div class="comment-section">
								<div class="row">
									<p><b>Tidak ada komentar</b></p>
								</div>
							</div>
						@endif

						
						

						@if(count($article->updateLog)>0)
							<div>
								<hr>
								<span class="contributor-title">Riwayat Editorial</span>
								<br>
								<ul class="contributor-list">
									@foreach($article->updateLog as $index => $l)
									<li class="u3 contributor-item"> 
										<ul class="edit-item">
											<li class="list-style"><i class="fa fa-circle-o"></i></li>
											<li class="edit-member">{{$l->user->name}}</li> 
											<li class="edit-date">
												<i class="fa fa-calendar"></i> {{date('d/m/Y H:i', strtotime($l->updated_at))}}
											</li>
										</ul>
									</li>
									@endforeach
									<li class="u3 contributor-item"> 
										<ul class="edit-item">
											<li class="list-style"><i class="fa fa-circle-o"></i></li>
											<li class="edit-member">{{$article->user->name}}</li> 
											<li class="edit-date">
												<i class="fa fa-calendar"></i> {{date('d/m/Y H:i', strtotime($article->created_at))}}
											</li> 
										</ul>
									</li>
								</ul>
							</div>
							
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