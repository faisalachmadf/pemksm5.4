<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;

use App\Models\User;
use Yajra\Datatables\Datatables;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page = [
            'title' => 'List User'
        ];

        return view('layouts.user.index')->withPage($page);
    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function datatables()
    {
        $param = [
            'url' => 'user',
            'action' => ['show', 'edit', 'destroy']
        ];

        return Datatables::of(User::query())
            ->addColumn('action', function($data) use ($param) {
                if ($data->role == 'superadmin') {
                    unset($param['action'][array_search('edit', $param['action'])]);
                    unset($param['action'][array_search('destroy', $param['action'])]);
                }

                return generateAction($param, $data->username);
            })
            ->editColumn('role', function($data) {
                return ucwords($data->role);
            })
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
            'title' => 'Tambah User'
        ];

        return view('layouts.user.create')->withPage($page);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $user = new User;
        $user->register($request->except('konfirmasi_password'));
        

        return redirect()->route('user.index')->with('success', 'Data telah tersimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($username)
    {
        $page = [
            'title' => 'Detail User'
        ];
        $model = new User;
        $user = $model->getUserByUsername($username);

        return view('layouts.user.show', compact('user'))->withPage($page);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($username)
    {
        $page = [
            'title' => 'Edit User'
        ];
        $model = new User;
        $user = $model->getUserByUsername($username);

        return view('layouts.user.edit', compact('user'))->withPage($page);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $username)
    {
        $model = new User;
        
        if (! $model->updateUser($request->except('id', 'konfirmasi_password'), $request->input('id'))) {
            return redirect()->back()->withInput()->withErrors(['password_lama' => 'Password salah']);
        }

        return redirect()->route('user.index')->with('success', 'Data telah diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($username)
    {
        $model = new User;
        $user = $model->getUserByUsername($username);

        if ($user) {
            $user->delete();
            $message = 'Data telah dihapus';
        } else {
            $message = 'Data tidak ditemukan';
        }

        return redirect()->route('user.index')->with('success', $message);
    }
}
