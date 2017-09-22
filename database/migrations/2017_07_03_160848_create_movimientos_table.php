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
            $table->integer('kardex_id')->unsigned();
            $table->integer('tipoMovimiento_id')->unsigned();
            $table->date('fechaIngreso');
            $table->string('detalle',140)->default('Sin detalle');
            $table->float('cantidadExistencia',16,2)->nullable();
            $table->float('valorUnitarioExistencia',8,2)->nullable();
            $table->float('valorTotalExistencia',16,2)->nullable();
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
