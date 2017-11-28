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
        <li><a href="{{ route('kerjasama-dalam-negeri.index') }}">Dalam Negeri</a></li>
        <li class="active">{{ $page['breadcrumb'] }}</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="box">
        <div class="box-header">
          <a href="{{ route('kerjasama-dalam-negeri.index') }}" class="btn btn-default">
            <i class="fa fa-arrow-left"></i>
            <span>Kembali</span>
          </a>
        </div>
        <!-- /.box-header -->
        <form class="form-horizontal" method="POST" action="{{ route('kerjasama-dalam-negeri.store') }}" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="box-body">
            <div class="col-sm-6">
              <div class="form-group{{ $errors->has('id_katdn') ? ' has-error' : '' }}">
                <label for="id_katdn" class="col-sm-4 control-label">Kategori Kerjasama<span class="required">*</span> :</label>

                <div class="col-sm-8">
                  <select class="form-control" id="id_katdn" name="id_katdn" required>
                    <option value="">Pilih Kategori Kerjasama</option>
                    @foreach($katdn as $dn)
                      <option value="{{ $dn->id }}" {{ old('id_katdn') == $dn->id ? 'selected' : '' }}>{{ $dn->name }}</option>
                    @endforeach
                  </select>

                  @if ($errors->has('id_katdn'))
                    <span class="help-block">{{ $errors->first('id_katdn') }}</span>
                  @endif
                </div>
              </div>
              <div class="form-group{{ $errors->has('id_katjenisdn') ? ' has-error' : '' }}">
                <label for="id_katjenisdn" class="col-sm-4 control-label">Kategori Jenis Kerjasama<span class="required">*</span> :</label>

                <div class="col-sm-8">
                  <select class="form-control" id="id_katjenisdn" name="id_katjenisdn" required>
                    <option value="">Pilih Kategori Jenis Kerjasama</option>
                    @foreach($katjenisdn as $jenisdn)
                      <option value="{{ $jenisdn->id }}" {{ old('id_katjenisdn') == $jenisdn->id ? 'selected' : '' }}>{{ $jenisdn->name }}</option>
                    @endforeach
                  </select>

                  @if ($errors->has('id_katjenisdn'))
                    <span class="help-block">{{ $errors->first('id_katjenisdn') }}</span>
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
                    <input type="text" class="form-control" id="tahun" name="tahun" value="{{ old('tahun', date('Y')) }}" placeholder="yyyy" required>
                  </div>

                  @if ($errors->has('tahun'))
                    <span class="help-block">{{ $errors->first('tahun') }}</span>
                  @endif
                </div>
              </div>
              <div class="form-group{{ $errors->has('judul') ? ' has-error' : '' }}">
                <label for="judul" class="col-sm-4 control-label">Judul<span class="required">*</span> :</label>

                <div class="col-sm-8">
                  <input type="text" class="form-control" id="judul" name="judul" value="{{ old('judul') }}" placeholder="Judul" required>
                  <small>Judul tidak boleh sama</small>

                  @if ($errors->has('judul'))
                    <span class="help-block">{{ $errors->first('judul') }}</span>
                  @endif
                </div>
              </div>
              <div class="form-group{{ $errors->has('nomor') ? ' has-error' : '' }}">
                <label for="nomor" class="col-sm-4 control-label">Nomor<span class="required">*</span> :</label>

                <div class="col-sm-8">
                  <textarea class="form-control" id="nomor" name="nomor" placeholder="Nomor" required>{{ old('nomor') }}</textarea>

                  @if ($errors->has('nomor'))
                    <span class="help-block">{{ $errors->first('nomor') }}</span>
                  @endif
                </div>
              </div>
              <div class="form-group{{ $errors->has('pihak') ? ' has-error' : '' }}">
                <label for="pihak" class="col-sm-4 control-label">Pihak<span class="required">*</span> :</label>

                <div class="col-sm-8">
                  <textarea class="form-control" id="pihak" name="pihak" placeholder="Pihak" required>{{ old('pihak') }}</textarea>

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
                  <textarea class="form-control" id="summary" name="summary" placeholder="Summary" required>{{ old('summary') }}</textarea>

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
                    <input type="text" class="form-control daterange" id="tanggal" name="tanggal" value="{{ old('tanggal', date('d/m/Y').' - '.date('d/m/Y')) }}" placeholder="dd/mm/yyyy - dd/mm/yyyy" required>
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
                      <option value="{{ $opd->id }}" {{ old('id_katopd') == $opd->id ? 'selected' : '' }}>{{ $opd->name }}</option>
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
                  <textarea class="form-control" id="keterangan" name="keterangan" placeholder="Keterangan" required>{{ old('keterangan') }}</textarea>

                  @if ($errors->has('keterangan'))
                    <span class="help-block">{{ $errors->first('keterangan') }}</span>
                  @endif
                </div>
              </div>
              <div class="form-group{{ $errors->has('gambar') ? ' has-error' : '' }}">
                <label for="gambar" class="col-sm-4 control-label">Gambar<span class="required">*</span> :</label>

                <div class="col-sm-8">
                  <input type="file" class="form-control-static" id="gambar" name="gambar">
                  <small>(jpeg, png, bmp, gif, or svg)</small>

                  @if ($errors->has('gambar'))
                    <span class="help-block">{{ $errors->first('gambar') }}</span>
                  @endif
                </div>
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
