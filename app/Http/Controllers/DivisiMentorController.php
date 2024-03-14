<?php

namespace App\Http\Controllers;

use App\Models\DivisiMentor;
use App\Http\Requests\StoreDivisiMentorRequest;
use App\Http\Requests\UpdateDivisiMentorRequest;
use App\Models\Divisi;
use App\Models\User;
use DB;

class DivisiMentorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $divisiMentors = DB::table('divisi_mentors')
            ->join('users', 'divisi_mentors.user_id', '=', 'users.id')
            ->join('divisis', 'divisi_mentors.divisi_id', '=', 'divisis.id')
            ->select('divisi_mentors.*', 'users.name as user_name', 'divisis.nama_divisi as nama_divisi')
            ->paginate(10);

        // dd($divisiMentors);

        return view('users-management.divisi-mentor.index', [
            'divisiMentors' => $divisiMentors
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::role('mentor')->get();
        // dd($users);

        $divisis = Divisi::all();

        return view('users-management.divisi-mentor.create', [
            'users' => $users,
            'divisis' => $divisis,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDivisiMentorRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDivisiMentorRequest $request)
    {
        $userId = $request->input('users');
        $divisiIds = $request->input('divisis');

        foreach ($divisiIds as $divisiId) {
            DivisiMentor::create([
                'user_id' => $userId,
                'divisi_id' => $divisiId,
            ]);
        }

        return redirect()->route('divisi-mentor.index')->with('success', 'Data berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DivisiMentor  $divisiMentor
     * @return \Illuminate\Http\Response
     */
    public function show(DivisiMentor $divisiMentor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DivisiMentor  $divisiMentor
     * @return \Illuminate\Http\Response
     */
    public function edit(DivisiMentor $divisiMentor)
    {
        $users = User::role('mentor')->get();

        $divisis = Divisi::all();

        $selectedDivisiIds = DB::table('divisi_mentors')
            ->where('user_id', $divisiMentor->user_id)
            ->pluck('divisi_id')
            ->toArray();

        return view('users-management.divisi-mentor.edit', [
            'divisiMentor' => $divisiMentor,
            'users' => $users,
            'divisis' => $divisis,
            'selectedDivisiIds' => $selectedDivisiIds,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDivisiMentorRequest  $request
     * @param  \App\Models\DivisiMentor  $divisiMentor
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDivisiMentorRequest $request, DivisiMentor $divisiMentor)
    {
        $userId = $request->input('users');
        $divisiIds = $request->input('divisis');

        // Menghapus semua hubungan terdahulu untuk user ini, kecuali yang masih relevan berdasarkan input baru.
        DivisiMentor::where('user_id', $userId)
            ->whereNotIn('divisi_id', $divisiIds)
            ->delete();

        foreach ($divisiIds as $divisiId) {
            // Memastikan tidak ada duplikasi saat menambahkan hubungan baru.
            DivisiMentor::firstOrCreate([
                'user_id' => $userId,
                'divisi_id' => $divisiId,
            ]);
        }

        return redirect()->route('divisi-mentor.index')->with('success', 'Data berhasil diperbarui.');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DivisiMentor  $divisiMentor
     * @return \Illuminate\Http\Response
     */
    public function destroy(DivisiMentor $divisiMentor)
    {
        //
    }
}
