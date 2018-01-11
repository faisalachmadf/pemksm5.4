@extends('frame_depan.frame')


@section('content')
    <div class="banner two">
        <div class="container"> 
            <h2 class="inner-tittle">AGENDA</h2>
        </div>
    </div>
    
    <div class="main-content">
        <div class="container">
            <div class="col-md-12">
                

                   
                    <br>
                    
                <form class="form" action="{{ route('Agenda', ['pencarian']) }}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="pencarian">Cari Agenda Berdasarkan Tanggal dan Nama:</label>
                            <div class="input-group btn-katbagian">
                                 <input type="text" name="pencarian" id="pencarian" class="form-control" placeholder="Masukan kata kunci..." value="{{ @$data['pencarian'] }}">
                                     <div class="input-group-btn">
                                         <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-search"></i></button>
                                    </div>
                            </div>
                    </div>
                </form>
                    

                    <!--/Show dari Berita-->
                    <div class="col-md-3 item-detail" style="margin-right: 0px;">
                        <div class="technology">
                            <div class="editor-pics">
                           
                                <div class="edit-pics">
                                  <label for="kategori-berita">Agenda Bagian:</label><hr/>
                               
                                    <div class="clearfix"></div>
                                    <a href="{{ route('Agenda') }}">
                                    <h5>Semua Agenda</h5>
                                </a><br>
                                @foreach($katbagians as $key => $katbagian)
                                <a href="{{ route('Agenda', [$katbagian->slug]) }}">
                                    <h5>{{ $katbagian->name }}</h5><br>
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
                                    <h3>Hasil Pencarian {{ $agendas->count() > 0 ? '' : 'Tidak Ditemukan' }}<hr/></h3>
                                    <br/>
                                    @endif
                                    
                                    @if (count($agendas))
                                    @foreach($agendas as $agenda)

                                   

                                
                                    <p><a href="{{ route('Agenda', [$agenda->katbagian->slug, $agenda->slug]) }}">{{ strtoupper($agenda->judul) }}</a></p><br>
                                    
                                    <h5><p><i class="glyphicon glyphicon-time"></i><b> &nbsp&nbsp Tanggal : {{ date('d M Y', strtotime($agenda->tanggal)) }} </b></p></h5>
                                    <h5><i class="glyphicon glyphicon-time"></i><b> &nbsp&nbsp Pukul : {{ $agenda->jam }}</b></p></h5>
                                   
                                    <h5><i class="glyphicon glyphicon-home"></i> &nbsp&nbsp Lokasi: {{ $agenda->lokasi }}  </h5>
                                    <h5><i class=""></i><i class="glyphicon glyphicon-list-alt"></i>&nbsp&nbsp Agenda Bagian :<font color="red"><b>{{ $agenda->katbagian->name }}</b></font></h5>
                                   
                                    <hr/>
                                      
                                    
                                   

                                    @endforeach
                                     <!-- Share Media Sosial dan Print -->
                                      <hr/><h6>Print :</h6><br/>
                                 
                                    | &nbsp<a href="#" onclick="window.print()"><img src="/temafrontend/images/print.png" alt='' width='50' height='50'></a>

                                     @else   
                         <div class="editor-pics">
                            --- Belum ada Data ---
                        </div>
                    </div>
                          @endif

                          @if($pencarian)
                            {{ $agendas->appends(['pencarian' => $data['pencarian']])->links() }}
                        @else
                            {{ $agendas->links() }}
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
    </div>   
@endsection
