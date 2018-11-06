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
        } else if ($katSlug == 'masih-berlaku') {
            $kerjasamalns = KerjasamaLn::getData($katSlug, $slug, 'masih');
        } else if ($katSlug == 'waktu-hampir-habis') {
            $kerjasamalns = KerjasamaLn::getData($katSlug, $slug, 'hampir', 60);
        } else if ($katSlug == 'waktu-sudah-habis') {
            $kerjasamalns = KerjasamaLn::getData($katSlug, $slug, 'sudah');
        } else {
            $kerjasamalns = KerjasamaLn::getData($katSlug, $slug);
        }

        if (empty($slug)) {
            $detail = false;
        } else {
            $detail = true;
        }

        $data = [
            'detail' => $detail,
            'katlns' => Katln::all(),
            'pencarian' => $pencarian,
            'kerjasamalns' => $kerjasamalns->Paginate(20),
        ];

        return view('page.kerjasama.luarnegeri.datakerjasamaluarnegeri', $data)->withData($request->all());
    }
}
