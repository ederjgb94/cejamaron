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
            $table->foreignId('cliente_creditos_id')->constrained();
            $table->unsignedBigInteger('id_cajero_registro');
            $table->foreign('id_cajero_registro')->references('id')->on('usuarios');
            $table->unsignedBigInteger('id_cajero_entrega')->nullable();
            $table->foreign('id_cajero_entrega')->references('id')->on('usuarios');
            $table->json('productos');
            $table->decimal('total');
            $table->decimal('total_pagado');
            $table->json('metodo_pago');
            $table->dateTime('fecha_de_apartado');
            $table->string('folio')->unique();
            $table->dateTime('fecha_entrega')->nullable();
            $table->foreignId('sucursal_id')->nullable()->constrained();
            $table->integer('estado')->default(0); //0 pendiente, 1 expiró, 2 cancelado, 3 pagado
            $table->string('observaciones')->nullable();
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
