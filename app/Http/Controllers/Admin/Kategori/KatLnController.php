<?php

namespace App\Http\Controllers\Admin\Kategori;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Kategori\KatlnRequest;

use App\Models\Kategori\Katln;
use Datatables;
use Storage;

class KatLnController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page = [
            'title' => 'Kategori Kerja Sama Luar Negeri',
            'breadcrumb' => 'Kategori Kerja Sama Luar Negeri'
        ];

        return view('layouts.kategori.katln.index')->withPage($page);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function datatables()
    {
        $param = [
            'url' => 'kategori-ln',
            'action' => ['show', 'edit', 'destroy']
        ];

        return Datatables::of(Katln::query())
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

        return view('layouts.kategori.katln.create')->withPage($page);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KatlnRequest $request)
   {
        $katln = new Katln;
        $katln->name = $request->input('name');
        $katln->slug = str_slug($katln->name);
        $katln->save();

        return redirect()->route('kategori-ln.index')->with('success', 'Data telah tersimpan');
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
            'title' => 'Detail Kategori Kerja Sama Luar Negeri',
            'breadcrumb' => 'Detail'
        ];
        $model = new Katln;
        $katln = $model->getDataBySlug($slug);

        return view('layouts.kategori.katln.show', compact('katln'))->withPage($page);
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
        $model = new Katln;
        $katln = $model->getDataBySlug($slug);

        return view('layouts.kategori.katln.edit', compact('katln'))->withPage($page);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(KatlnRequest $request, $slug)
    {
        $model = new Katln;
        $data = $request->except('id');
        $katln = $model->getDataBySlug($slug);
        $katln->update($data);

        return redirect()->route('kategori-ln.index')->with('success', 'Data telah diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $model = new Katln;
        $katln = $model->getDataBySlug($slug);

        if ($katln) {
            $katln->delete();
            $message = 'Data telah dihapus';
        } else {
            $message = 'Data tidak ditemukan';
        }

        return redirect()->route('kategori-ln.index')->with('success', $message);
    }
}
