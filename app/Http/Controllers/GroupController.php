<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\cources;
use App\Models\Enseignant;
use App\Models\Has_group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use League\Flysystem\DirectoryListing;
class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $groups = Group::all();
        // $cources = cources::all();
        // $enseignats = Enseignant::all();
        
        // return view("pages.groups", compact("groups","cources","enseignats"));->lists('title', 'name');
        // $groups = DB::select('SELECT groups.*,COUNT(students.id) as numbstuds from groups INNER join has_groups on groups.id=has_groups.group_id INNER JOIN students on students.id=has_groups.student_id GROUP BY groups.id; ')->all();
        // $groups =DB::table('groups')
        //   ->join('has_groups', 'groups.id', '=', 'has_groups.group_id') 
        //   ->join('students', 'students.id', '=', 'has_groups.student_id')->groupBy('group_id')->count('has_groups.student_id');
       // return dd($results);numbstuds join
      // $groups = DB::select('SELECT groups.*,COUNT(students.id) as numbstuds from groups INNER join has_groups on groups.id=has_groups.group_id INNER JOIN students on students.id=has_groups.student_id GROUP BY groups.id; ')->all();
        
      
    //   $groups = Group::select(DB::raw('groups.*,count(students.id) as numbstuds'))
    //             ->leftJoin('has_groups', 'groups.id', '=', 'has_groups.group_id')
    //                 ->leftJoin('students', 'students.id', '=', 'has_groups.student_id')->groupBy('has_groups.group_id')->get();

                     
                    // $groups = Group::select('groups.*'  )
                    // ->selectRaw('(select count(has_groups.student_id) as numbstuds from has_groups where has_groups.group_id = groups.id)')
                    // ->join('students', 'students.id', '=', 'has_groups.student_id')
                    // ->get();
        //             $groups = Group::leftJoin('has_groups', 'has_groups.group_id', '=', 'groups.id')
        // ->leftJoin('students', 'students.id', '=', 'has_groups.student_id') 
        // ->select(
        //     DB::raw('groups.*,count(students.id) as numbstuds')
        // )->groupBy('has_groups.group_id')->get();

        // $groups = Group::select(DB::raw('groups.*,count(students.id) as numbstuds'))->join('students')
        //         ->leftJoin('has_groups', 'groups.id', '=', 'has_groups.group_id')
        //             ->where('students.id', '=', 'has_groups.student_id')->groupBy('has_groups.group_id')->get();
        // $groups = Group::leftJoin('has_groups', function ($join) {
        //     $join->on('has_groups.group_id', '=', 'groups.id')
        //         ->on('students.id', '=', DB::raw("(SELECT students.id from has_groups WHERE has_groups.student_id = students.id)"));
        // })->groupBy('has_groups.group_id')->select(array('groups.*', 'count(students.id) as numbstuds'));
         
        //  $groups = DB::table('groups')
        //                             ->select(DB::raw('groups.*,count(students.id) as numbstuds'))
        //                             ->leftJoin('has_groups', 'groups.id', '=', 'has_groups.group_id')
        //                             ->leftJoin('students', 'students.id', '=', 'has_groups.student_id')->groupBy('groups.id')->get();
                                    
                                    $groups = Group::select(DB::raw('groups.*,count(students.id) as numbstuds'))
                                    ->leftJoin('has_groups', 'groups.id', '=', 'has_groups.group_id')
                                    ->leftJoin('students', 'students.id', '=', 'has_groups.student_id')->groupBy('groups.id')->get(); 
        $cources = cources::all();
        $enseignats = Enseignant::all();
        //return dd($groups);
        //return $groups;
        return view("pages.groups", compact("groups","cources","enseignats"));
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
        $group=new Group();
        $group->name=$request->name;
        $group->courses_id=$request->courses_id;
        $group->enseignant_Id=$request->enseignant_Id;
        $group->nbr_seance=cources::where('id', $request->courses_id)->get(['duree']);
        $group->nbr_Click=0;
        $group->niveau=1;
        $group->creatorId=Auth::id(); 
        $group->save();
        return redirect()->route('groups.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $list_Group = Group::where("courses_id", $id)->get();
        return $list_Group->pluck('id', 'name');//it will return an array id =>name
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
