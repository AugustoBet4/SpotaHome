<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AgregarForaneas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('factura_detalle', function (Blueprint $table) {
           $table->foreign('id_comision')->references('id_comision')->on('comision');
        });

        Schema::table('factura_detalle', function (Blueprint $table) {
            $table->foreign('id_factura_cabecera')->references('id_factura_cabecera')->on('factura_cabecera');
         });

        Schema::table('factura_detalle', function (Blueprint $table) {
           $table->foreign('id_pagos')->references('id_pagos')->on('pagos');
        });

        Schema::table('khipu', function (Blueprint $table) {
            $table->foreign('id_pagos')->references('id_pagos')->on('pagos');
        });

        Schema::table('pagos', function (Blueprint $table) {
            $table->foreign('id_alquiler')->references('id_alquiler')->on('alquiler');
        });

        Schema::table('alquiler', function (Blueprint $table) {
            $table->foreign('id_propiedad')->references('id_propiedad')->on('propiedad');
        });

        Schema::table('alquiler', function (Blueprint $table) {
            $table->foreign('id_inquilino')->references('id_inquilino')->on('inquilino');
        });

        Schema::table('inquilino_favorito', function (Blueprint $table) {
            $table->foreign('id_inquilino')->references('id_inquilino')->on('inquilino');
        });

        Schema::table('inquilino_favorito', function (Blueprint $table) {
            $table->foreign('id_propiedad')->references('id_propiedad')->on('propiedad');
        });

        Schema::table('verificacion_propiedad', function (Blueprint $table) {
            $table->foreign('id_empleado')->references('id_empleado')->on('empleado');
        });

        Schema::table('TS', function (Blueprint $table) {
            $table->foreign('id_empleado')->references('id_empleado')->on('empleado');
        });

        Schema::table('propiedad_caracteristicas', function (Blueprint $table) {
            $table->foreign('id_propiedad')->references('id_propiedad')->on('propiedad');
        });

        Schema::table('propiedad_caracteristicas', function (Blueprint $table) {
            $table->foreign('id_caracteristicas')->references('id_caracteristicas')->on('caracteristicas');
        });
        //
        Schema::table('multimedia', function (Blueprint $table) {
            $table->foreign('id_propiedad')->references('id_propiedad')->on('propiedad');
        });

        Schema::table('valoracion_dueno_inquilino', function (Blueprint $table) {
            $table->foreign('id_inquilino')->references('id_inquilino')->on('inquilino');
        });

        Schema::table('valoracion_dueno_inquilino', function (Blueprint $table) {
            $table->foreign('id_dueno')->references('id_dueno')->on('dueno');
        });

        Schema::table('valoracion_inquilino_propiedad', function (Blueprint $table) {
            $table->foreign('id_inquilino')->references('id_inquilino')->on('inquilino');
        });

        Schema::table('valoracion_inquilino_propiedad', function (Blueprint $table) {
            $table->foreign('id_propiedad')->references('id_propiedad')->on('propiedad');
        });

        Schema::table('propiedad_condicion', function (Blueprint $table) {
            $table->foreign('id_condiciones')->references('id_condiciones')->on('condicion');
        });

        Schema::table('propiedad_condicion', function (Blueprint $table) {
            $table->foreign('id_propiedad')->references('id_propiedad')->on('propiedad');
        });

        Schema::table('propiedad', function (Blueprint $table) {
            $table->foreign('id_dueno')->references('id_dueno')->on('dueno');
        });

        Schema::table('propiedad', function (Blueprint $table){
            $table->foreign('id_verificacion_propiedad')->references('id_verificacion_propiedad')->on('verificacion_propiedad');
        });

        Schema::table('fecha_disponibilidad', function (Blueprint $table) {
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
        Schema::table('factura_detalle', function (Blueprint $table) {
            $table->dropForeign(['id_pagos']);
            $table->dropColumn(['id_pagos']);
        });

        Schema::table('factura_detalle', function (Blueprint $table) {
            $table->dropForeign(['id_factura_cabecera']);
            $table->dropColumn(['id_factura_cabecera']);
        });

        Schema::table('factura_detalle', function (Blueprint $table) {
            $table->dropForeign(['id_comision']);
            $table->dropColumn(['id_comision']);
        });

        Schema::table('khipu', function (Blueprint $table) {
            $table->dropForeign(['id_pagos']);
            $table->dropColumn(['id_pagos']);
        });

        Schema::table('pagos', function (Blueprint $table) {
            $table->dropForeign(['id_alquiler']);
            $table->dropColumn(['id_alquiler']);
        });

        Schema::table('alquiler', function (Blueprint $table) {
            $table->dropForeign(['id_propiedad']);
            $table->dropColumn(['id_propiedad']);
        });

        Schema::table('alquiler', function (Blueprint $table) {
            $table->dropForeign(['id_inquilino']);
            $table->dropColumn(['id_inquilino']);
        });

        Schema::table('inquilino_favorito', function (Blueprint $table) {
            $table->dropForeign(['id_inquilino']);
            $table->dropColumn(['id_inquilino']);
        });

        Schema::table('inquilinos_favoritos', function (Blueprint $table) {
            $table->dropForeign(['id_propiedad']);
            $table->dropColumn(['id_propiedad']);
        });

        Schema::table('verificacion_propiedades', function (Blueprint $table) {
            $table->dropForeign(['id_empleado']);
            $table->dropColumn(['id_empleado']);
        });

        Schema::table('TS', function (Blueprint $table) {
            $table->dropForeign(['id_empleado']);
            $table->dropColumn(['id_empleado']);
        });

        Schema::table('propiedad_caracteristicas', function (Blueprint $table) {
            $table->dropForeign(['id_propiedad']);
            $table->dropColumn(['id_propiedad']);
        });

        Schema::table('propiedad_caracteristicas', function (Blueprint $table) {
            $table->dropForeign(['id_caracteristicas']);
            $table->dropColumn(['id_caracteristicas']);
        });

        Schema::table('multimedia', function (Blueprint $table) {
            $table->dropForeign(['id_propiedad']);
            $table->dropColumn(['id_propiedad']);
        });

        Schema::table('valoracion_dueno_inquilino', function (Blueprint $table) {
            $table->dropForeign(['id_inquilino']);
            $table->dropColumn(['id_inquilino']);
        });

        Schema::table('multivaloracion_dueno_inquilinomedias', function (Blueprint $table) {
            $table->dropForeign(['id_dueno']);
            $table->dropColumn(['id_dueno']);
        });

        Schema::table('valoracion_inquilino_propiedad', function (Blueprint $table) {
            $table->dropForeign(['id_inquilino']);
            $table->dropColumn(['id_inquilino']);
        });

        Schema::table('valoracion_inquilino_propiedad', function (Blueprint $table) {
            $table->dropForeign(['id_propiedad']);
            $table->dropColumn(['id_propiedad']);
        });

        Schema::table('propiedad_condicion', function (Blueprint $table) {
            $table->dropForeign(['id_condiciones']);
            $table->dropColumn(['id_condiciones']);
        });

        Schema::table('valoracion_inquilino_propiedad', function (Blueprint $table) {
            $table->dropForeign(['id_propiedad']);
            $table->dropColumn(['id_propiedad']);
        });

        Schema::table('propiedad', function (Blueprint $table) {
            $table->dropForeign(['id_dueno']);
            $table->dropColumn(['id_dueno']);
        });

        Schema::table('propiedad', function (Blueprint $table) {
            $table->dropForeign(['id_verificacion_propiedad']);
            $table->dropColumn(['id_verificacion_propiedad']);
        });

        Schema::table('fecha_disponibilidad', function (Blueprint $table) {
            $table->dropForeign(['id_propiedad']);
            $table->dropColumn(['id_propiedad']);
        });
    }
}
