<?php

namespace App\Http\Controllers\Frontend\Kerjasama;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Kategori\Katmitraln;
use App\Models\Mitra\Mitraln;

class MitraLuarNegeriController extends Controller
{
     public function index()
    {
        $data = [
             'pemerintahans' => Mitraln::getDataByKat('Pemerintahan-di-Luar-Negeri')->get(),
             'lembagas' => Mitraln::getDataByKat('Lembaga')->get(),
             'swastas' => Mitraln::getDataByKat('Swasta')->get()
        ];

        return view('page.kerjasama.luarnegeri.mitraluarnegeri', $data);
    }

    public function detail($slug = '')
    {
        $model = new Mitraln;
        $data = [
            'mitra' => $model->getDataBySlug($slug)
        ];

        return view('page.kerjasama.luarnegeri.mitraluarnegeridetail', $data);
    }
}
