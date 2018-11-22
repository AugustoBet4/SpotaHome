<?php

use Illuminate\Database\Seeder;
use App\Fecha_Disponible;
class FechasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Fecha_Disponible::class, 1)->create();
    }
}
