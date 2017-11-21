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
        <form class="form-horizontal">
          <div class="box-body">
          @if($pegawai)
            <div class="col-sm-5">
              <div class="form-group">
                <label for="nip" class="col-sm-4 control-label">NIP :</label>

                <div class="col-sm-8">
                  <p class="form-control-static">{{ $pegawai->nip }}</p>
                </div>
              </div>
              <div class="form-group">
                <label for="nama" class="col-sm-4 control-label">Nama Pegawai :</label>

                <div class="col-sm-8">
                  <p class="form-control-static">{{ $pegawai->nama }}</p>
                </div>
              </div>
              <div class="form-group">
                <label for="katbagian" class="col-sm-4 control-label">Bagian :</label>

                <div class="col-sm-8">
                  <p class="form-control-static">{{ $pegawai->katbagian->name }}</p>
                </div>
              </div>
              <div class="form-group">
                <label for="katjabatan" class="col-sm-4 control-label">Jabatan :</label>

                <div class="col-sm-8">
                  <p class="form-control-static">{{ $pegawai->katjabatan->name }}</p>
                </div>
              </div>
              <div class="form-group">
                <label for="katgolongan" class="col-sm-4 control-label">Golongan :</label>

                <div class="col-sm-8">
                  <p class="form-control-static">{{ $pegawai->katgolongan->name }}</p>
                </div>
              </div>
              <div class="form-group">
                <label for="mulaijabat" class="col-sm-4 control-label">Mulai Menjabat :</label>

                <div class="col-sm-8">
                  <p class="form-control-static">{{ dateFormatIndo($pegawai->mulaijabat) }}</p>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-4 control-label">Gambar :</label>

                <div class="col-sm-8">
                  {!! generateImagePath('pegawai', $pegawai->gambar, $pegawai->nama) !!}
                </div>
              </div>
            </div>
            <div class="col-sm-7">
              <div class="form-group">
                <label for="pendidikan" class="col-sm-3 control-label">Pendidikan :</label>

                <div class="col-sm-9 form-control-static">
                  {!! $pegawai->pendidikan !!}
                </div>
              </div>
              <div class="form-group">
                <label for="riwayatkerja" class="col-sm-3 control-label">Riwayat Kerja :</label>

                <div class="col-sm-9 form-control-static">
                  {!! $pegawai->riwayatkerja !!}
                </div>
              </div>
            </div>
          @else
            <h1 class="text-center">Data Tidak Ditemukan</h1>
          @endif
          </div>
          <!-- /.box-body -->
        </form>
      </div>
  
    </section>
    <!-- /.content -->
  </div>
  
@endsection

@section('customJs')
@endsection
