<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Enseignant;
use Illuminate\Support\Facades\Auth;

class enseignantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Enseignants= Enseignant::all();
        return view("pages.enseignant",compact("Enseignants"));
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
        $Enseignant=new Enseignant();
        $Enseignant->nom=$request->nom;
        $Enseignant->prenom=$request->prenom;
        $Enseignant->specialite=$request->specialite;
        $Enseignant->specialite2=$request->specialite2;
        $Enseignant->specialite3=$request->specialite3;
        $Enseignant->phone1=$request->phone1;
        $Enseignant->phone2=$request->phone2;
        $Enseignant->phone3=$request->phone3;
        $Enseignant->email=$request->email;
        $Enseignant->address=$request->address; 
        $Enseignant->creatorId=Auth::id(); 
        $Enseignant->save();
        return redirect()->route('enseignant.index');
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
        $Enseignant = Enseignant::findOrFail($id);

        $Enseignant->update([
            $Enseignant->nom=$request->nom,
            $Enseignant->prenom=$request->prenom,
            $Enseignant->specialite=$request->specialite,
            $Enseignant->specialite2=$request->specialite2,
            $Enseignant->specialite3=$request->specialite3,
            $Enseignant->phone1=$request->phone1,
            $Enseignant->phone2=$request->phone2,
            $Enseignant->phone3=$request->phone3,
            $Enseignant->email=$request->email,
            $Enseignant->address=$request->address, 
            $Enseignant->creatorId=Auth::id(), 
        ]);
        return redirect()->route('enseignant.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Enseignant = Enseignant::findOrFail($id)->delete();
        return redirect()->route('enseignant.index');
    }
}
