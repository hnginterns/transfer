<?php

use Illuminate\Database\Seeder;

class WalletTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('wallets')->delete();

        factory(App\Wallet::class, 50)->create();
        
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
