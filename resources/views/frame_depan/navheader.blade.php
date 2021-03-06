  <div class="header" id="home">
     <div class="content white">
        <nav class="navbar navbar-default sticky animated fadeInDown " role="navigation">
           <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="{{ route('index') }}"><center><img src="/adminkelola/dist/img/footerputih.png" class="img-responsive"></center></a>
            </div>
            <!--/.navbar-header-->
        
            <div class="collapse navbar-collapse " id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">PROFIL<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('Selayang-Pandang.index') }}">Selayang Pandang</a></li>
                            <li class="divider"></li>
                            <li><a href="{{ route('Visi-dan-Misi.index') }}">Visi dan Misi</a></li>
                            <li class="divider"></li>
                            <li><a href="{{ route('Tugas-Pokok-dan-Fungsi.index') }}">Tugas Pokok dan Fungsi</a></li>
                            <li class="divider"></li>
                            <li><a href="{{ route('Struktur-Organisasi.index') }}">Struktur Organisasi</a></li>
                            
                            <li class="divider"></li>
                            <li><a href="{{ route('Prestasi.index') }}">Prestasi</a></li>
                        </ul>
                      </li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">KELEMBAGAAN<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('Kelembagaan', ['1']) }}">Urusan Pemerintahan Daerah</a></li>
                            <li class="divider"></li>
                            <li><a href="{{ route('Kelembagaan', ['2']) }}">Tata Pemerintahan</a></li>
                            <li class="divider"></li>
                            <li><a href="{{ route('Kelembagaan', ['3']) }}">Kerjasama Daerah</a></li>
                            
                        </ul>
                    </li>

                     <li><a href="{{ route('Produkhukum') }}">PRODUK HUKUM</a></li>
                    <li>
                    <a href="{{ route('Berita') }}">BERITA</b></a>
                    </li>


                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">PUBLIKASI<b class="caret"></b></a>
                       <ul class="dropdown-menu multi-column columns-2">
                            <div class="row">
                            	<div class="col-sm-6">
                                    <ul class="multi-column-dropdown"> 
			                            <li><a href="{{ route('Publikasi', ['File']) }}">File</a></li>
			                            <li class="divider"></li>
			                            <li><a href="{{ route('Publikasi', ['eBook']) }}">e-Book</a></li>
			                            <li class="divider"></li>
			                            <li><a href="{{ route('Publikasi', ['Event']) }}">Brosur Event</a></li>
			                            <li class="divider"></li>
			                            <li><a href="{{ route('Publikasi', ['SK-Admin']) }}">SK Admin</a></li>
			                            <li class="divider"></li>
			                            <li><a href="{{ route('Publikasi', ['PPID']) }}">PPID</a></li>
			                        </ul>
                                </div>

                                <div class="col-sm-6">
                                    <ul class="multi-column-dropdown">
			                        	<li><a href="{{ route('Layanan') }}">Layanan Publikasi</a></li>
			                            <li class="divider"></li>
			                            <li><a href="{{ route('Agenda') }}">Agenda</a></li>
			                        </ul>
                                </div>
                       		</div>
                        </ul>
                    </li>


                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">KERJASAMA<b class="caret"></b></a>
                        <ul class="dropdown-menu multi-column columns-2">
                            <div class="row">
                                <div class="col-sm-6">
                                    <ul class="multi-column-dropdown">
                                        <li><a href="{{ route('MitraDalamNegeri') }}">Mitra Kerjasama Dalam Negeri</a></li>
                                        <li class="divider"></li>
                                        <li><a href="{{ route('MitraLuarNegeri') }}">Mitra Kerjasama Luar Negeri</a></li>
                                    </ul>
                                </div>
                                <div class="col-sm-6">
                                    <ul class="multi-column-dropdown">
                                       <li><a href="{{ route('KerjasamaDn') }}">Data Kerjasama Dalam Negeri</a></li>    
                                        <li class="divider"></li>
                                        <li><a href="{{ route('KerjasamaLn') }}">Data Kerjasama Luar Negeri</a></li>
                                       
                                    </ul>
                                </div>
                            </div>
                        </ul>
                    </li>
                   

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">LAPORAN<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('Laporan', ['LKIP']) }}">LKIP</a></li>
                            <li class="divider"></li>
                        	<li><a href="{{ route('Laporan', ['Transparansi-Anggaran']) }}">Transparansi Anggaran</a></li>
                            <li class="divider"></li>
                            <li><a href="{{ route('Laporan', ['Transparansi-Kinerja']) }}">Transparansi Kinerja</a></li>
                       

                        </ul>
                      </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">KONTAK<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('Hubungi-Kami.index') }}">Hubungi Kami</a></li>
                            <li class="divider"></li>
                             <li><a href="{{ route('Konsultasi2') }}">Konsultasi</a></li>
                            <li class="divider"></li>
                            <li><a href="{{ route('Lokasi') }}">Lokasi Kami</a></li>
                            <li class="divider"></li>
                            <li><a href="{{ route('Site') }}">Peta Situs</a></li>
                            
                            
                        </ul>
                      </li>

                     <li class="dropdown">
                        <a href="#" data-toggle="dropdown" data-submenu aria-expanded="false"><span class="glyphicon glyphicon-search"></span></a>
                        <ul class="dropdown-menu">
                         <form> 
                            <script>
  (function() {
    var cx = '006928489770695334984:htnjwhp9xlu';
    var gcse = document.createElement('script');
    gcse.type = 'text/javascript';
    gcse.async = true;
    gcse.src = 'https://cse.google.com/cse.js?cx=' + cx;
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(gcse, s);
  })();
</script>
<gcse:search></gcse:search>
                        </form>
                    
                            
                            
                        </ul>
                      </li>
                    
                    
                </ul>
            </div>
            <!--/.navbar-collapse-->
     <!--/.navbar-->
     </div>
    </nav>
  </div>
 </div>