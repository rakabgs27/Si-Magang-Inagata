<?php

namespace App\Http\Controllers;

use App\Models\TestSoal;
use App\Http\Requests\StoreTestSoalRequest;
use App\Http\Requests\UpdateTestSoalRequest;

class TestSoalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('soal-management.test-soal.index');
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
     * @param  \App\Http\Requests\StoreTestSoalRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTestSoalRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TestSoal  $testSoal
     * @return \Illuminate\Http\Response
     */
    public function show(TestSoal $testSoal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TestSoal  $testSoal
     * @return \Illuminate\Http\Response
     */
    public function edit(TestSoal $testSoal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTestSoalRequest  $request
     * @param  \App\Models\TestSoal  $testSoal
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTestSoalRequest $request, TestSoal $testSoal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TestSoal  $testSoal
     * @return \Illuminate\Http\Response
     */
    public function destroy(TestSoal $testSoal)
    {
        //
    }
}
