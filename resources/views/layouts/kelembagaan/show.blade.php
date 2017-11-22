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
        <li><i class="fa fa-user"></i> Profil</li>
        <li><a href="{{ route('kelembagaan.index') }}">Kelembagaan</a></li>
        <li class="active">{{ $page['breadcrumb'] }}</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="box">
        <div class="box-header">
          <a href="{{ route('kelembagaan.index') }}" class="btn btn-default">
            <i class="fa fa-arrow-left"></i>
            <span>Kembali</span>
          </a>
        </div>
        <!-- /.box-header -->
        <form class="form-horizontal">
          <div class="box-body">
          @if($kelembagaan)

           <div class="form-group">
                <label class="col-sm-4 control-label">Gambar Bagian :</label>
              <div class="col-sm-8">
                  <p class="form-control-static"><img src="{{ asset('image/kelembagaan/'. $kelembagaan->gambar) }}" class="img-responsive"  width="300px"></p>
              </div>
            </div>
            <div class="form-group>
              <div class="form-group">
                <label for="judul" class="col-sm-4 control-label">Nama Bagian :</label>

                <div class="col-sm-4">
                  <p class="form-control-static">{{ $kelembagaan->judul }}</p>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="isi" class="col-sm-4 control-label">isi :</label>
              
              <div class="col-sm-4">
                <p class="form-control-static">{!! $kelembagaan->isi !!}</p>
              </div>
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
