<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaInquilinos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //

        Schema::create('inquilinos', function (Blueprint $table) {
            $table->increments('id_inquilinos')->unique();
            $table->string('nombre');
            $table->string('email');
            $table->string('telefono');
            $table->date('fecha_nacimiento');
            $table->string('genero');
            $table->string('nacionalidad');
            $table->string('usuario');
            $table->string('contraseña');
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
        Schema::dropIfExists('inquilinos');
    }
}
