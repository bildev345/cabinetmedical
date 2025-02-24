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
        Schema::create('resultat_analyses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('analyse_id')->constrained();
            $table->foreignId('type_analyse_id')->constrained();
            $table->text('resultat');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resultats_analyses');
    }
};
