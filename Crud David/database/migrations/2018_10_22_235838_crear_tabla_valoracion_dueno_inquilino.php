<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaValoracionDuenoInquilino extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('valoracion_dueno_inquilino', function (Blueprint $table) {
           $table->increments('id_valoracion_dueno_inquilino')->unique();
            $table->integer('id_inquilinos');
            $table->integer('id_dueno');
            
           

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
        Schema::dropIfExists('valoracion_dueno_inquilino');
        //
    }
}
