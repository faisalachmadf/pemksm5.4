<?php

namespace App\Http\Controllers\Frontend\Profil;

use App\Http\Controllers\Controller;
use App\Models\Profil\Pegawai;

class SdmController extends Controller
{
     public function index()
    {

      $Pegawais=Pegawai::all();
        return view('page.profile.sdm',compact('pegawais'));
    }

}
