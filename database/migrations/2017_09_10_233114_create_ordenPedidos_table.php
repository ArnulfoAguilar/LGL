<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdenPedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordenPedidos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cliente_id')->unsigned()->nullable();
            $table->integer('municipio_id')->unsigned()->nullable();
            $table->string('numero')->nullable();
            $table->string('detalle',140)->default('Sin detalle especifico');
            $table->string('rutaArchivo')->nullable();
            $table->date('fechaIngreso');
            $table->string('despachadoPor')->nullable();
            $table->string('direccion',140)->nullable();
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
        Schema::dropIfExists('ordenPedidos');
    }
}
