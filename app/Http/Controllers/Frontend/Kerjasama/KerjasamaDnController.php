<?php

namespace App\Http\Controllers\Frontend\Kerjasama;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Kategori\Katdn;
use App\Models\Kategori\Katjenisdn;
use App\Models\Kategori\Katopd;
use App\Models\DataKerjasama\KerjasamaDn;

class KerjasamaDnController extends Controller
{
    public function index(Request $request, $katSlug = '', $slug = '')
    {
        $pencarian = false;

        if ($katSlug == 'pencarian') {
            $pencarian = true;
            $kerjasamadns = KerjasamaDn::getSearch($request->input('pencarian'));
        } else {
            $kerjasamadns = KerjasamaDn::getData($katSlug, $slug);
        }

        $data = [
            'katdns' => Katdn::all(),
            'pencarian' => $pencarian,
            'kerjasamadns' => $kerjasamadns->simplePaginate(10),
        ];

        return view('page.kerjasama.dalamnegeri.datakerjasamadalamnegeri', $data)->withData($request->all());
    }
}
