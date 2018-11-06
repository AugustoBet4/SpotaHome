<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaCondiciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('condicion', function (Blueprint $table) {
            $table->increments('id_condiciones')->unique();
            $table->integer('mascotas_permitidas');
            $table->integer('apto_fumadores');
            $table->integer('apto_parejas');
            $table->integer('solo_estudiantes');
            $table->integer('solo_mujeres');
            $table->integer('solo_hombres');
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
        //
        Schema::dropIfExists('condicion');
    }
}
