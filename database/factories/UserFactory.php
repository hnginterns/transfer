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
    static $password;

    return [
        'username' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'created_by' => $faker->firstName,
        'updated_by' => $faker->lastName,
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Wallet::class, function (Faker $faker) {
        // App\User::all()->random()->id;

    return [
        'user_id' => App\User::all()->random()->id,
        'balance' => $faker->numberBetween(10000, 1900000),
        'wallet_code' => str_random(20),
        'created_by' => rand(1, 80),
        'updated_by' => rand(1, 80),
    ];
});

$factory->define(App\Restriction::class, function (Faker $faker) {
    
    return [
        'user_id' => App\User::all()->random()->id,
        'wallet_id' => App\Wallet::all()->random()->id,
        'max_amount' => rand(200000, 2000000),
        'min_amount' => rand(0, 1000),
        'created_by' => $faker->lastName,
        'updated_by' => $faker->firstName,
    ];
});

$factory->define(App\Transaction::class, function (Faker $faker) {

    return [
        'wallet_code' => App\Wallet::all()->random()->wallet_code,
        'amount_transfered' => rand(5000, 2000000),
        'payer_name' => $faker->firstName,
        'payee_name' => $faker->firstName,
        'payee_account_number' => $faker->numberBetween(1000, 1900000),
        'payee_bank' => $faker->firstName.'  '.$faker->lastName,
        'transaction_reference'=> str_random(24),
        'payee_wallet_code' => App\Wallet::all()->random()->wallet_code,
    ];
});
