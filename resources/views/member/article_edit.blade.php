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
                      
                    </div>
                </div>
                <div class="row" style="margin:5px;">
                  <div class="col-lg-12">
                    
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
  $(document).ready( function() {
    $("#txtEditor").Editor();                   
  });
</script>

@endsection