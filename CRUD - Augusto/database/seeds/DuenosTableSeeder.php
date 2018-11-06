<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DuenosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('dueno') -> insert([
            'nombre' => 'Augusto Postigo',
            'email' => 'guto__rock@hotmail.com',
            'fecha_nacimiento'=> '1996-10-09',
            'telefono' => '76215591',
            'genero' => 'Masculino',
            'nacionalidad' => 'boliviano',
            'contrasena' => bcrypt('76215591'),
        ]);
    }
}
