<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCuponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cupons', function (Blueprint $table) {
            $table->id();
            $table->string('codigo');
            $table->decimal('descuento');
            $table->decimal('descuento_maximo');
            $table->decimal('monto_minimo');
            $table->date('fecha_expiracion');
            $table->integer('usos');
            $table->string('sucursales'); // CheckBox de Id_Sucursales [1,2,3..]
            $table->boolean('es_porcentaje');
            $table->boolean('activo');
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
        Schema::dropIfExists('cupons');
    }
}
