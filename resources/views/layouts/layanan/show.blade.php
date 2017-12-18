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
        <li><a href="{{ route('layanan.index') }}">Layanan Publik</a></li>
        <li class="active">{{ $page['breadcrumb'] }}</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="box">
        <div class="box-header">
          <a href="{{ route('layanan.index') }}" class="btn btn-default">
            <i class="fa fa-arrow-left"></i>
            <span>Kembali</span>
          </a>
        </div>
        <!-- /.box-header -->
        <form class="form-horizontal">
          <div class="box-body">
          @if($layanan)
            <div class="form-group">
              <label for="judul" class="col-sm-4 control-label">Judul :</label>

              <div class="col-sm-4">
                <p class="form-control-static">{{ $layanan->judul }}</p>
              </div>
            </div>
            <div class="form-group">
              <label for="katbagian" class="col-sm-4 control-label">bagian :</label>

              <div class="col-sm-4">
                <p class="form-control-static">{{ $layanan->katbagian->name }}</p>
              </div>
            </div>
            <div class="form-group">
              <label for="tanggal" class="col-sm-4 control-label">Tanggal :</label>

              <div class="col-sm-8">
                <p class="form-control-static">{{ dateFormatIndo($layanan->tanggal) }}</p>
              </div>
            </div>
            <div class="form-group">
              <label for="user" class="col-sm-4 control-label">User :</label>

              <div class="col-sm-4">
                <p class="form-control-static">{{ generateUser($layanan->user) }}</p>
              </div>
            </div>
            <div class="form-group">
              <label for="file" class="col-sm-4 control-label">File :</label>

              <div class="col-sm-4 form-control-static">
                {!! generateFileDownload(route('layanan.download', $layanan->slug), $layanan->file, $layanan->nama) !!}
              </div>
            </div>
            <div class="form-group">
              <label for="diunduh" class="col-sm-4 control-label">Diunduh :</label>

              <div class="col-sm-4">
                <p class="form-control-static">{{ $layanan->diunduh }} kali</p>
              </div>
            </div>
            <div class="form-group">
              <label for="isi" class="col-sm-12">Isi</label>

              <div class="col-sm-12">
                {!! $layanan->isi !!}
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
