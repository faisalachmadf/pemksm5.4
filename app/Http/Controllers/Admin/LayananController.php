<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\LayananRequest;

use App\Models\Layanan;
use App\Models\Kategori\Katbagian;
use Datatables;

class LayananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page = [
            'title' => 'Layanan Publik',
            'breadcrumb' => 'Layanan Publik'
        ];

        return view('layouts.layanan.index')->withPage($page);
    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function datatables()
    {
        $param = [
            'url' => 'layanan',
            'action' => ['show', 'edit', 'destroy'],
            'file' => 'layanan.download'
        ];

        return Datatables::of(Layanan::with(['katbagian', 'user']))
            ->addColumn('action', function($data) use ($param) {
                return generateAction($param, $data->slug);
            })
            ->editColumn('file', function($data) use ($param) {
                return generateFileDownload(route($param['file'], $data->slug), $data->file, $data->nama);
            })
            ->editColumn('isi', function($data) {
                return str_limit($data->isi, 100);
            })
            ->addColumn('user', function($data) {
                return generateUser($data->user);
            })
            ->rawColumns(['isi', 'file', 'action'])
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
            'title' => 'Tambah Layanan Publik',
            'breadcrumb' => 'Tambah'
        ];
        $view = [
            'katbagian' => Katbagian::all()
        ];

        return view('layouts.layanan.create', $view)->withPage($page);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LayananRequest $request)
    {
        $layanan = new Layanan;
        $layanan->id_katbagian = $request->input('id_katbagian');
        $layanan->judul = $request->input('judul');
        $layanan->isi = $request->input('isi');
        $layanan->tanggal = dateFormatGeneral($request->input('tanggal'));
        $layanan->slug = str_slug($layanan->judul);
        $file = $request->file('file');
        $path = 'file/layanan';

        if (!$file->isValid()) {
            return redirect()->back()->withInput()->withErrors('file', 'File tidak valid');
        }

        $layanan->file = time().'-'.$layanan->slug.'.'.$file->getClientOriginalExtension();
        $layanan->save();
        $file->move($path, $layanan->file);

        return redirect()->route('layanan.index')->with('success', 'Data telah tersimpan');
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
            'title' => 'Detail Layanan Publik',
            'breadcrumb' => 'Detail'
        ];
        $model = new Layanan;
        $layanan = $model->getDataBySlug($slug);

        return view('layouts.layanan.show', compact('layanan'))->withPage($page);
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
            'title' => 'Edit Layanan Publik',
            'breadcrumb' => 'Edit'
        ];
        $model = new layanan;
        $view = [
            'layanan' => $model->getDataBySlug($slug),
            'katbagian' => Katbagian::all()
        ];

        return view('layouts.layanan.edit', $view)->withPage($page);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(LayananRequest $request, $slug)
    {
        $model = new Layanan;
        $data = $request->except('id', 'file');
        $layanan = $model->getDataBySlug($slug);
        $data['slug'] = str_slug($data['judul']);
        $data['tanggal'] = dateFormatGeneral($data['tanggal']);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $path = 'file/layanan';

            if (!$file->isValid()) {
                return redirect()->back()->withInput()->withErrors('file', 'File tidak valid');
            }

            $data['file'] = time().'-'.$data['slug'].'.'.$file->getClientOriginalExtension();
            $file->move($path, $data['file']);

            // delete image & thumbnail
            deleteImageThumbnail($path, $layanan->file);
        }
        
        $layanan->update($data);

        return redirect()->route('layanan.index')->with('success', 'Data telah diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $model = new layanan;
        $layanan = $model->getDataBySlug($slug);

        if ($layanan) {
            // delete image & thumbnail
            deleteImageThumbnail('file/layanan', $layanan->file);

            $layanan->delete();
            $message = 'Data telah dihapus';
        } else {
            $message = 'Data tidak ditemukan';
        }

        return redirect()->route('layanan.index')->with('success', $message);
    }

    /**
     * Download the specified file from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function download($slug)
    {
        $model = new layanan;
        $layanan = $model->getDataBySlug($slug);
        $path = 'file/layanan';

        if ($layanan && \Storage::exists($path.'/'.$layanan->file)) {
            return response()->download($path.'/'.$layanan->file);
        }

        return response()->view('errors.404');
    }
}
