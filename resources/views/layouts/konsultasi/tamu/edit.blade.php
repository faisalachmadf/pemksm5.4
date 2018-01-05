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
        <li><a href="{{ route('tamu.index') }}">tamu</a></li>
        <li class="active">{{ $page['breadcrumb'] }}</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="box">
        <div class="box-header">
          <a href="{{ route('tamu.index') }}" class="btn btn-default">
            <i class="fa fa-arrow-left"></i>
            <span>Kembali</span>
          </a>
        </div>
        <!-- /.box-header -->
        <form class="form-horizontal" method="POST" action="{{ route('tamu.update', @$tamu->slug) }}" enctype="multipart/form-data">
          {{ csrf_field() }}
          {{ method_field('PUT') }}
          <input type="hidden" name="id" value="{{ @$tamu->id }}">
          <div class="box-body">
          @if($tamu)
            <div class="form-group{{ $errors->has('nama') ? ' has-error' : '' }}">
              <label for="nama" class="col-sm-4 control-label">nama<span class="required">*</span> :</label>

              <div class="col-sm-4">
                <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama', $tamu->nama) }}" placeholder="nama" required>
                <small>nama tidak boleh sama</small>

                @if ($errors->has('nama'))
                  <span class="help-block">{{ $errors->first('nama') }}</span>
                @endif
              </div>
            </div>
             <div class="form-group{{ $errors->has('dari') ? ' has-error' : '' }}">
                <label for="dari" class="col-sm-4 control-label">dari<span class="required">*</span> :</label>

                <div class="col-sm-8">
                  <input type="text" class="form-control" id="dari" name="dari" value="{{ old('dari',$tamu->dari) }}" placeholder="dari tamu" required>

                  @if ($errors->has('dari'))
                    <span class="help-block">{{ $errors->first('dari') }}</span>
                  @endif
                </div>
              </div> <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email" class="col-sm-4 control-label">email tamu<span class="required">*</span> :</label>

                <div class="col-sm-8">
                  <input type="text" class="form-control" id="email" name="email" value="{{ old('email',$tamu->email) }}" placeholder="email tamu" required>

                  @if ($errors->has('email'))
                    <span class="help-block">{{ $errors->first('email') }}</span>
                  @endif
                </div>
              </div>
            <div class="form-group{{ $errors->has('isi') ? ' has-error' : '' }}">
              <label for="isi" class="col-sm-4 control-label">Isi<span class="required">*</span> :</label>

              <div class="col-sm-7">
                <textarea class="form-control" id="isi" name="isi" rows="10" placeholder="Isi" required>{{ old('isi', $tamu->isi) }}</textarea>

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
          @if($tamu)
          <div class="box-footer">
            <div class="col-sm-offset-4 col-sm-4">
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