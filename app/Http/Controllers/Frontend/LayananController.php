<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Kategori\Katbagian;
use App\Models\Layanan;

class LayananController extends Controller
{
    public function index(Request $request, $katSlug = '', $slug = '')
    {
        $pencarian = false;

        if (empty($slug)) {
            $diunduh = false;
        } else {
            $diunduh = true;
            Layanan::diunduh($slug);
        }

        if ($katSlug == 'popular') {
            $layanans = Layanan::getPopular();
        } else if ($katSlug == 'pencarian') {
            $pencarian = true;
            $layanans = Layanan::getSearch($request->input('pencarian'));
        } else {
            $layanans = Layanan::getData($katSlug, $slug);
        }

        $data = [
            'katbagians' => Katbagian::all(),
            'pencarian' => $pencarian,
            'layanans' => $layanans->simplePaginate(10),
            'diunduh' => $diunduh,
            'kanan' => getDataKanan()
        ];

        return view('page.layanan.index', $data)->withData($request->all());
    }
}
