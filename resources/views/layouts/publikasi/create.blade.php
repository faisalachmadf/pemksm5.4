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
        <li><a href="{{ route('publikasi.index') }}">publikasi Biro</a></li>
        <li class="active">{{ $page['breadcrumb'] }}</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="box">
        <div class="box-header">
          <a href="{{ route('publikasi.index') }}" class="btn btn-default">
            <i class="fa fa-arrow-left"></i>
            <span>Kembali</span>
          </a>
        </div>
        <!-- /.box-header -->
        <form class="form-horizontal" method="POST" action="{{ route('publikasi.store') }}" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="box-body">
            <div class="form-group{{ $errors->has('judul') ? ' has-error' : '' }}">
              <label for="judul" class="col-sm-4 control-label">Judul<span class="required">*</span> :</label>

              <div class="col-sm-4">
                <input type="text" class="form-control" id="judul" name="judul" value="{{ old('judul') }}" placeholder="Judul" required>
                <small>Judul tidak boleh sama</small>

                @if ($errors->has('judul'))
                  <span class="help-block">{{ $errors->first('judul') }}</span>
                @endif
              </div>
            </div>
            <div class="form-group{{ $errors->has('id_katfile') ? ' has-error' : '' }}">
              <label for="id_katfile" class="col-sm-4 control-label">Kategori publikasi<span class="required">*</span> :</label>

              <div class="col-sm-4">
                <select class="form-control" id="id_katfile" name="id_katfile" required>
                  <option value="">Pilih Kategori publikasi</option>
                  @foreach($katfile as $publikasi)
                    <option value="{{ $publikasi->id }}" {{ old('id_katfile') == $publikasi->id ? 'selected' : '' }}>{{ $publikasi->name }}</option>
                  @endforeach
                </select>

                @if ($errors->has('id_katfile'))
                  <span class="help-block">{{ $errors->first('id_katfile') }}</span>
                @endif
              </div>
            </div>
            <div class="form-group{{ $errors->has('tanggal') ? ' has-error' : '' }}">
              <label for="tanggal" class="col-sm-4 control-label">Tanggal Update<span class="required">*</span> :</label>

              <div class="col-sm-4">
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control datepicker" id="tanggal" name="tanggal" value="{{ old('tanggal', date('d/m/Y')) }}" placeholder="dd/mm/yyyy" required>
                </div>

                @if ($errors->has('tanggal'))
                  <span class="help-block">{{ $errors->first('tanggal') }}</span>
                @endif
              </div>
            </div>
            <div class="form-group{{ $errors->has('file') ? ' has-error' : '' }}">
              <label for="file" class="col-sm-4 control-label">File<span class="required">*</span> :</label>

              <div class="col-sm-4">
                <input type="file" class="form-control-static" id="file" name="file">
                <small>(pdf, doc, docx, xls, xlsx, ppt, pptx, jpeg, png, bmp, gif, or svg)</small>

                @if ($errors->has('file'))
                  <span class="help-block">{{ $errors->first('file') }}</span>
                @endif
              </div>
            </div>
           
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <div class="col-sm-12">
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


