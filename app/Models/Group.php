<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $table = 'groups';
    protected $fillable = array("name","courses_id ","enseignant_Id","nbr_seance","nbr_Click","niveau","creatorId");
    public function cources(){
        return $this->belongsTo(cources::class,'courses_id');
    }
    public function Enseignant(){
        return $this->belongsTo(Enseignant::class,'enseignant_Id');
    }
    public function Students()
    {
        return $this->belongsToMany(Student::class, 'has_groups', 'group_id', 'student_id');
    }
    public function User(){
        return $this->belongsTo(User::class,"creatorId"); 
    }
     
}
