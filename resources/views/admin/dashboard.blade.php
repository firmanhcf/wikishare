@extends('partials.admin_layout')
@section('content')
  <div class="content-wrapper" style="min-height: 700px;">
    <section class="content-header">
      <h1>
        Dashboard
      </h1>
      <ol class="breadcrumb">
        <li class="active"><i class="fa fa-dashboard"></i> Dashboard</li>
      </ol>
    </section>

    
    <section class="content">
      @include('partials.notification')
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Artikel Menunggu Pesetujuan</h3>
            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Judul</th>
                      <th>Author</th>
                      <th>Status</th>
                      <th>Dibuat Tanggal</th>
                      <th>Ubah Status</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if(Auth::user()->admin!=3)
                    @foreach($allArticles as $i => $u)
                    <tr>
                      <td>{{($i+1)}}</td>
                      <td>{{$u->title}}</td>
                      <td>{{$u->user->name}}</td>
                      <td>
                        @if($u->approval_status == 'pending')
                          Menunggu Persetujuan
                        @elseif($u->approval_status == 'accepted')
                          Di-<i>publish</i>
                        @else
                          Ditolak
                        @endif
                      </td>
                      <td>{{date_format($u->created_at,"d/m/Y")}}</td>
                      <td>

                        <ul class="list-inline"> 
                          @if($u->approval_status == 'pending')
                              <li class="pull-right">
                                <span data-toggle="tooltip" title="Tolak Artikel"><button type="button" data-toggle="modal" data-target="#anyConfModal" onclick="anyConfClick('{{route('admin.article.reject', ['id' => $u->id])}}', 'Apakah Anda yakin akan menolak artikel ini?')" class="btn btn-sm btn-danger " class="link-black text-sm"><i class="fa fa-times"></i></button></span>
                                
                              </li>
                              <li class="pull-right">
                                <span data-toggle="tooltip" title="Publish Artikel"><button type="button" data-toggle="modal" data-target="#anyConfModal" onclick="anyConfClick('{{route('admin.article.accept', ['id' => $u->id])}}', 'Apakah Anda yakin akan mempublikasikan artikel ini?')" class="btn btn-sm btn-success " class="link-black text-sm"><i class="fa fa-check"></i></button></span>
                              </li>
                          @elseif($u->approval_status == 'accepted')
                              <li class="pull-right">
                                <span data-toggle="tooltip" title="Tolak Artikel"><button type="button" data-toggle="modal" data-target="#anyConfModal" onclick="anyConfClick('{{route('admin.article.reject', ['id' => $u->id])}}', 'Apakah Anda yakin akan menolak artikel ini?')" class="btn btn-sm btn-danger " class="link-black text-sm"><i class="fa fa-times"></i></button></span>
                              </li>
                          @else
                            <li class="pull-right">
                              <span data-toggle="tooltip" title="Publish Artikel"><button type="button" data-toggle="modal" data-target="#anyConfModal" onclick="anyConfClick('{{route('admin.article.accept', ['id' => $u->id])}}', 'Apakah Anda yakin akan mempublikasikan artikel ini?')" class="btn btn-sm btn-success " class="link-black text-sm"><i class="fa fa-check"></i></button></span>
                            </li>
                          @endif
                          
                          
                        </ul>
                      </td>
                      <td>
                        
                        <ul class="list-inline"> 
                          <li class="pull-right"><span data-toggle="tooltip" title="Hapus Artikel"><button data-toggle="modal" data-target="#delArticleModal" type="button" class="btn btn-sm btn-default" onclick="deleteClick('{{route('article.remove', ['id' => $u->id])}}')" class="link-black text-sm"><i class="fa fa-trash"></i></span></button>
                          <li class="pull-right"><span data-toggle="tooltip" title="Edit Artikel"><a class="btn btn-sm btn-default " href="{{route('article.edit', ['id' => $u->id])}}" class="link-black text-sm"><i class="fa fa-pencil"></i></a></span></li>
                          
                        </ul>
                      </td>
                    </tr>
                    @endforeach
                    @else
                    @foreach($allArticles as $i => $u)
                    @if($u->user->division_id == Auth::user()->division_id)
                    <tr>
                      <td>{{($i+1)}}</td>
                      <td>{{$u->title}}</td>
                      <td>{{$u->user->name}}</td>
                      <td>
                        @if($u->approval_status == 'pending')
                          Menunggu Persetujuan
                        @elseif($u->approval_status == 'accepted')
                          Di-<i>publish</i>
                        @else
                          Ditolak
                        @endif
                      </td>
                      <td>{{date_format($u->created_at,"d/m/Y")}}</td>
                      <td>

                        <ul class="list-inline"> 
                          @if($u->approval_status == 'pending')
                              <li class="pull-right">
                                <span data-toggle="tooltip" title="Tolak Artikel"><button type="button" data-toggle="modal" data-target="#anyConfModal" onclick="anyConfClick('{{route('admin.article.reject', ['id' => $u->id])}}', 'Apakah Anda yakin akan menolak artikel ini?')" class="btn btn-sm btn-danger " class="link-black text-sm"><i class="fa fa-times"></i></button></span>
                                
                              </li>
                              <li class="pull-right">
                                <span data-toggle="tooltip" title="Publish Artikel"><button type="button" data-toggle="modal" data-target="#anyConfModal" onclick="anyConfClick('{{route('admin.article.accept', ['id' => $u->id])}}', 'Apakah Anda yakin akan mempublikasikan artikel ini?')" class="btn btn-sm btn-success " class="link-black text-sm"><i class="fa fa-check"></i></button></span>
                              </li>
                          @elseif($u->approval_status == 'accepted')
                              <li class="pull-right">
                                <span data-toggle="tooltip" title="Tolak Artikel"><button type="button" data-toggle="modal" data-target="#anyConfModal" onclick="anyConfClick('{{route('admin.article.reject', ['id' => $u->id])}}', 'Apakah Anda yakin akan menolak artikel ini?')" class="btn btn-sm btn-danger " class="link-black text-sm"><i class="fa fa-times"></i></button></span>
                              </li>
                          @else
                            <li class="pull-right">
                              <span data-toggle="tooltip" title="Publish Artikel"><button type="button" data-toggle="modal" data-target="#anyConfModal" onclick="anyConfClick('{{route('admin.article.accept', ['id' => $u->id])}}', 'Apakah Anda yakin akan mempublikasikan artikel ini?')" class="btn btn-sm btn-success " class="link-black text-sm"><i class="fa fa-check"></i></button></span>
                            </li>
                          @endif
                          
                          
                        </ul>
                      </td>
                      <td>
                        
                        <ul class="list-inline"> 
                          <li class="pull-right"><span data-toggle="tooltip" title="Hapus Artikel"><button data-toggle="modal" data-target="#delArticleModal" type="button" class="btn btn-sm btn-default" onclick="deleteClick('{{route('article.remove', ['id' => $u->id])}}')" class="link-black text-sm"><i class="fa fa-trash"></i></span></button>
                          <li class="pull-right"><span data-toggle="tooltip" title="Edit Artikel"><a class="btn btn-sm btn-default " href="{{route('article.edit', ['id' => $u->id])}}" class="link-black text-sm"><i class="fa fa-pencil"></i></a></span></li>
                          
                        </ul>
                      </td>
                    </tr>
                    @endif
                    @endforeach
                    @endif
                  </tbody>
                </table>
            </div>
          </div>
        </div>
      </div>

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

@section('script')
  <script type="text/javascript">
    $("#example1").DataTable();

    function deleteClick(url){
      $('#submit-del-art').attr('href', url);
    }
  </script>


  
@endsection

@section('modal')
  <div id="delArticleModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Konfirmasi</h4>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-12">
              <p>Apakah anda yakin akan menghapus artikel ini?</p>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <a type="button" class="btn btn-primary" id="submit-del-art" href="">Ya</a>
          <button type="button" class="btn btn-danger" id="submit-del-button" data-dismiss="modal">Batal</button>
        </div>
      </div>

    </div>
  </div>
@endsection