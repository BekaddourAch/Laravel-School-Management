<?php

namespace App\Http\Livewire;

use App\Models\Formation;
use App\Models\Student;
use Livewire\Component;
use Livewire\WithPagination;

class SearchPagination extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $searchd;
 
    public function render()
    {
        $searchTerm = $this->searchd; 
             return view('livewire.search-pagination',[
            'students' => Student::where('name', 'LIKE', "%{$searchTerm}%")->paginate(5)
        ]);  
    }
}
