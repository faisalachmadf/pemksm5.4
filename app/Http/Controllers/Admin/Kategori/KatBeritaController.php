<?php

namespace App\Http\Controllers\Admin\Kategori;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Kategori\KatberitaRequest;

use App\Models\Kategori\Katberita;
use Yajra\Datatables\Datatables;

class KatBeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page = [
            'title' => 'Kategori Berita',
            'breadcrumb' => 'Kategori Berita'
        ];

        return view('layouts.kategori.katberita.index')->withPage($page);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function datatables()
    {
        $param = [
            'url' => 'kategori-berita',
            'action' => ['show', 'edit', 'destroy']
        ];

        return Datatables::of(Katberita::query())
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
            'title' => 'Tambah Kategori Berita',
            'breadcrumb' => 'Tambah'
        ];

        return view('layouts.kategori.katberita.create')->withPage($page);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KatberitaRequest $request)
   {
        $katberita = new Katberita;
        $katberita->name = $request->input('name');
        $katberita->slug = str_slug($katberita->name);
        $katberita->save();

        return redirect()->route('kategori-berita.index')->with('success', 'Data telah tersimpan');
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
            'title' => 'Detail Kategori Berita',
            'breadcrumb' => 'Detail'
        ];
        $model = new Katberita;
        $katberita = $model->getDataBySlug($slug);

        return view('layouts.kategori.katberita.show', compact('katberita'))->withPage($page);
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
            'title' => 'Edit Kategori Berita',
            'breadcrumb' => 'Edit'
        ];
        $model = new Katberita;
        $katberita = $model->getDataBySlug($slug);

        return view('layouts.kategori.katberita.edit', compact('katberita'))->withPage($page);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(KatberitaRequest $request, $slug)
    {
        $model = new Katberita;
        $data = $request->except('id');
        $katberita = $model->getDataBySlug($slug);
        $katberita->update($data);

        return redirect()->route('kategori-berita.index')->with('success', 'Data telah diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $model = new Katberita;
        $katberita = $model->getDataBySlug($slug);

        if ($katberita) {
            $katberita->delete();
            $message = 'Data telah dihapus';
        } else {
            $message = 'Data tidak ditemukan';
        }

        return redirect()->route('kategori-berita.index')->with('success', $message);
    }
}
