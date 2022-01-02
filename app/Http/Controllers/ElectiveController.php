<?php

namespace App\Http\Controllers;

use App\Models\Elective;
use App\Http\Requests\StoreElectiveRequest;
use App\Http\Requests\UpdateElectiveRequest;

class ElectiveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreElectiveRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreElectiveRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Elective  $elective
     * @return \Illuminate\Http\Response
     */
    public function show(Elective $elective)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Elective  $elective
     * @return \Illuminate\Http\Response
     */
    public function edit(Elective $elective)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateElectiveRequest  $request
     * @param  \App\Models\Elective  $elective
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateElectiveRequest $request, Elective $elective)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Elective  $elective
     * @return \Illuminate\Http\Response
     */
    public function destroy(Elective $elective)
    {
        //
    }
}
