<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AgendaRequest;

use App\Models\Agenda;
use App\Models\Kategori\Katbagian;
use Datatables;

class AgendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page = [
            'title' => 'Agenda Biro',
            'breadcrumb' => 'Agenda Biro'
        ];

        return view('layouts.agenda.index')->withPage($page);
    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function datatables()
    {
        $param = [
            'url' => 'agenda',
            'action' => ['show', 'edit', 'destroy'],
        ];

        return Datatables::of(agenda::with(['katbagian', 'user']))
            ->addColumn('action', function($data) use ($param) {
                return generateAction($param, $data->slug);
            })
          
 			->editColumn('tanggal', function($data) {
                return date('d F Y', strtotime($data->tanggal));
            })
            ->addColumn('user', function($data) {
                if ($data->user) {
                    return $data->user->username;
                }

                return '-';
            })
            ->rawColumns(['tanggal', 'action'])
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
            'title' => 'Tambah agenda Biro',
            'breadcrumb' => 'Tambah'
        ];
        $view = [
            'katbagian' => Katbagian::all()
        ];

        return view('layouts.agenda.create', $view)->withPage($page);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AgendaRequest $request)
    {
        $agenda = new agenda;
        $agenda->id_katbagian = $request->input('id_katbagian');
        $agenda->judul = $request->input('judul');
        $agenda->jam = $request->input('jam');
        $agenda->lokasi = $request->input('lokasi');
        $agenda->tanggal = dateFormatGeneral($request->input('tanggal'));
        $agenda->slug = str_slug($agenda->judul);
        $agenda->save();
        

        return redirect()->route('agenda.index')->with('success', 'Data telah tersimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $page = [
            'title' => 'Detail agenda Biro',
            'breadcrumb' => 'Detail'
        ];
        $model = new Agenda;
        $agenda = $model->getDataBySlug($slug);

        return view('layouts.agenda.show', compact('agenda'))->withPage($page);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $page = [
            'title' => 'Edit agenda Biro',
            'breadcrumb' => 'Edit'
        ];
        $model = new agenda;
        $view = [
            'agenda' => $model->getDataBySlug($slug),
            'katbagian' => Katbagian::all()
        ];

        return view('layouts.agenda.edit', $view)->withPage($page);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AgendaRequest $request, $slug)
    {
        $model = new Agenda;
        $data = $request->except('id');
        $agenda = $model->getDataBySlug($slug);
        $data['slug'] = str_slug($data['judul']);
        $data['tanggal'] = dateFormatGeneral($data['tanggal']);

        
        $agenda->update($data);

        return redirect()->route('agenda.index')->with('success', 'Data telah diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $model = new Agenda;
        $agenda = $model->getDataBySlug($slug);

        if ($agenda) {

            $agenda->delete();
            $message = 'Data telah dihapus';
        } else {
            $message = 'Data tidak ditemukan';
        }

        return redirect()->route('agenda.index')->with('success', $message);
    }

    /**
     * Download the specified file from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
  
}
