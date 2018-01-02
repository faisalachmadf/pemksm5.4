<?php

namespace App\Http\Controllers\Admin\Mitra;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Mitra\MitradnRequest;

use App\Models\Mitra\Mitradn;
use App\Models\Kategori\Katmitra;
use Datatables;

class MitradnController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page = [
            'title' => 'Mitra Kerjasama Dalam Negeri',
            'breadcrumb' => 'Mitra Kerjasama Dalam Negeri'
        ];

        return view('layouts.mitra.mitra-dalam-negeri.index')->withPage($page);
    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function datatables()
    {
        $param = [
            'url' => 'mitra-dalam-negeri',
            'action' => ['show', 'edit', 'destroy'],
            'gambar' => 'mitradn'
        ];

        return Datatables::of(Mitradn::with(['katmitra', 'user']))
            ->addColumn('action', function($data) use ($param) {
                return generateAction($param, $data->slug);
            })
            ->editColumn('gambar', function($data) use ($param) {
                return generateImagePath($param['gambar'], $data->gambar, $data->judul);
            })
            ->editColumn('judul', function($data) {
                return str_limit($data->judul, 100);
            })
            ->addColumn('user', function($data) {
                return generateUser($data->user);
            })
            ->rawColumns(['judul', 'gambar', 'action'])
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
            'title' => 'Tambah Mitra Kerjasama Dalam Negeri',
            'breadcrumb' => 'Tambah'
        ];
        $view = [
            'katmitra' => Katmitra::all()
        ];

        return view('layouts.mitra.mitra-dalam-negeri.create', $view)->withPage($page);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MitradnRequest $request)
    {
        $mitradn = new Mitradn;
        $mitradn->id_katmitra = $request->input('id_katmitra');
        $mitradn->judul = $request->input('judul');
        $mitradn->isi = $request->input('isi');
        $mitradn->slug = str_slug($mitradn->judul);
        $gambar = $request->file('gambar');
        $path = 'image/mitradn';

        if (!$gambar->isValid()) {
            return redirect()->back()->withInput()->withErrors('gambar', 'Gambar tidak valid');
        }

        $mitradn->gambar = time().'-'.$mitradn->slug.'.'.$gambar->getClientOriginalExtension();
        $mitradn->save();
        $gambar->move($path, $mitradn->gambar);

        //create thumbnail
        generateThumbnail($path, $mitradn->gambar);

        return redirect()->route('mitra-dalam-negeri.index')->with('success', 'Data telah tersimpan');
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
            'title' => 'Detail Mitra Kerjasama Dalam Negeri',
            'breadcrumb' => 'Detail'
        ];
        $model = new Mitradn;
        $mitradn = $model->getDataBySlug($slug);

        return view('layouts.mitra.mitra-dalam-negeri.show', compact('mitradn'))->withPage($page);
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
            'title' => 'Edit Mitra Kerjasama Dalam Negeri',
            'breadcrumb' => 'Edit'
        ];
        $model = new mitradn;
        $view = [
            'mitradn' => $model->getDataBySlug($slug),
            'katmitra' => Katmitra::all()
        ];

        return view('layouts.mitra.mitra-dalam-negeri.edit', $view)->withPage($page);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MitradnRequest $request, $slug)
    {
        $model = new Mitradn;
        $data = $request->except('id', 'gambar');
        $mitradn = $model->getDataBySlug($slug);
        $data['slug'] = str_slug($data['judul']);

        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $path = 'image/mitradn';

            if (!$gambar->isValid()) {
                return redirect()->back()->withInput()->withErrors('gambar', 'Gambar tidak valid');
            }

            $data['gambar'] = time().'-'.$data['slug'].'.'.$gambar->getClientOriginalExtension();
            $gambar->move($path, $data['gambar']);

            // delete image & thumbnail
            deleteImageThumbnail($path, $mitradn->gambar);

            // create thumbnail
            generateThumbnail($path, $data['gambar']);
        }
        
        $mitradn->update($data);

        return redirect()->route('mitra-dalam-negeri.index')->with('success', 'Data telah diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $model = new Mitradn;
        $mitradn = $model->getDataBySlug($slug);

        if ($mitradn) {
            // delete image & thumbnail
            deleteImageThumbnail('image/mitradn', $mitradn->gambar);

            $mitradn->delete();
            $message = 'Data telah dihapus';
        } else {
            $message = 'Data tidak ditemukan';
        }

        return redirect()->route('mitra-dalam-negeri.index')->with('success', $message);
    }
}
