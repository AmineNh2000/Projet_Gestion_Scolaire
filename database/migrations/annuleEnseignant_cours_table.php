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
        Schema::create('Enseignant_cours', function (Blueprint $table) {
            $table->id();
            // $table->string('enseignant_id');
            // $table->string('cours_id');
            $table->unsignedBigInteger('enseignant_id');
            $table->foreign('enseignant_id')->references('id')->on('users');
            $table->unsignedBigInteger('cours_id');
            $table->foreign('cours_id')->references('id')->on('cours');
            // remaing to migrate
            $table->unsignedBigInteger('filliere_id');
            $table->foreign('filliere_id')->references('id')->on('filieres');

            // $table->enum('statut', ['confirmée', 'annulée'])->default('confirmée');  //Le statut de l'inscription (confirmée, en attente, annulée, etc.).
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
        Schema::dropIfExists('Enseignant_cours');
    }
};
