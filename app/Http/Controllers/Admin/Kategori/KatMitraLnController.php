<?php

namespace App\Http\Controllers\Admin\Kategori;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Kategori\KatMitraLnRequest;

use App\Models\Kategori\Katmitraln;
use Yajra\Datatables\Datatables;

class katmitraLnController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page = [
            'title' => 'Kategori mitra Luar Negeri',
            'breadcrumb' => 'Kategori mitra Luar Negeri'
        ];

        return view('layouts.kategori.katmitraln.index')->withPage($page);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function datatables()
    {
        $param = [
            'url' => 'katmitraln',
            'action' => ['show', 'edit', 'destroy']
        ];

        return Datatables::of(Katmitraln::query())
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
            'title' => 'Tambah Kategori mitra Luar Negeri',
            'breadcrumb' => 'Tambah'
        ];

        return view('layouts.kategori.katmitraln.create')->withPage($page);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KatmitralnRequest $request)
   {
        $katmitraln = new Katmitraln;
        $katmitraln->name = $request->input('name');
        $katmitraln->slug = str_slug($katmitraln->name);
        $katmitraln->save();

        return redirect()->route('katmitraln.index')->with('success', 'Data telah tersimpan');
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
            'title' => 'Detail Kategori mitra Luar Negeri',
            'breadcrumb' => 'Detail'
        ];
        $model = new Katmitraln;
        $katmitraln = $model->getDataBySlug($slug);

        return view('layouts.kategori.katmitraln.show', compact('katmitraln'))->withPage($page);
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
            'title' => 'Edit Kategori mitra Luar Negeri',
            'breadcrumb' => 'Edit'
        ];
        $model = new Katmitraln;
        $katmitraln = $model->getDataBySlug($slug);

        return view('layouts.kategori.katmitraln.edit', compact('katmitraln'))->withPage($page);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(KatmitralnRequest $request, $slug)
    {
        $model = new Katmitraln;
        $data = $request->except('id');
        $katmitraln = $model->getDataBySlug($slug);
        $katmitraln->update($data);

        return redirect()->route('katmitraln.index')->with('success', 'Data telah diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $model = new Katmitraln;
        $katmitraln = $model->getDataBySlug($slug);

        if ($katmitraln) {
            $katmitraln->delete();
            $message = 'Data telah dihapus';
        } else {
            $message = 'Data tidak ditemukan';
        }

        return redirect()->route('katmitraln.index')->with('success', $message);
    }
}
