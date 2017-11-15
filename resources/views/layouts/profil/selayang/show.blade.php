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
        <li><a href="{{ route('selayang-pandang.index') }}">Selayang Pandang</a></li>
        <li class="active">{{ $page['title'] }}</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="box">
        <div class="box-header">
          <a href="{{ route('selayang-pandang.index') }}" class="btn btn-default">
            <i class="fa fa-arrow-left"></i>
            <span>Kembali</span>
          </a>
        </div>
        <!-- /.box-header -->
        <form class="form-horizontal">
          <div class="box-body">
            <div class="form-group">
              <label for="judul" class="col-sm-4 control-label">Judul :</label>

              <div class="col-sm-4">
                <p class="form-control-static">{{ $selayang->judul }}</p>
              </div>
            </div>
            <div class="form-group">
              <label for="isi" class="col-sm-4 control-label">Isi :</label>

              <div class="col-sm-7">
                <p class="form-control-static">{!! $selayang->isi !!}</p>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-4 control-label">Aktif :</label>

              <div class="col-sm-4">
                <div class="checkbox">
                  <label class="no-padding">
                    <input type="checkbox" class="flat-red" id="aktif" name="aktif" disabled {{ $selayang->aktif ? 'checked' : '' }}>
                  </label>
                </div>
              </div>
            </div>
          </div>
          <!-- /.box-body -->
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
