<?php

namespace App\Http\Controllers\Admin\Kategori;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Kategori\KatlaporanRequest;

use App\Models\Kategori\Katlaporan;
use Yajra\Datatables\Datatables;

class KatLaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page = [
            'title' => 'Kategori Laporan',
            'breadcrumb' => 'Kategori Laporan'
        ];

        return view('layouts.kategori.katlaporan.index')->withPage($page);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function datatables()
    {
        $param = [
            'url' => 'kategori-laporan',
            'action' => ['show', 'edit', 'destroy']
        ];

        return Datatables::of(Katlaporan::query())
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
            'title' => 'Tambah Kategori laporan',
            'breadcrumb' => 'Tambah'
        ];

        return view('layouts.kategori.katlaporan.create')->withPage($page);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KatlaporanRequest $request)
   {
        $katlaporan = new Katlaporan;
        $katlaporan->name = $request->input('name');
        $katlaporan->slug = str_slug($katlaporan->name);
        $katlaporan->save();

        return redirect()->route('kategori-laporan.index')->with('success', 'Data telah tersimpan');
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
            'title' => 'Detail Kategori laporan',
            'breadcrumb' => 'Detail'
        ];
        $model = new Katlaporan;
        $katlaporan = $model->getDataBySlug($slug);

        return view('layouts.kategori.katlaporan.show', compact('katlaporan'))->withPage($page);
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
            'title' => 'Edit Kategori laporan',
            'breadcrumb' => 'Edit'
        ];
        $model = new Katlaporan;
        $katlaporan = $model->getDataBySlug($slug);

        return view('layouts.kategori.katlaporan.edit', compact('katlaporan'))->withPage($page);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(KatlaporanRequest $request, $slug)
    {
        $model = new Katlaporan;
        $data = $request->except('id');
        $katlaporan = $model->getDataBySlug($slug);
        $katlaporan->update($data);

        return redirect()->route('kategori-laporan.index')->with('success', 'Data telah diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $model = new Katlaporan;
        $katlaporan = $model->getDataBySlug($slug);

        if ($katlaporan) {
            $katlaporan->delete();
            $message = 'Data telah dihapus';
        } else {
            $message = 'Data tidak ditemukan';
        }

        return redirect()->route('kategori-laporan.index')->with('success', $message);
    }
}
