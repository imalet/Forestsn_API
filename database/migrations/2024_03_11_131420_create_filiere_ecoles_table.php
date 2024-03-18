<?php

use App\Models\Accreditation;
use App\Models\Ecole;
use App\Models\Filiere;
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
        Schema::create('filiere_ecoles', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Ecole::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Filiere::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Accreditation::class)->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('filiere_ecoles');
    }
};
