<?php

namespace App\Http\Controllers;

use App\Models\ListWawancara;
use App\Http\Requests\StoreListWawancaraRequest;
use App\Http\Requests\UpdateListWawancaraRequest;
use App\Models\Divisi;
use App\Models\DivisiMentor;
use App\Models\NilaiPendaftar;
use App\Models\User;
use Illuminate\Http\Request;


class ListWawancaraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pendaftarNameSearch = $request->input('name');

        $listWawancara = ListWawancara::with(['pendaftar.user', 'divisiMentor'])
            ->when($pendaftarNameSearch, function ($query, $pendaftarNameSearch) {
                return $query->whereHas('pendaftar.user', function ($subQuery) use ($pendaftarNameSearch) {
                    $subQuery->where('name', 'like', '%' . $pendaftarNameSearch . '%');
                });
            })->paginate(10);

        return view('wawancara-management.list-wawancara.index', [
            'listWawancara' => $listWawancara,
            'pendaftarNameSearch' => $pendaftarNameSearch,
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Ambil semua divisi
        $divisi = Divisi::all();

        return view('wawancara-management.list-wawancara.create', compact('divisi'));
    }

    public function getMentorsByDivisi(Request $request)
    {
        $mentors = DivisiMentor::where('divisi_id', $request->divisi_id)
            ->with('user')
            ->get()
            ->pluck('user');

        return response()->json(['mentors' => $mentors]);
    }


    public function getPendaftarByDivisi(Request $request)
    {
        $pendaftarSudahDinilai = NilaiPendaftar::where('status', 'Sudah Dinilai')
            ->whereHas('pendaftar.divisi', function ($query) use ($request) {
                $query->where('divisi_id', $request->divisi_id);
            })
            ->with('pendaftar.user')
            ->get()
            ->map(function ($nilaiPendaftar) {
                return [
                    'id' => $nilaiPendaftar->pendaftar->id,
                    'name' => $nilaiPendaftar->pendaftar->user->name,
                ];
            });

        return response()->json(['pendaftar' => $pendaftarSudahDinilai]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreListWawancaraRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreListWawancaraRequest $request)
    {
        $validated = $request->validated();

        // Mendapatkan divisi_mentor_id berdasarkan divisi_id dan mentor_id
        $divisiMentor = DivisiMentor::where('divisi_id', $validated['divisi'])
            ->where('user_id', $validated['mentor'])
            ->first();

        if (!$divisiMentor) {
            return redirect()->back()->with('error', 'Divisi Mentor tidak ditemukan.');
        }

        $listWawancara = ListWawancara::create([
            'pendaftar_id' => $validated['pendaftar'],
            'divisi_mentor_id' => $divisiMentor->id,
            'deskripsi' => $validated['deskripsi'],
            'tanggal_wawancara' => $validated['tanggal_wawancara'],
            'status' => 'Belum Selesai',
        ]);

        return redirect()->route('list-wawancara.index')->with('success', 'Wawancara berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ListWawancara  $listWawancara
     * @return \Illuminate\Http\Response
     */
    public function show(ListWawancara $listWawancara)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ListWawancara  $listWawancara
     * @return \Illuminate\Http\Response
     */
    public function edit(ListWawancara $listWawancara)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateListWawancaraRequest  $request
     * @param  \App\Models\ListWawancara  $listWawancara
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateListWawancaraRequest $request, ListWawancara $listWawancara)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ListWawancara  $listWawancara
     * @return \Illuminate\Http\Response
     */
    public function destroy(ListWawancara $listWawancara)
    {
        //
    }
}
