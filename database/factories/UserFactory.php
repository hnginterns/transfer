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
    return [
        'user_id' => App\User::all()->random()->id,
        'balance' => $faker->numberBetween(1000, 19000000),
        'wallet_code' => str_random(20),
        'created_by' => rand(1, 80),
        'updated_by' => rand(1, 80),
    ];
});

$factory->define(App\Restriction::class, function (Faker $faker) {
    
    return [
        'user_id' => App\User::all()->random()->id,
        'wallet_id' => App\Wallet::all()->random()->id,
        'rule_id' => App\Rule::all()->random()->id,
    ];
});

$factory->define(App\Rule::class, function (Faker $faker) {
    
    return [
        'min_amount' => rand(0, 1000),
        'max_amount' => rand(200000, 2000000),
        'max_transactions_per_day' => rand(0, 50),
        'max_amount_transfer_per_day' => $faker->numberBetween(100000, 1900000),
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
        'payee_account_number' => $faker->numberBetween(1000000000, 9999999999),
        'payee_bank' => $faker->firstName.'  '.$faker->lastName,
        'transaction_reference'=> str_random(24),
        'payee_wallet_code' => App\Wallet::all()->random()->wallet_code,
    ];
});


