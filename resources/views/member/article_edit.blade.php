@extends('partials.admin_layout')
@section('content')
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
        
        <section class="col-lg-12 connectedSortable">
          <div class="box box-success">
            <div class="box-header ui-sortable-handle" style="cursor: move;">
            </div>
            <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; min-height: 250px;"><div class="box-body chat" id="chat-box" style="overflow: hidden; width: auto; min-height: 250px;">

              <form class="form-horizontal" action="{{route('article.edit.action',['id'=> $article->id])}}" method="POST">
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

                      @if($article->user_id == Auth::user()-> id)
                      <div class="form-group">
                        <label>Kolaborator</label>
                        <p></p>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#collaboratorModal">Edit Kolaborator</button>
                      </div>
                      @endif
                    </div>
                </div>
                <div class="row" style="margin:5px;">
                  <div class="col-lg-12">
                    <input type="hidden" name="collaborator" id="collaborator-input" value="{{$coll_json}}">
                    <input type="submit" class="btn btn-primary pull-right" value="Perbarui">
                  </div>
                </div>
              </form>

            </div></div>
        </section>
      </div>
    </section>
    
  </div>
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

@section('modal')
<div id="collaboratorModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Daftar Kolaborator</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          @foreach($users as $item)
            <div class="col-md-4">
              <div>
                <input type="checkbox" class="user-checkbox" id="user_{{$item->id}}" onclick="user_item_clicked(this)" style="float:left;" {{$item->is_collaborator}}>
                <div class="post user-list" style="margin:5px; float: left;">
                  <div class="user-block">
                    <img class="img-circle img-bordered-sm" src="{{is_null($item->photo)?url('assets/images/avatar2.png'):url('assets/img/'.$item->photo)}}" alt="user image">
                        <span class="username">
                          <a href="#">{{$item->name}}</a>
                        </span>
                    <span class="description">{{$item->username}}</span>
                  </div>
                </div>
              </div>
              
            </div>
          @endforeach
        </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" id="submit-user-button" data-dismiss="modal">Selesai</button>
      </div>
    </div>

  </div>
</div>
@endsection