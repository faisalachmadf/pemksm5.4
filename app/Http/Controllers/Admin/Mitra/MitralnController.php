<?php

namespace App\Http\Controllers\Admin\Mitra;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Mitra\MitralnRequest;

use App\Models\Mitra\Mitraln;
use App\Models\Kategori\katmitraln;
use Datatables;

class MitralnController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page = [
            'title' => 'Mitra Kerjasama luar Negeri',
            'breadcrumb' => 'Mitra Kerjasama luar Negeri'
        ];

        return view('layouts.mitra.mitra-luar-negeri.index')->withPage($page);
    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function datatables()
    {
        $param = [
            'url' => 'mitra-luar-negeri',
            'action' => ['show', 'edit', 'destroy'],
            'gambar' => 'mitraln'
        ];

        return Datatables::of(Mitraln::with(['Katmitraln', 'user']))
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
            'title' => 'Tambah Mitra Kerjasama luar Negeri',
            'breadcrumb' => 'Tambah'
        ];
        $view = [
            'katmitraln' => Katmitraln::all()
        ];

        return view('layouts.mitra.mitra-luar-negeri.create', $view)->withPage($page);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MitralnRequest $request)
    {
        $mitraln = new Mitraln;
        $mitraln->id_katmitraln = $request->input('id_katmitraln');
        $mitraln->judul = $request->input('judul');
        $mitraln->isi = $request->input('isi');
        $mitraln->slug = str_slug($mitraln->judul);
        $gambar = $request->file('gambar');
        $path = 'image/mitraln';

        if (!$gambar->isValid()) {
            return redirect()->back()->withInput()->withErrors('gambar', 'Gambar tidak valid');
        }

        $mitraln->gambar = time().'-'.$mitraln->slug.'.'.$gambar->getClientOriginalExtension();
        $mitraln->save();
        $gambar->move($path, $mitraln->gambar);

        //create thumbnail
        //generateThumbnail($path, $mitraln->gambar);

        return redirect()->route('mitra-luar-negeri.index')->with('success', 'Data telah tersimpan');
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
            'title' => 'Detail Mitra Kerjasama luar Negeri',
            'breadcrumb' => 'Detail'
        ];
        $model = new Mitraln;
        $mitraln = $model->getDataBySlug($slug);

        return view('layouts.mitra.mitra-luar-negeri.show', compact('mitraln'))->withPage($page);
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
            'title' => 'Edit Mitra Kerjasama luar Negeri',
            'breadcrumb' => 'Edit'
        ];
        $model = new Mitraln;
        $view = [
            'mitraln' => $model->getDataBySlug($slug),
            'katmitraln' => Katmitraln::all()
        ];

        return view('layouts.mitra.mitra-luar-negeri.edit', $view)->withPage($page);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(mitralnRequest $request, $slug)
    {
        $model = new mitraln;
        $data = $request->except('id', 'gambar');
        $mitraln = $model->getDataBySlug($slug);
        $data['slug'] = str_slug($data['judul']);

        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $path = 'image/mitraln';

            if (!$gambar->isValid()) {
                return redirect()->back()->withInput()->withErrors('gambar', 'Gambar tidak valid');
            }

            $data['gambar'] = time().'-'.$data['slug'].'.'.$gambar->getClientOriginalExtension();
            $gambar->move($path, $data['gambar']);

            // delete image & thumbnail
            deleteImageThumbnail($path, $mitraln->gambar);

            // create thumbnail
            //generateThumbnail($path, $data['gambar']);
        }
        
        $mitraln->update($data);

        return redirect()->route('mitra-luar-negeri.index')->with('success', 'Data telah diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $model = new mitraln;
        $mitraln = $model->getDataBySlug($slug);

        if ($mitraln) {
            // delete image & thumbnail
            deleteImageThumbnail('image/mitraln', $mitraln->gambar);

            $mitraln->delete();
            $message = 'Data telah dihapus';
        } else {
            $message = 'Data tidak ditemukan';
        }

        return redirect()->route('mitra-luar-negeri.index')->with('success', $message);
    }
}
