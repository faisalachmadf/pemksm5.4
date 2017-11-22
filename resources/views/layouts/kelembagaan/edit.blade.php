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
        <li><a href="{{ route('kelembagaan.index') }}">Kelembagaan</a></li>
        <li class="active">{{ $page['breadcrumb'] }}</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="box">
        <div class="box-header">
          <a href="{{ route('kelembagaan.index') }}" class="btn btn-default">
            <i class="fa fa-arrow-left"></i>
            <span>Kembali</span>
          </a>
        </div>
        <!-- /.box-header -->
        <form class="form-horizontal" method="POST" action="{{ route('kelembagaan.update', @$kelembagaan->judul) }}" enctype="multipart/form-data">
          {{ csrf_field() }}
          {{ method_field('PUT') }}
          <input type="hidden" name="id" value="{{ @$kelembagaan->id }}">
          <div class="box-body">
          @if($kelembagaan)
            <div class="col-sm-5">
                <div class="form-group{{ $errors->has('id_katbagian') ? ' has-error' : '' }}">
                <label for="id_katbagian" class="col-sm-4 control-label">Data Pada Database<span class="required">*</span> :</label>

                <div class="col-sm-8">
                  <select class="form-control" id="id_katbagian" name="id_katbagian" required>
                    <option value="">Pilih Bagian</option>
                    @foreach($katbagian as $bagian)
                      <option value="{{ $bagian->id }}" {{ old('id_katbagian', $kelembagaan->id_katbagian) == $bagian->id ? 'selected' : '' }}>{{ $bagian->name }}</option>
                    @endforeach
                  </select>

                  @if ($errors->has('id_katbagian'))
                    <span class="help-block">{{ $errors->first('id_katbagian') }}</span>
                  @endif
                </div>
              </div>
              <div class="form-group{{ $errors->has('judul') ? ' has-error' : '' }}">
                <label for="judul" class="col-sm-4 control-label">Nama Bagian<span class="required">*</span> :</label>

                <div class="col-sm-8">
                  <input type="text" class="form-control" id="judul" name="judul" value="{{ old('judul', $kelembagaan->judul) }}" placeholder="judul" required>
                  <small>Sesuaikan Nama Bagian dengan Nama yang terdapat pada Database</small>

                  @if ($errors->has('judul'))
                    <span class="help-block">{{ $errors->first('judul') }}</span>
                  @endif
                </div>
              </div>

              <div class="form-group{{ $errors->has('tanggal') ? ' has-error' : '' }}">
                <label for="tanggal" class="col-sm-4 control-label">Tanggal Rubah<span class="required">*</span> :</label>

                <div class="col-sm-8">
                  <div class="input-group date">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" class="form-control datepicker" id="tanggal" name="tanggal" value="{{ old('tanggal', dateFormatIndo($kelembagaan->tanggal)) }}" placeholder="dd/mm/yyyy" required>
                  </div>

                  @if ($errors->has('tanggal'))
                    <span class="help-block">{{ $errors->first('tanggal') }}</span>
                  @endif
                </div>
              </div>

              <div class="form-group{{ $errors->has('gambar') ? ' has-error' : '' }}">
                <label class="col-sm-4 control-label">Gambar :</label>

                <div class="col-sm-8">
                  {!! generateImagePath('kelembagaan', $kelembagaan->gambar, $kelembagaan->judul) !!}
                  <input type="file" class="form-control-static" id="gambar" name="gambar">
                  <small>(jpeg, png, bmp, gif, or svg)</small>

                  @if ($errors->has('gambar'))
                    <span class="help-block">{{ $errors->first('gambar') }}</span>
                  @endif
                </div>
              </div>

            </div>
            <div class="col-sm-7">
              <div class="form-group{{ $errors->has('isi') ? ' has-error' : '' }}">
                <label for="isi" class="col-sm-3 control-label">isi<span class="required">*</span> :</label>

                <div class="col-sm-9">
                  <textarea class="form-control" id="isi" name="isi" rows="10" placeholder="isi" required>{{ old('isi', $kelembagaan->isi) }}</textarea>

                  @if ($errors->has('isi'))
                    <span class="help-block">{{ $errors->first('isi') }}</span>
                  @endif
                </div>
              </div>
            </div>
          @else
            <h1 class="text-center">Data Tidak Ditemukan</h1>
          @endif
          </div>
          <!-- /.box-body -->
          @if($kelembagaan)
          <div class="box-footer">
            <div class="col-sm-offset-5 col-sm-7">
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