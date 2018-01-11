@extends('frame_depan.frame')


@section('content')
    <div class="banner two">
        <div class="container"> 
            <h2 class="inner-tittle">Peta Situs</h2>
        </div>
    </div>
    
    <div class="main-content">
        <div class="container">
            <div class="col-md-8 mag-innert-left">
                <div class="banner-bottom-left-grids">
                    <br/>
                    

                    <!--/Show dari Kelembagaan-->
                    <div class="technology">

                         <div class="technology">
                            <h2 class="tittle"><li class="glyphicon glyphicon-info-sign"></li> &nbsp Beranda</h2>
                            
                            <div class="editor-pics">
                              
                                 <li><a href="#">TKKSD</a></li>
                                <li><a href="#">LPPD</a></li>
                                <li><a href="#">SEGMEN BATAS</a></li>
                               
                                
                                <div class="clearfix"></div>
                            </div>

                          <h2 class="tittle"><li class="glyphicon glyphicon-info-sign"></li> &nbsp Profil</h2>
                            
                            <div class="editor-pics">
                              
                                 <li><a href="{{ route('Selayang-Pandang.index') }}">Selayang Pandang</a></li>
                                <li><a href="{{ route('Visi-dan-Misi.index') }}">Visi dan Misi</a></li>
                                <li><a href="{{ route('Tugas-Pokok-dan-Fungsi.index') }}">Tugas Pokok dan Fungsi</a></li>
                                <li><a href="{{ route('Struktur-Organisasi.index') }}">Struktur Organisasi</a></li>
                                
                                <li><a href="{{ route('Prestasi.index') }}">Prestasi</a></li>
                                
                                <div class="clearfix"></div>
                            </div>
                            
                            
                            <h2 class="tittle"><li class="glyphicon glyphicon-info-sign"></li> &nbsp Kelembagaan</h2>
                         
                            <div class="editor-pics">
                                  
                                <li><a href="{{ route('Kelembagaan', ['1']) }}">Urusan Pemerintahan Daerah</a></li>
                             
                                <li><a href="{{ route('Kelembagaan', ['2']) }}">Tata Pemerintahan</a></li>
                               
                                <li><a href="{{ route('Kelembagaan', ['3']) }}">Kerjasama Daerah</a></li>
                                    
                                <div class="clearfix"></div>
                            </div>

                             <h2 class="tittle"><li class="glyphicon glyphicon-info-sign"></li> &nbsp Produk Hukum</h2>
                         
                            <div class="editor-pics">
                              
                               <li><a href="{{ route('Produkhukum') }}">PRODUK HUKUM</a></li>
                                  
                                <div class="clearfix"></div>
                            </div>
                          
                           <h2 class="tittle"><li class="glyphicon glyphicon-info-sign"></li> &nbsp Berita</h2>
                         
                            <div class="editor-pics">
                              
                               <li><a href="{{ route('Berita') }}">BERITA</a> </li>
                                  
                                <div class="clearfix"></div>
                            </div>

                             <h2 class="tittle"><li class="glyphicon glyphicon-info-sign"></li> &nbsp Publikasi</h2>
                         
                            <div class="editor-pics">
                              
                               <li><a href="{{ route('Publikasi', ['Materi-Rapat']) }}">Materi-Materi</a></li>
                                       
                                        <li><a href="{{ route('Publikasi', ['eBook']) }}">e-Book</a></li>
                                    
                                        <li><a href="{{ route('Publikasi', ['Event']) }}">Brosur Event</a></li>
                                    
                                        <li><a href="{{ route('Publikasi', ['SK-Admin']) }}">SK Admin</a></li>
                                  
                                        <li><a href="{{ route('Publikasi', ['PPID']) }}">PPID</a></li>

                                        <li><a href="{{ route('Layanan') }}">Layanan Publikasi</a></li>
                                  
                                        <li><a href="{{ route('Agenda') }}">Agenda</a></li>
                                  
                                <div class="clearfix"></div>
                            </div>

                             <h2 class="tittle"><li class="glyphicon glyphicon-info-sign"></li> &nbsp Kerja Sama</h2>
                         
                            <div class="editor-pics">
                              
                            
                                        <li><a href="/Kerja-Sama/Mitra-Dalam-Negeri">Mitra Kerjasama Dalam Negeri</a></li>
                                      
                                        <li><a href="/Kerja-Sama/Mitra-Luar-Negeri">Mitra Kerjasama Luar Negeri</a></li>
                                
                            
                                       <li><a href="/Kerja-Sama/KerjasamaDn">Data Kerjasama Dalam Negeri</a></li>    
                                        
                                        <li><a href="/Kerja-Sama/KerjasamaLn">Data Kerjasama Luar Negeri</a></li>
                                       
                                  
                          
                       
                     
                                  
                                <div class="clearfix"></div>
                            </div>

                             <h2 class="tittle"><li class="glyphicon glyphicon-info-sign"></li> &nbsp Laporan</h2>
                         
                            <div class="editor-pics">
                              
                            
                                      <li><a href="{{ route('Laporan', ['LKIP']) }}">LKIP</a></li>
                         
                            <li><a href="{{ route('Laporan', ['Transparansi-Anggaran']) }}">Transparansi Anggaran</a></li>
                      
                            <li><a href="{{ route('Laporan', ['Transparansi-Kinerja']) }}">Transparansi Kinerja</a></li>

                                <div class="clearfix"></div>
                            </div>

                             <h2 class="tittle"><li class="glyphicon glyphicon-info-sign"></li> &nbsp Kontak</h2>
                         
                            <div class="editor-pics">
                              
                            
                                  <li><a href="{{ route('Hubungi-Kami.index') }}">Hubungi Kami</a></li>
                         
                            <li><a href="{{ route('Lokasi') }}">Lokasi Kami</a></li>
                      
                            <li><a href="{{ route('Site') }}">Peta Situs</a></li>
                            

                                <div class="clearfix"></div>
                            </div>
                     
                          
                            <div class="clearfix"></div>
                            
                            <hr/><h6>Bagikan : </h6>
                                    <a rel='nofollow' style="margin-right: 5px;" target="_blank" href='https://www.facebook.com/sharer.php?u={{ route('Site') }}'>
                                    <img src='http://syam.eu.org/icon/fb.jpg' alt='' width='30' height='30'></a>
                                    <a rel='nofollow' style="margin-right: 5px;" target="_blank" href='https://twitter.com/share?url={{ route('Site') }}'>
                                    <img src='http://syam.eu.org/icon/tw.jpg' alt='' width='30' height='30'></a>
                                    <a rel='nofollow' style="margin-right: 5px;" target="_blank" href='https://plus.google.com/share?url={{ route('Site') }}'>
                                     <img src='http://syam.eu.org/icon/g.jpg' alt='' width='30' height='30'></a>
                                    | &nbsp<a href="#" onclick="window.print()"><img src="/temafrontend/images/print.png" alt='' width='50' height='50'></a>
                        </div>

                    
                      
                        <div class="clearfix"></div>
                    </div>
                </div>

                <!--Komentar-->
               
            </div>
            @include('frame_depan.kanan', @$kanan ? $kanan : [])
        </div>
    </div>   
@endsection
