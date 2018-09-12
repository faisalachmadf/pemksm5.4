@extends('layouts.adminlte')

@section('title', 'Admin Dashboard')



@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
 
      <h1>Sambutan</h1>
  
     
    </section>

    <!-- Main content -->
    <section class="content">
          <div class="box">
            <div class="box-header">
             
               <a href="{{ route('sambutan.create') }}" class="btn btn-primary">
            <i class="fa fa-plus-circle"></i>
            <span>Tambah Sambutan</span>
          </a>
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
                <tr>
                  <th  class="sorting_DESC" tabindex="0"  " colspan="1" aria-sort="descending" aria-label="Rendering engine: activate to sort column ascending" style="width: 10px;" >No</th>
                  <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 177px;">gambar</th>
                 <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 177px;">nama</th>
                  <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 150px;">Jabatan</th>
                  
                 
                  <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 200px;">Isi</th>
                  <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 177px;">Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php $no = 0;?>
                @foreach($sambutans as $sambutan)
                <?php $no++ ;?>               
                <tr>
                
                  <td>{{ $no }} 
                  </td>
                   <td>  
                  
             <img src="{{ asset('image/umum/'. $sambutan->gambar) }}" class="img-responsive"  width="200px"> </td>
                  <td> {{ $sambutan->nama }} </td>
                  <td> {{ $sambutan->jabatan }}</td>
                  <td> {!!substr($sambutan->isi,0,100)!!} ... </td>
                  <td> 
                   
                    <!-- untuk preview -->
          
                   <a href="/pemksm5.4/public/adminpanel/sambutan/{{$sambutan->id}}" class="btn btn-info">
                          <i class="fa fa-book"></i>
                        <span>Detil</span></a>
                        
                      
                        <a href="/pemksm5.4/public/adminpanel/sambutan/{{$sambutan->id}}/edit" class="btn btn-warning">
                            <i class="fa fa-edit"></i>
                        <span>Edit</span></a>

                   <form  action="/pemksm5.4/public/adminpanel/sambutan/{{$sambutan->id}}" method="post">
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

