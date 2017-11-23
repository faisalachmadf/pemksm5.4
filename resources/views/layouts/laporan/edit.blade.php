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
        <li><a href="{{ route('laporan.index') }}">Laporan Biro</a></li>
        <li class="active">{{ $page['breadcrumb'] }}</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="box">
        <div class="box-header">
          <a href="{{ route('laporan.index') }}" class="btn btn-default">
            <i class="fa fa-arrow-left"></i>
            <span>Kembali</span>
          </a>
        </div>
        <!-- /.box-header -->
        <form class="form-horizontal" method="POST" action="{{ route('laporan.update', @$laporan->slug) }}" enctype="multipart/form-data">
          {{ csrf_field() }}
          {{ method_field('PUT') }}
          <input type="hidden" name="id" value="{{ @$laporan->id }}">
          <div class="box-body">
          @if($laporan)
            <div class="form-group{{ $errors->has('judul') ? ' has-error' : '' }}">
              <label for="judul" class="col-sm-4 control-label">Judul<span class="required">*</span> :</label>

              <div class="col-sm-4">
                <input type="text" class="form-control" id="judul" name="judul" value="{{ old('judul', $laporan->judul) }}" placeholder="Judul" required>
                <small>Judul tidak boleh sama</small>

                @if ($errors->has('judul'))
                  <span class="help-block">{{ $errors->first('judul') }}</span>
                @endif
              </div>
            </div>
            <div class="form-group{{ $errors->has('id_katlaporan') ? ' has-error' : '' }}">
              <label for="id_katlaporan" class="col-sm-4 control-label">Kategori Laporan Biro<span class="required">*</span> :</label>

              <div class="col-sm-4">
                <select class="form-control" id="id_katlaporan" name="id_katlaporan" required>
                  <option value="">Pilih Kategori Laporan Biro</option>
                  @foreach($katlaporan as $kategori)
                    <option value="{{ $kategori->id }}" {{ old('id_katlaporan', $laporan->id_katlaporan) == $kategori->id ? 'selected' : '' }}>{{ $kategori->name }}</option>
                  @endforeach
                </select>

                @if ($errors->has('id_katlaporan'))
                  <span class="help-block">{{ $errors->first('id_katlaporan') }}</span>
                @endif
              </div>
            </div>
            <div class="form-group{{ $errors->has('tanggal') ? ' has-error' : '' }}">
              <label for="tanggal" class="col-sm-4 control-label">Tanggal<span class="required">*</span> :</label>

              <div class="col-sm-4">
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control datepicker" id="tanggal" name="tanggal" value="{{ old('tanggal', dateFormatIndo($laporan->tanggal)) }}" placeholder="dd/mm/yyyy" required>
                </div>

                @if ($errors->has('tanggal'))
                  <span class="help-block">{{ $errors->first('tanggal') }}</span>
                @endif
              </div>
            </div>
            <div class="form-group{{ $errors->has('file') ? ' has-error' : '' }}">
              <label for="file" class="col-sm-4 control-label">File :</label>

              <div class="col-sm-4">
                {!! generateFileDownload(route('laporan.download', $laporan->slug), $laporan->file, $laporan->nama) !!}
                <input type="file" class="form-control-static" id="file" name="file">
                <small>(pdf, doc, docx, xls, xlsx, ppt, pptx, jpeg, png, bmp, gif, or svg)</small>

                @if ($errors->has('file'))
                  <span class="help-block">{{ $errors->first('file') }}</span>
                @endif
              </div>
            </div>
            <div class="form-group{{ $errors->has('isi') ? ' has-error' : '' }}">
              <label for="isi" class="col-sm-12">Isi<span class="required">*</span></label>

              <div class="col-sm-12">
                <textarea class="form-control" id="isi" name="isi" placeholder="Isi" required>{{ old('isi', $laporan->isi) }}</textarea>

                @if ($errors->has('isi'))
                  <span class="help-block">{{ $errors->first('isi') }}</span>
                @endif
              </div>
            </div>
          @else
            <h1 class="text-center">Data Tidak Ditemukan</h1>
          @endif
          </div>
          <!-- /.box-body -->
          @if($laporan)
          <div class="box-footer">
            <div class="col-sm-12">
              <button type="submit" class="btn btn-success pull-right">Submit</button>
              <button type="reset" class="btn btn-default pull-right" style="margin-right: 10px;">Reset</button>
            </div>
          </div>
          <!-- /.box-footer -->
          @endif
        </form>
      </div>
  
    </section>
    <!-- /.content -->
  </div>
  
@endsection

@section('customJs')
  <script type="text/javascript">
    $(function () {
      CKEDITOR.replace('isi');
    })
  </script>
@endsection