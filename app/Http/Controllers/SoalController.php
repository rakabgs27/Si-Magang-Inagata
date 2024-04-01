<?php

namespace App\Http\Controllers;

use App\Models\Soal;
use App\Http\Requests\StoreSoalRequest;
use App\Http\Requests\UpdateSoalRequest;
use Illuminate\Http\Request;


class SoalController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:list-soal.index')->only('index');
        $this->middleware('permission:list-soal.create')->only('create', 'store');
        $this->middleware('permission:list-soal.edit')->only('edit', 'update');
        $this->middleware('permission:list-soal.destroy')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $judulSoalSearch = $request->input('judul_soal');

        $listSoal = Soal::when($request->input('judul_soal'), function ($query, $judulSoal) {
            return $query->where('judul_soal', 'like', '%' . $judulSoal . '%');
        })->paginate(10);

        return view('soal-management.list-soal.index',[
            'listSoal' => $listSoal,
            'judulSoalSearch' => $judulSoalSearch,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('soal-management.list-soal.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSoalRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSoalRequest $request)
    {
        dd($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Soal  $soal
     * @return \Illuminate\Http\Response
     */
    public function show(Soal $soal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Soal  $soal
     * @return \Illuminate\Http\Response
     */
    public function edit(Soal $soal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSoalRequest  $request
     * @param  \App\Models\Soal  $soal
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSoalRequest $request, Soal $soal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Soal  $soal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Soal $soal)
    {
        //
    }
}
