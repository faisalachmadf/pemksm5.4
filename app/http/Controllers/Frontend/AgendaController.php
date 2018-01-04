<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Kategori\Katbagian;
use App\Models\Agenda;

class AgendaController extends Controller
{
   public function index(Request $request, $katSlug = '', $slug = '')
    {
        $pencarian = false;

        if ($katSlug == 'pencarian') {
            $pencarian = true;
            $agendas = Agenda::getSearch($request->input('pencarian'));
        } else {
            $agendas = Agenda::getData($katSlug, $slug);
        }

        $data = [
            'katbagians' => Katbagian::all(),
            'pencarian' => $pencarian,
            'agendas' => $agendas->simplePaginate(10),
        ];

        return view('page.agenda.index', $data)->withData($request->all());
    }
}
