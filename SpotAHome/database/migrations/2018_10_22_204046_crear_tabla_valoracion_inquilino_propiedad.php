<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaValoracionInquilinoPropiedad extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('valoracion_inquilino_propiedad', function (Blueprint $table) {
            $table->increments('id_valoracion_inquilino_propiedad')->unique();
            $table->integer('puntuacion');
            $table->string('comentario');
            $table->integer('id_inquilinos');
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
        Schema::dropIfExists('valoracion_inquilino_propiedad');
    }
}
