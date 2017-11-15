
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
            <li class="active"><a href="/adminpanel/sambutan"><i class="fa fa-circle-o"></i> Sambutan Kepala</a></li>
            <li><a href="/adminpanel/aplikasi"><i class="fa fa-circle-o"></i> Aplikasi Online</a></li>
            <li><a href="/adminpanel/link"><i class="fa fa-circle-o"></i> Link terkait</a></li>
            <li><a href="/adminpanel/header"><i class="fa fa-circle-o"></i> Header</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-user"></i>
            <span>Profil</span>
             <i class="fa fa-angle-left pull-right"></i>
             
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/layout/top-nav.html"><i class="fa fa-circle-o"></i> Selayang Pandang</a></li>
            <li><a href="pages/layout/boxed.html"><i class="fa fa-circle-o"></i> Tugas, Pokok dan Fungsi</a></li>
            <li><a href="pages/layout/fixed.html"><i class="fa fa-circle-o"></i> Visi dan Misi</a></li>
            <li><a href="pages/layout/collapsed-sidebar.html"><i class="fa fa-circle-o"></i>Struktur Organisasi</a></li>
            <li><a href="pages/layout/collapsed-sidebar.html"><i class="fa fa-circle-o"></i>Prestasi</a></li>
          </ul>
        </li>
        @endif

        <!-- Ini Masuk di User -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-user"></i>
            <span>Kelembagaan</span>
          </a>
        </li>


         <!-- Ini Masuk di User -->
        <li class="header">MENU UNTUK PRODUK HUKUM </li>
        <li>
          <a href="pages/widgets.html">
            <i class="fa fa-th"></i> <span>Produk Hukum</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>


        <!-- Ini Masuk di User -->
        <li class="header">MENU UNTUK BERITA DAN ARTIKEL </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-newspaper-o"></i>
            <span>Berita</span>
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
        <li class="treeview">
          <a href="#">
            <i class="fa fa-file-archive-o"></i>
            <span>LPPD</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/UI/general.html"><i class="fa fa-file"></i> File LPPD</a></li>
            <li><a href="pages/UI/icons.html"><i class="fa fa-book"></i> Galeri LPPD</a></li>
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
        <li class="treeview">
          <a href="#">
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
        <li class="treeview">
          <a href="#">
            <i class="fa fa-lock"></i> <span>KATEGORI</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o"></i> Kategori untuk Berita</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Kategori Untuk File</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Kategori Laporan</a></li>
           
            <li><a href="#"><i class="fa fa-circle-o"></i> Kategori Produk Hukum</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Kategori Bagian</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Kategori Jabatan</a></li>
           
            <li><a href="#"><i class="fa fa-circle-o"></i> Kategori User</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Kategori OPD</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Kategori Kerjasama</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Kategori Kerjasama Dalam Negeri</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Kategori Kerjasama Luar Negeri</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Kategori Jenis Kerjasama Dalam Negeri</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Kategori Jenis Kerjasama Luar Negeri</a></li>
          </ul>
        </li>
        
        <li><a href="{{ url('adminpanel/user') }}"><i class="fa fa-user"></i> <span>LIST USER</span></a></li>
        @endif
        
    </section>
    <!-- /.sidebar -->
  </aside>
