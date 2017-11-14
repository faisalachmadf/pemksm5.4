@extends('layouts.adminlte')

@section('title', 'Admin Dashboard')

@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
 
        <small>Aplikasi Online</small>
  
     
    </section>

    <!-- Main content -->
    <section class="content">
 
<div   class="alert alert-success alert-dismissible ">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                
                {{ Session::get('message')}}
              </div>
<div class="box">
            <div class="box-header">
              <h3 class="box-title">Aplikasi Online</h3>
            </div>
            <div>

            <a href="{{ route('aplikasi.create') }}" class="btn btn-primary btn-sm
rounded pullright"><i class="fa fa-plus-circle"></i> Tambah baru </a>
          </div>


            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <br/>
                <thead>
                <tr role="row">
                     <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 10px;">No</th>
                  <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 70px;">gambar</th>
                 <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 177px;">judul</th>
                 
                  
                 
                
                  <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 177px;">Aksi</th>
                </tr>
                </thead>
                <tbody>
                 <?php $no = 0;?>
                @foreach($aplikasis as $aplikasi)   
                <?php $no++ ;?>              
                <tr>
                  <td>{{ $no }}
                  </td>
                   <td>  
                  
             <img src="{{ asset('image/beranda/'. $aplikasi->gambar) }}" class="img-responsive"  width="100px"> </td>
                   <td> {{ $aplikasi->judul }} </td>
                 <td>
                    <a href="/adminpanel/aplikasi/{{$aplikasi->id}}"> <button type="button" class="btn btn-info">
                 Preview
              </button></a>
              
                  

                   <a href="/adminpanel/aplikasi/{{$aplikasi->id}}/edit"> <button  type="button"  class="btn  btn-warning">Edit</button></a>

                   <form  action="/adminpanel/aplikasi/{{$aplikasi->id}}" method="post">
                    <input type="hidden" name="_method" value="Delete">
                     <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    <input type="submit" class="btn  btn-danger" value="Delete">
                  </form>
                </td>

                  
                </tr>
               @endforeach
                </tbody>
                
              </table>
            </div>
            <!-- /.box-body -->
          </div>
  
  
  
  
 


    </section>
    <!-- /.content -->
  </div>
  
@endsection