
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
     
      
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MENU UNTUK PROFIL </li>
        @if($userLogin['role'] != 'user')
        <li class="treeview">
          <a href="#">
            <i class="fa fa-home"></i> <span>Beranda</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="/adminpanel/sambutan"><i class="fa fa-circle-o"></i> Sambutan Kepala</a></li>
            <li><a href="/adminpanel/aplikasi"><i class="fa fa-circle-o"></i> Aplikasi Online</a></li>
            <li><a href="/adminpanel/link"><i class="fa fa-circle-o"></i> Link terkait</a></li>
            <li><a href="/adminpanel/header"><i class="fa fa-circle-o"></i> Header</a></li>
          </ul>
        </li>
        <li class="treeview {{ request()->segment(2) == 'profil' ? 'active' : '' }}">
          <a href="#">
            <i class="fa fa-user"></i>
            <span>Profil</span>
             <i class="fa fa-angle-left pull-right"></i>
             
          </a>
          <ul class="treeview-menu">
            <li class="{{ request()->segment(3) == 'selayang-pandang' ? 'active' : '' }}"><a href="{{ route('selayang-pandang.index') }}"><i class="fa fa-circle-o"></i> Selayang Pandang</a></li>
            <li class="{{ request()->segment(3) == 'tugas-pokok-fungsi' ? 'active' : '' }}"><a href="{{ route('tugas-pokok-fungsi.index') }}"><i class="fa fa-circle-o"></i> Tugas, Pokok dan Fungsi</a></li>
            <li class="{{ request()->segment(3) == 'visi-misi' ? 'active' : '' }}"><a href="{{ route('visi-misi.index') }}"><i class="fa fa-circle-o"></i> Visi dan Misi</a></li>
            <li class="{{ request()->segment(3) == 'struktur-organisasi' ? 'active' : '' }}"><a href="{{ route('struktur-organisasi.index') }}"><i class="fa fa-circle-o"></i>Struktur Organisasi</a></li>
            <li class="{{ request()->segment(3) == 'prestasi' ? 'active' : '' }}"><a href="{{ route('prestasi.index') }}"><i class="fa fa-circle-o"></i>Prestasi</a></li>
          </ul>
        </li>
        @endif

        <!-- Ini Masuk di User -->
        <li>
          <a href="{{ route('kelembagaan.index') }}">
            <i class="fa fa-user"></i>
            <span>Kelembagaan</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>


         <!-- Ini Masuk di User -->
        <li class="header">MENU UNTUK PRODUK HUKUM </li>
        <li class="{{ request()->segment(2) == 'produk-hukum' ? 'active' : '' }}">
          <a href="{{ route('produk-hukum.index') }}">
            <i class="fa fa-th"></i> <span>Produk Hukum</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>


        <!-- Ini Masuk di User -->
        <li class="header">MENU UNTUK BERITA DAN ARTIKEL </li>
        <li class="{{ request()->segment(2) == 'berita' ? 'active' : '' }}">
          <a href="{{ route('berita.index') }}">
            <i class="fa fa-newspaper-o"></i>
            <span>Berita</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>


        <!-- Ini Masuk di User -->
        <li class="header">MENU UNTUK FILE DAN AGENDA</li>
       <li>
          <a href="pages/widgets.html">
            <i class="fa fa-file-code-o"></i> <span>FILE PUBLIKASI</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        <li>
          <a href="/adminpanel/agenda">
            <i class="fa fa-calendar"></i> <span>AGENDA</span>
            <span class="pull-right-container">
             
            </span>
          </a>
        </li>


        <!-- Ini Masuk di User -->
         <li class="header">MENU UNTUK LPPD</li>
        <li class="treeview {{ request()->segment(2) == 'lppd' ? 'active' : '' }}">
          <a href="#">
            <i class="fa fa-file-archive-o"></i>
            <span>LPPD</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/UI/general.html"><i class="fa fa-file"></i> File LPPD</a></li>
            <li class="{{ request()->segment(3) == 'galeri-lppd' ? 'active' : '' }}"><a href="{{ route('galeri-lppd.index') }}"><i class="fa fa-book"></i> Galeri LPPD</a></li>
          </ul>
        </li>


        <!-- Ini Masuk di User -->
        <li class="header">MENU UNTUK KERJASAMA</li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-file-archive-o"></i>
            <span>TKKSD</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/UI/general.html"><i class="fa fa-file"></i> File TKKSD</a></li>
            <li><a href="pages/UI/icons.html"><i class="fa fa-book"></i> Galeri TKKSD</a></li>
            
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-globe"></i> <span>Mitra Kerjasama</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/forms/advanced.html"><i class="fa fa-circle-o"></i> Mitra Kerjasama Dalam Negeri</a></li>
            <li><a href="pages/forms/editors.html"><i class="fa fa-circle-o"></i> Mitra Kerjasama Luar Negeri</a></li>
          </ul>
        </li>
      
        <li class="treeview">
          <a href="#">
            <i class="fa fa-folder"></i> <span>Data Kerjasama</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            
            <li><a href="pages/tables/data.html"><i class="fa fa-circle-o"></i> Data Kerjasama Dalam Negeri</a></li>
            <li><a href="pages/tables/data.html"><i class="fa fa-circle-o"></i> Data Kerjasama Luar Negeri</a></li>
          </ul>
        </li>


        @if($userLogin['role'] != 'user')
        <li class="header">MENU UNTUK LAPORAN BIRO</li>
        <li class="{{ request()->segment(2) == 'laporan' ? 'active' : '' }}">
          <a href="{{ route('laporan.index') }}">
            <i class="fa fa-file-archive-o"></i> <span>Laporan Biro</span>
          </a>
        </li>
        @endif

        <!-- Ini Masuk di User -->
        <li class="header">KONSULTASI</li>
        <li>
          <a href="pages/calendar.html">
            <i class="fa fa-calendar"></i> <span>Buku Tamu</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        <li>
          <a href="pages/calendar.html">
            <i class="fa fa-calendar"></i> <span>Konsultasi</span>
            <span class="pull-right-container">
             
              
            </span>
          </a>
        </li>
        

        <!-- Ini Masuk di User -->
        <li class="header">EMAIL</li>
        <li>
          <a href="pages/mailbox/mailbox.html">
            <i class="fa fa-envelope"></i> <span>Mailbox</span>
            <span class="pull-right-container">
              
            </span>
          </a>
        </li>
        

        @if($userLogin['role'] != 'user')
        <li class="header">MASTER ADMIN</li>
        <li class="treeview {{ request()->segment(2) == 'kategori' ? 'active' : '' }}">
          <a href="#">
            <i class="fa fa-lock"></i> <span>KATEGORI</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ request()->segment(3) == 'kategori-berita' ? 'active' : '' }}"><a href="{{ route('kategori-berita.index') }}"><i class="fa fa-circle-o"></i> Kategori untuk Berita</a></li>
            <li class="{{ request()->segment(3) == 'kategori-file' ? 'active' : '' }}"><a href="{{ route('kategori-file.index') }}"><i class="fa fa-circle-o"></i> Kategori Untuk File</a></li>
            <li class="{{ request()->segment(3) == 'kategori-laporan' ? 'active' : '' }}"><a href="{{ route('kategori-laporan.index') }}"><i class="fa fa-circle-o"></i> Kategori Laporan</a></li>
            <li class="{{ request()->segment(3) == 'kategori-hukum' ? 'active' : '' }}"><a href="{{ route('kategori-hukum.index') }}"><i class="fa fa-circle-o"></i> Kategori Produk Hukum</a></li>
            <li class="{{ request()->segment(3) == 'kategori-bagian' ? 'active' : '' }}"><a href="{{ route('kategori-bagian.index') }}"><i class="fa fa-circle-o"></i> Kategori Bagian</a></li>
            <li class="{{ request()->segment(3) == 'kategori-jabatan' ? 'active' : '' }}"><a href="{{ route('kategori-jabatan.index') }}"><i class="fa fa-circle-o"></i> Kategori Jabatan</a></li>
            <li class="{{ request()->segment(3) == 'kategori-golongan' ? 'active' : '' }}"><a href="{{ route('kategori-golongan.index') }}"><i class="fa fa-circle-o"></i> Kategori Golongan</a></li>
            <li class="{{ request()->segment(3) == 'kategori-opd' ? 'active' : '' }}"><a href="{{ route('kategori-opd.index') }}"><i class="fa fa-circle-o"></i> Kategori OPD</a></li>
            <li class="{{ request()->segment(3) == 'katmitra' ? 'active' : '' }}"><a href="{{ route('katmitra.index') }}"><i class="fa fa-circle-o"></i> Kategori Mitra Kerjasama</a></li>
           
           <li class="{{ request()->segment(3) == 'kategori-dn' ? 'active' : '' }}"><a href="{{ route('kategori-dn.index') }}"><i class="fa fa-circle-o"></i> Kategori Kerjasama Dalam Negeri</a></li>

           <li class="{{ request()->segment(3) == 'kategori-ln' ? 'active' : '' }}"><a href="{{ route('kategori-ln.index') }}"><i class="fa fa-circle-o"></i> Kategori Kerjasama Luar Negeri</a></li>
            
            <li class="{{ request()->segment(3) == 'kategori-jenisdn' ? 'active' : '' }}"><a href="{{ route('kategori-jenisdn.index') }}"><i class="fa fa-circle-o"></i> Kategori Jenis Kerjasama Dalam Negeri</a></li>

           <li class="{{ request()->segment(3) == 'kategori-jenisln' ? 'active' : '' }}"><a href="{{ route('kategori-jenisln.index') }}"><i class="fa fa-circle-o"></i> Kategori Jenis Kerjasama Luar Negeri</a></li>
          </ul>
        </li>
        
        <li class="{{ request()->segment(2) == 'user' ? 'active' : '' }}"><a href="{{ route('user.index') }}"><i class="fa fa-user"></i> <span>LIST USER</span></a></li>
        @endif
        
    </section>
    <!-- /.sidebar -->
  </aside>
