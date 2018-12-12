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
    }
}
