<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Profil\Selayang;


class SelayangController extends Controller
{
     public function index()
    {

      $Selayangs=Selayang::all();
        return view('page.profile.selayangpandang',compact('Selayangs'));
    }
}
