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
        <li><i class="fa fa-user"></i> Buku Tamu</li>
        <li><a href="{{ route('tamu.index') }}">Buku Tamu</a></li>
        <li class="active">{{ $page['breadcrumb'] }}</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="box">
        <div class="box-header">
          <a href="{{ route('tamu.index') }}" class="btn btn-default">
            <i class="fa fa-arrow-left"></i>
            <span>Kembali</span>
          </a>
        </div>
        <!-- /.box-header -->
        <form class="form-horizontal">
          <div class="box-body">
          @if($tamu)
          <div class="form-group">
              <label for="judul" class="col-sm-4 control-label">Tanggal Pengisian :</label>

              <div class="col-sm-4">
                <p class="form-control-static">{{ date('d F Y', strtotime($tamu->created_at)) }}</p>
              </div>
            </div>

            <div class="form-group">
              <label for="judul" class="col-sm-4 control-label">Nama :</label>

              <div class="col-sm-4">
                <p class="form-control-static">{{ $tamu->nama }}</p>
              </div>
            </div>

             <div class="form-group">
              <label for="judul" class="col-sm-4 control-label">dari :</label>

              <div class="col-sm-4">
                <p class="form-control-static">{{ $tamu->dari }}</p>
              </div>
            </div>

             <div class="form-group">
              <label for="judul" class="col-sm-4 control-label">email :</label>

              <div class="col-sm-4">
                <p class="form-control-static">{{ $tamu->email }}</p>
              </div>
            </div>


            <div class="form-group">
              <label for="isi" class="col-sm-4 control-label">Isi :</label>

              <div class="col-sm-7 form-control-static">
                {!! $tamu->isi !!}
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
