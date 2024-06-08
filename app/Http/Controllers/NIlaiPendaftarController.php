<?php

namespace App\Http\Controllers;

use App\Models\NilaiPendaftar;
use App\Http\Requests\StoreNIlaiPendaftarRequest;
use App\Http\Requests\UpdateNIlaiPendaftarRequest;
use App\Models\DivisiMentor;
use App\Models\JawabanPendaftar;
use App\Models\ListWawancara;
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

        if ($divisiMentors->isEmpty()) {
            return redirect()->back()->withErrors(['error' => 'Mentor does not have an associated division.']);
        }

        $divisiId = $request->input('divisi_id', $divisiMentors->first()->divisi_id);

        $pendaftars = Pendaftar::where('divisi_id', $divisiId)->get();
        $data = [];

        foreach ($pendaftars as $pendaftar) {
            $nilai = NilaiPendaftar::where('pendaftar_id', $pendaftar->id)->first();
            $listWawancara = ListWawancara::where('pendaftar_id', $pendaftar->id)->first();
            $nilaiWawancara = NilaiWawancaraPendaftar::where('pendaftar_id', $pendaftar->id)->first();

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
                    'wawancara_selesai' => $listWawancara && $listWawancara->status === 'Selesai',
                    'nilai_wawancara' => $nilaiWawancara ? $nilaiWawancara->nilai_wawancara : null,
                    'status_wawancara' => $nilaiWawancara && $nilaiWawancara->status === 'Sudah Dinilai',
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

        $pendaftarIds = JawabanPendaftar::with('soalPendaftar.pendaftar')
            ->whereHas('soalPendaftar', function ($query) use ($divisiId) {
                $query->whereHas('pendaftar', function ($subQuery) use ($divisiId) {
                    $subQuery->where('divisi_id', $divisiId);
                });
            })
            ->pluck('soal_pendaftar_id');

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
            $messages["$field.string"] = 'Field ini harus berupa string.';
        }

        $request->validate(array_merge([
            'pendaftar_id' => 'required|exists:pendaftars,id',
            'divisi_id' => 'required|exists:divisis,id',
        ], array_fill_keys($criteriaFields, 'required|string')), $messages);

        $nilai = new NilaiPendaftar();
        $nilai->pendaftar_id = $request->pendaftar_id;
        $nilai->status = 'Sudah Dinilai';

        foreach ($criteriaFields as $field) {
            $nilai->{$field} = $this->convertToNumeric($request->input($field));
        }

        $nilai->save();

        return redirect()->route('list-nilai.index', ['divisi_id' => $request->divisi_id])
            ->with('success', 'Nilai pendaftar berhasil ditambahkan.');
    }

    private function convertToNumeric($value)
    {
        switch ($value) {
            case 'kurang':
                return 60;
            case 'cukup':
                return 70;
            case 'memuaskan':
                return 80;
            case 'baik sekali':
                return 90;
            case 'luar biasa':
                return 100;
            default:
                return null;
        }
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

        // Mapping nilai to kriteria labels
        $kriteriaLabels = [
            60 => 'kurang',
            70 => 'cukup',
            80 => 'memuaskan',
            90 => 'baik sekali',
            100 => 'luar biasa'
        ];

        // Convert numeric values to kriteria labels
        foreach ($listNilai->getAttributes() as $key => $value) {
            if (strpos($key, 'kriteria_') !== false) {
                if (array_key_exists($value, $kriteriaLabels)) {
                    $listNilai->{$key} = $kriteriaLabels[$value];
                }
            }
        }

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
        })->with('user')->get();

        return view('nilai-management.list-nilai.edit', compact('listNilai', 'pendaftars', 'divisiId'));
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
                    'kriteria_1' => 'nullable|string',
                    'kriteria_2' => 'nullable|string',
                    'kriteria_3' => 'nullable|string',
                    'kriteria_4' => 'nullable|string',
                    'kriteria_5' => 'nullable|string',
                    'kriteria_6' => 'nullable|string',
                ];
                break;
            case 2: // Frontend
                $criteriaFields = [
                    'kriteria_7' => 'nullable|string',
                    'kriteria_8' => 'nullable|string',
                    'kriteria_9' => 'nullable|string',
                    'kriteria_10' => 'nullable|string',
                    'kriteria_11' => 'nullable|string',
                ];
                break;
            case 3: // Mobile Development
                $criteriaFields = [
                    'kriteria_12' => 'nullable|string',
                    'kriteria_13' => 'nullable|string',
                    'kriteria_14' => 'nullable|string',
                    'kriteria_15' => 'nullable|string',
                ];
                break;
            case 4: // UI/UX
                $criteriaFields = [
                    'kriteria_16' => 'nullable|string',
                    'kriteria_17' => 'nullable|string',
                    'kriteria_18' => 'nullable|string',
                    'kriteria_19' => 'nullable|string',
                    'kriteria_20' => 'nullable|string',
                    'kriteria_21' => 'nullable|string',
                ];
                break;
            case 5: // System Analyst
                $criteriaFields = [
                    'kriteria_22' => 'nullable|string',
                    'kriteria_23' => 'nullable|string',
                    'kriteria_24' => 'nullable|string',
                    'kriteria_25' => 'nullable|string',
                    'kriteria_26' => 'nullable|string',
                    'kriteria_27' => 'nullable|string',
                ];
                break;
            case 6: // Management
                $criteriaFields = [
                    'kriteria_28' => 'nullable|string',
                    'kriteria_29' => 'nullable|string',
                    'kriteria_30' => 'nullable|string',
                    'kriteria_31' => 'nullable|string',
                    'kriteria_32' => 'nullable|string',
                    'kriteria_33' => 'nullable|string',
                    'kriteria_34' => 'nullable|string',
                ];
                break;
            case 7: // Media & Advertising
                $criteriaFields = [
                    'kriteria_35' => 'nullable|string',
                    'kriteria_36' => 'nullable|string',
                    'kriteria_37' => 'nullable|string',
                    'kriteria_38' => 'nullable|string',
                    'kriteria_39' => 'nullable|string',
                    'kriteria_40' => 'nullable|string',
                ];
                break;
            case 8: // Icon and Illustration
                $criteriaFields = [
                    'kriteria_41' => 'nullable|string',
                    'kriteria_42' => 'nullable|string',
                    'kriteria_43' => 'nullable|string',
                    'kriteria_44' => 'nullable|string',
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

        // Assign criteria values dynamically with condition
        foreach ($criteriaFields as $field => $rules) {
            $nilai->{$field} = $this->convertToNumeric($request->input($field));
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
