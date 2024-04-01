<?php

namespace App\Http\Controllers;

use App\Models\DivisiMentor;
use App\Http\Requests\StoreDivisiMentorRequest;
use App\Http\Requests\UpdateDivisiMentorRequest;
use App\Models\Divisi;
use App\Models\User;
use DB;
use Illuminate\Http\Request;

class DivisiMentorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $divisiMentor = User::whereHas('roles', function ($query) {
            $query->where('name', 'mentor');
        })->with(['roles', 'divisiMentor.divisi'])->paginate(10);

        // dd($divisiMentor);

        return view('users-management.divisi-mentor.index', [
            'divisiMentor' => $divisiMentor
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
        $duplicate = false;

        foreach ($divisiIds as $divisiId) {
            $exists = DivisiMentor::where('user_id', $userId)->where('divisi_id', $divisiId)->exists();

            if (!$exists) {
                DivisiMentor::create([
                    'user_id' => $userId,
                    'divisi_id' => $divisiId,
                ]);
            } else {
                $duplicate = true;
            }
        }

        if ($duplicate) {
            return redirect()->route('divisi-mentor.index')->with('error', 'Karena mentor sudah ada divisi');
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
    public function edit(User $divisiMentor)
    {
        $users = User::role('mentor')->get();

        $divisis = Divisi::all();

        $selectedDivisiIds = DB::table('divisi_mentors')
            ->where('user_id', $divisiMentor->id)
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
    public function update(UpdateDivisiMentorRequest $request, User $divisiMentor)
    {
        $userId = $divisiMentor->id;
        $divisiIds = $request->input('divisis');

        DivisiMentor::where('user_id', $userId)
            ->whereNotIn('divisi_id', $divisiIds)
            ->delete();

        foreach ($divisiIds as $divisiId) {
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
