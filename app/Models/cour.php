<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cour extends Model
{
    use HasFactory;
    protected $fillable = ['nom_du_cours', 'description', 'id_user', 'file' ,'image'];


    public function professors()
    {
        return $this->belongsToMany(User::class, 'Enseignant_cours','cours_id', "enseignant_id");
    }

    public function Fillieres()
    {
        return $this->belongsToMany(Filiere::class, 'cour_fillieres');
    }
}
