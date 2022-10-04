<?php

namespace App\Http\Controllers;

use App\Models\formateur;
use App\Http\Requests\StoreformateurRequest;
use App\Http\Requests\UpdateformateurRequest;

class FormateurController extends Controller
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
     * @param  \App\Http\Requests\StoreformateurRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreformateurRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\formateur  $formateur
     * @return \Illuminate\Http\Response
     */
    public function show(formateur $formateur)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\formateur  $formateur
     * @return \Illuminate\Http\Response
     */
    public function edit(formateur $formateur)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateformateurRequest  $request
     * @param  \App\Models\formateur  $formateur
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateformateurRequest $request, formateur $formateur)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\formateur  $formateur
     * @return \Illuminate\Http\Response
     */
    public function destroy(formateur $formateur)
    {
        //
    }
}
