<?php

namespace App\Http\Controllers;

use App\Models\DivisiMentor;
use App\Http\Requests\StoreDivisiMentorRequest;
use App\Http\Requests\UpdateDivisiMentorRequest;
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDivisiMentorRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDivisiMentorRequest $request)
    {
        //
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
        //
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
        //
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
