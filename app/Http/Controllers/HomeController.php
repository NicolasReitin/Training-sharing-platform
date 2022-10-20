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
        $supports = Support::orderBy('titre')->paginate(15);
        $categories = Categorie::all();
        return view('home', compact('supports', 'categories'));
    }


    public function search()
    {
        $categories = Categorie::all();
        $search = request('search');
        $supports = Support::orderBy('titre')->paginate(15);
        $users = User::all();

        if (empty($search)) {
            return view('home', compact('supports', 'categories'));
        }
        
        $results = Support::where('titre', 'like', "%$search%")
        ->orWhere('description', 'like', "%$search%")
        ->orWhere('piece_jointe', 'like', "%$search%")->get();

        // if (sizeof(Support::where('titre', 'like', "%$search%")
        //     ->orWhere('description', 'like', "%$search%")
        //     ->orWhere('piece_jointe', 'like', "%$search%")->get()) >0)
        // {
        //     $resultSup = Support::where('titre', 'like', "%$search%")
        //     ->orWhere('description', 'like', "%$search%")
        //     ->orWhere('piece_jointe', 'like', "%$search%");
        // };
        
        // if (isset($resultSup)){
        //     $resultSup = $resultSup->get();
        // }else{
        //     $resultSup = '';
        // }     
        //     // dd([$resultCat, $resultUser, $resultSup]);

        return view('home', compact('users', 'supports', 'categories', 'results'));
    }




    public function show(support $support)
    {
        
    }

    
}
