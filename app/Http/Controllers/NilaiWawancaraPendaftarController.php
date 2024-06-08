<?php

namespace App\Http\Controllers;

use App\Models\NilaiWawancaraPendaftar;
use App\Http\Requests\StoreNilaiWawancaraPendaftarRequest;
use App\Http\Requests\UpdateNilaiWawancaraPendaftarRequest;

class NilaiWawancaraPendaftarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreNilaiWawancaraPendaftarRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNilaiWawancaraPendaftarRequest $request)
    {
        $validated = $request->validated();

        $nilaiNumeric = $this->convertToNumeric($validated['nilai_wawancara']);

        $nilaiWawancara = NilaiWawancaraPendaftar::where('pendaftar_id', $validated['pendaftar_id'])->first();

        if ($nilaiWawancara) {
            $nilaiWawancara->nilai_wawancara = $nilaiNumeric;
            $nilaiWawancara->status = 'Sudah Dinilai';
            $nilaiWawancara->save();
        } else {
            $nilaiWawancara = new NilaiWawancaraPendaftar();
            $nilaiWawancara->pendaftar_id = $validated['pendaftar_id'];
            $nilaiWawancara->nilai_wawancara = $nilaiNumeric;
            $nilaiWawancara->status = 'Sudah Dinilai';
            $nilaiWawancara->save();
        }

        // Redirect kembali dengan pesan sukses
        return redirect()->back()->with('success', 'Nilai wawancara berhasil disimpan.');
    }

    private function convertToNumeric($value)
    {
        switch (strtolower($value)) {
            case 'kurang':
                return 60;
            case 'cukup':
                return 70;
            case 'memuaskan':
                return 80;
            case 'baik sekali':
                return 90;
            case 'luar biasa':
                return 100;
            default:
                return null;
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NilaiWawancaraPendaftar  $nilaiWawancaraPendaftar
     * @return \Illuminate\Http\Response
     */
    public function show(NilaiWawancaraPendaftar $nilaiWawancaraPendaftar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NilaiWawancaraPendaftar  $nilaiWawancaraPendaftar
     * @return \Illuminate\Http\Response
     */
    public function edit(NilaiWawancaraPendaftar $nilaiWawancaraPendaftar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateNilaiWawancaraPendaftarRequest  $request
     * @param  \App\Models\NilaiWawancaraPendaftar  $nilaiWawancaraPendaftar
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNilaiWawancaraPendaftarRequest $request, NilaiWawancaraPendaftar $nilaiWawancaraPendaftar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NilaiWawancaraPendaftar  $nilaiWawancaraPendaftar
     * @return \Illuminate\Http\Response
     */
    public function destroy(NilaiWawancaraPendaftar $nilaiWawancaraPendaftar)
    {
        //
    }
}
