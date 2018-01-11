<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Lppd\Lppd;
use App\Models\Lppd\GaleriLppd;

class LppdController extends Controller
{
    
     public function index()
    {
        $data = [
            'lppds' => Lppd::Urutan()->Paginate(10),
            'galerilppds' => GaleriLppd::Urutan()->Paginate(10),
            'kanan' => getDataKanan()
        ];
        
        return view('page.lppd.index', $data);
    }

     public function search(Request $request)
    {
        $query = $request->get('q');
        $hasil = Lppd::where('judul', 'LIKE', '%' . $query . '%')->paginate(10);
        $data = [
            'lppds' => Lppd::Urutan()->Paginate(10),
            'galerilppds' => GaleriLppd::Urutan()->Paginate(10),
            'kanan' => getDataKanan()
        ];

        return view('page.lppd.hasilpencarian', compact('hasil', 'query'), $data);
    }

      public function unduh($slug = '')
    {
        $model = new Lppd;
        $lppd = $model->getDataBySlug($slug);
        $path = 'file/lppd';

        if ($lppd && \Storage::exists($path.'/'.$lppd->file)) {
            Lppd::diunduh($slug);
            return response()->download($path.'/'.$lppd->file);
        }

        return response()->view('errors.404');
    }

}
