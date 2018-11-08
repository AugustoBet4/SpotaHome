<?php

use Illuminate\Database\Seeder;
use App\Inquilino;

class InquilinoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Inquilino::class, 10)->create();
    }
}
