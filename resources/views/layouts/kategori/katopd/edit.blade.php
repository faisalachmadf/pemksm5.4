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
        <li><a href="{{ route('kategori-opd.index') }}">Prestasi</a></li>
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
        <form class="form-horizontal" method="POST" action="{{ route('kategori-opd.update', $katopd->slug) }}" enctype="multipart/form-data">
          {{ csrf_field() }}
          {{ method_field('PUT') }}
          <input type="hidden" name="id" value="{{ $katopd->id }}">
          <div class="box-body">
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
              <label for="name" class="col-sm-4 control-label">name<span class="required">*</span> :</label>

              <div class="col-sm-4">
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $katopd->name) }}" placeholder="name" required>
                <small>Nama Perangkat Daerahtidak boleh sama</small>

                @if ($errors->has('name'))
                  <span class="help-block">{{ $errors->first('name') }}</span>
                @endif
              </div>
            </div>
           
            <div class="form-group{{ $errors->has('gambar') ? ' has-error' : '' }}">
              <label class="col-sm-4 control-label">Gambar :</label>

              <div class="col-sm-4">
                {!! generateImagePath('katopd', $katopd->gambar, $katopd->name) !!}
                <input type="file" class="form-control-static" id="gambar" name="gambar">
                <small>(jpeg, png, bmp, gif, or svg)</small>

                @if ($errors->has('gambar'))
                  <span class="help-block">{{ $errors->first('gambar') }}</span>
                @endif
              </div>
            </div>
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <div class="col-sm-offset-4 col-sm-4">
              <button type="submit" class="btn btn-success pull-right">Submit</button>
              <button type="reset" class="btn btn-default pull-right" style="margin-right: 10px;">Reset</button>
            </div>
          </div>
          <!-- /.box-footer -->
        </form>
      </div>
  
    </section>
    <!-- /.content -->
  </div>
  
@endsection

