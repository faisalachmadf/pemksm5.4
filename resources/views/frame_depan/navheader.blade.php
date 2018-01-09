  <div class="header" id="home">
     <div class="content white">
        <nav class="navbar navbar-default " role="navigation">
           <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="/"><center><img src="/adminkelola/dist/img/logobiro.png"></center></a>
            </div>
            <!--/.navbar-header-->
        
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
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
			                            <li><a href="{{ route('Publikasi', ['Materi-Rapat']) }}">Materi-Materi</a></li>
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
                                        <li><a href="/Kerja-Sama/Mitra-Dalam-Negeri">Mitra Kerjasama Dalam Negeri</a></li>
                                        <li class="divider"></li>
                                        <li><a href="/Kerja-Sama/Mitra-Luar-Negeri">Mitra Kerjasama Luar Negeri</a></li>
                                    </ul>
                                </div>
                                <div class="col-sm-6">
                                    <ul class="multi-column-dropdown">
                                       <li><a href="/Kerja-Sama/KerjasamaDn">Data Kerjasama Dalam Negeri</a></li>    
                                        <li class="divider"></li>
                                        <li><a href="/Kerja-Sama/KerjasamaLn">Data Kerjasama Luar Negeri</a></li>
                                       
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
                            <li><a href="{{ route('Lokasi') }}">Lokasi Kami</a></li>
                            
                            
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