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
 
<form>
  <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Detil</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">



             <center>
                <!-- text input -->
                <div class="form-group">
                	gambar :<br/>

                  <label><img src="{{ asset('image/umum/'. $sambutans->gambar) }}" class="img-responsive"  width="600px"> </label>
                </div>
                                
              <hr/>

                <div class="form-group">
                	nama : <br/>
                  <label>{{ $sambutans->nama }}</label>
                </div>
<hr/>
                <div class="form-group">
                	jabatan :<br/>
                  <label>{{ $sambutans->jabatan }}</label>
                </div>
                 <hr/>
                <!-- Isi -->
                <div class="form-group">
                	isi : <br/>
                  <label>{!!$sambutans->isi!!}</label>
                </div>

             
             
                </div>
				</center>
            
            </div>
            
            <!-- /.box-body -->

 <a href="{{ route('sambutan.index') }}" class="btn  btn-danger"> Kembali </a>
</form>



  
  
  
  
 


    </section>
    <!-- /.content -->
  </div>
  
@endsection



