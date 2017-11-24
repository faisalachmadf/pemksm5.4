<?php

namespace App\Http\Controllers\Admin\Lppd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Lppd\GaleriLppdRequest;

use App\Models\Lppd\GaleriLppd;
use App\Models\Tag;
use Datatables;

class GaleriLppdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page = [
            'title' => 'Galeri Lppd',
            'breadcrumb' => 'Galeri'
        ];

        return view('layouts.lppd.galeri.index')->withPage($page);
    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function datatables()
    {
        $param = [
            'url' => 'galeri-lppd',
            'action' => ['show', 'edit', 'destroy'],
            'gambar' => 'galeri-lppd'
        ];

        return Datatables::of(GaleriLppd::with(['tags', 'user']))
            ->addColumn('action', function($data) use ($param) {
                return generateAction($param, $data->slug);
            })
            ->editColumn('gambar', function($data) use ($param) {
                return generateImagePath($param['gambar'], $data->gambar, $data->judul);
            })
            ->addColumn('tag', function($data) {
                return generateTag($data->tags);
            })
            ->addColumn('user', function($data) {
                return generateUser($data->user);
            })
            ->rawColumns(['gambar', 'action'])
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
            'title' => 'Tambah Galeri Lppd',
            'breadcrumb' => 'Tambah'
        ];
        $view = [
            'tags' => Tag::pluck('name')
        ];

        return view('layouts.lppd.galeri.create', $view)->withPage($page);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GaleriLppdRequest $request)
    {
        $galeri = new GaleriLppd;
        $galeri->judul = $request->input('judul');
        $galeri->slug = str_slug($galeri->judul);
        $tags = $request->input('tags');
        $gambar = $request->file('gambar');
        $gambars = $request->file('gambars');
        $path = 'image/galeri-lppd';
        $time = time();

        if (!$gambar->isValid()) {
            return redirect()->back()->withInput()->withErrors('gambar', 'Gambar tidak valid');
        }

        // Validasi Multi Gambar
        foreach ($gambars as $image) {
            if (!$image->isValid()) {
                return redirect()->back()->withInput()->withErrors('gambars', 'Multi Gambar tidak valid');
            }
        }

        $galeri->gambar = $time.'-'.$galeri->slug.'.'.$gambar->getClientOriginalExtension();
        $galeri->save();
        $gambar->move($path, $galeri->gambar);

        //create thumbnail
        generateThumbnail($path, $galeri->gambar);

        // Save Tags
        $tagIds = Tag::getIdByName($tags);
        $galeri->tags()->sync($tagIds);

        // Save Multi Gambar
        foreach ($gambars as $image) {
            $multi = $time.'-'.$galeri->slug.'.'.$image->getClientOriginalExtension();
            $multiGambar = $galeri->gambars()->create(['gambar' => $multi]);
            $multiGambar->gambar = $multiGambar->id.'-'.$multiGambar->gambar;
            $multiGambar->save();
            $image->move($path, $multiGambar->gambar);

            //create thumbnail multiple
            generateThumbnail($path, $multiGambar->gambar);
        }
        
        return redirect()->route('galeri-lppd.index')->with('success', 'Data telah tersimpan');
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
            'title' => 'Detail Galeri Lppd',
            'breadcrumb' => 'Detail'
        ];
        $model = new GaleriLppd;
        $galeri = $model->getDataBySlug($slug);

        return view('layouts.lppd.galeri.show', compact('galeri'))->withPage($page);
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
            'title' => 'Edit Galeri Lppd',
            'breadcrumb' => 'Edit'
        ];
        $model = new GaleriLppd;
        $view = [
            'galeri' => $model->getDataBySlug($slug)
        ];

        return view('layouts.lppd.galeri.edit', $view)->withPage($page);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GaleriLppdRequest $request, $slug)
    {
        $model = new GaleriLppd;
        $data = $request->except('id', 'tags', 'gambar', 'gambars');
        $galeri = $model->getDataBySlug($slug);
        $data['slug'] = str_slug($data['judul']);
        $tags = $request->input('tags');
        $path = 'image/galeri-lppd';
        $time = time();

        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');

            if (!$gambar->isValid()) {
                return redirect()->back()->withInput()->withErrors('gambar', 'Gambar tidak valid');
            }
        }

        // Validasi Multi Gambar
        if ($request->hasFile('gambars')) {
            $gambars = $request->file('gambars');

            foreach ($gambars as $image) {
                if (!$image->isValid()) {
                    return redirect()->back()->withInput()->withErrors('gambars', 'Multi Gambar tidak valid');
                }
            }
        }

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $time.'-'.$data['slug'].'.'.$gambar->getClientOriginalExtension();
            $gambar->move($path, $data['gambar']);

            // delete image & thumbnail
            deleteImageThumbnail($path, $galeri->gambar);

            // create thumbnail
            generateThumbnail($path, $data['gambar']);
        }

        if ($request->hasFile('gambars')) {
            // delete image & thumbnail multiple
            foreach ($galeri->gambars as $value) {
                deleteImageThumbnail($path, $value->gambar);
            }

            $galeri->gambars()->delete();

            foreach ($gambars as $image) {
                $multi = $time.'-'.$data['slug'].'.'.$image->getClientOriginalExtension();
                $multiGambar = $galeri->gambars()->create(['gambar' => $multi]);
                $multiGambar->gambar = $multiGambar->id.'-'.$multiGambar->gambar;
                $multiGambar->save();
                $image->move($path, $multiGambar->gambar);

                //create thumbnail multiple
                generateThumbnail($path, $multiGambar->gambar);
            }
        }

        $tagIds = Tag::getIdByName($tags);
        $galeri->tags()->sync($tagIds);
        $galeri->update($data);

        return redirect()->route('galeri-lppd.index')->with('success', 'Data telah diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $model = new GaleriLppd;
        $galeri = $model->getDataBySlug($slug);
        $path = 'image/galeri-lppd';

        if ($galeri) {
            // delete image & thumbnail
            deleteImageThumbnail($path, $galeri->gambar);

            // delete image & thumbnail multiple
            foreach ($galeri->gambars as $value) {
                deleteImageThumbnail($path, $value->gambar);
            }

            $galeri->delete();
            $message = 'Data telah dihapus';
        } else {
            $message = 'Data tidak ditemukan';
        }

        return redirect()->route('galeri-lppd.index')->with('success', $message);
    }
}
