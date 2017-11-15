<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\aplikasi;

class AplikasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      $aplikasis=aplikasi::all();
        return view('layouts.beranda.aplikasi.index',compact('aplikasis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts.beranda.aplikasi.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    
    public function store(Request $request)
    {
        $this->validate($request, [
        'judul' => 'required',
        'link' => 'required',
        'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5000',
    ]);
    $aplikasi = new aplikasi;
    $aplikasi->judul= $request->judul;
    $aplikasi->link= $request->link;

    // upload gambar
    $file= $request->file('gambar');
    $fileName=$file->getClientOriginalName();
    $request->file('gambar')->move('image/beranda',$fileName);
    $aplikasi->gambar=$fileName;
    $aplikasi->save();
    // sambutan::create($request->all());
  
    return  redirect()->to('adminpanel/aplikasi')->with('message', 'Berhasil ditambahkan!');


   

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $aplikasis=aplikasi::find($id);
        return view('layouts.beranda.aplikasi.detil')->with('aplikasis', $aplikasis);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
          $aplikasis=aplikasi::find($id);
        return view('layouts.beranda.aplikasi.edit')->with('aplikasis', $aplikasis);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
   {
        $this->validate($request, [
        'judul' => 'required',
        'link' => 'required',
        
    ]);
    $aplikasi=aplikasi::where('id',$id)->first();
    $aplikasi->judul= $request['judul'];
    $aplikasi->link= $request['link'];
    
    // upload gambar
      if($request->file('gambar') == "")
        {
            $aplikasi->gambar = $aplikasi->gambar;
        } 
        else
        {
            $file    = $request->file('gambar');
            $fileName=$file->getClientOriginalName();
            $request->file('gambar')->move('image/beranda/',$fileName);
            $aplikasi->gambar=$fileName;
        }
    $aplikasi->update();

    
    // sambutan::create($request->all());
  
    return redirect()->to('adminpanel/aplikasi')->with('message', 'Berhasil dirubah!');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $aplikasi=aplikasi::find($id);
        $aplikasi->delete();
        return redirect()->to('adminpanel/aplikasi')->with('message', 'Data Berhasil dihapus!');
    }
}

