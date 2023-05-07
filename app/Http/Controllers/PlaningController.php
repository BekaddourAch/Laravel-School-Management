<?php

namespace App\Http\Controllers;

use App\Models\Planing;
use App\Models\Salle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class PlaningController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $plannings = Planing::all();
        return view('pages.Planning', compact('plannings'));
    }
    public function goo()
    {
        return url('plannings/' . 3 . '/' . 'Fuchia');
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
        $planning = new Planing();
        $planning->nom = $request->nom;
        $planning->jour = $request->jour;
        $planning->start =  date("h:m:s", strtotime($request->start));
        $planning->end = date("h:m:s", strtotime($request->end));
        $planning->id_salle = $request->id_salle;
        $planning->creator_Id = Auth::id();
        $planning->save();
        return redirect('plannings/' . $request->id_salle . '/' . $request->nom_salle);
        // return redirect()->route('planning.show',  3,   'Fushia');
        // return redirect()->action(
        //     [PlaningController::class, 'show'],
        //     $request->id_salle,
        //     $request->salleName
        // );Redirect::to('settings/photos?image_='. $image_);
        //return Redirect::to('settings/photos?image_=' . $image_);
        // url('plannings/' . $salle->id . '/' . $salle->nom)
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, $salleName)
    {
        $salleID = $id;
        $this->salleName = $salleName;
        // $plannings = Salle::all()->Planings();
        $plannings = Planing::where('id_salle', '=', $id)->get();
        return view('pages.Planning', compact('plannings', 'salleName', 'salleID'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}