<?php

namespace App\Http\Controllers\Admin\Kategori;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Kategori\KatbagRequest;

use App\Models\Kategori\Katbagian;
use Yajra\Datatables\Datatables;

class KatBagianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page = [
            'title' => 'Kategori Bagian',
            'breadcrumb' => 'Kategori Bagian'
        ];

        return view('layouts.kategori.katbag.index')->withPage($page);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function datatables()
    {
        $param = [
            'url' => 'kategori-bagian',
            'action' => ['show', 'edit', 'destroy']
        ];

        return Datatables::of(Katbagian::query())
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
            'title' => 'Tambah Kategori Bagian',
            'breadcrumb' => 'Tambah'
        ];

        return view('layouts.kategori.katbag.create')->withPage($page);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KatbagRequest $request)
   {
        $katbagian = new Katbagian;
        $katbagian->name = $request->input('name');
        $katbagian->slug = str_slug($katbagian->name);
        $katbagian->save();

        return redirect()->route('kategori-bagian.index')->with('success', 'Data telah tersimpan');
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
            'title' => 'Detail Kategori Bagian',
            'breadcrumb' => 'Detail'
        ];
        $model = new Katbagian;
        $katbagian = $model->getDataBySlug($slug);

        return view('layouts.kategori.katbag.show', compact('katbagian'))->withPage($page);
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
            'title' => 'Edit Kategori Bagian',
            'breadcrumb' => 'Edit'
        ];
        $model = new Katbagian;
        $katbagian = $model->getDataBySlug($slug);

        return view('layouts.kategori.katbag.edit', compact('katbagian'))->withPage($page);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(KatbagRequest $request, $slug)
    {
        $model = new Katbagian;
        $data = $request->except('id');
        $katbagian = $model->getDataBySlug($slug);
        $katbagian->update($data);

        return redirect()->route('kategori-bagian.index')->with('success', 'Data telah diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $model = new Katbagian;
        $katbagian = $model->getDataBySlug($slug);

        if ($katbagian) {
            $katbagian->delete();
            $message = 'Data telah dihapus';
        } else {
            $message = 'Data tidak ditemukan';
        }

        return redirect()->route('kategori-bagian.index')->with('success', $message);
    }
}
