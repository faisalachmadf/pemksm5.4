@extends('layouts.adminlte')

@section('title', $page['title'])

@section('customCss')
@endsection

@section('content')

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
 
      <h1>{{ $page['title'] }}</h1>
  
      <ol class="breadcrumb">
        <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><i class="fa fa-file-archive-o"></i> LPPD</li>
        <li><a href="{{ route('galeri-lppd.index') }}">Galeri</a></li>
        <li class="active">{{ $page['breadcrumb'] }}</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="box">
        <div class="box-header">
          <a href="{{ route('galeri-lppd.index') }}" class="btn btn-default">
            <i class="fa fa-arrow-left"></i>
            <span>Kembali</span>
          </a>
        </div>
        <!-- /.box-header -->
        <form class="form-horizontal">
          <div class="box-body">
          @if($galeri)
            <div class="form-group">
              <label for="judul" class="col-sm-4 control-label">Judul :</label>

              <div class="col-sm-4">
                <p class="form-control-static">{{ $galeri->judul }}</p>
              </div>
            </div>
            <div class="form-group">
              <label for="tag" class="col-sm-4 control-label">Tag :</label>

              <div class="col-sm-4">
                <p class="form-control-static">{{ generateTag($galeri->tags) }}</p>
              </div>
            </div>
            <div class="form-group">
              <label for="user" class="col-sm-4 control-label">User :</label>

              <div class="col-sm-4">
                <p class="form-control-static">{{ generateUser($galeri->user) }}</p>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-4 control-label">Gambar :</label>

              <div class="col-sm-4">
                {!! generateImagePath('galeri-lppd', $galeri->gambar, $galeri->judul) !!}
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-12">Multi Gambar</label>

              @foreach($galeri->gambars as $multi)
              <div class="col-sm-3">
                {!! generateImagePath('galeri-lppd', $multi->gambar, $galeri->judul) !!}
              </div>
              @endforeach
            </div>
          @else
            <h1 class="text-center">Data Tidak Ditemukan</h1>
          @endif
          </div>
          <!-- /.box-body -->
        </form>
      </div>
  
    </section>
    <!-- /.content -->
  </div>
  
@endsection

@section('customJs')
@endsection
