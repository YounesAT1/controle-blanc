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
        Schema::create('postulers', function (Blueprint $table) {
            $table->id('idP');
            $table->string('etat');
            $table->bigInteger('idSt')->unsigned();
            $table->bigInteger('idO')->unsigned();
            $table->foreign('idSt')->references('idSt')->on('stagiaires')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('idO')->references('idO')->on('offres')->onDelete('cascade')->onUpdate('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('postulers');
    }
};
