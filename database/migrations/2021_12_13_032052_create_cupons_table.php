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
            $table->string('codigo')->unique();
            $table->decimal('descuento');
            $table->decimal('descuento_maximo');
            $table->decimal('monto_minimo');
            $table->date('fecha_expiracion');
            $table->integer('usos')->default(1);
            $table->json('sucursales'); // CheckBox de Id_Sucursales [1,2,3..]
            $table->boolean('es_porcentaje');
            $table->boolean('activo')->default(true);
            $table->timestamps();
        });
        Schema::table('cupons', function (Blueprint $table) {
            $table->foreignId('usuario_id')->constrained()->onDelete('cascade');
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
