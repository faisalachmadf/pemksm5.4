<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Berita;

class HalamanDepanController extends Controller
{
   
    public function index()
    {

      $beritas=berita::all();
      return view('frame_depan.partindex.content',compact('beritas'));
    }
}
