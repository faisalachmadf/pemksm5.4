@extends('layouts.adminlte')

@section('title', 'Admin Dashboard')

@section('customCss')
@endsection


@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
 
        <small>Control panel</small>
  
      
    </section>

    <!-- Main content -->
    <section class="content">
 
<form action="/adminpanel/agenda" method="POST">
  <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Masukan Sambutan</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
             
                <!-- text input -->
                <div class="form-group">
                  <label>Nama</label>
                  <input type="text" name="jam" class="form-control" placeholder="Masukan Nama Kepala OPD...">{{ ($errors->has('jam')) ? $errors->first('jam') : ''}}
                </div>
                                
              

                <div class="form-group">
                  <label>Jabatan</label>
                  <input type="text" name="judul" class="form-control" placeholder="Masukan jabatan Kepala OPD ...">
                  {{ ($errors->has('judul')) ? $errors->first('judul') : ''}}
                </div>
                
                <!-- Isi -->
                <div class="form-group">
                  <label>Isi Sambutan</label>
                  <textarea class="form-control" name="isi" rows="3" placeholder="Masukan Isi Sambutant ...">
                  </textarea>
                  {{ ($errors->has('isi')) ? $errors->first('isi') :''}}
                </div>

                
                </div>

            
            </div>
            
            <!-- /.box-body -->

<input type="submit" class="btn btn-primary" value="Posting">

</form>



  
  
  
  
 


    </section>
    <!-- /.content -->
  </div>
  
@endsection