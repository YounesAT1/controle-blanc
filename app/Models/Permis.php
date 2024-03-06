<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permis extends Model
{
    use HasFactory;

    protected $table = 'permis';
    protected $primaryKey = 'numero';
    protected $fillable = ['type', 'dateExpiration', 'id'];

    public function chauffeur()
    {
        return $this->belongsTo(Chauffeur::class);
    }

}
