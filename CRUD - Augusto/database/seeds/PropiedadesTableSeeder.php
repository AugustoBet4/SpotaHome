<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class PropiedadesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('propiedades') -> insert([
            'direccion' => 'That St.',
            'ciudad' => 'La Paz',
            'latitud'=> '-123.20',
            'longitud' => '123.20',
            'id_duenos' => '1',
            'descripcion' => 'Descripcion Corta',
            'costo' => '102.20',
        ]);
    }
}
