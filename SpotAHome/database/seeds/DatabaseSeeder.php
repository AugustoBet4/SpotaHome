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
        $this->call(PropiedadTableSeeder::class);
        $this->call(EmpleadosTableSeeder::class);
        $this->call(AlquilerTableSeeder::class);
        $this->call(FechasTableSeeder::class);
        $this->call(MultimediaTableSeeder::class);
        $this->call(VerificacionPropiedadTableSeeder::class);

        /*$this -> call([
            UsersTableSeeder::class,
            AdminsTableSeeder::class,
        ]);*/
    }
}
