<?php

namespace App\Http\Controllers\Frontend\Konsultasi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SiteController extends Controller
{
     public function index()
    {
    	$data = [
            'kanan' => getDataKanan()
        ];
        
        return view('page.konsultasi.site', $data);
    }
}
