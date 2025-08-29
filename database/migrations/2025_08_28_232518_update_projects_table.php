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
        Schema::table('projects', function (Blueprint $table) {
            // Eliminar columnas
            $table->dropColumn(['subtitulo', 'frase']);
            
            // Agregar columna boolean
            $table->boolean('es_branding')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            // Volver a crear columnas eliminadas
            $table->string('subtitulo')->nullable();
            $table->string('frase')->nullable();

            // Eliminar la columna agregada
            $table->dropColumn('es_branding');
        });
    }
};
