@extends('partials.admin_layout')
@section('content')
  <div class="content-wrapper" style="min-height: 700px;">
    <section class="content-header">
      <h1>
        Artikel
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Artikel</li>
      </ol>
    </section>

    
    <section class="content">
      @include('partials.notification')
      <div class="row">
        
        <section class="col-lg-12 connectedSortable">
          
          <div class="nav-tabs-custom">
            
            <ul class="nav nav-tabs pull-right">
              <li><a href="#revenue-chart" data-toggle="tab"><i class="fa fa-pencil"></i> Tulis Artikel</a></li>
              <li class="active"><a href="#sales-chart" data-toggle="tab">Artikel Saya</a></li>
              <li class="pull-left header"><i class="fa fa-file-text"></i> Manajemen Artikel</li>
            </ul>
            <div class="tab-content">
              
              <div class="tab-pane" id="revenue-chart" style="position: relative; min-height: 200px;">
                <form class="form-horizontal" enctype="multipart/form-data" action="{{route('article.store')}}" method="POST">
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
                        <label>Isi Artikel&nbsp;<span class="pdf-upload">atau <a href="#" id="upload-pdf-link" onclick="choosePDF()">upload pdf</a> sebagai artikel</span></label>
                        <input name="pdf_content" type="file" id="upload-pdf-input" onchange="fileChanged()">
                        <input name="is_pdf" type="hidden" id="upload-pdf-status"  value="false">
                        <textarea name="isi" id="mytextarea" placeholder="Masukkan isi artikel Anda"></textarea>
                        {!!$errors->first('isi', '<label class="control-label has-error">:message</label>')!!}
                      </div>
                    </div>
                  </div>
                  <div class="row" style="margin:5px;">
                    <div class="col-lg-12">
                      <input type="hidden" name="collaborator" id="collaborator-input">
                      <button type="button" data-toggle="modal" data-target="#newConfModal" class="btn btn-primary pull-right" id="submit-button">
                        Publish
                      </button>
                    </div>
                  </div>

                  <div id="newConfModal" class="modal fade" role="dialog">
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
                              <p>Artikel ini membutuhkan persetujuan Administrator. Apakah anda yakin akan mempublikasikan artikel ini?</p>
                            </div>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <input type="submit" class="btn btn-primary" value="Ya">
                          <button type="button" class="btn btn-danger" id="submit-user-button" data-dismiss="modal">Batal</button>
                        </div>
                      </div>

                    </div>
                  </div>
                </form> 
              </div>

              <div class="tab-pane active" id="sales-chart" style="position: relative; min-height: 200px; width: 1046px; overflow: hidden;">

                @if(count($articles)>0)
                @foreach($articles as $item)
                  <div class="post" style="margin:5px;">
                    <div class="user-block">
                      <img class="img-circle img-bordered-sm" src="{{is_null($item->user->photo)?url('assets/images/avatar2.png'):url('assets/img/'.$item->user->photo)}}" alt="user image">
                          <span class="username">
                            <a href="{{route('article.edit', ['id' => $item->id])}}">{{$item->title}}</a>
                            <span class="status-badge">
                              @if($item->approval_status=='pending')
                                Menunggu Persetujuan
                              @elseif($item->approval_status=='accepted')
                                Di-publish
                              @else 
                                Ditolak 
                              @endif
                              &nbsp;<i class="fa fa-circle @if($item->approval_status=='pending')
                                  yellow
                                @elseif($item->approval_status=='accepted')
                                  green
                                @else 
                                  red
                                @endif"></i></span>
                          </span>
                      <span class="description">Ditulis oleh <b>{{$item->user->name}}</b> pada {{$item->created_at}}
                        @if(count($item->updateLog)>0)
                        <span style="float:right;">Terakhir diedit oleh <b>{{$item->updateLog[0]->user->name}}</b> pada {{$item->updateLog[0]->user->created_at}}</span>
                        @endif
                      </span>
                    </div>
                    <!-- /.user-block -->
                    <p style="word-break: break-all;word-wrap:break-word;">
                      {!! substr(strip_tags($item->content), 0, 850)!!}...
                    </p>
                    <ul class="list-inline"> 
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
            </div>
          </div>

        </section>
      </div>
    </section>
    
  </div>
@endsection

@section('script')
<script type="text/javascript">

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

  function choosePDF(){
      $('#upload-pdf-input').click();
    }

    function cancelPDF(){
      $('.pdf-upload').html('atau <a href="#" id="upload-pdf-link" onclick="choosePDF()"> upload pdf</a> sebagai artikel');
      $('#mceu_21').css('display','');
      $('#upload-pdf-status').val(false);
    }

    function fileChanged(){
      $('.pdf-upload').html('<a href="#" id="upload-pdf-link" onclick="choosePDF()">ganti pdf</a> atau <a href="#" id="upload-pdf-cancel" onclick="cancelPDF()"> batalkan</a> pdf');
      $('#mceu_21').css('display','none');
      $('#upload-pdf-status').val(true);

    };
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