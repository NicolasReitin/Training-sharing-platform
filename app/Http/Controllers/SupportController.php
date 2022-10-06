<?php

namespace App\Http\Controllers;

use App\Models\support;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoresupportRequest;
use App\Http\Requests\UpdatesupportRequest;

class SupportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(Support::where('users_id', '=', Auth::user()->id)->get());
        $supports = Support::where('users_id', '=', Auth::user()->id)->get();
        return view('supports.mysupports', compact('supports'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('supports.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoresupportRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoresupportRequest $request)
    {
        $allparams = [];
        $allparams['titre'] = $request->titre;
        $allparams['description'] = $request->description;
        $allparams['date_debut'] = $request->date_debut;
        $allparams['date_fin'] = $request->date_fin;

        $user = Auth::user(); // get user id from Auth::user
        $allparams['users_id'] = $user->id;

        if ($request->file('file')) {
            $filename = time() . '.' . $request->file('file')->extension(); // nom du fichier uplod dans le storage
            $allparams['piece_jointe'] = $request->file('file')->storeAs(
                'supports',
                $filename,
                'public',
            );
        }
        // dd($allparams);
        Support::create($allparams);
        return redirect('mysupports');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\support  $support
     * @return \Illuminate\Http\Response
     */
    public function show(support $support)
    {
        return view('supports.show', compact('support'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\support  $support
     * @return \Illuminate\Http\Response
     */
    public function edit(support $support)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatesupportRequest  $request
     * @param  \App\Models\support  $support
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatesupportRequest $request, support $support)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\support  $support
     * @return \Illuminate\Http\Response
     */
    public function destroy(support $support)
    {
        //
    }
}
