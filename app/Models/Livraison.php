<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livraison extends Model
{
    use HasFactory;

    protected $table = 'livraisons';
    protected $primaryKey = 'id';

    protected $fillable = ['date', 'villeDepart', 'villeArriver', 'arriverOuNon', 'idChauffeur', 'idCamion'];

    public function chauffeur()
    {
        return $this->belongsTo(Chauffeur::class, 'idChauffeur');
    }

    public function camion()
    {
        return $this->belongsTo(Camion::class, 'idCamion');
    }
}
