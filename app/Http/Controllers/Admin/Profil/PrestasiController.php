<?php

namespace App\Http\Controllers\Admin\Profil;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Profil\PrestasiRequest;

use App\Models\Profil\Prestasi;
use Datatables;
use Storage;

class PrestasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page = [
            'title' => 'Prestasi',
            'breadcrumb' => 'Prestasi'
        ];

        return view('layouts.profil.prestasi.index')->withPage($page);
    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function datatables()
    {
        $param = [
            'url' => 'prestasi',
            'action' => ['show', 'edit', 'destroy'],
            'gambar' => 'prestasi'
        ];

        return Datatables::of(Prestasi::query())
            ->addColumn('action', function($data) use ($param) {
                return generateAction($param, $data->slug);
            })
            ->editColumn('gambar', function($data) use ($param) {
                return generateImagePath($param['gambar'], $data->gambar, $data->judul);
            })
            ->editColumn('isi', function($data) {
                return str_limit($data->isi, 100);
            })
            ->rawColumns(['isi', 'gambar', 'action'])
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
            'title' => 'Tambah Prestasi',
            'breadcrumb' => 'Tambah'
        ];

        return view('layouts.profil.prestasi.create')->withPage($page);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PrestasiRequest $request)
    {
        $prestasi = new Prestasi;
        $prestasi->judul = $request->input('judul');
        $prestasi->isi = $request->input('isi');
        $prestasi->slug = str_slug($prestasi->judul);
        $gambar = $request->file('gambar');
        $path = 'image/prestasi';

        if (!$gambar->isValid()) {
            return redirect()->back()->withInput()->withErrors('gambar', 'Gambar tidak valid');
        }

        $prestasi->gambar = time().'-'.$prestasi->slug.'.'.$gambar->getClientOriginalExtension();
        $prestasi->save();
        $gambar->move($path, $prestasi->gambar);

        // create thumbnail
        generateThumbnail($path, $prestasi->gambar);

        return redirect()->route('prestasi.index')->with('success', 'Data telah tersimpan');
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
            'title' => 'Detail Prestasi',
            'breadcrumb' => 'Detail'
        ];
        $model = new Prestasi;
        $prestasi = $model->getDataBySlug($slug);

        return view('layouts.profil.prestasi.show', compact('prestasi'))->withPage($page);
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
            'title' => 'Edit Prestasi',
            'breadcrumb' => 'Edit'
        ];
        $model = new Prestasi;
        $prestasi = $model->getDataBySlug($slug);

        return view('layouts.profil.prestasi.edit', compact('prestasi'))->withPage($page);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PrestasiRequest $request, $slug)
    {
        $model = new Prestasi;
        $data = $request->except('id', 'gambar');
        $prestasi = $model->getDataBySlug($slug);
        $data['slug'] = str_slug($data['judul']);

        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $path = 'image/prestasi';

            if (!$gambar->isValid()) {
                return redirect()->back()->withInput()->withErrors('gambar', 'Gambar tidak valid');
            }

            $data['gambar'] = time().'-'.$data['slug'].'.'.$gambar->getClientOriginalExtension();
            $gambar->move($path, $data['gambar']);

            // delete image & thumbnail
            deleteImageThumbnail($path, $prestasi->gambar);

            // create thumbnail
            generateThumbnail($path, $data['gambar']);
        }
        
        $prestasi->update($data);

        return redirect()->route('prestasi.index')->with('success', 'Data telah diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $model = new Prestasi;
        $prestasi = $model->getDataBySlug($slug);

        if ($prestasi) {
            $image = 'image/prestasi/'.$prestasi->gambar;
            $thumbnail = 'image/prestasi/thumbnail/'.$prestasi->gambar;

            // delete image & thumbnail
            deleteImageThumbnail('image/prestasi', $prestasi->gambar);

            $prestasi->delete();
            $message = 'Data telah dihapus';
        } else {
            $message = 'Data tidak ditemukan';
        }

        return redirect()->route('prestasi.index')->with('success', $message);
    }
}
