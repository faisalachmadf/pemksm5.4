<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Tkksd\Tkksd;


class TkksdController extends Controller
{
     public function index()
    {
        $data = [
            'tkksds' => Tkksd::Urutan()->Paginate(10),
            'kanan' => getDataKanan()
        ];
        
        return view('page.Tkksd.index', $data);
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
