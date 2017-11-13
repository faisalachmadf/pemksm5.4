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
 
<form action="/adminpanel/sambutan/{{$sambutans->id}}" method="POST">
  <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Sambutan</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
             
                <!-- text input -->
                <div class="form-group">
                  <label>Nama</label>
                  <input type="text" name="nama" value="{{$sambutans->nama}}" class="form-control" placeholder="Masukan Nama Kepala OPD...">{{ ($errors->has('nama')) ? $errors->first('nama') : ''}}
                </div>
                                
              

                <div class="form-group">
                  <label>Jabatan</label>
                  <input type="text" name="jabatan" class="form-control" value="{{$sambutans->jabatan}}" placeholder="Masukan jabatan Kepala OPD ...">
                  {{ ($errors->has('jabatan')) ? $errors->first('jabatan') : ''}}
                </div>

                <div class="form-group">
                  <label>gambar</label>
                  <input type="text" name="gambar" class="form-control" value="{{$sambutans->gambar}}" placeholder="Masukan jabatan Kepala OPD ...">
                  {{ ($errors->has('gambar')) ? $errors->first('gambar') : ''}}
                </div>
                
                <!-- Isi -->
                <div class="form-group">
                  <label>Isi Sambutan</label>
                  <input class="form-control" name="isi"   value="{{$sambutans->isi}}"placeholder="Masukan Isi Sambutan ...">
                 
                  {{ ($errors->has('isi')) ? $errors->first('isi') :''}}
                </div>
 <input type="hidden" name="_method" value="put"> 
             
               <input type="hidden"> {{ csrf_field() }} 
                </div>

            
            </div>
            
            <!-- /.box-body -->

<input type="submit" class="btn btn-primary" value="Edit">
 <a href="{{ route('sambutan.index') }}" class="btn  btn-danger"> Cancel </a>
</form>



  
  
  
  
 


    </section>
    <!-- /.content -->
  </div>
  
@endsection