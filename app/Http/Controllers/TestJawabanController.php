<?php

namespace App\Http\Controllers;

use App\Models\FileMateri;
use App\Models\JawabanPendaftar;
use App\Models\Pendaftar;
use App\Models\Soal;
use App\Models\SoalPendaftar;
use App\Models\TestSoal;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TestJawabanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $auth = Auth::user()->id;
        $idPendaftar = Pendaftar::where('user_id', $auth)->value('id');
        $testSoal = SoalPendaftar::where('pendaftar_id', $idPendaftar)
            ->where('status', '=', 'Sedang Dikerjakan')
            ->first();

        if (!$testSoal) {
            return redirect()->route('test-soal.index')->with('error', 'Tidak ada soal yang sedang dikerjakan.');
        }

        return redirect()->route('test-jawaban.show', $testSoal->id);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(SoalPendaftar $testJawaban)
{
    try {
        $soal = SoalPendaftar::with(['soal.divisi', 'pendaftar.user'])->findOrFail($testJawaban->id)->soal;

        $files = FileMateri::where('soal_id', $soal->id)->get();

        $fileData = $files->map(function ($file) {
            $fileName = basename($file->files);
            return [
                'url' => Storage::url($file->files),
                'name' => $fileName
            ];
        });

        // Periksa apakah jawaban pendaftar sudah ada
        $jawabanPendaftar = JawabanPendaftar::where('soal_pendaftar_id', $testJawaban->id)->first();

        return view('jawaban-management.test-jawaban.show', compact('testJawaban', 'soal', 'fileData', 'jawabanPendaftar'));
    } catch (\Exception $e) {
        return redirect()->route('test-soal.index')->with('error', 'Gagal Untuk Mengambil Data Assign Soal: ' . $e->getMessage());
    }
}



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
