<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaPropiedadCaracteristicas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('propiedad_caracteristicas', function (Blueprint $table) {
            $table->increments('id_propiedad_caracteristicas')->unique();
            $table->integer('id_propiedad')->unsigned();
            $table->integer('id_caracteristicas')->unsigned();
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
        Schema::dropIfExists('propiedad_caracteristicas');
    }
}
