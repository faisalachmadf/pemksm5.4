@extends('frame_depan.frame')


@section('content')
    <div class="banner two">
        <div class="container"> 
            <h2 class="inner-tittle">Data Kerja sama Dalam Negeri</h2>
        </div>
    </div>
    
    <div class="main-content">
        <div class="container">
            <div class="col-md-12">
            
                    <br>
                    
                <form class="form" action="{{ route('KerjasamaDn', ['pencarian']) }}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="pencarian">Cari Kerja Sama:</label>
                        <br/>
                        <div class="input-group btn-katbagian">
                            <input type="text" name="pencarian" id="pencarian" class="form-control" placeholder="Masukan kata kunci..." value="{{ @$data['pencarian'] }}">
                            <div class="input-group-btn">
                                <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-search"></i></button>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="clearfix"></div>
            </div>
                    

                    <!--/Show dari Kerjasama-->
                    <div class="col-md-3 item-detail" style="margin-right: 0px;">
                        <div class="technology">
                            <div class="editor-pics">
                           
                                <div class="edit-pics">
                                  <label for="kategori-kerjasama">Kategori Kerja Sama</label>
                                  <hr/>
                                  <a href="{{ route('KerjasamaDn') }}">
                                      <h5>Semua Kerja Sama</h5>
                                  </a><br>
                                  @foreach($katdns as $key => $katdn)
                                  <a href="{{ route('KerjasamaDn', [$katdn->slug]) }}">
                                      <h5>{{ $katdn->name }}</h5>
                                  </a><br>
                                  @endforeach
                                   
                                   <label for="kategori-kerjasama">Masa Berlaku yang akan Berakhir</label><hr/>
                                  <a href="{{ route('KerjasamaDn') }}">
                                      <h5>Semua Masa Waktu</h5>
                                  </a><br>
                                   <a href="{{ route('KerjasamaDn', ['masih-berlaku']) }}">
                                      <h5>Kerja Sama yang masih berlaku</h5><br>
                                  <a href="{{ route('KerjasamaDn', ['waktu-hampir-habis']) }}">
                                      <h5>Kerja Sama Waktu Hampir Habis</h5>
                                  </a><br>
                                  <a href="{{ route('KerjasamaDn', ['waktu-sudah-habis']) }}">
                                      <h5>Kerja Sama Waktu Sudah Habis</h5>
                                  </a><br>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-9 item-detail">
                        <div class="technology">
                            <div class="editor-pics">
                                 <div class="edit-pics">
                                      @if($pencarian)
                                      <h3>Hasil Pencarian {{ $kerjasamadns->count() > 0 ? '' : 'Tidak Ditemukan' }}
                                          <hr/></h3>
                                      @endif

                                      @if($detail)
                                        @if(count($kerjasamadns))
                                          @foreach($kerjasamadns as $kerjasamadn)
                                            <div class="col-md-12 item-pic2 text-justify">
                                              <img src="{{ asset('image/kerjasama-dalam-negeri/'.$kerjasamadn->gambar) }}" class="img-responsive" alt="{{ $kerjasamadn->judul }}" style="width: 500px;" />
                                              <br/><br/>

                                              <legend>
                                                <h4 class="inner two">
                                                  <a href="{{ route('KerjasamaDn', [$kerjasamadn->katdn->slug, $kerjasamadn->slug]) }}">{{ strtoupper($kerjasamadn->judul) }}</a>
                                                </h4>
                                              </legend>
                                              <label>Nomor:</label>
                                              {!! $kerjasamadn->nomor !!}<br/>
                                              <label>Pihak:</label>
                                              {!! $kerjasamadn->pihak !!}<br/>
                                               <label>Ditandatangani:</label>
                                             <b> {{ date('d M Y', strtotime($kerjasamadn->tanggal_awal)) }} </b> | 
                                               <label>Berakhir pada:</label>
                                             <b> {{ date('d M Y', strtotime($kerjasamadn->tanggal_akhir)) }} </b> <br/>

                                              <label>Summary:</label>
                                              {!! $kerjasamadn->summary !!}<br/>
                                              <label>Keterangan:</label>
                                              {!! $kerjasamadn->keterangan !!}<br/>
                                            </div>
                                          @endforeach
                                          <div class="clearfix"></div>
                                        @else
                                            <br/>
                                            <h3 class="text-center">Data Tidak Ditemukan</h3>
                                            <br/>
                                        @endif
                                      @else
                                        
                                         
                                        <table  class="table ">
                                          <thead>
                                            <tr>
                                              <th style="width:60%;"> <h6>keterangan :</h6></th>
                                               <th style="background-color: #d9edf7;"> </th>
                                              <th> <h6>: Masih Berlaku </h6></th>
                                              <th style="background-color: #ffef9b;"> </th>
                                              <th> <h6>: Akan berakhir dalam 60 Hari </h6></th>
                                              <th   style="background-color: pink;"></th>
                                               <th><h6> :  Sudah Berakhir </h6></th>
                                            
                                            </tr>
                                          </thead>
                                        </table>
                                          

                                        <table  class="table table-striped">
                                          <thead style="background-color: brown; color: white;">
                                           <tr>
                                           <th style="width: 5%;"><h5><p>Tahun</p></h5></th>
                                         
                                           <th ><h5><p>Nama Kerja Sama</p></h5></th>
                                           <th style="width: 13%;"><h5><p>Tanggal</p></h5></th>
                                           <th style="width: 13%;"><h5><p>Berakhir</p></h5></th>
                                           <th class="text-center">Lihat</th>

                                           </tr>   
                                          </thead>
                                          <tbody>
                                          @if (count($kerjasamadns))
                                            <?php $no = 0;?>
                                             @foreach($kerjasamadns as $kerjasamadn)
                                            <?php $no++ ;?>
                                            <tr class="{{ generateExpiredClass($kerjasamadn->tanggal_akhir, 60) }}">
                                               
                                              <td><p><h6>{{ $kerjasamadn->tahun }} </h6></p></td>
                                           
                                               <td><p><h6>{{ strtoupper($kerjasamadn->judul) }} <br><br/> <font color="red"><h8>{{ $kerjasamadn->katdn->name }}</h8></font>
                                               </h6></p></td>
                                               <td><p><h6>{{ date('d M Y', strtotime($kerjasamadn->tanggal_awal)) }}
                                               </h6></p></td>
                                                <td><p><h6>{{ date('d M Y', strtotime($kerjasamadn->tanggal_akhir)) }}
                                               </h6></p></td>
                                               <td class="text-center"><p><h6> <a href="{{ route('KerjasamaDn', [$kerjasamadn->katdn->slug, $kerjasamadn->slug]) }}" target="_blank"> <li class="glyphicon glyphicon-new-window"></li> </a></h6></p></td>
                                            
                                            </tr>
                                            @endforeach
                                          @else
                                              <tr class="text-center">
                                                <td colspan="4">--- Belum ada Data ---</td>
                                              </tr>
                                          @endif
                                          </tbody>
                                        </table>
                                        @if($pencarian)
                                            {{ $kerjasamadns->appends(['pencarian' => $data['pencarian']])->links() }}
                                        @else
                                            {{ $kerjasamadns->links() }}
                                        @endif
                                      @endif
                                      </div>

                                      <!-- Share Media Sosial dan Print -->

                                      <hr/><h6> Bagikan :</h6>
                                     <a href="whatsapp://send?text={{ route('KerjasamaDn') }}" 
                                        data-action="share/whatsapp/share">
                                        <img src='/temafrontend/images/wa.png' alt='' width='40' height='40'></a>
                                    <a rel='nofollow' style="margin-right: 5px;" target="_blank" href='https://www.facebook.com/sharer.php?u={{ route('KerjasamaDn') }}'>
                                    <img src='/temafrontend/images/logofb.png' alt='' width='50' height='50'></a>
                                    <a rel='nofollow' style="margin-right: 5px;" target="_blank" href='https://twitter.com/share?url={{ route('KerjasamaDn') }}'>     
                                    <img src='/temafrontend/images/logotwitter.png' alt='' width='40' height='40'></a>
                                    <a rel='nofollow' style="margin-right: 5px;" target="_blank" href='https://plus.google.com/share?url={{ route('KerjasamaDn') }}'>
                                    <img src='/temafrontend/images/logogoogle.png' alt='' width='35' height='35'></a>
                                    | &nbsp<a href="#" onclick="window.print()"><img src="/temafrontend/images/print.png" alt='' width='50' height='50'></a>

                                  
                                  </div>
                              </div>  
                  <div class="clearfix"></div>
              </div>
                        
              <!--Komentar-->
               
            </div>
          
        </div>
      
@endsection
