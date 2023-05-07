<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Salle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SallesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $salles = Salle::all();
        $user = Salle::find(1)->User;
        return view('pages.salles', compact('salles', 'user'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sallename = $request->nom;
        $salles = Salle::all();
        $user = Salle::find(1)->User;
        $salle = new Salle();
        $salle->nom = $request->nom;
        $salle->type = $request->type;
        $salle->capacite = $request->capacite;
        $salle->creatorId = Auth::id();
        $salle->save();
        return view('pages.salles', compact('salles', 'user', 'sallename'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {


        $salle = Salle::findOrFail($id);
        $salle->update([
            $salle->nom = $request->nom,
            $salle->type = $request->type,
            $salle->capacite = $request->capacite,
            $salle->creatorId = Auth::id()
        ]);
        
        return redirect()->route('salles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {

        $salle = Salle::findOrFail($request->id)->delete();

        return redirect()->route('salles.index');
    }
}