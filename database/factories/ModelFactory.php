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

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Proveedor::class, function (Faker\Generator $faker) {

    return [
        'nombre' => $faker->company,
        'telefonoPrincipal' => $faker->tollFreePhoneNumber,
        'telefonoSecundario' => $faker->tollFreePhoneNumber,
        'contacto' => $faker->name,
        'direccion' => $faker->address,
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Cliente::class, function (Faker\Generator $faker) {

    return [
        'nombre' => $faker->company,
        'telefonoPrincipal' => $faker->tollFreePhoneNumber,
        'telefonoSecundario' => $faker->tollFreePhoneNumber,
        'contacto' => $faker->name,
        'direccion' => $faker->address,
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Producto::class, function (Faker\Generator $faker) {

    return [
        'unidadMedida_id' => $faker->numberBetween($min = 1, $max = 8),
        'tipoProducto_id' => $faker->numberBetween($min = 1, $max = 3),
        'categoria_id' => $faker->numberBetween($min = 1, $max = 4),
        'nombre' => $faker->unique()->numerify('Producto ###'),
        'existenciaMin' => $faker->randomElement($array = array (50,100,150)),
        'existenciaMax' => $faker->randomElement($array = array (500,1000,1500)),
    ];
});
