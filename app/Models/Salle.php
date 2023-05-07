<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;

class Salle extends Model
{
    use HasFactory;

    protected $fillable = array('nom', 'type', 'capacite');

    public function User()
    {
        return $this->belongsTo(User::class, 'creatorId');
    }
    public function Planings()
    {
        return $this->hasMany(Planing::class, 'id_salle');
    }
}