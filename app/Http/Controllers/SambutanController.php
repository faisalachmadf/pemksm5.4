<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\sambutan;

class SambutanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      $sambutans=sambutan::all();
        return view('layouts.beranda.sambutan.index',compact('sambutans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts.beranda.sambutan.create');
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
        'nama' => 'required',
        'jabatan' => 'required',
        'isi' => 'required',
        'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
    ]);
    $sambutan = new sambutan;
    $sambutan->nama= $request->nama;
    $sambutan->jabatan= $request->jabatan;
    $sambutan->isi= $request->isi;

    // upload gambar
    $file= $request->file('gambar');
    $fileName=$file->getClientOriginalName();
    $request->file('gambar')->move('image/umum/',$fileName);
    $sambutan->gambar=$fileName;
    $sambutan->save();
    // sambutan::create($request->all());
  
    return  redirect()->to('/adminpanel/sambutan')->with('message', 'Berhasil ditambahkan!');


   

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($nama)
    {
        $sambutans=sambutan::find($nama);
        return view('layouts.beranda.sambutan.detil')->with('sambutans', $sambutans);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
          $sambutans=sambutan::find($id);
        return view('layouts.beranda.sambutan.edit')->with('sambutans', $sambutans);
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
        'nama' => 'required',
        'jabatan' => 'required',
        'isi' => 'required',
        
    ]);

    $sambutan=sambutan::where('id',$id)->first();
    $sambutan->nama= $request['nama'];
    $sambutan->jabatan= $request['jabatan'];
    $sambutan->isi= $request['isi'];
    
    // upload gambar
      if($request->file('gambar') == "")
        {
            $sambutan->gambar = $sambutan->gambar;
        } 
        else
        {
            $file    = $request->file('gambar');
            $fileName=$file->getClientOriginalName();
            $request->file('gambar')->move('image/umum/',$fileName);
            $sambutan->gambar=$fileName;
        }
    $sambutan->update();


    // sambutan::create($request->all());
  
    return redirect()->to('adminpanel/sambutan')->with('message', 'Berhasil dirubah!');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sambutan=sambutan::find($id);
        $sambutan->delete();
        

        return redirect()->to('adminpanel/sambutan')->with('message', 'Data Berhasil dihapus!');
    }
}
