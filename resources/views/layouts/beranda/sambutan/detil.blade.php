@extends('layouts.adminlte')

@section('title', 'Admin Dashboard')

@section('customCss')
@endsection


@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
 
        <h1>Detail</h1>
  
      
    </section>

    <!-- Main content -->

    <section class="content">

      <div class="box">
        <div class="box-header">
          <a href="{{ route('sambutan.index') }}" class="btn btn-danger">
            <i class="fa fa-arrow-left"></i>
            <span>Kembali</span>
          </a>
        </div>
        <!-- /.box-header -->
        <form class="form-horizontal">
          <div class="box-body">
            <div class="form-group">
              <label for="username" class="col-sm-4 control-label">Gambar :</label>

              <div class="col-sm-4">
                <p class="form-control-static"><img src="{{ asset('image/umum/'. $sambutans->gambar) }}" class="img-responsive"  width="600px"></p>
              </div>
            </div>
            <div class="form-group">
              <label for="email" class="col-sm-4 control-label">Nama :</label>

              <div class="col-sm-4">
                <p class="form-control-static">{{ $sambutans->nama }}</p>
              </div>
            </div>
            <div class="form-group">
              <label for="first_name" class="col-sm-4 control-label">Jabatan :</label>

              <div class="col-sm-4">
                <p class="form-control-static">{{ $sambutans->jabatan }}</p>
              </div>
            </div>
            <div class="form-group">
              <label for="last_name" class="col-sm-4 control-label">isi sambutan:</label>
              
              <div class="col-sm-4">
                <p class="form-control-static">{!! $sambutans->isi !!}</p>
              </div>
            </div>
           
          </div>
          <!-- /.box-body -->
        </form>
      </div>
  
    </section>






  
  
  
  
 


    </section>
    <!-- /.content -->
  </div>
  
@endsection



