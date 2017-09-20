<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('users')->delete();

        factory(App\User::class, 50)->create();
        
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
