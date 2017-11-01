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
              <h3 class="box-title">Masukan Agenda</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
             <div class="form-group">
                <label>Tanggal</label>

                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" name="tanggal" id="datepicker"> 
                  {{ ($errors->has('tanggal')) ? $errors->first('tanggal') : ''}}
                </div>
                <!-- /.input group -->
              </div> 

                <!-- text input -->
                <div class="form-group">
                  <label>Jam</label>
                  <input type="text" name="jam" class="form-control" placeholder="contoh : 09.00 , 14.00, 13.00 s.d 15 ...">{{ ($errors->has('jam')) ? $errors->first('jam') : ''}}
                </div>
                                
                <!-- select -->
                <div class="form-group">
                  <label>Bagian</label>
                  <select class="form-control" type="text" name="id_katbagian">
                    {{ ($errors->has('bagian')) ? $errors->first('bagian') : ''}}
                    <option>Bagian ...</option>
                    <option>option 2</option>
                    <option>option 3</option>
                    <option>option 4</option>
                    
                  </select>
                </div>

                <div class="form-group">
                  <label>Nama Acara</label>
                  <input type="text" name="judul" class="form-control" placeholder="Masukan Nama Acara ...">
                  {{ ($errors->has('judul')) ? $errors->first('judul') : ''}}
                </div>
                
                <!-- Isi -->
                <div class="form-group">
                  <label>Isi Acara</label>
                  <textarea class="form-control" name="isi" rows="3" placeholder="Masukan Isi Acara tersebut ...">
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