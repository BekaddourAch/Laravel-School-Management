<?php

use App\Http\Controllers\CourcesController;
use App\Http\Controllers\FormationController;
use App\Http\Controllers\InscriptionController;
use App\Http\Controllers\PlaningController;
use App\Http\Controllers\SallesController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\enseignantController;
use App\Http\Controllers\GroupController;
use App\Models\Formation;
use App\Models\Student;
use Illuminate\Support\Facades\Route; 

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('pages.dashboard');
    })->name('index');
    Route::resource('users', UsersController::class);
    // ----------- Salles---------
    Route::resource('salles', SallesController::class);
    Route::resource('planning', PlaningController::class);
    Route::resource('formations', FormationController::class);
    Route::resource('enseignant', enseignantController::class);
    Route::resource('courses', CourcesController::class);
    //Route::get('/courses/{id}', [CourcesController::class,'getCources']);
    //getCources
    Route::resource('types', CourcesController::class); 
    Route::resource('groups', GroupController::class);
    Route::resource('students', StudentController::class);
    // Route::get('students/{id}', [StudentController::class,'show']);
    Route::resource('inscription', InscriptionController::class);
    // Route::get('inscription/{id}', [InscriptionController::class,'getFormation']);
    Route::get('/tuuu/{id}', [CourcesController::class,'getFormation']);

    Route::get('types', [CourcesController::class,'index'])->name('types.search');
    Route::get('formations', [FormationController::class,'index'])->name('formations.search');
    Route::get('enseignant', [enseignantController::class,'index'])->name('enseignant.search');
    Route::get('groups', [GroupController::class,'index'])->name('groups.search');
    Route::get('students', [StudentController::class,'search'])->name('students.search');
    //Route::get('/search',[StudentController::class,'searching']);
    Route::get('/plannings/{id}/{salleName}', [PlaningController::class, 'show']);
    Route::get('/search', [StudentController::class,'search'])->name('search');
    Route::get('/searchingo',[StudentController::class,'searchingo'])->name('searchingo');
    Route::get('/search-with-pagination', function () { 
         
        $students = Student::all();
        $formations = Formation::all();
        return view('livewire.students', compact('students', 'formations'));
    });
    Route::any ('students/search', function () {
        $q = Request::get ( 'q' );
        if($q != ""){
        // $user = User::where ( 'name', 'LIKE', '%' . $q . '%' )->orWhere ( 'email', 'LIKE', '%' . $q . '%' )->paginate(5)->setPath ( '' );
        $students = DB::table('students')->join('users', 'users.id', '=', 'students.creatorId')
            ->select(DB::raw('students.*,users.name as agent'))
            ->where('students.name', 'LIKE', '%' . $q  . "%")->paginate(5)->setPath ( '' );
        $pagination = $students->appends ( array (
           'q' => Request::get('q') 
         ) );
         
        $formations = Formation::all();
        if (count ( $students ) > 0)
         return view('pages.students', compact('students', 'formations'))->withDetails($students)->withQuery($q);
        }
         return view('pages.students',compact('students', 'formations'))->withMessage('No Details found. Try to search again !' );
       } );
});