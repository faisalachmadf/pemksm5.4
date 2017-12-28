<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Kategori\Katberita;
use App\Models\Berita;

class BeritaController extends Controller
{
    public function index(Request $request, $katSlug = '', $slug = '')
    {
        $pencarian = false;

        if (empty($slug)) {
            $dibaca = false;
        } else {
            $dibaca = true;
            Berita::dibaca($slug);
        }

        if ($katSlug == 'popular') {
            $beritas = Berita::getPopular();
        } else if ($katSlug == 'pencarian') {
            $pencarian = true;
            $beritas = Berita::getSearch($request->input('pencarian'));
        } else {
            $beritas = Berita::getData($katSlug, $slug);
        }

        $data = [
            'katberitas' => Katberita::all(),
            'pencarian' => $pencarian,
            'beritas' => $beritas->simplePaginate(10),
            'dibaca' => $dibaca,
            'kanan' => getDataKanan()
        ];

        return view('page.berita.index', $data)->withData($request->all());
    }
}
