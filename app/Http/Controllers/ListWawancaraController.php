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
use Illuminate\Support\Facades\Log;

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
        $user = auth()->user();
        $mentorId = $user->divisiMentor ? $user->divisiMentor->pluck('id')->toArray() : null;

        $listWawancara = ListWawancara::with(['pendaftar.user', 'divisiMentor'])
            ->when($pendaftarNameSearch, function ($query, $pendaftarNameSearch) {
                return $query->whereHas('pendaftar.user', function ($subQuery) use ($pendaftarNameSearch) {
                    $subQuery->where('name', 'like', '%' . $pendaftarNameSearch . '%');
                });
            })
            ->when($mentorId, function ($query) use ($mentorId) {
                return $query->whereIn('divisi_mentor_id', $mentorId);
            })
            ->paginate(10);

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

        ListWawancara::create([
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
        $divisi = Divisi::all();

        $mentors = DivisiMentor::where('divisi_id', $listWawancara->pendaftar->divisi_id)
            ->with('user')
            ->get()
            ->map(function ($divisiMentor) {
                return [
                    'id' => $divisiMentor->id,
                    'name' => $divisiMentor->user->name,
                ];
            });

        $pendaftarSudahDinilai = NilaiPendaftar::where('status', 'Sudah Dinilai')
            ->whereHas('pendaftar.divisi', function ($query) use ($listWawancara) {
                $query->where('divisi_id', $listWawancara->pendaftar->divisi_id);
            })
            ->with('pendaftar.user')
            ->get()
            ->map(function ($nilaiPendaftar) {
                return [
                    'id' => $nilaiPendaftar->pendaftar->id,
                    'name' => $nilaiPendaftar->pendaftar->user->name,
                ];
            });

        return view('wawancara-management.list-wawancara.edit', compact('listWawancara', 'divisi', 'mentors', 'pendaftarSudahDinilai'));
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
        try {
            $validatedData = $request->validated();

            $listWawancara->pendaftar_id = $validatedData['pendaftar'];
            $listWawancara->divisi_mentor_id = $validatedData['mentor'];
            $listWawancara->deskripsi = $validatedData['deskripsi'];
            $listWawancara->tanggal_wawancara = $validatedData['tanggal_wawancara'];

            $listWawancara->save();

            return redirect()->route('list-wawancara.index')->with('success', 'Data Wawancara berhasil diperbarui');
        } catch (\Exception $e) {
            Log::error('Update failed: ' . $e->getMessage());

            return redirect()->route('list-wawancara.edit', $listWawancara->id)->with('error', 'Terjadi kesalahan saat memperbarui data');
        }
    }

    public function getEditMentorsByDivisi(Request $request)
    {
        $mentors = DivisiMentor::where('divisi_id', $request->divisi_id)
            ->with('user')
            ->get()
            ->map(function ($divisiMentor) {
                return [
                    'id' => $divisiMentor->id,
                    'name' => $divisiMentor->user->name,
                ];
            });

        return response()->json(['mentors' => $mentors]);
    }

    public function getEditPendaftarByDivisi(Request $request)
    {
        $pendaftarSudahDinilai = NilaiPendaftar::where('status', 'Sudah Dinilai')
            ->whereHas('pendaftar', function ($query) use ($request) {
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
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ListWawancara  $listWawancara
     * @return \Illuminate\Http\Response
     */
    public function destroy(ListWawancara $listWawancara)
    {
        try {
            $listWawancara->delete();

            return redirect()->route('list-wawancara.index')->with('success', 'Data wawancara berhasil dihapus.');
        } catch (\Exception $e) {
            \Log::error('Error deleting ListWawancara: ' . $e->getMessage());

            return redirect()->route('list-wawancara.index')->with('error', 'Terjadi kesalahan saat menghapus data.');
        }
    }

    public function updateStatus(Request $request, $id)
    {
        $listWawancara = ListWawancara::findOrFail($id);
        $listWawancara->status = 'Selesai';
        $listWawancara->save();

        return response()->json(['message' => 'Status updated successfully']);
    }
}
