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
        <li><i class="fa fa-file-archive-o"></i> TKKSD</li>
        <li><a href="{{ route('galeri-tkksd.index') }}">Galeri</a></li>
        <li class="active">{{ $page['breadcrumb'] }}</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="box">
        <div class="box-header">
          <a href="{{ route('galeri-tkksd.index') }}" class="btn btn-default">
            <i class="fa fa-arrow-left"></i>
            <span>Kembali</span>
          </a>
        </div>
        <!-- /.box-header -->
        <form class="form-horizontal" method="POST" action="{{ route('galeri-tkksd.update', @$galeri->slug) }}" enctype="multipart/form-data">
          {{ csrf_field() }}
          {{ method_field('PUT') }}
          <input type="hidden" name="id" value="{{ @$galeri->id }}">
          <div class="box-body">
          @if($galeri)
            <div class="form-group{{ $errors->has('judul') ? ' has-error' : '' }}">
              <label for="judul" class="col-sm-4 control-label">Judul<span class="required">*</span> :</label>

              <div class="col-sm-4">
                <input type="text" class="form-control" id="judul" name="judul" value="{{ old('judul', $galeri->judul) }}" placeholder="Judul" required>
                <small>Judul tidak boleh sama</small>

                @if ($errors->has('judul'))
                  <span class="help-block">{{ $errors->first('judul') }}</span>
                @endif
              </div>
            </div>
            <div class="form-group{{ $errors->has('tags') ? ' has-error' : '' }}">
              <label for="tags" class="col-sm-4 control-label">Tag<span class="required">*</span> :</label>

              <div class="col-sm-4">
                <select class="form-control select2" id="tags" name="tags[]" multiple="multiple" required>
                  @foreach(old('tags', generateTagToArray($galeri)) as $tag)
                    <option {{ in_array($tag, old('tags', generateTagToArray($galeri))) ? 'selected' : '' }}>{{ $tag }}</option>
                  @endforeach
                </select>

                @if ($errors->has('tags'))
                  <span class="help-block">{{ $errors->first('tags') }}</span>
                @endif
              </div>
            </div>
            <div class="form-group{{ $errors->has('gambar') ? ' has-error' : '' }}">
              <label for="gambar" class="col-sm-4 control-label">Gambar :</label>

              <div class="col-sm-4">
                {!! generateImagePath('galeri-tkksd', $galeri->gambar, $galeri->judul) !!}
                <input type="file" class="form-control-static" id="gambar" name="gambar">
                <small>(jpeg, png, bmp, gif, or svg)</small>

                @if ($errors->has('gambar'))
                  <span class="help-block">{{ $errors->first('gambar') }}</span>
                @endif
              </div>
            </div>
            <div class="form-group{{ $errors->has('gambars') ? ' has-error' : '' }}">
              <label for="gambars" class="col-sm-4 control-label">Multi Gambar :</label>

              <div class="col-sm-4">
                <input type="file" class="form-control-static" id="gambars" name="gambars[]" multiple>
                <small>(jpeg, png, bmp, gif, or svg)</small>

                @if ($errors->has('gambars'))
                  <span class="help-block">{{ $errors->first('gambars') }}</span>
                @endif
              </div>
            </div>
            <div class="form-group">
              @foreach($galeri->gambars as $multi)
              <div class="col-sm-3">
                {!! generateImagePath('galeri-tkksd', $multi->gambar, $galeri->judul) !!}
              </div>
              @endforeach
            </div>
          @else
            <h1 class="text-center">Data Tidak Ditemukan</h1>
          @endif
          </div>
          <!-- /.box-body -->
          @if($galeri)
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
@endsection