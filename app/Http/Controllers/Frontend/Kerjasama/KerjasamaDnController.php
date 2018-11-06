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
        } else if ($katSlug == 'masih-berlaku') {
            $kerjasamadns = KerjasamaDn::getData($katSlug, $slug, 'masih');
        } else if ($katSlug == 'waktu-hampir-habis') {
            $kerjasamadns = KerjasamaDn::getData($katSlug, $slug, 'hampir', 60);
        } else if ($katSlug == 'waktu-sudah-habis') {
            $kerjasamadns = KerjasamaDn::getData($katSlug, $slug, 'sudah');
        } else {
            $kerjasamadns = KerjasamaDn::getData($katSlug, $slug);
        }

        if (empty($slug)) {
            $detail = false;
        } else {
            $detail = true;
        }

        $data = [
            'detail' => $detail,
            'katdns' => Katdn::all(),
            'pencarian' => $pencarian,
            'kerjasamadns' => $kerjasamadns->Paginate(20),
        ];

        return view('page.kerjasama.dalamnegeri.datakerjasamadalamnegeri', $data)->withData($request->all());
    }
}
