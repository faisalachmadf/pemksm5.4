@extends('layouts.adminlte')

@section('title', 'Admin Dashboard')

@section('js')

<script type="text/javascript">

      function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#showgambar').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#inputgambar").change(function () {
        readURL(this);
    });

</script>

@stop



@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
 
        <small>Control panel</small>
  
      
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


                <img src="http://placehold.it/100x100" id="showgambar" style="max-width:200px;max-height:200px;float:left;" />
                <div class="form-group">
                  
                  <input type="file" id="inputgambar" name="gambar" class="form-control">
                  {{ ($errors->has('gambar')) ? $errors->first('gambar') : ''}}
                </div>
                
                <!-- Isi -->
               

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

<input type="submit" class="btn btn-primary" value="Posting">
 <a href="{{ route('sambutan.index') }}" class="btn  btn-danger"> Cancel </a>
</form>



  
  
  
  
 


    </section>
    <!-- /.content -->
  </div>
  
@endsection