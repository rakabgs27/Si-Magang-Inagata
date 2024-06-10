<?php

namespace App\Http\Controllers;

use App\Models\DivisiMentor;
use App\Models\ListPengumuman;
use App\Models\ListWawancara;
use App\Models\Pendaftar;
use App\Models\SimpanHasilAkhir;
use Illuminate\Http\Request;

class ListPengumumanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pendaftarIds = SimpanHasilAkhir::select('hasil')->get()->flatMap(function ($item) {
            return collect(json_decode($item->hasil))->pluck('pendaftar_id');
        });

        $existingPendaftarIds = ListPengumuman::pluck('id_pendaftar')->toArray();
        $filteredPendaftarIds = $pendaftarIds->diff($existingPendaftarIds);
        $pendaftars = Pendaftar::whereIn('id', $filteredPendaftarIds)->with('user')->get();

        $listPengumuman = ListPengumuman::with(['pendaftar.user', 'pendaftar.divisi'])->paginate(10);

        if ($filteredPendaftarIds->isEmpty()) {
            $simpanHasilAkhirRecords = SimpanHasilAkhir::all();
            foreach ($simpanHasilAkhirRecords as $record) {
                $hasil = collect(json_decode($record->hasil));
                if ($hasil->pluck('pendaftar_id')->diff($existingPendaftarIds)->isEmpty()) {
                    $record->update(['status' => 'Sudah Selesai']);
                }
            }
        }

        return view('pengumuman-management.list-pengumuman.index', compact('pendaftars', 'listPengumuman'));
    }


    public function cetakPengumuman(){

        return view('pengumuman-management.cetak-pengumuman.index');
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
        // Define validation rules
        $rules = [
            'pendaftar' => 'required|array',
            'pendaftar.*' => 'exists:pendaftars,id',
            'status' => 'required|in:Tidak Lolos,Lolos',
        ];

        // Define custom error messages (optional)
        $messages = [
            'pendaftar.required' => 'Field pendaftar wajib diisi.',
            'pendaftar.array' => 'Field pendaftar harus berupa array.',
            'pendaftar.*.exists' => 'Pendaftar yang dipilih tidak valid.',
            'status.required' => 'Field status wajib diisi.',
            'status.in' => 'Status yang dipilih tidak valid.',
        ];

        // Validate the request
        $validated = $request->validate($rules, $messages);

        // Extract validated data
        $pendaftarIds = $validated['pendaftar'];
        $status = $validated['status'];

        // Check if $pendaftarIds is an array and not empty
        if (is_array($pendaftarIds) && !empty($pendaftarIds)) {
            // Create listPengumuman entries
            foreach ($pendaftarIds as $pendaftarId) {
                ListPengumuman::create([
                    'id_pendaftar' => $pendaftarId,
                    'status' => $status,
                ]);
            }
        } else {
            // Handle the case where no valid pendaftar is selected
            return redirect()->route('list-pengumuman.index')->with('error', 'Pendaftar tidak valid.');
        }

        return redirect()->route('list-pengumuman.index')->with('success', 'Pengumuman berhasil ditambahkan.');
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
