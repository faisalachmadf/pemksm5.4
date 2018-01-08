<?php

namespace App\Http\Controllers\Frontend\Kerjasama;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Kategori\Katln;
use App\Models\Kategori\Katjenisln;
use App\Models\Kategori\Katopd;
use App\Models\DataKerjasama\KerjasamaLn;

class KerjasamaLnController extends Controller
{
     public function index(Request $request, $katSlug = '', $slug = '')
    {
        $pencarian = false;

        if ($katSlug == 'pencarian') {
            $pencarian = true;
            $kerjasamalns = KerjasamaLn::getSearch($request->input('pencarian'));
        } else {
            $kerjasamalns = KerjasamaLn::getData($katSlug, $slug);
        }

        $data = [
            'katlns' => Katln::all(),
            'pencarian' => $pencarian,
            'kerjasamalns' => $kerjasamalns->simplePaginate(10),
        ];

        return view('page.kerjasama.luarnegeri.datakerjasamaluarnegeri', $data)->withData($request->all());
    }
}
