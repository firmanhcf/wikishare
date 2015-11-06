@extends('partials.admin_layout')

@section('content')
  <form class="form-horizontal" action="{{route('article.edit.action',['id'=> $article->id])}}" method="POST">
    <div class="content-wrapper" style="min-height: 700px;">
      <section class="content-header">
        <h1>
          Edit Artikel
        </h1>
        <ol class="breadcrumb">
          <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Edit Artikel</li>
        </ol>
      </section>

      
      <section class="content">
        @include('partials.notification')
        <div class="row">
          
          <section class="col-lg-9 connectedSortable">
            <div class="box box-success">
              <div class="box-header ui-sortable-handle" style="cursor: move;">
              </div>
              <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; min-height: 250px;"><div class="box-body chat" id="chat-box" style="overflow: hidden; width: auto; min-height: 250px;">

                <input name="_token" type="hidden" value="{{csrf_token()}}">
                  
                <div class="row" style="margin:5px;">
                  <div class="col-lg-12">
                      <div class="form-group">
                        <label>Judul Artikel</label>
                       <input name="judul" type="text" class="form-control {{ $errors->has('judul')?'has-error':''}}" value="{{$article->title}}">
                       {!!$errors->first('judul', '<label class="control-label has-error">:message</label>')!!}
                      </div>

                      <div class="form-group">
                        <label>Pilih Kategori</label>
                        <select class="form-control" name="category_id">
                            @foreach ($categories as $item)
                                <option value="{{$item->id}}" {{($article->category_id==$item->id)?'selected':''}}>{{$item->name}}</option>
                            @endforeach
                        </select>
                      </div>

                      <div class="form-group">
                        <label>Isi Artikel</label>
                        <textarea name="isi" id="mytextarea">{{$article->content}}</textarea>
                       {!!$errors->first('isi', '<label class="control-label has-error">:message</label>')!!}

                      </div>
                  </div>
                </div>
                <div class="row" style="margin:5px;">
                  <div class="col-lg-12">
                    <input type="hidden" name="collaborator" id="collaborator-input" value="{{$coll_json}}">
                    <button type="button" data-toggle="modal" data-target="#editConfModal" class="btn btn-primary pull-right">Perbarui</button>&nbsp;

                    @if(Auth::user()->admin!= 0)
                    <button type="button" data-toggle="modal" data-target="#rateModal" onclick="rateClick('{{route('admin.article.rate', ['id' => $article->id])}}', 'Silahkan isi nilai untuk artikel ini')" class="btn btn-default pull-right" style="margin-right: 5px;"><i class="fa fa-star"></i>&nbsp;Berikan Rating
                    </button>
                    @endif
                  </div>

                </div>

              </div></div>
          </section>
          <section class="col-lg-3 connectedSortable">
            <div class="box box-warning">
              <div class="box-header ui-sortable-handle" style="cursor: move;">
              </div>
              <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; min-height: 250px;"><div class="box-body chat" id="chat-box" style="overflow: hidden; width: auto; min-height: 250px;">

                <div class="row" style="margin:5px;">
                  <div class="col-lg-12">
                    <div class="form-group">
                      <label>Kontributor</label>
                      @if(count($article->updateLog)>0)
                        <ul style="margin-top: 10px; padding-left: 15px;">
                          @foreach($article->updateLog as $l)
                            <li>{{$l->user->name}}</li>
                          @endforeach
                        </ul>
                        
                      @else
                      <div class="text-center">
                        <br>
                        Belum ada member yang mengedit artikel ini
                      </div>
                      @endif
                    </div>
                  </div>
                </div>
                

              </div></div>
          </section>

        </div>
        <div class="row">
          <div class="col-md-9">
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Komentar</h3>
                @if(count($article->comment))
                  @foreach($article->comment as $i => $c)
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
                    @if(Auth::user()->admin==2)
                    <span class="pull-right btn-del">
                      
                      @if(Auth::user()->admin!= 0)
                      <button type="button" data-toggle="modal" data-target="#rateModal" onclick="rateClick('{{route('article.comment.rate', ['id' => $c->id])}}', 'Silahkan isi nilai untuk komentar ini')" class="btn btn-xs btn-default"><i class="fa fa-star"></i>
                      </button>
                      @endif
                      <button type="button" data-toggle="modal" data-target="#anyConfModal" onclick="anyConfClick('{{route('article.comment.delete', ['id' => $c->id])}}', 'Apakah Anda yakin akan menghapus komentar dari artikel ini?')" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i>
                      </button>
                    </span>
                    @endif
                    <div>
                      <p>{{$c->comment}}</p>
                    </div>
                    @if($i < count($article->comment)-1)
                    <hr>
                    @endif
                  </div>

                  @endforeach
                @else
                  <div class="comment-section">
                    <div class="no-comment">
                      <p><b>Tidak ada komentar</b></p>
                    </div>
                  </div>
                @endif
              </div>
            </div>
          </div>
        </div>
      </section>
      
    </div>
    <div id="editConfModal" class="modal fade" role="dialog">
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
                <p>Perubahan pada artikel ini membutuhkan persetujuan Administrator. Apakah anda yakin akan memperbarui artikel ini?</p>
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
@endsection

@section('script')
<script type="text/javascript">
  var userArr = JSON.parse($('#collaborator-input').val());
    console.log(userArr);
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
</script>
@endsection