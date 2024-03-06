<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('livraisons', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->string('villeDepart');
            $table->string('villeArriver');
            $table->boolean('arriverOuNon');
            $table->bigInteger('idChauffeur')->unsigned();
            $table->bigInteger('idCamion')->unsigned();
            $table->foreign('idChauffeur')->references('id')->on('chauffeurs')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('idCamion')->references('matricule')->on('camions')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('livraisons');
    }
};
