<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaPropiedades extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('propiedades', function (Blueprint $table) {
            $table->increments('id_propiedades');
            $table-> dato ('direccion');
            $table-> dato ('ciudad');
            $table-> dato ('latitud');
            $table-> dato ('longitud');
            $table-> dato ('id_duenos');
            $table-> dato ('descripcion');
            $table-> dato ('costo');
            $table-> dato ('id_fecha_disponibles');
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
        Schema::dropIfExists('propiedades');
    }
}
