<?php

use Illuminate\Database\Seeder;

class ChartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //run seed
        DB::table('chart')->insert([
            ['idchart' => 1,'chartname' => 'Friend Chart'],
            ['idchart' => 2,'chartname' => 'World Chart']
        ]);
    }
}
