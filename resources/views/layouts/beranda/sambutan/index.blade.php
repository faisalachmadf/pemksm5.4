@extends('layouts.adminlte')

@section('title', 'Admin Dashboard')

@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
 
        <small>Sambutan</small>
  
     
    </section>

    <!-- Main content -->
    <section class="content">
 

<div class="box">
            <div class="box-header">
              <h3 class="box-title">Sambutan</h3>
            </div>
            
            <div>

            <a href="{{ route('sambutan.create') }}" class="btn btn-primary btn-sm
rounded pullright"> Tambah baru </a>
          </div>


            <!-- /.box-header -->
            <div class="box-body">
              
            <div   class="alert alert-success alert-dismissible ">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                
                {{ Session::get('message')}}
              </div>

              <table id="example1" class="table table-bordered table-striped">
                <br/>
                <thead>
                <tr role="row">
                  <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 177px;">gambar</th>
                 <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 177px;">nama</th>
                  <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 150px;">Jabatan</th>
                  
                 
                  <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 200px;">Isi</th>
                  <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 177px;">Aksi</th>
                </tr>
                </thead>
                <tbody>

                @foreach($sambutans as $sambutan)               
                <tr>
                

                   <td> <img src="{{ url('public/umum') }} / {{ $sambutan->gambar }}" class="img-responsive"> </td>
                  <td> {{ $sambutan->nama }} </td>
                  <td> {{ $sambutan->jabatan }}</td>
                  <td> {!!$sambutan->isi!!} </td>
                  <td> 
                   
                    <!-- untuk preview -->
          
                  <a href="/adminpanel/sambutan/{{$sambutan->id}}"> <button type="button" class="btn btn-info">
                 Preview
              </button></a>
              
                  

                   <a href="/adminpanel/sambutan/{{$sambutan->id}}/edit"> <button  type="button"  class="btn  btn-warning">Edit</button></a>

                   <form  action="/adminpanel/sambutan/{{$sambutan->id}}" method="post">
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
