<?php

namespace App\Http\Controllers\Admin\Tkksd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Tkksd\TkksdRequest;

use App\Models\Tkksd\Tkksd;
use Datatables;

class TkksdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page = [
            'title' => 'Berita dan File TKKSD',
            'breadcrumb' => 'Berita dan File TKKSD'
        ];

        return view('layouts.tkksd.index')->withPage($page);
    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function datatables()
    {
        $param = [
            'url' => 'tkksd',
            'action' => ['show', 'edit', 'destroy'],
            'file' => 'tkksd.download'
        ];

        return Datatables::of(Tkksd::with(['user']))
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
            'title' => 'Tambah Berita dan File TKKSD',
            'breadcrumb' => 'Tambah'
        ];

        return view('layouts.tkksd.create')->withPage($page);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TkksdRequest $request)
    {
        $tkksd = new Tkksd;
        $tkksd->judul = $request->input('judul');
        $tkksd->isi = $request->input('isi');
        $tkksd->tanggal = dateFormatGeneral($request->input('tanggal'));
        $tkksd->slug = str_slug($tkksd->judul);
        $file = $request->file('file');
        $path = 'file/tkksd';

        if (!$file->isValid()) {
            return redirect()->back()->withInput()->withErrors('file', 'File tidak valid');
        }

        $tkksd->file = time().'-'.$tkksd->slug.'.'.$file->getClientOriginalExtension();
        $tkksd->save();
        $file->move($path, $tkksd->file);

        return redirect()->route('tkksd.index')->with('success', 'Data telah tersimpan');
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
            'title' => 'Detail Berita dan File TKKSD',
            'breadcrumb' => 'Detail'
        ];
        $model = new Tkksd;
        $tkksd = $model->getDataBySlug($slug);

        return view('layouts.tkksd.show', compact('tkksd'))->withPage($page);
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
            'title' => 'Edit Berita dan File TKKSD',
            'breadcrumb' => 'Edit'
        ];
        $model = new Tkksd;
        $view = [
            'tkksd' => $model->getDataBySlug($slug),
        ];

        return view('layouts.tkksd.edit', $view)->withPage($page);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TkksdRequest $request, $slug)
    {
        $model = new Tkksd;
        $data = $request->except('id', 'file');
        $tkksd = $model->getDataBySlug($slug);
        $data['slug'] = str_slug($data['judul']);
        $data['tanggal'] = dateFormatGeneral($data['tanggal']);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $path = 'file/tkksd';

            if (!$file->isValid()) {
                return redirect()->back()->withInput()->withErrors('file', 'File tidak valid');
            }

            $data['file'] = time().'-'.$data['slug'].'.'.$file->getClientOriginalExtension();
            $file->move($path, $data['file']);

            // delete image & thumbnail
            deleteImageThumbnail($path, $tkksd->file);
        }
        
        $tkksd->update($data);

        return redirect()->route('tkksd.index')->with('success', 'Data telah diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $model = new Tkksd;
        $tkksd = $model->getDataBySlug($slug);

        if ($tkksd) {
            // delete image & thumbnail
            deleteImageThumbnail('file/tkksd', $tkksd->file);

            $tkksd->delete();
            $message = 'Data telah dihapus';
        } else {
            $message = 'Data tidak ditemukan';
        }

        return redirect()->route('tkksd.index')->with('success', $message);
    }

    /**
     * Download the specified file from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function download($slug)
    {
        $model = new Tkksd;
        $tkksd = $model->getDataBySlug($slug);
        $path = 'file/tkksd';

        if ($tkksd && \Storage::exists($path.'/'.$tkksd->file)) {
            return response()->download($path.'/'.$tkksd->file);
        }

        return response()->view('errors.404');
    }
}
