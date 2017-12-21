<?php

namespace App\Http\Controllers\Frontend\Profil;

use App\Http\Controllers\Controller;
use App\Models\Profil\VisiMisi;

class VisiMisiController extends Controller
{
      public function index()
    {

      $visimisis=visimisi::all();
        return view('page.profile.visimisi',compact('visimisis'));
    }

}
