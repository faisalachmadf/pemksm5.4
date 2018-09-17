<?php

namespace App\Http\Controllers\Admin\DataKerjasama;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\DataKerjasama\KerjasamaDnRequest;

use App\Models\DataKerjasama\KerjasamaDn;
use App\Models\Kategori\Katdn;
use App\Models\Kategori\Katjenisdn;
use App\Models\Kategori\Katopd;
use Datatables;

class KerjasamaDnController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page = [
            'title' => 'Data Kerjasama Dalam Negeri',
            'breadcrumb' => 'Dalam Negeri'
        ];

        return view('layouts.data-kerjasama.dalam-negeri.index')->withPage($page);
    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function datatables()
    {
        $param = [
            'url' => 'kerjasama-dalam-negeri',
            'action' => ['show', 'edit', 'destroy'],
            'gambar' => 'kerjasama-dalam-negeri'
        ];

        return Datatables::of(KerjasamaDn::with(['katdn', 'katjenisdn', 'user']))
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
            'title' => 'Tambah Data Kerjasama Dalam Negeri',
            'breadcrumb' => 'Tambah'
        ];
        $view = [
            'katdn' => Katdn::all(),
            'katjenisdn' => Katjenisdn::all(),
            'katopd' => Katopd::all()
        ];

        return view('layouts.data-kerjasama.dalam-negeri.create', $view)->withPage($page);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KerjasamaDnRequest $request)
    {
        $kerjasama = new KerjasamaDn;
        $kerjasama->id_katdn = $request->input('id_katdn');
        $kerjasama->id_katjenisdn = $request->input('id_katjenisdn');
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
        $path = 'image/kerjasama-dalam-negeri';

        if (!$gambar->isValid()) {
            return redirect()->back()->withInput()->withErrors('gambar', 'Gambar tidak valid');
        }

        // asal $kerjasama->gambar = time().'-'.$kerjasama->slug.'.'.$gambar->getClientOriginalExtension();
        $kerjasama->gambar = time().'-'.$kerjasama->id_katopd.'.'.$gambar->getClientOriginalExtension();
      
        $kerjasama->save();
        $gambar->move($path, $kerjasama->gambar);

        //create thumbnail
        generateThumbnail($path, $kerjasama->gambar);

        return redirect()->route('kerjasama-dalam-negeri.index')->with('success', 'Data telah tersimpan');
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
            'title' => 'Detail Data Kerjasama Dalam Negeri',
            'breadcrumb' => 'Detail'
        ];
        $model = new KerjasamaDn;
        $kerjasama = $model->getDataBySlug($slug);

        return view('layouts.data-kerjasama.dalam-negeri.show', compact('kerjasama'))->withPage($page);
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
            'title' => 'Edit Data Kerjasama Dalam Negeri',
            'breadcrumb' => 'Edit'
        ];
        $model = new KerjasamaDn;
        $view = [
            'kerjasama' => $model->getDataBySlug($slug),
            'katdn' => Katdn::all(),
            'katjenisdn' => Katjenisdn::all(),
            'katopd' => Katopd::all()
        ];

        return view('layouts.data-kerjasama.dalam-negeri.edit', $view)->withPage($page);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(KerjasamaDnRequest $request, $slug)
    {
        $model = new KerjasamaDn;
        $data = $request->except('id', 'tanggal', 'gambar');
        $kerjasama = $model->getDataBySlug($slug);
        $data['slug'] = str_slug($data['judul']);
        $data['tanggal_awal'] = getDateFormatGeneral($request->input('tanggal'), 0);
        $data['tanggal_akhir'] = getDateFormatGeneral($request->input('tanggal'), 1);

        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $path = 'image/kerjasama-dalam-negeri';

            if (!$gambar->isValid()) {
                return redirect()->back()->withInput()->withErrors('gambar', 'Gambar tidak valid');
            }

            // asal $data['gambar'] = time().'-'.$data['slug'].'.'.$gambar->getClientOriginalExtension();
            $data['gambar'] = time().'-'.$data['id_katopd'].'.'.$gambar->getClientOriginalExtension();
            $gambar->move($path, $data['gambar']);

            // delete image & thumbnail
            deleteImageThumbnail($path, $kerjasama->gambar);

            // create thumbnail
            generateThumbnail($path, $data['gambar']);
        }
        
        $kerjasama->update($data);

        return redirect()->route('kerjasama-dalam-negeri.index')->with('success', 'Data telah diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $model = new KerjasamaDn;
        $kerjasama = $model->getDataBySlug($slug);

        if ($kerjasama) {
            // delete image & thumbnail
            deleteImageThumbnail('image/kerjasama-dalam-negeri', $kerjasama->gambar);

            $kerjasama->delete();
            $message = 'Data telah dihapus';
        } else {
            $message = 'Data tidak ditemukan';
        }

        return redirect()->route('kerjasama-dalam-negeri.index')->with('success', $message);
    }
}
