<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbonoCreditosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abono_creditos', function (Blueprint $table) {
            $table->id();
            $table->string('folio')->unique();
            $table->json('metodo_pago');
            $table->decimal('total_abonado');
            $table->dateTime('fecha');
            $table->foreignId('clientes_creditos_id')->constrained();
            $table->string('folio_corte');
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
        Schema::dropIfExists('abono_creditos');
    }
}
