@extends('layouts.adminlte')

@section('title', 'Admin Dashboard')




@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
 
         <a href="{{ route('header.index') }}" class="btn btn-danger">
            <i class="fa fa-arrow-left"></i>
            <span>Kembali</span>
          </a>
      
    </section>
  
      
    <!-- Main content -->
    <section class="content">
 
    <form action="/pemksm5.4/public/adminpanel/header" method="POST" enctype="multipart/form-data">
        <div class="box box-warning">
                  <div class="box-header with-border">
                     <h3 class="box-title">Masukan header yang terkait</h3>
                  </div>
            <!-- /.box-header -->
                <div class="box-body">
                 
                    <!-- text input -->

                    <div class="form-group">
                      <label>Nama header terkait Biro</label>
                      <input type="text" name="judul" class="form-control" placeholder="Masukan Nama header ...">
                      {{ ($errors->has('judul')) ? $errors->first('judul') : ''}}
                    </div>
                      
                       <input type="hidden">  {{ csrf_field() }} 
                    <!-- Gambar -->
                    <div class="form-group">
                      <input type="file"  name="gambar" class="form-control">
                      {{ ($errors->has('gambar')) ? $errors->first('gambar') : ''}}
                    </div>

                   
                  </div>
          </div>
            
            <!-- /.box-body -->

 <input type="submit" onclick="return confirm('Sudah Benar Pengisiannya?')" class="btn btn-primary" value="Posting">
  <button type="reset" class="btn btn-default">Reset</button>

</form>



  
  
  
  
 


    </section>
    <!-- /.content -->
  </div>
  
@endsection