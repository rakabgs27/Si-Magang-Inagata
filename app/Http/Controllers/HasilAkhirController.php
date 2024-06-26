<?php

namespace App\Http\Controllers;

use App\Models\Divisi;
use App\Models\ListWawancara;
use App\Models\NilaiPendaftar;
use App\Models\NilaiReviewer;
use App\Models\NilaiWawancaraPendaftar;
use App\Models\Pendaftar;
use App\Models\SimpanHasilAkhir;
use Illuminate\Http\Request;

class HasilAkhirController extends Controller
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
            $nilaiReviewers = NilaiReviewer::where('status', '=', 'Terverifikasi')
                ->pluck('nilai_pendaftars_id')->toArray(); // Pastikan ini adalah array

            $simpanHasilAkhir = SimpanHasilAkhir::all();

            if ($simpanHasilAkhir->isEmpty()) {
                $nilaiPendaftarIds = NilaiPendaftar::whereIn('id', $nilaiReviewers)
                    ->pluck('pendaftar_id');

                $pendaftars = Pendaftar::with('user', 'divisi')
                    ->where('divisi_id', $divisiId)
                    ->whereIn('id', $nilaiPendaftarIds)
                    ->paginate($perPage);
            } else {
                $pendaftarIds = SimpanHasilAkhir::select('hasil')
                    ->where('status', '=', 'Sudah Selesai')->get()->flatMap(function ($item) {
                        return collect(json_decode($item->hasil, true))->pluck('pendaftar_id');
                    })->map(function ($id) {
                        return (int) $id;
                    })->all();

                $nilaiReviewers = NilaiReviewer::where('status', '=', 'Terverifikasi')
                    ->pluck('nilai_pendaftars_id')->map(function ($id) {
                        return (int) $id;
                    })->all();

                $nilaiPendaftarIds = NilaiPendaftar::whereIn('id', $nilaiReviewers)
                    ->pluck('pendaftar_id')->map(function ($id) {
                        return (int) $id;
                    })->all();

                $differentPendaftarIds = array_diff($nilaiPendaftarIds, $pendaftarIds);

                $pendaftars = Pendaftar::with('user', 'divisi')
                    ->where('divisi_id', $divisiId)
                    ->whereIn('id', $differentPendaftarIds)
                    ->paginate($perPage);
            }

            $data = [];
            $weights = [];
            $wawancaraWeight = 0.20;

            switch ($divisiId) {
                case 1:
                    $weights = [
                        'kriteria_1' => 0.12,
                        'kriteria_2' => 0.12,
                        'kriteria_3' => 0.12,
                        'kriteria_4' => 0.12,
                        'kriteria_5' => 0.16,
                        'kriteria_6' => 0.16,
                        'nilai_wawancara' => $wawancaraWeight,
                    ];
                    break;
                case 2:
                    $weights = [
                        'kriteria_7' => 0.16,
                        'kriteria_8' => 0.16,
                        'kriteria_9' => 0.16,
                        'kriteria_10' => 0.16,
                        'kriteria_11' => 0.16,
                        'nilai_wawancara' => $wawancaraWeight,
                    ];
                    break;
                case 3:
                    $weights = [
                        'kriteria_12' => 0.20,
                        'kriteria_13' => 0.20,
                        'kriteria_14' => 0.20,
                        'kriteria_15' => 0.20,
                        'nilai_wawancara' => $wawancaraWeight,
                    ];
                    break;
                case 4:
                    $weights = [
                        'kriteria_16' => 0.08,
                        'kriteria_17' => 0.08,
                        'kriteria_18' => 0.08,
                        'kriteria_19' => 0.08,
                        'kriteria_20' => 0.16,
                        'kriteria_21' => 0.16,
                        'nilai_wawancara' => $wawancaraWeight,
                    ];
                    break;
                case 5:
                    $weights = [
                        'kriteria_22' => 0.12,
                        'kriteria_23' => 0.12,
                        'kriteria_24' => 0.08,
                        'kriteria_25' => 0.08,
                        'kriteria_26' => 0.08,
                        'kriteria_27' => 0.16,
                        'nilai_wawancara' => $wawancaraWeight,
                    ];
                    break;
                case 6:
                    $weights = [
                        'kriteria_28' => 0.08,
                        'kriteria_29' => 0.08,
                        'kriteria_30' => 0.08,
                        'kriteria_31' => 0.08,
                        'kriteria_32' => 0.16,
                        'kriteria_33' => 0.16,
                        'kriteria_34' => 0.16,
                        'nilai_wawancara' => $wawancaraWeight,
                    ];
                    break;
                case 7:
                    $weights = [
                        'kriteria_35' => 0.12,
                        'kriteria_36' => 0.12,
                        'kriteria_37' => 0.12,
                        'kriteria_38' => 0.12,
                        'kriteria_39' => 0.16,
                        'kriteria_40' => 0.16,
                        'nilai_wawancara' => $wawancaraWeight,
                    ];
                    break;
                case 8:
                    $weights = [
                        'kriteria_41' => 0.20,
                        'kriteria_42' => 0.20,
                        'kriteria_43' => 0.20,
                        'kriteria_44' => 0.20,
                        'nilai_wawancara' => $wawancaraWeight,
                    ];
                    break;
                default:
                    $weights = [];
                    break;
            }

            $allNilaiPendaftar = NilaiPendaftar::whereIn('pendaftar_id', $pendaftars->pluck('id'))->get();

            $maxValues = [];
            foreach ($weights as $key => $weight) {
                $maxValues[$key] = $allNilaiPendaftar->max($key);
            }

            foreach ($pendaftars as $pendaftar) {
                $nilaiReviewer = NilaiReviewer::with('nilaiPendaftars')->whereHas('nilaiPendaftars', function ($query) use ($pendaftar) {
                    $query->where('pendaftar_id', $pendaftar->id);
                })->first();

                $statusnilaiReviewer = NilaiReviewer::where('id', $pendaftar->id)->pluck('status')->first();
                $idnilaiReviewer = NilaiReviewer::where('id', $pendaftar->id)->pluck('id')->first();

                $listWawancara = ListWawancara::where('pendaftar_id', $pendaftar->id)->first();
                $nilaiWawancara = NilaiWawancaraPendaftar::where('pendaftar_id', $pendaftar->id)->first();

                if ($nilaiReviewer && $nilaiReviewer->nilaiPendaftars) {
                    $nilai = $nilaiReviewer->nilaiPendaftars;

                    switch ($divisiId) {
                        case 1:
                            $kriteria = [
                                'kriteria_1' => $nilai->kriteria_1,
                                'kriteria_2' => $nilai->kriteria_2,
                                'kriteria_3' => $nilai->kriteria_3,
                                'kriteria_4' => $nilai->kriteria_4,
                                'kriteria_5' => $nilai->kriteria_5,
                                'kriteria_6' => $nilai->kriteria_6,
                                'nilai_wawancara' => $nilaiWawancara ? $nilaiWawancara->nilai_wawancara : null,
                            ];
                            break;
                        case 2:
                            $kriteria = [
                                'kriteria_7' => $nilai->kriteria_7,
                                'kriteria_8' => $nilai->kriteria_8,
                                'kriteria_9' => $nilai->kriteria_9,
                                'kriteria_10' => $nilai->kriteria_10,
                                'kriteria_11' => $nilai->kriteria_11,
                                'nilai_wawancara' => $nilaiWawancara ? $nilaiWawancara->nilai_wawancara : null,
                            ];
                            break;
                        case 3:
                            $kriteria = [
                                'kriteria_12' => $nilai->kriteria_12,
                                'kriteria_13' => $nilai->kriteria_13,
                                'kriteria_14' => $nilai->kriteria_14,
                                'kriteria_15' => $nilai->kriteria_15,
                                'nilai_wawancara' => $nilaiWawancara ? $nilaiWawancara->nilai_wawancara : null,
                            ];
                            break;
                        case 4:
                            $kriteria = [
                                'kriteria_16' => $nilai->kriteria_16,
                                'kriteria_17' => $nilai->kriteria_17,
                                'kriteria_18' => $nilai->kriteria_18,
                                'kriteria_19' => $nilai->kriteria_19,
                                'kriteria_20' => $nilai->kriteria_20,
                                'kriteria_21' => $nilai->kriteria_21,
                                'nilai_wawancara' => $nilaiWawancara ? $nilaiWawancara->nilai_wawancara : null,
                            ];
                            break;
                        case 5:
                            $kriteria = [
                                'kriteria_22' => $nilai->kriteria_22,
                                'kriteria_23' => $nilai->kriteria_23,
                                'kriteria_24' => $nilai->kriteria_24,
                                'kriteria_25' => $nilai->kriteria_25,
                                'kriteria_26' => $nilai->kriteria_26,
                                'kriteria_27' => $nilai->kriteria_27,
                                'nilai_wawancara' => $nilaiWawancara ? $nilaiWawancara->nilai_wawancara : null,
                            ];
                            break;
                        case 6:
                            $kriteria = [
                                'kriteria_28' => $nilai->kriteria_28,
                                'kriteria_29' => $nilai->kriteria_29,
                                'kriteria_30' => $nilai->kriteria_30,
                                'kriteria_31' => $nilai->kriteria_31,
                                'kriteria_32' => $nilai->kriteria_32,
                                'kriteria_33' => $nilai->kriteria_33,
                                'kriteria_34' => $nilai->kriteria_34,
                                'nilai_wawancara' => $nilaiWawancara ? $nilaiWawancara->nilai_wawancara : null,
                            ];
                            break;
                        case 7:
                            $kriteria = [
                                'kriteria_35' => $nilai->kriteria_35,
                                'kriteria_36' => $nilai->kriteria_36,
                                'kriteria_37' => $nilai->kriteria_37,
                                'kriteria_38' => $nilai->kriteria_38,
                                'kriteria_39' => $nilai->kriteria_39,
                                'kriteria_40' => $nilai->kriteria_40,
                                'nilai_wawancara' => $nilaiWawancara ? $nilaiWawancara->nilai_wawancara : null,
                            ];
                            break;
                        case 8:
                            $kriteria = [
                                'kriteria_41' => $nilai->kriteria_41,
                                'kriteria_42' => $nilai->kriteria_42,
                                'kriteria_43' => $nilai->kriteria_43,
                                'kriteria_44' => $nilai->kriteria_44,
                                'nilai_wawancara' => $nilaiWawancara ? $nilaiWawancara->nilai_wawancara : null,
                            ];
                            break;
                        default:
                            $kriteria = [];
                            break;
                    }

                    foreach ($weights as $key => $weight) {
                        if ($key === 'nilai_wawancara') {
                            $maxNilaiWawancara = NilaiWawancaraPendaftar::max('nilai_wawancara') ?? 1;
                            $maxValues[$key] = $maxNilaiWawancara;
                        } else {
                            $maxValues[$key] = $allNilaiPendaftar->max($key) ?? 1;
                        }
                    }

                    $normalizedKriteria = [];
                    foreach ($kriteria as $key => $value) {
                        if ($value !== null && $maxValues[$key] > 0) {
                            $normalizedKriteria[$key] = $value / $maxValues[$key];
                        } else {
                            $normalizedKriteria[$key] = 0;
                        }
                    }

                    $score = 0;
                    foreach ($normalizedKriteria as $key => $value) {
                        if ($value !== null) {
                            $score += $value * $weights[$key];
                        }
                    }

                    $status_wawancara_label = ($nilaiWawancara && $nilaiWawancara->status === 'Sudah Dinilai') ? $nilaiWawancara->status : 'Menunggu';

                    $data[] = [
                        'pendaftar' => $pendaftar,
                        'kriteria' => $kriteria,
                        'score' => $score,
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

            usort($data, function ($a, $b) {
                return $b['score'] <=> $a['score'];
            });

            $rank = 1;
            $hasil = [];
            foreach ($data as &$item) {
                $item['rank'] = $rank++;
                $hasil[] = [
                    'pendaftar_id' => $item['pendaftar']->id,
                    'rank' => $item['rank'],
                ];
            }

            if (!empty($hasil)) {
                $existingRecord = SimpanHasilAkhir::where('status', 'Belum Selesai')->first();
                if ($existingRecord) {
                    $existingHasil = json_decode($existingRecord->hasil, true);
                    // Menghapus pendaftar yang ditolak dari existingHasil
                    $existingHasil = array_filter($existingHasil, function ($item) use ($nilaiReviewers) {
                        return in_array($item['pendaftar_id'], $nilaiReviewers);
                    });
                    foreach ($hasil as $newItem) {
                        $found = false;
                        foreach ($existingHasil as &$existingItem) {
                            if ($existingItem['pendaftar_id'] == $newItem['pendaftar_id']) {
                                $existingItem['rank'] = $newItem['rank'];
                                $found = true;
                                break;
                            }
                        }
                        if (!$found) {
                            $existingHasil[] = $newItem;
                        }
                    }
                    usort($existingHasil, function ($a, $b) {
                        return $a['rank'] <=> $b['rank'];
                    });
                    $existingRecord->update([
                        'hasil' => json_encode(array_values($existingHasil)),
                    ]);
                } else {
                    usort($hasil, function ($a, $b) {
                        return $a['rank'] <=> $b['rank'];
                    });
                    SimpanHasilAkhir::create([
                        'status' => 'Belum Selesai',
                        'hasil' => json_encode($hasil),
                    ]);
                }
            }

            return view('nilai-management.hasil-akhir.index', compact('data', 'divisis', 'divisiId', 'pendaftars'));
        } else {
            return view('nilai-management.hasil-akhir.index', compact('divisis', 'divisiId'))
                ->with('message', 'Silahkan pilih divisi terlebih dahulu.');
        }
    }




    private function convertNilaiToLabel($nilai)
    {
        if ($nilai >= 90) {
            return 'Excellent';
        } elseif ($nilai >= 75) {
            return 'Good';
        } elseif ($nilai >= 60) {
            return 'Average';
        } else {
            return 'Poor';
        }
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    }
}
