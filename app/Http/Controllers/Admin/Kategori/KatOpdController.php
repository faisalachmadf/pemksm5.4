<?php

namespace App\Http\Controllers\Admin\Kategori;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Kategori\KatopdRequest;

use App\Models\Kategori\Katopd;
use Datatables;
use Storage;

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
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function datatables()
    {
        $param = [
            'url' => 'kategori-opd',
            'action' => ['show', 'edit', 'destroy'],
            'gambar' => 'kategori-opd'
        ];

        return Datatables::of(Katopd::query())
            ->addColumn('action', function($data) use ($param) {
                return generateAction($param, $data->slug);
            })
            ->editColumn('gambar', function($data) use ($param) {
                return generateImagePath($param['gambar'], $data->gambar, $data->name);
            })
           
            ->rawColumns([ 'gambar', 'action'])
            ->addIndexColumn()
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page = [
            'title' => 'Tambah Perangkat Daerah',
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
        $katopd->slug = str_slug($katopd->name);
        $gambar = $request->file('gambar');
        $path = 'image/opd';


        if (!$gambar->isValid()) {
            return redirect()->back()->withInput()->withErrors('gambar', 'Gambar tidak valid');
        }

        $katopd->gambar = time().'-'.$katopd->slug.'.'.$gambar->getClientOriginalExtension();
        $katopd->save();
        $gambar->move($path, $katopd->gambar);
        
        // create thumbnail
        //generateThumbnail($path, $katopd->gambar);

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
            'title' => 'Detail Perangkat Daerah',
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
            'title' => 'Edit Perangkat Daerah',
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
        $data = $request->except('id', 'gambar');
        $katopd = $model->getDataBySlug($slug);
        $data['slug'] = str_slug($data['name']);

        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $path = 'image/opd';

            if (!$gambar->isValid()) {
                return redirect()->back()->withInput()->withErrors('gambar', 'Gambar tidak valid');
            }

            $data['gambar'] = time().'-'.$data['slug'].'.'.$gambar->getClientOriginalExtension();
            $gambar->move($path, $data['gambar']);

            // delete image & thumbnail
            deleteImageThumbnail($path, $katopd->gambar);

            // create thumbnail
            generateThumbnail($path, $data['gambar']);
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
            $image = 'image/opd/'.$katopd->gambar;
            $thumbnail = 'image/opd/thumbnail/'.$katopd->gambar;

            // delete image & thumbnail
            deleteImageThumbnail('image/opd', $katopd->gambar);

            $katopd->delete();
            $message = 'Data telah dihapus';
        } else {
            $message = 'Data tidak ditemukan';
        }

        return redirect()->route('kategori-opd.index')->with('success', $message);
    }
}
