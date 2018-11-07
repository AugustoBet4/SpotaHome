<?php

use Illuminate\Database\Seeder;
use App\Dueno;

class DuenoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Dueno::class, 10)->create();
    }
}
