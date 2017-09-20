<?php

use Illuminate\Database\Seeder;

class TransactionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('transactions')->delete();

        factory(App\Transaction::class, 50)->create();
        
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
