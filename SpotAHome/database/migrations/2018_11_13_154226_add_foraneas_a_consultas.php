<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForaneasAConsultas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('consultas', function (Blueprint $table) {
            $table->foreign('id_inquilino')->references('id_inquilino')->on('inquilino');
        });

        Schema::table('consultas', function (Blueprint $table) {
            $table->foreign('id_dueno')->references('id_dueno')->on('dueno');
        });

        Schema::table('consultas', function (Blueprint $table) {
            $table->foreign('id_propiedad')->references('id_propiedad')->on('propiedad');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('consultas', function (Blueprint $table) {
            $table->dropForeign(['id_inquilino']);
            $table->dropColumn(['id_inquilino']);
        });

        Schema::table('consultas', function (Blueprint $table) {
            $table->dropForeign(['id_dueno']);
            $table->dropColumn(['id_dueno']);
        });

        Schema::table('consultas', function (Blueprint $table) {
            $table->dropForeign(['id_propiedad']);
            $table->dropColumn(['id_propiedad']);
        });
    }
}
