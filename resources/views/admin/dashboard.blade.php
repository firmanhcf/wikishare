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
                                <form action="{{route('admin.article.reject', ['id' => $u->id])}}" method="POST">
                                  <input type="hidden" name="_token" value="{{csrf_token()}}">
                                  <span data-toggle="tooltip" title="Tolak Artikel"><button type="submit" class="btn btn-sm btn-danger" class="link-black text-sm"><i class="fa fa-times"></i></span></button>
                                </form>
                                
                              </li>
                              <li class="pull-right">
                                <form action="{{route('admin.article.accept', ['id' => $u->id])}}" method="POST">
                                  <input type="hidden" name="_token" value="{{csrf_token()}}">
                                  <span data-toggle="tooltip" title="Publish Artikel"><button type="submit" class="btn btn-sm btn-success " class="link-black text-sm"><i class="fa fa-check"></i></button></span>
                                </form>
                              </li>
                          @elseif($u->approval_status == 'accepted')
                              <li class="pull-right">
                                <form action="{{route('admin.article.reject', ['id' => $u->id])}}" method="POST">
                                  <input type="hidden" name="_token" value="{{csrf_token()}}">
                                  <span data-toggle="tooltip" title="Tolak Artikel"><button type="submit" class="btn btn-sm btn-danger" class="link-black text-sm"><i class="fa fa-times"></i></span></button>
                                </form>
                                
                              </li>
                          @else
                            <li class="pull-right">
                                <form action="{{route('admin.article.accept', ['id' => $u->id])}}" method="POST">
                                  <input type="hidden" name="_token" value="{{csrf_token()}}">
                                  <span data-toggle="tooltip" title="Publish Artikel"><button type="submit" class="btn btn-sm btn-success " class="link-black text-sm"><i class="fa fa-check"></i></button></span>
                                </form>
                              </li>
                          @endif
                          
                          
                        </ul>
                      </td>
                      <td>
                        
                        <ul class="list-inline"> 
                          <li class="pull-right"><span data-toggle="tooltip" title="Hapus Artikel"><a class="btn btn-sm btn-default" href="{{route('article.remove', ['id' => $u->id])}}" class="link-black text-sm"><i class="fa fa-trash"></i></span></a>
                          </li>
                          <li class="pull-right"><span data-toggle="tooltip" title="Edit Artikel"><a class="btn btn-sm btn-default " href="{{route('article.edit', ['id' => $u->id])}}" class="link-black text-sm"><i class="fa fa-pencil"></i></a></span></li>
                          
                        </ul>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
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
  </script>
  
@endsection

@section('modal')
@endsection