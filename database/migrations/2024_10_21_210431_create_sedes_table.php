<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sedes', function (Blueprint $table) {
            $table->id();

            $table->string('nombre');
            $table->foreignId('distrito_id')->constrained('distritos')->onDelete('cascade');
            $table->string('celular')->nullable();
            $table->string('google_maps')->nullable();
            $table->string('direccion')->nullable();
            $table->string('referencia')->nullable();
            $table->string('imagen_ruta')->nullable();
            $table->boolean('activo')->default(false)->comment('1 ACTIVADO, 0 DESACTIVADO');

            $table->softDeletes(); // Asegura que el campo `deleted_at` se agregue correctamente
            $table->timestamps();
        });

        // Agregar el trigger para prevenir eliminaciones
        DB::unprepared('
           CREATE TRIGGER prevenir_eliminar_sede
           BEFORE DELETE ON sedes
           FOR EACH ROW
           BEGIN
               SIGNAL SQLSTATE "45000" 
               SET MESSAGE_TEXT = "No se permite eliminar registros de la tabla sedes.";
           END;
       ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Eliminar el trigger antes de eliminar la tabla
        DB::unprepared('DROP TRIGGER IF EXISTS prevenir_eliminar_sede');

        Schema::dropIfExists('sedes');
    }
};
