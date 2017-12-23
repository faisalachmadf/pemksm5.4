<?php

namespace App\Http\Controllers\Frontend\Profil;

use App\Http\Controllers\Controller;
use App\Models\Profil\Selayang;


class SelayangController extends Controller
{
    public function index()
    {
        $data = [
            'selayang' => Selayang::getAktif()->first(),
            'kanan' => getDataKanan()
        ];
        
        return view('page.profile.selayangpandang', $data);
    }
}
