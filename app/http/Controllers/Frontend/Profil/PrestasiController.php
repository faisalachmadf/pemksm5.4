<?php

namespace App\Http\Controllers\Frontend\Profil;

use App\Http\Controllers\Controller;
use App\Models\Profil\Prestasi;


class PrestasiController extends Controller
{
    public function index()
    {
        $data = [
            'prestasis' => Prestasi::all(),
            'kanan' => getDataKanan()
        ];
        
        return view('page.profile.prestasi', $data);
    }
}
