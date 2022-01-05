<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOperacionProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('operacion_productos', function (Blueprint $table) {
            $table->id();
            $table->integer('operacion');
            $table->boolean('confirmar')->default(false);
            $table->timestamps();
        });
        Schema::table('operacion_productos', function (Blueprint $table) {
            $table->foreignId('producto_id')->constrained();
        });
        Schema::table('operacion_productos', function (Blueprint $table) {
            $table->foreignId('usuario_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('operacion_productos');
    }
}
