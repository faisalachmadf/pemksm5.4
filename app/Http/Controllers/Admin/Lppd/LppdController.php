<?php

namespace App\Http\Controllers\Admin\Lppd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Lppd\LppdRequest;

use App\Models\Lppd\Lppd;
use Datatables;

class LppdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page = [
            'title' => 'Berita dan File LPPD',
            'breadcrumb' => 'Berita dan File LPPD'
        ];

        return view('layouts.lppd.index')->withPage($page);
    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function datatables()
    {
        $param = [
            'url' => 'lppd',
            'action' => ['show', 'edit', 'destroy'],
            'file' => 'lppd.download'
        ];

        return Datatables::of(Lppd::with(['user']))
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
            'title' => 'Tambah Berita dan File LPPD',
            'breadcrumb' => 'Tambah'
        ];

        return view('layouts.lppd.create')->withPage($page);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LppdRequest $request)
    {
        $lppd = new Lppd;
        $lppd->judul = $request->input('judul');
        $lppd->isi = $request->input('isi');
        $lppd->tanggal = dateFormatGeneral($request->input('tanggal'));
        $lppd->slug = str_slug($lppd->judul);
        $file = $request->file('file');
        $path = 'file/lppd';

        if (!$file->isValid()) {
            return redirect()->back()->withInput()->withErrors('file', 'File tidak valid');
        }

        $lppd->file = time().'-'.$lppd->slug.'.'.$file->getClientOriginalExtension();
        $lppd->save();
        $file->move($path, $lppd->file);

        return redirect()->route('lppd.index')->with('success', 'Data telah tersimpan');
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
            'title' => 'Detail Berita dan File LPPD',
            'breadcrumb' => 'Detail'
        ];
        $model = new Lppd;
        $lppd = $model->getDataBySlug($slug);

        return view('layouts.lppd.show', compact('lppd'))->withPage($page);
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
            'title' => 'Edit Berita dan File LPPD',
            'breadcrumb' => 'Edit'
        ];
        $model = new Lppd;
        $view = [
            'lppd' => $model->getDataBySlug($slug),
        ];

        return view('layouts.lppd.edit', $view)->withPage($page);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(lppdRequest $request, $slug)
    {
        $model = new Lppd;
        $data = $request->except('id', 'file');
        $lppd = $model->getDataBySlug($slug);
        $data['slug'] = str_slug($data['judul']);
        $data['tanggal'] = dateFormatGeneral($data['tanggal']);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $path = 'file/lppd';

            if (!$file->isValid()) {
                return redirect()->back()->withInput()->withErrors('file', 'File tidak valid');
            }

            $data['file'] = time().'-'.$data['slug'].'.'.$file->getClientOriginalExtension();
            $file->move($path, $data['file']);

            // delete image & thumbnail
            deleteImageThumbnail($path, $lppd->file);
        }
        
        $lppd->update($data);

        return redirect()->route('lppd.index')->with('success', 'Data telah diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $model = new Lppd;
        $lppd = $model->getDataBySlug($slug);

        if ($lppd) {
            // delete image & thumbnail
            deleteImageThumbnail('file/lppd', $lppd->file);

            $lppd->delete();
            $message = 'Data telah dihapus';
        } else {
            $message = 'Data tidak ditemukan';
        }

        return redirect()->route('lppd.index')->with('success', $message);
    }

    /**
     * Download the specified file from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function download($slug)
    {
        $model = new Lppd;
        $lppd = $model->getDataBySlug($slug);
        $path = 'file/lppd';

        if ($lppd && \Storage::exists($path.'/'.$lppd->file)) {
            return response()->download($path.'/'.$lppd->file);
        }

        return response()->view('errors.404');
    }
}
