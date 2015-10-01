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
  @yield('style')
  
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  @include('partials.admin_header')
  @include('partials.admin_sidebar')

  @yield('content')
  @include('partials.footer')

  {!! HTML::script('assets/js/jquery.min.js') !!}
  {!! HTML::script('assets/js/bootstrap.min.js') !!}
  @yield('script')
</body>
</html>
