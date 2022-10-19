<?php

namespace App\Http\Controllers;

use App\Models\Support;
use App\Models\User;
use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $supports = Support::orderBy('titre', 'desc')->paginate(15);
        $categories = Categorie::all();
        return view('home', compact('supports', 'categories'));
    }



    public function show(support $support)
    {
        
    }

    
}
