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
        'username' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});
$factory->define(App\News::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'body' => $faker->paragraph,
        'user_id' =>$faker->randomElement(array(1,2,3))
    ];
});

$factory->define(App\Role::class, function (Faker $faker) {
    return [
        'name' => 'manager',//$faker->name,
        'label' => 'Site Manager'//$faker->jobTitle,
    ];
});

$factory->define(App\Permission::class, function (Faker $faker) {
    return [
        'name' => 'edit forum',//$faker->name,
        'label' => 'edit'//$faker->jobTitle,
    ];
});
