<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Postuler extends Model
{
    use HasFactory;

    protected $table = 'postulers';
    protected $primaryKey = 'idP';
    protected $fillable = ['etat', 'idSt', 'idO'];

    public function stagiaire()
    {
        return $this->belongsTo(Stagiaire::class, 'idSt', 'idSt');
    }

    public function offre()
    {
        return $this->belongsTo(Offre::class, 'idO', 'idO');
    }
}
