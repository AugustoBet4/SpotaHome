<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use \Illuminate\Database\Eloquent\SoftDeletes;

class CrearTablaDueno extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
          Schema::create('duenos', function (Blueprint $table) {
           $table->increments('id_duenos')->unique();
           $table->string('nombre');
           $table->string('email');
           $table->string('telefono');
           $table->date('fecha_nacimiento');
           $table->string('genero');
           $table->string('nacionalidad');
           $table->string('usuario');
           $table->string('contrasena');
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
         
         Schema::dropIfExists('duenos');
    }
}
