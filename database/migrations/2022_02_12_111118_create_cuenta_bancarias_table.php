<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCuentaBancariasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuenta_bancarias', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('telefono')->nullable();
            $table->string('cuenta')->nullable();
            $table->string('tarjeta')->nullable();
            $table->string('clave_interbancaria')->nullable();
            $table->integer('tipo_cuenta')->nullable();//Visa,Mastercard
            $table->string('banco')->nullable();
            $table->string('descripcion')->nullable();
            $table->foreignId('proveedor_id')->constrained();
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
        Schema::dropIfExists('cuenta_bancarias');
    }
}
