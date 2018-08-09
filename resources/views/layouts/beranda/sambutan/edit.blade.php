@extends('layouts.adminlte')

@section('title', 'Admin Dashboard')

@section('customCss')
@endsection


@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <a href="{{ route('sambutan.index') }}" class="btn btn-danger">
        <i class="fa fa-arrow-left"></i>
        <span>Cancel</span>
        </a>
    </section>

    <!-- Main content -->
    <section class="content">
 
<form action="/pemksmv4/public/adminpanel/sambutan/{{$sambutans->id}}" method="POST" enctype="multipart/form-data">
  <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Ubah Sambutan</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
          
                <!-- text input -->
                <div class="form-group">
                  <label>Nama<span class="required">*</span></label>
                  <input type="text" name="nama" value="{{$sambutans->nama}}" class="form-control" placeholder="Masukan Nama Kepala OPD..."> <span class="required">{{ ($errors->has('nama')) ? $errors->first('nama') : ''}}</span>
                </div>
                                
              

                <div class="form-group">
                  <label>Jabatan<span class="required">*</span></label>
                  <input type="text" name="jabatan" class="form-control" value="{{$sambutans->jabatan}}" placeholder="Masukan jabatan Kepala OPD ...">
                  <span class="required">{{ ($errors->has('jabatan')) ? $errors->first('jabatan') : ''}}</span>
                </div>

                <div class="form-group">
                  <label>gambar awal </label>
                  <img src="{{ asset('image/umum/'. $sambutans->gambar) }}" class="img-responsive"  width="200px">
                  <label>gambar<span class="required">*</span></label><br/>
                  <input type="file"  name="gambar" class="form-control"><span class="required">jika tidak ada perubahan gambar, abaikan saja</span>
                
                  <br/> <b><span class="required">{{ ($errors->has('gambar')) ? $errors->first('gambar') : ''}}</span></b>
                </div>
                
                <!-- Isi -->
                <div class="box-body pad">
                    <label>Isi Sambutan</label>
                    <textarea class="ckeditor" name="isi" rows="10" cols="80">
                    {{$sambutans->isi}}
                    </textarea><span class="required">{{ ($errors->has('isi')) ? $errors->first('isi') :''}}</span>
             
            </div>
                
 <input type="hidden" name="_method" value="put"> 
             
               <input type="hidden"> {{ csrf_field() }} 
                </div>

            
            </div>
            
            <!-- /.box-body -->

<input type="submit" class="btn btn-primary" value="Edit">
</form>



  
  
  
  
 


    </section>
    <!-- /.content -->
  </div>
  
@endsection