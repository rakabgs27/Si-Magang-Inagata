<?php

namespace App\Http\Controllers;

use App\Models\TestSoal;
use App\Http\Requests\StoreTestSoalRequest;
use App\Http\Requests\UpdateTestSoalRequest;
use App\Models\FileMateri;
use App\Models\Pendaftar;
use App\Models\SoalPendaftar;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class TestSoalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $userId = Auth::id();

            $pendaftar = Pendaftar::where('user_id', $userId)->first();

            $soalPendaftars = SoalPendaftar::where('pendaftar_id', $pendaftar->id)->get();

            return view('soal-management.test-soal.index', compact('soalPendaftars'));
        } catch (\Exception $e) {
            \Log::error('Error fetching test questions: ' . $e->getMessage());
        }
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
     * @param  \App\Http\Requests\StoreTestSoalRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTestSoalRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TestSoal  $testSoal
     * @return \Illuminate\Http\Response
     */
    public function show(SoalPendaftar $testSoal)
    {
        try {
            $soal = SoalPendaftar::with(['soal.divisi', 'pendaftar.user'])->findOrFail($testSoal->id)->soal;

            $files = FileMateri::where('soal_id', $soal->id)->get();

            $fileData = $files->map(function ($file) {
                $fileName = basename($file->files);
                return [
                    'url' => Storage::url($file->files),
                    'name' => $fileName
                ];
            });

            return view('soal-management.test-soal.show', compact('testSoal', 'soal', 'fileData'));
        } catch (\Exception $e) {
            return redirect()->route('test-soal.index')->with('error', 'Gagal Untuk Mengambil Data Assign Soal: ' . $e->getMessage());
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TestSoal  $testSoal
     * @return \Illuminate\Http\Response
     */
    public function edit(TestSoal $testSoal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTestSoalRequest  $request
     * @param  \App\Models\TestSoal  $testSoal
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTestSoalRequest $request, TestSoal $testSoal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TestSoal  $testSoal
     * @return \Illuminate\Http\Response
     */
    public function destroy(TestSoal $testSoal)
    {
        //
    }
}
