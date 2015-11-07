@extends('partials.admin_layout')
@section('content')
  <div class="content-wrapper" style="min-height: 700px;">
    <section class="content-header">
      <h1>
        Manajemen Artikel
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Artikel</li>
      </ol>
    </section>

    <section class="content">
      @include('partials.notification')
      <div class="row">
        
        <section class="{{(Auth::user()->admin==3)?'col-lg-12':'col-lg-8'}} connectedSortable">
          
          <div class="nav-tabs-custom">
            
            <ul class="nav nav-tabs pull-right">
              @if(Auth::user()->admin!=1)
              <li><a href="#revenue-chart" data-toggle="tab"><i class="fa fa-pencil"></i> Tulis Artikel</a></li>
              <li><a href="#collaborator-chart" data-toggle="tab">Artikel Saya</a></li>
              @endif
              <li class="active"><a href="#sales-chart" data-toggle="tab">Semua Artikel</a></li>
              <li class="pull-left header"><i class="fa fa-file-text"></i> Manajemen Artikel</li>
            </ul>
            <div class="tab-content">
              @if(Auth::user()->admin!=1)
              <div class="tab-pane" id="revenue-chart" style="position: relative; min-height: 200px;">
                <form class="form-horizontal" action="{{route('article.store')}}" method="POST">
                  <input name="_token" type="hidden" value="{{csrf_token()}}">
                  <div class="row" style="margin:5px;">
                    <div class="col-lg-12">
                      <div class="form-group">
                      <label>Judul Artikel</label>
                       <input name="judul" type="text" class="form-control {{ $errors->has('judul')?'has-error':''}}" placeholder="Masukkan judul Artikel Anda">
                       {!!$errors->first('judul', '<label class="control-label has-error">:message</label>')!!}

                      </div>

                      <div class="form-group">
                        <label>Pilih Kategori</label>
                        <select class="form-control" name="category_id">
                            @foreach ($categories as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                      </div>

                      <div class="form-group">
                        <label>Isi Artikel</label>
                        <textarea name="isi" id="mytextarea" placeholder="Masukkan isi artikel Anda"></textarea>
                        {!!$errors->first('judul', '<label class="control-label has-error">:message</label>')!!}
                      </div>
                      
                      
                    </div>
                  </div>
                  <div class="row" style="margin:5px;">
                    <div class="col-lg-12">
                      <input type="hidden" name="collaborator" id="collaborator-input">
                      <button type="button" data-toggle="modal" data-target="#saveArticleModal" class="btn btn-primary pull-right" id="submit-button"> Kirim </button>
                    </div>
                  </div>

                  <div id="saveArticleModal" class="modal fade" role="dialog">
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
                              <p>Apakah Anda yakin akan menyimpan artikel ini?</p>
                            </div>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <input type="submit" class="btn btn-primary" value="Ya" >
                          <button type="button" class="btn btn-danger" id="submit-del-button" data-dismiss="modal">Batal</button>
                        </div>
                      </div>

                    </div>
                  </div>
                </form> 
              </div>

              <div class="tab-pane" id="collaborator-chart" style="position: relative; min-height: 200px; width: 100%; overflow: hidden;">

                @if(count($myArticles)>0)
                @foreach($myArticles as $item)
                  <div class="post" style="margin:5px;">
                    <div class="user-block">
                      <img class="img-circle img-bordered-sm" src="{{is_null($item->user->photo)?url('assets/images/avatar2.png'):url('assets/img/'.$item->user->photo)}}" alt="user image">
                          <span class="username">
                            <a href="{{route('article.edit', ['id' => $item->id])}}">{{$item->title}}</a>
                          </span>
                      <span class="description">Ditulis oleh <b>{{$item->user->name}}</b> pada {{$item->created_at}}
                        @if(count($item->updateLog)>0)
                        <span style="float:right;">Terakhir diedit oleh <b>{{$item->updateLog[0]->user->name}}</b></span>
                        @endif
                      </span>
                    </div>
                    <!-- /.user-block -->
                    <p style="word-break: break-all;word-wrap:break-word;">
                      {!! substr(strip_tags($item->content), 0, 850)!!}...
                    </p>
                    <ul class="list-inline"> 
                      <li class="pull-right"><button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delArticleModal" onclick="deleteClick('{{route('article.remove', ['id' => $item->id])}}')" class="link-black text-sm"><i class="fa fa-times margin-r-5"></i> Hapus</button>
                      <li class="pull-right"><a class="btn btn-sm btn-default " href="{{route('article.edit', ['id' => $item->id])}}" class="link-black text-sm"><i class="fa fa-pencil margin-r-5"></i> Edit</a></li>

                      </li>
                    </ul>
                    <br>
                  </div>
                @endforeach
                @else
                  <div class="text-center" style="width: 1046px; height: 200px; display: table-cell; vertical-align: middle; margin:auto;">
                    <p><b>Anda tidak memiliki artikel</b></p>
                  </div>
                  
                @endif
              </div>
              @endif
              <div class="tab-pane active" id="sales-chart" style="position: relative; min-height: 200px; width: 100%; overflow: hidden;">

                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Judul</th>
                      <th>Author</th>
                      <th>Status</th>
                      <th>Rating</th>
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
                      <td>
                        <i class="fa fa-star"></i>&nbsp;
                        <?php 
                          $rateArr=[];

                          if(count($u->userRating)>0){
                            array_push($rateArr, $u->userRating[0]->rating);
                          }

                          foreach ($u->comment as $cm) {
                            if(count($cm->userRating)>0){
                              array_push($rateArr, $cm->userRating[0]->rating);
                            }
                          }

                          $avgRate = 0;
                          if(count($rateArr)>0){
                            $avgRate = array_sum($rateArr)/count($rateArr);
                          }
                          
                        ?>
                        {{$avgRate}}
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
                          <li class="pull-right"><span data-toggle="tooltip" title="Hapus Artikel"><button class="btn btn-sm btn-default" data-toggle="modal" data-target="#delArticleModal" onclick="deleteClick('{{route('article.remove', ['id' => $u->id])}}')" class="link-black text-sm"><i class="fa fa-trash"></i></span></button>
                          </li>
                          <li class="pull-right"><span data-toggle="tooltip" title="Edit Artikel"><a class="btn btn-sm btn-default " href="{{route('article.edit', ['id' => $u->id])}}" class="link-black text-sm"><i class="fa fa-pencil"></i></a></span></li>
                          
                        </ul>
                      </td>
                    </tr>
                    @endforeach
                    @else
                    <?php 
                      $ind=1;
                    ?>
                    @foreach($allArticles as $i => $u)
                    @if($u->user->division_id == Auth::user()->division_id)
                    <tr>
                      <td>{{($ind++)}}</td>
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
                          <li class="pull-right"><span data-toggle="tooltip" title="Hapus Artikel"><button class="btn btn-sm btn-default" data-toggle="modal" data-target="#delArticleModal" onclick="deleteClick('{{route('article.remove', ['id' => $u->id])}}')" class="link-black text-sm"><i class="fa fa-trash"></i></span></button>
                          </li>
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

        </section>

        @if(Auth::user()->admin!=3)
        <section class="col-lg-4 connectedSortable">
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Kategori Artikel</h3>
            </div>
            <div class="box-body">
              <label>Nama Kategori</label>
              <div class="row">
                <form action="{{route('admin.article.category.add')}}" method="POST">
                  <input type="hidden" name="_token" value="{{csrf_token()}}">
                  <div class="col-md-9">
                    
                      <div class="form-group">
                        <input name="nama" type="text" class="form-control {{ $errors->has('nama')?'has-error':''}}" placeholder="Masukkan nama kategori">
                        {!!$errors->first('nama', '<label class="control-label has-error">:message</label>')!!}
                      </div>
                    
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#saveCatModal">Simpan</button>
                    </div>
                  </div>

                  <div id="saveCatModal" class="modal fade" role="dialog">
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
                              <p>Apakah Anda yakin akan menyimpan kategori ini?</p>
                            </div>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <input type="submit" class="btn btn-primary" value="Ya">
                          <button type="button" class="btn btn-danger" id="submit-del-button" data-dismiss="modal">Batal</button>
                        </div>
                      </div>

                    </div>
                  </div>
                </form>
              </div>
              
              <div style="margin-top:-10px;">
                <hr>
                @foreach($categories as $i => $c)
                  <div class="row">
                    <div class="col-md-7">{{$i+1}}.&nbsp;&nbsp;{{$c->name}}</div>
                    <div class="col-md-5">
                       
                        <div class="form-group pull-right">
                            <span data-toggle="tooltip" title="Hapus Kategori"><button type="submit" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#anyConfModal" onclick="anyConfClick('{{route('admin.article.category.remove', ['id' => $c->id])}}', 'Semua artikel yang termasuk dalam kategori ini akan dipindahkan ke kategori Lain-lain. Apakah Anda yakin akan menghapus kategori ini?')"><i class="fa fa-trash"></i></button></span>
                        </div>

                        <div class="form-group pull-right">
                          <span data-toggle="tooltip" title="Edit Kategori"><button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#edit-category-{{$c->id}}"><i class="fa fa-pencil"></i></button></span>&nbsp;
                          <div id="edit-category-{{$c->id}}" class="modal fade" role="dialog">
                            <div class="modal-dialog modal-sm">

                              <!-- Modal content-->
                              <div class="modal-content">
                                <form action="{{route('admin.article.category.edit', ['id' => $c->id])}}" method="POST">
                                  <input type="hidden" name="_token" value="{{csrf_token()}}">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Edit Kategori</h4>
                                  </div>
                                  <div class="modal-body">
                                    <div class="form-group">
                                      <label>Nama Kategori</label>
                                      <input name="nama" type="text" class="form-control {{ $errors->has('nama')?'has-error':''}}" placeholder="Masukkan nama kategori" value="{{$c->name}}">
                                      {!!$errors->first('nama', '<label class="control-label has-error">:message</label>')!!}
                                    </div>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="submit" class="btn btn-default" id="submit-user-button">Simpan</button>
                                  </div>
                                </form>
                              </div>

                            </div>
                          </div>
                        </div>
                    </div>
                  </div>
                @endforeach
              </div>
            </div>
          </div>
        </section>
        @endif
      </div>
    </section>
  </div>
  
@endsection

@section('script')
<script type="text/javascript">

  $("#example1").DataTable();
  var userArr = [];
  function user_item_clicked(cb){
    if(cb.checked){
      userArr.push($(cb).attr('id').replace('user_',''));
    }
    else{
      var selectedItem = userArr.indexOf($(cb).attr('id').replace('user_',''));
      userArr.splice(selectedItem, 1);
    }
    $('#collaborator-input').val(JSON.stringify(userArr));

    console.log($('#collaborator-input').val());
  }

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
              <p id="del-message-content">Apakah Anda yakin akan menghapus artikel ini?</p>
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
@section('style')
<style type="text/css">
  .list-inline > li {
    display: inline-block;
    padding-right: 2px;
    padding-left: 2px;
  }
</style>
@endsection
