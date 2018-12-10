<?php

use Illuminate\Database\Seeder;
use App\Verificacion_Propiedad;

class VerificacionPropiedadTableSeeder extends Seeder
{
    //Seeder funcionando al 100 ahora si
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Verificacion_Propiedad::class, 10)->create();
    }
}
