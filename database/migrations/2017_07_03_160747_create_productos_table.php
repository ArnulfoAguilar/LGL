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
            $table->integer('unidadMedida_id')->unsinged();
            $table->integer('tipoProducto_id')->unsinged();
            $table->integer('categoria_id')->unsinged();
            $table->string('nombre')->unique();
            $table->string('codigo')->unique()->nullable();
            $table->float('existenciaMin',8,2)->default(0);
            $table->float('existenciaMax',8,2)->default(1000);
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
