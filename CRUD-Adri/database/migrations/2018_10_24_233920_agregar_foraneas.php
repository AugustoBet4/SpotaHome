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
        Schema::table('factura_detalles', function (Blueprint $table) {
           $table->foreign('id_comisiones')->references('id_comisiones')->on('comisiones');
        });

        Schema::table('factura_detalles', function (Blueprint $table) {
            $table->foreign('id_factura_cabecera')->references('id_factura_cabecera')->on('factura_cabecera');
         });

        Schema::table('factura_detalles', function (Blueprint $table) {
           $table->foreign('id_pagos')->references('id_pagos')->on('pagos');
        });

        Schema::table('khipus', function (Blueprint $table) {
            $table->foreign('id_pagos')->references('id_pagos')->on('pagos');
        });

        Schema::table('pagos', function (Blueprint $table) {
            $table->foreign('id_alquiler')->references('id_alquiler')->on('alquiler');
        });

        Schema::table('alquiler', function (Blueprint $table) {
            $table->foreign('id_propiedad')->references('id_propiedades')->on('propiedades');
        });

        Schema::table('alquiler', function (Blueprint $table) {
            $table->foreign('id_inquilino')->references('id_inquilinos')->on('inquilinos');
        });

        Schema::table('inquilinos_favoritos', function (Blueprint $table) {
            $table->foreign('id_inquilinos')->references('id_inquilinos')->on('inquilinos');
        });

        Schema::table('inquilinos_favoritos', function (Blueprint $table) {
            $table->foreign('id_propiedades')->references('id_propiedades')->on('propiedades');
        });

        Schema::table('verificacion_propiedades', function (Blueprint $table) {
            $table->foreign('id_propiedades')->references('id_propiedades')->on('propiedades');
        });

        Schema::table('verificacion_propiedades', function (Blueprint $table) {
            $table->foreign('id_empleado')->references('id_empleado')->on('empleado');
        });

        Schema::table('TS', function (Blueprint $table) {
            $table->foreign('id_empleado')->references('id_empleado')->on('empleado');
        });
        //Pullee para entender que hizo el amigo :0
        Schema::table('propiedad_caracteristicas', function (Blueprint $table) {
            $table->foreign('id_propiedades')->references('id_propiedades')->on('propiedades');
        });

        Schema::table('propiedad_caracteristicas', function (Blueprint $table) {
            $table->foreign('id_caracteristicas')->references('id_caracteristicas')->on('caracteristicas');
        });
        //
        Schema::table('multimedias', function (Blueprint $table) {
            $table->foreign('id_propiedades')->references('id_propiedades')->on('propiedades');
        });

        Schema::table('valoracion_dueno_inquilino', function (Blueprint $table) {
            $table->foreign('id_inquilinos')->references('id_inquilinos')->on('inquilinos');
        });

        Schema::table('valoracion_dueno_inquilino', function (Blueprint $table) {
            $table->foreign('id_dueno')->references('id_duenos')->on('dueno');
        });

        Schema::table('valoracion_inquilino_propiedad', function (Blueprint $table) {
            $table->foreign('id_inquilinos')->references('id_inquilinos')->on('inquilinos');
        });

        Schema::table('valoracion_inquilino_propiedad', function (Blueprint $table) {
            $table->foreign('id_propiedad')->references('id_propiedades')->on('propiedades');
        });

        Schema::table('propiedad_condicion', function (Blueprint $table) {
            $table->foreign('id_condiciones')->references('id_condiciones')->on('condiciones');
        });

        Schema::table('propiedad_condicion', function (Blueprint $table) {
            $table->foreign('id_propiedad')->references('id_propiedades')->on('propiedades');
        });

        Schema::table('propiedades', function (Blueprint $table) {
            $table->foreign('id_duenos')->references('id_duenos')->on('dueno');
        });

        Schema::table('fecha_disponibles', function (Blueprint $table) {
            $table->foreign('id_propiedades')->references('id_propiedades')->on('propiedades');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('factura_detalles', function (Blueprint $table) {
            $table->dropForeign(['id_pagos']);
            $table->dropColumn(['id_pagos']);
        });

        Schema::table('factura_detalles', function (Blueprint $table) {
            $table->dropForeign(['id_factura_cabecera']);
            $table->dropColumn(['id_factura_cabecera']);
        });

        Schema::table('factura_detalles', function (Blueprint $table) {
            $table->dropForeign(['id_comision']);
            $table->dropColumn(['id_comision']);
        });

        Schema::table('khipus', function (Blueprint $table) {
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

        Schema::table('inquilinos_favoritos', function (Blueprint $table) {
            $table->dropForeign(['id_inquilinos']);
            $table->dropColumn(['id_inquilinos']);
        });

        Schema::table('inquilinos_favoritos', function (Blueprint $table) {
            $table->dropForeign(['id_propiedades']);
            $table->dropColumn(['id_propiedades']);
        });

        Schema::table('verificacion_propiedades', function (Blueprint $table) {
            $table->dropForeign(['id_propiedades']);
            $table->dropColumn(['id_propiedades']);
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
            $table->dropForeign(['id_propiedades']);
            $table->dropColumn(['id_propiedades']);
        });

        Schema::table('propiedad_caracteristicas', function (Blueprint $table) {
            $table->dropForeign(['id_caracteristicas']);
            $table->dropColumn(['id_caracteristicas']);
        });

        Schema::table('multimedias', function (Blueprint $table) {
            $table->dropForeign(['id_propiedades']);
            $table->dropColumn(['id_propiedades']);
        });

        Schema::table('valoracion_dueno_inquilino', function (Blueprint $table) {
            $table->dropForeign(['id_inquilinos']);
            $table->dropColumn(['id_inquilinos']);
        });

        Schema::table('multivaloracion_dueno_inquilinomedias', function (Blueprint $table) {
            $table->dropForeign(['id_dueno']);
            $table->dropColumn(['id_dueno']);
        });

        Schema::table('valoracion_inquilino_propiedad', function (Blueprint $table) {
            $table->dropForeign(['id_inquilinos']);
            $table->dropColumn(['id_inquilinos']);
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

        Schema::table('propiedades', function (Blueprint $table) {
            $table->dropForeign(['id_duenos']);
            $table->dropColumn(['id_duenos']);
        });

        Schema::table('fecha_disponibles', function (Blueprint $table) {
            $table->dropForeign(['id_propiedades']);
            $table->dropColumn(['id_propiedades']);
        });
    }
}
