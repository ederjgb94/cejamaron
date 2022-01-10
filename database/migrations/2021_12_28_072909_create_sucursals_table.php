<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->string('mac1');
            $table->string('mac2');
            $table->string('mac3');
            $table->string('mac4');
            $table->string('codigo_remoto');
            $table->string('razon_social');
            $table->string('correo');
            $table->boolean('activo')->default(true);
            $table->timestamps();
        });

        Schema::create('sucursal_usuario', function(Blueprint $table){
            $table->unsignedBigInteger('sucursal_id');
            $table->unsignedBigInteger('usuario_id');

            $table->primary(['sucursal_id','usuario_id']);
            
            $table->foreign('sucursal_id')->references('id')->on('sucursals')->onDelete('cascade');
            $table->foreign('usuario_id')->references('id')->on('usuarios')->onDelete('cascade');
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
    }
}
