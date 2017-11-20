<?php

namespace App\Http\Controllers\Admin\Profil;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Profil\VisiMisiRequest;

use App\Models\Profil\VisiMisi;
use Datatables;

class VisiMisiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page = [
            'title' => 'Visi dan Misi',
            'breadcrumb' => 'Visi & Misi'
        ];

        return view('layouts.profil.visi-misi.index')->withPage($page);
    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function datatables()
    {
        $param = [
            'url' => 'visi-misi',
            'action' => ['show', 'edit', 'destroy']
        ];

        return Datatables::of(VisiMisi::query())
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
            'title' => 'Tambah Visi dan Misi',
            'breadcrumb' => 'Tambah'
        ];

        return view('layouts.profil.visi-misi.create')->withPage($page);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VisiMisiRequest $request)
    {
        $visimisi = new VisiMisi;
        $visimisi->judul = $request->input('judul');
        $visimisi->isi = $request->input('isi');
        $visimisi->slug = str_slug($visimisi->judul);

        if ($request->has('aktif')) {
            VisiMisi::setNotActive();
            $visimisi->aktif = true;
        }

        $visimisi->save();

        return redirect()->route('visi-misi.index')->with('success', 'Data telah tersimpan');
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
            'title' => 'Detail Visi dan Misi',
            'breadcrumb' => 'Detail'
        ];
        $model = new VisiMisi;
        $visimisi = $model->getDataBySlug($slug);

        return view('layouts.profil.visi-misi.show', compact('visimisi'))->withPage($page);
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
            'title' => 'Edit Visi dan Misi',
            'breadcrumb' => 'Edit'
        ];
        $model = new VisiMisi;
        $visimisi = $model->getDataBySlug($slug);

        return view('layouts.profil.visi-misi.edit', compact('visimisi'))->withPage($page);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(VisiMisiRequest $request, $slug)
    {
        $model = new VisiMisi;
        $data = $request->except('id');
        $visimisi = $model->getDataBySlug($slug);
        $data['slug'] = str_slug($data['judul']);

        if ($request->has('aktif')) {
            VisiMisi::setNotActive($visimisi->id);
            $data['aktif'] = true;
        }

        $visimisi->update($data);

        return redirect()->route('visi-misi.index')->with('success', 'Data telah diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $model = new VisiMisi;
        $visimisi = $model->getDataBySlug($slug);

        if ($visimisi) {
            $visimisi->delete();
            $message = 'Data telah dihapus';
        } else {
            $message = 'Data tidak ditemukan';
        }

        return redirect()->route('visi-misi.index')->with('success', $message);
    }
}
