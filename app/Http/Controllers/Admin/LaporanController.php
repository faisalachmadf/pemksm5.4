<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\LaporanRequest;

use App\Models\Laporan;
use App\Models\Kategori\Katlaporan;
use Datatables;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page = [
            'title' => 'Laporan Biro',
            'breadcrumb' => 'Laporan Biro'
        ];

        return view('layouts.laporan.index')->withPage($page);
    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function datatables()
    {
        $param = [
            'url' => 'laporan',
            'action' => ['show', 'edit', 'destroy'],
            'file' => 'laporan.download'
        ];

        return Datatables::of(Laporan::with(['katlaporan', 'user']))
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
            'title' => 'Tambah Laporan Biro',
            'breadcrumb' => 'Tambah'
        ];
        $view = [
            'katlaporan' => Katlaporan::all()
        ];

        return view('layouts.laporan.create', $view)->withPage($page);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LaporanRequest $request)
    {
        $laporan = new Laporan;
        $laporan->id_katlaporan = $request->input('id_katlaporan');
        $laporan->judul = $request->input('judul');
        $laporan->isi = $request->input('isi');
        $laporan->tanggal = dateFormatGeneral($request->input('tanggal'));
        $laporan->slug = str_slug($laporan->judul);
        $file = $request->file('file');
        $path = 'file/laporan';

        if (!$file->isValid()) {
            return redirect()->back()->withInput()->withErrors('file', 'File tidak valid');
        }

        $laporan->file = time().'-'.'.'.$file->getClientOriginalExtension();
        $laporan->save();
        $file->move($path, $laporan->file);

        return redirect()->route('laporan.index')->with('success', 'Data telah tersimpan');
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
            'title' => 'Detail Laporan Biro',
            'breadcrumb' => 'Detail'
        ];
        $model = new Laporan;
        $laporan = $model->getDataBySlug($slug);

        return view('layouts.laporan.show', compact('laporan'))->withPage($page);
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
            'title' => 'Edit Laporan Biro',
            'breadcrumb' => 'Edit'
        ];
        $model = new Laporan;
        $view = [
            'laporan' => $model->getDataBySlug($slug),
            'katlaporan' => Katlaporan::all()
        ];

        return view('layouts.laporan.edit', $view)->withPage($page);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(LaporanRequest $request, $slug)
    {
        $model = new Laporan;
        $data = $request->except('id', 'file');
        $laporan = $model->getDataBySlug($slug);
        $data['slug'] = str_slug($data['judul']);
        $data['tanggal'] = dateFormatGeneral($data['tanggal']);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $path = 'file/laporan';

            if (!$file->isValid()) {
                return redirect()->back()->withInput()->withErrors('file', 'File tidak valid');
            }

            $data['file'] = time().'-'.'.'.$file->getClientOriginalExtension();
            $file->move($path, $data['file']);

            // delete image & thumbnail
            deleteImageThumbnail($path, $laporan->file);
        }
        
        $laporan->update($data);

        return redirect()->route('laporan.index')->with('success', 'Data telah diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $model = new Laporan;
        $laporan = $model->getDataBySlug($slug);

        if ($laporan) {
            // delete image & thumbnail
            deleteImageThumbnail('file/laporan', $laporan->file);

            $laporan->delete();
            $message = 'Data telah dihapus';
        } else {
            $message = 'Data tidak ditemukan';
        }

        return redirect()->route('laporan.index')->with('success', $message);
    }

    /**
     * Download the specified file from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function download($slug)
    {
        $model = new Laporan;
        $laporan = $model->getDataBySlug($slug);
        $path = 'file/laporan';

        if ($laporan && \Storage::exists($path.'/'.$laporan->file)) {
            return response()->download($path.'/'.$laporan->file);
        }

        return response()->view('errors.404');
    }
}
