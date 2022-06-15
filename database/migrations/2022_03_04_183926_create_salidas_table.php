<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalidasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salidas', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('id_sucursal_origen');
            $table->foreign('id_sucursal_origen')->references('id')->on('sucursals');

            $table->unsignedBigInteger('id_sucursal_destino');
            $table->foreign('id_sucursal_destino')->references('id')->on('sucursals');

            $table->json('productos');
            $table->string('folio')->unique();
            $table->date('fecha_salida');
            $table->foreignId('usuario_id')->constrained();
            $table->decimal('total_importe');
            $table->boolean('cancelado')->default(false);
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
        Schema::dropIfExists('salidas');
    }
}
