<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
})->name('index');

/* Profile */

Route::get('selayang-pandang', function () {
    return view('page.profile.selayangpandang');
});

Route::get('Visi-dan-Misi', function () {
    return view('profile.visimisi');
});

Route::get('Tugas-Pokok-dan-Fungsi', function () {
    return view('profile.tupoksi');
});

Route::get('Struktur-Organisasi', function () {
    return view('profile.struktur');
});

Route::get('prestasi', function () {
    return view('profile.prestasi');
});

/* Bagian */

Route::get('Urusan-Pemerintahan-Daerah', function () {
    return view('bagian.urpemda');
});

Route::get('Tata-Pemerintahan', function () {
    return view('bagian.tapem');
});

Route::get('Kerjasama', function () {
    return view('bagian.kerjasama');
});

/* Produk Hukum */

Route::get('/Produk-Hukum', function () {
    return view('produkhukum.produkhukum');
});    

/* Berita */

Route::get('/Berita/Berita-Umum', function () {
    return view('berita.beritaumum');
});

Route::get('/Berita/Berita-Urusan-Pemerintahan-Daerah', function () {
    return view('berita.beritaurpemda');
});

Route::get('/Berita/Berita-Tata-Pemerintahan', function () {
    return view('berita.beritatapem');
});

Route::get('/Berita/Berita-Kerjasama-Dalam-Negeri', function () {
    return view('berita.beritadalamnegeri');
});

Route::get('/Berita/Berita-Kerjasama-Luar-Negeri', function () {
    return view('berita.beritaluarnegeri');
});

Route::get('/Berita/Artikel-Lainnya', function () {
    return view('berita.artikel');
});

Route::get('/Berita/F.A.Q', function () {
    return view('berita.faq');
});

/* Publikasi */

Route::get('/Publikasi/Materi-Materi', function () {
    return view('publikasi.materi');
});

Route::get('/Publikasi/e-Book', function () {
    return view('publikasi.ebook');
});

Route::get('/Publikasi/Brosur-event', function () {
    return view('publikasi.brosur');
});

Route::get('/Publikasi/Agenda', function () {
    return view('publikasi.agenda');
});

Route::get('/Publikasi/SK-Admin', function () {
    return view('publikasi.skadmin');
});

Route::get('/Publikasi/PPID', function () {
    return view('publikasi.ppid');
});

/* LPPD */

Route::get('/LPPD', function () {
    return view('lppd.lppd');
});

/* kemitraan */

Route::get('/tkksd/Mitra-Kerjasama-Dalam-Negeri', function () {
    return view('tkksd.mitradalamnegeri');
});

Route::get('/tkksd/Mitra-Kerjasama-Luar-Negeri', function () {
    return view('tkksd.mitraluarnegeri');
});

/* tkksd */

Route::get('/TKKSD', function () {
    return view('tkksd.tkksd');
});






/* ADMIN */

Route::group(['prefix' => 'adminpanel'], function() {
    Route::get('/login', function() {
        return view('layouts.login');
    })->name('login');

    Route::get('/register', function() {
        return view('auth.register');
    })->name('register');

    Route::get('/reset', function() {
        return view('auth.passwords.reset');
    })->name('reset');

    // Authenticate
    Route::group(['namespace' => 'Admin\Auth', 'prefix' => 'auth'], function() {
        Route::post('/login', 'LoginController@authenticate')->name('auth.login');
        Route::get('/login', function() {
            return redirect()->route('login');
        });
        Route::get('/logout', 'LoginController@logout')->name('auth.logout');
    });

    Route::group(['namespace' => 'Admin', 'middleware' => 'admin'], function() {
        // Admin Dashboard
        Route::get('/', 'DashboardController@index')->name('admin.dashboard');

        // List User
        Route::get('user/datatables','UserController@datatables')->name('user.datatables');
        Route::resource('user','UserController');

        // Profil
        Route::group(['namespace' => 'Profil', 'prefix' => 'profil'], function() {
            // Selayang Pandang
            Route::get('selayang-pandang/datatables','SelayangController@datatables')->name('selayang-pandang.datatables');
            Route::resource('selayang-pandang','SelayangController');
            
            // Tugas, Pokok & Fungsi
            Route::get('tugas-pokok-fungsi/datatables','TupoksiController@datatables')->name('tugas-pokok-fungsi.datatables');
            Route::resource('tugas-pokok-fungsi','TupoksiController');

            // Visi & Misi
            Route::get('visi-misi/datatables','VisiMisiController@datatables')->name('visi-misi.datatables');
            Route::resource('visi-misi','VisiMisiController');

            // Prestasi
            Route::get('prestasi/datatables','PrestasiController@datatables')->name('prestasi.datatables');
            Route::resource('prestasi','PrestasiController');

            // Struktur Organisasi
            Route::get('struktur-organisasi/datatables','StrukturOrganisasiController@datatables')->name('struktur-organisasi.datatables');
            Route::resource('struktur-organisasi','StrukturOrganisasiController');
        });

         // Kategori
        Route::group(['namespace' => 'Kategori', 'prefix' => 'kategori'], function() {
            // Kategori Bagian
            Route::get('kategori-bagian/datatables','KatBagianController@datatables')->name('kategori-bagian.datatables');
            Route::resource('kategori-bagian','KatBagianController');

             // Kategori Berita 
             Route::get('kategori-berita/datatables','KatBeritaController@datatables')->name('kategori-berita.datatables');
            Route::resource('kategori-berita','KatBeritaController');

              // Kategori File
             Route::get('kategori-file/datatables','KatFileController@datatables')->name('kategori-file.datatables');
            Route::resource('kategori-file','KatFileController');


              // Kategori Laporan
             Route::get('kategori-laporan/datatables','KatLaporanController@datatables')->name('kategori-laporan.datatables');
            Route::resource('kategori-laporan','KatLaporanController');

            // Kategori Laporan
             Route::get('kategori-hukum/datatables','KatHukumController@datatables')->name('kategori-hukum.datatables');
            Route::resource('kategori-hukum','KatHukumController');
            
             // Kategori Jabatan
             Route::get('kategori-jabatan/datatables','KatJabatanController@datatables')->name('kategori-jabatan.datatables');
            Route::resource('kategori-jabatan','KatJabatanController');

             // Kategori Golongan
             Route::get('kategori-golongan/datatables','KatGolonganController@datatables')->name('kategori-golongan.datatables');
            Route::resource('kategori-golongan','KatGolonganController');

             // Kategori OPD
             Route::get('kategori-opd/datatables','KatOpdController@datatables')->name('kategori-opd.datatables');
            Route::resource('kategori-opd','KatOpdController');

            // Kategori Mitra Kerja Sama
             Route::get('katmitra/datatables','KatMitraController@datatables')->name('katmitra.datatables');
            Route::resource('katmitra','KatMitraController');

            // Kategori Kerja Sama Dalam Negeri
             Route::get('kategori-dn/datatables','KatdnController@datatables')->name('kategori-dn.datatables');
            Route::resource('kategori-dn','KatdnController');

            // Kategori Kerja Sama Dalam Negeri
             Route::get('kategori-ln/datatables','KatLnController@datatables')->name('kategori-ln.datatables');
            Route::resource('kategori-ln','KatLnController');

             // Kategori Kerja Sama Dalam Negeri
             Route::get('kategori-jenisdn/datatables','KatJenisDnController@datatables')->name('kategori-jenisdn.datatables');
            Route::resource('kategori-jenisdn','KatJenisDnController');

             // Kategori Kerja Sama Dalam Negeri
             Route::get('kategori-jenisln/datatables','KatJenislnController@datatables')->name('kategori-jenisln.datatables');
            Route::resource('kategori-jenisln','KatJenislnController');
        });

        // Kelembagaan
        Route::group(['namespace' => 'Kelembagaan'], function() {
            Route::get('kelembagaan/datatables','KelembagaanController@datatables')->name('kelembagaan.datatables');
            Route::resource('kelembagaan','KelembagaanController');
        });

        // Produk Hukum
        Route::get('produk-hukum/datatables','ProdukHukumController@datatables')->name('produk-hukum.datatables');
        Route::get('produk-hukum/{slug}/download','ProdukHukumController@download')->name('produk-hukum.download');
        Route::resource('produk-hukum','ProdukHukumController');

        // Berita
        Route::get('berita/datatables','BeritaController@datatables')->name('berita.datatables');
        Route::resource('berita','BeritaController');
    });

   


    // BERANDA
    Route::group(['middleware' => 'admin'], function() {
        Route::resource('sambutan','SambutanController');
    });

    Route::group(['middleware' => 'admin'], function() {
        Route::resource('link','LinkController');
    });

    Route::group(['middleware' => 'admin'], function() {
        Route::resource('header','HeaderController');
    });

    Route::group(['middleware' => 'admin'], function() {
        Route::resource('aplikasi','AplikasiController');
    });

    //Kategori
    Route::group(['middleware' => 'admin'], function() {
        Route::resource('kategori/katbagian','KatbagianController');
    });
});




