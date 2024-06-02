<?php

namespace App\Http\Controllers;

use App\Models\NIlaiPendaftar;
use App\Http\Requests\StoreNIlaiPendaftarRequest;
use App\Http\Requests\UpdateNIlaiPendaftarRequest;
use App\Models\DivisiMentor;
use App\Models\Pendaftar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NIlaiPendaftarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Ambil user ID dari user yang sedang login
        $userId = Auth::id();

        // Ambil semua divisi_id dari divisi_mentors berdasarkan user ID
        $divisiMentors = DivisiMentor::where('user_id', $userId)->with('divisi')->get();

        if ($divisiMentors->isEmpty()) {
            // Handle case where the mentor doesn't have an associated divisi
            return redirect()->back()->withErrors(['error' => 'Mentor does not have an associated division.']);
        }

        // Ambil divisi_id dari request, jika tidak ada gunakan divisi pertama
        $divisiId = $request->input('divisi_id', $divisiMentors->first()->divisi_id);

        $pendaftars = Pendaftar::where('divisi_id', $divisiId)->get();
        $data = [];

        foreach ($pendaftars as $pendaftar) {
            $nilai = NilaiPendaftar::where('pendaftar_id', $pendaftar->id)->first();

            if ($nilai) {
                switch ($divisiId) {
                    case 1: // Backend
                        $kriteria = [
                            'kriteria_1' => $nilai->kriteria_1,
                            'kriteria_2' => $nilai->kriteria_2,
                            'kriteria_3' => $nilai->kriteria_3,
                            'kriteria_4' => $nilai->kriteria_4,
                            'kriteria_5' => $nilai->kriteria_5,
                            'kriteria_6' => $nilai->kriteria_6,
                        ];
                        break;

                    case 2: // Frontend
                        $kriteria = [
                            'kriteria_7' => $nilai->kriteria_7,
                            'kriteria_8' => $nilai->kriteria_8,
                            'kriteria_9' => $nilai->kriteria_9,
                            'kriteria_10' => $nilai->kriteria_10,
                        ];
                        break;

                        // Tambahkan case lain untuk divisi lain
                        // case 3: // Mobile, dll.
                        //     $kriteria = [
                        //         'kriteria_11' => $nilai->kriteria_11,
                        //         'kriteria_12' => $nilai->kriteria_12,
                        //         // dan seterusnya
                        //     ];
                        //     break;

                    default:
                        $kriteria = [];
                        break;
                }

                $data[] = [
                    'pendaftar' => $pendaftar,
                    'kriteria' => $kriteria,
                    'status' => $nilai->status, // Add status here
                ];
            }
        }
        // dd($data);

        return view('nilai-management.list-nilai.index', compact('data', 'divisiMentors', 'divisiId'));
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
     * @param  \App\Http\Requests\StoreNIlaiPendaftarRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNIlaiPendaftarRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NIlaiPendaftar  $nIlaiPendaftar
     * @return \Illuminate\Http\Response
     */
    public function show(NIlaiPendaftar $nIlaiPendaftar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NIlaiPendaftar  $nIlaiPendaftar
     * @return \Illuminate\Http\Response
     */
    public function edit(NIlaiPendaftar $nIlaiPendaftar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateNIlaiPendaftarRequest  $request
     * @param  \App\Models\NIlaiPendaftar  $nIlaiPendaftar
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNIlaiPendaftarRequest $request, NIlaiPendaftar $nIlaiPendaftar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NIlaiPendaftar  $nIlaiPendaftar
     * @return \Illuminate\Http\Response
     */
    public function destroy(NIlaiPendaftar $nIlaiPendaftar)
    {
        //
    }
}
