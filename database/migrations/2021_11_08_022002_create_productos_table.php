<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreateProductosTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('codigo');
            $table->string('nombre');
            $table->string('presentacion');
            $table->decimal('iva')->default(16);
            $table->decimal('menudeo')->default(0);
            $table->decimal('mayoreo')->default(0);
            $table->integer('cantidad_mayoreo')->default(0);
            $table->decimal('especial')->default(0);
            $table->decimal('vendedor')->default(0);
            $table->string('imagen')->default('404');
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
        Schema::dropIfExists('productos');
    }
}
