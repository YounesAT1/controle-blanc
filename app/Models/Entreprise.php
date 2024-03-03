<?php

namespace App\Models;

use App\Models\Offre;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Entreprise extends Model
{
    use HasFactory;

    protected $table = 'entreprises';
    protected $primaryKey = 'idE';
    protected $fillable = [
        'nom',	'adresse',	'photo'
    ];

    protected function offres() {
        return $this->hasMany(Offre::class, 'idE', 'idE');
    }
}
