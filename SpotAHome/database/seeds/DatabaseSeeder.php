<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(DuenoTableSeeder::class);
        $this->call(InquilinoTableSeeder::class);
        /*$this -> call([
            UsersTableSeeder::class,
            AdminsTableSeeder::class,
        ]);*/
    }
}
