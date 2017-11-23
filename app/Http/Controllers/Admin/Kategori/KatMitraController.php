<?php

namespace App\Http\Controllers\Admin\Kategori;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Kategori\KatMitraRequest;

use App\Models\Kategori\Katmitra;
use Yajra\Datatables\Datatables;

class KatMitraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page = [
            'title' => 'Kategori mitra',
            'breadcrumb' => 'Kategori mitra'
        ];

        return view('layouts.kategori.katmitra.index')->withPage($page);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function datatables()
    {
        $param = [
            'url' => 'katmitra',
            'action' => ['show', 'edit', 'destroy']
        ];

        return Datatables::of(Katmitra::query())
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
            'title' => 'Tambah Kategori mitra',
            'breadcrumb' => 'Tambah'
        ];

        return view('layouts.kategori.katmitra.create')->withPage($page);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KatmitraRequest $request)
   {
        $katmitra = new Katmitra;
        $katmitra->name = $request->input('name');
        $katmitra->slug = str_slug($katmitra->name);
        $katmitra->save();

        return redirect()->route('katmitra.index')->with('success', 'Data telah tersimpan');
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
            'title' => 'Detail Kategori mitra',
            'breadcrumb' => 'Detail'
        ];
        $model = new Katmitra;
        $katmitra = $model->getDataBySlug($slug);

        return view('layouts.kategori.katmitra.show', compact('katmitra'))->withPage($page);
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
            'title' => 'Edit Kategori mitra',
            'breadcrumb' => 'Edit'
        ];
        $model = new Katmitra;
        $katmitra = $model->getDataBySlug($slug);

        return view('layouts.kategori.katmitra.edit', compact('katmitra'))->withPage($page);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(KatmitraRequest $request, $slug)
    {
        $model = new Katmitra;
        $data = $request->except('id');
        $katmitra = $model->getDataBySlug($slug);
        $katmitra->update($data);

        return redirect()->route('katmitra.index')->with('success', 'Data telah diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $model = new Katmitra;
        $katmitra = $model->getDataBySlug($slug);

        if ($katmitra) {
            $katmitra->delete();
            $message = 'Data telah dihapus';
        } else {
            $message = 'Data tidak ditemukan';
        }

        return redirect()->route('katmitra.index')->with('success', $message);
    }
}
