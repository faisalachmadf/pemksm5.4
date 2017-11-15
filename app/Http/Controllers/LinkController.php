<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\link;

class LinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      $links=link::all();
        return view('layouts.beranda.link.index',compact('links'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts.beranda.link.create');
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
    $link = new link;
    $link->judul= $request->judul;
    $link->link= $request->link;

    // upload gambar
    $file= $request->file('gambar');
    $fileName=$file->getClientOriginalName();
    $request->file('gambar')->move('image/beranda',$fileName);
    $link->gambar=$fileName;
    $link->save();
    // sambutan::create($request->all());
  
    return  redirect()->to('adminpanel/link')->with('message', 'Berhasil ditambahkan!');


   

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $links=link::find($id);
        return view('layouts.beranda.link.detil')->with('links', $links);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
          $links=link::find($id);
        return view('layouts.beranda.link.edit')->with('links', $links);
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
    $link=link::where('id',$id)->first();
    $link->judul= $request['judul'];
    $link->link= $request['link'];
    
    // upload gambar
      if($request->file('gambar') == "")
        {
            $link->gambar = $link->gambar;
        } 
        else
        {
            $file    = $request->file('gambar');
            $fileName=$file->getClientOriginalName();
            $request->file('gambar')->move('image/beranda/',$fileName);
            $link->gambar=$fileName;
        }
    $link->update();

    
    // sambutan::create($request->all());
  
    return redirect()->to('adminpanel/link')->with('message', 'Berhasil dirubah!');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $link=link::find($id);
        $link->delete();
        return redirect()->to('adminpanel/link')->with('message', 'Data Berhasil dihapus!');
    }
}

