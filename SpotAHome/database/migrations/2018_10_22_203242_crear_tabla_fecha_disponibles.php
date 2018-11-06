<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaFechaDisponibles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fecha_disponibilidad', function (Blueprint $table) {
            $table->increments('id_fecha_disponibilidad')->unique();
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
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
        Schema::dropIfExists('fecha_disponibilidad');
    }
}
