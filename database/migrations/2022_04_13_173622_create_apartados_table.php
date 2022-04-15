<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApartadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apartados', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('telefono');
            $table->string('correo');
            $table->unsignedBigInteger('id_cajero_registro');
            $table->foreign('id_cajero_registro')->references('id')->on('usuarios');
            $table->unsignedBigInteger('id_cajero_entrega');
            $table->foreign('id_cajero_entrega')->references('id')->on('usuarios');

            $table->json('productos');
            $table->decimal('total');
            $table->decimal('total_pagado');
            $table->json('metodo_pago');
            $table->dateTime('fecha_de_apartado');
            $table->integer('dias_maximo');
            $table->string('folio');
            $table->dateTime('fecha_entrega');
            $table->integer('estado')->default(0); //0 pendiente, 1 entregado, 2 cancelado, 3 expiró
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('apartados');
    }
}
