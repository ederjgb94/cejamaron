<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClienteFacturasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cliente_facturas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('venta_id')->unique()->constrained();
            $table->foreignId('cliente_id')->constrained();
            $table->string('uso_factura');
            $table->json('metodo_pago');
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
        Schema::dropIfExists('cliente_facturas');
    }
}
