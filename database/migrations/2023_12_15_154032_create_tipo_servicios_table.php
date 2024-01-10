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
        Schema::create('tipo_servicios', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->float('precio');
            $table->boolean('status');
            /* Relacion 1 a muchos con Servicios. 1 Servicio Tienes Varios Tipos de Servicios*/
            $table->unsignedBigInteger('servicio_id');
            $table->foreign('servicio_id')->references('id')->on('servicios')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tipo_servicios');
    }
};
