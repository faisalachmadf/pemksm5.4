@extends('frame_depan.frame')


@section('content')
    <div class="banner two">
        <div class="container"> 
            <h2 class="inner-tittle">Data Kerja sama Luar Negeri</h2>
        </div>
    </div>
    
    <div class="main-content">
        <div class="container">
            <div class="col-md-12">
            
                    <br>
                    
                <form class="form" action="{{ route('KerjasamaLn', ['pencarian']) }}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="pencarian">Cari Kerja Sama:</label><br/>
                            <div class="input-group btn-katbagian">
                                 <input type="text" name="pencarian" id="pencarian" class="form-control" placeholder="Masukan kata kunci..." value="{{ @$data['pencarian'] }}">
                                     <div class="input-group-btn">
                                         <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-search"></i></button>
                                    </div>
                            </div>
                    </div>
                </form>
                    

                    <!--/Show dari Kerjasama-->
                    <div class="col-md-3 item-detail" style="margin-right: 0px;">
                        <div class="technology">
                            <div class="editor-pics">
                           
                                <div class="edit-pics">
                                  <label for="kategori-berita"></label><hr/>
                               
                                    <div class="clearfix"></div>
                                    <a href="{{ route('KerjasamaLn') }}">
                                    <h5>Semua Kerja Sama</h5>
                                </a><br>
                                @foreach($katlns as $key => $katln)
                                <a href="{{ route('KerjasamaLn', [$katln->slug]) }}">
                                    <h5>{{ $katln->name }}</h5><br>
                                </a>
                                @endforeach
                                </div>  
                            </div>
                        </div>
                    </div>


                            <div class="col-md-9 item-detail">
                                <div class="technology">
                                    <div class="editor-pics">
                                         <div class="edit-pics">
                                     @if($pencarian)
                                    <h3>Hasil Pencarian {{ $kerjasamalns->count() > 0 ? '' : 'Tidak Ditemukan' }}
                                        <hr/></h3>
                              
                                    @endif
                                    
                                      <table  class="table table-striped">
                                                    <thead style="background-color: blue; color: white;">
                                                     <tr>
                                                     <th><h5><p>Tahun</p></h5></th>
                                                   
                                                     <th ><h5><p>Nama Kerja Sama</p></h5></th>
                                                     <th style="width: 15%;"><h5><p>Tanggal</p></h5></th>
                                                     <th></th>

                                                     </tr>   
                                                    </thead>
                                        <tbody>
                                        @if (count($kerjasamalns))
                                        <?php $no = 0;?>
                                         @foreach($kerjasamalns as $kerjasamaln)
                                        <?php $no++ ;?>               
                                        <tr>
                                           
                                          <td><p><h6>{{ $kerjasamaln->tahun }} </h6></p></td>
                                       
                                           <td><p><h6>{{ strtoupper($kerjasamaln->judul) }} <br> <font color="red"><h8>{{ $kerjasamaln->katln->name }}</h8></font>
                                           </h6></p></td>
                                           <td><p><h6>{{ date('d M Y', strtotime($kerjasamaln->tanggal_awal)) }}
                                           </h6></p></td>
                                           <td><p><h6> <a href="#"> <li class="glyphicon glyphicon-new-window"></li> </a></h6></p></td>
                                        
                                        </tr>
                                         @endforeach
                                          
                                      </tbody>
                                      @else
                                         
                                            --- Belum ada Data ---
                                    
                                      @endif
                                      </table>

                                       
                                   


                                   
                                   
                                    <hr/>


                          @if($pencarian)
                            {{ $kerjasamalns->appends(['pencarian' => $data['pencarian']])->links() }}
                        @else
                            {{ $kerjasamalns->links() }}
                        @endif
                                    
                                    </div>
                                </div>
                            </div>  
                <div class="clearfix"></div>
            </div>
                        
                        

                        


                        
                        <div class="clearfix"></div>
                    </div>
               

                <!--Komentar-->
               
            </div>
          
        </div>
      
@endsection
