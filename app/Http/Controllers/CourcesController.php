<?php

namespace App\Http\Controllers;

use App\Models\cources;
use App\Models\Formation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourcesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $courses=cources::paginate(5);
        $formations=Formation::all();
        $courses = cources::where([
            ['name', '!=', Null],
            [function ($query) use ($request) {
                if (($s = $request->s)) {
                    $query->orWhere('name', 'LIKE', '%' . $s . '%')
                        ->orWhere('description', 'LIKE', '%' . $s . '%')
                        ->get();
                }
            }]
        ])->paginate(5);
        return view('pages.cource',compact('courses','formations'));
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
        $cource=new cources();
        $cource->name=$request->name;
        $cource->description=$request->description;
        $cource->prix=$request->prix;
        $cource->duree=$request->duree;
        $cource->formationId=$request->formationId;
        $cource->creatorId=Auth::id(); 
        $cource->save();
        return redirect()->route('courses.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $list_classes = cources::where("formationId", $id)->get();
        return $list_classes->pluck('id', 'name');//it will return an array id =>name
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
        $cources = cources::findOrFail($id);

      
            $cources->name=$request->name;
            $cources->description=$request->description;
            $cources->prix=$request->prix;
            $cources->duree=$request->duree;
            $cources->formationId=$request->formationId;
        $cources->creatorId = Auth::id();
         $cources->update();
        return redirect()->route('courses.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         
        $cources = cources::findOrFail($id)->delete();
        return redirect()->route('courses.index');
    }

    public function getFormation($id)
    {
        $list_formations = Formation::all();
        return $list_formations->pluck('id', 'nom');//it will return an array id =>nom
    }

    public function getCources($id)
    {
        
    }
}
