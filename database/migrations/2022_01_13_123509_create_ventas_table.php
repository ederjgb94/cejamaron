<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventas', function (Blueprint $table) {
            $table->id();
            $table->decimal('total');
            $table->string('folio');
            $table->string('folio_corte')->nullable();//ATENDER!!!
            $table->date('fecha_venta');
            $table->json('metodo_pago'); //Efectivo,Credito,Debito,Cheque,Transferencia
            $table->integer('tipo');//[1]Normal [2]Vendedor [3]Especial,
            $table->foreignId('sucursal_id')->constrained()->onDelete('cascade');
            $table->foreignId('usuario_id')->nullable()->constrained();
            $table->boolean('cancelacion')->default(false);
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
        Schema::dropIfExists('ventas');
    }
}
