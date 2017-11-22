<?php

namespace App\Http\Controllers\Admin\Kelembagaan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Kelembagaan\KelembagaanRequest;

use App\Models\Kelembagaan\Kelembagaan;
use App\Models\Kategori\Katbagian;
use Datatables;

class KelembagaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page = [
            'title' => 'Kelembagaan',
            'breadcrumb' => 'Kelembagaan'
        ];

        return view('layouts.kelembagaan.index')->withPage($page);
    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function datatables()
    {
        $param = [
            'url' => 'kelembagaan',
            'action' => ['show', 'edit', 'destroy'],
            'gambar' => 'kelembagaan'
        ];

        return Datatables::of(Kelembagaan::with(['katbagian', 'user']))
            ->addColumn('action', function($data) use ($param) {
                return generateAction($param, $data->judul);
            })
            ->editColumn('isi', function($data) {
                return str_limit($data->isi, 100);
             })   
            ->editColumn('gambar', function($data) use ($param) {
                return generateImagePath($param['gambar'], $data->gambar, $data->judul);
            })
            ->addColumn('user', function($data) {
                if ($data->user) {
                    return $data->user->username;
                }

                return '-';
            })
            ->rawColumns(['isi','gambar','action'])
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
            'title' => 'Tambah Kelembagaan',
            'breadcrumb' => 'Tambah'
        ];
        $view = [
            'katbagian' => Katbagian::all()
            
        ];

        return view('layouts.kelembagaan.create', $view)->withPage($page);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KelembagaanRequest $request)
    {
        $kelembagaan = new Kelembagaan;
        $kelembagaan->id_katbagian = $request->input('id_katbagian');
        $kelembagaan->judul = $request->input('judul');
        $kelembagaan->tanggal = dateFormatGeneral($request->input('tanggal'));
        $kelembagaan->isi = $request->input('isi');
        $gambar = $request->file('gambar');
        $path = 'image/kelembagaan';

        if (!$gambar->isValid()) {
            return redirect()->back()->withInput()->withErrors('gambar', 'Gambar tidak valid');
        }

        $kelembagaan->gambar = time().'-'.$kelembagaan->judul.'.'.$gambar->getClientOriginalExtension();
        $kelembagaan->save();
        $gambar->move($path, $kelembagaan->gambar);

        //create thumbnail
        //generateThumbnail($path, $kelembagaan->gambar);

        return redirect()->route('kelembagaan.index')->with('success', 'Data telah tersimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($judul)
    {
        $page = [
            'title' => 'Detail Kelembagaan',
            'breadcrumb' => 'Detail'
        ];
        $model = new Kelembagaan;
        $kelembagaan = $model->getDataByjudul($judul);

        return view('layouts.kelembagaan.show', compact('kelembagaan'))->withPage($page);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($judul)
    {
        $page = [
            'title' => 'Edit Kelembagaan',
            'breadcrumb' => 'Edit'
        ];
        $model = new Kelembagaan;
        $view = [
            'kelembagaan' => $model->getDataByjudul($judul),
            'katbagian' => Katbagian::all()
        ];

        return view('layouts.kelembagaan.edit', $view)->withPage($page);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(KelembagaanRequest $request, $judul)
     {
        $model = new Kelembagaan;
        $data = $request->except('id', 'gambar');
        $kelembagaan = $model->getDataByjudul($judul);
        $data['tanggal'] = dateFormatGeneral($data['tanggal']);

        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $path = 'image/kelembagaan';

            if (!$gambar->isValid()) {
                return redirect()->back()->withInput()->withErrors('gambar', 'Gambar tidak valid');
            }

            $data['gambar'] = time().'-'.$data['judul'].'.'.$gambar->getClientOriginalExtension();
            $gambar->move($path, $data['gambar']);

            // delete image & thumbnail
            deleteImageThumbnail($path, $kelembagaan->gambar);

            // create thumbnail
            //generateThumbnail($path, $data['gambar']);
        }
        
        $kelembagaan->update($data);

        return redirect()->route('kelembagaan.index')->with('success', 'Data telah diubah');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($judul)
    {
        $model = new Kelembagaan;
        $kelembagaan = $model->getDataByjudul($judul);

        if ($kelembagaan) {
            $image = 'image/kelembagaan/'.$kelembagaan->gambar;
            $thumbnail = 'image/kelembagaan/thumbnail/'.$kelembagaan->gambar;

            // delete image & thumbnail
            deleteImageThumbnail('image/kelembagaan', $kelembagaan->gambar);

            $kelembagaan->delete();
            $message = 'Data telah dihapus';
        } else {
            $message = 'Data tidak ditemukan';
        }

        return redirect()->route('kelembagaan.index')->with('success', $message);
    }
}
