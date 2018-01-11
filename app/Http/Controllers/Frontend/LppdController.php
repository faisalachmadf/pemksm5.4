<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Lppd\Lppd;

class LppdController extends Controller
{
    
     public function index()
    {
        $data = [
            'lppds' => Lppd::Urutan()->Paginate(10),
            'kanan' => getDataKanan()
        ];
        
        return view('page.lppd.index', $data);
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
