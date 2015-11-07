<!DOCTYPE HTML>
<!--
	Ex Machina by TEMPLATED
    templated.co @templatedco
    Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
	<head>
		<title>Wiki Share</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:700italic,400,300,700' rel='stylesheet' type='text/css'>
		{!! HTML::style('assets/css/font-awesome.min.css') !!}
		{!! HTML::style('assets/css/bootstrap.min.css') !!}
		{!! HTML::style('assets/css/bootstrap-rating.css') !!}
		{!! HTML::style('assets/css/skel-noscript.css') !!}
		{!! HTML::style('assets/css/style.css') !!}
		{!! HTML::style('assets/css/style-desktop.css') !!}
		

		@yield('style')
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie/v8.css" /><![endif]-->
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie/v9.css" /><![endif]-->
	</head>
	<body class="{{(Route::currentRouteName()=='home')?'homepage':''}}">
	<!-- Header -->
		@include('partials.header')
	<!-- Header -->

	<!-- Banner -->
		<div id="banner">
			<div class="container">
			</div>
		</div>
	<!-- /Banner -->
	
		@yield('content')

	<!-- Footer -->
		@include('partials.footer')
	<!-- /Footer -->

		{!! HTML::script('assets/js/jquery.min.js') !!}
		{!! HTML::script('assets/js/bootstrap.min.js') !!}
		{!! HTML::script('assets/js/bootstrap-rating.min.js') !!}
		@yield('script')

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