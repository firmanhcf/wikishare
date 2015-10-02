@extends('partials.admin_layout')
@section('content')
  <div class="content-wrapper" style="min-height: 700px; ">
    <section class="content-header">
      <h1>
        Pengaturan
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Pengaturan</li>
      </ol>
    </section>
    <section class="content">
      @include('partials.notification')
      <div class="row">
        <div class="col-md-6">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Akun Saya</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="{{route('member.settings.action')}}" method="POST">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Username</label>
                  <input name="username" type="text" class="form-control" id="user-username" value="{{Auth::user()->username}}" disabled>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama Lengkap</label>
                  <input name="name" type="text" class="form-control" id="user-username" value="{{is_null(Auth::user()->name)?'':Auth::user()->name}}" placeholder="Masukkan nama lengkap Anda">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Alamat email</label>
                  <input name="email" type="email" class="form-control {{ $errors->has('email')?'has-error':''}}" id="user-email" value="{{is_null(Auth::user()->email)?'':Auth::user()->email}}" placeholder="Masukkan alamat email Anda">
                  {!!$errors->first('email', '<label class="control-label has-error">:message</label>')!!}
                </div>
                
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Perbarui Profil</button>
              </div>
            </form>
          </div>
        </div>
        <div class="col-md-6">
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Ganti Password</h3>
            </div>
             <form role="form" action="{{route('member.settings.password')}}" method="POST">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputPassword1">Password Lama</label>
                  <input type="password" name="password_lama" class="form-control {{ $errors->has('password_lama')?'has-error':''}}" id="old-password" placeholder="Masukkan password lama Anda">
                  {!!$errors->first('password_lama', '<label class="control-label has-error">:message</label>')!!}
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Password Baru</label>
                  <input type="password" name="password_baru" class="form-control {{ $errors->has('password_baru')?'has-error':''}}" id="new-password" placeholder="Masukkan password baru Anda">
                  {!!$errors->first('password_baru', '<label class="control-label has-error">:message</label>')!!}
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Konfirmasi Password Baru</label>
                  <input type="password" name="password_baru_confirmation" class="form-control {{ $errors->has('password_baru_confirmation')?'has-error':''}}" id="conf-password" placeholder="Masukkan kembali password baru Anda">
                  {!!$errors->first('password_baru_confirmation', '<label class="control-label has-error">:message</label>')!!}
                </div>
              </div>

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Perbarui Password</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
    
  </div>
@endsection