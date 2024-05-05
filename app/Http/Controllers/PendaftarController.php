<?php

namespace App\Http\Controllers;

use App\Models\Pendaftar;
use App\Http\Requests\StorePendaftarRequest;
use App\Http\Requests\UpdatePendaftarRequest;
use Illuminate\Http\Request;

class PendaftarController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:list-pendaftar.index')->only('index');
        $this->middleware('permission:list-pendaftar.create')->only('create', 'store');
        $this->middleware('permission:list-pendaftar.edit')->only('edit', 'update');
        $this->middleware('permission:list-pendaftar.destroy')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $namaUserSearch = $request->input('name');

        $listPendaftar = Pendaftar::with(['user', 'divisi'])
            ->when($namaUserSearch, function ($query, $namaUserSearch) {
                return $query->whereHas('user', function ($query) use ($namaUserSearch) {
                    return $query->where('name', 'like', '%' . $namaUserSearch . '%');
                });
            })
            ->paginate(10);

        return view('users-management.list-pendaftar.index', [
            'listPendaftar' => $listPendaftar,
            'namaUserSearch' => $namaUserSearch,
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePendaftarRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePendaftarRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pendaftar  $pendaftar
     * @return \Illuminate\Http\Response
     */
    public function show(Pendaftar $pendaftar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pendaftar  $pendaftar
     * @return \Illuminate\Http\Response
     */
    public function edit(Pendaftar $pendaftar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePendaftarRequest  $request
     * @param  \App\Models\Pendaftar  $pendaftar
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePendaftarRequest $request, Pendaftar $pendaftar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pendaftar  $pendaftar
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pendaftar $pendaftar)
    {
        //
    }
}
