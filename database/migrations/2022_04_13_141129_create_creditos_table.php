<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCreditosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('creditos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cliente_creditos_id')->constrained();
            $table->unsignedBigInteger('id_cajero_registro');
            $table->foreign('id_cajero_registro')->references('id')->on('usuarios');
            $table->json('productos');
            $table->decimal('total');
            $table->decimal('total_pagado');
            $table->dateTime('fecha_de_credito');
            $table->string('folio')->unique();
            $table->foreignId('sucursal_id')->nullable()->constrained();
            $table->integer('estado')->default(0); //0 pendiente, 1 liquidado 2 cancelado
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
        Schema::dropIfExists('creditos');
    }
}
