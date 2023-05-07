<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cources extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = array("name","description","prix","duree","formationId");

    public function Formation(){
        return $this->belongsTo(Formation::class,'formationId');
    }
    public function User(){
        return $this->belongsTo(User::class,"creatorId"); 
       }
}
