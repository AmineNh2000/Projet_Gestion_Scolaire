<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'prenom',
        'email',
        'password',
        'phone_number',
        'user_name',
        'Prenom',
        'RoleID',
        'image',
        'Departement',
        'date_naissance',
        'note_diplome',
        'note_bac',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

//etu
    public function Filliere()
    {
        return $this->belongsTo(Filiere::class);
    }
//etu , prof
    public function Departement()
    {
        return $this->belongsTo(departement::class);
    }
//etudiant
    public function Niveau()
    {
        return $this->belongsTo(niveau::class);
    }
//prof
    public function courses()
    {
        return $this->belongsToMany(cour::class, 'Enseignant_cours','enseignant_id', 'cours_id');
    }
//prof
    public function Emplois_temps()
    {
        return $this->hasMany(emploi_du_temp::class);
    }


}
