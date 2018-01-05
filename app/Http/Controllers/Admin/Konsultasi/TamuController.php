<?php

namespace App\Http\Controllers\Admin\Konsultasi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Konsultasi\TamuRequest;

use App\Models\Konsultasi\Tamu;
use Datatables;

class TamuController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page = [
            'title' => 'Konsultasi - Buku Tamu',
            'breadcrumb' => 'Konsultasi - Buku Tamu'
        ];

        return view('layouts.konsultasi.tamu.index')->withPage($page);
    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function datatables()
    {
        $param = [
            'url' => 'tamu',
            'action' => ['show', 'edit', 'destroy'],
            'gambar' => 'tamu'
        ];

        return Datatables::of(Tamu::query())
            ->addColumn('action', function($data) use ($param) {
                return generateAction($param, $data->slug);
            })
            ->editColumn('created_at', function($data) {
                return date('d F Y', strtotime($data->created_at));
            })
           
            ->rawColumns(['created_at', 'action'])
            ->addIndexColumn()
         
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page = [
            'title' => 'Tambah Buku Tamu',
            'breadcrumb' => 'Tambah'
        ];

        return view('layouts.konsultasi.tamu.create')->withPage($page);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TamuRequest $request)
    {
        $tamu = new Tamu;
        $tamu->nama = $request->input('nama');
        $tamu->dari = $request->input('dari');
        $tamu->email = $request->input('email');
        $tamu->isi = $request->input('isi');
        $tamu->slug = str_slug($tamu->nama);
        $tamu->save();
        

        return redirect()->route('tamu.index')->with('success', 'Data telah tersimpan');
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
            'title' => 'Detail Tamu',
            'breadcrumb' => 'Detail'
        ];
        $model = new Tamu;
        $tamu = $model->getDataBySlug($slug);

        return view('layouts.konsultasi.tamu.show', compact('tamu'))->withPage($page);
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
            'title' => 'Edit Tamu',
            'breadcrumb' => 'Edit'
        ];
        $model = new Tamu;
        $tamu = $model->getDataBySlug($slug);

        return view('layouts.konsultasi.tamu.edit', compact('tamu'))->withPage($page);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TamuRequest $request, $slug)
    {
        $model = new Tamu;
        $data = $request->except('id');
        $tamu = $model->getDataBySlug($slug);
        $data['slug'] = str_slug($data['nama']);

        
        $tamu->update($data);

        return redirect()->route('tamu.index')->with('success', 'Data telah diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $model = new Tamu;
        $tamu = $model->getDataBySlug($slug);

          if ($tamu) {
        
            $tamu->delete();
            $message = 'Data telah dihapus';
        } else {
            $message = 'Data tidak ditemukan';
        }


        return redirect()->route('tamu.index')->with('success', $message);
    }


}
