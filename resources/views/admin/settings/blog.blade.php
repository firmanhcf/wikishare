@extends('partials.admin_layout')
@section('content')
  <div class="content-wrapper" style="min-height: 700px;">
    <section class="content-header">
      <h1>
        Tampilan Blog
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Tampilan Blog</li>
      </ol>
    </section>

    
    <section class="content">
      @include('partials.notification')

      <div class="row">
        
        <div class="col-md-6">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Slide Show</h3>
            </div>
            <div class="box-body">
                <div id="banners-container">
                  @foreach($banners as $i => $item)
                  <div class="form-group" id="banner-item-{{$item->id}}">
                    <div class="center-cropped banner">
                        <img id="image-preview" id="image-banner-{{$item->id}}" class="banner-item" src="{{url('assets/img/'.$item->photo)}}" alt="" >
                        <div class="action-buttons">
                          <button type="button" id="edit-banner-btn-{{$item->id}}" class="btn btn-default btn-xs" ><i class="fa fa-pencil" onclick="editBanner('{{$item->id}}')"></i></button>
                          <button type="button" data-toggle="modal" data-target="#anyConfModal" class="btn btn-danger btn-xs"><i class="fa fa-trash" onclick="anyConfClick('{{route('admin.settings.blog.banner.remove', ['id'=> $item->id])}}', 'Apakah Anda yakin ingin menghapus item ini?')"></i></button>
                        </div>
                      </img>
                    </div>
                    <form role="form" enctype="multipart/form-data" id="update-banner-form-{{$item->id}}" action="{{route('admin.settings.blog.banner.update', ['id' => $item->id])}}" method="POST">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <input type="file" name="banner_photo" id="file-input-banner-{{$item->id}}" style="opacity: 0;" onchange="bannerChanged('{{$item->id}}')">
                    </form>
                  </div>

                  @endforeach

                  @if(count($banners)<10)
                    <div class="form-group" id="banner-item-0">
                      <div class="center-cropped banner add">
                          <img id="image-preview" id="image-banner-0" class="banner-item" src="" alt="" >
                            <div class="action-buttons add">
                              <button type="button" id="edit-banner-btn-{{$item->id}}" class="btn btn-default btn btn-add" onclick="editBanner('0')"><i class="fa fa-plus" ></i> Tambah Banner</button>
                            </div>
                          </img>
                      </div>
                      <form role="form" enctype="multipart/form-data" id="update-banner-form-0" action="{{route('admin.settings.blog.banner.add')}}" method="POST">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="file" name="banner_photo" id="file-input-banner-0" style="opacity: 0;" onchange="bannerChanged('0')">
                      </form>
                    </div>
                  @endif
                </div>
            </div>
          </div>
        </div>

        <div class="col-md-6">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Gambar Statis</h3>
            </div>
            <div class="box-body">
              <form role="form" enctype="multipart/form-data" id="profile-form" action="{{route('admin.settings.blog.image.static')}}" method="POST">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <div class="box-body">
                <div class="form-group">
                  <div class="center-cropped">
                      <img id="image-preview" src="{{url('assets/img/'.$static->photo)}}" alt="" />
                  </div>  
                  <input type="file" name="static_photo" id="file-input" style="opacity: 0;">
                  <a href="#" class="btn btn-primary" id="choose-photo-btn">Pilih Foto</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
    
  </div>
@endsection

@section('style')
<style type="text/css">
  div.center-cropped {
    width: 100%;
    height: 100px;
    overflow:hidden;
    border-radius: 0;
  }

  div.center-cropped img {
    height: 100%;
    min-width: 100%;
    object-fit: cover;
    object-position: center;
  }

  div.center-cropped.banner{
    width: 100%;
    height: 200px;
    overflow:hidden;
    border-radius: 0;
    padding: 5px;
    position: relative;
  }

  div.center-cropped.add{
    width: 100%;
    height: 200px;
    overflow:hidden;
    border-radius: 0;
    padding: 5px;
    position: relative;
    background: #eee;
    border: 1px solid #dedede;
  }

  .action-buttons{
    position: absolute;
    top: 10px;
    right: 10px;
  }

  .action-buttons.add{
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    display: table-cell;
  }

  .action-buttons button{
    opacity: 0.85;
    border: none;
  }

  .action-buttons .btn-add{
    border: none;
    margin-left: auto;
    margin-right: auto;
    width: 100%;
    height: 100%;
    color: #aaa;
    font-size: 15pt;
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
        $('#profile-form').submit();
        $('#choose-photo-btn').attr('disabled', 'disabled');
        $('#choose-photo-btn').fadeTo(100, 0.4);
        $('#choose-photo-btn').html('<i class="fa fa-circle-o-notch fa-spin"></i>&nbsp;Menguggah Foto');
    });

    function editBanner(id){
      $('#file-input-banner-'+id).click();
    }

    function bannerChanged(id){
      readURL(this);
      $('#update-banner-form-'+id).submit();
      $('#edit-banner-btn-'+id).attr('disabled', 'disabled');
      $('#edit-banner-btn-'+id).fadeTo(100, 0.4);
      $('#edit-banner-btn-'+id).html('<i class="fa fa-circle-o-notch fa-spin"></i>');
    }
  </script>
@endsection