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

        if ($divisiId) {
            $pendaftars = Pendaftar::with('user', 'divisi')->where('divisi_id', $divisiId)->get();
            $data = [];
            $weights = []; // Define weights here as dummy static weights, ensure sum = 1
            $wawancaraWeight = 0.20; // Define the weight for nilai wawancara

            // Assign weights based on divisiId
            switch ($divisiId) {
                case 1: // Backend
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
                case 2: // Frontend
                    $weights = [
                        'kriteria_1' => 0.15,
                        'kriteria_2' => 0.15,
                        'kriteria_3' => 0.10,
                        'kriteria_4' => 0.10,
                        'kriteria_5' => 0.20,
                        'kriteria_6' => 0.10,
                        'nilai_wawancara' => $wawancaraWeight,
                    ];
                    break;
                case 3: // Mobile Development
                    $weights = [
                        'kriteria_1' => 0.10,
                        'kriteria_2' => 0.10,
                        'kriteria_3' => 0.15,
                        'kriteria_4' => 0.15,
                        'kriteria_5' => 0.15,
                        'kriteria_6' => 0.15,
                        'nilai_wawancara' => $wawancaraWeight,
                    ];
                    break;
                case 4: // Data Science
                    $weights = [
                        'kriteria_1' => 0.14,
                        'kriteria_2' => 0.14,
                        'kriteria_3' => 0.14,
                        'kriteria_4' => 0.14,
                        'kriteria_5' => 0.14,
                        'kriteria_6' => 0.10,
                        'nilai_wawancara' => $wawancaraWeight,
                    ];
                    break;
                case 5: // UI/UX
                    $weights = [
                        'kriteria_1' => 0.20,
                        'kriteria_2' => 0.10,
                        'kriteria_3' => 0.10,
                        'kriteria_4' => 0.10,
                        'kriteria_5' => 0.10,
                        'kriteria_6' => 0.20,
                        'nilai_wawancara' => $wawancaraWeight,
                    ];
                    break;
                    // Add more cases as needed...
                default:
                    $weights = [];
                    break;
            }

            // Retrieve all NilaiPendaftar records for the given divisi_id
            $allNilaiPendaftar = NilaiPendaftar::whereIn('pendaftar_id', $pendaftars->pluck('id'))->get();

            // Determine the maximum value for each criterion
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
                        case 1: // Backend
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
                        case 2: // Frontend
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
                        case 3: // Mobile Development
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
                        case 4: // Data Science
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
                        case 5: // UI/UX
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
                            // Add more cases as needed...
                        default:
                            $kriteria = [];
                            break;
                    }

                    // Normalize criteria values
                    $normalizedKriteria = [];
                    foreach ($kriteria as $key => $value) {
                        if ($value !== null && $maxValues[$key] > 0) {
                            $normalizedKriteria[$key] = $value / $maxValues[$key];
                        } else {
                            $normalizedKriteria[$key] = 0; // Default to 0 if max value is 0 to avoid division by zero
                        }
                    }

                    // Calculate weighted sum
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

            // Sort data by score in descending order
            usort($data, function ($a, $b) {
                return $b['score'] <=> $a['score'];
            });

            // Add ranking
            $rank = 1;
            $hasil = [];
            foreach ($data as &$item) {
                $item['rank'] = $rank++;
                $hasil[] = [
                    'pendaftar_id' => $item['pendaftar']->id,
                ];
            }

            // Check if the same result already exists in the database
            $existingRecord = SimpanHasilAkhir::where('hasil', json_encode($hasil))->first();

            if (!$existingRecord) {
                // Save the ranking result to the database if it doesn't already exist
                SimpanHasilAkhir::create([
                    'status' => 'Belum Selesai',
                    'hasil' => json_encode($hasil),
                ]);
            }

            return view('nilai-management.hasil-akhir.index', compact('data', 'divisis', 'divisiId'));
        } else {
            return view('nilai-management.hasil-akhir.index', compact('divisis', 'divisiId'))->with('message', 'Silahkan pilih divisi terlebih dahulu.');
        }
    }







    // Convert numeric nilai to label
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
