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
        // $this->call(UsersTableSeeder::class);
        DB::table('chart')->insert([
            'idchart' => 1,
            'chartname' => 'Friend Chart'
        ]);
        DB::table('chart')->insert([
            'idchart' => 2,
            'chartname' => 'World Chart'
        ]);
    }
}
