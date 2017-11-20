<?php

namespace App\Http\Controllers\Admin\Kategori;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Kategori\KatopdRequest;

use App\Models\Kategori\Katopd;
use Yajra\Datatables\Datatables;

class KatOpdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page = [
            'title' => 'Kategori Perangkat Daerah',
            'breadcrumb' => 'Kategori Perangkat Daerah'
        ];

        return view('layouts.kategori.katopd.index')->withPage($page);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function datatables()
    {
        $param = [
            'url' => 'kategori-opd',
            'action' => ['show', 'edit', 'destroy']
        ];

        return Datatables::of(Katopd::query())
        ->addColumn('action', function($data) use ($param) {
                if ($data->aktif) {
                    unset($param['action'][array_search('destroy', $param['action'])]);
                }

                return generateAction($param, $data->slug);
            })
            ->editColumn('aktif', function($data) {
                if ($data->aktif) {
                    return 'Ya';
                }

                return 'Tidak Aktif';
            })
        ->addIndexColumn()
        ->make(true);
         
            
    }


    public function create()
    {
        $page = [
            'title' => 'Tambah Kategori opd',
            'breadcrumb' => 'Tambah'
        ];

        return view('layouts.kategori.katopd.create')->withPage($page);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KatopdRequest $request)
   {
        $katopd = new Katopd;
        $katopd->name = $request->input('name');

        // upload gambar
	    $file= $request->file('gambar');
	    $fileName=$file->getClientOriginalName();
	    $request->file('gambar')->move('image/opd',$fileName);
	    $katopd->gambar=$fileName;
       
        $katopd->slug = str_slug($katopd->name);
        $katopd->save();

        return redirect()->route('kategori-opd.index')->with('success', 'Data telah tersimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
     {
        $page = [
            'title' => 'Detail Kategori opd',
            'breadcrumb' => 'Detail'
        ];
        $model = new Katopd;
        $katopd = $model->getDataBySlug($slug);

        return view('layouts.kategori.katopd.show', compact('katopd'))->withPage($page);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $page = [
            'title' => 'Edit Kategori opd',
            'breadcrumb' => 'Edit'
        ];
        $model = new Katopd;
        $katopd = $model->getDataBySlug($slug);

        return view('layouts.kategori.katopd.edit', compact('katopd'))->withPage($page);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(KatopdRequest $request, $slug)
    {
        $model = new Katopd;
        $data = $request->except('id');

         

        $katopd = $model->getDataBySlug($slug);
        // upload gambar
      if($request->file('gambar') == "")
        {
            $katopd->gambar = $katopd->gambar;
        } 
        else
        {
            $file    = $request->file('gambar');
            $fileName=$file->getClientOriginalName();
            $request->file('gambar')->move('image/opd/',$fileName);
            $katopd->gambar=$fileName;
        }
        $katopd->update($data);

        return redirect()->route('kategori-opd.index')->with('success', 'Data telah diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $model = new Katopd;
        $katopd = $model->getDataBySlug($slug);

        if ($katopd) {
            $katopd->delete();
            $message = 'Data telah dihapus';
        } else {
            $message = 'Data tidak ditemukan';
        }

        return redirect()->route('kategori-opd.index')->with('success', $message);
    }
}
