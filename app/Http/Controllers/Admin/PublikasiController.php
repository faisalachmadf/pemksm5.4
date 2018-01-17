<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PublikasiRequest;

use App\Models\Publikasi;
use App\Models\Kategori\Katfile;
use Datatables;

class PublikasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page = [
            'title' => 'File Publikasi',
            'breadcrumb' => 'File Publikasi'
        ];

        return view('layouts.publikasi.index')->withPage($page);
    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function datatables()
    {
        $param = [
            'url' => 'publikasi',
            'action' => ['show', 'edit', 'destroy'],
            'file' => 'publikasi.download'
        ];

        return Datatables::of(Publikasi::with(['katfile', 'user']))
            ->addColumn('action', function($data) use ($param) {
                return generateAction($param, $data->slug);
            })
            ->editColumn('file', function($data) use ($param) {
                return generateFileDownload(route($param['file'], $data->slug), $data->file, $data->nama);
            })
            ->editColumn('tanggal', function($data) {
                return date('d F Y', strtotime($data->tanggal));
            })
            ->addColumn('user', function($data) {
                if ($data->user) {
                    return $data->user->username;
                }

                return '-';
            })
            ->rawColumns(['tanggal', 'file', 'action'])
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
            'title' => 'Tambah File publikasi ',
            'breadcrumb' => 'Tambah'
        ];
        $view = [
            'katfile' => Katfile::all()
        ];

        return view('layouts.publikasi.create', $view)->withPage($page);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PublikasiRequest $request)
    {
        $publikasi = new Publikasi;
        $publikasi->id_katfile = $request->input('id_katfile');
        $publikasi->judul = $request->input('judul');
        $publikasi->tanggal = dateFormatGeneral($request->input('tanggal'));
        $publikasi->slug = str_slug($publikasi->judul);
        $file = $request->file('file');
        $path = 'file/publikasi';

        if (!$file->isValid()) {
            return redirect()->back()->withInput()->withErrors('file', 'File tidak valid');
        }

        $publikasi->file = time().'-'.'.'.$file->getClientOriginalExtension();
        $publikasi->save();
        $file->move($path, $publikasi->file);

        return redirect()->route('publikasi.index')->with('success', 'Data telah tersimpan');
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
            'title' => 'Detail File publikasi ',
            'breadcrumb' => 'Detail'
        ];
        $model = new Publikasi;
        $publikasi = $model->getDataBySlug($slug);

        return view('layouts.publikasi.show', compact('publikasi'))->withPage($page);
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
            'title' => 'Edit File publikasi ',
            'breadcrumb' => 'Edit'
        ];
        $model = new Publikasi;
        $view = [
            'publikasi' => $model->getDataBySlug($slug),
            'katfile' => Katfile::all()
        ];

        return view('layouts.publikasi.edit', $view)->withPage($page);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PublikasiRequest $request, $slug)
    {
        $model = new Publikasi;
        $data = $request->except('id', 'file');
        $publikasi = $model->getDataBySlug($slug);
        $data['slug'] = str_slug($data['judul']);
        $data['tanggal'] = dateFormatGeneral($data['tanggal']);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $path = 'file/publikasi';

            if (!$file->isValid()) {
                return redirect()->back()->withInput()->withErrors('file', 'File tidak valid');
            }

            $data['file'] = time().'-'.'.'.$file->getClientOriginalExtension();
            $file->move($path, $data['file']);

            // delete image & thumbnail
            deleteImageThumbnail($path, $publikasi->file);
        }
        
        $publikasi->update($data);

        return redirect()->route('publikasi.index')->with('success', 'Data telah diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $model = new Publikasi;
        $publikasi = $model->getDataBySlug($slug);

        if ($publikasi) {
            // delete image & thumbnail
            deleteImageThumbnail('file/publikasi', $publikasi->file);

            $publikasi->delete();
            $message = 'Data telah dihapus';
        } else {
            $message = 'Data tidak ditemukan';
        }

        return redirect()->route('publikasi.index')->with('success', $message);
    }

    /**
     * Download the specified file from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function download($slug)
    {
        $model = new Publikasi;
        $publikasi = $model->getDataBySlug($slug);
        $path = 'file/publikasi';

        if ($publikasi && \Storage::exists($path.'/'.$publikasi->file)) {
            return response()->download($path.'/'.$publikasi->file);
        }

        return response()->view('errors.404');
    }
}
