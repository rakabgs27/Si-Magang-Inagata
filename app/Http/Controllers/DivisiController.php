<?php

namespace App\Http\Controllers;

use App\Models\Divisi;
use App\Http\Requests\StoreDivisiRequest;
use App\Http\Requests\UpdateDivisiRequest;
use Illuminate\Http\Request;

class DivisiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:list-divisi.index')->only('index');
        $this->middleware('permission:list-divisi.create')->only('create', 'store');
        $this->middleware('permission:list-divisi.edit')->only('edit', 'update');
        $this->middleware('permission:list-divisi.destroy')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $namaDivisiSearch = $request->input('nama_divisi');
        $listDivisi = Divisi::when($request->input('nama_divisi'), function ($query, $namaDivisi) {
            return $query->where('nama_divisi', 'like', '%' . $namaDivisi . '%');
        })->paginate(10);

        return view('divisi-management.list-divisi.index', [
            'listDivisi' => $listDivisi,
            'namaDivisiSearch' => $namaDivisiSearch,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('divisi-management.list-divisi.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDivisiRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDivisiRequest $request)
    {
        Divisi::create([
            'nama_divisi' => $request->input('nama_divisi'),
        ]);

        return redirect()->route('list-divisi.index')
            ->with('success', 'Divisi berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Divisi  $divisi
     * @return \Illuminate\Http\Response
     */
    public function show(Divisi $divisi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Divisi  $divisi
     * @return \Illuminate\Http\Response
     */
    public function edit(Divisi $list_divisi)
    {
        return view('divisi-management.list-divisi.edit')
            ->with('list_divisi', $list_divisi);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDivisiRequest  $request
     * @param  \App\Models\Divisi  $divisi
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDivisiRequest $request, Divisi $list_divisi)
    {
        $validate = $request->validated();
        $list_divisi->update($validate);
        return redirect()->route('list-divisi.index')->with('success', 'Divisi Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Divisi  $divisi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Divisi $list_divisi)
    {
        try {
            $list_divisi->delete();
            return redirect()->route('list-divisi.index')
                ->with('success', 'Divisi berhasil dihapus.');
        } catch (\Exception $exception) {
            return redirect()->route('list-divisi.index')
                ->with('error', 'Terjadi kesalahan saat menghapus divisi.');
        }
    }
}
