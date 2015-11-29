<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="shortcut icon" href="{{ url('favicon.ico') }}">
  <title>Share2gather</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  {!! HTML::style('assets/css/font-awesome.min.css') !!}
  {!! HTML::style('assets/css/bootstrap.min.css') !!}
  {!! HTML::style('assets/css/AdminLTE.min.css') !!}
  {!! HTML::style('assets/css/skin-blue.min.css') !!}
  {!! HTML::style('assets/css/bootstrap-rating.css') !!}
  {!! HTML::style('assets/plugins/datatables/dataTables.bootstrap.css') !!}
  
  @yield('style')

  {!! HTML::script('assets/js/jquery.min.js') !!}
  {!! HTML::script('assets/js/bootstrap.min.js') !!}
  {!! HTML::script('assets/js/bootstrap-rating.min.js') !!}
  {!! HTML::script('tinymce/tinymce.min.js') !!}
  {!! HTML::script('tinymce/tinymce_editor.js') !!}
  {!! HTML::script('assets/plugins/datatables/jquery.dataTables.min.js') !!}
  {!! HTML::script('assets/plugins/datatables/dataTables.bootstrap.min.js') !!}
  
  <script type="text/javascript">
    editor_config.selector = "#mytextarea";
    editor_config.path_absolute = "{{url('')}}/";
    editor_config.language = 'en';
    editor_config.height = 300;
    tinymce.init(editor_config);
      // tinymce.init({
      //     selector: "",
      //     height: 300,
      //     plugins: [
      //         "advlist autolink lists link image charmap print preview anchor",
      //         "searchreplace visualblocks code fullscreen",
      //         "insertdatetime media table contextmenu paste"
      //     ],
      //     toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
      //     path_absolute : '{{url("/")}}'
      // });
  </script>
  
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  @include('partials.admin_header')
  @include('partials.admin_sidebar')

  @yield('content')
  @include('partials.footer')
  @yield('script')

  @yield('modal')
  <div id="anyConfModal" class="modal fade" role="dialog">
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
              <p id="message-content"></p>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <form id="form-action-modal" method="POST" action="">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <input type="submit" class="btn btn-primary" value="Ya">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
          </form>
          
        </div>
      </div>

    </div>
  </div>

  <div id="rateModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <form id="rate-action-modal" method="POST" action="">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Beri Rating</h4>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-md-12">
                <p id="rate-message-content"></p>
                <input type="hidden" name="rating" id="rating-val" class="rating rateinput" data-filled="fa fa-star fa-2x" data-empty="fa fa-star-o fa-2x" data-fractions="2"/>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <input type="submit" class="btn btn-primary" value="Kirim">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
          </div>
        </form>
      </div>

    </div>
  </div>

  <script type="text/javascript">

    

    function anyConfClick(url, message){
        $('#form-action-modal').attr('action', url);
        $('#message-content').html(message);
    }

    function rateClick(url, message, val){
        $('#rate-action-modal').attr('action', url);
        $('#rate-message-content').html(message);
        $('#rating-val').rating('rate', val);
    }
  </script>
</body>
</html>
