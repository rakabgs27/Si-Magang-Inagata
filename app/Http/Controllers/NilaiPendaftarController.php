<?php

namespace App\Http\Controllers;

use App\Models\NilaiPendaftar;
use App\Http\Requests\StoreNIlaiPendaftarRequest;
use App\Http\Requests\UpdateNIlaiPendaftarRequest;
use App\Models\DivisiMentor;
use App\Models\JawabanPendaftar;
use App\Models\ListWawancara;
use App\Models\NilaiReviewer;
use App\Models\NilaiWawancaraPendaftar;
use App\Models\Pendaftar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NilaiPendaftarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $userId = Auth::id();
        $divisiMentors = DivisiMentor::where('user_id', $userId)->with('divisi')->get();
        $mentorDivisiId = DivisiMentor::where('user_id', $userId)->first()->divisi_id ?? null;

        if (!$mentorDivisiId) {
            return view('nilai-management.list-nilai.index')->with([
                'mentorDivisiId' => $mentorDivisiId,
                'error' => 'Mentor does not have an associated division.'
            ]);
        }

        $divisiId = $request->input('divisi_id', $divisiMentors->first()->divisi_id);
        $perPage = 10; // Number of items per page
        $page = $request->input('page', 1); // Current page
        $startIndex = ($page - 1) * $perPage; // Start index for numbering

        $nilaiPendaftars = NilaiPendaftar::with('pendaftar.user', 'pendaftar.divisi')
            ->whereHas('pendaftar', function ($query) use ($divisiId) {
                $query->where('divisi_id', $divisiId);
            })->paginate($perPage);

        $data = [];
        foreach ($nilaiPendaftars as $index => $nilai) {
            $pendaftar = $nilai->pendaftar;
            $listWawancara = ListWawancara::where('pendaftar_id', $pendaftar->id)->first();
            $nilaiWawancara = NilaiWawancaraPendaftar::where('pendaftar_id', $pendaftar->id)->first();
            $nilaiReviewer = NilaiReviewer::where('nilai_wawancara_pendaftars_id', $nilaiWawancara->id ?? null)
                ->where('nilai_pendaftars_id', $nilai->id ?? null)
                ->first();

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
                'no' => $startIndex + $index + 1, // Calculate the ongoing numbering
                'pendaftar' => $pendaftar,
                'kriteria' => $kriteria,
                'idNilaiPendaftar' => $nilai->id,
                'status' => $nilai->status,
                'wawancara_selesai' => $listWawancara && $listWawancara->status === 'Selesai',
                'nilai_wawancara' => $nilaiWawancara ? $nilaiWawancara->nilai_wawancara : null,
                'nilai_wawancara_label' => $nilaiWawancara ? $nilaiWawancara->nilai_wawancara : null,
                'status_wawancara_label' => $status_wawancara_label,
                'status_wawancara' => $nilaiWawancara && $nilaiWawancara->status === 'Sudah Dinilai',
                'status_verifikasi_reviewer' => $nilaiReviewer ? $nilaiReviewer->status : 'Belum Diverifikasi',
            ];
        }

        return view('nilai-management.list-nilai.index', compact('data', 'divisiMentors', 'divisiId', 'mentorDivisiId', 'nilaiPendaftars', 'startIndex'));
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


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $userId = Auth::id();
        $divisiMentors = DivisiMentor::where('user_id', $userId)->with('divisi')->get();

        if ($divisiMentors->isEmpty()) {
            return redirect()->back()->withErrors(['error' => 'Mentor does not have an associated division.']);
        }

        $divisiId = $request->input('divisi_id', $divisiMentors->first()->divisi_id);

        // Get IDs of pendaftars who have been evaluated
        $evaluatedPendaftarIds = NilaiPendaftar::where('status', 'Sudah Dinilai')
            ->pluck('pendaftar_id')
            ->toArray();

        // Get IDs of pendaftars who have submitted their answers based on the divisi ID
        $pendaftarIds = JawabanPendaftar::with('soalPendaftar.pendaftar')
            ->whereHas('soalPendaftar', function ($query) use ($divisiId) {
                $query->whereHas('pendaftar', function ($subQuery) use ($divisiId) {
                    $subQuery->where('divisi_id', $divisiId);
                });
            })
            ->pluck('soal_pendaftar_id');

        // Retrieve Pendaftars based on the IDs and filter out the ones already evaluated
        $pendaftars = Pendaftar::with('user')
            ->whereIn('id', function ($query) use ($pendaftarIds) {
                $query->select('pendaftar_id')
                    ->from('soal_pendaftars')
                    ->whereIn('id', $pendaftarIds);
            })
            ->whereNotIn('id', $evaluatedPendaftarIds)
            ->get();

        return view('nilai-management.list-nilai.create', compact('divisiMentors', 'pendaftars', 'divisiId'));
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreNIlaiPendaftarRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
            'pendaftar_id.required' => 'Field pendaftar_id wajib diisi.',
            'pendaftar_id.exists' => 'Field pendaftar_id tidak valid.',
            'divisi_id.required' => 'Field divisi_id wajib diisi.',
            'divisi_id.exists' => 'Field divisi_id tidak valid.',
        ];

        $criteriaFields = [];

        switch ($request->divisi_id) {
            case 1: // Backend
                $criteriaFields = ['kriteria_1', 'kriteria_2', 'kriteria_3', 'kriteria_4', 'kriteria_5', 'kriteria_6'];
                break;
            case 2: // Frontend
                $criteriaFields = ['kriteria_7', 'kriteria_8', 'kriteria_9', 'kriteria_10', 'kriteria_11'];
                break;
            case 3: // Mobile Development
                $criteriaFields = ['kriteria_12', 'kriteria_13', 'kriteria_14', 'kriteria_15'];
                break;
            case 4: // UI/UX
                $criteriaFields = ['kriteria_16', 'kriteria_17', 'kriteria_18', 'kriteria_19', 'kriteria_20', 'kriteria_21'];
                break;
            case 5: // System Analyst
                $criteriaFields = ['kriteria_22', 'kriteria_23', 'kriteria_24', 'kriteria_25', 'kriteria_26', 'kriteria_27'];
                break;
            case 6: // Management
                $criteriaFields = ['kriteria_28', 'kriteria_29', 'kriteria_30', 'kriteria_31', 'kriteria_32', 'kriteria_33', 'kriteria_34'];
                break;
            case 7: // Media & Advertising
                $criteriaFields = ['kriteria_35', 'kriteria_36', 'kriteria_37', 'kriteria_38', 'kriteria_39', 'kriteria_40'];
                break;
            case 8: // Icon and Illustration
                $criteriaFields = ['kriteria_41', 'kriteria_42', 'kriteria_43', 'kriteria_44'];
                break;
            default:
                return redirect()->back()->withErrors(['divisi_id' => 'Divisi tidak valid.']);
        }

        foreach ($criteriaFields as $field) {
            $messages["$field.required"] = 'Field ini wajib diisi untuk divisi ini.';
            $messages["$field.numeric"] = 'Field ini harus berupa angka.';
            $messages["$field.min"] = 'Nilai minimal adalah 0.';
            $messages["$field.max"] = 'Nilai maksimal adalah 100.';
        }

        $request->validate(array_merge([
            'pendaftar_id' => 'required|exists:pendaftars,id',
            'divisi_id' => 'required|exists:divisis,id',
        ], array_fill_keys($criteriaFields, 'required|numeric|min:0|max:100')), $messages);

        $nilai = new NilaiPendaftar();
        $nilai->pendaftar_id = $request->pendaftar_id;
        $nilai->status = 'Sudah Dinilai';

        foreach ($criteriaFields as $field) {
            $nilai->{$field} = $request->input($field);
        }

        $nilai->save();

        return redirect()->route('list-nilai.index', ['divisi_id' => $request->divisi_id])
            ->with('success', 'Nilai pendaftar berhasil ditambahkan.');
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
    public function edit(NilaiPendaftar $listNilai, Request $request)
    {
        $userId = Auth::id();
        $divisiMentors = DivisiMentor::where('user_id', $userId)->with('divisi')->get();

        if ($divisiMentors->isEmpty()) {
            return redirect()->back()->withErrors(['error' => 'Mentor does not have an associated division.']);
        }

        $divisiId = $request->input('divisi_id', $divisiMentors->first()->divisi_id);

        // Retrieve only the selected Pendaftar based on the current NilaiPendaftar
        $pendaftar = Pendaftar::with('user')->find($listNilai->pendaftar_id);

        return view('nilai-management.list-nilai.edit', compact('listNilai', 'pendaftar', 'divisiId'));
    }




    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateNIlaiPendaftarRequest  $request
     * @param  \App\Models\NIlaiPendaftar  $nIlaiPendaftar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'pendaftar_id' => 'required|exists:pendaftars,id',
            'divisi_id' => 'required|exists:divisis,id',
        ]);

        // Determine the criteria fields to validate based on the division
        $criteriaFields = [];
        switch ($request->divisi_id) {
            case 1: // Backend
                $criteriaFields = [
                    'kriteria_1' => 'nullable|numeric|min:60|max:100',
                    'kriteria_2' => 'nullable|numeric|min:60|max:100',
                    'kriteria_3' => 'nullable|numeric|min:60|max:100',
                    'kriteria_4' => 'nullable|numeric|min:60|max:100',
                    'kriteria_5' => 'nullable|numeric|min:60|max:100',
                    'kriteria_6' => 'nullable|numeric|min:60|max:100',
                ];
                break;
            case 2: // Frontend
                $criteriaFields = [
                    'kriteria_7' => 'nullable|numeric|min:60|max:100',
                    'kriteria_8' => 'nullable|numeric|min:60|max:100',
                    'kriteria_9' => 'nullable|numeric|min:60|max:100',
                    'kriteria_10' => 'nullable|numeric|min:60|max:100',
                    'kriteria_11' => 'nullable|numeric|min:60|max:100',
                ];
                break;
            case 3: // Mobile Development
                $criteriaFields = [
                    'kriteria_12' => 'nullable|numeric|min:60|max:100',
                    'kriteria_13' => 'nullable|numeric|min:60|max:100',
                    'kriteria_14' => 'nullable|numeric|min:60|max:100',
                    'kriteria_15' => 'nullable|numeric|min:60|max:100',
                ];
                break;
            case 4: // UI/UX
                $criteriaFields = [
                    'kriteria_16' => 'nullable|numeric|min:60|max:100',
                    'kriteria_17' => 'nullable|numeric|min:60|max:100',
                    'kriteria_18' => 'nullable|numeric|min:60|max:100',
                    'kriteria_19' => 'nullable|numeric|min:60|max:100',
                    'kriteria_20' => 'nullable|numeric|min:60|max:100',
                    'kriteria_21' => 'nullable|numeric|min:60|max:100',
                ];
                break;
            case 5: // System Analyst
                $criteriaFields = [
                    'kriteria_22' => 'nullable|numeric|min:60|max:100',
                    'kriteria_23' => 'nullable|numeric|min:60|max:100',
                    'kriteria_24' => 'nullable|numeric|min:60|max:100',
                    'kriteria_25' => 'nullable|numeric|min:60|max:100',
                    'kriteria_26' => 'nullable|numeric|min:60|max:100',
                    'kriteria_27' => 'nullable|numeric|min:60|max:100',
                ];
                break;
            case 6: // Management
                $criteriaFields = [
                    'kriteria_28' => 'nullable|numeric|min:60|max:100',
                    'kriteria_29' => 'nullable|numeric|min:60|max:100',
                    'kriteria_30' => 'nullable|numeric|min:60|max:100',
                    'kriteria_31' => 'nullable|numeric|min:60|max:100',
                    'kriteria_32' => 'nullable|numeric|min:60|max:100',
                    'kriteria_33' => 'nullable|numeric|min:60|max:100',
                    'kriteria_34' => 'nullable|numeric|min:60|max:100',
                ];
                break;
            case 7: // Media & Advertising
                $criteriaFields = [
                    'kriteria_35' => 'nullable|numeric|min:60|max:100',
                    'kriteria_36' => 'nullable|numeric|min:60|max:100',
                    'kriteria_37' => 'nullable|numeric|min:60|max:100',
                    'kriteria_38' => 'nullable|numeric|min:60|max:100',
                    'kriteria_39' => 'nullable|numeric|min:60|max:100',
                    'kriteria_40' => 'nullable|numeric|min:60|max:100',
                ];
                break;
            case 8: // Icon and Illustration
                $criteriaFields = [
                    'kriteria_41' => 'nullable|numeric|min:60|max:100',
                    'kriteria_42' => 'nullable|numeric|min:60|max:100',
                    'kriteria_43' => 'nullable|numeric|min:60|max:100',
                    'kriteria_44' => 'nullable|numeric|min:60|max:100',
                ];
                break;
            default:
                $criteriaFields = [];
                break;
        }

        $request->validate($criteriaFields);

        $nilai = NilaiPendaftar::findOrFail($id);
        $nilai->pendaftar_id = $request->pendaftar_id;
        $nilai->status = 'Sudah Dinilai';

        // Assign criteria values dynamically
        foreach ($criteriaFields as $field => $rules) {
            $nilai->{$field} = $request->input($field);
        }

        $nilai->save();

        return redirect()->route('list-nilai.index', ['divisi_id' => $request->divisi_id])
            ->with('success', 'Nilai pendaftar berhasil diperbarui.');
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
