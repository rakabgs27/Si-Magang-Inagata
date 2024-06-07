<?php

namespace App\Http\Controllers;

use App\Models\ListWawancara;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JadwalWawancaraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        $pendaftar = $user->pendaftar;  // Mengakses relasi pendaftar dari model User
        $pendaftarId = $pendaftar ? $pendaftar->id : null;

        if (is_null($pendaftarId)) {
            return redirect()->back()->withErrors(['message' => 'Data pendaftar tidak ditemukan']);
        }

        $listWawancara = ListWawancara::with(['pendaftar.user', 'divisiMentor'])
            ->where('pendaftar_id', $pendaftarId)
            ->get();

        return view('wawancara-management.jadwal-wawancara.index', [
            'listWawancara' => $listWawancara,
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
