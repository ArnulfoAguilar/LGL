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
            $table->string('numero')->nullable();
            $table->string('despachadoPor')->nullable();
            $table->string('rutaArchivo')->nullable();
            $table->integer('cliente_id')->unsigned()->nullable();
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
