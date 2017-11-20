<?php

namespace App\Http\Controllers\Admin\Kategori;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Kategori\KatfileRequest;

use App\Models\Kategori\Katfile;
use Yajra\Datatables\Datatables;

class KatFileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page = [
            'title' => 'Kategori File',
            'breadcrumb' => 'Kategori File'
        ];

        return view('layouts.kategori.katfile.index')->withPage($page);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function datatables()
    {
        $param = [
            'url' => 'kategori-file',
            'action' => ['show', 'edit', 'destroy']
        ];

        return Datatables::of(Katfile::query())
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
            'title' => 'Tambah Kategori file',
            'breadcrumb' => 'Tambah'
        ];

        return view('layouts.kategori.katfile.create')->withPage($page);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KatfileRequest $request)
   {
        $katfile = new Katfile;
        $katfile->name = $request->input('name');
        $katfile->slug = str_slug($katfile->name);
        $katfile->save();

        return redirect()->route('kategori-file.index')->with('success', 'Data telah tersimpan');
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
            'title' => 'Detail Kategori file',
            'breadcrumb' => 'Detail'
        ];
        $model = new Katfile;
        $katfile = $model->getDataBySlug($slug);

        return view('layouts.kategori.katfile.show', compact('katfile'))->withPage($page);
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
            'title' => 'Edit Kategori file',
            'breadcrumb' => 'Edit'
        ];
        $model = new Katfile;
        $katfile = $model->getDataBySlug($slug);

        return view('layouts.kategori.katfile.edit', compact('katfile'))->withPage($page);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(KatfileRequest $request, $slug)
    {
        $model = new Katfile;
        $data = $request->except('id');
        $katfile = $model->getDataBySlug($slug);
        $katfile->update($data);

        return redirect()->route('kategori-file.index')->with('success', 'Data telah diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $model = new Katfile;
        $katfile = $model->getDataBySlug($slug);

        if ($katfile) {
            $katfile->delete();
            $message = 'Data telah dihapus';
        } else {
            $message = 'Data tidak ditemukan';
        }

        return redirect()->route('kategori-file.index')->with('success', $message);
    }
}
