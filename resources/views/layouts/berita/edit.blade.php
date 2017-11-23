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
        <li><a href="{{ route('berita.index') }}">Berita</a></li>
        <li class="active">{{ $page['breadcrumb'] }}</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="box">
        <div class="box-header">
          <a href="{{ route('berita.index') }}" class="btn btn-default">
            <i class="fa fa-arrow-left"></i>
            <span>Kembali</span>
          </a>
        </div>
        <!-- /.box-header -->
        <form class="form-horizontal" method="POST" action="{{ route('berita.update', @$berita->slug) }}" enctype="multipart/form-data">
          {{ csrf_field() }}
          {{ method_field('PUT') }}
          <input type="hidden" name="id" value="{{ @$berita->id }}">
          <div class="box-body">
          @if($berita)
            <div class="form-group{{ $errors->has('judul') ? ' has-error' : '' }}">
              <label for="judul" class="col-sm-4 control-label">Judul<span class="required">*</span> :</label>

              <div class="col-sm-4">
                <input type="text" class="form-control" id="judul" name="judul" value="{{ old('judul', $berita->judul) }}" placeholder="Judul" required>
                <small>Judul tidak boleh sama</small>

                @if ($errors->has('judul'))
                  <span class="help-block">{{ $errors->first('judul') }}</span>
                @endif
              </div>
            </div>
            <div class="form-group{{ $errors->has('id_katberita') ? ' has-error' : '' }}">
              <label for="id_katberita" class="col-sm-4 control-label">Kategori Berita<span class="required">*</span> :</label>

              <div class="col-sm-4">
                <select class="form-control" id="id_katberita" name="id_katberita" required>
                  <option value="">Pilih Kategori Berita</option>
                  @foreach($katberita as $kategori)
                    <option value="{{ $kategori->id }}" {{ old('id_katberita', $berita->id_katberita) == $kategori->id ? 'selected' : '' }}>{{ $kategori->name }}</option>
                  @endforeach
                </select>

                @if ($errors->has('id_katberita'))
                  <span class="help-block">{{ $errors->first('id_katberita') }}</span>
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
                  <input type="text" class="form-control datepicker" id="tanggal" name="tanggal" value="{{ old('tanggal', dateFormatIndo($berita->tanggal)) }}" placeholder="dd/mm/yyyy" required>
                </div>

                @if ($errors->has('tanggal'))
                  <span class="help-block">{{ $errors->first('tanggal') }}</span>
                @endif
              </div>
            </div>
            <div class="form-group{{ $errors->has('gambar') ? ' has-error' : '' }}">
              <label for="gambar" class="col-sm-4 control-label">Gambar :</label>

              <div class="col-sm-4">
                {!! generateImagePath('berita', $berita->gambar, $berita->judul) !!}
                <input type="file" class="form-control-static" id="gambar" name="gambar">
                <small>(jpeg, png, bmp, gif, or svg)</small>

                @if ($errors->has('gambar'))
                  <span class="help-block">{{ $errors->first('gambar') }}</span>
                @endif
              </div>
            </div>
            <div class="form-group{{ $errors->has('isi') ? ' has-error' : '' }}">
              <label for="isi" class="col-sm-12">Isi<span class="required">*</span></label>

              <div class="col-sm-12">
                <textarea class="form-control" id="isi" name="isi" placeholder="Isi" required>{{ old('isi', $berita->isi) }}</textarea>

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
          @if($berita)
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