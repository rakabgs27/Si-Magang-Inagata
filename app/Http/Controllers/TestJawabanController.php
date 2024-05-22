<?php

namespace App\Http\Controllers;

use App\Models\FileMateri;
use App\Models\SoalPendaftar;
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

            return view('jawaban-management.test-jawaban.show', compact('testJawaban', 'soal', 'fileData'));
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
