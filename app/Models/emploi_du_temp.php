<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;




class emploi_du_temp extends Model
{
    protected $fillable = [
        'jour',
        'heure_debut',
        'heure_fin',
        'professeur_id',
        'salle_id',
        'cours_id',
        'niveau_id',
    
    ];
    use HasFactory;

    
}
