<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chauffeur extends Model
{
    use HasFactory;

    protected $table = 'chauffeurs';
    protected $primaryKey = 'id';
    protected $fillable = ['nom', 'prenom'];

    public function permis()
    {
        return $this->hasOne(Permis::class);
    }

    public function livraisons()
    {
        return $this->hasMany(Livraison::class, 'idChauffeur', 'id');
    }

}
