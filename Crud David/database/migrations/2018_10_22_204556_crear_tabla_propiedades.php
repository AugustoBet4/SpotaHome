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
            $table->string('direccion');
            $table->string('ciudad');
            $table->double('latitud', 5, 20);
            $table->double('longitud', 5, 20);
            $table->integer('id_duenos');
            $table->longText('descripcion');
            $table->double('costo', 10, 5);
            $table->integer('id_fecha_disponibles');
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
