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
        <li><a href="{{ route('struktur-organisasi.index') }}">Struktur Organisasi</a></li>
        <li class="active">{{ $page['breadcrumb'] }}</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="box">
        <div class="box-header">
          <a href="{{ route('struktur-organisasi.index') }}" class="btn btn-default">
            <i class="fa fa-arrow-left"></i>
            <span>Kembali</span>
          </a>
        </div>
        <!-- /.box-header -->
        <form class="form-horizontal" method="POST" action="{{ route('struktur-organisasi.store') }}" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="box-body">
            <div class="col-sm-5">
              <div class="form-group{{ $errors->has('nip') ? ' has-error' : '' }}">
                <label for="nip" class="col-sm-4 control-label">NIP<span class="required">*</span> :</label>

                <div class="col-sm-8">
                  <input type="text" class="form-control" id="nip" name="nip" value="{{ old('nip') }}" placeholder="NIP" required>
                  <small>NIP tidak boleh sama</small>

                  @if ($errors->has('nip'))
                    <span class="help-block">{{ $errors->first('nip') }}</span>
                  @endif
                </div>
              </div>
              <div class="form-group{{ $errors->has('nama') ? ' has-error' : '' }}">
                <label for="nama" class="col-sm-4 control-label">Nama Pegawai<span class="required">*</span> :</label>

                <div class="col-sm-8">
                  <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama') }}" placeholder="Nama Pegawai" required>

                  @if ($errors->has('nama'))
                    <span class="help-block">{{ $errors->first('nama') }}</span>
                  @endif
                </div>
              </div>
               <div class="form-group{{ $errors->has('jabatan') ? ' has-error' : '' }}">
                <label for="jabatan" class="col-sm-4 control-label">jabatan Pegawai<span class="required">*</span> :</label>

                <div class="col-sm-8">
                  <input type="text" class="form-control" id="jabatan" name="jabatan" value="{{ old('jabatan') }}" placeholder="jabatan Pegawai" required>

                  @if ($errors->has('jabatan'))
                    <span class="help-block">{{ $errors->first('jabatan') }}</span>
                  @endif
                </div>
              </div>
              <div class="form-group{{ $errors->has('id_katbagian') ? ' has-error' : '' }}">
                <label for="id_katbagian" class="col-sm-4 control-label">Bagian<span class="required">*</span> :</label>

                <div class="col-sm-8">
                  <select class="form-control" id="id_katbagian" name="id_katbagian" required>
                    <option value="">Pilih Bagian</option>
                    @foreach($katbagian as $bagian)
                      <option value="{{ $bagian->id }}" {{ old('id_katbagian') == $bagian->id ? 'selected' : '' }}>{{ $bagian->name }}</option>
                    @endforeach
                  </select>

                  @if ($errors->has('id_katbagian'))
                    <span class="help-block">{{ $errors->first('id_katbagian') }}</span>
                  @endif
                </div>
              </div>
              <div class="form-group{{ $errors->has('id_katjabatan') ? ' has-error' : '' }}">
                <label for="id_katjabatan" class="col-sm-4 control-label">Jabatan<span class="required">*</span> :</label>

                <div class="col-sm-8">
                  <select class="form-control" id="id_katjabatan" name="id_katjabatan" required>
                    <option value="">Pilih Kategori Jabatan</option>
                    @foreach($katjabatan as $jabatan)
                      <option value="{{ $jabatan->id }}" {{ old('id_katjabatan') == $jabatan->id ? 'selected' : '' }}>{{ $jabatan->name }}</option>
                    @endforeach
                  </select>

                  @if ($errors->has('id_katjabatan'))
                    <span class="help-block">{{ $errors->first('id_katjabatan') }}</span>
                  @endif
                </div>
              </div>
              <div class="form-group{{ $errors->has('id_katgolongan') ? ' has-error' : '' }}">
                <label for="id_katgolongan" class="col-sm-4 control-label">Golongan<span class="required">*</span> :</label>

                <div class="col-sm-8">
                  <select class="form-control" id="id_katgolongan" name="id_katgolongan" required>
                    <option value="">Pilih Golongan</option>
                    @foreach($katgolongan as $golongan)
                      <option value="{{ $golongan->id }}" {{ old('id_katgolongan') == $golongan->id ? 'selected' : '' }}>{{ $golongan->name }}</option>
                    @endforeach
                  </select>

                  @if ($errors->has('id_katgolongan'))
                    <span class="help-block">{{ $errors->first('id_katgolongan') }}</span>
                  @endif
                </div>
              </div>
              <div class="form-group{{ $errors->has('mulaijabat') ? ' has-error' : '' }}">
                <label for="mulaijabat" class="col-sm-4 control-label">Mulai Menjabat<span class="required">*</span> :</label>

                <div class="col-sm-8">
                  <div class="input-group date">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" class="form-control datepicker" id="mulaijabat" name="mulaijabat" value="{{ old('mulaijabat', date('d/m/Y')) }}" placeholder="dd/mm/yyyy" required>
                  </div>

                  @if ($errors->has('mulaijabat'))
                    <span class="help-block">{{ $errors->first('mulaijabat') }}</span>
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
            <div class="col-sm-7">
              <div class="form-group{{ $errors->has('pendidikan') ? ' has-error' : '' }}">
                <label for="pendidikan" class="col-sm-3 control-label">Pendidikan<span class="required">*</span> :</label>

                <div class="col-sm-9">
                  <textarea class="form-control" id="pendidikan" name="pendidikan" rows="10" placeholder="Pendidikan" required>{{ old('pendidikan') }}</textarea>

                  @if ($errors->has('pendidikan'))
                    <span class="help-block">{{ $errors->first('pendidikan') }}</span>
                  @endif
                </div>
              </div>
              <div class="form-group{{ $errors->has('riwayatkerja') ? ' has-error' : '' }}">
                <label for="riwayatkerja" class="col-sm-3 control-label">Riwayat Kerja<span class="required">*</span> :</label>

                <div class="col-sm-9">
                  <textarea class="form-control" id="riwayatkerja" name="riwayatkerja" rows="10" placeholder="Riwayat Kerja" required>{{ old('riwayatkerja') }}</textarea>

                  @if ($errors->has('riwayatkerja'))
                    <span class="help-block">{{ $errors->first('riwayatkerja') }}</span>
                  @endif
                </div>
              </div>
            </div>
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <div class="col-sm-offset-5 col-sm-7">
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
      CKEDITOR.replace('pendidikan');
      CKEDITOR.replace('riwayatkerja');
    })
  </script>
@endsection
