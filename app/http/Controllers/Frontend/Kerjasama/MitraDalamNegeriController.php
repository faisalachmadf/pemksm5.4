<?php

namespace App\Http\Controllers\Frontend\Kerjasama;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Kategori\Katmitra;
use App\Models\Mitra\Mitradn;

class MitraDalamNegeriController extends Controller
{
    public function index()
    {
        $data = [
             'provinsis' => Mitradn::getDataByKat('Provinsi')->get(),
             'kabkots' => Mitradn::getDataByKat('Kab-Kota')->get(),
             'pihakketigas' => Mitradn::getDataByKat('Pihak-Ketiga')->get()

        ];

        return view('page.kerjasama.dalamnegeri.mitradalamnegeri', $data);
    }
}
