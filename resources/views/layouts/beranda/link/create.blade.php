@extends('layouts.adminlte')

@section('title', 'Admin Dashboard')




@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
 
         <a href="{{ route('link.index') }}" class="btn btn-danger">
            <i class="fa fa-arrow-left"></i>
            <span>Kembali</span>
          </a>
      
    </section>
  
      
    <!-- Main content -->
    <section class="content">
 
    <form action="/pemksm5.4/public/adminpanel/link" method="POST" enctype="multipart/form-data">
        <div class="box box-warning">
                  <div class="box-header with-border">
                     <h3 class="box-title">Masukan link yang terkait</h3>
                  </div>
            <!-- /.box-header -->
                <div class="box-body">
                 
                    <!-- text input -->

                    <div class="form-group">
                      <label>Nama link terkait Biro</label>
                      <input type="text" name="judul" class="form-control" placeholder="Masukan Nama link ...">
                      {{ ($errors->has('judul')) ? $errors->first('judul') : ''}}
                    </div>
                      <div class="form-group">
                      <label>Link </label>
                      <input type="text" name="link" class="form-control" placeholder="Masukan Link link ...">
                      {{ ($errors->has('link')) ? $errors->first('link') : ''}}
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