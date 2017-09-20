<?php

use Illuminate\Database\Seeder;

class RuleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('rules')->delete();

        factory(App\Rule::class, 20)->create();
        
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
