<?php

namespace App\Http\Controllers\Admin\Kategori;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Kategori\KatjabatanRequest;

use App\Models\Kategori\Katjabatan;
use Yajra\Datatables\Datatables;

class KatJabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page = [
            'title' => 'Kategori Jabatan',
            'breadcrumb' => 'Kategori Jabatan'
        ];

        return view('layouts.kategori.katjabatan.index')->withPage($page);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function datatables()
    {
        $param = [
            'url' => 'kategori-jabatan',
            'action' => ['show', 'edit', 'destroy']
        ];

        return Datatables::of(Katjabatan::query())
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


    public function create()
    {
        $page = [
            'title' => 'Tambah Kategori jabatan',
            'breadcrumb' => 'Tambah'
        ];

        return view('layouts.kategori.katjabatan.create')->withPage($page);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KatjabatanRequest $request)
   {
        $katjabatan = new Katjabatan;
        $katjabatan->name = $request->input('name');
        $katjabatan->slug = str_slug($katjabatan->name);
        $katjabatan->save();

        return redirect()->route('kategori-jabatan.index')->with('success', 'Data telah tersimpan');
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
            'title' => 'Detail Kategori jabatan',
            'breadcrumb' => 'Detail'
        ];
        $model = new Katjabatan;
        $katjabatan = $model->getDataBySlug($slug);

        return view('layouts.kategori.katjabatan.show', compact('katjabatan'))->withPage($page);
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
            'title' => 'Edit Kategori jabatan',
            'breadcrumb' => 'Edit'
        ];
        $model = new Katjabatan;
        $katjabatan = $model->getDataBySlug($slug);

        return view('layouts.kategori.katjabatan.edit', compact('katjabatan'))->withPage($page);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(KatjabatanRequest $request, $slug)
    {
        $model = new Katjabatan;
        $data = $request->except('id');
        $katjabatan = $model->getDataBySlug($slug);
        $katjabatan->update($data);

        return redirect()->route('kategori-jabatan.index')->with('success', 'Data telah diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $model = new Katjabatan;
        $katjabatan = $model->getDataBySlug($slug);

        if ($katjabatan) {
            $katjabatan->delete();
            $message = 'Data telah dihapus';
        } else {
            $message = 'Data tidak ditemukan';
        }

        return redirect()->route('kategori-jabatan.index')->with('success', $message);
    }
}
