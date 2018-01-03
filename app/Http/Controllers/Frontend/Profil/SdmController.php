<?php

namespace App\Http\Controllers\Frontend\Profil;

use App\Http\Controllers\Controller;
use App\Models\Profil\Pegawai;

class SdmController extends Controller
{
     public function index()
    {
    	$data = [
            'pegawais' => Pegawai::all(),
        ];
        
        return view('page.profile.struktur', $data);
        
    }

}
