<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seance extends Model
{
    use HasFactory;
    protected $table = 'seances';
    public $timestamps = false;

    public function etudiants(){
        return $this->belongsToMany(Etudiant::class, 'presences', 'seance_id',
            'etudiant_id');
    }

    public function cours(){
        return $this->belongsTo(Cours::class, 'cours_id');
    }

    public function present($eid){
        $etudiant = Etudiant::findOrFail($eid);
        $p = $this->etudiants()->get();
        return $p->find($etudiant);
    }
}
