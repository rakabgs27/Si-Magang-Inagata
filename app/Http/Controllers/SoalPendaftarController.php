<?php

namespace App\Http\Controllers;

use App\Models\SoalPendaftar;
use App\Http\Requests\StoreSoalPendaftarRequest;
use App\Http\Requests\UpdateSoalPendaftarRequest;
use App\Models\Divisi;
use App\Models\FileMateri;
use App\Models\JawabanPendaftar;
use App\Models\Pendaftar;
use App\Models\Soal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class SoalPendaftarController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:assign-soal.index')->only('index');
        $this->middleware('permission:assign-soal.create')->only('create', 'store');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $namaUserSearch = $request->input('name');

        try {
            $listSoalPendaftar = SoalPendaftar::with([
                'soal',
                'pendaftar.user' => function ($query) use ($namaUserSearch) {
                    if (!empty($namaUserSearch)) {
                        $query->where('name', 'like', '%' . $namaUserSearch . '%');
                    }
                }
            ])->whereHas('pendaftar.user', function ($query) use ($namaUserSearch) {
                if (!empty($namaUserSearch)) {
                    $query->where('name', 'like', '%' . $namaUserSearch . '%');
                }
            })->paginate(10);
        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan saat mengambil data.');
        }

        return view('soal-management.assign-soal.index', [
            'listSoalPendaftar' => $listSoalPendaftar,
            'namaUserSearch' => $namaUserSearch,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $listPendaftar = Pendaftar::with('user')->get();
        $listDivisi = Divisi::all();

        return view('soal-management.assign-soal.create', [
            'listPendaftar' => $listPendaftar,
            'listDivisi' => $listDivisi,
        ]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSoalPendaftarRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSoalPendaftarRequest $request)
    {
        $pendaftarIds = $request->pendaftar_id;
        foreach ($pendaftarIds as $pendaftarId) {
            SoalPendaftar::create([
                'pendaftar_id' => $pendaftarId,
                'soal_id' => $request->soal_id,
                'deskripsi_tugas' => $request->deskripsi_tugas,
                'tanggal_mulai' => $request->tanggal_mulai,
                'tanggal_akhir' => $request->tanggal_akhir,
                'status' => 'Sedang Dikerjakan'
            ]);
        }

        return redirect()->route('assign-soal.index')->with('success', 'Soal berhasil diassign.');
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SoalPendaftar  $soalPendaftar
     * @return \Illuminate\Http\Response
     */
    public function show(SoalPendaftar $assignSoal)
    {
        try {
            $soal = SoalPendaftar::with(['soal.divisi', 'pendaftar.user'])->findOrFail($assignSoal->id)->soal;

            $files = FileMateri::where('soal_id', $soal->id)->get();

            $fileData = $files->map(function ($file) {
                $fileName = basename($file->files);
                return [
                    'url' => Storage::url($file->files),
                    'name' => $fileName
                ];
            });

            return view('soal-management.assign-soal.show', compact('assignSoal', 'soal', 'fileData'));
        } catch (\Exception $e) {
            return redirect()->route('assign-soal.index')->with('error', 'Gagal Untuk Mengambil Data Assign Soal: ' . $e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SoalPendaftar  $soalPendaftar
     * @return \Illuminate\Http\Response
     */
    public function edit(SoalPendaftar $soalPendaftar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSoalPendaftarRequest  $request
     * @param  \App\Models\SoalPendaftar  $soalPendaftar
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSoalPendaftarRequest $request, SoalPendaftar $soalPendaftar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SoalPendaftar  $soalPendaftar
     * @return \Illuminate\Http\Response
     */
    public function destroy(SoalPendaftar $assignSoal)
    {
        try {

            JawabanPendaftar::where('soal_pendaftar_id', $assignSoal->id)->delete();

            $assignSoal->delete();

            return redirect()->route('assign-soal.index')->with('success', 'Assign Soal berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->route('assign-soal.index')->with('error', 'Gagal Menghapus Assign Soal: ' . $e->getMessage());
        }
    }

    public function getSoalByDivisiPendaftar($pendaftarId)
    {
        $pendaftar = Pendaftar::where('id', $pendaftarId)->first();

        if (!$pendaftar) {
            return response()->json(['error' => 'Pendaftar not found'], 404);
        }

        $soal = Soal::where('divisi_id', $pendaftar->divisi_id)->get();
        return response()->json($soal);
    }

    public function showBySoalId($soalId)
    {
        $files = FileMateri::where('soal_id', $soalId)->get();

        $filesData = $files->map(function ($file) {
            return [
                'id' => $file->id,
                'filename' => $file->files,
                'basename' => pathinfo($file->files, PATHINFO_BASENAME)
            ];
        });

        return response()->json($filesData);
    }

    public function getPendaftarsByDivisi($divisiId)
    {
        $assignedPendaftarIds = SoalPendaftar::pluck('pendaftar_id')->toArray();

        $pendaftars = Pendaftar::where('divisi_id', $divisiId)
            ->whereNotIn('id', $assignedPendaftarIds)
            ->with('user')
            ->get();

        return response()->json(['pendaftars' => $pendaftars]);
    }

    public function updateStatus(Request $request, $id)
    {
        $assignSoal = SoalPendaftar::findOrFail($id);
        $assignSoal->status = 'Selesai Dikerjakan';
        $assignSoal->save();

        return response()->json(['message' => 'Status updated successfully']);
    }
}
