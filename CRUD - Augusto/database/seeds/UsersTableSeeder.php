<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = Faker::create();
        DB::table('users') -> insert([
            'name' => 'Augusto Lopez',
            'email' => 'augusto.bet4@gmail.com',
            'password' => bcrypt('76215591'),
        ]);
        DB::table('users') -> insert([
            'name' => 'Prueba User', 
            'email' => 'prueba@prueba.prueba',
            'password' => bcrypt('prueba'),
        ]);
    }
}
