@extends('layouts.adminlte')

@section('title', 'Admin Dashboard')





@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
 
         <a href="{{ route('sambutan.index') }}" class="btn btn-danger">
            <i class="fa fa-arrow-left"></i>
            <span>Kembali</span>
          </a>
      
    </section>

    <!-- Main content -->
    <section class="content">
  
    <form action="/adminpanel/sambutan" method="POST" enctype="multipart/form-data">
      <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Masukan Sambutan</h3>
            </div>
            <!-- /.box-header -->
                  <div class="box-body">
                   
                      <!-- text input -->
                          <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="nama" class="form-control" placeholder="Masukan Nama Kepala OPD...">{{ ($errors->has('nama')) ? $errors->first('nama') : ''}}
                          </div>
                                      
                          <div class="form-group">
                            <label>Jabatan</label>
                            <input type="text" name="jabatan" class="form-control" placeholder="Masukan jabatan Kepala OPD ...">
                            {{ ($errors->has('jabatan')) ? $errors->first('jabatan') : ''}}
                          </div>

                          <label>gambar</label>
                          <br/>
                          <div class="form-group">
                              <input type="file"  name="gambar" class="form-control">
                              {{ ($errors->has('gambar')) ? $errors->first('gambar') : ''}}
                          </div>  

                          <input type="hidden">  {{ csrf_field() }} 
                    </div>
            </div>
           

                            <div class="box">
                              <div class="box-header">
                                 <label>Isi Sambutan</label>
                               
                              </div>
                              



                              <div class="box-body pad">
                               
                                      <textarea class="ckeditor" name="isi" rows="10" cols="80">
                                      
                                      </textarea>{{ ($errors->has('isi')) ? $errors->first('isi') :''}}
                               
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