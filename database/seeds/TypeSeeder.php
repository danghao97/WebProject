<?php

use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('type')->insert([
            ['typename' => 'Văn hóa', 'explanation'=>'Văn hóa'],
            ['typename' => 'Chính trị', 'explanation'=>'Chính trị'],
            ['typename' => 'Kinh tế', 'explanation'=>'Kinh tế'],
            ['typename' => 'Khoa học', 'explanation'=>'Khoa học'],
            ['typename' => 'CNTT', 'explanation'=>'CNTT']
        ]);
    }
}
