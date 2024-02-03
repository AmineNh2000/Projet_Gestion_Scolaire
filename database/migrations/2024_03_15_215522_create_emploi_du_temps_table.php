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
        Schema::create('emploi_du_temps', function (Blueprint $table) {
            $table->id();

            $table->string('jour');
            $table->time('heure_debut');
            $table->time('heure_fin');

            $table->unsignedBigInteger('professeur_id'); 
            $table->foreign('professeur_id')->references('id')->on('users');

            $table->unsignedBigInteger('salle_id'); 
            $table->foreign('salle_id')->references('id')->on('salles');

            $table->unsignedBigInteger('cours_id'); 
            $table->foreign('cours_id')->references('id')->on('cours');
            
            $table->unsignedBigInteger('niveau_id'); 
            $table->foreign('niveau_id')->references('id')->on('niveaux');
            
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
        Schema::dropIfExists('emploi_du_temps');
    }
};
