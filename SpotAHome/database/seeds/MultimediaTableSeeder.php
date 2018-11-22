<?php

use Illuminate\Database\Seeder;
use App\Multimedia;

class MultimediaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Multimedia::class, 1)->create();
    }
}
