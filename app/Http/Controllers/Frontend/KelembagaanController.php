<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Kategori\Katbagian;
use App\Models\Kelembagaan\Kelembagaan;

class KelembagaanController extends Controller
{
    public function index(Request $request, $katid_katbagian = '', $id_katbagian = '')
    {
        $katbagian = new Katbagian;
		$kelembagaans = Kelembagaan::getData($katid_katbagian, $id_katbagian);
        $data = [
            'katbagian' => $katbagian->getDataBySlug($katid_katbagian),
            'kelembagaans' => $kelembagaans->simplePaginate(10),
            'kanan' => getDataKanan()
        ];

        return view('page.kelembagaan.index', $data)->withData($request->all());
    }
}
