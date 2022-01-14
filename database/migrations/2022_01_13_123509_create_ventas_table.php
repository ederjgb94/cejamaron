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
            $table->date('fecha_venta');
            $table->integer('metodo_pago'); // [1]Efectivo, [2]Debito, [3]Credito
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
