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

        Schema::create('chirurgies', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->text('libelle_chirurgie');
            $table->text('observation');
            $table->foreignId('consultation_id')->constrained();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chirurgies');
    }
};
