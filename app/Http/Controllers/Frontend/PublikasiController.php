<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Kategori\Katfile;
use App\Models\Publikasi;

class PublikasiController extends Controller
{
    public function index(Request $request, $katSlug = '', $slug = '')
    {
        $pencarian = false;
        $katfile = new Katfile;

        if ($katSlug == 'popular') {
            $publikasis = Publikasi::getPopular();
        } else if ($katSlug == 'pencarian' || $slug == 'pencarian') {
            $pencarian = true;
            $publikasis = Publikasi::getSearch($request->input('katslug'), $request->input('pencarian'));
        } else {
            $publikasis = Publikasi::getData($katSlug, $slug);
        }

        $data = [
            'katfile' => $katfile->getDataBySlug($katSlug),
            'pencarian' => $pencarian,
            'publikasis' => $publikasis->Paginate(25),
            'kanan' => getDataKanan()
        ];

        return view('page.publikasi.index', $data)->withData($request->all());
    }

    public function unduh($katSlug = '', $slug = '')
    {
        $model = new Publikasi;
        $publikasi = $model->getDataBySlug($slug);
        $path = 'file/publikasi';

        if ($publikasi && \Storage::exists($path.'/'.$publikasi->file)) {
            Publikasi::diunduh($slug);
            return response()->download($path.'/'.$publikasi->file);
        }

        return response()->view('errors.404');
    }
}
