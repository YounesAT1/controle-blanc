<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offre extends Model
{
    use HasFactory;
    
    protected $table = 'offres';
    protected $primaryKey = 'idO';
    protected $fillable = ['titre', 'salaire', 'idE', 'idSpe'];

    public function entreprise()
    {
        return $this->belongsTo(Entreprise::class, 'idE', 'idE');
    }

    public function specialite()
    {
        return $this->belongsTo(Specialite::class, 'idSpe', 'idSpe');
    }

    public function postulers()
    {
        return $this->hasMany(Postuler::class, 'idO', 'idO');
    }
}
