<?php

namespace App\Http\Controllers;

use App\Models\Support;
use App\Models\AdminSupports;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreAdminSupportsRequest;
use App\Http\Requests\UpdateAdminSupportsRequest;

class AdminSupportsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $supports = DB::table('supports')->paginate(25);
        return view('auth/Dashboard_Admin/Supports/index', compact('supports'));
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
     * @param  \App\Http\Requests\StoreAdminSupportsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAdminSupportsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AdminSupports  $adminSupports
     * @return \Illuminate\Http\Response
     */
    public function show(AdminSupports $adminSupports)
    {
        return view('auth/Dashboard_Admin/Supports/show', compact('adminSupports'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AdminSupports  $adminSupports
     * @return \Illuminate\Http\Response
     */
    public function edit(AdminSupports $adminSupports)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAdminSupportsRequest  $request
     * @param  \App\Models\AdminSupports  $adminSupports
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAdminSupportsRequest $request, AdminSupports $adminSupports)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AdminSupports  $adminSupports
     * @return \Illuminate\Http\Response
     */
    public function destroy(AdminSupports $adminSupports)
    {
        //
    }
}
