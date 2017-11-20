<?php

namespace App\Http\Controllers\Admin\Kategori;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Kategori\KatgolonganRequest;

use App\Models\Kategori\Katgolongan;
use Yajra\Datatables\Datatables;

class KatGolonganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page = [
            'title' => 'Kategori Golongan',
            'breadcrumb' => 'Kategori Golongan'
        ];

        return view('layouts.kategori.katgolongan.index')->withPage($page);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function datatables()
    {
        $param = [
            'url' => 'kategori-golongan',
            'action' => ['show', 'edit', 'destroy']
        ];

        return Datatables::of(Katgolongan::query())
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
            'title' => 'Tambah Kategori golongan',
            'breadcrumb' => 'Tambah'
        ];

        return view('layouts.kategori.katgolongan.create')->withPage($page);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KatgolonganRequest $request)
   {
        $katgolongan = new Katgolongan;
        $katgolongan->name = $request->input('name');
        $katgolongan->slug = str_slug($katgolongan->name);
        $katgolongan->save();

        return redirect()->route('kategori-golongan.index')->with('success', 'Data telah tersimpan');
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
            'title' => 'Detail Kategori golongan',
            'breadcrumb' => 'Detail'
        ];
        $model = new Katgolongan;
        $katgolongan = $model->getDataBySlug($slug);

        return view('layouts.kategori.katgolongan.show', compact('katgolongan'))->withPage($page);
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
            'title' => 'Edit Kategori golongan',
            'breadcrumb' => 'Edit'
        ];
        $model = new Katgolongan;
        $katgolongan = $model->getDataBySlug($slug);

        return view('layouts.kategori.katgolongan.edit', compact('katgolongan'))->withPage($page);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(KatgolonganRequest $request, $slug)
    {
        $model = new Katgolongan;
        $data = $request->except('id');
        $katgolongan = $model->getDataBySlug($slug);
        $katgolongan->update($data);

        return redirect()->route('kategori-golongan.index')->with('success', 'Data telah diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $model = new Katgolongan;
        $katgolongan = $model->getDataBySlug($slug);

        if ($katgolongan) {
            $katgolongan->delete();
            $message = 'Data telah dihapus';
        } else {
            $message = 'Data tidak ditemukan';
        }

        return redirect()->route('kategori-golongan.index')->with('success', $message);
    }
}
