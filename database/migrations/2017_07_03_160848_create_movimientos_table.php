<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMovimientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movimientos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('producto_id')->unsigned();
            $table->string('detalle',100);
            // $table->string('tipo',10);
            // $table->float('cantidad',8,2);
            // $table->float('valor_unitario',8,2);
            $table->float('cantidad_existencia',8,2)->nullable();
            $table->float('valor_unitario_existencia',8,2)->nullable();
            // $table->string('proveedor',50)->nullable();
            // $table->integer('detalleMovimiento_id')->unsigned();
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
        Schema::dropIfExists('movimientos');
    }
}
