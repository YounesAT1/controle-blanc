<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stagiaire extends Model
{
    use HasFactory;
    
    protected $table = 'stagiaires';
    protected $primaryKey = 'idSt';
    protected $fillable = ['nom', 'prenom', 'email', 'cv'];

    public function postulers()
    {
        return $this->hasMany(Postuler::class, 'idSt', 'idSt');
    }
}
