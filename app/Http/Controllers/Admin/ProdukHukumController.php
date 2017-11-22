<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProdukHukumRequest;

use App\Models\ProdukHukum;
use App\Models\Kategori\Kathukum;
use Datatables;

class ProdukHukumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page = [
            'title' => 'Produk Hukum',
            'breadcrumb' => 'Produk Hukum'
        ];

        return view('layouts.produk-hukum.index')->withPage($page);
    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function datatables()
    {
        $param = [
            'url' => 'produk-hukum',
            'action' => ['show', 'edit', 'destroy'],
            'file' => 'produk-hukum.download'
        ];

        return Datatables::of(ProdukHukum::with(['kathukum', 'user']))
            ->addColumn('action', function($data) use ($param) {
                return generateAction($param, $data->slug);
            })
            ->editColumn('file', function($data) use ($param) {
                return generateFileDownload(route($param['file'], $data->slug), $data->file, $data->nama);
            })
            ->addColumn('user', function($data) {
                if ($data->user) {
                    return $data->user->username;
                }

                return '-';
            })
            ->rawColumns(['file', 'action'])
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
            'title' => 'Tambah Produk Hukum',
            'breadcrumb' => 'Tambah'
        ];
        $view = [
            'kathukum' => Kathukum::all()
        ];

        return view('layouts.produk-hukum.create', $view)->withPage($page);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProdukHukumRequest $request)
    {
        $produk = new ProdukHukum;
        $produk->id_kathukum = $request->input('id_kathukum');
        $produk->nama = $request->input('nama');
        $produk->slug = str_slug($produk->nama);
        $file = $request->file('file');
        $path = 'file/produk-hukum';

        if (!$file->isValid()) {
            return redirect()->back()->withInput()->withErrors('file', 'File tidak valid');
        }

        $produk->file = time().'-'.$produk->slug.'.'.$file->getClientOriginalExtension();
        $produk->save();
        $file->move($path, $produk->file);

        return redirect()->route('produk-hukum.index')->with('success', 'Data telah tersimpan');
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
            'title' => 'Detail Produk Hukum',
            'breadcrumb' => 'Detail'
        ];
        $model = new ProdukHukum;
        $produk = $model->getDataBySlug($slug);

        return view('layouts.produk-hukum.show', compact('produk'))->withPage($page);
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
            'title' => 'Edit Produk Hukum',
            'breadcrumb' => 'Edit'
        ];
        $model = new ProdukHukum;
        $view = [
            'produk' => $model->getDataBySlug($slug),
            'kathukum' => Kathukum::all()
        ];

        return view('layouts.produk-hukum.edit', $view)->withPage($page);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProdukHukumRequest $request, $slug)
    {
        $model = new ProdukHukum;
        $data = $request->except('id', 'file');
        $produk = $model->getDataBySlug($slug);
        $data['slug'] = str_slug($data['nama']);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $path = 'file/produk-hukum';

            if (!$file->isValid()) {
                return redirect()->back()->withInput()->withErrors('file', 'File tidak valid');
            }

            $data['file'] = time().'-'.$data['slug'].'.'.$file->getClientOriginalExtension();
            $file->move($path, $data['file']);

            // delete image & thumbnail
            deleteImageThumbnail($path, $produk->file);
        }
        
        $produk->update($data);

        return redirect()->route('produk-hukum.index')->with('success', 'Data telah diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $model = new ProdukHukum;
        $produk = $model->getDataBySlug($slug);

        if ($produk) {
            // delete image & thumbnail
            deleteImageThumbnail('file/produk-hukum', $produk->file);

            $produk->delete();
            $message = 'Data telah dihapus';
        } else {
            $message = 'Data tidak ditemukan';
        }

        return redirect()->route('produk-hukum.index')->with('success', $message);
    }

    /**
     * Download the specified file from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function download($slug)
    {
        $model = new ProdukHukum;
        $produk = $model->getDataBySlug($slug);
        $path = 'file/produk-hukum';

        if ($produk && \Storage::exists($path.'/'.$produk->file)) {
            return response()->download($path.'/'.$produk->file);
        }

        return response()->view('errors.404');
    }
}
