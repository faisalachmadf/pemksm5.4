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
        <li><a href="{{ route('produk-hukum.index') }}">Produk Hukum</a></li>
        <li class="active">{{ $page['breadcrumb'] }}</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="box">
        <div class="box-header">
          <a href="{{ route('produk-hukum.index') }}" class="btn btn-default">
            <i class="fa fa-arrow-left"></i>
            <span>Kembali</span>
          </a>
        </div>
        <!-- /.box-header -->
        <form class="form-horizontal">
          <div class="box-body">
          @if($produk)
            <div class="form-group">
              <label for="nama" class="col-sm-4 control-label">Nama :</label>

              <div class="col-sm-4">
                <p class="form-control-static">{{ $produk->nama }}</p>
              </div>
            </div>
            <div class="form-group">
              <label for="kathukum" class="col-sm-4 control-label">Hukum :</label>

              <div class="col-sm-4">
                <p class="form-control-static">{{ $produk->kathukum->name }}</p>
              </div>
            </div>
            <div class="form-group">
              <label for="file" class="col-sm-4 control-label">File :</label>

              <div class="col-sm-4 form-control-static">
                {!! generateFileDownload(route('produk-hukum.download', $produk->slug), $produk->file, $produk->nama) !!}
              </div>
            </div>
            <div class="form-group">
              <label for="diunduh" class="col-sm-4 control-label">Diunduh :</label>

              <div class="col-sm-4">
                <p class="form-control-static">{{ $produk->diunduh }} kali</p>
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
