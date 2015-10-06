@extends('partials.admin_layout')
@section('content')
  <div class="content-wrapper" style="min-height: 700px;">
    <section class="content-header">
      <h1>
        Manajemen Member
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Member</li>
      </ol>
    </section>

    
    <section class="content">
      @include('partials.notification')

      <div class="row">
        
        <section class="col-lg-12 connectedSortable">
          
          <div class="nav-tabs-custom">
            
            <ul class="nav nav-tabs pull-right">
              <li><a href="#revenue-chart" data-toggle="tab"><i class="fa fa-plus"></i> Tambah Member Baru</a></li>
              <li class="active"><a href="#collaborator-chart" data-toggle="tab">Daftar Member</a></li>
            </ul>
            <div class="tab-content">
              
              <div class="tab-pane" id="revenue-chart" style="position: relative; min-height: 200px;">
                <form class="form-horizontal" action="" method="POST">
                  <input name="_token" type="hidden" value="{{csrf_token()}}">
                  <div class="row" style="margin:5px;">
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label>Alamat Email*</label>
                        <input name="alamat_email" type="text" class="form-control {{ $errors->has('alamat_email')?'has-error':''}}" placeholder="Masukkan alamat email member">
                        {!! $errors->first('alamat_email', '<label class="control-label has-error">:message</label>') !!}
                      </div>
                      <div class="form-group">
                        <label>Username*</label>
                        <input name="username" type="text" class="form-control {{ $errors->has('username')?'has-error':''}}" placeholder="Masukkan username member">
                        {!! $errors->first('username', '<label class="control-label has-error">:message</label>') !!}
                      </div>
                      <div class="form-group">
                          <label>Nama Lengkap</label>
                          <input name="nama" type="text" class="form-control" placeholder="Masukkan nama member">
                          
                      </div>
                    </div>
                  </div>
                  <div class="row" style="margin:5px;">
                    <div class="col-lg-12">
                      <input type="submit" class="btn btn-primary pull-right" id="submit-button" value="Buat" >
                    </div>
                  </div>
                </form> 
              </div>

              <div class="tab-pane active" id="collaborator-chart" style="position: relative; min-height: 200px; width: 1046px; overflow: hidden;">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Nama</th>
                      <th>Username</th>
                      <th>Email</th>
                      <th>Status</th>
                      <th>Dibuat Tanggal</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($members as $i => $u)
                    <tr>
                      <td>{{($i+1)}}</td>
                      <td>{{$u->name}}</td>
                      <td>{{$u->username}}</td>
                      <td>{{$u->email}}</td>
                      <td>{{($u->active==true)?'Aktif':'Terblokir'}}</td>
                      <td>{{date_format($u->created_at,"d/m/Y")}}</td>
                      <td>
                        <span data-toggle="tooltip" title="Reset Password"><button type="button" class="btn btn-default"><i class="fa fa-key"></i></button></span>
                        <span data-toggle="tooltip" title="Detil Member"><button type="button" class="btn btn-info"><i class="fa fa-info"></i></button></span>
                        @if($u->active)
                          <span data-toggle="tooltip" title="Blokir"><button type="button" class="btn btn-danger"><i class="fa fa-times"></i></button></span>
                        @else
                          <span data-toggle="tooltip" title="Aktifkan"><button type="button" class="btn btn-success"><i class="fa fa-check"></i></button></span>
                        @endif
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
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
    $("#example1").DataTable();
  </script>
  
@endsection
