<?php

namespace App\Http\Controllers\Admin\Profil;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Profil\StrukturOrganisasiRequest;

use App\Models\Profil\Pegawai;
use App\Models\Kategori\Katbagian;
use App\Models\Kategori\Katjabatan;
use App\Models\Kategori\Katgolongan;
use Datatables;

class StrukturOrganisasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page = [
            'title' => 'Struktur Organisasi',
            'breadcrumb' => 'Struktur Organisasi'
        ];

        return view('layouts.profil.struktur-organisasi.index')->withPage($page);
    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function datatables()
    {
        $param = [
            'url' => 'struktur-organisasi',
            'action' => ['show', 'edit', 'destroy'],
            'gambar' => 'pegawai'
        ];

        return Datatables::of(Pegawai::with(['katbagian', 'katjabatan']))
            ->addColumn('action', function($data) use ($param) {
                return generateAction($param, $data->nip);
            })
            ->editColumn('gambar', function($data) use ($param) {
                return generateImagePath($param['gambar'], $data->gambar, $data->nama);
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
            'title' => 'Tambah Struktur Organisasi',
            'breadcrumb' => 'Tambah'
        ];
        $view = [
            'katbagian' => Katbagian::all(),
            'katjabatan' => Katjabatan::all(),
            'katgolongan' => Katgolongan::all()
        ];

        return view('layouts.profil.struktur-organisasi.create', $view)->withPage($page);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StrukturOrganisasiRequest $request)
    {
        $pegawai = new Pegawai;
        $pegawai->id_katbagian = $request->input('id_katbagian');
        $pegawai->id_katjabatan = $request->input('id_katjabatan');
        $pegawai->id_katgolongan = $request->input('id_katgolongan');
        $pegawai->nip = $request->input('nip');
        $pegawai->nama = $request->input('nama');
        $pegawai->jabatan = $request->input('jabatan');
        $pegawai->mulaijabat = dateFormatGeneral($request->input('mulaijabat'));
        $pegawai->pendidikan = $request->input('pendidikan');
        $pegawai->riwayatkerja = $request->input('riwayatkerja');
        $gambar = $request->file('gambar');
        $path = 'image/pegawai';

        if (!$gambar->isValid()) {
            return redirect()->back()->withInput()->withErrors('gambar', 'Gambar tidak valid');
        }

        $pegawai->gambar = time().'-'.$pegawai->nip.'.'.$gambar->getClientOriginalExtension();
        $pegawai->save();
        $gambar->move($path, $pegawai->gambar);

        //create thumbnail
        generateThumbnail($path, $pegawai->gambar);

        return redirect()->route('struktur-organisasi.index')->with('success', 'Data telah tersimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($nip)
    {
        $page = [
            'title' => 'Detail Struktur Organisasi',
            'breadcrumb' => 'Detail'
        ];
        $model = new Pegawai;
        $pegawai = $model->getDataByNip($nip);

        return view('layouts.profil.struktur-organisasi.show', compact('pegawai'))->withPage($page);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($nip)
    {
        $page = [
            'title' => 'Edit Struktur Organisasi',
            'breadcrumb' => 'Edit'
        ];
        $model = new Pegawai;
        $view = [
            'pegawai' => $model->getDataByNip($nip),
            'katbagian' => Katbagian::all(),
            'katjabatan' => Katjabatan::all(),
            'katgolongan' => Katgolongan::all()
        ];

        return view('layouts.profil.struktur-organisasi.edit', $view)->withPage($page);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StrukturOrganisasiRequest $request, $nip)
    {
        $model = new Pegawai;
        $data = $request->except('id', 'gambar');
        $pegawai = $model->getDataByNip($nip);
        $data['mulaijabat'] = dateFormatGeneral($data['mulaijabat']);

        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $path = 'image/pegawai';

            if (!$gambar->isValid()) {
                return redirect()->back()->withInput()->withErrors('gambar', 'Gambar tidak valid');
            }

            $data['gambar'] = time().'-'.$data['nip'].'.'.$gambar->getClientOriginalExtension();
            $gambar->move($path, $data['gambar']);

            // delete image & thumbnail
            deleteImageThumbnail($path, $pegawai->gambar);

            // create thumbnail
            //generateThumbnail($path, $data['gambar']);
        }
        
        $pegawai->update($data);

        return redirect()->route('struktur-organisasi.index')->with('success', 'Data telah diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($nip)
    {
        $model = new Pegawai;
        $pegawai = $model->getDataByNip($nip);

        if ($pegawai) {
            // delete image & thumbnail
            deleteImageThumbnail('image/pegawai', $pegawai->gambar);

            $pegawai->delete();
            $message = 'Data telah dihapus';
        } else {
            $message = 'Data tidak ditemukan';
        }

        return redirect()->route('struktur-organisasi.index')->with('success', $message);
    }
}
