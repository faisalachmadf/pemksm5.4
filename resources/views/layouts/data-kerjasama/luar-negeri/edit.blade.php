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
        <li><i class="fa fa-folder"></i> Data Kerjasama</li>
        <li><a href="{{ route('kerjasama-luar-negeri.index') }}">Luar Negeri</a></li>
        <li class="active">{{ $page['breadcrumb'] }}</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="box">
        <div class="box-header">
          <a href="{{ route('kerjasama-luar-negeri.index') }}" class="btn btn-default">
            <i class="fa fa-arrow-left"></i>
            <span>Kembali</span>
          </a>
        </div>
        <!-- /.box-header -->
        <form class="form-horizontal" method="POST" action="{{ route('kerjasama-luar-negeri.update', @$kerjasama->slug) }}" enctype="multipart/form-data">
          {{ csrf_field() }}
          {{ method_field('PUT') }}
          <input type="hidden" name="id" value="{{ @$kerjasama->id }}">
          <div class="box-body">
          @if($kerjasama)
            <div class="col-sm-6">
              <div class="form-group{{ $errors->has('id_katln') ? ' has-error' : '' }}">
                <label for="id_katln" class="col-sm-4 control-label">Kategori Kerjasama<span class="required">*</span> :</label>

                <div class="col-sm-8">
                  <select class="form-control" id="id_katln" name="id_katln" required>
                    <option value="">Pilih Kategori Kerjasama</option>
                    @foreach($katln as $ln)
                      <option value="{{ $ln->id }}" {{ old('id_katln', $kerjasama->id_katln) == $ln->id ? 'selected' : '' }}>{{ $ln->name }}</option>
                    @endforeach
                  </select>

                  @if ($errors->has('id_katln'))
                    <span class="help-block">{{ $errors->first('id_katln') }}</span>
                  @endif
                </div>
              </div>
              <div class="form-group{{ $errors->has('id_katjenisln') ? ' has-error' : '' }}">
                <label for="id_katjenisln" class="col-sm-4 control-label">Kategori Jenis Kerjasama<span class="required">*</span> :</label>

                <div class="col-sm-8">
                  <select class="form-control" id="id_katjenisln" name="id_katjenisln" required>
                    <option value="">Pilih Kategori Jenis Kerjasama</option>
                    @foreach($katjenisln as $jenisln)
                      <option value="{{ $jenisln->id }}" {{ old('id_katjenisln', $kerjasama->id_katjenisln) == $jenisln->id ? 'selected' : '' }}>{{ $jenisln->name }}</option>
                    @endforeach
                  </select>

                  @if ($errors->has('id_katjenisln'))
                    <span class="help-block">{{ $errors->first('id_katjenisln') }}</span>
                  @endif
                </div>
              </div>
              <div class="form-group{{ $errors->has('tahun') ? ' has-error' : '' }}">
                <label for="tahun" class="col-sm-4 control-label">Tahun<span class="required">*</span> :</label>

                <div class="col-sm-8">
                  <div class="input-group date">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" class="form-control" id="tahun" name="tahun" value="{{ old('tahun', $kerjasama->tahun) }}" placeholder="yyyy" required>
                  </div>

                  @if ($errors->has('tahun'))
                    <span class="help-block">{{ $errors->first('tahun') }}</span>
                  @endif
                </div>
              </div>
              <div class="form-group{{ $errors->has('judul') ? ' has-error' : '' }}">
                <label for="judul" class="col-sm-4 control-label">Judul<span class="required">*</span> :</label>

                <div class="col-sm-8">
                  <input type="text" class="form-control" id="judul" name="judul" value="{{ old('judul', $kerjasama->judul) }}" placeholder="Judul" required>
                  <small>Judul tidak boleh sama</small>

                  @if ($errors->has('judul'))
                    <span class="help-block">{{ $errors->first('judul') }}</span>
                  @endif
                </div>
              </div>
              <div class="form-group{{ $errors->has('nomor') ? ' has-error' : '' }}">
                <label for="nomor" class="col-sm-4 control-label">Nomor<span class="required">*</span> :</label>

                <div class="col-sm-8">
                  <textarea class="form-control" id="nomor" name="nomor" placeholder="Nomor" required>{{ old('nomor', $kerjasama->nomor) }}</textarea>

                  @if ($errors->has('nomor'))
                    <span class="help-block">{{ $errors->first('nomor') }}</span>
                  @endif
                </div>
              </div>
              <div class="form-group{{ $errors->has('pihak') ? ' has-error' : '' }}">
                <label for="pihak" class="col-sm-4 control-label">Pihak<span class="required">*</span> :</label>

                <div class="col-sm-8">
                  <textarea class="form-control" id="pihak" name="pihak" placeholder="Pihak" required>{{ old('pihak', $kerjasama->pihak) }}</textarea>

                  @if ($errors->has('pihak'))
                    <span class="help-block">{{ $errors->first('pihak') }}</span>
                  @endif
                </div>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group{{ $errors->has('summary') ? ' has-error' : '' }}">
                <label for="summary" class="col-sm-4 control-label">Summary<span class="required">*</span> :</label>

                <div class="col-sm-8">
                  <textarea class="form-control" id="summary" name="summary" placeholder="Summary" required>{{ old('summary', $kerjasama->summary) }}</textarea>

                  @if ($errors->has('summary'))
                    <span class="help-block">{{ $errors->first('summary') }}</span>
                  @endif
                </div>
              </div>
              <div class="form-group{{ $errors->has('tanggal') ? ' has-error' : '' }}">
                <label for="tanggal" class="col-sm-4 control-label">Tanggal<span class="required">*</span> :</label>

                <div class="col-sm-8">
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" class="form-control daterange" id="tanggal" name="tanggal" value="{{ old('tanggal', dateFormatIndo($kerjasama->tanggal_awal).' - '.dateFormatIndo($kerjasama->tanggal_akhir)) }}" placeholder="dd/mm/yyyy" required>
                  </div>

                  @if ($errors->has('tanggal'))
                    <span class="help-block">{{ $errors->first('tanggal') }}</span>
                  @endif
                </div>
              </div>
              <div class="form-group{{ $errors->has('id_katopd') ? ' has-error' : '' }}">
                <label for="id_katopd" class="col-sm-4 control-label">Kategori Perangkat Daerah<span class="required">*</span> :</label>

                <div class="col-sm-8">
                  <select class="form-control" id="id_katopd" name="id_katopd" required>
                    <option value="">Pilih Kategori Perangkat Daerah</option>
                    @foreach($katopd as $opd)
                      <option value="{{ $opd->id }}" {{ old('id_katopd', $kerjasama->id_katopd) == $opd->id ? 'selected' : '' }}>{{ $opd->name }}</option>
                    @endforeach
                  </select>

                  @if ($errors->has('id_katopd'))
                    <span class="help-block">{{ $errors->first('id_katopd') }}</span>
                  @endif
                </div>
              </div>
              <div class="form-group{{ $errors->has('keterangan') ? ' has-error' : '' }}">
                <label for="keterangan" class="col-sm-4 control-label">Keterangan<span class="required">*</span> :</label>

                <div class="col-sm-8">
                  <textarea class="form-control" id="keterangan" name="keterangan" placeholder="Keterangan" required>{{ old('keterangan', $kerjasama->keterangan) }}</textarea>

                  @if ($errors->has('keterangan'))
                    <span class="help-block">{{ $errors->first('keterangan') }}</span>
                  @endif
                </div>
              </div>
              <div class="form-group{{ $errors->has('gambar') ? ' has-error' : '' }}">
                <label for="gambar" class="col-sm-4 control-label">Gambar :</label>

                <div class="col-sm-8">
                  {!! generateImagePath('kerjasama-luar-negeri', $kerjasama->gambar, $kerjasama->judul) !!}
                  <input type="file" class="form-control-static" id="gambar" name="gambar">
                  <small>(jpeg, png, bmp, gif, or svg)</small>

                  @if ($errors->has('gambar'))
                    <span class="help-block">{{ $errors->first('gambar') }}</span>
                  @endif
                </div>
              </div>
            </div>
          @else
            <h1 class="text-center">Data Tidak Ditemukan</h1>
          @endif
          </div>
          <!-- /.box-body -->
          @if($kerjasama)
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
      CKEDITOR.replace('nomor');
      CKEDITOR.replace('pihak');
      CKEDITOR.replace('summary');
      CKEDITOR.replace('keterangan');
      $('#tahun').datepicker({
        autoclose: true,
        format: 'yyyy',
        minViewMode: 'years'
      });
    })
  </script>
@endsection