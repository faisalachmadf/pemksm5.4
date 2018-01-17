<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Kategori\Katlaporan;
use App\Models\Laporan;

class LaporanController extends Controller
{
    public function index(Request $request, $katSlug = '', $slug = '')
    {
        $pencarian = false;
        $katlaporan = new Katlaporan;

        if ($katSlug == 'popular') {
            $laporans = Laporan::getPopular();
        } else if ($katSlug == 'pencarian' || $slug == 'pencarian') {
            $pencarian = true;
            $laporans = Laporan::getSearch($request->input('katslug'), $request->input('pencarian'));
        } else {
            $laporans = Laporan::getData($katSlug, $slug);
        }

        $data = [
            'katlaporan' => $katlaporan->getDataBySlug($katSlug),
            'pencarian' => $pencarian,
            'laporans' => $laporans->Paginate(25),
            'kanan' => getDataKanan()
        ];

        return view('page.laporan.index', $data)->withData($request->all());
    }

    public function unduh($katSlug = '', $slug = '')
    {
        $model = new Laporan;
        $laporan = $model->getDataBySlug($slug);
        $path = 'file/laporan';

        if ($laporan && \Storage::exists($path.'/'.$laporan->file)) {
            Laporan::diunduh($slug);
            return response()->download($path.'/'.$laporan->file);
        }

        return response()->view('errors.404');
    }
}
