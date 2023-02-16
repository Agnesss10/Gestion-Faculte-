<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'users';

    public $timestamps = false;

    protected $hidden = ['mdp'];

    protected $fillable = ['login', 'mdp', 'type'];

    protected $attributes = ['type' => 'user'];

    public function getAuthPassword(){
        return $this->mdp;
    }

    public function isAdmin(){
        return $this->type == 'admin';
    }

    public function isEnseignant(){
        return $this->type == 'enseignant';
    }

    public function isGestionnaire()
    {
        return $this->type == 'gestionnaire';
    }

    public function cours(){
        return $this->belongsToMany(Cours::class, 'cours_users', 'user_id',
            'cours_id');
    }
}
