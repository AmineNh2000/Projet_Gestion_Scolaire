<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Role;
use App\Models\User;
use App\Models\Salle;
use App\Models\Classe;
use App\Models\Branche;
use App\Models\cour;
use App\Models\Filiere;
use App\Models\departement;
use App\Models\departements;
use App\Models\niveau;
use Illuminate\Database\Seeder;
use Database\Factories\ProfFactory;
use Database\Factories\SalleFactory;
use Illuminate\Support\Facades\Hash;
use Database\Factories\EtudiantFactory;
use Faker\Factory as Faker;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Role::insert([
            [
                'id' => 'admin',
                'role_name' => 'admin',
            ],
            [
                'id' => 'prof',
                'role_name' => 'prof',
            ],
            [
                'id' => 'etudiant',
                'role_name' => 'etudiant',
            ],
            [
                'id' => 'candidat',
                'role_name' => 'candidat',
            ],

        ]);

        User::insert([
            [
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' =>Hash::make('00000000'),
            'user_name' => 'admin',
            'RoleID' => 'admin'
            ],   
        ]);



        // for ($i=0; $i < 10 ; $i++) { 
        //     User::insert([
        //         [
        //         'name' => `prof{$i}`,
        //         'email' => `prof{$i}@gmail.com`,
        //         'password' =>Hash::make('00000000'),
        //         'user_name' => `professeur{$i}`,
        //         'RoleID' => 'prof'
        //         ],   
        //     ]);
        // }

        // for ($i=0; $i < 10 ; $i++) { 
        //     User::insert([
        //         [
        //         'name' => `etudiant{$i}`,
        //         'email' => `etudiant{$i}@gmail.com`,
        //         'password' =>Hash::make('00000000'),
        //         'user_name' => `etudiant{$i}`,
        //         'RoleID' => 'etudiant'
        //         ],   
        //     ]);
        // }

        // for ($i=0; $i < 10 ; $i++) { 
        //     Salle::insert([
        //         [
        //         'nom' => `etudiant{$i}`,
        //         'capacite' => rand(20, 100),
        //         'description' =>Hash::make('00000000'),
        //         'disponibilite' => `libre`,
        //         ],   
        //     ]);
        // }

        // // Generate 30 fake records using ProfFactory
        // User::factory(ProfFactory::class)->count(15)->create();

        // // Generate 20 fake records using EtudiantFactory
        // User::factory(EtudiantFactory::class)->count(60)->create();

                    departement::insert([
                [

                'nom_Departement' => 'informatique',
                'description' => 'departement informatique'

                ],   
            ]);


            // model cours
            // Occurrence 1
cour::insert([
    'nom_du_cours' => 'HTML',
    'description' => 'HTML pour créer la structure de page web',
    'image'=>'image',
    'file'=>'image'

]);

// Occurrence 2
cour::insert([
    'nom_du_cours' => 'CSS',
    'description' => 'CSS pour styliser les pages web',
    'image'=>'image',
        'file'=>'image'

]);

// Occurrence 3
cour::insert([
    'nom_du_cours' => 'JavaScript',
    'description' => 'JavaScript pour la programmation côté client',
    'image'=>'image',
    'file'=>'image'

]);

// Occurrence 4
cour::insert([
    'nom_du_cours' => 'PHP',
    'description' => 'PHP pour le développement web côté serveur',
    'image'=>'image',
    'file'=>'image'

]);

// Occurrence 5
cour::insert([
    'nom_du_cours' => 'Laravel',
    'description' => 'Laravel pour le développement web avec PHP',
    'image'=>'image',
    'file'=>'image'

]);

// Occurrence 6
cour::insert([
    'nom_du_cours' => 'Python',
    'description' => 'Python pour le développement logiciel',
    'image'=>'image',
    'file'=>'image'

]);

// Occurrence 7
cour::insert([
    'nom_du_cours' => 'SQL',
    'description' => 'SQL pour la gestion des bases de données',
    'image'=>'image',
    'file'=>'image'

]);

// modelniveau

niveau::insert([
    'niveau' => 'S1',
]);
niveau::insert([
    'niveau' => 'S2',
]);
niveau::insert([
    'niveau' => 'S3',
]);
niveau::insert([
    'niveau' => 'S4',
]);
niveau::insert([
    'niveau' => 'S5',
]);
niveau::insert([
    'niveau' => 'S6',
]);

// model filieres
Filiere::insert([
    'nom' => 'Technologie de Multimedia et du web',
    'code' => 'TMW',
    'Departement' => 1,

]);

Filiere::insert([
    'nom' => 'licence en informatique',
    'code' => 'CLE',
    'Departement' => 1,
]);

        User::factory()->count(50)->create(); //

        //  // Generate 20 fake records using SallesFactory
        //  User::factory(SalleFactory::class)->count(8)->create();
        Salle::factory()->count(8)->create();
        // SalleFactory::new()->count(8)->create();

        


        


    }
}
