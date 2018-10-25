<?php

use Illuminate\Database\Seeder;
use App\Dueno;

class TablaDuenoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Dueno::class, 50)->create();
    }
}
