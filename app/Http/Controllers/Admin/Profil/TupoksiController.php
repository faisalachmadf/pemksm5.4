<?php

namespace App\Http\Controllers\Admin\Profil;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Profil\TupoksiRequest;

use App\Models\Profil\Tupoksi;
use Datatables;

class TupoksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page = [
            'title' => 'Tugas, Pokok dan Fungsi',
            'breadcrumb' => 'Tupoksi'
        ];

        return view('layouts.profil.tupoksi.index')->withPage($page);
    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function datatables()
    {
        $param = [
            'url' => 'tugas-pokok-fungsi',
            'action' => ['show', 'edit', 'destroy']
        ];

        return Datatables::of(Tupoksi::query())
            ->addColumn('action', function($data) use ($param) {
                if ($data->aktif) {
                    unset($param['action'][array_search('destroy', $param['action'])]);
                }

                return generateAction($param, $data->slug);
            })
            ->editColumn('isi', function($data) {
                return str_limit($data->isi, 100);
            })
            ->editColumn('aktif', function($data) {
                if ($data->aktif) {
                    return 'Ya';
                }

                return 'Tidak Aktif';
            })
            ->rawColumns(['isi', 'action'])
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
            'title' => 'Tambah Tugas, Pokok dan Fungsi',
            'breadcrumb' => 'Tambah'
        ];

        return view('layouts.profil.tupoksi.create')->withPage($page);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TupoksiRequest $request)
    {
        $tupoksi = new Tupoksi;
        $tupoksi->judul = $request->input('judul');
        $tupoksi->isi = $request->input('isi');
        $tupoksi->slug = str_slug($tupoksi->judul);

        if ($request->has('aktif')) {
            Tupoksi::setNotActive();
            $tupoksi->aktif = true;
        }

        $tupoksi->save();

        return redirect()->route('tugas-pokok-fungsi.index')->with('success', 'Data telah tersimpan');
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
            'title' => 'Detail Tugas, Pokok dan Fungsi',
            'breadcrumb' => 'Detail'
        ];
        $model = new Tupoksi;
        $tupoksi = $model->getDataBySlug($slug);

        return view('layouts.profil.tupoksi.show', compact('tupoksi'))->withPage($page);
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
            'title' => 'Edit Tugas, Pokok dan Fungsi',
            'breadcrumb' => 'Edit'
        ];
        $model = new Tupoksi;
        $tupoksi = $model->getDataBySlug($slug);

        return view('layouts.profil.tupoksi.edit', compact('tupoksi'))->withPage($page);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TupoksiRequest $request, $slug)
    {
        $model = new Tupoksi;
        $data = $request->except('id');
        $tupoksi = $model->getDataBySlug($slug);
        $data['slug'] = str_slug($data['judul']);

        if ($request->has('aktif')) {
            Tupoksi::setNotActive($tupoksi->id);
            $data['aktif'] = true;
        }

        $tupoksi->update($data);

        return redirect()->route('tugas-pokok-fungsi.index')->with('success', 'Data telah diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $model = new Tupoksi;
        $tupoksi = $model->getDataBySlug($slug);

        if ($tupoksi) {
            $tupoksi->delete();
            $message = 'Data telah dihapus';
        } else {
            $message = 'Data tidak ditemukan';
        }

        return redirect()->route('tugas-pokok-fungsi.index')->with('success', $message);
    }
}
