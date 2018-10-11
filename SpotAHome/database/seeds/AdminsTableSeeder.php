<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = Faker::create();
        DB::table('admins') -> insert([
            'name' => 'Guto Postigo', 
            'email' => 'guto__rock@hotmail.com',
            'password' => bcrypt('76215591'),
        ]);
        DB::table('admins') -> insert([
            'name' => 'Admin Prueba', 
            'email' => 'admin@admin.admin',
            'password' => bcrypt('admin'),
        ]);
    }
}
