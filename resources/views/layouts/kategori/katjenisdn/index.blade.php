@extends('layouts.adminlte')

@section('title', $page['title'])

@section('customCss')
@endsection

@section('content')

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
 
      <h1>{{ $page['title'] }}</h1>
  
      <ol class="breadcrumb">
        <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><i class="fa fa-user"></i> Kategori</li>
        <li class="active">{{ $page['breadcrumb'] }}</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
 
      <div class="box">
        <div class="box-header">
          <a href="{{ route('kategori-jenisdn.create') }}" class="btn btn-primary">
            <i class="fa fa-plus-circle"></i>
            <span>Tambah {{ $page['title'] }}</span>
          </a>
          <a href="javascript:void(0)" onclick="reloadDatatables()" class="btn btn-default">
            <i class="fa fa-refresh"></i>
            <span>Refresh</span>
          </a>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              <strong>{{ session()->get('success') }}</strong>
            </div>
          @endif
          <table id="katjenisdns-table" class="table table-bordered table-striped" width="100%">
            <thead>
              <tr>
                <th>No</th>
                <th>jenis Dokumen Kerja Sama Dalam Negeri</th>
                <th>Aksi</th>
              </tr>
            </thead>
          </table>
        </div>
        <!-- /.box-body -->
      </div>
  
    </section>
    <!-- /.content -->
  </div>
  
@endsection

@section('customJs')
  <script type="text/javascript">
    $(function() {
      var columns = [
        { data: 'DT_Row_Index', name: 'DT_Row_Index', orderable: false, searchable: false, width: '5%' },
        { data: 'name', name: 'name' },
        { data: 'action', name: 'action', orderable: false, searchable: false }
      ];

      createDatatables('#katjenisdns-table', '{!! route('kategori-jenisdn.datatables') !!}', columns);
    });
  </script>
@endsection
