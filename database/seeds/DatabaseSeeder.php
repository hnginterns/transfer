<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserTableSeeder::class);
        $this->call(WalletTableSeeder::class);
        $this->call(RuleTableSeeder::class);
        $this->call(RestrictionTableSeeder::class);
        $this->call(TransactionTableSeeder::class);
    }
}
