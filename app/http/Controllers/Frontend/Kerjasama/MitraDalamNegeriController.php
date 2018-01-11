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
             'provinsis' => Mitradn::getDataByKat('Antar-Provinsi')->get(),
             'kabkots' => Mitradn::getDataByKat('Kab-Kota')->get(),
             'pihakketigas' => Mitradn::getDataByKat('Pihak-Ketiga')->get()
        ];

        return view('page.kerjasama.dalamnegeri.mitradalamnegeri', $data);
    }

    public function detail($slug = '')
    {
        $model = new Mitradn;
        $data = [
            'mitra' => $model->getDataBySlug($slug)
        ];

        return view('page.kerjasama.dalamnegeri.mitradalamnegeridetail', $data);
    }
}
