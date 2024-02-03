<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filiere extends Model
{
    use HasFactory;
    protected $fillable = ['nom', 'code', 'description'];



    public function Etudiants()
    {
        return $this->hasMany(User::class);
    }

    public function departement()
    {
        return $this->belongsTo(Departement::class, 'Departement');
    }

    public function courses()
    {
        return $this->belongsToMany(cour::class, 'cour_fillieres');
    }


}
