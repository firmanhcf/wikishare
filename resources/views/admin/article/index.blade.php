@extends('partials.admin_layout')
@section('content')
  <div class="content-wrapper" style="min-height: 700px;">
    <section class="content-header">
      <h1>
        Manajemen Artikel
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Artikel</li>
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