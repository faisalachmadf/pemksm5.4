<?php

namespace App\Http\Controllers\Admin\DataKerjasama;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\DataKerjasama\KerjasamaLnRequest;

use App\Models\DataKerjasama\KerjasamaLn;
use App\Models\Kategori\Katln;
use App\Models\Kategori\Katjenisln;
use App\Models\Kategori\Katopd;
use Datatables;

class KerjasamaLnController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page = [
            'title' => 'Data Kerjasama Luar Negeri',
            'breadcrumb' => 'Luar Negeri'
        ];

        return view('layouts.data-kerjasama.luar-negeri.index')->withPage($page);
    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function datatables()
    {
        $param = [
            'url' => 'kerjasama-luar-negeri',
            'action' => ['show', 'edit', 'destroy'],
            'gambar' => 'kerjasama-luar-negeri'
        ];

        return Datatables::of(KerjasamaLn::with(['katln', 'katjenisln', 'user']))
            ->addColumn('action', function($data) use ($param) {
                return generateAction($param, $data->slug);
            })
            ->editColumn('gambar', function($data) use ($param) {
                return generateImagePath($param['gambar'], $data->gambar, $data->judul);
            })
            ->addColumn('user', function($data) {
                return generateUser($data->user);
            })
            ->addColumn('sisa', function($data) {
                return generateRemainingDays($data->tanggal_akhir);
            })
            ->setRowClass(function ($data) {
                return generateExpiredClass($data->tanggal_akhir, 60);
            })
            ->rawColumns(['nomor', 'gambar', 'action'])
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
            'title' => 'Tambah Data Kerjasama Luar Negeri',
            'breadcrumb' => 'Tambah'
        ];
        $view = [
            'katln' => Katln::all(),
            'katjenisln' => Katjenisln::all(),
            'katopd' => Katopd::all()
        ];

        return view('layouts.data-kerjasama.luar-negeri.create', $view)->withPage($page);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KerjasamaLnRequest $request)
    {
        $kerjasama = new KerjasamaLn;
        $kerjasama->id_katln = $request->input('id_katln');
        $kerjasama->id_katjenisln = $request->input('id_katjenisln');
        $kerjasama->tahun = $request->input('tahun');
        $kerjasama->nomor = $request->input('nomor');
        $kerjasama->judul = $request->input('judul');
        $kerjasama->pihak = $request->input('pihak');
        $kerjasama->summary = $request->input('summary');
        $kerjasama->tanggal_awal = getDateFormatGeneral($request->input('tanggal'), 0);
        $kerjasama->tanggal_akhir = getDateFormatGeneral($request->input('tanggal'), 1);
        $kerjasama->id_katopd = $request->input('id_katopd');
        $kerjasama->keterangan = $request->input('keterangan');
        $kerjasama->slug = str_slug($kerjasama->judul);
        $gambar = $request->file('gambar');
        $path = 'image/kerjasama-luar-negeri';

        if (!$gambar->isValid()) {
            return redirect()->back()->withInput()->withErrors('gambar', 'Gambar tidak valid');
        }

        $kerjasama->gambar = time().'-'.$kerjasama->slug.'.'.$gambar->getClientOriginalExtension();
        $kerjasama->save();
        $gambar->move($path, $kerjasama->gambar);

        //create thumbnail
        generateThumbnail($path, $kerjasama->gambar);

        return redirect()->route('kerjasama-luar-negeri.index')->with('success', 'Data telah tersimpan');
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
            'title' => 'Detail Data Kerjasama Luar Negeri',
            'breadcrumb' => 'Detail'
        ];
        $model = new KerjasamaLn;
        $kerjasama = $model->getDataBySlug($slug);

        return view('layouts.data-kerjasama.luar-negeri.show', compact('kerjasama'))->withPage($page);
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
            'title' => 'Edit Data Kerjasama Luar Negeri',
            'breadcrumb' => 'Edit'
        ];
        $model = new KerjasamaLn;
        $view = [
            'kerjasama' => $model->getDataBySlug($slug),
            'katln' => Katln::all(),
            'katjenisln' => Katjenisln::all(),
            'katopd' => Katopd::all()
        ];

        return view('layouts.data-kerjasama.luar-negeri.edit', $view)->withPage($page);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(KerjasamaLnRequest $request, $id)
    {
        $model = new KerjasamaLn;
        $data = $request->except('id', 'tanggal', 'gambar');
        $kerjasama = $model->getDataBySlug($slug);
        $data['slug'] = str_slug($data['judul']);
        $data['tanggal_awal'] = getDateFormatGeneral($request->input('tanggal'), 0);
        $data['tanggal_akhir'] = getDateFormatGeneral($request->input('tanggal'), 1);

        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $path = 'image/kerjasama-luar-negeri';

            if (!$gambar->isValid()) {
                return redirect()->back()->withInput()->withErrors('gambar', 'Gambar tidak valid');
            }

            $data['gambar'] = time().'-'.$data['slug'].'.'.$gambar->getClientOriginalExtension();
            $gambar->move($path, $data['gambar']);

            // delete image & thumbnail
            deleteImageThumbnail($path, $kerjasama->gambar);

            // create thumbnail
            generateThumbnail($path, $data['gambar']);
        }
        
        $kerjasama->update($data);

        return redirect()->route('kerjasama-luar-negeri.index')->with('success', 'Data telah diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = new KerjasamaLn;
        $kerjasama = $model->getDataBySlug($slug);

        if ($kerjasama) {
            // delete image & thumbnail
            deleteImageThumbnail('image/kerjasama-luar-negeri', $kerjasama->gambar);

            $kerjasama->delete();
            $message = 'Data telah dihapus';
        } else {
            $message = 'Data tidak ditemukan';
        }

        return redirect()->route('kerjasama-luar-negeri.index')->with('success', $message);
    }
}
