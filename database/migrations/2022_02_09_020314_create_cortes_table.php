<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCortesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cortes', function (Blueprint $table) {
            $table->id();
            $table->decimal('fondo_apertura');
            $table->decimal('total_efectivo');
            $table->string('folio_corte');
            $table->decimal('total_tarjetas_debito');
            $table->decimal('total_tarjetas_credito');
            $table->decimal('total_cheques');
            $table->decimal('total_transferencias');
            $table->decimal('efectivo_apartados');
            $table->decimal('efectivo_creditos');
            $table->json('gastos'); //[]
            $table->json('ingresos');
            $table->decimal('sobrante');
            $table->date('fecha_apertura_caja');
            $table->date('fecha_corte_caja');
            $table->foreignId('sucursal_id')->constrained();
            $table->foreignId('usuario_id')->constrained();
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
        Schema::dropIfExists('cortes');
    }
}
