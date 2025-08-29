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
        Schema::table('images', function (Blueprint $table) {
            // Agregamos la nueva columna
            $table->foreignId('branding_id')
                ->nullable()
                ->after('project_id') // la agrega después de project_id
                ->constrained('brandings')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('images', function (Blueprint $table) {
            // Revertimos el cambio
            $table->dropForeign(['branding_id']);
            $table->dropColumn('branding_id');
        });
    }
};
