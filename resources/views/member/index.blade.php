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
              <li class="active"><a href="#sales-chart" data-toggle="tab">Daftar Artikel</a></li>
              <li class="pull-left header"><i class="fa fa-file-text"></i> Manajemen Artikel</li>
            </ul>
            <div class="tab-content">
              
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
                      
                      <input type="submit" class="btn btn-primary pull-right" id="submit-button" value="Kirim" >
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
                          </span>
                      <span class="description">Ditulis oleh <b>{{$item->user->name}}</b> pada {{$item->created_at}}</span>
                    </div>
                    <!-- /.user-block -->
                    <p style="word-break: break-all;word-wrap:break-word;">
                      {!! substr(strip_tags($item->content), 0, 850)!!}...
                    </p>
                    <ul class="list-inline"> 
                      <li class="pull-right"><a class="btn btn-sm btn-primary " href="{{route('article.edit', ['id' => $item->id])}}" class="link-black text-sm"><i class="fa fa-pencil margin-r-5"></i> Edit</a></li>
                      <li class="pull-right"><a class="btn btn-sm btn-danger" href="{{route('article.remove', ['id' => $item->id])}}" class="link-black text-sm"><i class="fa fa-times margin-r-5"></i> Hapus</a>
                      </li>
                    </ul>
                    <br>
                    <hr>
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

</script>

@endsection