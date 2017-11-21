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
        <li><i class="fa fa-book"></i> Kategori</li>
        <li><a href="{{ route('kategori-opd.index') }}">Kategori perangkat Daerah</a></li>
        <li class="active">{{ $page['breadcrumb'] }}</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="box">
        <div class="box-header">
          <a href="{{ route('kategori-opd.index') }}" class="btn btn-default">
            <i class="fa fa-arrow-left"></i>
            <span>Kembali</span>
          </a>
        </div>

        <!-- /.box-header -->
        <form class="form-horizontal">

          <div class="box-body">
            <div class="form-group">
              <label for="name" class="col-sm-4 control-label">Nama perangkat Daerah :</label>

              <div class="col-sm-4">
                <p class="form-control-static">{{ $katopd->name }}</p>
              </div>
            </div>

             <label for="name" class="col-sm-4 control-label">gambar/simbol perangkat daerah :</label>
             <div class="col-sm-4">
                <p class="form-control-static"><img src="{{ asset('image/opd/'. $katopd->gambar) }}" class="img-responsive"  width="600px"></p>
              </div>
          </div>

          <!-- /.box-body -->
        </form>
      </div>
  
    </section>
    <!-- /.content -->
  </div>
  
@endsection
