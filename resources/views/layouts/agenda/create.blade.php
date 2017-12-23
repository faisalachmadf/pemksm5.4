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
        <li><a href="{{ route('agenda.index') }}">agenda Biro</a></li>
        <li class="active">{{ $page['breadcrumb'] }}</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="box">
        <div class="box-header">
          <a href="{{ route('agenda.index') }}" class="btn btn-default">
            <i class="fa fa-arrow-left"></i>
            <span>Kembali</span>
          </a>
        </div>
        <!-- /.box-header -->
        <form class="form-horizontal" method="POST" action="{{ route('agenda.store') }}" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="box-body">
             <div class="form-group{{ $errors->has('id_katbagian') ? ' has-error' : '' }}">
              <label for="id_katbagian" class="col-sm-4 control-label">Agenda Bagian<span class="required">*</span> :</label>

              <div class="col-sm-4">
                <select class="form-control" id="id_katbagian" name="id_katbagian" required>
                  @foreach($katbagian as $agenda)
                    <option value="{{ $agenda->id }}" {{ old('id_katbagian') == $agenda->id ? 'selected' : '' }}>{{ $agenda->name }}</option>
                  @endforeach
                </select>

                @if ($errors->has('id_katbagian'))
                  <span class="help-block">{{ $errors->first('id_katbagian') }}</span>
                @endif
              </div>
            </div>
            <div class="form-group{{ $errors->has('judul') ? ' has-error' : '' }}">
              <label for="judul" class="col-sm-4 control-label">Judul<span class="required">*</span> :</label>

              <div class="col-sm-4">
                <input type="text" class="form-control" id="judul" name="judul" value="{{ old('judul') }}" placeholder="Judul" required>
                <small>Judul Acara tidak boleh sama</small>

                @if ($errors->has('judul'))
                  <span class="help-block">{{ $errors->first('judul') }}</span>
                @endif
              </div>
            </div>
           
            <div class="form-group{{ $errors->has('tanggal') ? ' has-error' : '' }}">
              <label for="tanggal" class="col-sm-4 control-label">Tanggal Acara<span class="required">*</span> :</label>

              <div class="col-sm-4">
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control datepicker" id="tanggal" name="tanggal" value="{{ old('tanggal', date('d/m/Y')) }}" placeholder="dd/mm/yyyy" required>
                </div>

                @if ($errors->has('tanggal'))
                  <span class="help-block">{{ $errors->first('tanggal') }}</span>
                @endif
              </div>
            </div>
           
            <div class="form-group{{ $errors->has('jam') ? ' has-error' : '' }}">
              <label for="jam" class="col-sm-4 control-label">jam<span class="required">*</span> :</label>

              <div class="col-sm-4">
                <input type="text" class="form-control" id="jam" name="jam" value="{{ old('jam') }}" placeholder="jam" required>
                <small>Contoh : 10.00 WIB, 15.00 WIB, 20.00 WIB</small>

                @if ($errors->has('jam'))
                  <span class="help-block">{{ $errors->first('jam') }}</span>
                @endif
              </div>
            </div>

               <div class="form-group{{ $errors->has('lokasi') ? ' has-error' : '' }}">
              <label for="lokasi" class="col-sm-12">lokasi<span class="required">*</span></label>

              <div class="col-sm-12">
                <textarea class="form-control" id="lokasi" name="lokasi" placeholder="lokasi" required>{{ old('lokasi') }}</textarea>

                @if ($errors->has('lokasi'))
                  <span class="help-block">{{ $errors->first('lokasi') }}</span>
                @endif
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


