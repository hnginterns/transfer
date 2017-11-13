<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use Faker\Factory as Faker;

use Carbon\Carbon;
use App\User;
use App\SmsWallet;

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



	      $dt = Carbon::now();
        $dateNow = $dt->toDateTimeString();

        $this->call('BankTableSeeder');


    User::create([
                'username' => 'jekayode',
                'email' => 'jekayode@live.com',
                'password' => Hash::make('transfer'),
                 'is_admin' => true,
                 'bank_id' => "058",
                 'account_number' => '0034492913',
                 'created_by' => 1000,
                 'updated_by' => 0,
	           'created_at' => $dateNow
         ]);

    User::create([
             'username' => 'emeka56',
             'email' => 'emekus@gmail.com',
    'password' => Hash::make('transfer'),
             'bank_id' => "034",
             'account_number' => '2018263637',
             'created_by' => 1000,
    'updated_by' => 0,
	           'created_at' => $dateNow
         ]);

             User::create([
                 'username' => 'prisca',
                 'email' => 'prisca@gmail.com',
                'password' => Hash::make('transfer'),
                'bank_id' => "056",
                'account_number' => '2011263637',
                 'created_by' => 1000,
             'updated_by' => 0,
	           'created_at' => $dateNow
         ]);


    

    //   SmsWallet::insert([

    //   SmsWallet::create([
    //       'username' => 'profchydon@gmail.com',
    //       'api_key' => 'aedf4ca62fa26b9aa501ba3bd83af5e7ac9c45f8',
    //       'user_id' => "11",
    //       'bank_code' => "044",
    //       'bank_account' => "0690000004"
    //   ]),

    //   SmsWallet::create([
    //       'username' => 'joseph.mbassey2@gmail.com',
    //       'api_key' => 'a28c39088ccb2b9a72502dbefdc546d0011b0418',
    //       'user_id' => "12",
    //       'bank_code' => "058",
    //       'bank_account' => "0921318712"
    //   ])

    // ]);

    }
}
