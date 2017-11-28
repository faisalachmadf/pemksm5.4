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
        <li><i class="fa fa-folder"></i> Data Kerjasama</li>
        <li><a href="{{ route('kerjasama-luar-negeri.index') }}">Luar Negeri</a></li>
        <li class="active">{{ $page['breadcrumb'] }}</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="box">
        <div class="box-header">
          <a href="{{ route('kerjasama-luar-negeri.index') }}" class="btn btn-default">
            <i class="fa fa-arrow-left"></i>
            <span>Kembali</span>
          </a>
        </div>
        <!-- /.box-header -->
        <form class="form-horizontal">
          <div class="box-body">
          @if($kerjasama)
            <div class="col-sm-6">
              <div class="form-group">
                <label for="katln" class="col-sm-4 control-label">Kategori Kerjasama :</label>

                <div class="col-sm-8">
                  <p class="form-control-static">{{ $kerjasama->katln->name }}</p>
                </div>
              </div>
              <div class="form-group">
                <label for="katjenisln" class="col-sm-4 control-label">Kategori Jenis Kerjasama :</label>

                <div class="col-sm-8">
                  <p class="form-control-static">{{ $kerjasama->katjenisln->name }}</p>
                </div>
              </div>
              <div class="form-group">
                <label for="tahun" class="col-sm-4 control-label">Tahun :</label>

                <div class="col-sm-8">
                  <p class="form-control-static">{{ $kerjasama->tahun }}</p>
                </div>
              </div>
              <div class="form-group">
                <label for="judul" class="col-sm-4 control-label">Judul :</label>

                <div class="col-sm-8">
                  <p class="form-control-static">{{ $kerjasama->judul }}</p>
                </div>
              </div>
              <div class="form-group">
                <label for="nomor" class="col-sm-4 control-label">Nomor :</label>

                <div class="col-sm-8 form-control-static">
                  {!! $kerjasama->nomor !!}
                </div>
              </div>
              <div class="form-group">
                <label for="pihak" class="col-sm-4 control-label">Pihak :</label>

                <div class="col-sm-8 form-control-static">
                  {!! $kerjasama->pihak !!}
                </div>
              </div>
              <div class="form-group">
                <label for="user" class="col-sm-4 control-label">User :</label>

                <div class="col-sm-8">
                  <p class="form-control-static">{{ generateUser($kerjasama->user) }}</p>
                </div>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="summary" class="col-sm-4 control-label">Summary :</label>

                <div class="col-sm-8 form-control-static">
                  {!! $kerjasama->summary !!}
                </div>
              </div>
              <div class="form-group">
                <label for="tanggal_awal" class="col-sm-4 control-label">Tanggal Awal :</label>

                <div class="col-sm-8">
                  <p class="form-control-static">{{ dateFormatIndo($kerjasama->tanggal_awal) }}</p>
                </div>
              </div>
              <div class="form-group">
                <label for="tanggal_akhir" class="col-sm-4 control-label">Tanggal Akhir :</label>

                <div class="col-sm-8">
                  <p class="form-control-static">{{ dateFormatIndo($kerjasama->tanggal_akhir) }}</p>
                </div>
              </div>
              <div class="form-group">
                <label for="katopd" class="col-sm-4 control-label">Kategori Perangkat Daerah :</label>

                <div class="col-sm-8">
                  <p class="form-control-static">{{ $kerjasama->katopd->name }}</p>
                </div>
              </div>
              <div class="form-group">
                <label for="keterangan" class="col-sm-4 control-label">Keterangan :</label>

                <div class="col-sm-8 form-control-static">
                  {!! $kerjasama->keterangan !!}
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-4 control-label">Gambar :</label>

                <div class="col-sm-8">
                  {!! generateImagePath('kerjasama-luar-negeri', $kerjasama->gambar, $kerjasama->judul) !!}
                </div>
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
