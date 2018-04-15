<?php

use Illuminate\Database\Seeder;

class ObjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('object')->insert([
            ['description' => 'Beginner', 'objectname' => 'Beginner'],
            ['description' => 'Cao thu', 'objectname' => 'Cao thu'],
        ]);
    }
}
