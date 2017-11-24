<?php

namespace App\Http\Controllers\Admin\Kategori;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Kategori\KatdnRequest;

use App\Models\Kategori\Katdn;
use Datatables;
use Storage;


class KatDnController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page = [
            'title' => 'Kategori Kerja Sama Dalam Negeri',
            'breadcrumb' => 'Kategori Kerja Sama Dalam Negeri'
        ];

        return view('layouts.kategori.katdn.index')->withPage($page);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function datatables()
    {
        $param = [
            'url' => 'kategori-dn',
            'action' => ['show', 'edit', 'destroy']
        ];

        return Datatables::of(Katdn::query())
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
            'title' => 'Tambah Kategori Kerja Sama Dalam Negeri',
            'breadcrumb' => 'Tambah'
        ];

        return view('layouts.kategori.katdn.create')->withPage($page);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KatdnRequest $request)
   {
        $katdn = new Katdn;
        $katdn->name = $request->input('name');
        $katdn->slug = str_slug($katdn->name);
        $katdn->save();

        return redirect()->route('kategori-dn.index')->with('success', 'Data telah tersimpan');
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
            'title' => 'Detail Kategori Kerja Sama Dalam Negeri',
            'breadcrumb' => 'Detail'
        ];
        $model = new Katdn;
        $katdn = $model->getDataBySlug($slug);

        return view('layouts.kategori.katdn.show', compact('katdn'))->withPage($page);
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
            'title' => 'Edit Kategori Kerja Sama Dalam Negeri',
            'breadcrumb' => 'Edit'
        ];
        $model = new Katdn;
        $katdn = $model->getDataBySlug($slug);

        return view('layouts.kategori.katdn.edit', compact('katdn'))->withPage($page);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(KatdnRequest $request, $slug)
    {
        $model = new Katdn;
        $data = $request->except('id');
        $katdn = $model->getDataBySlug($slug);
        $katdn->update($data);

        return redirect()->route('kategori-dn.index')->with('success', 'Data telah diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $model = new Katdn;
        $katdn = $model->getDataBySlug($slug);

        if ($katdn) {
            $katdn->delete();
            $message = 'Data telah dihapus';
        } else {
            $message = 'Data tidak ditemukan';
        }

        return redirect()->route('kategori-dn.index')->with('success', $message);
    }
}
