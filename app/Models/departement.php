<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class departement extends Model
{
    protected $fillable = ['nom_Departement',];

    use HasFactory;

    public function filieres()
    {
        return $this->hasMany(Filiere::class, 'Departement');
    }
}
