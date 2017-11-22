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
        <form class="form-horizontal" method="POST" action="{{ route('produk-hukum.update', @$produk->slug) }}" enctype="multipart/form-data">
          {{ csrf_field() }}
          {{ method_field('PUT') }}
          <input type="hidden" name="id" value="{{ @$produk->id }}">
          <div class="box-body">
          @if($produk)
            <div class="form-group{{ $errors->has('nama') ? ' has-error' : '' }}">
              <label for="nama" class="col-sm-4 control-label">Nama Produk Hukum<span class="required">*</span> :</label>

              <div class="col-sm-4">
                <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama', $produk->nama) }}" placeholder="Nama Produk Hukum" required>
                <small>Nama Produk Hukum tidak boleh sama</small>

                @if ($errors->has('nama'))
                  <span class="help-block">{{ $errors->first('nama') }}</span>
                @endif
              </div>
            </div>
            <div class="form-group{{ $errors->has('id_kathukum') ? ' has-error' : '' }}">
              <label for="id_kathukum" class="col-sm-4 control-label">Hukum<span class="required">*</span> :</label>

              <div class="col-sm-4">
                <select class="form-control" id="id_kathukum" name="id_kathukum" required>
                  <option value="">Pilih Hukum</option>
                  @foreach($kathukum as $hukum)
                    <option value="{{ $hukum->id }}" {{ old('id_kathukum', $produk->id_kathukum) == $hukum->id ? 'selected' : '' }}>{{ $hukum->name }}</option>
                  @endforeach
                </select>

                @if ($errors->has('id_kathukum'))
                  <span class="help-block">{{ $errors->first('id_kathukum') }}</span>
                @endif
              </div>
            </div>
            <div class="form-group{{ $errors->has('file') ? ' has-error' : '' }}">
              <label for="file" class="col-sm-4 control-label">File :</label>

              <div class="col-sm-4">
                {!! generateFileDownload(route('produk-hukum.download', $produk->slug), $produk->file, $produk->nama) !!}
                <input type="file" class="form-control-static" id="file" name="file">
                <small>(pdf, doc, docx, xls, xlsx, ppt, pptx, jpeg, png, bmp, gif, or svg)</small>

                @if ($errors->has('file'))
                  <span class="help-block">{{ $errors->first('file') }}</span>
                @endif
              </div>
            </div>
          @else
            <h1 class="text-center">Data Tidak Ditemukan</h1>
          @endif
          </div>
          <!-- /.box-body -->
          @if($produk)
          <div class="box-footer">
            <div class="col-sm-offset-4 col-sm-4">
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
@endsection