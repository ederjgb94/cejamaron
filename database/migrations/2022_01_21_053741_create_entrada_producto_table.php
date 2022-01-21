<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntradaProductoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entrada_producto', function (Blueprint $table) {
            $table->foreignId('entrada_id')->constrained();
            $table->foreignId('producto_id')->constrained();
            $table->decimal('costo');
            $table->integer('cantidad');            
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
        Schema::dropIfExists('entrada_producto');
    }
}
