<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Alumnos::class, function(Faker\Generator $faker){
    return[
    'nombre'=>$faker->firstName,
    'aPaterno'=>$faker->firstName,
    'aMaterno'=>$faker->lastName,
    'telefono'=>$faker->phoneNumber,
    'correo' => $faker->unique()->email,
    'calle' => $faker->streetAddress,    
    'matricula'=>$faker->randomNumber(8),
    // 'fechaInicio'=>date('Y-m-d'),
    // 'fechaFin'=>date('Y-m-d', strtotime('+6 months')),
    'idMunicipio' => $faker->numberBetween(1,5),
    'idEstado' => $faker->numberBetween(1,2),       
    'idCarrera' => $faker->numberBetween(1,6),       
    'idCurricular' => $faker->numberBetween(1,10),    
    'idCiclo' => 1,    
    ];
});