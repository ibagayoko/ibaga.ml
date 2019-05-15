<?php

use App\Models\User;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;

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

$factory->define(User::class, function (Faker $faker) {
    return [
        'id'                => Str::uuid(),
        'slug'              => 'ismobaga',
        'username'          => 'ismo.baga',
        'name'              => $faker->name,
        'email'             => 'bagayoko.ismail@gmail.com', //$faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password'          => Hash::make('12345678'), // '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token'    => Str::random(10),
    ];
});
