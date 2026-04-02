<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('audit_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('accion');         // proyecto_creado, proyecto_editado, proyecto_eliminado, etc.
            $table->string('entidad_tipo');   // Project, Image, Branding
            $table->unsignedBigInteger('entidad_id')->nullable();
            $table->string('entidad_nombre'); // Nombre del proyecto afectado
            $table->json('detalles')->nullable(); // Datos extra (campos modificados, etc.)
            $table->string('ip')->nullable();
            $table->timestamp('created_at')->useCurrent();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('audit_logs');
    }
};