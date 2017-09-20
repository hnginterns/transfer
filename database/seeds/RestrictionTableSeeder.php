<?php

use Illuminate\Database\Seeder;

class RestrictionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('restrictions')->delete();

        factory(App\Restriction::class, 50)->create();
        
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
