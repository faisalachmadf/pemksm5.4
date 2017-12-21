<?php

namespace App\Http\Controllers\Frontend\Profil;

use App\Http\Controllers\Controller;
use App\Models\Profil\Selayang;


class SelayangController extends Controller
{
    public function index()
    {
        $selayangs = Selayang::all();
        
        return view('page.profile.selayangpandang', compact('selayangs'));
    }
}
