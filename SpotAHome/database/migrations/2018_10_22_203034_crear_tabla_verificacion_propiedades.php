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
        Schema::create('verificacion_propiedad', function (Blueprint $table) {
            $table->increments('id_verificacion_propiedad')->unique();
            $table->string('estado');
            $table->date('fecha');
            $table->time('hora');
            $table->string('observaciones');
            $table->integer('id_empleado')->unsigned();
            $table->integer('id_propiedad')->unsigned();
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
        Schema::dropIfExists('verificacion_propiedad');
    }
}
