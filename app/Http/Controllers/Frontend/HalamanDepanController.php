<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Berita;

class HalamanDepanController extends Controller
{
   
    public function index()
    {

      $sambutans=sambutan::all();
        return view('layouts.page.index',compact('sambutans'));
    }
}
