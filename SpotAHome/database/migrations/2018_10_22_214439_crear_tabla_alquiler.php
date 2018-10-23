<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaAlquiler extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('alquiler', function (Blueprint $table) {
            $table->increments('id_alquiler')->unique();
            $table->dato('status_alquiler');
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->integer('id_propiedad');
            $table->integer('id_inquilino');
            $table->timestamps();
            $table->softDeletes();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('alquiler');
    }
}
