<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaFacturaCabecera extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('factura_cabecera', function (Blueprint $table) {
           $table->increments('id_factura_cabecera')->unique();
           $table->string('nombre');
           $table->timestamp('fecha');
           $table->string('codigo_control');
           $table->integer('nit');
           $table->integer('autorizacion');
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
        Schema::dropIfExists('factura_cabecera');
    }
}
