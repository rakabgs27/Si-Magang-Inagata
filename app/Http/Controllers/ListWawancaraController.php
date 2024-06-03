<?php

namespace App\Http\Controllers;

use App\Models\ListWawancara;
use App\Http\Requests\StoreListWawancaraRequest;
use App\Http\Requests\UpdateListWawancaraRequest;

class ListWawancaraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('wawancara-management.list-wawancara.index');
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
     * @param  \App\Http\Requests\StoreListWawancaraRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreListWawancaraRequest $request)
    {
        //
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
