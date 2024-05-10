<?php

namespace App\Http\Controllers;

use App\Models\SoalPendaftar;
use App\Http\Requests\StoreSoalPendaftarRequest;
use App\Http\Requests\UpdateSoalPendaftarRequest;
use App\Models\FileMateri;
use App\Models\Pendaftar;
use App\Models\Soal;
use Illuminate\Http\Request;

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
            \Log::error('Error fetching soal pendaftar: ' . $e->getMessage());
            return back()->with('error', 'Something went wrong.');
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

        return view('soal-management.assign-soal.create', [
            'listPendaftar' => $listPendaftar,
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
        SoalPendaftar::create([
            'pendaftar_id' => $request->pendaftar_id,
            'soal_id' => $request->soal_id,
            'deskripsi_tugas' => $request->deskripsi_tugas,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_akhir' => $request->tanggal_akhir,
        ]);

        return redirect()->route('assign-soal.index')->with('success', 'Soal berhasil diassign.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SoalPendaftar  $soalPendaftar
     * @return \Illuminate\Http\Response
     */
    public function show(SoalPendaftar $soalPendaftar)
    {
        //
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
    public function destroy(SoalPendaftar $soalPendaftar)
    {
        //
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
}
