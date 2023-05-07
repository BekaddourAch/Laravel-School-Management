<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;

class Enseignant extends Model
{
    use HasFactory;
    
    protected $fillable = array("nom","prenom","specialite","specialite2","specialite3","phone1","phone2","phone3","email","address");

    public function User(){
        return $this->belongsTo(User::class,"creatorId"); 
       }
}
