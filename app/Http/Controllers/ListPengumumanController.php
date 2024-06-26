<?php

namespace App\Http\Controllers;

use App\Models\ListPengumuman;
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

        $statusSimpan = true;

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

        if ($pendaftars->isEmpty()) {
            $statusSimpan = false;
        }


        return view('pengumuman-management.list-pengumuman.index', compact('pendaftars', 'listPengumuman', 'statusSimpan'));
    }


    public function cetakPengumuman()
    {
        $hasilAkhirPengumuman = SimpanHasilAkhir::where('status', 'Sudah Selesai')->paginate(10);
        return view('pengumuman-management.cetak-pengumuman.index')->with([
            'hasilAkhirPengumuman' => $hasilAkhirPengumuman,
        ]);
    }

    public function showCetakPengumuman($id)
    {
        $pendaftarIds = SimpanHasilAkhir::select('hasil')->where('id', $id)->get()->flatMap(function ($item) {
            return collect(json_decode($item->hasil))->pluck('pendaftar_id');
        });
        $listPengumuman = ListPengumuman::with(['pendaftar.user', 'pendaftar.divisi'])->whereIn('id_pendaftar', $pendaftarIds)->get();


        $simpanHasilAkhirRecords = SimpanHasilAkhir::where('id', $id)->first();

        return view('pengumuman-management.cetak-pengumuman.show')->with([
            'listPengumuman' => $listPengumuman,
            'simpanHasilAkhirRecords' => $simpanHasilAkhirRecords,
        ]);
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
        $totalCount = SimpanHasilAkhir::select('hasil')->where('status', '=', 'Belum Selesai')->get()->flatMap(function ($item) {
            return collect(json_decode($item->hasil));
        })->count();

        $rules = [
            'rank_start' => [
                'required',
                'integer',
                function ($attribute, $value, $fail) {
                    if ($value != 0 && $value != 1) {
                        $fail('Rank start hanya boleh bernilai 0 atau 1.');
                    }
                }
            ],
            'rank_end' => [
                'required',
                'integer',
                'min:0',
                function ($attribute, $value, $fail) use ($request, $totalCount) {
                    if ($request->rank_start == 0 && $value != 0) {
                        $fail('Jika rank start adalah 0, maka rank end harus 0.');
                    }
                    if ($request->rank_start == 1 && ($value < 1 || $value > $totalCount)) {
                        $fail("Rank end harus antara 1 dan $totalCount jika rank start adalah 1.");
                    }
                    if ($value < $request->rank_start) {
                        $fail('Rank end harus lebih besar atau sama dengan rank start.');
                    }
                },
            ],
        ];

        $messages = [
            'rank_start.required' => 'Field rank start wajib diisi.',
            'rank_end.required' => 'Field rank end wajib diisi.',
        ];

        $validated = $request->validate($rules, $messages);

        // Kondisi khusus untuk rank start 1 dan rank end 1
        if ($validated['rank_start'] == 1 && $validated['rank_end'] == 1) {
            $pendaftarIds = SimpanHasilAkhir::select('hasil')->where('status', '=', 'Belum Selesai')->get()->flatMap(function ($item) {
                return collect(json_decode($item->hasil))->filter(function ($item) {
                    return $item->rank == 1;
                })->pluck('pendaftar_id');
            });

            foreach ($pendaftarIds as $pendaftarId) {
                ListPengumuman::create([
                    'id_pendaftar' => $pendaftarId,
                    'status' => 'Lolos',
                ]);
            }

            // Sisanya (rank selain 1) tidak lolos
            $notLolosPendaftarIds = SimpanHasilAkhir::select('hasil')->where('status', '=', 'Belum Selesai')->get()->flatMap(function ($item) {
                return collect(json_decode($item->hasil))->filter(function ($item) {
                    return $item->rank != 1;
                })->pluck('pendaftar_id');
            });

            foreach ($notLolosPendaftarIds as $pendaftarId) {
                ListPengumuman::create([
                    'id_pendaftar' => $pendaftarId,
                    'status' => 'Tidak Lolos',
                ]);
            }

            return redirect()->route('list-pengumuman.index')->with('success', 'Pengumuman berhasil ditambahkan. Pendaftar rank 1 diterima.');
        } elseif ($validated['rank_start'] == $validated['rank_end'] && $validated['rank_start'] != 0) {
            return redirect()->route('list-pengumuman.index')->with('error', 'Rank start dan rank end tidak boleh sama.');
        }

        if ($validated['rank_start'] == 0 && $validated['rank_end'] == 0) {
            // Semua pendaftar tidak lolos
            $pendaftarIds = SimpanHasilAkhir::select('hasil')->where('status', '=', 'Belum Selesai')->get()->flatMap(function ($item) {
                return collect(json_decode($item->hasil))->pluck('pendaftar_id');
            });

            foreach ($pendaftarIds as $pendaftarId) {
                ListPengumuman::create([
                    'id_pendaftar' => $pendaftarId,
                    'status' => 'Tidak Lolos',
                ]);
            }

            return redirect()->route('list-pengumuman.index')->with('success', 'Pengumuman berhasil ditambahkan. Semua pendaftar tidak lolos.');
        }

        $rankStart = $validated['rank_start'];
        $rankEnd = $validated['rank_end'];

        $pendaftarIds = SimpanHasilAkhir::select('hasil')->where('status', '=', 'Belum Selesai')->get()->flatMap(function ($item) use ($rankStart, $rankEnd) {
            return collect(json_decode($item->hasil))->filter(function ($item) use ($rankStart, $rankEnd) {
                return $item->rank >= $rankStart && $item->rank <= $rankEnd;
            })->pluck('pendaftar_id');
        });

        foreach ($pendaftarIds as $pendaftarId) {
            ListPengumuman::create([
                'id_pendaftar' => $pendaftarId,
                'status' => 'Lolos',
            ]);
        }

        $notLolosPendaftarIds = SimpanHasilAkhir::select('hasil')->where('status', '=', 'Belum Selesai')->get()->flatMap(function ($item) use ($rankEnd) {
            return collect(json_decode($item->hasil))->filter(function ($item) use ($rankEnd) {
                return $item->rank > $rankEnd;
            })->pluck('pendaftar_id');
        });

        foreach ($notLolosPendaftarIds as $pendaftarId) {
            ListPengumuman::create([
                'id_pendaftar' => $pendaftarId,
                'status' => 'Tidak Lolos',
            ]);
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
