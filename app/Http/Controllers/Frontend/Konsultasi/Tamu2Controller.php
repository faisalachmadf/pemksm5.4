<?php

namespace App\Http\Controllers\Frontend\Konsultasi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Konsultasi\Tamu;

class Tamu2Controller extends Controller
{
     public function index()
    {
        $data = [
            'tamus' => Tamu::Urutan()->simplePaginate(10),
            'kanan' => getDataKanan()
        ]; 
        return view('page.konsultasi.tamu', $data);
    }

    public function store(Request $request)
    {
        $tamu = new Tamu;
        $tamu->nama = $request->input('nama');
        $tamu->dari = $request->input('dari');
        $tamu->email = $request->input('email');
        $tamu->isi = $request->input('isi');
        $tamu->slug = str_slug($tamu->nama);
        $tamu->save();
        
        return redirect()->route('Hubungi-Kami.index')->with('success', 'Terima Kasih telah Menghubungi Kami, Segera Kami akan membalas melalui email yang telah dicantumkan ');
    }
}
