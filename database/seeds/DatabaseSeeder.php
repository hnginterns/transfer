<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$faker = Faker::create();
    	foreach (range(1,10) as $index) {
	        DB::table('banks')->insert([
	            'id' => $faker->numberBetween,
	            'bank_name' => $faker->name,
	            'bank_code' => $faker->creditCardNumber,
	        ]);
        }
    }
}
