<?php

namespace App\Http\Controllers;

use App\Models\JawabanPendaftar;
use App\Http\Requests\StoreJawabanPendaftarRequest;
use App\Http\Requests\UpdateJawabanPendaftarRequest;
use App\Models\SoalPendaftar;

class JawabanPendaftarController extends Controller
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
     * @param  \App\Http\Requests\StoreJawabanPendaftarRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreJawabanPendaftarRequest $request)
    {
        $data = $request->validated();
        $data['tanggal_pengumpulan'] = now();

        if ($request->hasFile('file_jawaban')) {
            $data['file_jawaban'] = $request->file('file_jawaban')->storeAs('jawaban', $request->file('file_jawaban')->getClientOriginalName(), 'public'); // Ubah direktori penyimpanan ke 'jawaban'
        }

        $jawabanPendaftar = JawabanPendaftar::where('soal_pendaftar_id', $request->soal_pendaftar_id)->first();

        if ($jawabanPendaftar) {

            $jawabanPendaftar->update($data);
        } else {

            JawabanPendaftar::create($data);
        }

        SoalPendaftar::where('id', $request->soal_pendaftar_id)
            ->update(['status' => 'Selesai Dikerjakan']);

        return redirect()->route('test-soal.index')->with('success', 'Jawaban berhasil dikumpulkan.');
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JawabanPendaftar  $jawabanPendaftar
     * @return \Illuminate\Http\Response
     */
    public function show(JawabanPendaftar $jawabanPendaftar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JawabanPendaftar  $jawabanPendaftar
     * @return \Illuminate\Http\Response
     */
    public function edit(JawabanPendaftar $jawabanPendaftar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateJawabanPendaftarRequest  $request
     * @param  \App\Models\JawabanPendaftar  $jawabanPendaftar
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateJawabanPendaftarRequest $request, JawabanPendaftar $jawabanPendaftar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JawabanPendaftar  $jawabanPendaftar
     * @return \Illuminate\Http\Response
     */
    public function destroy(JawabanPendaftar $jawabanPendaftar)
    {
        //
    }
}
