<?php

use Illuminate\Database\Seeder;
use App\Alquiler;

class AlquilerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Alquiler::class, 1000)->create();
    }
}
