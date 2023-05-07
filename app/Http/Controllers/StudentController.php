<?php

namespace App\Http\Controllers;

use App\Models\cources;
use App\Models\Formation;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::all()->paginate(5);
        $formations = Formation::all();
        return view('pages.students', compact('students', 'formations'));
    }
    public function getCources($id)
    {
        $list_cources = cources::where("formationId", $id)->get();
        return $list_cources->pluck('id', 'name'); //it will return an array id =>name
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $students = Student::join('has_groups', 'has_groups.student_id', '=', 'students.id')
            ->join('groups', 'groups.id', '=', 'has_groups.group_id')
            ->join('users', 'users.id', '=', 'students.creatorId')->select(DB::raw('students.*,users.name as agent'))->where("groups.id", $id)->get();
        $formations = Formation::all();
        return response()->json($students, 200);
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
    public function searchingo(Request $request)
{
    $query = $request->input('query');
    $students = Student::where('name', 'LIKE', "%{$query}%") 
                 ->paginate(5);

    return response()->json($students); 
}

    public function search(Request $request)
    {
        $query = $request->get('query');
        $itemsPerPage = 10;
        $formations = Formation::all();
        $students =Student::where('name', 'like', '%' . $query . '%')
            // ->orWhere('description', 'like', '%' . $query . '%')
            ->paginate($itemsPerPage);

        return view('pages.students', compact('students','formations', 'query'));
        // $formations = Formation::all();
        // $students = Student::where([
        //     ['name', '!=', Null],
        //     [
        //         function ($query) use ($request) {
        //             if (($s = $request->s)) {
        //                 $query->where('name', 'LIKE', '%' . $s . '%')
        //                     ->orWhere('lastname', 'LIKE', '%' . $s . '%')
        //                     ->orWhere('inscription_Date', 'LIKE', '%' . $s . '%')
        //                     ->orWhere('phone', 'LIKE', '%' . $s . '%')
        //                     ->get();
        //             }
        //         }
        //     ]
        // // ])->paginate(5);
        // ]);
        // return view('pages.students', compact('students', 'formations'));


        // $formations = Formation::all();
        
        //     $students = Student::where([
        //     ['name', '!=', Null], 
        //     [
        //         function ($query) use ($request) {
        //             if (($s = $request->s)) {
        //                 $query->where('name', 'LIKE', '%' . $s . '%') 
        //                     ->get();
        //             }
        //         }
        //     ]
        //     ])->get();
        //     if($request->name != ""){
        // }else{
        //     $students = Student::paginate(5);
        // }
        
       
     //]);
        return view('pages.students', compact('students', 'formations'));
    }

    public function searching(Request $request)
    {
        if ($request->ajax()) {
            $output = "";
            $students = DB::table('students')->join('users', 'users.id', '=', 'students.creatorId')
            ->select(DB::raw('students.*,users.name as agent'))
            ->where('students.name', 'LIKE', '%' . $request->search . "%")->get();
            if ($students) {
                // foreach ($students as $key => $student) {
                //     $output .= '<tr id="student_' + $student->id + '">' +
                //     '<td>' + $student->id + '</td>' +
                //     '<td>' + $student->name + '</td>' +
                //     '<td>' + $student->lastname + '</td>' +
                //     '<td>' + $student->inscription_Date + '</td>' +
                //     '<td>' + $student->level + '</td>' +
                //     '<td>' + $student->observation + '</td>' +
                //     '<td>' + $student->phone + '</td>' +
                //     '<td>' + $student->phone2 + '</td>' +
                //     '<td>' + $student->folder + '</td> ' +
                //     '<td>' + $student->agent + '</td>' +
                //     '<td>  <a class="btn btn-info btn-sm" onclick="showEdit(' +
                //     $student->id +
                //     ')" id="btn_edit"> <i class="fas fa-pencil-alt"> </i> Edit  </a>' +
                //     '<a class="btn btn-danger btn-sm" onclick="showDelete(' +
                //     $student->id +
                //     ')" id="btn_delete"> <i class="fas fa-trash"></i>Delete</a> </td>' +
                //     '</td>' +
                //     '</tr>';
                // }
                return response()->json($students, 200);
            }
        }
    }
}