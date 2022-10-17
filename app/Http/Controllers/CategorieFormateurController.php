<?php

namespace App\Http\Controllers;

use App\Models\categorie_formateur;
use App\Http\Requests\Storecategorie_formateurRequest;
use App\Http\Requests\Updatecategorie_formateurRequest;

class CategorieFormateurController extends Controller
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
     * @param  \App\Http\Requests\Storecategorie_formateurRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storecategorie_formateurRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\categorie_formateur  $categorie_formateur
     * @return \Illuminate\Http\Response
     */
    public function show(categorie_formateur $categorie_formateur)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\categorie_formateur  $categorie_formateur
     * @return \Illuminate\Http\Response
     */
    public function edit(categorie_formateur $categorie_formateur)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updatecategorie_formateurRequest  $request
     * @param  \App\Models\categorie_formateur  $categorie_formateur
     * @return \Illuminate\Http\Response
     */
    public function update(Updatecategorie_formateurRequest $request, categorie_formateur $categorie_formateur)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\categorie_formateur  $categorie_formateur
     * @return \Illuminate\Http\Response
     */
    public function destroy(categorie_formateur $categorie_formateur)
    {
        //
    }
}
