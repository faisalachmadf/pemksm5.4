<?php

namespace App\Http\Controllers\Frontend\Profil;

use App\Http\Controllers\Controller;
use App\Models\Profil\Tupoksi;

class TupoksiController extends Controller
{
     public function index()
    {

      $Tupoksis=Tupoksi::all();
        return view('page.profile.tupoksi',compact('Tupoksis'));
    }
}
