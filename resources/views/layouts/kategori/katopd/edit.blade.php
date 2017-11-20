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
        <li><i class="fa fa-user"></i> Kategori</li>
        <li><a href="{{ route('kategori-opd.index') }}">Kategori Perangkat Daerah</a></li>
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
        <form class="form-horizontal" method="POST" action="{{ route('kategori-opd.update', $katopd->slug) }}">
          {{ csrf_field() }}
          {{ method_field('PUT') }}
          <input type="hidden" name="id" value="{{ $katopd->id }}">
          <div class="box-body">
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
              <label for="name" class="col-sm-4 control-label">Nama Perangkat Daerah<span class="required">*</span> :</label>

              <div class="col-sm-4">
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $katopd->name) }}" placeholder="name" required>
                <small>Nama Perangkat Daerah tidak boleh sama</small>

                @if ($errors->has('name'))
                  <span class="help-block">{{ $errors->first('name') }}</span>
                @endif
              </div>
            </div>

              <label for="name" class="col-sm-4 control-label">gambar/simbol perangkat daerah :</label>
             <div class="col-sm-4">
                  
                  <label>gambar awal </label>
                  <img src="{{ asset('image/opd/'. $katopd->gambar) }}" class="img-responsive"  width="200px">
                  <br/>
                  <label>gambar<span class="required">*</span></label><br/>
                  <input type="file"  name="gambar" class="form-control">
                  <span class="required">jika tidak ada perubahan gambar, abaikan saja</span>
                  <span class="required">{{ ($errors->has('gambar')) ? $errors->first('gambar') : ''}}</span>
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

