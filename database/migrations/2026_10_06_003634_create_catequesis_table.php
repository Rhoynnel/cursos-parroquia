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
        Schema::create('catequesis', function (Blueprint $table) {
            $table->id();

            // foreignId crea la columna (unsignedBigInteger) y constrained crea la relación
            $table->foreignId('id_centro')
                ->constrained('centros')
                ->onDelete('cascade');

            $table->foreignId('id_curso')
                ->constrained('cursos')
                ->onDelete('cascade');

            $table->foreignId('id_estudiante')
                ->constrained('estudiantes')
                ->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('catequesis');
    }
};
