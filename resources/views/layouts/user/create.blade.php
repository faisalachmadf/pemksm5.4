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
        <li><a href="{{ route('user.index') }}">List User</a></li>
        <li class="active">{{ $page['title'] }}</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="box">
        <div class="box-header">
          <a href="{{ route('user.index') }}" class="btn btn-default">
            <i class="fa fa-arrow-left"></i>
            <span>Kembali</span>
          </a>
        </div>
        <!-- /.box-header -->
        <form class="form-horizontal" method="POST" action="{{ route('user.store') }}">
          {{ csrf_field() }}
          <div class="box-body">
            <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
              <label for="username" class="col-sm-4 control-label">Username<span class="required">*</span> :</label>

              <div class="col-sm-4">
                <input type="text" class="form-control" id="username" name="username" value="{{ old('username') }}" placeholder="Username" required>

                @if ($errors->has('username'))
                  <span class="help-block">{{ $errors->first('username') }}</span>
                @endif
              </div>
            </div>
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
              <label for="email" class="col-sm-4 control-label">Email<span class="required">*</span> :</label>

              <div class="col-sm-4">
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="email@domain.com" required>

                @if ($errors->has('email'))
                  <span class="help-block">{{ $errors->first('email') }}</span>
                @endif
              </div>
            </div>
            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
              <label for="password" class="col-sm-4 control-label">Password<span class="required">*</span> :</label>

              <div class="col-sm-4">
                <input type="password" class="form-control" id="password" name="password" value="{{ old('password') }}" placeholder="Password" required>
                <small>Minimal 8 karakter</small>

                @if ($errors->has('password'))
                  <span class="help-block">{{ $errors->first('password') }}</span>
                @endif
              </div>
            </div>
            <div class="form-group{{ $errors->has('konfirmasi_password') ? ' has-error' : '' }}">
              <label for="konfirmasi_password" class="col-sm-4 control-label">Ulangi Password<span class="required">*</span> :</label>

              <div class="col-sm-4">
                <input type="password" class="form-control" id="konfirmasi_password" name="konfirmasi_password" value="{{ old('password') }}" placeholder="Ulangi Password" required>

                @if ($errors->has('konfirmasi_password'))
                  <span class="help-block">{{ $errors->first('konfirmasi_password') }}</span>
                @endif
              </div>
            </div>
            <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
              <label for="first_name" class="col-sm-4 control-label">Nama Depan :</label>

              <div class="col-sm-4">
                <input type="text" class="form-control" id="first_name" name="first_name" value="{{ old('first_name') }}" placeholder="Nama Depan">

                @if ($errors->has('first_name'))
                  <span class="help-block">{{ $errors->first('first_name') }}</span>
                @endif
              </div>
            </div>
            <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
              <label for="last_name" class="col-sm-4 control-label">Nama Belakang :</label>

              <div class="col-sm-4">
                <input type="text" class="form-control" id="last_name" name="last_name" value="{{ old('last_name') }}" placeholder="Nama Belakang">

                @if ($errors->has('last_name'))
                  <span class="help-block">{{ $errors->first('last_name') }}</span>
                @endif
              </div>
            </div>
            <div class="form-group{{ $errors->has('role') ? ' has-error' : '' }}">
              <label for="role" class="col-sm-4 control-label">Role<span class="required">*</span> :</label>

              <div class="col-sm-4">
                <select class="form-control" id="role" name="role" required>
                  <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                  <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>User</option>
                </select>

                @if ($errors->has('role'))
                  <span class="help-block">{{ $errors->first('role') }}</span>
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
@endsection
