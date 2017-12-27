<?php

namespace App\Http\Controllers\Frontend\Profil;

use App\Http\Controllers\Controller;
use App\Models\Profil\Tupoksi;

class TupoksiController extends Controller
{
     public function index()
    {
    	$data = [
    		'tupoksi' =>Tupoksi::getAktif()->first(),
    		'kanan' => getDataKanan()

    	];

        return view('page.profile.tupoksi', $data);
    }

}
