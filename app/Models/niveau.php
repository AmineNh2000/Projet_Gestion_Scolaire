<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class niveau extends Model
{
    protected $fillable = [
        'nom_niveau',
        'niveau',
        'id_branche',
    
    ];
    use HasFactory;
}
