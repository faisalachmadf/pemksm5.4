@extends('layouts.adminlte')

@section('title', 'Admin Dashboard')

@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Aplikasi Online</h1>
    </section>


    <!-- Main content -->
    <section class="content">
        <div class="box">
            <div class="box-header">
               <a href="{{ route('aplikasi.create') }}" class="btn btn-primary">
                   <i class="fa fa-plus-circle"></i>
                    <span>Tambah Aplikasi online</span>
               </a>
             </div>

           
            <!-- Body -->
            <div class="box-body">
               <div   class="alert alert-success alert-dismissible ">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                
                {{ Session::get('message')}}
              </div>


              <table id="example1" class="table table-bordered table-striped">
                <br/>
                <thead>
                <tr role="row">
                     <th style="width: 20px;">No</th>
                  <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 200px;">gambar</th>
                 <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 177px;">judul</th>
                 <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 177px;">link</th>
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
                   <img src="{{ asset('image/beranda/'. $aplikasi->gambar) }}" class="img-responsive"  width="200px" height="200px"> </td>
                         <td> {{ $aplikasi->judul }} </td>
                          <td> <a href="{{ $aplikasi->link }}">{{ $aplikasi->link }} </a> </td>
                       

                    <td>
                        <a href="/adminpanel/aplikasi/{{$aplikasi->id}}" class="btn btn-info">
                          <i class="fa fa-book"></i>
                        <span>Detil</span></a>
                        
                      
                        <a href="/adminpanel/aplikasi/{{$aplikasi->id}}/edit" class="btn btn-warning">
                            <i class="fa fa-edit"></i>
                        <span>Edit</span></a>

                        <form  action="/adminpanel/aplikasi/{{$aplikasi->id}}" method="post">
                          <input type="hidden" name="_method" value="Delete">
                           <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                          <input type="submit" onclick="return confirm('Yakin akan di hapus?')" class="btn  btn-danger" value="Delete">
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