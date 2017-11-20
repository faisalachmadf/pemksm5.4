<?php

namespace App\Http\Controllers\Admin\Kategori;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Kategori\KathukumRequest;

use App\Models\Kategori\Kathukum;
use Yajra\Datatables\Datatables;

class KatHukumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page = [
            'title' => 'Kategori Hukum',
            'breadcrumb' => 'Kategori Hukum'
        ];

        return view('layouts.kategori.kathukum.index')->withPage($page);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function datatables()
    {
        $param = [
            'url' => 'kategori-hukum',
            'action' => ['show', 'edit', 'destroy']
        ];

        return Datatables::of(Kathukum::query())
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
            'title' => 'Tambah Kategori hukum',
            'breadcrumb' => 'Tambah'
        ];

        return view('layouts.kategori.kathukum.create')->withPage($page);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KathukumRequest $request)
   {
        $kathukum = new Kathukum;
        $kathukum->name = $request->input('name');
        $kathukum->slug = str_slug($kathukum->name);
        $kathukum->save();

        return redirect()->route('kategori-hukum.index')->with('success', 'Data telah tersimpan');
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
            'title' => 'Detail Kategori hukum',
            'breadcrumb' => 'Detail'
        ];
        $model = new Kathukum;
        $kathukum = $model->getDataBySlug($slug);

        return view('layouts.kategori.kathukum.show', compact('kathukum'))->withPage($page);
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
            'title' => 'Edit Kategori hukum',
            'breadcrumb' => 'Edit'
        ];
        $model = new Kathukum;
        $kathukum = $model->getDataBySlug($slug);

        return view('layouts.kategori.kathukum.edit', compact('kathukum'))->withPage($page);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(KathukumRequest $request, $slug)
    {
        $model = new Kathukum;
        $data = $request->except('id');
        $kathukum = $model->getDataBySlug($slug);
        $kathukum->update($data);

        return redirect()->route('kategori-hukum.index')->with('success', 'Data telah diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $model = new Kathukum;
        $kathukum = $model->getDataBySlug($slug);

        if ($kathukum) {
            $kathukum->delete();
            $message = 'Data telah dihapus';
        } else {
            $message = 'Data tidak ditemukan';
        }

        return redirect()->route('kategori-hukum.index')->with('success', $message);
    }
}
