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
        <li><a href="{{ route('mitra-dalam-negeri.index') }}">Mitra</a></li>
        <li class="active">{{ $page['breadcrumb'] }}</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="box">
        <div class="box-header">
          <a href="{{ route('mitra-dalam-negeri.index') }}" class="btn btn-default">
            <i class="fa fa-arrow-left"></i>
            <span>Kembali</span>
          </a>
        </div>
        <!-- /.box-header -->
        <form class="form-horizontal" method="POST" action="{{ route('mitra-dalam-negeri.update', @$mitradn->slug) }}" enctype="multipart/form-data">
          {{ csrf_field() }}
          {{ method_field('PUT') }}
          <input type="hidden" name="id" value="{{ @$mitradn->id }}">
          <div class="box-body">
          @if($mitradn)
            <div class="form-group{{ $errors->has('judul') ? ' has-error' : '' }}">
              <label for="judul" class="col-sm-4 control-label">Nama Mitra<span class="required">*</span> :</label>

              <div class="col-sm-4">
                <input type="text" class="form-control" id="judul" name="judul" value="{{ old('judul', $mitradn->judul) }}" placeholder="Judul" required>
                <small>Nama Mitra tidak boleh sama</small>

                @if ($errors->has('judul'))
                  <span class="help-block">{{ $errors->first('judul') }}</span>
                @endif
              </div>
            </div>
            <div class="form-group{{ $errors->has('id_katmitra') ? ' has-error' : '' }}">
              <label for="id_katmitra" class="col-sm-4 control-label">Kategori Mitra Kerjasama Dalam Negeri<span class="required">*</span> :</label>

               <div class="col-sm-4">
                <select class="form-control" id="id_katmitra" name="id_katmitra" required>
                  <option value="">Pilih Mitra</option>
                  @foreach($katmitra as $mitra)
                    <option value="{{ $mitra->id }}" {{ old('id_katmitra', $mitradn->id_katmitra) == $mitra->id ? 'selected' : '' }}> {{ $mitra->name }}</option>
                  @endforeach
                </select>

                @if ($errors->has('id_katmitra'))
                  <span class="help-block">{{ $errors->first('id_katmitra') }}</span>
                @endif
              </div>

            </div>
            
            <div class="form-group{{ $errors->has('gambar') ? ' has-error' : '' }}">
              <label for="gambar" class="col-sm-4 control-label">Logo :</label>

              <div class="col-sm-4">
             {!! generateImagePath('mitradn', $mitradn->gambar, $mitradn->judul) !!}
                <input type="file" class="form-control-static" id="gambar" name="gambar">
                <small>(jpeg, png, bmp, gif, or svg)</small>

                @if ($errors->has('gambar'))
                  <span class="help-block">{{ $errors->first('gambar') }}</span>
                @endif
              </div>
            </div>
            <div class="form-group{{ $errors->has('isi') ? ' has-error' : '' }}">
              <label for="isi" class="col-sm-12">Sumarry<span class="required">*</span></label>

              <div class="col-sm-12">
                <textarea class="form-control" id="isi" name="isi" placeholder="Sumarry" required>{{ old('isi', $mitradn->isi) }}</textarea>

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
          @if($mitradn)
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