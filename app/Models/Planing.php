<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Planing extends Model
{
    use HasFactory;
public $table = 'planing';
    protected $fillable = array('nom', 'jour', 'start', 'end',);

    public function User()
    {
        return $this->belongsTo(User::class, 'creator_Id');
    }
}