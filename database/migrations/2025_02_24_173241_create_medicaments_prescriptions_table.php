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

        Schema::create('medicaments_prescriptions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('medicament_id');
            $table->foreignId('prescription_id');
            $table->text('note');
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
