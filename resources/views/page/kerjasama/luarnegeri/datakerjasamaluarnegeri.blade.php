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
                                  <label for="kategori-berita">Kategori Kerja Sama</label>
                                  <hr/>
                                  <a href="{{ route('KerjasamaLn') }}">
                                      <h5>Semua Kerja Sama</h5>
                                  </a><br>
                                  @foreach($katlns as $key => $katln)
                                  <a href="{{ route('KerjasamaLn', [$katln->slug]) }}">
                                      <h5>{{ $katln->name }}</h5>
                                  </a><br>
                                  @endforeach

                                    <label for="kategori-kerjasama">Kategori sesuai masa waktu</label><hr/>
                                  <a href="{{ route('KerjasamaLn') }}">
                                      <h5>Semua Masa Waktu</h5>
                                  </a><br>
                                   <a href="{{ route('KerjasamaLn', ['masih-berlaku']) }}">
                                      <h5>Kerja Sama yang masih berlaku</h5><br>
                                  <a href="{{ route('KerjasamaLn', ['waktu-hampir-habis']) }}">
                                      <h5>Kerja Sama Waktu Hampir Habis</h5>
                                  </a><br>
                                  <a href="{{ route('KerjasamaLn', ['waktu-sudah-habis']) }}">
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
                                      <h3>Hasil Pencarian {{ $kerjasamalns->count() > 0 ? '' : 'Tidak Ditemukan' }}
                                          <hr/></h3>
                                      @endif

                                      @if($detail)
                                        @if(count($kerjasamalns))
                                          @foreach($kerjasamalns as $kerjasamaln)
                                            <div class="col-md-12 item-pic2 text-justify">
                                              <img src="{{ asset('image/kerjasama-luar-negeri/'.$kerjasamaln->gambar) }}" class="img-responsive img-banner" alt="{{ $kerjasamaln->judul }}"/>
                                              <br/><br/>
                                              <legend>
                                                <h4 class="inner two">
                                                  <a href="{{ route('KerjasamaLn', [$kerjasamaln->katln->slug, $kerjasamaln->slug]) }}">{{ strtoupper($kerjasamaln->judul) }}</a>
                                                </h4>
                                              </legend>
                                              <label>Nomor:</label>
                                              {!! $kerjasamaln->nomor !!}<br/>
                                              <label>Pihak:</label>
                                              {!! $kerjasamaln->pihak !!}<br/>
                                              <label>Sumamry:</label>
                                              {!! $kerjasamaln->summary !!}<br/>
                                              <label>Keterangan:</label>
                                              {!! $kerjasamaln->keterangan !!}<br/>
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
                                          <thead style="background-color: blue; color: white;">
                                           <tr>
                                           <th><h5><p>Tahun</p></h5></th>
                                         
                                           <th ><h5><p>Nama Kerja Sama</p></h5></th>
                                           <th style="width: 15%;"><h5><p>Tanggal</p></h5></th>
                                           <th style="width: 15%;"><h5><p>Berakhir</p></h5></th>
                                           <th class="text-center">Lihat</th>

                                           </tr>   
                                          </thead>
                                          <tbody>
                                          @if (count($kerjasamalns))
                                            <?php $no = 0;?>
                                             @foreach($kerjasamalns as $kerjasamaln)
                                            <?php $no++ ;?>
                                            <tr class="{{ generateExpiredClass($kerjasamaln->tanggal_akhir, 60) }}">
                                               
                                              <td><p><h6>{{ $kerjasamaln->tahun }} </h6></p></td>
                                           
                                               <td><p><h6>{{ strtoupper($kerjasamaln->judul) }} <br><br/> <font color="red"><h8>{{ $kerjasamaln->katln->name }}</h8></font>
                                               </h6></p></td>
                                               <td><p><h6>{{ date('d M Y', strtotime($kerjasamaln->tanggal_awal)) }}
                                               </h6></p></td>
                                               <td><p><h6>{{ date('d M Y', strtotime($kerjasamaln->tanggal_akhir)) }}
                                               </h6></p></td>
                                               <td class="text-center"><p><h6> <a href="{{ route('KerjasamaLn', [$kerjasamaln->katln->slug, $kerjasamaln->slug]) }}" target="_blank"> <li class="glyphicon glyphicon-new-window"></li> </a></h6></p></td>
                                            
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
                                            {{ $kerjasamalns->appends(['pencarian' => $data['pencarian']])->links() }}
                                        @else
                                            {{ $kerjasamalns->links() }}
                                        @endif
                                      @endif
                                      </div>
                                      <!-- Share Media Sosial dan Print -->
                                        <hr/><h6> Bagikan :</h6>
                                     <a href="whatsapp://send?text={{ route('KerjasamaLn') }}" 
                                        data-action="share/whatsapp/share">
                                        <img src='/temafrontend/images/wa.png' alt='' width='40' height='40'></a>
                                    <a rel='nofollow' style="margin-right: 5px;" target="_blank" href='https://www.facebook.com/sharer.php?u={{ route('KerjasamaLn') }}'>
                                    <img src='/temafrontend/images/logofb.png' alt='' width='50' height='50'></a>
                                    <a rel='nofollow' style="margin-right: 5px;" target="_blank" href='https://twitter.com/share?url={{ route('KerjasamaLn') }}'>     
                                    <img src='/temafrontend/images/logotwitter.png' alt='' width='40' height='40'></a>
                                    <a rel='nofollow' style="margin-right: 5px;" target="_blank" href='https://plus.google.com/share?url={{ route('KerjasamaLn') }}'>
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
