<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Wiki Share</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  {!! HTML::style('assets/css/font-awesome.min.css') !!}
  {!! HTML::style('assets/css/bootstrap.min.css') !!}
  {!! HTML::style('assets/css/AdminLTE.min.css') !!}
  {!! HTML::style('assets/css/skin-blue.min.css') !!}
  {!! HTML::style('assets/plugins/datatables/dataTables.bootstrap.css') !!}

  @yield('style')

  {!! HTML::script('assets/js/jquery.min.js') !!}
  {!! HTML::script('assets/js/bootstrap.min.js') !!}
  {!! HTML::script('assets/js/tinymce/tinymce.min.js') !!}
  {!! HTML::script('assets/plugins/datatables/jquery.dataTables.min.js') !!}
  {!! HTML::script('assets/plugins/datatables/dataTables.bootstrap.min.js') !!}
  
  <script type="text/javascript">
      tinymce.init({
          selector: "#mytextarea",
          height: 300,
          plugins: [
              "advlist autolink lists link image charmap print preview anchor",
              "searchreplace visualblocks code fullscreen",
              "insertdatetime media table contextmenu paste"
          ],
          toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
      });
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
</body>
</html>
