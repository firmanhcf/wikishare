@extends('partials.admin_layout')
@section('content')
  <div class="content-wrapper" style="min-height: 700px; ">
    <section class="content-header">
      <h1>
        Edit Profil
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Edit Profil</li>
      </ol>
    </section>
    <section class="content">
      @include('partials.notification')
      <div class="row">
        <div class="col-md-8">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Member Profil</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" enctype="multipart/form-data" action="{{route('admin.member.edit.action', ['id'=>$user->id])}}" method="POST">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <div class="box-body">
                <div class="form-group">
                  <div class="center-cropped">
                      <img id="image-preview" src="{{is_null($user->photo)?url('assets/images/avatar2.png'):url('assets/img/'.$user->photo)}}" alt="" />
                  </div>  
                  <input type="file" name="user_photo" id="file-input" style="opacity: 0;">
                  <a href="#" class="btn btn-primary" id="choose-photo-btn">Pilih Foto</a>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Username</label>
                  <input name="username" type="text" class="form-control" id="user-username" value="{{$user->username}}" disabled>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama Lengkap</label>
                  <input name="name" type="text" class="form-control" id="user-username" value="{{is_null($user->name)?'':$user->name}}" placeholder="Masukkan nama lengkap Anda">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Alamat email</label>
                  <input name="email" type="email" class="form-control {{ $errors->has('email')?'has-error':''}}" id="user-email" value="{{is_null($user->email)?'':$user->email}}" placeholder="Masukkan alamat email Anda">
                  {!!$errors->first('email', '<label class="control-label has-error">:message</label>')!!}
                </div>
                
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="button" data-toggle="modal" data-target="#editUserModal" class="btn btn-primary">Perbarui Profil</button>
              </div>

              <div id="editUserModal" class="modal fade" role="dialog">
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
                              <p>Apakah Anda yakin akan memperbarui informasi akun ini?</p>
                            </div>
                          </div>
                        </div>
                        <div class="modal-footer">
                          
                            <input type="submit" class="btn btn-primary" value="Ya">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                          
                        </div>
                      </div>

                    </div>
                  </div
            </form>
          </div>
        </div>
      </div>
    </section>
    
  </div>
@endsection

@section('style')
<style type="text/css">
  div.center-cropped {
    width: 170px;
    height: 170px;
    overflow:hidden;
  }
  div.center-cropped img {
    height: 100%;
    min-width: 100%;
    left: 50%;
    position: relative;
    transform: translateX(-50%);
  }
</style>
@endsection

@section('script')
  <script type="text/javascript">
    $('#choose-photo-btn').click(function() {
      $('#file-input').click();
    });

    function readURL(input) {

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#image-preview').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#file-input").change(function(){
        readURL(this);
    });
  </script>
@endsection