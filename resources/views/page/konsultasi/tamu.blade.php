@extends('frame_depan.frame')


@section('content')
    <div class="banner two">
        <div class="container"> 
            <h2 class="inner-tittle">Kontak - Buku Tamu</h2>
        </div>
    </div>
    
    <div class="main-content">
        <div class="container">
            <div class="col-md-8 mag-innert-left">
                <div class="banner-bottom-left-grids">
                    <br/>

            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#tab_3" data-toggle="tab"><span class="glyphicon glyphicon-user"></span> &nbsp BUKU TAMU</a></li>
                  <li><a href="#tab_4" data-toggle="tab"><span class="glyphicon glyphicon-inbox"></span> &nbsp HUBUNGI KAMI</a></li>
                </ul>

                <div class="tab-content">
                      <div class="tab-pane active" id="tab_3">
                        <br/>

                         <!-- di isi dengan tabel Publikasis -->
                          @if (session()->has('success'))
                            <div class="alert alert-success alert-dismissible" role="alert" style="background-color: #ffc5002e;">
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                             <span class="glyphicon glyphicon-ok"></span> <font color="green"> &nbsp{{ session()->get('success') }}</font>
                            </div>
                          @endif
                                       <!--/Show dari Laporan-->
                        <div class="technology">
                          @if (count($tamus))
                                @foreach($tamus as $tamu)                        
                             <table  class="table  table-striped">
                                <thead>
                                 <tr>

                                 <th><b><font color="red" size="4px">{{ ($tamu->nama) }} </font></b>, <font size="2px">{{ date('d M Y |  H:i:s', strtotime($tamu->created_at)) }} </font></th>
                                 </tr>   
                                </thead>
                                <tbody>           
                                <tr>
                                <td>
                                <h5>{!! $tamu->isi !!} </h5>
                                </td>
                                </tr>
                                </tbody>
                                </table>
                                 @endforeach
                                       @else
                                         <tr>
                                  <td > </td>
                                   <td> ---Belum ada Data ---</td>
                                    <td></td>
                                </tr>
                                    @endif
                                {{ $tamus->links() }}
                            <div class="clearfix"></div>
                        </div>
                      </div>
              <!-- /.tab-pane -->
                    <div class="tab-pane" id="tab_4">
                       <br/>

                      <form class="form-horizontal" method="POST" action="{{ route('Hubungi-Kami.store') }}" enctype="multipart/form-data">
                          {{ csrf_field() }}
                          <div class="box-body" style="background-color: #e8e8e8; ">
                             
                            <div class="form-group{{ $errors->has('nama') ? ' has-error' : '' }}">
                              <label for="Masukan Nama terlebih dahulu" class="col-sm-4 control-label">Nama<span class="required">&nbsp *</span> :</label>

                              <div class="col-sm-8">
                                <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama') }}" placeholder="nama" required>
                                

                                @if ($errors->has('nama'))
                                  <span class="help-block">{{ $errors->first('nama') }}</span>
                                @endif
                              </div>
                            </div>
           
           
           
                        <div class="form-group{{ $errors->has('dari') ? ' has-error' : '' }}">
                          <label for="dari" class="col-sm-4 control-label">Dari<span class="required">&nbsp *</span> :</label>

                          <div class="col-sm-8">
                            <input type="text" class="form-control" id="dari" name="dari" value="{{ old('dari') }}" placeholder="Beritahu Kami darimana Anda" required>
                         

                            @if ($errors->has('dari'))
                              <span class="help-block">{{ $errors->first('dari') }}</span>
                            @endif
                          </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                          <label for="email" class="col-sm-4 control-label">Email<span class="required">&nbsp *</span> :</label>

                          <div class="col-sm-8">
                            <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="Cantumkan Email anda" required>
                           

                            @if ($errors->has('email'))
                              <span class="help-block">{{ $errors->first('email') }}</span>
                            @endif
                          </div>
                        </div>

                      

                           <div class="form-group{{ $errors->has('isi') ? ' has-error' : '' }}">
                              <label for="isi" class="col-sm-4 control-label">isi<span class="required">&nbsp *</span></label>

                              <div class="col-sm-8">
                            <textarea class="form-control" id="isi" name="isi" placeholder="isi" required>{{ old('isi') }}</textarea>

                            @if ($errors->has('isi'))
                              <span class="help-block">{{ $errors->first('isi') }}</span>
                            @endif
                          </div>
                        </div>
                      </div>
                        <!-- /.box-body -->
                          <div class="box-footer">
                            <div class="col-sm-12">
                              <button type="submit" class="btn btn-success pull-right">Submit</button>
                              <button type="reset" class="btn btn-default pull-right" style="margin-right: 10px;">Reset</button>
                            </div>
                          </div>
                          <!-- /.box-footer -->
                        </form>


                    </div>
             
            </div>
            <!-- /.tab-content -->
          </div>         
        </div>

                <hr/><h6>Bagikan : </h6>
                <a href="whatsapp://send?text={{ route('Hubungi-Kami.index') }}" 
                                        data-action="share/whatsapp/share">
                                        <img src='/temafrontend/images/wa.png' alt='' width='40' height='40'></a>
                                    <a rel='nofollow' style="margin-right: 5px;" target="_blank" href='https://www.facebook.com/sharer.php?u={{ route('Hubungi-Kami.index') }}'>
                                    <img src='/temafrontend/images/logofb.png' alt='' width='50' height='50'></a>
                                    <a rel='nofollow' style="margin-right: 5px;" target="_blank" href='https://twitter.com/share?url={{ route('Hubungi-Kami.index') }}'>
                                  <img src='/temafrontend/images/logotwitter.png' alt='' width='40' height='40'></a>
                                    <a rel='nofollow' style="margin-right: 5px;" target="_blank" href='https://plus.google.com/share?url={{ route('Hubungi-Kami.index') }}'>
                                   <img src='/temafrontend/images/logogoogle.png' alt='' width='35' height='35'></a>
                                    | &nbsp<a href="#" onclick="window.print()"><img src="/temafrontend/images/print.png" alt='' width='50' height='50'></a>
               
            </div>
            @include('frame_depan.kanan', @$kanan ? $kanan : [])
        </div>
    </div>   
@endsection
