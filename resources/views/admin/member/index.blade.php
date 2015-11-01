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
                <form class="form-horizontal" action="{{route('admin.member.add')}}" method="POST">
                  <input name="_token" type="hidden" value="{{csrf_token()}}">
                  <div class="row" style="margin:5px;">
                    <div class="col-lg-6">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Alamat Email*</label>
                          <input name="alamat_email" type="text" type="email" class="form-control {{ $errors->has('alamat_email')?'has-error':''}}" placeholder="Masukkan alamat email member">
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

                    <div class="col-lg-6">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Pilih Divisi</label>
                          <select class="form-control" name="division_id">
                              @foreach ($divisions as $item)
                                  <option value="{{$item->id}}">{{$item->name}}</option>
                              @endforeach
                          </select>
                        </div>
                        <div class="form-group">
                          <label>Pilih Role</label>
                          <select class="form-control" name="admin">
                            <option value="0">Staff</option>
                            <option value="3">Asisten Manajer</option>
                            <option value="2">Manajer</option>
                          </select>
                        </div>
                      </div>
                      
                    </div>
                  </div>
                  <div class="row" style="margin:5px;">
                    <div class="col-lg-12">
                      <button type="button" data-toggle="modal" data-target="#saveUserModal" class="btn btn-primary pull-right" id="submit-button">Buat</button>
                    </div>
                  </div>

                  <div id="saveUserModal" class="modal fade" role="dialog">
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
                              <p>Apakah Anda yakin akan menambahkan akun ini?</p>
                            </div>
                          </div>
                        </div>
                        <div class="modal-footer">
                          
                            <input type="submit" class="btn btn-primary" value="Ya">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                          
                        </div>
                      </div>

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
                      <th>Divisi</th>
                      <th>Role</th>
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
                      <td>{{$u->division->name}}</td>
                      <td>
                        @if($u->admin==0)
                          Staf
                        @elseif($u->admin==1)
                          Administrator
                        @elseif($u->admin==2)
                          Manajer
                        @else
                          Asisten Manajer
                        @endif
                      </td>
                      <td>{{($u->active==true)?'Aktif':'Terblokir'}}</td>
                      <td>{{date_format($u->created_at,"d/m/Y")}}</td>
                      <td>
                        <div class="form-group">
                            <span data-toggle="tooltip" title="Reset Password"><button type="button" data-toggle="modal" data-target="#anyConfModal" onclick="anyConfClick('{{route('admin.member.password', ['id'=>$u->id])}}', 'Apakah Anda yakin akan mereset password member ini?')" class="btn btn-default btn-sm"><i class="fa fa-key"></i></button></span>
                        </div>
                        <div class="form-group">
                          <span data-toggle="tooltip" title="Edit Member"><a href="{{route('admin.member.edit.view', ['id' => $u->id])}}" class="btn btn-default btn-sm"><i class="fa fa-pencil"></i></a></span>
                        </div>
                        <div class="form-group">
                          @if($u->active)
                            
                              <span data-toggle="tooltip" title="Blokir"><button type="button" data-toggle="modal" data-target="#anyConfModal" onclick="anyConfClick('{{route('admin.member.block', ['id'=>$u->id])}}', 'Apakah Anda yakin akan memblokir member ini?')" class="btn btn-danger btn-sm"><i class="fa fa-times"></i></button></span>
                          @else
                              <span data-toggle="tooltip" title="Aktifkan"><button type="button" data-toggle="modal" data-target="#anyConfModal" onclick="anyConfClick('{{route('admin.member.unblock', ['id'=>$u->id])}}', 'Apakah Anda yakin akan mengaktifkan member ini kembali?')"  class="btn btn-success btn-sm"><i class="fa fa-check"></i></button></span>
                          @endif
                        </div>
                        
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