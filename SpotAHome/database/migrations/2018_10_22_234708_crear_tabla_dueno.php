<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaDueno extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
          Schema::create('dueno', function (Blueprint $table) {
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
         
         Schema::dropIfExists('dueno');
    }
}
