<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specialite extends Model
{
    use HasFactory;
    
    protected $table = 'specialites';
    protected $primaryKey = 'idSpe';
    protected $fillable = ['titre', 'description'];

    public function offres()
    {
        return $this->hasMany(Offre::class, 'idSpe', 'idSpe');
    }
}
