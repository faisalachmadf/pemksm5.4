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
        <li><a href="{{ route('mitra-dalam-negeri.index') }}">Mitra Kerjasama Dalam Negeri</a></li>
        <li class="active">{{ $page['breadcrumb'] }}</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="box">
        <div class="box-header">
          <a href="{{ route('mitra-dalam-negeri.index') }}" class="btn btn-default">
            <i class="fa fa-arrow-left"></i>
            <span>Kembali</span>
          </a>
        </div>
        <!-- /.box-header -->
        <form class="form-horizontal">
          <div class="box-body">
          @if($mitradn)
            <div class="form-group">
              <label for="judul" class="col-sm-4 control-label">Nama Mitra :</label>
              <div class="col-sm-4">
                <p class="form-control-static">{{ $mitradn->judul }}</p>
              </div>
            </div>
            <div class="form-group">
              <label for="katmitradn" class="col-sm-4 control-label">Kategori Mitra :</label>

              <div class="col-sm-4">
                <p class="form-control-static">{{ $mitradn->katmitra->name }}</p>
              </div>
            </div>
           
            <div class="form-group">
              <label class="col-sm-4 control-label">Gambar :</label>

              <div class="col-sm-4">
                {!! generateImagePath('mitradn', $mitradn->gambar, $mitradn->judul) !!}
              </div>
            </div>
            <div class="form-group">
              <label for="isi" class="col-sm-12">Summary</label>

              <div class="col-sm-12">
                {!! $mitradn->isi !!}
              </div>

               <div class="form-group">
              <label for="user" class="col-sm-4 control-label">Di Upload oleh :</label>

              <div class="col-sm-4">
                <p class="form-control-static">{{ generateUser($mitradn->user) }}</p>
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
