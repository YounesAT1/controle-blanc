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
        Schema::create('offres', function (Blueprint $table) {
            $table->id('idO');
            $table->string('titre');
            $table->decimal('salaire', 8, 2);
            $table->bigInteger('idE')->unsigned();
            $table->bigInteger('idSpe')->unsigned();
            $table->foreign('idE')->references('idE')->on('entreprises')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('idSpe')->references('idSpe')->on('specialites')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('offres');
    }
};
