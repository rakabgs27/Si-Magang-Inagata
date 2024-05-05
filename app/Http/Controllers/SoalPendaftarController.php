<?php

namespace App\Http\Controllers;

use App\Models\SoalPendaftar;
use App\Http\Requests\StoreSoalPendaftarRequest;
use App\Http\Requests\UpdateSoalPendaftarRequest;

class SoalPendaftarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('soal-management.assign-soal.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('soal-management.assign-soal.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSoalPendaftarRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSoalPendaftarRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SoalPendaftar  $soalPendaftar
     * @return \Illuminate\Http\Response
     */
    public function show(SoalPendaftar $soalPendaftar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SoalPendaftar  $soalPendaftar
     * @return \Illuminate\Http\Response
     */
    public function edit(SoalPendaftar $soalPendaftar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSoalPendaftarRequest  $request
     * @param  \App\Models\SoalPendaftar  $soalPendaftar
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSoalPendaftarRequest $request, SoalPendaftar $soalPendaftar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SoalPendaftar  $soalPendaftar
     * @return \Illuminate\Http\Response
     */
    public function destroy(SoalPendaftar $soalPendaftar)
    {
        //
    }
}
