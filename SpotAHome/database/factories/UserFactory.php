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
        'nombre'            => $faker->name,
        'apellidos'         =>$faker->lastName,
        'email'             => $faker->unique()->safeEmail,
        'telefono'          => $faker->phoneNumber,
        'fecha_nacimiento'  =>$faker->dateTime,
        'genero'            =>$faker->randomElement($array = array('M','F')),
        'nacionalidad'      =>$faker->country,
        'usuario'           =>$faker->userName,
        'contrasena'          => '000', // secret
    ];
});

$factory->define(App\Inquilino::class, function (Faker $faker) {
    return [
        'nombre'            => $faker->name,
        'apellidos'         =>$faker->lastName,
        'email'             => $faker->unique()->safeEmail,
        'telefono'          => $faker->phoneNumber,
        'fecha_nacimiento'  =>$faker->dateTime,
        'genero'            =>$faker->randomElement($array = array('M','F')),
        'nacionalidad'      =>$faker->country,
        'usuario'           =>$faker->userName,
        'contraseña'          => '000', // secret
    ];
});
    
$factory->define(App\Propiedad::class, function (Faker $faker) {

    return [
        'direccion'         => $faker->address,
        'ciudad'            =>$faker->city,
        'latitud'           => $faker->latitude,
        'longitud'          => $faker->longitude,
        'id_dueno'          =>$faker->randomElement($array = array ('1','2','3','4','5','6','7','8','9','10'), $count = 1),
        'descripcion'       =>$faker->text(100),
        'costo'             =>$faker->randomNumber($nbDigits= 2),
        //'direccion', 'ciudad', 'latitud', 'longitud', 'descripcion', 'costo',
    ];
});

$factory->define(App\Empleado::class, function (Faker $faker) {

    return [
        'nombre'            => $faker->name,
        'apellidos'         =>$faker->lastName,
        'email'             => $faker->unique()->safeEmail,
        'telefono'          => $faker->phoneNumber,
        'fecha_nacimiento'  =>$faker->dateTime,
        'genero'            =>$faker->randomElement($array = array('M','F')),
        'nacionalidad'      =>$faker->country,
        'usuario'           =>$faker->userName,
        'contrasena'          => '000', // secret
    ];
});
