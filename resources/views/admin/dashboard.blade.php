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
    </section>
    
  </div>
@endsection

@section('script')
@endsection

@section('modal')
@endsection