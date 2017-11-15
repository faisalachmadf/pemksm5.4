<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\header;

class HeaderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      $headers=header::all();
        return view('layouts.beranda.header.index',compact('headers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts.beranda.header.create');
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
        'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5000',
    ]);
    $header = new header;
    $header->judul= $request->judul;
    

    // upload gambar
    $file= $request->file('gambar');
    $fileName=$file->getClientOriginalName();
    $request->file('gambar')->move('image/beranda',$fileName);
    $header->gambar=$fileName;
    $header->save();
    // sambutan::create($request->all());
  
    return  redirect()->to('adminpanel/header')->with('message', 'Berhasil ditambahkan!');


   

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $headers=header::find($id);
        return view('layouts.beranda.header.detil')->with('headers', $headers);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
          $headers=header::find($id);
        return view('layouts.beranda.header.edit')->with('headers', $headers);
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
        
        
    ]);
    $header=header::where('id',$id)->first();
    $header->judul= $request['judul'];
    
    
    // upload gambar
      if($request->file('gambar') == "")
        {
            $header->gambar = $header->gambar;
        } 
        else
        {
            $file    = $request->file('gambar');
            $fileName=$file->getClientOriginalName();
            $request->file('gambar')->move('image/beranda/',$fileName);
            $header->gambar=$fileName;
        }
    $header->update();

    
    // sambutan::create($request->all());
  
    return redirect()->to('adminpanel/header')->with('message', 'Berhasil dirubah!');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $header=header::find($id);
        $header->delete();
        return redirect()->to('adminpanel/header')->with('message', 'Data Berhasil dihapus!');
    }
}
