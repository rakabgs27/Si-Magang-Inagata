<?php

namespace App\Http\Controllers;

use App\Models\ListPengumuman;
use App\Models\Pendaftar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HasilPengumumanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get the currently logged-in user
        $user = Auth::user();

        // Find the pendaftar record associated with the logged-in user
        $pendaftar = Pendaftar::where('user_id', $user->id)->first();

        if (!$pendaftar) {
            // If there's no pendaftar record, return a view with a message
            return view('pengumuman.index', ['message' => 'Data pendaftar tidak ditemukan.']);
        }

        // Find the list_pengumuman record associated with the pendaftar
        $pengumuman = ListPengumuman::where('id_pendaftar', $pendaftar->id)->first();

        // Return the view with the pengumuman data
        return view('pengumuman-management.hasil-pengumuman.index', ['pengumuman' => $pengumuman]);
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
        //
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
