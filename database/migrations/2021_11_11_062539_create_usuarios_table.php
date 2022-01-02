<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('correo');
            $table->boolean('confirmacion')->default(false);
            $table->string('telefono');
            $table->string('imagen')->default('404');
            $table->string('usuario');
            $table->string('clave');
            $table->boolean('activo')->default(true);
            $table->timestamps();
        });
        // Schema::table('oproductos', function (Blueprint $table) {
        //     $table->foreignId('usuario_id')->constrained();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
}
