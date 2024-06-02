<?php

namespace App\Http\Controllers;

use App\Models\NilaiPendaftar;
use App\Http\Requests\StoreNIlaiPendaftarRequest;
use App\Http\Requests\UpdateNIlaiPendaftarRequest;
use App\Models\DivisiMentor;
use App\Models\JawabanPendaftar;
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

        if ($divisiMentors->isEmpty()) {
            return redirect()->back()->withErrors(['error' => 'Mentor does not have an associated division.']);
        }

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
                            'kriteria_45' => $nilai->kriteria_45,
                            'kriteria_46' => $nilai->kriteria_46,
                        ];
                        break;
                    default:
                        $kriteria = [];
                        break;
                }

                $data[] = [
                    'pendaftar' => $pendaftar,
                    'kriteria' => $kriteria,
                    'status' => $nilai->status,
                ];
            }
        }

        return view('nilai-management.list-nilai.index', compact('data', 'divisiMentors', 'divisiId'));
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

        // Retrieve Pendaftar IDs who have submitted their answers based on the divisi ID
        $pendaftarIds = JawabanPendaftar::with('soalPendaftar.pendaftar')
            ->whereHas('soalPendaftar', function ($query) use ($divisiId) {
                $query->whereHas('pendaftar', function ($subQuery) use ($divisiId) {
                    $subQuery->where('divisi_id', $divisiId);
                });
            })
            ->pluck('soal_pendaftar_id');

        // Retrieve Pendaftars based on the IDs
        $pendaftars = Pendaftar::whereIn('id', function ($query) use ($pendaftarIds) {
            $query->select('pendaftar_id')
                ->from('soal_pendaftars')
                ->whereIn('id', $pendaftarIds);
        })->get();

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
        $request->validate([
            'pendaftar_id' => 'required|exists:pendaftars,id',
            'divisi_id' => 'required|exists:divisis,id',
        ]);

        // Determine the criteria fields to validate based on the division
        $criteriaFields = [];
        switch ($request->divisi_id) {
            case 1: // Backend
                $criteriaFields = [
                    'kriteria_1' => 'nullable|numeric',
                    'kriteria_2' => 'nullable|numeric',
                    'kriteria_3' => 'nullable|numeric',
                    'kriteria_4' => 'nullable|numeric',
                    'kriteria_5' => 'nullable|numeric',
                    'kriteria_6' => 'nullable|numeric',
                ];
                break;
            case 2: // Frontend
                $criteriaFields = [
                    'kriteria_7' => 'nullable|numeric',
                    'kriteria_8' => 'nullable|numeric',
                    'kriteria_9' => 'nullable|numeric',
                    'kriteria_10' => 'nullable|numeric',
                    'kriteria_11' => 'nullable|numeric',
                ];
                break;
            case 3: // Mobile Development
                $criteriaFields = [
                    'kriteria_12' => 'nullable|numeric',
                    'kriteria_13' => 'nullable|numeric',
                    'kriteria_14' => 'nullable|numeric',
                    'kriteria_15' => 'nullable|numeric',
                ];
                break;
            case 4: // UI/UX
                $criteriaFields = [
                    'kriteria_16' => 'nullable|numeric',
                    'kriteria_17' => 'nullable|numeric',
                    'kriteria_18' => 'nullable|numeric',
                    'kriteria_19' => 'nullable|numeric',
                    'kriteria_20' => 'nullable|numeric',
                    'kriteria_21' => 'nullable|numeric',
                ];
                break;
            case 5: // System Analyst
                $criteriaFields = [
                    'kriteria_22' => 'nullable|numeric',
                    'kriteria_23' => 'nullable|numeric',
                    'kriteria_24' => 'nullable|numeric',
                    'kriteria_25' => 'nullable|numeric',
                    'kriteria_26' => 'nullable|numeric',
                    'kriteria_27' => 'nullable|numeric',
                ];
                break;
            case 6: // Management
                $criteriaFields = [
                    'kriteria_28' => 'nullable|numeric',
                    'kriteria_29' => 'nullable|numeric',
                    'kriteria_30' => 'nullable|numeric',
                    'kriteria_31' => 'nullable|numeric',
                    'kriteria_32' => 'nullable|numeric',
                    'kriteria_33' => 'nullable|numeric',
                    'kriteria_34' => 'nullable|numeric',
                ];
                break;
            case 7: // Media & Advertising
                $criteriaFields = [
                    'kriteria_35' => 'nullable|numeric',
                    'kriteria_36' => 'nullable|numeric',
                    'kriteria_37' => 'nullable|numeric',
                    'kriteria_38' => 'nullable|numeric',
                    'kriteria_39' => 'nullable|numeric',
                    'kriteria_40' => 'nullable|numeric',
                ];
                break;
            case 8: // Icon and Illustration
                $criteriaFields = [
                    'kriteria_41' => 'nullable|numeric',
                    'kriteria_42' => 'nullable|numeric',
                    'kriteria_43' => 'nullable|numeric',
                    'kriteria_44' => 'nullable|numeric',
                    'kriteria_45' => 'nullable|numeric',
                    'kriteria_46' => 'nullable|numeric',
                ];
                break;
            default:
                $criteriaFields = [];
                break;
        }

        $request->validate($criteriaFields);

        $nilai = new NilaiPendaftar();
        $nilai->pendaftar_id = $request->pendaftar_id;
        $nilai->status = 'Sudah Dinilai';

        // Assign criteria values dynamically
        foreach ($criteriaFields as $field => $rules) {
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
