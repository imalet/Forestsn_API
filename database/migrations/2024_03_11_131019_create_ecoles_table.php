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
        Schema::create('ecoles', function (Blueprint $table) {
            $table->id();
            $table->string('imageFont')->nullable();
            $table->string('logo')->nullable();
            $table->string('nom_ecole')->nullable();
            $table->string('abreviation_nom')->nullable();
            $table->text('description')->nullable();
            $table->decimal('frais_scolaire', 10, 2)->nullable();
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ecoles');
    }
};
