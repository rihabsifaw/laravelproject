<?php

namespace App\Http\Controllers;

use App\Models\Livreur;
use Illuminate\Http\Request;

class LivreurCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records = Livreur::latest()->paginate(5);
        return view('livreur.index',compact('records'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('livreur.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|min:3|max:255',
            'prenom' => 'required|min:3|max:255',
            'ville' => 'required|min:3|max:255',
            'tel' => 'required|min:8|max:13',

        ]);
        $input = $request->all();
        
        Livreur::create($input);
        return redirect()->route('livreurs.index')->with('success','livreur created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Livreur  $livreur
     * @return \Illuminate\Http\Response
     */
    public function show(Livreur $livreur)
    {
        return view('livreur.show',compact('livreur'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Livreur  $livreur
     * @return \Illuminate\Http\Response
     */
    public function edit(Livreur $livreur)
    {
        return view('livreur.edit',compact('livreur'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Livreur  $livreur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Livreur $livreur)
    {
        $request->validate([
            'nom' => 'required|min:3|max:255',
            'prenom' => 'required|min:3|max:255',
            'ville' => 'required|min:3|max:255',
            'tel' => 'required|min:8|max:13'
        ]);
        $input = $request->all();
        
        $livreur->update($input);
        return redirect()->route('livreurs.index')->with('success','Livreur updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Livreur  $livreur
     * @return \Illuminate\Http\Response
     */
    public function destroy(Livreur $livreur)
    {
        $livreur->delete();
        return redirect()->route('livreurs.index')
        ->with('success','Livreur deleted successfully');
    }
}
