<?php

namespace App\Http\Controllers;

use App\Models\Support;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
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
        //dd(Support::where('users_id', '=', Auth::user()->id)->get());
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
        
        if($request->hasfile('filename'))
         {
            $this->validate($request, [

                'filename' => 'required',
                'filename.*' => 'mimes:doc,pdf,docx,pptx,zip'
            ]);

            foreach($request->file('filename') as $file)
            {
                $name=time().'__'.$file->getClientOriginalName();
                $data[] = $file->storeAs(
                    'supports',
                    $name,
                    'public',
                );  
            }            
            $allparams['piece_jointe'] = json_encode($data);
         }

        // dd($allparams);
        Support::create($allparams);
        return redirect('mysupports')->with('success', 'Your files has been successfully added');
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
        if (isset($support->piece_jointe)){
            foreach (json_decode($support->piece_jointe) as $item) {
                Storage::disk('public')->delete($item);
            }
        }
        $support->delete();
        return redirect('mysupports');
    }

    public function deleteFile(support $support, $item)
    {
        
        $newItem = 'supports/'.$item;
        $array = json_decode($support->piece_jointe);

        for ($i = 0; $i < count($array); $i++) {
            if ($array[$i] == $newItem) {
                array_splice($array, $i, 1);
            }
        }

        $support->piece_jointe = json_encode($array);
        $delete = $support->save();
        
        if ($delete) {
        return view('supports.show', compact('support'));
        }else{
            return view('supports.show', compact('support'))->with('error', 'Something went wrong');
        }
    }
}
