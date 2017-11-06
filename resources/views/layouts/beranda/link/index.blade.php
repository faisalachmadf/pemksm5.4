@extends('layouts.adminlte')

@section('title', 'Admin Dashboard')

@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
 
        <small>Link Terkait</small>
  
     
    </section>

    <!-- Main content -->
    <section class="content">
 

<div class="box">
            <div class="box-header">
              <h3 class="box-title">Link Terkait</h3>
            </div>
            <div>

            <a href="{{ route('sambutan.create') }}" class="btn btn-primary btn-sm
rounded pullright"> Tambah baru </a>
          </div>


            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <br/>
                <thead>
                <tr role="row">
                  <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 177px;">judul</th>
                 <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 177px;">gambar</th>
                  <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 177px;">Aksi</th>
                </tr>
                </thead>
                <tbody>

                @foreach($links as $link)               
                <tr>
                  
                   <td> {{ $link->judul }} </td>
                  <td> {{ $link->gambar }} </td>
                  <td> 
                    <button type="button"  class="btn  btn-warning">Edit</button>
                    <button type="button" class="btn  btn-danger">Delete</button></td>
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