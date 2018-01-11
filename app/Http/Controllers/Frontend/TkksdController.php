<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Tkksd\Tkksd;
use App\Models\Tkksd\GaleriTkksd;


class TkksdController extends Controller
{
     public function index()
    {
        $data = [
            'tkksds' => Tkksd::Urutan()->Paginate(10),
            'galeritkksds' => GaleriTkksd::Urutan()->Paginate(10),
            'kanan' => getDataKanan()
        ];
        
        return view('page.tkksd.index', $data);
    }

     public function search(Request $request)
    {
        $query = $request->get('q');
        $hasil = Tkksd::where('judul', 'LIKE', '%' . $query . '%')->paginate(10);
        $data = [
            'tkksds' => Tkksd::Urutan()->Paginate(10),
            'galeritkksds' => GaleriTkksd::Urutan()->Paginate(10),
            'kanan' => getDataKanan()
        ];

        return view('page.tkksd.hasilpencarian', compact('hasil', 'query'), $data);
    }

      public function unduh($slug = '')
    {
        $model = new Tkksd;
        $tkksd = $model->getDataBySlug($slug);
        $path = 'file/tkksd';

        if ($tkksd && \Storage::exists($path.'/'.$tkksd->file)) {
            Tkksd::diunduh($slug);
            return response()->download($path.'/'.$tkksd->file);
        }

        return response()->view('errors.404');
    }
}
