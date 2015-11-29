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
							<span class="byline">Oleh&nbsp;&nbsp;<b style="color: #555;">{{$article->user->name}}</b>&nbsp;&nbsp;<i class="fa fa-calendar"></i>&nbsp;&nbsp;<span>{{$article->created_at}}</span>&nbsp;&nbsp;<span><input type="hidden" class="rating" id="rating-input" data-filled="fa fa-star" data-empty="fa fa-star-o" data-fractions="2" readonly></span>
							<span style="float: right;">
								@if(count($article->updateLog)>0)
								Terakhir diedit oleh <b style="color:#aaa;">{{$article->updateLog[0]->user->name}}</b>
								@endif
								<a href="{{route('article.pdf',['id'=>$article->id])}}"><i class="fa fa-file-pdf-o"></i>&nbsp;Simpan PDF</a>
								@if(Auth::check())
								&nbsp;|&nbsp;
								<a href="{{route('article.edit',['id'=>$article->id])}}"><i class="fa fa-pencil"></i>&nbsp;&nbsp;Edit Artikel</a>
								@endif
							</span>
							</span>
						</header>
						{!!$article->content!!}
						
						@if(Auth::check())
						@if((Auth::user()->admin ==1 || Auth::user()->admin ==2) && count($article->userRating)==0)
							<div style="
								padding: 10px;
								background-color: #eee;
								border: 1px solid #e7e7e7;
								">
								<h4 style="
								font-weight: bold;
								">Bagaimana artikel ini menurut Anda?</h4>
								<button type="button" data-toggle="modal" data-target="#rateModal" onclick="rateClick('{{route('admin.article.rate', ['id' => $article->id])}}', 'Silahkan isi nilai untuk artikel ini', {{(count($article->userRating)==0)?'0':''.$article->userRating[0]->rating}})" class="button">Berikan rating</button>
								</div>
						@elseif(Auth::user()->admin == 3 && $article->user->division->id == Auth::user()->division->id && count($article->userRating)==0)
							<div style="
								padding: 10px;
								background-color: #eee;
								border: 1px solid #e7e7e7;
								">
								<h4 style="
								font-weight: bold;
								">Bagaimana artikel ini menurut Anda?</h4>
								<button type="button" data-toggle="modal" data-target="#rateModal" onclick="rateClick('{{route('admin.article.rate', ['id' => $article->id])}}', 'Silahkan isi nilai untuk artikel ini', {{(count($article->userRating)==0)?'0':''.$article->userRating[0]->rating}})" class="button">Berikan rating</button>
								</div>
						@endif
						@endif
						<hr>
						<div class="comment-section">
							<form action="{{route('article.comment.store', ['id'=>$article->id])}}" method="POST">
								<span class="contributor-title">Komentar</span>
								<br>
								@if(Auth::check())
								@if(Auth::user()->admin != 1)
								<textarea name="isi" class="comment-box"></textarea>
								{!!$errors->first('isi', '<label class="control-label has-error">:message</label>')!!}
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<input type="submit" class="button submit-comment" value="Kirim">
								@endif
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
											<li><i class="fa fa-calendar"></i>&nbsp;{{$c->created_at}}@if(!$c->is_deleted)&nbsp;&nbsp;<span><input type="hidden" class="rating" id="rating-comment-{{$c->id}}" data-filled="fa fa-star" data-empty="fa fa-star-o" data-fractions="2" readonly></span>@endif</li>
										</ul>
									</span>
									@if(Auth::check())
									@if(!$c->is_deleted)
									<span class="buttons">
				                      @if((Auth::user()->admin== 1 || Auth::user()->admin== 2) && count($c->userRating)==0)

				                      <button type="button" data-toggle="modal" data-target="#rateModal" onclick="rateClick('{{route('article.comment.rate', ['id' => $c->id])}}', 'Silahkan isi nilai untuk komentar ini', {{(count($c->userRating)==0)?'0':''.$c->userRating[0]->rating}})" class="btn btn-xs btn-default"><i class="fa fa-star"></i>
				                      </button>
				                      @elseif(Auth::user()->admin == 3 && $article->user->division->id == Auth::user()->division->id)
				                      <button type="button" data-toggle="modal" data-target="#rateModal" onclick="rateClick('{{route('article.comment.rate', ['id' => $c->id])}}', 'Silahkan isi nilai untuk komentar ini', {{(count($c->userRating)==0)?'0':''.$c->userRating[0]->rating}})" class="btn btn-xs btn-default"><i class="fa fa-star"></i>
				                      </button>
				                      @endif
				                      @if(Auth::user()->admin==2 || Auth::user()->admin==1)
				                      <button type="button" data-toggle="modal" data-target="#anyConfModal" onclick="anyConfClick('{{route('article.comment.delete', ['id' => $c->id])}}', 'Apakah Anda yakin akan menghapus komentar dari artikel ini?')" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i>
				                      </button>
				                      @endif

				                    </span>
				                    @endif
				                    @endif
								</div>
								<div style="width:100%;height:70px;"></div>
								@if($c->is_deleted)
			                      <div class="row">
			                        <p style="color:#888;">Komentar ini telah dihapus oleh {{($c->deletedBy->admin==1)?'Admin':'Manager'}}</p>
			                      </div>
			                    @else
			                      <div class="row">
									<p>{{$c->comment}}</p>
								  </div>
			                    @endif
								
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

@section('script')
	<script type="text/javascript">
		@if(count($article->userRating)==0)
			$('#rating-input').rating('rate', '0');
		@else
			$('#rating-input').rating('rate', '{{$article->userRating[0]->rating}}');
		@endif

		@foreach($article->comment as $c)
			@if(count($c->userRating)==0)
				$('#rating-comment-{{$c->id}}').rating('rate', '0');
			@else
				$('#rating-comment-{{$c->id}}').rating('rate', '{{$c->userRating[0]->rating}}');
			@endif
		@endforeach
	</script>
@endsection