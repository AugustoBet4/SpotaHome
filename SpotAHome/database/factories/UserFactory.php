<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Dueno::class, function (Faker $faker) {

    return [
        'nombre'            => 'Pedro Jonas',
        'apellidos'         =>'De Pruebas Menores',
        'email'             => 'dueno@dueno.com',
        'telefono'          => $faker->phoneNumber,
        'fecha_nacimiento'  =>'1980-06-20',
        'genero'            =>' M',
        'nacionalidad'      =>'Boliviana',
        'usuario'           =>$faker->userName,
        'contrasena'        => bcrypt('000'), // secret
    ];
});

$factory->define(App\Inquilino::class, function (Faker $faker) {
    return [
        'nombre'            => $faker->name,
        'apellidos'         =>$faker->lastName,
        'email'             => 'inquilino@inquilino.com',
        'telefono'          => $faker->phoneNumber,
        'fecha_nacimiento'  => $faker->dateTime,
        'genero'            => $faker->randomElement($array = array('M','F')),
        'nacionalidad'      => $faker->country,
        'usuario'           => $faker->userName,
        'contraseña'        => bcrypt('000'), // secret
    ];
});

$factory->define(App\Propiedad::class, function (Faker $faker) {

    return [
        'direccion'         => '57 AV. Altamirano, Esq. Cotapata',
        'ciudad'            => 'La Paz',
        'latitud'           => ' -16.563247',
        'longitud'          => ' -68.099965',
        'id_dueno'          => '1',
        'descripcion'       => 'Hermosa Casita en Lugar Caliente con vista a las montañas',
        'costo'             => '400',
        'zona'              => 'Mallasilla',
        'estadia_max'       => '3',
        //'direccion', 'ciudad', 'latitud', 'longitud', 'descripcion', 'costo',
    ];
});

$factory->define(App\Alquiler::class, function (Faker $faker) {
    return [
        'status_alquiler'   => $faker->randomElement($array = array('Reservado','Finalizado')),
        'fecha_inicio'      => $faker->dateTime,
        'fecha_fin'         => $faker->dateTime,
        'id_propiedad'      => '1',//$faker->randomElement($array = array ('1','2','3','4','5','6','7','8','9','10'), $count = 1),
        'id_inquilino'      => '1',//$faker->randomElement($array = array ('1','2','3','4','5','6','7','8','9','10'), $count = 1),
    ];
});

$factory->define(App\Empleado::class, function (Faker $faker) {

    return [
        'nombre'            => $faker->name,
        'apellidos'         =>$faker->lastName,
        'email'             => 'empleado@empleado.com',
        'telefono'          => $faker->phoneNumber,
        'usuario'           =>$faker->userName,
        'contrasena'        => bcrypt('000'), // secret
    ];
});

$factory->define(App\Fecha_Disponible::class, function (Faker $faker) {

    return [
        'fecha_inicio'      => '2018-11-16',
        'fecha_fin'         =>'2019-11-16',
        'id_propiedad'      => '1',
    ];


});
$factory->define(App\Multimedia::class, function (Faker $faker) {

    return [
        'uri'               => 'prueba.jpg',
        'youtube'           =>'https://www.youtube.com/embed/F4e06PWs4Es',
        'id_propiedad'      => '1',
    ];


});
$factory->define(App\Verificacion_Propiedad::class, function (Faker $faker) {
    return [
        'estado'   => $faker->boolean,
        'fecha'      => $faker->dateTime,
        'hora'         => '12:30:00',
        'observaciones'         => $faker->text(100),
        'id_empleado'      => '1',//$faker->randomElement($array = array ('1','2','3','4','5','6','7','8','9','10'), $count = 1),
        'id_propiedad'      => '1',//$faker->randomElement($array = array ('1','2','3','4','5','6','7','8','9','10'), $count = 1),
    ];
});
