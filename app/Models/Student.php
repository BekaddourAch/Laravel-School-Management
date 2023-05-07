<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{

    
    protected $fillable = array("name","lastname ","age","level","inscription_Date","photo"
    ,"phone","phone2","phone3","observation","amiNumber","bonus","folder"
    ,"exam","cours_id","creatorId");
    use HasFactory;
    public function groups()
    {
        return $this->belongsToMany(Group::class, 'has_groups', 'student_id', 'group_id');
    }
    public function User(){
        return $this->belongsTo(User::class,"creatorId"); 
       }
}
