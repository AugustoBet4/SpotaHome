<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaVerificacionPropiedades extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('verificacion_propiedades', function (Blueprint $table) {
            $table->increments('id_verificacion_propiedades')->unique();
            $table->integer('id_propiedades')->unsigned();
            $table->integer('id_empleado')->unsigned();
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
        Schema::dropIfExists('verificacion_propiedades');
    }
}
