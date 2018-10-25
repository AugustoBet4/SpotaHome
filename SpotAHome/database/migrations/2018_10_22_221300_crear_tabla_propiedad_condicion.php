<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaPropiedadCondicion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('propiedad_condicion', function (Blueprint $table) {
            $table->increments('id_propiedad_condicion')->unique();
            $table->integer('id_condiciones');
            $table->integer('id_propiedad');
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
        Schema::dropIfExists('propiedad_condicion');
    }
}
