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
        <li class="active">{{ $page['breadcrumb'] }}</li>
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
        <form class="form-horizontal" method="POST" action="{{ route('selayang-pandang.update', $selayang->slug) }}">
          {{ csrf_field() }}
          {{ method_field('PUT') }}
          <input type="hidden" name="id" value="{{ $selayang->id }}">
          <div class="box-body">
            <div class="form-group{{ $errors->has('judul') ? ' has-error' : '' }}">
              <label for="judul" class="col-sm-4 control-label">Judul<span class="required">*</span> :</label>

              <div class="col-sm-4">
                <input type="text" class="form-control" id="judul" name="judul" value="{{ old('judul', $selayang->judul) }}" placeholder="Judul" required>
                <small>Judul tidak boleh sama</small>

                @if ($errors->has('judul'))
                  <span class="help-block">{{ $errors->first('judul') }}</span>
                @endif
              </div>
            </div>
            <div class="form-group{{ $errors->has('isi') ? ' has-error' : '' }}">
              <label for="isi" class="col-sm-4 control-label">Isi<span class="required">*</span> :</label>

              <div class="col-sm-7">
                <textarea class="form-control" id="isi" name="isi" rows="10" placeholder="Isi" required>{{ old('isi', $selayang->isi) }}</textarea>

                @if ($errors->has('isi'))
                  <span class="help-block">{{ $errors->first('isi') }}</span>
                @endif
              </div>
            </div>
            <div class="form-group{{ $errors->has('aktif') ? ' has-error' : '' }}">
              <label class="col-sm-4 control-label">Aktif :</label>

              <div class="col-sm-4">
                <div class="checkbox">
                  <label class="no-padding">
                    <input type="checkbox" class="flat-red" id="aktif" name="aktif" {{ old('aktif', $selayang->aktif) ? 'checked' : '' }}> <small>(Jika diceklis maka data yang lain akan otomatis tidak aktif)</small>
                  </label>
                </div>

                @if ($errors->has('aktif'))
                  <span class="help-block">{{ $errors->first('aktif') }}</span>
                @endif
              </div>
            </div>
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <div class="col-sm-offset-4 col-sm-4">
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
      CKEDITOR.replace('isi');
    })
  </script>
@endsection
