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

                <form class="form" action="{{ route('Agenda', ['pencarian']) }}" method="POST">
                    {{ csrf_field() }}
                   <div class="input-group date">
                        <label for="pencarian">Cari Agenda Berdasarkan Tanggal :</label>
                            <div class="input-group btn-katbagian">
                                <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                                 <input type="text" name="pencarian" id="datepicker" class="form-control" placeholder="Masukan tanggal..." value="{{ @$data['pencarian'] }}" class="required">
                                     <div class="input-group-btn">
                                         <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-search"></i></button>
                                    </div>
                            </div>
                    </div>
                </form>

            

                                     @if($pencarian)
                                    <h3>Hasil Pencarian {{ $agendas->count() > 0 ? '' : 'Tidak Ditemukan' }}<hr/></h3>
                                    <br/>
                                    @endif
                                    
                                    @if (count($agendas))
                                    @foreach($agendas as $agenda)

                                   <div class="technology">
                                       
                                           
                                           <div class="timeline">
                                              <div class="entry">
                                                <div class="title">
                                                 <h3> {{ date('d M Y', strtotime($agenda->tanggal)) }} </h3><br/>
                                                  
                                                    <p><i class="glyphicon glyphicon-time"></i> &nbsp {{ $agenda->jam }}</p>
                                                </div>
                                            <div class="body">

                                                 <p style="color: #065880;">{{ strtoupper($agenda->judul) }}</p><br>

                                            <h5><i class="glyphicon glyphicon-home"></i> &nbsp&nbsp Lokasi: {{ $agenda->lokasi }}  </h5> 
                                               <h5><i class=""></i><i class="glyphicon glyphicon-list-alt"></i>&nbsp&nbsp Agenda Bagian :<font color="red"><b>{{ $agenda->katbagian->name }}</b></font></h5>
                                                           
                                            </div>
                                           
                                        </div>
                                      </div>
                                  
                                    
                                </div>

                                
                                   
                                    
                                   
                                  
                                   
                                   
                                 
                                   
                              
                                      
                                    
                                   

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
                                   <!-- Share Media Sosial dan Print -->

                                      <hr/><h6> Bagikan :</h6>
                                     <a href="whatsapp://send?text={{ route('Agenda') }}" 
                                        data-action="share/whatsapp/share">
                                        <img src='temafrontend/images/wa.png' alt='' width='40' height='40'></a>
                                    <a rel='nofollow' style="margin-right: 5px;" target="_blank" href='https://www.facebook.com/sharer.php?u={{ route('Agenda') }}'>
                                    <img src='temafrontend/images/logofb.png' alt='' width='50' height='50'></a>
                                    <a rel='nofollow' style="margin-right: 5px;" target="_blank" href='https://twitter.com/share?url={{ route('Agenda') }}'>     
                                    <img src='temafrontend/images/logotwitter.png' alt='' width='40' height='40'></a>
                                    <a rel='nofollow' style="margin-right: 5px;" target="_blank" href='https://plus.google.com/share?url={{ route('Agenda') }}'>
                                    <img src='temafrontend/images/logogoogle.png' alt='' width='35' height='35'></a>
                                    | &nbsp<a href="#" onclick="window.print()"><img src="temafrontend/images/print.png" alt='' width='50' height='50'></a>

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
