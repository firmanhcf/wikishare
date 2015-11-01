@extends('partials.admin_layout')

@section('content')

  <div class="content-wrapper" style="min-height: 700px;">
  	<section class="content-header">
      <h1>
        Dashboard
      </h1>
      <ol class="breadcrumb">
        <li class="active">Home</li>
      </ol>
    </section>

    <section class="content">
    	<div class="row">
	  		<div class="col-md-8">
	  			<div class="box box-primary">
	  				<div class="box-header with-border">
		              <h3 class="box-title">Artikel Populer</h3>
		            </div>
		            <div class="box-body">
		            	@if(count($articles)>0)
		                @foreach($articles as $item)
		                  <div class="post" style="margin:5px;">
		                    <div class="user-block">
		                      <img class="img-circle img-bordered-sm" src="{{is_null($item->photo)?url('assets/images/avatar2.png'):url('assets/img/'.$item->photo)}}" alt="user image">
		                          <span class="username">
		                            <a href="{{route('article.edit', ['id' => $item->id])}}">{{$item->title}}</a>
		                          </span>
		                      <span class="description">Ditulis oleh <b>{{$item->name}}</b> pada {{$item->created_at}}
		                        <span style="float:right;"><i class="fa fa-comment"></i>&nbsp;{{$item->comments}} Komentar</span>
		                      </span>
		                    </div>
		                    <!-- /.user-block -->
		                    <p style="word-break: break-all;word-wrap:break-word;">
		                      {!! substr(strip_tags($item->content), 0, 550)!!}...
		                    </p>
		                    <ul class="list-inline"> 
		                      <li class="pull-right"><a class="btn btn-sm btn-default " href="{{route('detail',['id'=>$item->id, 'slug'=>$item->slug])}}" class="link-black text-sm">Lihat selengkapnya</a></li>
		                      </li>
		                    </ul>
		                    <br>
		                  </div>
		                @endforeach
		                @else
		                  <div class="text-center" style="width: 1046px; height: 200px; display: table-cell; vertical-align: middle; margin:auto;">
		                    <p><b>Tidak ada artikel populer</b></p>
		                  </div>
		                  
		                @endif
		            </div>
	  			</div>
	  		</div>
	  		<div class="col-md-4">
	  			<div class="box box-warning">
	  				<div class="box-header with-border">
		              <h3 class="box-title">Member Teraktif</h3>
		            </div>
		            <div class="box-body">
		            	@if(count($users))
							@foreach($users as $c)
							<div class="comment-section">
								<div class="comment-item">
									<img src="{{is_null($c->photo)?url('assets/images/avatar2.png'):url('assets/img/'.$c->photo)}}">
									<span class="user-info">
										<ul>
											<li><b>{{$c->name}}</b></li>
											<li><i class="fa fa-file-text-o"></i>&nbsp;{{$c->articles}} Artikel</li>
										</ul>
									</span>
								</div>
							</div>
							
							@endforeach
						@else
							<div class="comment-section">
								<div class="row">
									<p><b>Tidak ada member yang ditampilkan</b></p>
								</div>
							</div>
						@endif
		            </div>
	  			</div>
	  		</div>
	  	</div>
    </section>
  	
  </div>
@endsection