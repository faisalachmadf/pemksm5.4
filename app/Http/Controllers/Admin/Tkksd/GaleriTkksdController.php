<?php

namespace App\Http\Controllers\Admin\Tkksd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Tkksd\GaleriTkksdRequest;

use App\Models\Tkksd\GaleriTkksd;
use App\Models\Tagtkksd;
use Datatables;

class GaleriTkksdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page = [
            'title' => 'Galeri TKKSD',
            'breadcrumb' => 'Galeri'
        ];

        return view('layouts.tkksd.galeri.index')->withPage($page);
    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function datatables()
    {
        $param = [
            'url' => 'galeri-tkksd',
            'action' => ['show', 'edit', 'destroy'],
            'gambar' => 'galeri-tkksd'
        ];

        return Datatables::of(GaleriTkksd::with(['tagtkksds', 'user']))
            ->addColumn('action', function($data) use ($param) {
                return generateAction($param, $data->slug);
            })
            ->editColumn('gambar', function($data) use ($param) {
                return generateImagePath($param['gambar'], $data->gambar, $data->judul);
            })
            ->addColumn('tag', function($data) {
                return generateTag($data->tagtkksds);
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
            'title' => 'Tambah Galeri Tkksd',
            'breadcrumb' => 'Tambah'
        ];
        $view = [
            'tagtkksds' => Tagtkksd::pluck('name')->toArray()
        ];

        return view('layouts.tkksd.galeri.create', $view)->withPage($page);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GaleriTkksdRequest $request)
    {
        $galeri = new GaleriTkksd;
        $galeri->judul = $request->input('judul');
        $galeri->slug = str_slug($galeri->judul);
        $tagtkksds = $request->input('tagtkksds');
        $gambar = $request->file('gambar');
        $gambars = $request->file('gambars');
        $path = 'image/galeri-tkksd';
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
        //generateThumbnail($path, $galeri->gambar);

        // Save tagtkksds
        $tagIds = Tagtkksd::getIdName($tagtkksds);
        $galeri->tagtkksds()->sync($tagIds);

        // Save Multi Gambar
        foreach ($gambars as $image) {
            $multi = $time.'-'.$galeri->slug.'.'.$image->getClientOriginalExtension();
            $multiGambar = $galeri->gambars()->create(['gambar' => $multi]);
            $multiGambar->gambar = $multiGambar->id.'-'.$multiGambar->gambar;
            $multiGambar->save();
            $image->move($path, $multiGambar->gambar);

            //create thumbnail multiple
            //generateThumbnail($path, $multiGambar->gambar);
        }
        
        return redirect()->route('galeri-tkksd.index')->with('success', 'Data telah tersimpan');
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
            'title' => 'Detail Galeri Tkksd',
            'breadcrumb' => 'Detail'
        ];
        $model = new GaleriTkksd;
        $galeri = $model->getDataBySlug($slug);

        return view('layouts.tkksd.galeri.show', compact('galeri'))->withPage($page);
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
            'title' => 'Edit Galeri Tkksd',
            'breadcrumb' => 'Edit'
        ];
        $model = new GaleriTkksd;
        $view = [
            'galeri' => $model->getDataBySlug($slug)
        ];

        return view('layouts.tkksd.galeri.edit', $view)->withPage($page);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GaleriTkksdRequest $request, $slug)
    {
        $model = new GaleriTkksd;
        $data = $request->except('id', 'tagtkksds', 'gambar', 'gambars');
        $galeri = $model->getDataBySlug($slug);
        $data['slug'] = str_slug($data['judul']);
        $tagtkksds = $request->input('tagtkksds');
        $path = 'image/galeri-tkksd';
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
            //generateThumbnail($path, $data['gambar']);
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
                //generateThumbnail($path, $multiGambar->gambar);
            }
        }

        $tagIds = Tag::getIdName($tagtkksds);
        $galeri->tagtkksds()->sync($tagIds);
        $galeri->update($data);

        return redirect()->route('galeri-tkksd.index')->with('success', 'Data telah diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $model = new GaleriTkksd;
        $galeri = $model->getDataBySlug($slug);
        $path = 'image/galeri-tkksd';

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

        return redirect()->route('galeri-tkksd.index')->with('success', $message);
    }
}
