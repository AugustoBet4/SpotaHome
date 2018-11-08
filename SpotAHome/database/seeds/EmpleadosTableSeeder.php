<?php

use Illuminate\Database\Seeder;
use App\Empleado;

class EmpleadosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Empleado::class, 10)->create();
    }
}
