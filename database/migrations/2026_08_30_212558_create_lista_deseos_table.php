<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('lista_deseos', function (Blueprint $table) {
            $table->id('id_lista');

            $table->unsignedBigInteger('id_usuario');
            $table->unsignedBigInteger('id_servicio');

            $table->dateTime('fecha_agregado')->useCurrent();

            $table->foreign('id_usuario')
                ->references('id_usuario')
                ->on('usuarios')
                ->onDelete('cascade');

            $table->foreign('id_servicio')
                ->references('id_servicio')
                ->on('servicios_medicos')
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('lista_deseos');
    }
};