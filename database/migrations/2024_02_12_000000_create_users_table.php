<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('Prenom')->nullable();
            $table->string('image')->nullable();
            $table->string('Address')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('user_name')->nullable();
            // $table->string('RoleID', 10)->default('etudiant');
            $table->date('date_naissance')->nullable();
            $table->integer('note_bac')->nullable();
            $table->integer('note_diplome')->nullable();
            $table->string('num_identite')->unique()->nullable();
            $table->string('genre')->nullable();

            $table->string('RoleID', 10);
            $table->foreign('RoleID')->references('id')->on('roles'); 

            // $table->string('Departement', 10)->default('informatique');;
            // $table->foreign('Departement')->references('id')->on('departements');
            $table->unsignedBigInteger('Departement')->nullable(); 
            $table->foreign('Departement')->references('id')->on('departements');

            //filliere
            $table->unsignedBigInteger('filliere')->nullable(); 
            $table->foreign('filliere')->references('id')->on('filieres');
            
            //niveau
            $table->unsignedBigInteger('niveau_id')->nullable(); 
            $table->foreign('niveau_id')->references('id')->on('niveaux');


            //data naiss

            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
