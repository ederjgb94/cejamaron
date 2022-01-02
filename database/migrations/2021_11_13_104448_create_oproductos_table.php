<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOproductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oproductos', function (Blueprint $table) {
            $table->id();
            $table->string('accion');
            $table->boolean('confirmar')->default(false);
            $table->timestamps();
        });
        Schema::table('oproductos', function (Blueprint $table) {
            $table->foreignId('producto_id')->constrained();
        });
        Schema::table('oproductos', function (Blueprint $table) {
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
        Schema::dropIfExists('oproductos');
    }
}
