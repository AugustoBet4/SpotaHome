<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaFacturaDetalles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('factura_detalles', function (Blueprint $table) {
            $table->increments('id_factura_detalles')->unique();
            $table->integer('id_factura_cabacera')->unsigned();
            //$table->foreign('id_factura_cabacera')->references('id_factura_cabacera')->on('factura_cabecera');
            $table->integer('id_comisiones')->unsigned();
           // $table->foreign('id_comisiones')->references('id_comisiones')->on('comisiones');
            $table->integer('id_pagos')->unsigned();
            //$table->foreign('id_pagos')->references('id_pagos')->on('pagos');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('factura_detalles');
    }
}
