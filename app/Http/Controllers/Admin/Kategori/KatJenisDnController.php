<?php

namespace App\Http\Controllers\Admin\Kategori;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Kategori\KatjenisdnRequest;

use App\Models\Kategori\Katjenisdn;
use Yajra\Datatables\Datatables;

class KatJenisDnController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page = [
            'title' => 'Kategori Jenis Kerjasama Dalam Negeri',
            'breadcrumb' => 'Kategori Jenis Kerjasama Dalam Negeri'
        ];

        return view('layouts.kategori.katjenisdn.index')->withPage($page);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function datatables()
    {
        $param = [
            'url' => 'kategori-jenisdn',
            'action' => ['show', 'edit', 'destroy']
        ];

        return Datatables::of(Katjenisdn::query())
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
            'title' => 'Tambah Kategori jenis Kerjasama Dalam Negeri',
            'breadcrumb' => 'Tambah'
        ];

        return view('layouts.kategori.katjenisdn.create')->withPage($page);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KatjenisdnRequest $request)
   {
        $katjenisdn = new Katjenisdn;
        $katjenisdn->name = $request->input('name');
        $katjenisdn->slug = str_slug($katjenisdn->name);
        $katjenisdn->save();

        return redirect()->route('kategori-jenisdn.index')->with('success', 'Data telah tersimpan');
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
            'title' => 'Detail Kategori jenis Kerjasama Dalam Negeri',
            'breadcrumb' => 'Detail'
        ];
        $model = new Katjenisdn;
        $katjenisdn = $model->getDataBySlug($slug);

        return view('layouts.kategori.katjenisdn.show', compact('katjenisdn'))->withPage($page);
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
            'title' => 'Edit Kategori jenis Kerjasama Dalam Negeri',
            'breadcrumb' => 'Edit'
        ];
        $model = new Katjenisdn;
        $katjenisdn = $model->getDataBySlug($slug);

        return view('layouts.kategori.katjenisdn.edit', compact('katjenisdn'))->withPage($page);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(KatjenisdnRequest $request, $slug)
    {
        $model = new Katjenisdn;
        $data = $request->except('id');
        $katjenisdn = $model->getDataBySlug($slug);
        $katjenisdn->update($data);

        return redirect()->route('kategori-jenisdn.index')->with('success', 'Data telah diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $model = new Katjenisdn;
        $katjenisdn = $model->getDataBySlug($slug);

        if ($katjenisdn) {
            $katjenisdn->delete();
            $message = 'Data telah dihapus';
        } else {
            $message = 'Data tidak ditemukan';
        }

        return redirect()->route('kategori-jenisdn.index')->with('success', $message);
    }
}
