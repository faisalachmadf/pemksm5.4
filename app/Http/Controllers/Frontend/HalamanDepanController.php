<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use App\Models\header;

class HalamanDepanController extends Controller
{
    public function index()
    {
        $data = [
            'banners' => header::all(),
            'beritas' => Berita::with(['katberita', 'user'])->get()
        ];

        return view('frame_depan.partindex.content', $data);
    }
}
