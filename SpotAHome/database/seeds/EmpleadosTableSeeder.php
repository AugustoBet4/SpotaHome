<?php

use Illuminate\Database\Seeder;
use App\Empleado;

class EmpleadosTableSeeder extends Seeder
{
    //Seeder funcionando al 100 ahora si
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Empleado::class, 3)->create();

        DB::table('empleado') -> insert([
            'nombre' => 'Dan',
            'apellidos' => 'as',
            'email' => 'dan@gmail.com',
            'telefono' => '75643276',
            'usuario' => 'dan',
            'contrasena' => bcrypt('123456'),

        ]);
    }
}
