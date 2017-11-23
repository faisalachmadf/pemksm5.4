<?php

namespace App\Http\Controllers\Admin\Kategori;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Kategori\KatjenislnRequest;

use App\Models\Kategori\Katjenisln;
use Yajra\Datatables\Datatables;

class KatJenisLnController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page = [
            'title' => 'Kategori Jenis Kerjasama Luar Negeri',
            'breadcrumb' => 'Kategori Jenis Kerjasama Luar Negeri'
        ];

        return view('layouts.kategori.katjenisln.index')->withPage($page);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function datatables()
    {
        $param = [
            'url' => 'kategori-jenisln',
            'action' => ['show', 'edit', 'destroy']
        ];

        return Datatables::of(Katjenisln::query())
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
            'title' => 'Tambah Kategori jenis Kerjasama Luar Negeri',
            'breadcrumb' => 'Tambah'
        ];

        return view('layouts.kategori.katjenisln.create')->withPage($page);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KatjenislnRequest $request)
   {
        $katjenisln = new Katjenisln;
        $katjenisln->name = $request->input('name');
        $katjenisln->slug = str_slug($katjenisln->name);
        $katjenisln->save();

        return redirect()->route('kategori-jenisln.index')->with('success', 'Data telah tersimpan');
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
            'title' => 'Detail Kategori jenis Kerjasama Luar Negeri',
            'breadcrumb' => 'Detail'
        ];
        $model = new Katjenisln;
        $katjenisln = $model->getDataBySlug($slug);

        return view('layouts.kategori.katjenisln.show', compact('katjenisln'))->withPage($page);
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
            'title' => 'Edit Kategori jenis Kerjasama Luar Negeri',
            'breadcrumb' => 'Edit'
        ];
        $model = new Katjenisln;
        $katjenisln = $model->getDataBySlug($slug);

        return view('layouts.kategori.katjenisln.edit', compact('katjenisln'))->withPage($page);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(KatjenislnRequest $request, $slug)
    {
        $model = new Katjenisln;
        $data = $request->except('id');
        $katjenisln = $model->getDataBySlug($slug);
        $katjenisln->update($data);

        return redirect()->route('kategori-jenisln.index')->with('success', 'Data telah diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $model = new Katjenisln;
        $katjenisln = $model->getDataBySlug($slug);

        if ($katjenisln) {
            $katjenisln->delete();
            $message = 'Data telah dihapus';
        } else {
            $message = 'Data tidak ditemukan';
        }

        return redirect()->route('kategori-jenisln.index')->with('success', $message);
    }
}
