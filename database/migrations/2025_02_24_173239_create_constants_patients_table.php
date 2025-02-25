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
        Schema::disableForeignKeyConstraints();

        Schema::create('constant_patients', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_id')->constrained();
            $table->foreignId('constant_id')->constrained();
            $table->date('date');
            $table->text('valeur');
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('constants_patients');
    }
};
