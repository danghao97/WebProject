<?php

use Illuminate\Database\Seeder;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('level')->insert([
            ['levelname' => 'Very Easy', 'diem' => 1],
            ['levelname' => 'Easy', 'diem' => 2],
            ['levelname' => 'Normal', 'diem' => 4],
            ['levelname' => 'Hard', 'diem' => 8],
            ['levelname' => 'Very Hard', 'diem' => 16]
        ]);
    }
}
