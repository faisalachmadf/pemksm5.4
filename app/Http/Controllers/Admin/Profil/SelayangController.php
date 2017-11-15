<?php

namespace App\Http\Controllers\Admin\Profil;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Profil\SelayangRequest;

use App\Models\Profil\Selayang;
use Yajra\Datatables\Datatables;

class SelayangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page = [
            'title' => 'Selayang Pandang'
        ];

        return view('layouts.profil.selayang.index')->withPage($page);
    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function datatables()
    {
        $param = [
            'url' => 'selayang-pandang',
            'action' => ['show', 'edit', 'destroy']
        ];

        return Datatables::of(Selayang::query())
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page = [
            'title' => 'Tambah Selayang Pandang'
        ];

        return view('layouts.profil.selayang.create')->withPage($page);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SelayangRequest $request)
    {
        $selayang = new Selayang;
        $selayang->judul = $request->input('judul');
        $selayang->isi = $request->input('isi');
        $selayang->slug = str_slug($selayang->judul);

        if ($request->has('aktif')) {
            Selayang::setNotActive();
            $selayang->aktif = true;
        }

        $selayang->save();

        return redirect()->route('selayang-pandang.index')->with('success', 'Data telah tersimpan');
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
            'title' => 'Detail Selayang Pandang'
        ];
        $model = new Selayang;
        $selayang = $model->getDataBySlug($slug);

        return view('layouts.profil.selayang.show', compact('selayang'))->withPage($page);
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
            'title' => 'Edit Selayang Pandang'
        ];
        $model = new Selayang;
        $selayang = $model->getDataBySlug($slug);

        return view('layouts.profil.selayang.edit', compact('selayang'))->withPage($page);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SelayangRequest $request, $slug)
    {
        $model = new Selayang;
        $data = $request->except('id');
        $selayang = $model->getDataBySlug($slug);

        if ($request->has('aktif')) {
            Selayang::setNotActive($selayang->id);
            $data['aktif'] = true;
        }

        $selayang->update($data);

        return redirect()->route('selayang-pandang.index')->with('success', 'Data telah diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $model = new Selayang;
        $selayang = $model->getDataBySlug($slug);

        if ($selayang) {
            $selayang->delete();
            $message = 'Data telah dihapus';
        } else {
            $message = 'Data tidak ditemukan';
        }

        return redirect()->route('selayang-pandang.index')->with('success', $message);
    }
}
