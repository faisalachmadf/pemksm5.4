<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Kategori\Kathukum;
use App\Models\ProdukHukum;

class ProdukHukumController extends Controller
{
     public function index()
    {
        $data = [
             'uus' => ProdukHukum::getDataByKat('Undang-Undang')->get(),
             'pps' => ProdukHukum::getDataByKat('Peraturan-Pemerintah')->get(),
             'perpress' => ProdukHukum::getDataByKat('Peraturan-Presiden')->get(),
             'kepress' => ProdukHukum::getDataByKat('Keputusan-Presiden')->get(),
             'permendagris' => ProdukHukum::getDataByKat('Peraturan-Menteri-Dalam-Negeri')->get(),
             'kepmendagris' => ProdukHukum::getDataByKat('Keputusan-Menteri-Dalam-Negeri')->get(),
             'permenlus' => ProdukHukum::getDataByKat('Peraturan-Menteri-Luar-Negeri')->get(),
             'permennaks' => ProdukHukum::getDataByKat('Peraturan-Menteri-Ketenagakerjaan')->get(),
             'perdas' => ProdukHukum::getDataByKat('Peraturan-Daerah-Provinsi-Jawa-Barat')->get(),
             'pergubs' => ProdukHukum::getDataByKat('Peraturan-Gubernur-Provinsi-Jawa-Barat')->get(),
             'kepgubs' => ProdukHukum::getDataByKat('Keputusan-Gubernur-Provinsi-Jawa-Barat')->get(),
             'ses' => ProdukHukum::getDataByKat('Surat-Edaran')->get(),
            'kanan' => getDataKanan()
       
        ];

        return view('page.produkhukum.produkhukum', $data);
    }

    public function search(Request $request)
    {
        $query = $request->get('q');
        $hasil = ProdukHukum::where('nama', 'LIKE', '%' . $query . '%')->paginate(10);
        $data = [
             'uus' => ProdukHukum::getDataByKat('Undang-Undang')->get(),
             'pps' => ProdukHukum::getDataByKat('Peraturan-Pemerintah')->get(),
             'perpress' => ProdukHukum::getDataByKat('Peraturan-Presiden')->get(),
             'kepress' => ProdukHukum::getDataByKat('Keputusan-Presiden')->get(),
             'permendagris' => ProdukHukum::getDataByKat('Peraturan-Menteri-Dalam-Negeri')->get(),
             'kepmendagris' => ProdukHukum::getDataByKat('Keputusan-Menteri-Dalam-Negeri')->get(),
             'permenlus' => ProdukHukum::getDataByKat('Peraturan-Menteri-Luar-Negeri')->get(),
             'permennaks' => ProdukHukum::getDataByKat('Peraturan-Menteri-Ketenagakerjaan')->get(),
             'perdas' => ProdukHukum::getDataByKat('Peraturan-Daerah-Provinsi-Jawa-Barat')->get(),
             'pergubs' => ProdukHukum::getDataByKat('Peraturan-Gubernur-Provinsi-Jawa-Barat')->get(),
             'kepgubs' => ProdukHukum::getDataByKat('Keputusan-Gubernur-Provinsi-Jawa-Barat')->get(),
             'ses' => ProdukHukum::getDataByKat('Surat-Edaran')->get(),
             'kanan' => getDataKanan()
       
        ];
        return view('page.produkhukum.hasilpencarian', compact('hasil', 'query'), $data);
    }

    public function unduh($katSlug = '', $slug = '')
    {
        $model = new ProdukHukum;
        $produkhukum = $model->getDataBySlug($slug);
        $path = 'file/produk-hukum';

        if ($produkhukum && \Storage::exists($path.'/'.$produkhukum->file)) {
            ProdukHukum::diunduh($slug);
            return response()->download($path.'/'.$produkhukum->file);
        }

        return response()->view('errors.404');
    }
}
