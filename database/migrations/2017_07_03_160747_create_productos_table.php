<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('nombre');
            $table->string('codigo')->unique()->nullable();
            $table->integer('unidadMedida_id')->unsinged();
            $table->integer('tipoProducto_id')->unsinged();
            $table->float('cantidad',8,2)->nullable();
            $table->float('valorUnitario',8,2)->nullable();
            $table->float('valorTotal',8,2)->nullable();
            $table->float('existenciaMin',8,2)->nullable();
            $table->float('existenciaMax',8,2)->nullable();
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
