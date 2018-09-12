@extends('layouts.adminlte')

@section('title', 'Admin Dashboard')

@section('customCss')
@endsection


@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <a href="{{ route('link.index') }}" class="btn btn-danger">
        <i class="fa fa-arrow-left"></i>
        <span>Cancel</span>
        </a>
    </section>

    <!-- Main content -->
    <section class="content">
 
<form action="/pemksm5.4/public/adminpanel/link/{{$links->id}}" method="POST" enctype="multipart/form-data">
  <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Ubah link terkait</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
          
                <!-- Body -->
                <div class="form-group">
                  <label>Nama link yang terkait<span class="required">*</span></label>
                  <input type="text" name="judul" class="form-control" value="{{$links->judul}}">
                  <span class="required">{{ ($errors->has('judul')) ? $errors->first('judul') : ''}}</span>
                </div>
                <div class="form-group">
                  <label>link<span class="required">*</span></label>
                  <input type="text" name="link" class="form-control" value="{{$links->link}}">
                  <span class="required">{{ ($errors->has('link')) ? $errors->first('link') : ''}}</span>
                </div>

                <div class="form-group">
                  
                  <label>gambar awal </label>
                  <img src="{{ asset('image/beranda/'. $links->gambar) }}" class="img-responsive"  width="200px">
                  <br/>
                  <label>gambar<span class="required">*</span></label><br/>
                  <input type="file"  name="gambar" class="form-control">
                  <span class="required">jika tidak ada perubahan gambar, abaikan saja</span>
                  <span class="required">{{ ($errors->has('gambar')) ? $errors->first('gambar') : ''}}</span>
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