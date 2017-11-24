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
        <li><a href="{{ route('agenda.index') }}">agenda Biro</a></li>
        <li class="active">{{ $page['breadcrumb'] }}</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="box">
        <div class="box-header">
          <a href="{{ route('agenda.index') }}" class="btn btn-default">
            <i class="fa fa-arrow-left"></i>
            <span>Kembali</span>
          </a>
        </div>
        <!-- /.box-header -->
        <form class="form-horizontal">
          <div class="box-body">
          @if($agenda)
             <div class="form-group">
              <label for="katbagian" class="col-sm-4 control-label">Acara dari bagian :</label>

              <div class="col-sm-4">
                <p class="form-control-static">{{ $agenda->katbagian->name }}</p>
              </div>
            </div>
            <div class="form-group">
              <label for="judul" class="col-sm-4 control-label">Judul Acara:</label>

              <div class="col-sm-4">
                <p class="form-control-static">{{ $agenda->judul }}</p>
              </div>
            </div>
         
            <div class="form-group">
              <label for="tanggal" class="col-sm-4 control-label">Tanggal Acara :</label>

              <div class="col-sm-8">
                <p class="form-control-static">{{ date('d F Y', strtotime($agenda->tanggal)) }}</p>
              </div>
            </div>
            <div class="form-group">
              <label for="jam" class="col-sm-4 control-label">Jam:</label>

              <div class="col-sm-4">
                <p class="form-control-static">{{ $agenda->jam }}</p>
              </div>
            </div>
            <div class="form-group">
              <label for="lokasi" class="col-sm-4 control-label">Lokasi Acara:</label>

              <div class="col-sm-4">
                <p class="form-control-static">{{ $agenda->lokasi }}</p>
              </div>
            </div>
             <div class="form-group">
              <label for="user" class="col-sm-4 control-label">Di Unggah Oleh :</label>

              <div class="col-sm-4">
                <p class="form-control-static">{{ $agenda->user->username }}</p>
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
