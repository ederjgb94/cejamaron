<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class CreateSucursalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sucursals', function (Blueprint $table) {
            $table->id();
            $table->string('puerta_enlace1');
            $table->string('puerta_enlace2')->nullable();
            $table->string('puerta_enlace3')->nullable();
            $table->string('puerta_enlace4')->nullable();
            $table->string('codigo_remoto');
            $table->string('razon_social');
            $table->string('direccion');
            $table->string('correo');
            $table->string('telefono')->nullable();
            $table->boolean('activo')->default(true);
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
        Schema::dropIfExists('sucursals');
        Schema::dropIfExists('sucursal_usuario');
    }
}
