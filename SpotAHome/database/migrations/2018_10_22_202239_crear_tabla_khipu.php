<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaKhipu extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('khipus', function (Blueprint $table) {
            $table->increments('id_khipus')->unique();
            $table->integer('id_pagos')->unsigned();
            $table->foreign('id_pagos')->references('id_pagos')->on('pagos');
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
        Schema::dropIfExists('khipus');
    }
}
