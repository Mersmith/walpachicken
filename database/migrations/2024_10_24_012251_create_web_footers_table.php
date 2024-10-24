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
        Schema::create('web_footers', function (Blueprint $table) {
            $table->id();

            $table->json('primera_columna');
            $table->json('segunda_columna');
            $table->json('tercera_columna');
            $table->json('cuarta_columna');
            $table->string('derechos');
            $table->boolean('activo')->default(false)->comment('1 ACTIVADO, 0 DESACTIVADO');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('web_footers');
    }
};
