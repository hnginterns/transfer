<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use Faker\Factory as Faker;

use Carbon\Carbon;
use App\User;
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
	    
	$dt = Carbon::now();
        $dateNow = $dt->toDateTimeString();

        User::insert([
            'username' => 'johnobi',
            'email' => 'johnobi@gmail.com',
            'password' => Hash::make('transfer'),
            'is_admin' => true,
            'bank_id' => "021",
            'account_number' => '2018263637',
            'created_by' => 1000,
            'updated_by' => null,
            'create_at' => $dateNow
        ]);

        User::insert([
            'username' => 'emeka56',
            'email' => 'emekus@gmail.com',
            'password' => Hash::make('transfer'),
            'bank_id' => "034",
            'account_number' => '2018263637',
            'created_by' => 1000,
            'updated_by' => null,
            'create_at' => $dateNow
        ]);

        User::insert([
            'username' => 'prisca',
            'email' => 'prisca@gmail.com',
            'password' => Hash::make('transfer'),
            'bank_id' => "056",
            'account_number' => '2018263637',
            'created_by' => 1000,
            'updated_by' => null,
            'create_at' => $dateNow
        ]);
    }
}
