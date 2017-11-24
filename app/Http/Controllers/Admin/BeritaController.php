<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\BeritaRequest;

use App\Models\Berita;
use App\Models\Kategori\Katberita;
use Datatables;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page = [
            'title' => 'Berita',
            'breadcrumb' => 'Berita'
        ];

        return view('layouts.berita.index')->withPage($page);
    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function datatables()
    {
        $param = [
            'url' => 'berita',
            'action' => ['show', 'edit', 'destroy'],
            'gambar' => 'berita'
        ];

        return Datatables::of(Berita::with(['katberita', 'user']))
            ->addColumn('action', function($data) use ($param) {
                return generateAction($param, $data->slug);
            })
            ->editColumn('gambar', function($data) use ($param) {
                return generateImagePath($param['gambar'], $data->gambar, $data->judul);
            })
            ->editColumn('isi', function($data) {
                return str_limit($data->isi, 100);
            })
            ->addColumn('user', function($data) {
                return generateUser($data->user);
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
            'title' => 'Tambah Berita',
            'breadcrumb' => 'Tambah'
        ];
        $view = [
            'katberita' => Katberita::all()
        ];

        return view('layouts.berita.create', $view)->withPage($page);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BeritaRequest $request)
    {
        $berita = new Berita;
        $berita->id_katberita = $request->input('id_katberita');
        $berita->judul = $request->input('judul');
        $berita->isi = $request->input('isi');
        $berita->tanggal = dateFormatGeneral($request->input('tanggal'));
        $berita->slug = str_slug($berita->judul);
        $gambar = $request->file('gambar');
        $path = 'image/berita';

        if (!$gambar->isValid()) {
            return redirect()->back()->withInput()->withErrors('gambar', 'Gambar tidak valid');
        }

        $berita->gambar = time().'-'.$berita->slug.'.'.$gambar->getClientOriginalExtension();
        $berita->save();
        $gambar->move($path, $berita->gambar);

        //create thumbnail
        generateThumbnail($path, $berita->gambar);

        return redirect()->route('berita.index')->with('success', 'Data telah tersimpan');
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
            'title' => 'Detail Berita',
            'breadcrumb' => 'Detail'
        ];
        $model = new Berita;
        $berita = $model->getDataBySlug($slug);

        return view('layouts.berita.show', compact('berita'))->withPage($page);
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
            'title' => 'Edit Berita',
            'breadcrumb' => 'Edit'
        ];
        $model = new Berita;
        $view = [
            'berita' => $model->getDataBySlug($slug),
            'katberita' => Katberita::all()
        ];

        return view('layouts.berita.edit', $view)->withPage($page);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BeritaRequest $request, $slug)
    {
        $model = new Berita;
        $data = $request->except('id', 'gambar');
        $berita = $model->getDataBySlug($slug);
        $data['slug'] = str_slug($data['judul']);
        $data['tanggal'] = dateFormatGeneral($data['tanggal']);

        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $path = 'image/berita';

            if (!$gambar->isValid()) {
                return redirect()->back()->withInput()->withErrors('gambar', 'Gambar tidak valid');
            }

            $data['gambar'] = time().'-'.$data['slug'].'.'.$gambar->getClientOriginalExtension();
            $gambar->move($path, $data['gambar']);

            // delete image & thumbnail
            deleteImageThumbnail($path, $berita->gambar);

            // create thumbnail
            generateThumbnail($path, $data['gambar']);
        }
        
        $berita->update($data);

        return redirect()->route('berita.index')->with('success', 'Data telah diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $model = new Berita;
        $berita = $model->getDataBySlug($slug);

        if ($berita) {
            // delete image & thumbnail
            deleteImageThumbnail('image/berita', $berita->gambar);

            $berita->delete();
            $message = 'Data telah dihapus';
        } else {
            $message = 'Data tidak ditemukan';
        }

        return redirect()->route('berita.index')->with('success', $message);
    }
}
