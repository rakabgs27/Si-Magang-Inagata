<?php

namespace App\Http\Controllers;

use App\Models\Divisi;
use App\Models\ListWawancara;
use App\Models\NilaiPendaftar;
use App\Models\NilaiReviewer;
use App\Models\NilaiWawancaraPendaftar;
use App\Models\Pendaftar;
use Illuminate\Http\Request;

class NilaiReviewerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $divisis = Divisi::all();
        $divisiId = $request->input('divisi_id');
        $perPage = 10; // Jumlah item per halaman

        if ($divisiId) {
            $pendaftars = Pendaftar::with('user', 'divisi')->where('divisi_id', $divisiId)->paginate($perPage);
            $data = [];

            foreach ($pendaftars as $pendaftar) {
                // Mendapatkan nilai dari tabel nilai_reviewers
                $nilaiReviewer = NilaiReviewer::with('nilaiPendaftars')->whereHas('nilaiPendaftars', function ($query) use ($pendaftar) {
                    $query->where('pendaftar_id', $pendaftar->id);
                })->first();

                $statusnilaiReviewer = NilaiReviewer::where('id', $pendaftar->id)->pluck('status')->first();
                $idnilaiReviewer = NilaiReviewer::where('id', $pendaftar->id)->pluck('id')->first();

                // Mendapatkan data wawancara
                $listWawancara = ListWawancara::where('pendaftar_id', $pendaftar->id)->first();
                $nilaiWawancara = NilaiWawancaraPendaftar::where('pendaftar_id', $pendaftar->id)->first();

                if ($nilaiReviewer && $nilaiReviewer->nilaiPendaftars) {
                    $nilai = $nilaiReviewer->nilaiPendaftars;
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
                                'kriteria_11' => $nilai->kriteria_11,
                            ];
                            break;
                        case 3: // Mobile Development
                            $kriteria = [
                                'kriteria_12' => $nilai->kriteria_12,
                                'kriteria_13' => $nilai->kriteria_13,
                                'kriteria_14' => $nilai->kriteria_14,
                                'kriteria_15' => $nilai->kriteria_15,
                            ];
                            break;
                        case 4: // UI/UX
                            $kriteria = [
                                'kriteria_16' => $nilai->kriteria_16,
                                'kriteria_17' => $nilai->kriteria_17,
                                'kriteria_18' => $nilai->kriteria_18,
                                'kriteria_19' => $nilai->kriteria_19,
                                'kriteria_20' => $nilai->kriteria_20,
                                'kriteria_21' => $nilai->kriteria_21,
                            ];
                            break;
                        case 5: // System Analyst
                            $kriteria = [
                                'kriteria_22' => $nilai->kriteria_22,
                                'kriteria_23' => $nilai->kriteria_23,
                                'kriteria_24' => $nilai->kriteria_24,
                                'kriteria_25' => $nilai->kriteria_25,
                                'kriteria_26' => $nilai->kriteria_26,
                                'kriteria_27' => $nilai->kriteria_27,
                            ];
                            break;
                        case 6: // Management
                            $kriteria = [
                                'kriteria_28' => $nilai->kriteria_28,
                                'kriteria_29' => $nilai->kriteria_29,
                                'kriteria_30' => $nilai->kriteria_30,
                                'kriteria_31' => $nilai->kriteria_31,
                                'kriteria_32' => $nilai->kriteria_32,
                                'kriteria_33' => $nilai->kriteria_33,
                                'kriteria_34' => $nilai->kriteria_34,
                            ];
                            break;
                        case 7: // Media & Advertising
                            $kriteria = [
                                'kriteria_35' => $nilai->kriteria_35,
                                'kriteria_36' => $nilai->kriteria_36,
                                'kriteria_37' => $nilai->kriteria_37,
                                'kriteria_38' => $nilai->kriteria_38,
                                'kriteria_39' => $nilai->kriteria_39,
                                'kriteria_40' => $nilai->kriteria_40,
                            ];
                            break;
                        case 8: // Icon and Illustration
                            $kriteria = [
                                'kriteria_41' => $nilai->kriteria_41,
                                'kriteria_42' => $nilai->kriteria_42,
                                'kriteria_43' => $nilai->kriteria_43,
                                'kriteria_44' => $nilai->kriteria_44,
                            ];
                            break;
                        default:
                            $kriteria = [];
                            break;
                    }

                    $status_wawancara_label = ($nilaiWawancara && $nilaiWawancara->status === 'Sudah Dinilai') ? $nilaiWawancara->status : 'Menunggu';

                    $data[] = [
                        'pendaftar' => $pendaftar,
                        'kriteria' => $kriteria,
                        'status_nilai' => $nilai->status,
                        'status' => $nilaiReviewer->status,
                        'wawancara_selesai' => $listWawancara && $listWawancara->status === 'Selesai',
                        'nilai_wawancara' => $nilaiWawancara ? $nilaiWawancara->nilai_wawancara : null,
                        'nilai_wawancara_label' => $nilaiWawancara ? $this->convertNilaiToLabel($nilaiWawancara->nilai_wawancara) : null,
                        'status_wawancara_label' => $status_wawancara_label,
                        'status_wawancara' => $nilaiWawancara && $nilaiWawancara->status === 'Sudah Dinilai',
                        'status_reviewer' => $statusnilaiReviewer,
                        'idNilaiReviewer' => $idnilaiReviewer
                    ];
                }
            }

            return view('nilai-management.reviewer.index', compact('data', 'divisis', 'divisiId', 'pendaftars'));
        }

        return view('nilai-management.reviewer.index', compact('divisis', 'divisiId'));
    }




    private function convertNilaiToLabel($nilai)
    {
        if ($nilai <= 60) {
            return 'Kurang';
        } elseif ($nilai <= 70) {
            return 'Cukup';
        } elseif ($nilai <= 80) {
            return 'Memuaskan';
        } elseif ($nilai <= 90) {
            return 'Baik Sekali';
        } else {
            return 'Luar Biasa';
        }
    }

    public function changeStatus(Request $request)
    {
        // Ambil data NilaiReviewer berdasarkan ID
        $nilaiReviewer = NilaiReviewer::find($request->input('id'));

        if (!$nilaiReviewer) {
            return response()->json([
                'message' => 'Nilai Reviewer tidak ditemukan.'
            ], 404);
        }

        // Update status
        $nilaiReviewer->status = $request->input('status');
        $nilaiReviewer->save();

        return response()->json(['message' => 'Status updated successfully.'], 200);
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
    public function show($id)
    {
        //
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
