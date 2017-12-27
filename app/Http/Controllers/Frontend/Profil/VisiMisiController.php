<?php

namespace App\Http\Controllers\Frontend\Profil;

use App\Http\Controllers\Controller;
use App\Models\Profil\VisiMisi;

class VisiMisiController extends Controller
{
      public function index()
    {
      $data = [
      	'visimisi' => VisiMisi::getAktif()->first(),
      	'kanan' => getDataKanan()

      ];

     
        return view('page.profile.visimisi', $data);
    }
}
