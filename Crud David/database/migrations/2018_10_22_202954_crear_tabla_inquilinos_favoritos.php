<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaInquilinosFavoritos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inquilinos_favoritos', function (Blueprint $table) {
            $table->increments('id_inquilinos_favoritos')->unique();
            $table->integer('id_propiedades')->unsigned();
           // $table->foreign('id_propiedades')->references('id_propiedades')->on('propiedades');
            $table->integer('id_inquilinos')->unsigned();
            //$table->foreign('id_inquilinos')->references('id_inquilinos')->on('inquilinos');
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
        Schema::dropIfExists('inquilinos_favoritos');
    }
}
