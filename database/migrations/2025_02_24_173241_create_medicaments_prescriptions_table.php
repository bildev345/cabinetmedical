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

        Schema::create('medicament_prescriptions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('medicament_id')->constrained();
            $table->foreignId('prescription_id')->constrained();
            $table->text('note');
            $table->timestamps();

        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medicaments_prescriptions');
    }
};
