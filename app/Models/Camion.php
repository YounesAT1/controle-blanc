<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Camion extends Model
{
    use HasFactory;

    protected $table = 'camions';
    protected $primaryKey = 'matricule';
    protected $fillable = ['marque', 'photo'];

    public function livraisons()
    {
        return $this->hasMany(Livraison::class, 'idCamion', 'matricule');
    }

}
