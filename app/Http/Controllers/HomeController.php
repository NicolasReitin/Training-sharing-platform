<?php

namespace App\Http\Controllers;

use App\Models\support;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home', ['supports' => Support::orderBy('titre', 'desc')->paginate(15)]);
    }

    public function show(support $support)
    {
        
    }

    
}
