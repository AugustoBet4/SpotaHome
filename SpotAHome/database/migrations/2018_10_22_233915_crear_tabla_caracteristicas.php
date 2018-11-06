<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaCaracteristicas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('caracteristicas', function (Blueprint $table) {
           $table->increments('id_caracteristicas')->unique();
            $table->integer('amueblado');
            $table->integer('estanteria');
            $table->integer('armario');
            $table->integer('ventana');
            $table->integer('calefaccion');
            $table->integer('patio');
            $table->integer('aire_acondicionado');
            $table->integer('deposito');
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
         Schema::dropIfExists('caracteristicas');
    }
}
