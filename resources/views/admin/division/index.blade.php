@extends('partials.admin_layout')
@section('content')
  <div class="content-wrapper" style="min-height: 700px;">
    <section class="content-header">
      <h1>
        Manajemen Divisi
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Divisi</li>
      </ol>
    </section>

    <section class="content">
      @include('partials.notification')
      <div class="row">
        <section class="col-lg-8 connectedSortable">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Daftar Divisi</h3>
            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Nama Divisi</th>
                      <th>Jumlah Akun</th>
                      <th>Dibuat Tanggal</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($divisions as $i => $u)
                    <tr>
                      <td>{{($i+1)}}</td>
                      <td>{{$u->name}}</td>
                      <td>{{count($u->user)}}</td>
                      
                      <td>{{date_format($u->created_at,"d/m/Y")}}</td>
                      <td>
                        
                        <ul class="list-inline"> 
                          @if($u->id!=1)
                          <li class="pull-right"><span data-toggle="tooltip" title="Hapus Artikel"><button class="btn btn-sm btn-default" data-toggle="modal" data-target="#delArticleModal" onclick="deleteClick('{{route('admin.division.remove', ['id' => $u->id])}}')" class="link-black text-sm"><i class="fa fa-trash"></i></span></button>
                          </li>
                          <li class="pull-right"><span data-toggle="tooltip" title="Edit Divisi"><button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#edit-category-{{$u->id}}"><i class="fa fa-pencil"></i></button></span>&nbsp;
                          </li>
                          <div id="edit-category-{{$u->id}}" class="modal fade" role="dialog">
                            <div class="modal-dialog modal-sm">

                              <!-- Modal content-->
                              <div class="modal-content">
                                <form action="{{route('admin.division.edit', ['id' => $u->id])}}" method="POST">
                                  <input type="hidden" name="_token" value="{{csrf_token()}}">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Edit Divisi</h4>
                                  </div>
                                  <div class="modal-body">
                                    
                                    <div class="form-group">
                                      <label>Nama Divisi</label>
                                      <input name="nama" style="width:100%;" type="text" class="form-control {{ $errors->has('nama')?'has-error':''}}" placeholder="Masukkan nama divisi" value="{{$u->name}}">
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
                          @endif
                        </ul>
                      </td>
                    </tr>
                    @endforeach
                    
                  </tbody>
                </table>
            </div>
          </div>
        </section>
        <section class="col-lg-4 connectedSortable">
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Tambah Divisi</h3>
            </div>
            <div class="box-body">
              <label>Nama Divisi</label>
              <div class="row">
                <form action="{{route('admin.division.add')}}" method="POST">
                  <input type="hidden" name="_token" value="{{csrf_token()}}">
                  <div class="col-md-9">
                    
                      <div class="form-group">
                        <input name="nama" type="text" class="form-control {{ $errors->has('nama')?'has-error':''}}" placeholder="Masukkan nama divisi">
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
                              <p>Apakah Anda yakin akan menyimpan divisi ini?</p>
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
          </div>
        </section>
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
              <p id="del-message-content">Semua akun yang berada dalam divisi ini akan dipindahkan ke divisi Lainnya. Apakah Anda yakin akan menghapus divisi ini?</p>
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
