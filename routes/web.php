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

/*FRONT END*/

Route::group(['namespace' => 'Frontend'], function() {
    /* Index */
    Route::resource('/', 'HalamanDepanController');

    /* Profile */
    Route::group(['namespace' => 'Profil', 'prefix' => 'profil'], function() {
        Route::resource('Selayang-Pandang','SelayangController');
        Route::resource('Visi-dan-Misi','VisiMisiController');
        Route::resource('Tugas-Pokok-dan-Fungsi','TupoksiController');
        Route::resource('Struktur-Organisasi','SdmController');
        Route::resource('Prestasi','PrestasiController');
    });

    /* Bagian */

    Route::any('Kelembagaan/{slug?}', 'KelembagaanController@index')->name('Kelembagaan');
    

    Route::get('Tata-Pemerintahan', function () {
        return view('page.bagian.tapem');
    });

    Route::get('Kerjasama', function () {
        return view('page.bagian.kerjasama');
    });

    /* Produk Hukum */
    Route::group(['prefix' => 'Produk-Hukum'], function() {
        Route::get('Hasilpencarian', 'ProdukhukumController@search');
        Route::get('/','ProdukhukumController@index')->name('Produkhukum');
        Route::any('{slug?}/unduh', 'ProdukHukumController@unduh')->name('Produkhukum.unduh');
    });

    /* Berita */

    Route::any('Berita/{kategori?}/{slug?}', 'BeritaController@index')->name('Berita');

    /* Publikasi */

    Route::any('Publikasi/{kategori?}/{slug?}', 'PublikasiController@index')->name('Publikasi');
    Route::any('Publikasi/{kategori?}/{slug?}/unduh', 'PublikasiController@unduh')->name('Publikasi.unduh');

     /* Agenda */

    Route::any('Agenda/{kategori?}/{slug?}', 'AgendaController@index')->name('Agenda');

    /* Layanan */

    Route::any('Layanan/{kategori?}/{slug?}', 'LayananController@index')->name('Layanan');

    /* LPPD */

   Route::group(['prefix' => 'Lppd'], function() {
        Route::get('Hasilpencarian', 'LppdController@search');
        Route::get('/','LppdController@index')->name('Lppd');
        Route::any('{slug?}/unduh', 'LppdController@unduh')->name('Lppd.unduh');
    });
 

    /* kemitraan dan Kerja Sama */
    Route::group(['namespace' => 'Kerjasama','prefix' => 'Kerja-Sama'], function() {
        Route::get('Mitra-Dalam-Negeri','MitraDalamNegeriController@index')->name('MitraDalamNegeri');
        Route::get('Mitra-Dalam-Negeri/{slug?}','MitraDalamNegeriController@detail')->name('MitraDalamNegeri.detail');
        Route::get('Mitra-Luar-Negeri','MitraLuarNegeriController@index')->name('MitraLuarNegeri');
        Route::get('Mitra-Luar-Negeri/{slug?}','MitraLuarNegeriController@detail')->name('MitraLuarNegeri.detail');
        Route::any('KerjasamaDn/{kategori?}/{slug?}', 'KerjasamaDnController@index')->name('KerjasamaDn');
        Route::any('KerjasamaLn/{kategori?}/{slug?}', 'KerjasamaLnController@index')->name('KerjasamaLn');
    });




    Route::get('/tkksd/Mitra-Kerjasama-Luar-Negeri', function () {
        return view('page.tkksd.mitraluarnegeri');
    });

    /* tkksd */

     Route::group(['prefix' => 'Tkksd'], function() {
        Route::get('Hasilpencarian', 'TkksdController@search');
        Route::get('/','TkksdController@index')->name('Tkksd');
        Route::any('{slug?}/unduh', 'TkksdController@unduh')->name('Tkksd.unduh');
    });
    
    /* Laporan */

    Route::any('Laporan/{kategori?}/{slug?}', 'LaporanController@index')->name('Laporan');
    Route::any('Laporan/{kategori?}/{slug?}/unduh', 'LaporanController@unduh')->name('Laporan.unduh');

    /* Konsultasi */
    Route::group(['namespace' => 'Konsultasi', 'prefix' => 'konsultasi'], function() {
        Route::resource('Hubungi-Kami','Tamu2Controller');
        Route::get('Lokasi-Kami','LokasiController@Index')->name('Lokasi');
        Route::get('Peta-Situs','SiteController@Index')->name('Site');
        Route::get('Konsultasi','KonsultasiController@Index')->name('Konsultasi2');
      
        
    });
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

            // Kategori Mitra Kerja Sama Dalam Negeri
             Route::get('katmitra/datatables','KatMitraController@datatables')->name('katmitra.datatables');
            Route::resource('katmitra','KatMitraController');

             // Kategori Mitra Kerja Sama Luar Negeri
             Route::get('katmitraln/datatables','KatMitraLnController@datatables')->name('katmitraln.datatables');
            Route::resource('katmitraln','KatMitraLnController');


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

        // Laporan
        Route::get('laporan/datatables','LaporanController@datatables')->name('laporan.datatables');
        Route::get('laporan/{slug}/download','LaporanController@download')->name('laporan.download');
        Route::resource('laporan','LaporanController');

        // Publikasi
        Route::get('publikasi/datatables','PublikasiController@datatables')->name('publikasi.datatables');
        Route::get('publikasi/{slug}/download','PublikasiController@download')->name('publikasi.download');
        Route::resource('publikasi','PublikasiController');

        // Layanan Publikasi
        Route::get('layanan/datatables','LayananController@datatables')->name('layanan.datatables');
        Route::get('layanan/{slug}/download','LayananController@download')->name('layanan.download');
        Route::resource('layanan','LayananController');

        // Agenda
        Route::get('agenda/datatables','AgendaController@datatables')->name('agenda.datatables');
        Route::resource('agenda','AgendaController');

        // LPPD
        Route::group(['namespace' => 'Lppd', 'prefix' => 'lppd'], function() {
           // LPPD
              Route::get('lppd/datatables','LppdController@datatables')->name('lppd.datatables');
                Route::get('lppd/{slug}/download','LppdController@download')->name('lppd.download');
                Route::resource('lppd','lppdController');

            // Galeri LPPD
            Route::get('galeri-lppd/datatables','GaleriLppdController@datatables')->name('galeri-lppd.datatables');
            Route::resource('galeri-lppd','GaleriLppdController');

        });

          // TKKSD
        Route::group(['namespace' => 'Tkksd', 'prefix' => 'tkksd'], function() {
            // TKKSD
              Route::get('tkksd/datatables','TkksdController@datatables')->name('tkksd.datatables');
        Route::get('tkksd/{slug}/download','TkksdController@download')->name('tkksd.download');
        Route::resource('tkksd','TkksdController');

            // Galeri tkksd
            Route::get('galeri-tkksd/datatables','GaleriTkksdController@datatables')->name('galeri-tkksd.datatables');
            Route::resource('galeri-tkksd','GaleriTkksdController');


        });

        // Data Kerjasama
        Route::group(['namespace' => 'DataKerjasama', 'prefix' => 'data-kerjasama'], function() {
            // Kerjasama Dalam Negeri
            Route::get('kerjasama-dalam-negeri/datatables','KerjasamaDnController@datatables')->name('kerjasama_dalam_negeri.datatables');
            Route::resource('kerjasama-dalam-negeri','KerjasamaDnController');

            // Kerjasama Luar Negeri
            Route::get('kerjasama-luar-negeri/datatables','KerjasamaLnController@datatables')->name('kerjasama-luar-negeri.datatables');
            Route::resource('kerjasama-luar-negeri','KerjasamaLnController');
        });

         // Mitra 
        Route::group(['namespace' => 'Mitra', 'prefix' => 'mitra'], function() {
            // Mitra Dalam Negeri
            Route::get('mitra-dalam-negeri/datatables','MitradnController@datatables')->name('mitra-dalam-negeri.datatables');
            Route::resource('mitra-dalam-negeri','MitradnController');

            // Mitra Luar Negeri
            Route::get('mitra-luar-negeri/datatables','MitralnController@datatables')->name('mitra-luar-negeri.datatables');
            Route::resource('mitra-luar-negeri','MitralnController');
        });

        // Konsultasi 
        Route::group(['namespace' => 'Konsultasi', 'prefix' => 'konsultasi'], function() {
            // Buku Tamu
            Route::get('tamu/datatables','TamuController@datatables')->name('tamu.datatables');
            Route::resource('tamu','TamuController');

        });
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





