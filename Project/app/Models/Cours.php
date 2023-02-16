<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cours extends Model
{
    use HasFactory;

    protected $table = 'cours';

    public function users(){
        return $this->belongsToMany(User::class, 'cours_users', 'cours_id',
            'user_id');
    }

    public function etudiants(){
        return $this->belongsToMany(Etudiant::class, 'cours_etudiants', 'cours_id',
        'etudiant_id');
    }

    public function seance(){
        return $this->hasMany(Seance::class, 'cours_id');
    }
}
