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
        <form class="form-horizontal">
          <div class="box-body">
            <div class="form-group">
              <label for="username" class="col-sm-4 control-label">Username :</label>

              <div class="col-sm-4">
                <p class="form-control-static">{{ $user->username }}</p>
              </div>
            </div>
            <div class="form-group">
              <label for="email" class="col-sm-4 control-label">Email :</label>

              <div class="col-sm-4">
                <p class="form-control-static">{{ $user->email }}</p>
              </div>
            </div>
            <div class="form-group">
              <label for="first_name" class="col-sm-4 control-label">Nama Depan :</label>

              <div class="col-sm-4">
                <p class="form-control-static">{{ $user->first_name }}</p>
              </div>
            </div>
            <div class="form-group">
              <label for="last_name" class="col-sm-4 control-label">Nama Belakang :</label>

              <div class="col-sm-4">
                <p class="form-control-static">{{ $user->last_name }}</p>
              </div>
            </div>
            <div class="form-group">
              <label for="role" class="col-sm-4 control-label">Role :</label>

              <div class="col-sm-4">
                <p class="form-control-static">{{ ucwords($user->role) }}</p>
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
@endsection
