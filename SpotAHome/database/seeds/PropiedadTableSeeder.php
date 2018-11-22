<?php

use Illuminate\Database\Seeder;
use App\Propiedad;

class PropiedadTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Propiedad::class, 1)->create();
    }
}
