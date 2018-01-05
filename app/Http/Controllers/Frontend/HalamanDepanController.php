<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use App\Models\header;
use App\Models\sambutan;
use App\Models\Publikasi;
use App\Models\Layanan;
use App\Models\aplikasi;
use App\Models\Agenda;

class HalamanDepanController extends Controller
{
    public function index()
    {
        $data = [
            'banners' => header::all()->take(5),
            'umums' => Berita::getDataByKat('Berita-Umum', 4)->get(),
            'daerahs' => Berita::getDataByKat('Berita-Urusan-Pemerintahan-Daerah', 3)->get(),
            'tatas' => Berita::getDataByKat('Berita-Tata-Pemerintahan', 3)->get(),
            'kerjasamas' => Berita::getDataByKat('Berita-Kerja-Sama', 3)->get(),
            'artikels' => Berita::getDataByKat('Artikel', 4)->get(),
            'sambutans' => sambutan::all(),
            'publikasis' => Publikasi::getDataByKat([], 5, true)->get(),
            'populars2' => Publikasi::getPopular(5)->get(),
            'ppids' => Publikasi::getDataByKat(['PPID'], 5)->get(),
            'agendas' => Agenda::getNow()->get(),
            'populars' => Berita::getPopular(5)->get(),
            'layanans' => Layanan::with(['katbagian', 'user'])->take(3)->get(),
            'aplikasis' => aplikasi::all()
        ];

        return view('frame_depan.partindex.content', $data);
    }

    public function test($kategori, $slug)
    {
        echo $kategori;
        echo "<br>";
        echo $slug;
    }
}
